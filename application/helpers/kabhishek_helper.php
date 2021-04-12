<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
##Function names##
#force_ssl
#generateUUID
#MessageAlertStatus
#DD(Direct Dump)
#Create Access Token Fragnancex_accesstoken
#Fragnance_getfile
#Fragnance_getProductByBrand
*/
	if ( ! function_exists('force_ssl'))
	{
		function force_ssl() {		
			if (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] != "on") {
				$url = "https://". $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
				redirect($url);
				exit;		
			}	
		}
	}


	if ( ! function_exists('getfirstChar'))
	{
		function getfirstChar($str) {
			if($str){
				return strtolower(substr($str, 0, 1));
			}
		}
	}

	if ( ! function_exists('generateUUID'))
	{
		function generateUUID(){
			$charid = md5(uniqid(rand(), true).time());
			$hyphen = chr(45);// "-"
			$uuid = substr($charid, 0, 8).$hyphen
			.substr($charid, 8, 4).$hyphen
			.substr($charid,12, 4).$hyphen
			.substr($charid,16, 4).$hyphen
			.substr($charid,20,12);
			return $uuid;
		}
	}




	if ( !function_exists('MessageAlertStatus')) 
	{
		function MessageAlertStatus($success,$status,$message,$extra = []){
				  return array_merge([
				        'success' => $success,
				        'status' => $status,
				        'message' => $message
				    ],$extra);
		}
	}



	if (!function_exists('dd')) 
	{
		function dd()
		{
			echo '<pre>';
			array_map(function($x) {var_dump($x);}, func_get_args());
			die;
		}
 	}


	if(!function_exists('Fragnancex_accesstoken'))
	{
		function Fragnancex_accesstoken()
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
			
			 return $response_data->access_token;
		}
	}


	if(!function_exists('Fragnance_getfile')){
		function Fragnance_getfile($var = '')
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
		    "content-type: application/json","Authorization: Bearer $var",
		  ),
		));
		// Execute curl & store data in a variable
		$curl_data = curl_exec($curl_handle);

		curl_close($curl_handle);

		// Decode JSON into PHP array
		return $curl_data;
		
		}
	}

	if(!function_exists('Fragnance_getProductByBrand')){
		function Fragnance_getProductByBrand($var = '',$brand ='')
		{
			$curl_handle = curl_init();
		curl_setopt_array($curl_handle, array(
		  CURLOPT_URL => "https://apilisting.fragrancex.com/product/getbybrand/$brand",
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
		    "content-type: application/json","Authorization: Bearer $var",
		  ),
		));
		// Execute curl & store data in a variable
		$curl_data = curl_exec($curl_handle);

		curl_close($curl_handle);

		// Decode JSON into PHP array
		return $curl_data;
		
		}
	}


	if(!function_exists('Fragnance_getProductById')){
		function Fragnance_getProductById($var = '',$id)
		{
			$curl_handle = curl_init();
		curl_setopt_array($curl_handle, array(
		  CURLOPT_URL => "https://apilisting.fragrancex.com/product/get/$id",
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
		    "content-type: application/json","Authorization: Bearer $var",
		  ),
		));
		// Execute curl & store data in a variable
		$curl_data = curl_exec($curl_handle);

		curl_close($curl_handle);

		// Decode JSON into PHP array
		return $curl_data;
		
		}
	}

?>
