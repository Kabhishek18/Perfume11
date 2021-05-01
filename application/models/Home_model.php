<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model

{   

	function __construct() {
        $this->review   = 'tbl_review';
        $this->users   = 'tbl_users';
        $this->products   = 'tbl_products';
        $this->coupon   = 'tbl_coupons';
    }
// # Authenticate User For Authentication of Mail And password
    public function AuthenticateUser($auth)
    {   
        $this->db->select('*');
        $this->db->from($this->users);
        $array = array('UserEmail' => $auth['UserEmail'],'UserPassword' => $auth['UserPassword'],'UserType' => 'User');
        $this->db->where($array);
        $query = $this->db->get();
            if($query->num_rows() !=0)
            {
                return $query->row_array();
            }
            else
            {
                return false;
            }
    }

// # Checking Mail exist in table 
    public function CheckEmail($auth)
    {   
        $this->db->select('*');
        $this->db->from($this->users);
        $array = array('UserEmail' => $auth['UserEmail']);
        $this->db->where($array);
        $query = $this->db->get();
            if($query->num_rows() !=0)
            {
                return true;
            }
            else
            {
                return false;
            }
    }
// # Create User
    public function CreateUser($auth)
    {
        $insert = $this->db->insert($this->users,$auth);
        return $insert?true:false;
    }
// #Get Coupon
    public function GetCoupon($couponname)
    {
        $this->db->select('*');
        $this->db->from($this->coupon);
        $array = array('CouponName' => $couponname, 'CouponStatus' => 'Active');
        $this->db->where($array);
        $query  = $this->db->get();
        $result = $query->row_array();
        
        // return fetched data
        return !empty($result)?$result:false;
    }

    public function SimliarProduct($ProductName,$Type)
    {
       $this->db->select('*');
        $this->db->from($this->products);
        $array = array('ProductName' => $ProductName, 'Type' => $Type);
        $this->db->where($array);
        $query  = $this->db->get();
        $result = $query->result_array();
        
        // return fetched data
        return !empty($result)?$result:false;
    }

    public function SimliarProductName($ProductName)
    {
       $this->db->select('*');
        $this->db->from($this->products);
        $array = array('ProductName' => $ProductName,);
        $this->db->where($array);
        $query  = $this->db->get();
        $result = $query->result_array();
        
        // return fetched data
        return !empty($result)?$result:false;
    }

    public function GetAllProduct($id='')
    {
       $this->db->select('*');
        $this->db->from($this->products);
        if($id){
            $array = array('ItemId'=>$id);
            $this->db->where($array);
            $query  = $this->db->get();
            $result = $query->row_array();
        }else{
            $query  = $this->db->get();
            $result = $query->result_array();

        }
        return !empty($result)?$result:false;
    }


    public function GetAllProductLimit($limit='',$var)
    {

       $this->db->distinct(); 
       $this->db->select($var);
        $this->db->from($this->products);
        if($limit==0){

        }else{
        $this->db->limit($limit);} 
        $query  = $this->db->get();
        $result = $query->result_array();
     return !empty($result)?$result:false;
    }

    public function GetAllProductGender($limit='',$var,$gender)
    {
        $this->db->distinct(); 
        $this->db->select($var);
        $this->db->from($this->products);
        if($limit==0){

        }else{
        $this->db->limit($limit);} 
        $array = array('Gender' => $gender);
        $this->db->where($array);
        $query  = $this->db->get();
        $result = $query->result_array();
     return !empty($result)?$result:false;
    }

    public function GetByBrand($limit,$brandname)
    {
       
       $this->db->select('*');
        $this->db->from($this->products);      
        $this->db->limit($limit);
         $array = array('brandname' => $brandname);
        $this->db->where($array);
        $query  = $this->db->get();
        $result = $query->result_array();
        return !empty($result)?$result:false;
    }

    public function ReviewInsert($var)
    {
        $insert = $this->db->insert($this->review,$var);
        return $insert?true:false;
    }

    public function GetBrandAlpha($var)
    {
       
        $this->db->select('*');
        $this->db->distinct('BrandName');
        $this->db->from($this->products);  
        if($var=='All'){

        }else{
          $this->db->like('BrandName', $var, 'after');
        }    
        $query  = $this->db->get();
        $result = $query->result_array();
        return !empty($result)?$result:false;
    }


    public function GetReviewPid($id)
    {
       
        $this->db->select('*');
        $this->db->from($this->review);
        if($id){
            $array = array('ItemId'=>$id);
            $this->db->where($array);
            $query  = $this->db->get();
            $result = $query->result_array();
        }else{
            $query  = $this->db->get();
            $result = $query->result_array();

        }
        return !empty($result)?$result:false;
    }

}


?>    