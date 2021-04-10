<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['LoginRegister'] = 'Home/LoginRegister';
$route['Dashboard'] = 'Home/Dashboard';
$route['Products/(:num)'] = 'Home/Products/$1';
$route['Logout'] = 'Home/Logout';

$route['Women'] ='Home/GenderPage';
$route['Men'] ='Home/GenderPage';