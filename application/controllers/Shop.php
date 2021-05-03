<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SHOP extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->library('mongo_db', array('activate'=>'newdb'),'mongo_db2');
		$this->load->model('home_model');
		$this->load->helper('file');
		$this->load->helper('date');

		$this->load->library('cart');
		$this->load->library('session');
		if ($this->config->item('secure_site')) {
			force_ssl();
		}
	}

	public $shipping_charge = 70;
	/**
	 *  1) index - Cart.
	 *  2) AddToCart- Cart Insert.
	 *  3) UpdateItemQty - Cart Update
	 *  4) RemoveItem remove Cart Items
	 *  5) DestroyCart Cart Delete
	 *  6) Coupondestroy Coupon Delete
	 *  7) Coupondestroy Coupon Delete
	 *  #) GetBrand
	 *  #) GetType
	 *  #) GetGender
	 *  #) GetAllProducts
	 */



	public function index()
	{
		if ($this->cart->total_items()>0) {
		if($this->cart->total() < 150){
			$var['ship'] = $this->shipping_charge;	
		}else{
			$var['ship'] =0;
		}
		
		$var['meta'] ='<title>Cart | Perfume</title>';
		$this->load->view('front/inc/header',$var);
		$this->load->view('front/inc/nav');
		$this->load->view('front/cart',$var);
		//$this->load->view('front/inc/footer');
		}
		else{
			$this->session->set_flashdata('success', 'Cart Is Empty');
			redirect(''); 
		}
	}

	public function AddToCart()
	{ 
		
		$set['ItemId'] =$this->input->post('ItemId');
		$data['Quantity'] =$this->input->post('Quantity');
		//Fetch data
		if ($set['ItemId']){
			$product =$this->home_model->GetAllProduct($set['ItemId']);
			$data =array(
					 'id' =>$product['ItemId'] , 
					 'qty'	=> $data['Quantity'],
					 'price' => $product['WholesalePriceUSD'],
					 'name' =>$product['ProductName'],
					 'image' => $product['SmallImageUrl'],
					 'options' => $product
					);
			if($this->cart->insert($data)){
			 	//$this->session->set_flashdata('success', $product['ProductName'].' Added In Cart');
				redirect(base_url().'Cart'); 
		 	}
		 	else{
		 		//$this->session->set_flashdata('warning', 'Somethings Misfortune Happens In Cart!');
				redirect($_SERVER['HTTP_REFERER']); 
		 	}
		}
		else {
			//$this->session->set_flashdata('warning', 'Somethings Misfortune Happens Product Item Id!');
			redirect($_SERVER['HTTP_REFERER']); 
		}
	}

	//Quantity update
	public function UpdateItemQty()
	{
	
		//get the data
		$var['rowid'] =$this->input->post('rowid');
		$var['qty'] =$this->input->post('qty');
		//update the cart
		if (!empty($var['rowid']) && !empty($var['qty'])) {

			$update=$this->cart->update($var);
			if($update){
				//$this->session->set_flashdata('success', 'Updated Successfully');
				redirect($_SERVER['HTTP_REFERER']);
			}else{
				//$this->session->set_flashdata('warning', 'Updation Failed');
				redirect($_SERVER['HTTP_REFERER']);
			}
		}else{
			//$this->session->set_flashdata('warning', 'Somethings Misfortune Happens');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	function AjaxupdateItemQty()
	{
        $var['rowid'] =$this->input->post('rowid');
		$var['qty'] =$this->input->post('qty');

		//update the cart
		if (!empty($var['rowid']) && !empty($var['qty'])) {

			$update=$this->cart->update($var);
			if($update){
		        // Return response
		        $cart =$this->cart->contents();
		        $top =json_encode($cart[$var['rowid']]);
		        echo $update?$top:'error';
			}else{
				echo "failed";
			}
		}else{
				echo "failed with Post" ;
		}
    }

	//Apply Coupon
	public function ApplyCoupon()
	{
		if ($this->input->post('coupon')) {
			$coupon =$this->home_model->GetCoupon($this->input->post('coupon'));
			if(!empty($coupon)){
				if($coupon['CouponExpire'] >date('Y-m-d H:i:s')){					
					$this->session->set_userdata('coupon', $coupon);
					$this->session->set_flashdata('success', $coupon['CouponName'].' Coupon Applied');
					redirect($_SERVER['HTTP_REFERER']);
				}else{
					$this->session->set_flashdata('warning', 'Coupon Already Expired');
					redirect($_SERVER['HTTP_REFERER']);
			
				}
			}
			else{
				$this->session->set_flashdata('warning', 'Not A Vaild Coupon');
				redirect($_SERVER['HTTP_REFERER']);
		
			}
		}else{
			$this->session->set_flashdata('warning', 'Somethings Misfortune Happens');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function RemoveItem($rowid)
	{
		
		$remove =$this->cart->remove($rowid);
		if($remove){
			$this->session->set_flashdata('success', 'Product Removed Successfully');
			redirect($_SERVER['HTTP_REFERER']);
		}else{
			$this->session->set_flashdata('warning', 'Product Removing Unsuccessfull');
			redirect($_SERVER['HTTP_REFERER']);
			
		} 
	}

	public function DestroyCart()
	{
		$this->cart->destroy();
		$this->session->set_flashdata('success', 'Cart Removed Successfully');
		redirect('');
	}

	public function Coupondestroy()
	{
		$this->session->unset_userdata('coupon');	
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function Checkout()
	{
		if ($this->cart->total_items()>0) {
		$var['ship'] =$this->shipping_charge;	
		$this->load->view('front/inc/header');
		$this->load->view('front/inc/nav');
		$this->load->view('front/checkout',$var);
		$this->load->view('front/inc/footer');
		}
		else{
			redirect('Cart');
		}
	}

	public function TotalValueCart()
	{
		$var['total'] =$this->cart->total(); 
		if($this->cart->total() < 150){
			$var['ship'] = $this->shipping_charge;	
		}else{
			$var['ship'] =0;
		}

		$var['maintotal'] = $var['ship'] + $var['total'];
		if(!empty($this->session->coupon)){ 
			$coupon= $this->session->coupon;
			$first ='Coupon Applied <span class="text-success">'.$coupon['CouponName'].'</span>
                                         <span class="text-danger " style="margin-left:200px">- </span> $ ';
            if($coupon['CouponType']=='Percentage')
            {
            	$coupon['CouponValue'] = ($coupon['CouponValue']*$this->cart->total())/100 ;          
            	$middle = (($coupon['CouponValue']*$this->cart->total())/100);
            }
            else
            {
				$middle =$coupon['CouponValue'];  
            } 

            $last = '<a href="'.base_url().'Shop/Coupondestroy" class="text-danger"><i class="fa fa-trash-o"></i></a>';

            $var['coupon'] = $first.$middle.$last;	
           }
        else 
        {
           	$middle =0;
        } 

           	$var['maintotal'] = $var['ship'] + $var['total']-$middle;
		echo json_encode($var);
	}

	public function Review($data)
	{	
		$var =$this->home_model->GetAllProduct($data);
		$var['meta'] ='<title>Review | Perfume</title>';
		$this->load->view('front/inc/header',$var);
		$this->load->view('front/inc/nav');
		$this->load->view('front/review',$var);
		$this->load->view('front/inc/footer');
	}

	public function ReviewSubmit()
	{	
		$var['Name'] =$this->input->post('Name');
		$var['Email'] =$this->input->post('Email');
		$var['Rate'] =$this->input->post('rating');
		$var['ItemId'] =$this->input->post('ItemId');
		$var['date_Created'] =date('Y-m-d H:i:s');
		$var['Description'] =$this->input->post('description');
		$var['Status'] ='Inactive';
		$update=$this->home_model->ReviewInsert($var);
		if($update){
			$this->session->set_flashdata('success', 'Thank You For Submitting Your Valuable Feedback');
			redirect($_SERVER['HTTP_REFERER']);
		}else{
			$this->session->set_flashdata('warning', 'Updation Failed');
			redirect($_SERVER['HTTP_REFERER']);
		}

	}


	public function PaginationAjax()
	{
		if ($this->input->post('id')) {

			$data =$this->home_model->GetBrandAlpha($this->input->post('id'));
			if(!empty($data)){
				$pull =[];
				foreach ($data as $key ) {
					$pull[] =$key['BrandName'];
				}
				$pulled = array_unique($pull);
				echo json_encode(array_unique($pulled));
			}
			else{
				echo "Query fail";
		
			}
		}else{
			echo "Input id Failed";
		}
	}

	public function PerfumeSearch()
	{
		
	}

}
