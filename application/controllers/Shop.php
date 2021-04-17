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
	/**
	 *  1) index - Cart.
	 *  2) AddToCart- Cart Insert.
	
	 *  #) GetBrand
	 *  #) GetType
	 *  #) GetGender
	 *  #) GetAllProducts
	 */


	public function index()
	{	
		if ($this->cart->total_items()>0) {
		$var['meta'] ='<title>Cart | Perfume</title>';
		$this->load->view('front/inc/header',$var);
		$this->load->view('front/inc/nav');
		$this->load->view('front/cart',$var);
		$this->load->view('front/inc/footer');
		}
		else{
			$this->session->set_flashdata('success', 'Cart Is Empty');
			redirect(''); 
		}
	}


	public function AddToCart(){ 
		
		$set['ItemId'] =$this->input->post('ItemId');
		$data['Quantity'] =$this->input->post('Quantity');
		//Fetch data
		if ($set['ItemId']){
			$product =json_decode(Fragnance_getProductById(Fragnancex_accesstoken(),$set['ItemId']),true);


			$data =array('id' =>$product['ItemId'] , 
						 'qty'	=> $data['Quantity'],
						 'price' => $product['WholesalePriceUSD'],
						 'name' =>$product['ProductName'],
						 'image' => $product['SmallImageUrl'],
						 'options' => $product
						);
			

			if($this->cart->insert($data)){
			 	$this->session->set_flashdata('success', $product['ProductName'].' Added In Cart');
				redirect($_SERVER['HTTP_REFERER']); 
		 	}
		 	else{
		 		$this->session->set_flashdata('warning', 'Somethings Misfortune Happens In Cart!');
				redirect($_SERVER['HTTP_REFERER']); 
		 	}
		}
		else {
			$this->session->set_flashdata('warning', 'Somethings Misfortune Happens Product Item Id!');
			redirect($_SERVER['HTTP_REFERER']); 
		}
	}

	//quantity update
	public function UpdateItemQty(){
	
		//get the data
		$var['rowid'] =$this->input->post('rowid');
		$var['qty'] =$this->input->post('qty');
		//update the cart
		if (!empty($var['rowid']) && !empty($var['qty'])) {

			$update=$this->cart->update($var);
			if($update){
				$this->session->set_flashdata('success', 'Updated Successfully');
				redirect($_SERVER['HTTP_REFERER']);
			}else{
				$this->session->set_flashdata('warning', 'Updation Failed');
				redirect($_SERVER['HTTP_REFERER']);
			}
		}else{
			$this->session->set_flashdata('warning', 'Somethings Misfortune Happens');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}


	//Apply Coupon
	function ApplyCoupon(){
		$coupon =$this->input->post('coupon');
		if (!empty($coupon)) {
			$ticket =$this->cart_model->Getcoupon($coupon);
			if($ticket){
			 	$todaydate =date('Y-m-d');
              	$expdate =$ticket['coupon_expire'];
              
                if($todaydate <=$expdate){
					$this->session->set_userdata('ticket',$ticket);
			
					$this->session->set_flashdata('success', '<span style="color:green">Coupon Added successfully </span>');
					redirect('checkout');
				}
				else{
					$this->session->set_flashdata('wrong', '<span style="color:orange">Sorry, Coupon Expired!! </span>');
					redirect('checkout');
				}
			}

			else{
			$this->session->set_flashdata('wrong', '<span style="color:red">Coupon not available</span>');
			redirect('checkout');
			}	
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
	function DestroyCart(){
		$this->cart->destroy();
		$this->session->set_flashdata('success', 'Cart Removed Successfully');
		redirect('');
	
	}
	function coupondestroy(){
		$this->session->unset_userdata('ticket');	
		redirect('checkout');
	
	}



	function Checkout()
	{	
		if ($this->cart->total_items()>0) {
		$data = array();
		$data['cartItems'] = $this->cart->contents();
		$this->load->view('page/include/head');
		$this->load->view('page/include/nav');
		$this->load->view('page/checkout',$data);
		$this->load->view('page/include/foot');
		}
		else{
			redirect('');
		}
	}





}
