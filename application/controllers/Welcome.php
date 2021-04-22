<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('test_model');
		$this->load->library('cart');
		$this->load->helper('file');
		$this->load->library('mongo_db', array('activate'=>'newdb'),'mongo_db2');
		$this->load->library('session');
		$this->load->helper('date');
		if ($this->config->item('secure_site')) {
			force_ssl();
		}
	}

	public function Sync()
	{
		if($this->ApiPullStore()){
			if($this->StoreDB()){
				echo "Syncing Api With database is successfull";
			}
	
		}else{
			echo "Semthing Misfortune Happens In API SYNC";
		}
	}

	public function Sync2()
	{
		if($this->ApiPullStore()){
			if($this->StoreDB2()){
				echo "Syncing Api With database is successfull";
			}
	
		}else{
			echo "Semthing Misfortune Happens In API SYNC";
		}
	}

	public function ApiPullStore()
	{
		$response = Fragnance_getfile(Fragnancex_accesstoken());
		$dir =FCPATH.'productlog';
		if (!is_dir($dir)) {
			mkdir($dir, 0777, TRUE);
		}
		if (write_file( $dir.'/main.json', $response) == FALSE)
		{
		   return false;

		} else {
			write_file( FCPATH.'productlog/'.date('Y-m-d H:i:s').'.json', $response); 
			return true;                    
		}
	}

	
	public function StoreDB()
	{	
		$data = read_file(FCPATH.'productlog/main.json');
		$data = json_decode($data,true);
		$i=1;
		$datareset = $this->mongo_db2->deleteAll('products');
		if($datareset){
			foreach ($data as $key) {
				$insert =$this->mongo_db2->insert('products',$key);
				if($insert){
					echo 'Inserted Product '.$i++ ;
					echo '<br>';
				}else{
					echo 'Inserting Failed  Product '.$i++;
				}
			}
		}else{
			echo "Unable To Reset";
		}
	}

	public function StoreDB2()
	{	
		$data = read_file(FCPATH.'productlog/main.json');
		$data = json_decode($data,true);
		 $datareset =$this->db->empty_table('tbl_products');
		 $i=1;
		 if($datareset){
		 	foreach ($data as $key ) {
		 		$insert =$this->test_model->InsertProduct($key);
				if($insert){
					echo 'Inserted Product '.$i++ ;
					echo '<br>';
				}else{
					echo 'Inserting Failed  Product '.$i++;
				}
		 	}
		 }else{
			echo "Unable To Reset";
		}

	}


	public function GetAllProducts()
	{
		$res =$this->mongo_db2->get('products');
		echo "<pre>";
		print_r($res);
	}

	public function GetBrand()
	{
		$res =$this->mongo_db2->get('products');
		echo "<pre>";
		foreach($res as $pro){
			$brandname[] = $pro['BrandName'];
		}
		echo "<pre>";
		print_r(array_unique($brandname));
	}

	public function GetProductByBrand()
	{	
		
		$response=Fragnance_getProductByBrand(Fragnancex_accesstoken(),'Bath & Body Works');
		echo($response);
		
	}

	public function GetProduct()
	{
		$res =$this->mongo_db2->get('products');
		echo "<pre>";
		foreach($res as $pro){
			print_r($pro);
			
		}
		
	}

	public function lolUpdate()
	{
		$this->mongo_db2->where('username','asd');
		$this->mongo_db2->get('users');
		$res =$this->mongo_db2->get('users');
		echo "<pre>";
		print_r($res);
	}


}
