<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library('cart');
		$this->load->helper('file');
		$this->load->library('session');
		$this->load->helper('date');
		if ($this->config->item('secure_site')) {
			force_ssl();
		}
	}

	public function index()
	{
		$this->load->view('front/inc/header');
		$this->load->view('front/inc/nav');
		$this->load->view('front/home');
		$this->load->view('front/inc/footer');
	}
}
?>	