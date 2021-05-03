<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_filter extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('product_filter_model');
		$this->load->library('cart');
		$this->load->library('mongo_db', array('activate'=>'newdb'),'mongo_db2');
		$this->load->model('home_model');
		$this->load->library('pagination');
      	$this->load->library('Ajax_pagination');
        $this->perPage = 2;
		$this->load->model('test_model');
		$this->load->helper('file');
		$this->load->library('session');
		$this->load->helper('date');
	}
	
	function index()
	{
		$data['BrandName'] = $this->product_filter_model->fetch_filter_type('BrandName',15);
		$data['Type'] = $this->product_filter_model->fetch_filter_type('Type',15);
		$data['Gender'] = $this->product_filter_model->fetch_filter_type('Gender',15);
		$var['meta'] ='<title>Perfume Product Filter</title>';
		$this->load->view('front/inc/header',$var);
		$this->load->view('front/inc/nav');
		$this->load->view('front/product_filter', $data);
		//$this->load->view('front/inc/footer'); It has its own Footer
	}

	function fetch_data()
	{
		sleep(2);
		$minimum_price = $this->input->post('minimum_price');
		$maximum_price = $this->input->post('maximum_price');
		$brand = $this->input->post('brand');
		$type = $this->input->post('type');
		$gender = $this->input->post('gender');
		$this->load->library("pagination");
		$config = array();
		$config["base_url"] = "#";
		$config["total_rows"] = $this->product_filter_model->count_all($minimum_price, $maximum_price, $brand, $type, $gender);
		$config["per_page"] = 30;
		$config["uri_segment"] = 3;
		$config["use_page_numbers"] = TRUE;
		$config["full_tag_open"] = '<ul class="pagination">';
		$config["full_tag_close"] = '</ul>';
		$config["first_tag_open"] = '<li class="page-item">';
		$config["first_tag_close"] = '</li>';
		$config["last_tag_open"] = '<li class="page-item">';
		$config["last_tag_close"] = '</li>';
		$config['next_link'] = '&raquo;';
		$config["next_tag_open"] = '<li class="page-item">';
		$config["next_tag_close"] = '</li>';
		$config["prev_link"] = '&laquo;';
		$config["prev_tag_open"] = '<li class="page-item">';
		$config["prev_tag_close"] = "</li>";
		$config["cur_tag_open"] = "<li class='page-item active'><a class='page-link' href='#'>";
		$config["cur_tag_close"] = "</a></li>";
		$config["num_tag_open"] = '<li class="page-item">';
		$config["num_tag_close"] = "</li>";
		$config['attributes'] = array('class' => 'page-link');
		$config["num_links"] = 6;
		$this->pagination->initialize($config);
		$page = $this->uri->segment('3');
		$start = ($page - 1) * $config["per_page"];
		
		$output = array(
			
			'product_list'			=>	$this->product_filter_model->fetch_data($config["per_page"], $start, $minimum_price, $maximum_price, $brand, $type, $gender),
			'pagination_link'		=>	$this->pagination->create_links()
		);
		echo json_encode($output);
	}
	
}

?>