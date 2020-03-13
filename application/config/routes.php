<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "home";
$route['beranda']= "home";
$route['read/produk_hukum']= "home/produk_h";
$route['read/lpse']= "home/lpse";
$route['read/produk_hukum/([0-9]+)']= "home/produk_h/$1";
$route['read/lpse/([0-9]+)']= "home/lpse/$1";
$route['read/detail_peraturan/([0-9]+)/(:any)']= "home/detail_produk_h/$1/$2";
$route['read/detail_lpse/([0-9]+)/(:any)']= "home/detail_lpse/$1/$2";

$route['read/([0-9]+)/1/(:any)']= "home/page/$1/$2/$3";
$route['read/([0-9]+)/3/(:any)']= "home/pajak/$1/$2/$3";
$route['read/([0-9]+)/2/(:any)']= "home/jamak/$1/$2/$3/";
$route['read/([0-9]+)/2/(:any)/([0-9]+)']= "home/jamak/$1/$2/$3/$4";
$route['read/detil/([0-9]+)/([0-9]+)/([0-9]+)/(:any)']= "home/detail_jamak/$1/$2/$3/$4";
$route['read/detail/([0-9]+)/([0-9]+)/([0-9]+)/(:any)']= "home/detail/$1/$2/$3/$4";
$route['read/post/([0-9]+)/(:any)']= "home/post/$1/$2";
$route['read/post/([0-9]+)/(:any)/([0-9]+)']= "home/post/$1/$2/$3";
$route['read/galleri_arsip']= "home/galleri_arsip";
$route['read/galleri_perpus']= "home/galleri_perpus";
$route['read/pendaftaran_member']= "home/pendaftaran";
$route['read/kritiksaran']= "home/aduan";
$route['read/periksa']= "home/cek_";
$route['404_override'] = '';


$route['read/post'] = "home/berita_agenda";
$route['read/post/([0-9]+)'] = "home/berita_agenda/$1";
$route['read/([0-9]+)/4/(:any)']= "home/detail_post/$1/$2/$3";
$route['read/download']= "home/downloadcenter";
$route['read/detail_file/([0-9]+)/(:any)']= "home/detail_file/$1/$2";
/* End of file routes.php */
/* Location: ./application/config/routes.php */