<?php

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

use Illuminate\Http\Request;


Route::get('/login', 'AuthController@index');
Route::post('/postLogin', 'AuthController@postLogin');



Route::group(['middleware' => ['auth', 'CheckRole:admin']], function () {
    Route::get('/dashboard', 'DashboardController@index');
    Route::get('/coba', 'DashboardController@coba');
    Route::post('/coba/create', 'DashboardController@create');

    Route::get('/profil/admin/{id}', 'DashboardController@profil');
    Route::post('/profil/{id}', 'DashboardController@update');



    Route::post('/masuk/create', 'BarangController@create');
    Route::get('/barang/{id}/hapus', 'BarangController@hapus');
    Route::get('/barang/{id}/edit', 'BarangController@edit');
    Route::post('/barang/edit/{id}', 'BarangController@ubah');
    Route::get('/cetakbarang', 'BarangController@cetakbarang');


    Route::get('/cobadisabled', 'CobaController@disabled');
    Route::post('/disabledcreate', 'CobaController@create');

    Route::get('/suplier', 'SuplierController@index');


    Route::post('/suplier/create', 'SuplierController@create');
    Route::get('/suplier/{id}/delete', 'SuplierController@delete');
    Route::get('/suplier/{id}/update', 'SuplierController@update');
    Route::post('/suplier/{id}/edit', 'SuplierController@edit');

    Route::get('/kategoribarang', 'KategoribarangController@index');
    Route::get('/kategoribarang/{id}/delete', 'KategoribarangController@delete');
    Route::post('/kategoribarang/create', 'KategoribarangController@create');
    Route::get('/kategoribarang/{id}/ubah', 'KategoribarangController@ubah');
    Route::post('kategoribarang/{id}/update', 'KategoribarangController@update');

    Route::get('/databarang', 'BarangController@index');

    Route::get('/barangmasuk', 'BarangmasukController@index');
    Route::get('/barangmasuk/detail/{id}', 'BarangmasukController@detail');

    Route::get('/barangmasuk/{id}/hapus', 'BarangmasukController@hapus');
    Route::get('/barangmasuk/{id}/edit', 'BarangmasukController@edit');
    Route::post('/barangmasuk/{id}/update', 'BarangmasukController@update');
    Route::get('/cetakmasuk', 'BarangmasukController@cetak');
    Route::post('/cetakmasukpost', 'BarangmasukController@cetakpost');
    Route::get('/cetak', 'BarangmasukController@cetakhungkul');

    Route::get('/tambahbarangmasuk', 'BarangmasukController@tambah');
    Route::post('/tambahmasuk', 'BarangmasukController@cek');
    Route::get('/temukanharga', 'BarangmasukController@temukan');
});
Route::group(['middleware' => ['auth', 'CheckRole:kasir']], function () {
    Route::get('/dashboardkasir', 'KasirController@index');
    Route::get('/transaksi', 'TransaksiController@index');
    Route::get('/tambahtransaksi', 'TransaksiController@tambah');

    Route::get('/percobaan', 'PercobaanController@index');

    Route::get('/kasir/profile/{id}', 'KasirController@profile');
    Route::post('/profile/ubah/{id}', 'KasirController@ubahprofile');

    Route::get('/invoice', 'InvoiceController@index');
    Route::get('/transaksiview/id', 'InvoiceController@transaksiview');

    Route::post('/tambahinvoice', 'InvoiceController@tambahinvoice');


    Route::get('/transaksi/detail/{id}', 'InvoiceController@detail');


    // Route::get('/transaksi/{id}/detailtransaksi', 'InvoiceController@detailtransaksi');


    Route::get('/nyobaan', 'InvoiceController@nyobaanlagi');

    Route::get('/cariharga', 'InvoiceController@cariharga');

    Route::get('/findPrice', 'TransaksiController@findPrice');

    Route::get('/laporantransaksi', 'TransaksiController@laporan');
    Route::Post('/cetaklaporan', 'TransaksiController@laporantanggal');

    Route::get('/generator', 'CobaController@home');
    Route::post('/testhungkul', 'CobaController@index');
});
