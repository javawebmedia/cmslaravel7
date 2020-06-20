<?php
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

/* FRONT END */
// Home
Route::get('/', 'Home@index');
Route::get('home', 'Home@index');
Route::get('kontak', 'Home@kontak');
Route::get('pemesanan', 'Home@pemesanan');
Route::get('konfirmasi', 'Home@konfirmasi');
Route::get('pembayaran', 'Home@pembayaran');
Route::post('proses_pemesanan', 'Home@proses_pemesanan');
Route::get('berhasil/{par1}', 'Home@berhasil');
Route::get('cetak/{par1}', 'Home@cetak');
// Login
Route::get('login', 'Login@index');
Route::post('login/cek', 'Login@cek');
Route::get('login/lupa', 'Login@lupa');
Route::get('login/logout', 'Login@logout');
// Berita
Route::get('berita', 'Berita@index');
Route::get('berita/read/{par1}', 'Berita@read');
// download
Route::get('download', 'Download@index');
Route::get('download/unduh/{par1}', 'Download@unduh');
// galeri
Route::get('galeri', 'Galeri@index');
Route::get('galeri/detail/{par1}', 'Galeri@detail');
// video
Route::get('video', 'Video@index');
Route::get('video/detail/{par1}', 'Video@detail');
// Produk
Route::get('produk', 'Produk@index');
Route::get('produk/kategori/{par1}', 'Produk@kategori');
Route::get('produk/detail/{par1}', 'Produk@detail');
Route::get('produk/cetak/{par1}', 'Produk@cetak');
/* END FRONT END */
/* BACK END */
Route::group(['namespace' => 'Admin'], 
function()
{
	// dasbor
    Route::get('admin/dasbor', 'Dasbor@index');
    Route::get('admin/dasbor/konfigurasi', 'Dasbor@konfigurasi');
    // pemesanan
    Route::get('admin/pemesanan', 'Pemesanan@index');
    Route::get('admin/pemesanan/tambah', 'Pemesanan@tambah');
    Route::get('admin/pemesanan/detail/{par1}', 'Pemesanan@detail');
    Route::get('admin/pemesanan/status_pemesanan/{par1}', 'Pemesanan@status_pemesanan');
    Route::get('admin/pemesanan/cetak/{par1}', 'Pemesanan@cetak');
    Route::get('admin/pemesanan/edit/{par1}', 'Pemesanan@edit');
    Route::get('admin/pemesanan/filter/{par1}/{par2}/{par3}', 'Pemesanan@filter');
    Route::get('admin/pemesanan/cari', 'Pemesanan@cari');
    Route::post('admin/pemesanan/proses', 'Pemesanan@proses');
    Route::post('admin/pemesanan/tambah_proses', 'Pemesanan@tambah_proses');
    Route::post('admin/pemesanan/edit_proses', 'Pemesanan@edit_proses');
    // user
    Route::get('admin/user', 'User@index');
    Route::post('admin/user/tambah', 'User@tambah');
    Route::get('admin/user/edit/{par1}', 'User@edit');
    Route::post('admin/user/proses_edit', 'User@proses_edit');
    Route::get('admin/user/delete/{par1}', 'User@delete');
    Route::post('admin/user/proses', 'User@proses');
    // konfigurasi
    Route::get('admin/konfigurasi', 'Konfigurasi@index');
    Route::get('admin/konfigurasi/logo', 'Konfigurasi@logo');
    Route::get('admin/konfigurasi/icon', 'Konfigurasi@icon');
    Route::get('admin/konfigurasi/email', 'Konfigurasi@email');
    Route::get('admin/konfigurasi/gambar', 'Konfigurasi@gambar');
    Route::get('admin/konfigurasi/pembayaran', 'Konfigurasi@pembayaran');
    Route::post('admin/konfigurasi/proses', 'Konfigurasi@proses');
    Route::post('admin/konfigurasi/proses_logo', 'Konfigurasi@proses_logo');
    Route::post('admin/konfigurasi/proses_icon', 'Konfigurasi@proses_icon');
    Route::post('admin/konfigurasi/proses_email', 'Konfigurasi@proses_email');
    Route::post('admin/konfigurasi/proses_gambar', 'Konfigurasi@proses_gambar');
    Route::post('admin/konfigurasi/proses_pembayaran', 'Konfigurasi@proses_pembayaran');
    // berita
    Route::get('admin/berita', 'Berita@index');
    Route::get('admin/berita/cari', 'Berita@cari');
    Route::get('admin/berita/status_berita/{par1}', 'Berita@status_berita');
    Route::get('admin/berita/kategori/{par1}', 'Berita@kategori');
    Route::get('admin/berita/jenis_berita/{par1}', 'Berita@jenis_berita');
    Route::get('admin/berita/author/{par1}', 'Berita@author');
    Route::get('admin/berita/tambah', 'Berita@tambah');
    Route::get('admin/berita/edit/{par1}', 'Berita@edit');
    Route::get('admin/berita/delete/{par1}', 'Berita@delete');
    Route::post('admin/berita/tambah_proses', 'Berita@tambah_proses');
    Route::post('admin/berita/edit_proses', 'Berita@edit_proses');
    Route::post('admin/berita/proses', 'Berita@proses');
    // rekening
    Route::get('admin/rekening', 'Rekening@index');
    Route::get('admin/rekening/edit/{par1}', 'Rekening@edit');
    Route::post('admin/rekening/tambah', 'Rekening@tambah');
    Route::post('admin/rekening/proses_edit', 'Rekening@proses_edit');
    Route::get('admin/rekening/delete/{par1}', 'Rekening@delete');
    Route::post('admin/rekening/proses', 'Rekening@proses');
    // kategori
    Route::get('admin/kategori', 'Kategori@index');
    Route::post('admin/kategori/tambah', 'Kategori@tambah');
    Route::post('admin/kategori/edit', 'Kategori@edit');
    Route::get('admin/kategori/delete/{par1}', 'Kategori@delete');
    // video
    Route::get('admin/video', 'Video@index');
    Route::get('admin/video/edit/{par1}', 'Video@edit');
    Route::post('admin/video/tambah', 'Video@tambah');
    Route::post('admin/video/proses_edit', 'Video@proses_edit');
    Route::get('admin/video/delete/{par1}', 'Video@delete');
    Route::post('admin/video/proses', 'Video@proses');
    // kategori_produk
    Route::get('admin/kategori_produk', 'Kategori_produk@index');
    Route::post('admin/kategori_produk/tambah', 'Kategori_produk@tambah');
    Route::post('admin/kategori_produk/edit', 'Kategori_produk@edit');
    Route::get('admin/kategori_produk/delete/{par1}', 'Kategori_produk@delete');
    // kategori_download
    Route::get('admin/kategori_download', 'Kategori_download@index');
    Route::post('admin/kategori_download/tambah', 'Kategori_download@tambah');
    Route::post('admin/kategori_download/edit', 'Kategori_download@edit');
    Route::get('admin/kategori_download/delete/{par1}', 'Kategori_download@delete');
    // kategori_galeri
    Route::get('admin/kategori_galeri', 'Kategori_galeri@index');
    Route::post('admin/kategori_galeri/tambah', 'Kategori_galeri@tambah');
    Route::post('admin/kategori_galeri/edit', 'Kategori_galeri@edit');
    Route::get('admin/kategori_galeri/delete/{par1}', 'Kategori_galeri@delete');
    // produk
    Route::get('admin/produk', 'Produk@index');
    Route::get('admin/produk/cari', 'Produk@cari');
    Route::get('admin/produk/status_produk/{par1}', 'Produk@status_produk');
    Route::get('admin/produk/kategori/{par1}', 'Produk@kategori');
    Route::get('admin/produk/tambah', 'Produk@tambah');
    Route::get('admin/produk/edit/{par1}', 'Produk@edit');
    Route::get('admin/produk/delete/{par1}', 'Produk@delete');
    Route::post('admin/produk/tambah_proses', 'Produk@tambah_proses');
    Route::post('admin/produk/edit_proses', 'Produk@edit_proses');
    Route::post('admin/produk/proses', 'Produk@proses');
    // galeri
    Route::get('admin/galeri', 'Galeri@index');
    Route::get('admin/galeri/cari', 'Galeri@cari');
    Route::get('admin/galeri/status_galeri/{par1}', 'Galeri@status_galeri');
    Route::get('admin/galeri/kategori/{par1}', 'Galeri@kategori');
    Route::get('admin/galeri/tambah', 'Galeri@tambah');
    Route::get('admin/galeri/edit/{par1}', 'Galeri@edit');
    Route::get('admin/galeri/delete/{par1}', 'Galeri@delete');
    Route::post('admin/galeri/tambah_proses', 'Galeri@tambah_proses');
    Route::post('admin/galeri/edit_proses', 'Galeri@edit_proses');
    Route::post('admin/galeri/proses', 'Galeri@proses');
    // download
    Route::get('admin/download', 'Download@index');
    Route::get('admin/download/cari', 'Download@cari');
    Route::get('admin/download/status_download/{par1}', 'Download@status_download');
    Route::get('admin/download/kategori/{par1}', 'Download@kategori');
    Route::get('admin/download/tambah', 'Download@tambah');
    Route::get('admin/download/edit/{par1}', 'Download@edit');
    Route::get('admin/download/unduh/{par1}', 'Download@unduh');
    Route::get('admin/download/delete/{par1}', 'Download@delete');
    Route::post('admin/download/tambah_proses', 'Download@tambah_proses');
    Route::post('admin/download/edit_proses', 'Download@edit_proses');
    Route::post('admin/download/proses', 'Download@proses');
});
/* END BACK END*/



