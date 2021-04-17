<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model

{   

	function __construct() {
        $this->users   = 'tbl_users';
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


}


?>    