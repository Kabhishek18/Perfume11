<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test_model extends CI_Model

{
	 function __construct() {
        $this->products   = 'tbl_products';
    }
    public function InsertProduct($value)
    {
         $insert = $this->db->insert($this->products,$value);
         return $insert?true:false;
    }

    public function make_query($minimum_price,$maximum_price,$brand,$typename)
    {
    	$query =" SELECT * FROM tbl_products";
    	if(isset($minimum_price,$maximum_price) && !empty($minimum_price) && !empty($maximum_price))
    	{
    		$query .=" AND WholesalePriceUSD BETWEEN '".$minimum_price."'AND'".$maximum_price."'";
    	}
    	if(isset($brand)){
    		$brand_filter =implode("','", $brand);
    		$query .="";
    	}


    }
}


?>    