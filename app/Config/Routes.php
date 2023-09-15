<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'IndexController::index');
$routes->get('produk', 'ProdukController::produk');
$routes->get('detail_produk/(:segment)', 'AdminProdukController::detail_produk/$1');
$routes->get('tentang_kami', 'TentangController::tentang');
$routes->get('kontak_kami', 'KontakController::index');
$routes->add('kirim_pesan', 'KontakController::kirim_pesan');

//Keranjang Cus
$routes->add('keranjang', 'KeranjangController::index');
$routes->add('tambah_keranjang', 'KeranjangController::tambah_keranjang');
$routes->add('ubah_keranjang', 'KeranjangController::update_keranjang');
$routes->add('hapus_keranjang/(:segment)', 'KeranjangController::hapus_keranjang/$1');
$routes->add('hapus_total_keranjang', 'KeranjangController::hapus_isi_keranjang');

$routes->group('admin', function ($routes) {
    $routes->get('/', 'AdminPesananController::index');
    $routes->add('login', 'AdminLoginController::index');
    $routes->get('logout', 'AdminLoginController::logout');
    $routes->add('tambah_pesanan', 'AdminPesananController::insert_pesanan');
    $routes->add('ubah_pesanan/(:segment)', 'AdminPesananController::update_pesanan/$1');
    $routes->get('pesanan_diproses/(:segment)', 'AdminPesananController::pesanan_diproses/$1');
    $routes->add('pesanan_selesai/(:segment)', 'AdminPesananController::pesanan_selesai/$1');
    $routes->add('hapus_pesanan/(:segment)', 'AdminPesananController::delete_pesanan/$1');
    $routes->add('hapus_banyak_pesanan', 'AdminPesananController::delete_banyak_pesanan');

    $routes->add('tambah_detail_pesanan', 'AdminDetailPesananController::insert_detail_pesanan');
    $routes->add('ubah_detail_pesanan/(:segment)', 'AdminDetailPesananController::update_detail_pesanan/$1');
    $routes->add('hapus_detail_pesanan/(:segment)', 'AdminDetailPesananController::delete_detail_pesanan/$1');

    $routes->add('riwayat', 'AdminRiwayatController::index');
    $routes->add('filter_riwayat', 'AdminRiwayatController::filter_riwayat');
    $routes->add('reset_tanggal_riwayat', 'AdminRiwayatController::reset_tanggal');

    $routes->add('laporan', 'AdminLaporanController::index');
    $routes->add('filter_laporan', 'AdminLaporanController::filter_laporan');
    $routes->add('reset_tanggal_laporan', 'AdminLaporanController::reset_tanggal');

    $routes->add('keranjang', 'AdminKeranjangController::index');
    $routes->add('tambah_keranjang', 'AdminKeranjangController::tambah_keranjang');
    $routes->add('ubah_keranjang', 'AdminKeranjangController::update_keranjang');
    $routes->add('hapus_keranjang/(:segment)', 'AdminKeranjangController::hapus_keranjang/$1');
    $routes->add('hapus_total_keranjang', 'AdminKeranjangController::hapus_isi_keranjang');

    $routes->add('produk', 'AdminProdukController::index');
    $routes->add('tambah_produk', 'AdminProdukController::insert_produk');
    $routes->add('ubah_produk/(:segment)', 'AdminProdukController::update_produk/$1');
    $routes->add('delete_produk/(:segment)/', 'AdminProdukController::delete_produk/$1');
    $routes->add('tambah_kel_produk', 'AdminProdukController::insert_kel_produk');
    $routes->add('ubah_kel_produk/(:segment)', 'AdminProdukController::update_kel_produk/$1');
    $routes->add('delete_kel_produk/(:segment)/', 'AdminProdukController::delete_kel_produk/$1/$a');
});



/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
