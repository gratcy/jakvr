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
$route['default_controller'] = 'home/home';

$route['ajax/get_city'] = 'city/home/get_city';
$route['ajax/get_province'] = 'province/home/get_province';
$route['ajax/get_stats'] = 'home/home/get_stats';

$route['login'] = 'login/home';
$route['login/logging'] = 'login/home/logging';
$route['login/logout'] = 'login/home/logout';

############################ MASTER ###########################

$route['branch/?(:num)?'] = 'branch/home/index/$1';
$route['branch/branch_add'] = 'branch/home/branch_add';
$route['branch/branch_update/?(:num)?'] = 'branch/home/branch_update/$1';
$route['branch/branch_delete/(:num)'] = 'branch/home/branch_delete/$1';

$route['product/?(:num)?'] = 'product/home/index/$1';
$route['product/product_add'] = 'product/home/product_add';
$route['product/product_update/?(:num)?'] = 'product/home/product_update/$1';
$route['product/product_delete/(:num)'] = 'product/home/product_delete/$1';

$route['product_others/?(:num)?'] = 'product_others/home/index/$1';
$route['product_others/product_others_add'] = 'product_others/home/product_others_add';
$route['product_others/product_others_update/?(:num)?'] = 'product_others/home/product_others_update/$1';
$route['product_others/product_others_delete/(:num)/(:num)'] = 'product_others/home/product_others_delete/$1/$2';

$route['categories/?(:num)?'] = 'categories/home/index/$1';
$route['categories/categories_add'] = 'categories/home/categories_add';
$route['categories/categories_update/?(:num)?'] = 'categories/home/categories_update/$1';
$route['categories/categories_delete/(:num)'] = 'categories/home/categories_delete/$1';

$route['categories_others/?(:num)?'] = 'categories_others/home/index/$1';
$route['categories_others/categories_others_add'] = 'categories_others/home/categories_others_add';
$route['categories_others/categories_others_update/?(:num)?'] = 'categories_others/home/categories_others_update/$1';
$route['categories_others/categories_others_delete/(:num)'] = 'categories_others/home/categories_others_delete/$1';

$route['color/?(:num)?'] = 'color/home/index/$1';
$route['color/color_add'] = 'color/home/color_add';
$route['color/color_update/?(:num)?'] = 'color/home/color_update/$1';
$route['color/color_delete/(:num)'] = 'color/home/color_delete/$1';

$route['reffer/?(:num)?'] = 'reffer/home/index/$1';
$route['reffer/reffer_add'] = 'reffer/home/reffer_add';
$route['reffer/reffer_update/?(:num)?'] = 'reffer/home/reffer_update/$1';
$route['reffer/reffer_delete/(:num)'] = 'reffer/home/reffer_delete/$1';

$route['logistics/?(:num)?'] = 'logistics/home/index/$1';
$route['logistics/logistics_add'] = 'logistics/home/logistics_add';
$route['logistics/logistics_update/?(:num)?'] = 'logistics/home/logistics_update/$1';
$route['logistics/logistics_delete/(:num)'] = 'logistics/home/logistics_delete/$1';

$route['brand/?(:num)?'] = 'brand/home/index/$1';
$route['brand/brand_add'] = 'brand/home/brand_add';
$route['brand/brand_update/?(:num)?'] = 'brand/home/brand_update/$1';
$route['brand/brand_delete/(:num)'] = 'brand/home/brand_delete/$1';

$route['vendor/?(:num)?'] = 'vendor/home/index/$1';
$route['vendor/vendor_add'] = 'vendor/home/vendor_add';
$route['vendor/vendor_update/?(:num)?'] = 'vendor/home/vendor_update/$1';
$route['vendor/vendor_delete/(:num)'] = 'vendor/home/vendor_delete/$1';

$route['customer/?(:num)?'] = 'customer/home/index/$1';
$route['customer/customer_add'] = 'customer/home/customer_add';
$route['customer/customer_quick_add'] = 'customer/home/customer_quick_add';
$route['customer/customer_update/?(:num)?'] = 'customer/home/customer_update/$1';
$route['customer/customer_delete/(:num)'] = 'customer/home/customer_delete/$1';

$route['city/?(:num)?'] = 'city/home/index/$1';
$route['city/city_add'] = 'city/home/city_add';
$route['city/city_update/?(:num)?'] = 'city/home/city_update/$1';
$route['city/city_delete/(:num)'] = 'city/home/city_delete/$1';

$route['province/?(:num)?'] = 'province/home/index/$1';
$route['province/province_add'] = 'province/home/province_add';
$route['province/province_update/?(:num)?'] = 'province/home/province_update/$1';
$route['province/province_delete/(:num)'] = 'province/home/province_delete/$1';

$route['country/?(:num)?'] = 'country/home/index/$1';
$route['country/country_add'] = 'country/home/country_add';
$route['country/country_update/?(:num)?'] = 'country/home/country_update/$1';
$route['country/country_delete/(:num)'] = 'country/home/country_delete/$1';

############################ DISTRIBUTION ###########################

$route['request/?(:num)?'] = 'request/home/index/$1';
$route['request/request_add'] = 'request/home/request_add';
$route['request/request_update/?(:num)?'] = 'request/home/request_update/$1';
$route['request/request_delete/(:num)'] = 'request/home/request_delete/$1';
$route['request/request_detail/(:num)'] = 'request/home/request_detail/$1';
$route['request/request_products/?(:num)?'] = 'request/home/request_products/$1';
$route['request/request_list_products/?(:num)?/?(:num)?'] = 'request/home/request_list_products/$1/$2';
$route['request/request_products_delete/?(:num)?'] = 'request/home/request_products_delete/$1';
$route['request/request_products_add/?(:num)?'] = 'request/home/request_products_add/$1';

$route['transfer/?(:num)?'] = 'transfer/home/index/$1';
$route['transfer/transfer_add'] = 'transfer/home/transfer_add';
$route['transfer/transfer_update/?(:num)?'] = 'transfer/home/transfer_update/$1';
$route['transfer/transfer_delete/(:num)'] = 'transfer/home/transfer_delete/$1';
$route['transfer/transfer_detail/(:num)'] = 'transfer/home/transfer_detail/$1';
$route['transfer/transfer_products/?(:num)?'] = 'transfer/home/transfer_products/$1';
$route['transfer/transfer_list_products/?(:num)?/?(:num)?'] = 'transfer/home/transfer_list_products/$1/$2';

############################ INVENTORY ###########################

$route['receiving/?(:num)?'] = 'receiving/home/index/$1';
$route['receiving/receiving_types/(:num)/?(:num)?'] = 'receiving/home/receiving_types/$1/$2';
$route['receiving/receiving_add'] = 'receiving/home/receiving_add';
$route['receiving/receiving_update/?(:num)?'] = 'receiving/home/receiving_update/$1';
$route['receiving/receiving_delete/(:num)'] = 'receiving/home/receiving_delete/$1';
$route['receiving/receiving_detail/(:num)'] = 'receiving/home/receiving_detail/$1';
$route['receiving/receiving_products/?(:num)?/?(:num)?'] = 'receiving/home/receiving_products/$1/$2';
$route['receiving/receiving_list_products/?(:num)?/?(:num)?'] = 'receiving/home/receiving_list_products/$1/$2';
$route['receiving/receiving_products_delete/?(:num)?'] = 'receiving/home/receiving_products_delete/$1';
$route['receiving/receiving_products_add/?(:num)?'] = 'receiving/home/receiving_products_add/$1';
$route['receiving/request_products/?(:num)?'] = 'receiving/home/request_products_receiving/$1';

$route['inventory/?(:num)?'] = 'inventory/home/index/$1';
$route['inventory/card_stock/?(:num)?'] = 'inventory/home/cardstock/$1';

$route['opname/?(:num)?'] = 'opname/home/index/$1';
$route['opname/opname_update/?(:num)?'] = 'opname/home/opname_update/$1';

############################ TRANSACTION ###########################

$route['order/?(:num)?'] = 'order/home/index/$1';
$route['order/order_add'] = 'order/home/order_add';
$route['order/order_update/?(:num)?'] = 'order/home/order_update/$1';
$route['order/order_delete/(:num)'] = 'order/home/order_delete/$1';
$route['order/order_detail/(:num)'] = 'order/home/order_detail/$1';
$route['order/order_products/?(:num)?'] = 'order/home/order_products/$1';
$route['order/order_list_products/?(:num)?/?(:num)?'] = 'order/home/order_list_products/$1/$2';
$route['order/order_products_delete/?(:num)?'] = 'order/home/order_products_delete/$1';
$route['order/order_products_add/?(:num)?'] = 'order/home/order_products_add/$1';
$route['order/faktur/(:num)'] = 'order/home/faktur/$1';
$route['order/deliveryorder/(:num)'] = 'order/home/deliveryorder/$1';
$route['order/order_approved/(:num)'] = 'order/home/order_approved/$1';
$route['order/order_approved_all'] = 'order/home/order_approved_all';

$route['order_others/?(:num)?'] = 'order_others/home/index/$1';
$route['order_others/order_others_add'] = 'order_others/home/order_others_add';
$route['order_others/order_others_update/?(:num)?'] = 'order_others/home/order_others_update/$1';
$route['order_others/order_others_delete/(:num)'] = 'order_others/home/order_others_delete/$1';
$route['order_others/order_others_approved/(:num)'] = 'order_others/home/order_others_approved/$1';
$route['order_others/order_others_approved_all'] = 'order_others/home/order_others_approved_all';
$route['order_others/order_others_update_resi/(:num)'] = 'order_others/home/order_others_update_resi/$1';
$route['order_others/order_others_update_one/(:num)'] = 'order_others/home/order_others_update_one/$1';

$route['retur/?(:num)?'] = 'retur/home/index/$1';
$route['retur/retur_add'] = 'retur/home/retur_add';
$route['retur/retur_update/?(:num)?'] = 'retur/home/retur_update/$1';
$route['retur/retur_delete/(:num)'] = 'retur/home/retur_delete/$1';
$route['retur/retur_detail/(:num)'] = 'retur/home/retur_detail/$1';
$route['retur/retur_products/?(:num)?'] = 'retur/home/retur_products/$1';
$route['retur/retur_list_products/?(:num)?/?(:num)?'] = 'retur/home/retur_list_products/$1/$2';
$route['retur/retur_products_delete/?(:num)?'] = 'retur/home/retur_products_delete/$1';
$route['retur/retur_products_add/?(:num)?'] = 'retur/home/retur_products_add/$1';
$route['retur/faktur/(:num)'] = 'retur/home/faktur/$1';

############################ REPORT ###########################

$route['reporttransaction'] = 'reporttransaction/home/index';
$route['reportstock'] = 'reportstock/home/index';
$route['reportcommission'] = 'reportcommission/home/index';

$route['reportopname'] = 'reportopname/home';
$route['reportopname/sortreport/?(:num)?/?(:num)?'] = 'reportopname/home/sortreport/$1/$2';
$route['reportopname/export/(html|excel)'] = 'reportopname/export/$1';

############################ ACCOUNTING ###########################

$route['peti_cash/?(:num)?'] = 'peti_cash/home/index/$1';
$route['peti_cash/peti_cash_add'] = 'peti_cash/home/peti_cash_add';
$route['peti_cash/peti_cash_update/?(:num)?'] = 'peti_cash/home/peti_cash_update/$1';
$route['peti_cash/peti_cash_delete/(:num)'] = 'peti_cash/home/peti_cash_delete/$1';

############################ USERS ###########################

$route['users/?(:num)?'] = 'users/home/index/$1';
$route['users/users_add'] = 'users/home/users_add';
$route['users/users_update/?(:num)?'] = 'users/home/users_update/$1';
$route['users/users_delete/(:num)'] = 'users/home/users_delete/$1';
$route['users/users_group/?(:num)?'] = 'users/home/users_group/$1';
$route['users/users_group_add'] = 'users/home/users_group_add';
$route['users/users_group_update/?(:num)?'] = 'users/home/users_group_update/$1';
$route['users/users_group_delete/(:num)'] = 'users/home/users_group_delete/$1';

$route['settings'] = 'settings/home';
$route['settings/settings'] = 'settings/home/settings';

$route['dailyreport/?(:num)?'] = 'dailyreport/home/index/$1';
$route['dailyreport/dailyreport_add'] = 'dailyreport/home/dailyreport_add';
$route['dailyreport/dailyreport_update/?(:num)?'] = 'dailyreport/home/dailyreport_update/$1';
$route['dailyreport/dailyreport_delete/(:num)'] = 'dailyreport/home/dailyreport_delete/$1';
$route['dailyreport/dailyreport_update_one'] = 'dailyreport/home/dailyreport_update_one';

$route['upload'] = 'upload/home/index';
$route['images-browser'] = 'upload/home/images_browser';

$route['switchbranch/(:num)'] = 'home/home/switchbranch/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
