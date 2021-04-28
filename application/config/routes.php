<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['LoginRegister'] = 'Home/LoginRegister';
$route['Dashboard'] = 'Home/Dashboard';
$route['Products/(:num)/(:any)'] = 'Home/Products/$1/$2';
$route['Logout'] = 'Home/Logout';

$route['Gender/Women'] ='Product_filter/index';
$route['Gender/Men'] ='Product_filter/index';
$route['Brand/(:any)'] ='Product_filter/index';
$route['Brand'] ='Home/BrandPage';

$route['Search']='Home/Search';
$route['Product_filter']='Product_filter/index';

$route['Cart']='Shop/index';
$route['Cart/Remove/(:any)']='Shop/RemoveItem/$1';
$route['Cart/Update']='Shop/UpdateItemQty';
$route['Cart/Destroy']='Shop/DestroyCart';

$route['CartAjaxPro'] ='Home/CartAjaxPro'; 

$route['Checkout']='Shop/Checkout';

