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
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] 				= 'home/login';
$route['resetpassword'] 		= 'home/resetpassword';

$route['login_check'] 			= 'home/login_check';
$route['documents'] 			= 'startdeal/documents';
$route['buypack'] 				= 'home/buypack';
$route['joinfree'] 				= 'home/joinfree';
$route['calculator'] 			= 'home/calculator';
$route['contact'] 				= 'home/contact';
$route['sendexpirypackageemail'] = 'home/sendexpirypackageemail';
$route['terms-conditions'] 		= 'home/terms_conditions';
$route['privacy-policy'] 		= 'home/privacy_policy';

$route['profile'] 				= 'dealer/profile';
$route['detail'] 				= 'dealer/detail';
$route['api/buyerlist'] 		= 'api/buyerarea/buyerlist';
$route['api/addbuyer'] 			= 'api/buyerarea/addbuyer';
$route['api/editbuyer'] 		= 'api/buyerarea/editbuyer';
$route['api/deletebuyer'] 		= 'api/buyerarea/deletebuyer';
$route['api/viewbuyer'] 		= 'api/buyerarea/viewbuyer';
$route['api/addcobuyer'] 		= 'api/buyerarea/addcobuyer';
$route['api/editcobuyer'] 		= 'api/buyerarea/editcobuyer';
$route['api/deletecobuyer'] 	= 'api/buyerarea/deletecobuyer';
$route['api/addinsurance'] 		= 'api/buyerarea/addinsurance';
$route['api/editinsurance'] 	= 'api/buyerarea/editinsurance';
$route['api/deleteinsurance'] 	= 'api/buyerarea/deleteinsurance';
$route['api/getpackagedata'] 	= 'api/packagelist/getpackagedata';
$route['api/dopaymentconfirmation']     = 'api/doregistration/dopaymentconfirmation';
$route['api/getpackagedataforuser'] 		= 'api/Packagelist/getpackagedataForUser';

// $route['inventory'] 			= 'dealer/inventory';

// $route['startdeal'] 			= 'yourdeal/editstartdeal';
