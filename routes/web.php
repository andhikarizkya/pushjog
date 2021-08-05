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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/utama', 'HalamanAwalController@index');

Auth::routes();

Route::group(['middleware' => ['auth','checkRole:pemilik,pembeli']],function(){
    Route::get('/home', 'HomeController@index')->name('home');
});

Route::group(['middleware' => ['auth','checkRole:pemilik']],function(){
    Route::resource('penjual/barang','PemilikTokoController');
    Route::get('penjual', 'PesanController@pesanan');
    Route::get('penjual/akun', 'ProfilePemilikController@index');
    Route::post('penjual/akun', 'ProfilePemilikController@update');
});

Route::group(['middleware' => ['auth', 'checkRole:pembeli']], function(){
    Route::get('pesan/{id}', 'PesanController@index');
    Route::post('pesan/{id}', 'PesanController@pesan');
    Route::get('pembeli/keranjang', 'PesanController@check_out');
    Route::delete('pembeli/keranjang/{id}', 'PesanController@delete');
    
    Route::get('pembeli/konfirmasi', 'PesanController@konfirmasi');

    
    Route::get('profile', 'ProfileController@index');
    Route::post('profile', 'ProfileController@update');
    
    Route::get('history', 'HistoryController@index');
    Route::get('history/{id}', 'HistoryController@detail');
});
