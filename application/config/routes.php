<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
*/
$route['default_controller'] = 'home';
$route['404_override'] = 'notfound';
$route['translate_uri_dashes'] = FALSE;

//CUSTOM URL
$route['logout'] = 'login/logout';


//ADMIN URL
$route['admin'] = 'admin/login/index';
$route['admin/logout'] = 'admin/login/logout';


//ESHOP URL
$route['eshop'] = 'eshop/login/index';
$route['eshop/logout'] = 'eshop/login/logout';
