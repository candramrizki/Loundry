<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// AUTH
$routes->get('/', 'Auth::login');
$routes->get('login', 'Auth::login');
$routes->post('login/submit', 'Auth::loginSubmit');
$routes->get('register', 'Auth::register');
$routes->get('logout', 'Auth::logout');
$routes->get('register', 'RegisterController::index');
$routes->post('register/submit', 'RegisterController::submit');
$routes->get('login/logout', 'LoginController::logout');
$routes->get('logout', 'Auth::logout');
$routes->post('logout', 'Auth::logout');
// === ADMIN ===
$routes->get('admin/dashboard', 'Admin::dashboard');
$routes->get('admin/paket', 'Admin::paket');
$routes->get('admin/tbh_paket', 'Admin::tbh_paket');
$routes->post('admin/simpan-paket', 'Admin::simpanPaket');
$routes->get('admin/edit_paket/(:num)', 'Admin::edit_paket/$1'); 
$routes->post('admin/up_paket/(:num)', 'Admin::up_paket/$1'); 
$routes->get('admin/hapus_paket/(:num)', 'Admin::hapus_paket/$1');

$routes->get('admin/pelanggan', 'Admin::pelanggan');
$routes->get('admin/tambah_plg', 'Admin::tambah_plg');
$routes->get('admin/edit_plg/(:num)', 'Admin::edit_plg/$1');
$routes->post('admin/update_plg/(:num)', 'Admin::update_plg/$1');
$routes->get('admin/hapus_plg/(:num)', 'Admin::hapus_plg/$1');

// === PESANAN ADMIN ===
$routes->get('admin/pesanan', 'Pesanan::index'); // Daftar pesanan admin
$routes->post('admin/ubah_status', 'Admin::ubah_status'); // Ubah status pesanan
$routes->get('admin/cetak_nota/(:num)', 'Admin::cetakNota/$1');
$routes->post('admin/update_status', 'Admin::update_status'); 


$routes->get('admin/lp_keuangan', 'LaporanKeuangan::lp_keuangan');
$routes->get('admin/shop', 'Admin::shop');

// pelanggan admin
$routes->get('admin/pelanggan', 'Admin::pelanggan');
$routes->get('admin/tambah_plg', 'Admin::tambah_plg');



// === PELANGGAN ===
$routes->get('pelanggan/dashboard_plg', 'Pelanggan::dashboard_plg', ['filter' => 'auth']);
$routes->get('pelanggan/jadwal', 'Pelanggan::jadwal');
$routes->get('pelanggan/cek_status', 'Pelanggan::cek_status');
$routes->get('pelanggan/bayar', 'Pelanggan::bayar');
$routes->post('pelanggan/konfirmasi_bayar', 'Pelanggan::konfirmasi_bayar');
$routes->get('pelanggan/ringkasan', 'Pelanggan::ringkasan');
$routes->get('pelanggan/profil', 'Pelanggan::profil');

// === PESANAN PELANGGAN ===
$routes->post('pesanan/buat', 'Pesanan::buat'); // Form order pelanggan
$routes->get('pelanggan/dashboard_plg', 'Pesanan::dashboard_plg');
$routes->get('pelanggan/pesanan', 'Pelanggan::pesanan');

// === LAIN-LAIN ===
$routes->get('welcome_message', 'Home::welcome_message');
$routes->get('pesanan', 'Home::pesanan');
$routes->get('paket', 'Home::paket');
$routes->get('update_plg', 'Home::update_plg');
$routes->get('lp_keuangan', 'LaporanKeuangan::lp_keuangan');
$routes->get('shop', 'Home::shop');

// dasboard pelanggan

$routes->post('admin/simpanPelanggan', 'Admin::simpanPelanggan');
$routes->get('admin/hapusPelanggan/(:num)', 'Admin::hapusPelanggan/$1');
$routes->get('admin/editPelanggan/(:num)', 'Admin::editPelanggan/$1');
$routes->post('admin/updatePelanggan', 'Admin::updatePelanggan');


