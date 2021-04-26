<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['LoginRegister'] = 'Home/LoginRegister';
$route['Dashboard'] = 'Home/Dashboard';
$route['Products/(:num)/(:any)'] = 'Home/Products/$1/$2';
$route['Logout'] = 'Home/Logout';

$route['Women'] ='Home/GenderPage';
$route['Men'] ='Home/GenderPage';
$route['Brand/(:any)'] ='Home/BrandPage';
$route['Brand'] ='Home/BrandPage';

$route['Search']='Home/Search';
$route['Product_filter']='Home/Product_filter';

$route['Cart']='Shop/index';
$route['Cart/Remove/(:any)']='Shop/RemoveItem/$1';
$route['Cart/Update']='Shop/UpdateItemQty';
$route['Cart/Destroy']='Shop/DestroyCart';

$route['CartAjaxPro'] ='Home/CartAjaxPro'; 

$route['Checkout']='Shop/Checkout';

