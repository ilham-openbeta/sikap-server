
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
$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// WEB
$route['logout'] = 'Home/logout';
// Dosen
$route['daftar-mahasiswa'] = 'Dosen/daftar_mahasiswa';
$route['ubah-pass'] = 'Dosen/ubah_pass';
// Mahasiswa
$route['profil'] = 'Mahasiswa/profil';
$route['pengajuan'] = 'Mahasiswa/pengajuan';
$route['alur'] = 'Mahasiswa/alur';
$route['kontak'] = 'Mahasiswa/kontak';
$route['ubah-password'] = 'Mahasiswa/ubah_pass';

// API
//Test Login
$route['api/check'] = 'api/Test_auth/check';
//Admin
$route['api/admin/ubah']['PUT'] = 'api/Admin_api/ubah_pass';
//Dosen
$route['api/dosen']['GET'] = 'api/Dosen_api/get_dosen';
$route['api/dosen/tambah']['POST'] = 'api/Dosen_api/add_dosen';
$route['api/dosen/ubah/(:any)']['PUT'] = 'api/Dosen_api/edit_dosen/$1';
$route['api/dosen/hapus/(:any)']['DELETE'] = 'api/Dosen_api/delete_dosen/$1';
//Mahasiswa
$route['api/mahasiswa']['GET'] = 'api/Mahasiswa_api/get_mhs';
$route['api/mahasiswa/tambah']['POST'] = 'api/Mahasiswa_api/add_mhs';
$route['api/mahasiswa/ubah/(:any)']['PUT'] = 'api/Mahasiswa_api/edit_mhs/$1';
$route['api/mahasiswa/hapus/(:any)']['DELETE'] = 'api/Mahasiswa_api/delete_mhs/$1';
//Seminar
$route['api/seminar']['GET'] = 'api/Seminar_api/get_seminar';
$route['api/seminar/tambah']['POST'] = 'api/Seminar_api/add_seminar';
$route['api/seminar/ubah/(:any)']['PUT'] = 'api/Seminar_api/edit_seminar/$1';
$route['api/seminar/hapus/(:any)']['DELETE'] = 'api/Seminar_api/delete_seminar/$1';
//Kerja Praktek
$route['api/kp']['GET'] = 'api/Kp_api/get_kp';
$route['api/kp/ubah/(:any)']['PUT'] = 'api/Kp_api/edit_kp/$1';
$route['api/kp/hapus/(:any)']['DELETE'] = 'api/Kp_api/delete_kp/$1';
//Surat Tugas
$route['api/surat']['GET'] = 'api/Surat_api/get_surat';
$route['api/surat/tambah']['POST'] = 'api/Surat_api/add_surat';
$route['api/surat/hapus/(:any)']['DELETE'] = 'api/Surat_api/delete_surat/$1';
