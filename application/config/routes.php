<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['admin'] = 'admin/admin/index';
$route['admin/logout'] = 'admin/admin/logout';

$route['admin/calls/delete_call/(:num)'] = 'admin/calls/delete_call/$1';
$route['admin/calls/edit_call/(:num)'] = 'admin/calls/edit_call/$1';
$route['admin/calls/(:any)'] = 'admin/calls/index/$1';
$route['admin/calls/(:any)/(:num)'] = 'admin/calls/index/$1/$2';

$route['dogs/(:num)'] = 'dogs/index/$1';
$route['dogs/(:any)'] = 'dogs/single/$1';
$route['dogs'] = 'dogs/index';

$route['(:any)'] = 'pages/index/$1';
$route['default_controller'] = 'pages';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
