<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
$route['default_controller'] = 'Controller_f_homepage';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/*
| -------------------------------------------------------------------------
| ADMINISTRATOR ROUTES
| -------------------------------------------------------------------------
*/

/*///////// Dashboard /////////////*/
$route['dashboard'] = 'Controller_dashboard/index';

/*///////// Product /////////////*/
$route['product/product-list'] = 'Controller_product/index';
$route['product/product-add'] = 'Controller_product/newProductForm';
$route['product/product-edit/(:any)'] = 'Controller_product/editProductForm/$1';
$route['product/product-edit-stock/(:any)'] = 'Controller_product/editProductStock/$1';
$route['product/product-edit-image/(:any)'] = 'Controller_product/editProductImg/$1';
$route['product/product-edit-image-s1/(:any)'] = 'Controller_product/editProductImgS1/$1';
$route['product/product-edit-image-s2/(:any)'] = 'Controller_product/editProductImgS2/$1';
$route['product/product-edit-image-s3/(:any)'] = 'Controller_product/editProductImgS3/$1';

/*///////// Product Type /////////////*/
$route['product/type-list'] = 'Controller_type/index';
$route['product/add-type'] = 'Controller_type/newType';
$route['product/change-type-status/(:any)'] = 'Controller_type/changeTypeStatus/$1';
$route['product/edit-type/(:any)'] = 'Controller_type/editType/$1';

/*///////// Product Features /////////////*/
$route['product/features-list'] = 'Controller_features/index';
$route['product/add-features'] = 'Controller_features/newFeatures';
$route['product/change-features-status/(:any)'] = 'Controller_features/changeFeaturesStatus/$1';
$route['product/edit-features/(:any)'] = 'Controller_features/editFeatures/$1';

/*///////// Product Features /////////////*/
$route['product/courier-list'] = 'Controller_courier/index';
$route['product/add-courier'] = 'Controller_courier/newCourier';
$route['product/change-courier-status/(:any)'] = 'Controller_courier/changeCourierStatus/$1';
$route['product/edit-courier/(:any)'] = 'Controller_courier/editCourier/$1';

/*///////// Order /////////////*/
$route['order/order-list'] = 'Controller_order/index';
$route['order/order-detail/(:any)'] = 'Controller_order/orderDetails/$1';
$route['order/change-status'] = 'Controller_order/changeStatusOrder';

/*///////// Sold /////////////*/
$route['sold/sold-list'] = 'Controller_sold/index';
$route['sold/sold-detail/(:any)'] = 'Controller_sold/soldDetails/$1';


/*///////// Settings and Company /////////////*/
$route['company/profile'] = 'Controller_settings/profile';
$route['company/add-randomly'] = 'Controller_settings/addRandomly';
$route['company/update-profile/(:any)'] = 'Controller_settings/updateProfile/$1';


/*
| -------------------------------------------------------------------------
| FRONTEND AND USER ROUTES
| -------------------------------------------------------------------------
*/

/*///////// Homepage ETC /////////////*/

$route['primagreen'] = 'Controller_f_homepage/index';
$route['login'] = 'Controller_f_user_login/index';
$route['registration'] = 'Controller_f_user_login/registration';
$route['registration/data_exist'] = 'Controller_f_user_login/dataExist';
$route['logout'] = 'Controller_f_user_login/logout';

/*///////// About Us /////////////*/
$route['about-us'] = 'Controller_f_about/index';

/*///////// Store /////////////*/
// $route['store'] = 'Controller_f_store/index';
// $route['store/list'] = 'Controller_f_store/showAll';
$route['store/show-all-items'] = 'Controller_f_store/index';
$route['store/(:any)'] = 'Controller_f_store/showByType/$1';
$route['store/detail/(:any)/(:any)'] = 'Controller_f_store/detailProduct/$1';

/*///////// Cart /////////////*/
$route['cart/add-to-cart'] = 'Controller_f_cart/addToCart';
$route['cart/delete-cart-items'] = 'Controller_f_cart/deleteCartItems';
$route['cart/load-cart'] = 'Controller_f_cart/loadCart';
$route['cart/show-cart'] = 'Controller_f_cart/showCartJson';
$route['cart/show-subtotal'] = 'Controller_f_cart/subTotalCartJson';
$route['cart/show-courier'] = 'Controller_f_cart/loadCourier';
$route['cart/show-courierbyid/(:any)'] = 'Controller_f_cart/loadCourierById/$1';

/*///////// Checkout /////////////*/
$route['cart/checkout-detail'] = 'Controller_f_cart/loadCheckoutDetail';
$route['cart/checkout-finish/(:any)'] = 'Controller_f_cart/loadCheckoutFinish/$1';
$route['cart/checkout'] = 'Controller_f_cart/checkOut';

/*///////// Profile /////////////*/
$route['profile/user-account'] = 'Controller_f_user/index';
$route['profile/detail-order/(:any)'] = 'Controller_f_user/detailOrder/$1';
$route['profile/upload-transfer'] = 'Controller_f_user/uploadTransfer';

/*///////// Report /////////////*/
$route['report/report-order/(:any)'] = 'Controller_report/reportOrder/$1';

/*///////// Base /////////////*/
$route['foo'] = 'Controller_foo/index';
$route['dummy'] = 'Controller_foo/dummy';
$route['base'] = 'Controller_base/index';
