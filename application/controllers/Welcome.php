<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library('cart');
		$this->load->helper('file');
		$this->load->model('test_model');
		$this->load->library('session');
		$this->load->helper('date');
		if ($this->config->item('secure_site')) {
			force_ssl();
		}
	}

	public function index()
	{
		$curl_handle = curl_init();
		curl_setopt_array($curl_handle, array(
		  CURLOPT_URL => "https://apilisting.fragrancex.com/product/list/",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_SSL_VERIFYHOST =>false,
		  CURLOPT_SSL_VERIFYPEER => false,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_POSTFIELDS => "grant_type=apiAccessKey&apiAccessId=6dd281e78f26&apiAccessKey=7f314f940fa8835495eb9c5c1f5d5be51875e564",
		  CURLOPT_HTTPHEADER => array(
		    "content-type: application/json","Authorization: Bearer C0cf_08z7uul-h7MDhhqMTxnQuDkdMiqlq4rHbV3CWeoPd7tG1tAnuXigvn_rYE2dzcAWQ7SUcQjkshbWngtgU9qhYi1Id8nFav-y9KlAwq-LDKUlUutZDox3SPFTKs031Smyq2OH1VVxebLEvRx4mvQHuFUnOldRh4t5UlvNpYCsDxh-1RMRGW2LqFmUrweM-AE4_NbYBQSor4im2SE4RfnEFLQ5bZLisPJC0cAFAq6d_QAh15Jh5ggioAcMLEY3a5nlDuRzF0BcVp0cmVRoPFLz_VTCdNrfQb_i91U9LxHs6XY",
		  ),
		));
		// Execute curl & store data in a variable
		$curl_data = curl_exec($curl_handle);

		curl_close($curl_handle);

		// Decode JSON into PHP array
		$response_data = json_decode($curl_data,true);

		var_dump(count($response_data));
		// Print all data if needed
		$dir =FCPATH.'productlog/';
		if (!is_dir($dir)) {
			mkdir($dir, 0777, TRUE);
		}
		if (write_file( FCPATH.'productlog/main.json', $curl_data) == FALSE)
		{
		   echo 'Unable to write the file';

		} else {
			write_file( FCPATH.'productlog/'.date('Y-m-d H:i:s').'.json', $curl_data) ;
		    echo 'File written!';                           
		}
	}

	public function Access_token($value='')
	{
		$curl_handle = curl_init();

		curl_setopt_array($curl_handle, array(
		  CURLOPT_URL => "https://apilisting.fragrancex.com/token",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_SSL_VERIFYHOST =>false,
		  CURLOPT_SSL_VERIFYPEER => false,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => "grant_type=apiAccessKey&apiAccessId=6dd281e78f26&apiAccessKey=7f314f940fa8835495eb9c5c1f5d5be51875e564",
		  CURLOPT_HTTPHEADER => array(
		    "content-type: application/json"
		  ),
		));
		// Execute curl & store data in a variable
		$curl_data = curl_exec($curl_handle);

		curl_close($curl_handle);

		// Decode JSON into PHP array
		$response_data = json_decode($curl_data);

		// Print all data if needed
		echo "<pre>";
		 print_r($response_data);
	}
	public function Test($value='')
	{	
		$data = read_file(FCPATH.'productlog/main.json');
		$data = json_decode($data,true);
			$i =1;
		$value="";	
		foreach ($data as $key) {
           $insert =$this->test_model->InsertOrder($key);
            if($insert){
            	echo $i++;
            	echo "<br>";
            }else{
            	echo "false";
            }
		}

	}


	public function brand()
	{
		$curl_handle = curl_init();
		curl_setopt_array($curl_handle, array(
		  CURLOPT_URL => "https://apilisting.fragrancex.com/product/list/60305M",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_SSL_VERIFYHOST =>false,
		  CURLOPT_SSL_VERIFYPEER => false,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_POSTFIELDS => "grant_type=apiAccessKey&apiAccessId=6dd281e78f26&apiAccessKey=7f314f940fa8835495eb9c5c1f5d5be51875e564",
		  CURLOPT_HTTPHEADER => array(
		    "content-type: application/json","Authorization: Bearer C0cf_08z7uul-h7MDhhqMTxnQuDkdMiqlq4rHbV3CWeoPd7tG1tAnuXigvn_rYE2dzcAWQ7SUcQjkshbWngtgU9qhYi1Id8nFav-y9KlAwq-LDKUlUutZDox3SPFTKs031Smyq2OH1VVxebLEvRx4mvQHuFUnOldRh4t5UlvNpYCsDxh-1RMRGW2LqFmUrweM-AE4_NbYBQSor4im2SE4RfnEFLQ5bZLisPJC0cAFAq6d_QAh15Jh5ggioAcMLEY3a5nlDuRzF0BcVp0cmVRoPFLz_VTCdNrfQb_i91U9LxHs6XY",
		  ),
		));
		// Execute curl & store data in a variable
		$curl_data = curl_exec($curl_handle);

		curl_close($curl_handle);

		// Decode JSON into PHP array
		$response_data = json_decode($curl_data,true);

		var_dump($response_data);
		// Print all data if needed
	
	}
}
