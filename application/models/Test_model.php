<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test_model extends CI_Model

{
	 function __construct() {
        $this->products   = 'tbl_products';
    }
    public function InsertOrder($value)
    {
         $insert = $this->db->insert($this->products,$value);
         return $insert?true:false;
    }
}


?>    