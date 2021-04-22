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
    		$query .=" AND BrandName IN('".$brand_filter."');";
    	}
    	if(isset($typename)){
    		$typename_filter =implode("','", $typename);
    		$query .=" AND Type IN('".$typename_filter."');";
    	}

    	return $query;
    }

    public function  count_all($minimum_price,$maximum_price,$brand,$typename)
    {
    	$query =$this->make_query($minimum_price,$maximum_price,$brand,$typename);
    	$data = $this->db->query($query);
    	return $data->num_rows();
    }

    public function fetch_data($limit,$start,$minimum_price,$maximum_price,$brand,$typename)
    {
    	$query =$this->make_query($minimum_price,$maximum_price,$brand,$typename);
    	$query .=' LIMIT '.$start.','.$limit;

    	$data =$this->db->query($query);

    	$output ='';
    	if($data->num_rows() > 0)
    	{
    		foreach ($data->result_array() as $row) {
    			$output .= '
			    <div class="col-sm-4 col-lg-3 col-md-3">
			     <div style="border:1px solid #ccc; border-radius:5px; padding:16px; margin-bottom:16px; height:450px;">
			      <img src="'. $row['SmallImageUrl'] .'" alt="" class="img-responsive" >
			      <p align="center"><strong><a href="#">'. $row['ProductName'] .'</a></strong></p>
			      <h4 style="text-align:center;" class="text-danger" >'. $row['WholesalePriceUSD'] .'</h4>
			      <p>Camera : '. $row['BrandName'].' MP<br />
			      Brand : '. $row['WholesalePriceUSD'] .' <br />
			      RAM : '. $row['Type'] .' GB<br /></p>
			     </div>
			    </div>
			    ';
    		}
    	}	
    	else
		  {
		   $output = '<h3>No Data Found</h3>';
		  }
		  return $output;
    }
}


?>    