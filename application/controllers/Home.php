<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library('cart');
		$this->load->library('mongo_db', array('activate'=>'newdb'),'mongo_db2');
		$this->load->model('home_model');
		$this->load->library('pagination');
		$this->load->model('test_model');
		$this->load->helper('file');
		$this->load->library('session');
		$this->load->helper('date');
		if ($this->config->item('secure_site')) {
			force_ssl();
		}
	}

	/**
	 *  1) index - Homepage.
	 *  2) LoginRegister- Login Register.
	 *  3) CommonPage- Content Page.
	 *	4) Register User
	 *  5) Authentication- Authentication of Login.
	 *  6) Verify Mail
	 *  7) Logout
	 *  8) GenderPage
	 *  9) BrandPage
	 *  10) Products
	 *  11) Dashboard
	 *  12) Search
	 *  #) GetBrand
	 *  #) GetType
	 *  #) GetGender
	 *  #) GetAllProducts
	 */

	public function index()
	{	
		$var['bestsell'] = $this->GetAllProducts();
		$var['brandname'] =$this->GetBrand();
		$var['meta'] ='<title>Perfume Home</title>';
		$this->load->view('front/inc/header',$var);
		$this->load->view('front/inc/nav');
		$this->load->view('front/home',$var);
		$this->load->view('front/inc/footer');
	}

	public function LoginRegister()
	{
		$var['meta'] ='<title>Login Register | Perfume</title>';
		$this->load->view('front/inc/header',$var);
		$this->load->view('front/inc/nav');
		$this->load->view('front/login');
		$this->load->view('front/inc/footer');
	}

	public function CommonPage()
	{
		$var['meta'] ='<title>Common Page| Perfume</title>';
		$this->load->view('front/inc/header',$var);;
		$this->load->view('front/inc/nav');
		$this->load->view('front/login');
		$this->load->view('front/inc/footer');
	}

	public function RegisterUser()
	{	
		//Post Value
		$auth['UserName'] =$this->input->post('UserName');
		$auth['UserEmail'] =$this->input->post('UserEmail');
		$auth['UserPhone'] =$this->input->post('UserPhone');
		$auth['UserPassword'] =sha1($this->input->post('UserPassword'));
		$cauth['CUserPassword'] =sha1($this->input->post('CUserPassword'));

		//Validation
		if(empty($auth['UserName'])){
			$this->session->set_flashdata('warning', 'User Name Is Mandatory');
			redirect($_SERVER['HTTP_REFERER']);
		}
		if(empty($auth['UserEmail'])){
			$this->session->set_flashdata('warning',  'User Email Is Mandatory');
			redirect($_SERVER['HTTP_REFERER']);
		}
		if(empty($auth['UserPhone'])){
			$this->session->set_flashdata('warning', 'User Phone Is Mandatory');
			redirect($_SERVER['HTTP_REFERER']);
		}
		if(empty($auth['UserPassword'])){
			$this->session->set_flashdata('warning', 'User Password Is Mandatory');
			redirect($_SERVER['HTTP_REFERER']);
		}

		if($this->home_model->CheckEmail($auth)){
			$this->session->set_flashdata('warning', 'EmailId Already Is In Use');
			redirect($_SERVER['HTTP_REFERER']);
		}else{
			if($auth['UserPassword'] ==$cauth['CUserPassword']){
				$auth['UUID'] =generateUUID();
				$auth['Date_Created'] =date('Y-m-d H:i:s');
				$auth['Status'] ='Active';
				$auth['UserType'] ='User';
				
				$insert= $this->home_model->CreateUser($auth);
				if($insert){
					$this->session->set_flashdata('success', 'Successfull Registeration');
					redirect($_SERVER['HTTP_REFERER']);
				}
				else{
					$this->session->set_flashdata('danger', 'Something Misfortune Happens!!');
					redirect($_SERVER['HTTP_REFERER']);
				}
			}else{
				$this->session->set_flashdata('warning', 'Your Password Is Mismatched');
				redirect($_SERVER['HTTP_REFERER']);
			}
		}		
	}

	public function Authenticate()
	{
		//Post Value
		$auth['UserEmail'] =$this->input->post('UserEmail');
		$auth['UserPassword'] =sha1($this->input->post('UserPassword'));

		//Validation
		if(empty($auth['UserEmail'])){
			$this->session->set_flashdata('warning',  'User Email Is Mandatory');
			redirect($_SERVER['HTTP_REFERER']);
		}
		if(empty($auth['UserPassword'])){
			$this->session->set_flashdata('warning', 'User Password Is Mandatory');
			redirect($_SERVER['HTTP_REFERER']);
		}

		if($this->home_model->CheckEmail($auth)){
			if($this->home_model->AuthenticateUser($auth)){
				$user_account = $this->home_model->AuthenticateUser($auth);
				if($user_account['UserVerify'] =='No'){
					$this->session->set_flashdata('warning', 'User Account Is Not Verified');
		//User Verifcation 			
					$var['meta'] ='<title>User Verfication| Perfume</title>';
					$this->load->view('front/inc/header',$var);;
					$this->load->view('front/inc/nav');
					$this->load->view('front/userverify',$user_account);
					$this->load->view('front/inc/footer');
					
				}else{
					$this->session->set_userdata('user_account', $user_account);
					$this->session->set_flashdata('success', 'Welcome '.$auth['UserName']);
					redirect($_SERVER['HTTP_REFERER']);	
				}
				
			}else{
				$this->session->set_flashdata('warning', 'Wrong Password Credentials');
				redirect($_SERVER['HTTP_REFERER']);				
			}

		}else{
			$this->session->set_flashdata('warning', 'EmailId Not Exist');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function VerifyEmail	()
	{		
	}

	public function Logout()
	{
		if(session_destroy())
		{
		$this->session->unset_userdata('user_account');	 
		$this->session->set_flashdata('success', 'Account Logout');  
		redirect('');
		}
	}

	public function GenderPage()
	{	
		if($this->uri->segment(1,0)){
			$var['meta'] ='<title>WOMEN\'S |  
			MEN\'S
			
			| Perfume</title>';
			$data['gender'] =$this->uri->segment(1,0);
			$data['datalist'] = $this->GetGender($this->uri->segment(1,0));
			$this->load->view('front/inc/header',$var);;
			$this->load->view('front/inc/nav');
			$this->load->view('front/gender',$data);
			$this->load->view('front/inc/footer');
		}else{
			$this->session->set_flashdata('warning', 'Url Is Mandatory');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function BrandPage()
	{	
		if($this->uri->segment(2,0)){
			$data['brandname'] =$this->uri->segment(2,0);
			$data['brandname'] =str_replace("-"," ",$data['brandname']);
			$var['meta'] ='<title>'.$data['brandname'].' | Perfume</title>';
			$response =Fragnance_getProductByBrand(Fragnancex_accesstoken(),$data['brandname']);
			$data['datalist'] =json_decode($response,true);
			$this->load->view('front/inc/header',$var);
			$this->load->view('front/inc/nav');
			$this->load->view('front/brand',$data);
			$this->load->view('front/inc/footer');
		}else{
			$var['meta'] ='<title>All Brands | Perfume</title>';
			$this->load->view('front/inc/header',$var);
			$this->load->view('front/inc/nav');
			$this->load->view('front/brand');
			$this->load->view('front/inc/footer');
		}
	}

	public function Products($id='',$name)
	{
		$response = Fragnance_getProductById(Fragnancex_accesstoken(),$id);
		$var = json_decode($response,true);
		$var['meta'] ='<title> '.$var['ProductName'].' </title>';
		$this->load->view('front/inc/header',$var);
		$this->load->view('front/inc/nav');
		$this->load->view('front/product',$var);
		$this->load->view('front/inc/footer');
	}

	public function Dashboard()
	{
		if(!empty($this->session->user_account)){
			$var = $this->session->user_account;
			$var['meta'] ='<title> Dashboard </title>';
			$this->load->view('front/inc/header',$var);
			$this->load->view('front/inc/nav');
			$this->load->view('front/dashboard',$var);
			$this->load->view('front/inc/footer');
		}else{
			$this->session->set_flashdata('warning', 'User Access Denied');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function Search()
	{
		if($this->input->post('search')){
			$this->session->set_userdata('search',ucwords(strtolower($this->input->post('search'))));
			$word =ucwords(strtolower($this->input->post('search')));
			$var['result'] =$this->mongo_db2->like('ProductName',$word,'i',true,false)->get('products');
			$var['search'] =ucwords(strtolower($this->input->post('search')));
			$var['meta'] ='<title> Search | '.$var['search'].' </title>';
			$this->load->view('front/inc/header',$var);
			$this->load->view('front/inc/nav');
			$this->load->view('front/search',$var);
			$this->load->view('front/inc/footer');
		}else{
			$this->session->search;
			$word =$this->session->search;
			$var['result'] =$this->mongo_db2->like('ProductName',$word,'i',true,false)->get('products');
			$var['search'] =ucwords(strtolower($this->session->search));
			$var['result'] =$this->mongo_db2->get('products');
			$var['meta'] ='<title> Search | '.$var['search'].' </title>';
			$this->load->view('front/inc/header',$var);
			$this->load->view('front/inc/nav');
			$this->load->view('front/search',$var);
			$this->load->view('front/inc/footer');
		}	

	}

	public function Product_filter()
	{
		$allbrand = $this->GetBrand();
		$alltype = $this->GetType();
		$var['brand_data'] =array_slice($allbrand, 0,20);
		$var['type_data'] =array_slice($alltype, 0,20);


		$var['meta'] ='<title> Dashboard </title>';
		$this->load->view('front/inc/header',$var);
		$this->load->view('front/inc/nav');
		$this->load->view('front/prdfltr');
		$this->load->view('front/inc/footer');
	}

	public function fetch_data()
	{
		$minimum_price =$this->input->post('minimum_price');
		$maximum_price =$this->input->post('maximum_price');
		$brand =$this->input->post('brand');
		$typename =$this->input->post('typename');
		$this->load->library('pagination');
		$config = array();
		$config['basr_url']='#';
		$config['totalrows']= $this->test_model->count_all($minimum_price,$maximum_price,$brand,$typename) ;
		$config['per_page'] = 150;
		$config['uri_segement'] =3;
		$config['use_page_numbers']= TRUE;
		$config['full_tag_open'] ='<ul class="pagination">';
		$config['full_tag_close'] ='</ul">';
		$config['first_tag_open'] ='<li>';
		$config['first_tag_close'] ='</li>';
		$config['last_tag_open'] ='<li>';
		$config['last_tag_close'] ='</li>';
		$config['next_link'] ='&gt;';
		$config['next_tag_open'] ='<li>';
		$config['next_tag_close'] ='</li>';
		$config['prev_link'] ='&lt;';
		$config['prev_tag_open'] ='<li>';
		$config['prev_tag_close'] ='</li>';
		$config['cur_tag_open'] ="<li class='active'><a href='#'> ";
		$config['cur_tag_close'] ="</a></li>";
		$config['num_tag_open'] ="<li>";
		$config['num_tag_close'] ="</li>";
		$config['num_links'] =3;
		$this->pagination->intialize($config);
		$page  = $this->uri->segment(3);
		$start = ($page - 1)*$config['per_page'];
		$ouput = array(
			'pagination_link' => $this->pagination->create_links(),
			'product_list' => $this->test_model->fetch_data($config["per_page"],$start,$minimum_price,$maximum_price,$brand,$typename),
			 );
		echo json_encode($ouput);
	}


	public function loadRecord($rowno=0){

		// Row per page
		$rowperpage = 100;

		// Row position
		if($rowno != 0){
			$rowno = ($rowno-1) * $rowperpage;
		}
      	
      	// All records count
      	$allcount = $this->home_model->getrecordCount();

      	// Get  records
      	$users_record = $this->home_model->getData($rowno,$rowperpage);
      	
      	// Pagination Configuration
      	$config['base_url'] = base_url().'Home/loadRecord';
      	$config['use_page_numbers'] = TRUE;
		$config['total_rows'] = $allcount;
		$config['per_page'] = $rowperpage;

		// Initialize
		$this->pagination->initialize($config);

		// Initialize $data Array
		$data['pagination'] = $this->pagination->create_links();
		$data['result'] = $users_record;
		$data['row'] = $rowno;

		echo json_encode($data);
		
	}

   	public function CartAjaxPro()
	{

        $query = $this->input->get('query');

        $this->db->like('name', $query);


        $data = $this->db->get("tags")->result();


        echo json_encode( $data);

    }


//Get Brand From Mongo
	public function GetBrand()
	{
		$res =$this->mongo_db2->get('products');
		foreach($res as $pro){
			$brandname[] = $pro['BrandName'];
		}
		return array_unique($brandname);
	}

//Get Brand From Mongo
	public function GetType()
	{
		$res =$this->mongo_db2->get('products');
		foreach($res as $pro){
			$brandname[] = $pro['Type'];
		}
		return array_unique($brandname);
	}	
//Get Gender From Mongo
	public function GetGender($gender)
	{
		$data = $this->mongo_db2->where(['Gender' => $gender])->get('products');
		return $data;
	}	
//Get All Product On Home with limit 10
	public function GetAllProducts()
	{
		$response =$this->mongo_db2->limit(10)->get('products');
		return $response;
	}
//Get All Product With Productname
	public function GetTheProducts()
	{
		$response =$this->mongo_db2->get('products');
		foreach($response as $pro){
			$productname[] = $pro['ProductName'];
		}
		$productname= array_unique($productname);
		return $productname;
	}

}
?>	