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
$route['default_controller'] = 'frontend';
$route['404_override'] = '';
$route['translate_uri_dashes'] = true;

$route['login'] = 'admin/user/login';
$route['logout'] = 'admin/user/logout';
$route['registrasi'] = 'admin/user/registrasi_user';
$route['dashboard'] = 'admin/dashboard';
$route['kategori'] = 'admin/kategori';
$route['kategori/tambah'] = 'admin/kategori/tambah';
$route['kategori/edit'] = 'admin/kategori/edit';
$route['kategori/hapus'] = 'admin/kategori/hapus';
$route['konfigurasi'] = 'admin/konfigurasi';
$route['artikel'] = 'admin/artikel';
$route['artikel/tambah'] = 'admin/artikel/tambah';
$route['artikel/edit'] = 'admin/artikel/edit';
$route['artikel/hapus'] = 'admin/artikel/hapus';
$route['administrasi'] = 'admin/administrasi';
$route['administrasi/edit'] = 'admin/administrasi/edit';
$route['administrasi/hapus'] = 'admin/administrasi/hapus';
$route['administrasi'] = 'admin/administrasi';
$route['profile'] = 'admin/dashboard/profil';
$route['visitor'] = 'admin/visitor';
$route['visitor/hapus/(:num)'] = 'admin/visitor/hapus/$1';



$route['artikel/(:any)'] = 'frontend/artikel/$1';
$route['Allkategori'] = 'frontend/Allkategori';
$route['kategori/(:any)'] = 'frontend/kategori/$1';
$route['cari'] = 'frontend/cari';

$route['toko/kategori-barang']='admin/toko/listKategoriBarang';
$route['toko/tambah-kategori'] = 'admin/toko/tambahKategoriBarang';
$route['toko/edit-kategori']='admin/toko/editKategoriBarang';
$route['toko/hapus-kategori']='admin/toko/hapusKategoriBarang';
$route['toko/tambah-barang'] = 'admin/toko/tambahBarang';
$route['toko/barang']='admin/toko/listBarang';
$route['toko/hapus-barang']='admin/toko/hapusBarang';
$route['toko/edit-barang'] = 'admin/toko/editBarang';
$route['toko/banner']='admin/toko/listBanner';
$route['toko/tambah-banner'] = 'admin/toko/tambahBanner';
$route['toko/edit-banner'] = 'admin/toko/editBanner';
$route['toko/hapus-banner'] = 'admin/toko/hapusBanner';
$route['toko/tarif']='admin/toko/listTarif';
$route['toko/tambah-tarif'] = 'admin/toko/tambahTarif';
$route['toko/edit-tarif'] = 'admin/toko/editTarif';
$route['toko/hapus-tarif'] = 'admin/toko/hapusTarif';
$route['toko/pembayaran']='admin/toko/listPembayaran';
$route['toko/tambah-metode-pembayaran'] = 'admin/toko/tambahPembayaran';
$route['toko/edit-metode-pembayaran'] = 'admin/toko/editPembayaran';
$route['toko/hapus-metode-pembayaran'] = 'admin/toko/hapusPembayaran';


$route['pesanan'] = 'admin/pesanan';
$route['pesanan/detail_pesanan'] = 'admin/pesanan/detail_pesanan';
$route['pesanan/update_pesanan'] = 'admin/toko/update_pesanan'; 
$route['pesanan/konfirmasi/(:any)'] = 'admin/pesanan/konfirmasi/$1';
$route['toko-admin']='admin/toko';