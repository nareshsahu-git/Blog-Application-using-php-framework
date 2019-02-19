<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['posts/index'] = 'posts/index';
$route['posts/create'] = 'posts/create';
$route['posts/update'] = 'posts/update';
$route['posts/(:any)'] = 'posts/view/$1';
$route['posts'] 	   = 'posts/index';

$route['default_controller'] = 'pages/view';

$route['catogaries/create']  = 'catogaries/create';
$route['catogaries']  		 = 'catogaries/index';
$route['catogaries/posts/(:any)'] = 'catogaries/posts/$1';

$route['(:any)'] = 'pages/view/$1';	//If we set any URI after example.com/ It will directly call, like about

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
