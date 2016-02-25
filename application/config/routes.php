<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['admin'] = 'admin/admin/index';
$route['admin/logout'] = 'admin/admin/logout';

$route['admin/calls/delete_call/(:num)'] = 'admin/calls/delete_call/$1';
$route['admin/calls/edit_call/(:num)'] = 'admin/calls/edit_call/$1';
$route['admin/calls/(:any)'] = 'admin/calls/index/$1';
$route['admin/calls/(:any)/(:num)'] = 'admin/calls/index/$1/$2';


$route['blog/(:num)'] = 'blog/index/$1';
$route['blog/(:any)'] = 'blog/single/$1';
$route['blog'] = 'blog/index';

$route['pets/cart'] = 'pets/cart';
$route['pets/(:num)'] = 'pets/index/$1';
$route['pets/(:any)'] = 'pets/single/$1';
$route['pets'] = 'pets/index';

$route['(:any)'] = 'pages/index/$1';
$route['default_controller'] = 'pages';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
