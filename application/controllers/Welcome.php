<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library('cart');
		$this->load->helper('file');
		$this->load->model('test_model');
		$this->load->library('mongo_db', array('activate'=>'newdb'),'mongo_db2');
		$this->load->library('session');
		$this->load->helper('date');
		if ($this->config->item('secure_site')) {
			force_ssl();
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
		   echo 'Unable to write the file';

		} else {
			write_file( FCPATH.'productlog/'.date('Y-m-d H:i:s').'.json', $response);                     
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
					echo 'Product '.$i++.' inserted';
					echo "<br>";
				}else{
					echo "false";
				}
			}
		}else{
			echo "Unable To Reset The Collections";
		}
	}


	public function GetAllProducts()
	{
		$res =$this->mongo_db2->get('products');
		echo "<pre>";
		print_r($res);
	}
	public function lolinsert()
	{
		$res =$this->mongo_db2->insert('products',$array);
		echo "<pre>";
		print_r($res);
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
