<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

	

$route['add-customer']							= 'customer/add_customer';
/** ------------   Customer route  ---------    
$route['save-customer']							= 'customer/save_customer';
$route['edit-customer/(:any)']					= 'customer/edit_customer/$1';
$route['update-customer']						= 'customer/update_customer';
$route['view-customer/(:any)']					= 'customer/view_customer/$1';
$route['delete-customer/(:any)']				= 'customer/delete_customer/$1';

 ------------  /.Customer route  ---------    */
 
 
 
 	
/** ------------   Sale route  ---------    */	
$route['add-sale']							= 'sale/add_sale';
$route['save-sale']							= 'sale/save_sale';
$route['edit-sale/(:any)/(:any)/(:any)']	= 'sale/edit_sale/$1/$2/$3';
$route['update-sale']						= 'sale/update_sale';
$route['view-sale/(:any)']					= 'sale/view_sale/$1';
$route['delete-sale/(:any)']				= 'sale/delete_sale/$1';
/**  ------------  /.Sale route  ---------    */		
