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

	public function index()
	{	
		var_dump($this->cart->contents());
		if ($this->cart->total_items()>0) {
		$var['meta'] ='<title>Cart | Perfume</title>';
		$this->load->view('front/inc/header',$var);
		$this->load->view('front/inc/nav');
		$this->load->view('front/cart',$var);
		$this->load->view('front/inc/footer');
		}
		else{

		}
	}


	function AddToCart(){ 
		
		$set['ItemId'] =$this->input->post('ItemId');
		$data['Quantity'] =$this->input->post('Quantity');
		//Fetch data
		if ($set['ItemId']){
			$product =json_decode(Fragnance_getProductById(Fragnancex_accesstoken(),$set['ItemId']),true);
			$data =array('ItemId' =>$product['ItemId'] , 
						 'BrandName'	=> $product['BrandName'],
						 'ProductName' => $product['ProductName'],
						 'Type' =>$product['Type'],
						 'Size'=>$product['Size'],
						 'Upc' => $product['Upc'],
						 'Instock' => $product['Instock'],
						 'WholesalePriceUSD' => $product['WholesalePriceUSD'],
						 'WholesalePriceGBP' => $product['WholesalePriceGBP'],
						 'WholesalePriceEUR' => $product['WholesalePriceEUR'],
						 'WholesalePriceAUD' => $product['WholesalePriceAUD'],
						 'WholesalePriceCAD' => $product['WholesalePriceCAD'],
						 'ParentCode' => $product['ParentCode'],
						 'SmallImageUrl' => $product['SmallImageUrl'],
						 'LargeImageUrl' => $product['LargeImageUrl'],
						 'QuantityAvailable' => $product['QuantityAvailable'],
						 'Gender' => $product['Gender'],
						 'Description' => $product['Description'],
						 'qty' => $data['Quantity'],
						 'price' =>$product['WholesalePriceUSD'],

						);
			var_dump($this->cart->insert($data));
			exit();
			if($this->cart->insert($data)){
			 	$this->session->set_flashdata('success', $product['ProductName'].' Added Successfully');
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
	function updateItemQty(){
		$coupon =$this->input->post('coupon');
		if (!empty($coupon)) {
			$ticket =$this->cart_model->Getcoupon($coupon);
			if($ticket){
			$this->session->set_userdata('ticket',$ticket);
			
			$this->session->set_flashdata('success', '<span style="color:green">Coupon Added successfully </span>');
			redirect('cart');
			}

			else{
			$this->session->set_flashdata('wrong', '<span style="color:red">Coupon not available</span>');
			redirect('cart');
			}	
		}

		$update =0;
		//get the data
		$rowid =$this->input->post('rowid');
		$qty =$this->input->post('qty');
		for($i=0;$i<count($rowid);$i++){
			$data[$i] = array('rowid' => $rowid[$i],'qty' => $qty[$i]);
		}
		//update the cart
		if (!empty($rowid) && !empty($qty)) {

			$update=$this->cart->update($data);
		}
		//return respone
		redirect('cart');
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

	function removeItem($rowid)
	{
		$remove =$this->cart->remove($rowid);
		redirect('cart');
	}
	function destremove(){
		$this->cart->destroy();
		redirect('cart');
	
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
