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

// Authentication
Route::get('/', 'AuthController@index');
Route::get('/register', 'AuthController@register_form');
Route::post('/register/save', 'AuthController@register_save');
Route::post('/cek-login', 'AuthController@cek_login');
Route::get('/profil/{id}', 'AuthController@profil');
Route::post('/profil/update', 'AuthController@update_profil');
Route::get('/logout', 'AuthController@logout');

// Dashboard Routes
Route::get('/home', 'HomeController@index');

// Antrian Routes
Route::get('/antrian', 'AntrianController@index');
Route::get('/antrian/detail/{id}', 'AntrianController@detail');
Route::post('/antrian/update', 'AntrianController@update');
Route::get('/antrian/delete/{id}', 'AntrianController@delete');

// Poli Routes
Route::get('/poli', 'PoliController@index');
Route::get('/poli/add', 'PoliController@add');
Route::post('/poli/save', 'PoliController@save');
Route::get('/poli/edit/{id}', 'PoliController@edit');
Route::post('/poli/update', 'PoliController@update');
Route::get('/poli/delete/{id}', 'PoliController@delete');

// Dokter Routes
Route::get('/dokter', 'DokterController@index');
Route::get('/dokter/add', 'DokterController@add');
Route::post('/dokter/save', 'DokterController@save');
Route::get('/dokter/edit/{id}', 'DokterController@edit');
Route::post('/dokter/update', 'DokterController@update');
Route::get('/dokter/delete/{id}', 'DokterController@delete');

// Jadwal Praktik Routes
Route::get('/jadwal', 'JadwalController@index');
Route::get('/jadwal/add', 'JadwalController@add');
Route::get('/jadwal/dokter/get/{id}', 'JadwalController@get_dokter');
Route::post('/jadwal/save', 'JadwalController@save');
Route::get('/jadwal/edit/{id}', 'JadwalController@edit');
Route::post('/jadwal/update', 'JadwalController@update');
Route::get('/jadwal/delete/{id}', 'JadwalController@delete');

// Data Penyakit Routes
Route::get('/penyakit', 'PenyakitController@index');
Route::get('/penyakit/kat/add', 'PenyakitController@add_category');
Route::post('/penyakit/kat/save', 'PenyakitController@save_category');
Route::get('/penyakit/kat/edit/{id}', 'PenyakitController@edit_category');
Route::post('/penyakit/kat/update', 'PenyakitController@update_category');
Route::get('/penyakit/kat/delete/{id}', 'PenyakitController@delete_category');
Route::get('/penyakit/add', 'PenyakitController@add');
Route::post('/penyakit/save', 'PenyakitController@save');
Route::get('/penyakit/detail/{id}', 'PenyakitController@detail');
Route::get('/penyakit/edit/{id}', 'PenyakitController@edit');
Route::post('/penyakit/update', 'PenyakitController@update');
Route::get('/penyakit/delete/{id}', 'PenyakitController@delete');

// Data Obat Routes
Route::get('/obat', 'ObatController@index');
Route::get('/obat/detail/{id}', 'ObatController@detail');
Route::get('/obat/add', 'ObatController@add');
Route::post('/obat/save', 'ObatController@save');
Route::get('/obat/edit/{id}', 'ObatController@edit');
Route::post('/obat/update', 'ObatController@update');
Route::get('/obat/delete/{id}', 'ObatController@delete');

// Admin Data Routes
Route::get('/data-admin', 'AdminController@index');
Route::get('/data-admin/delete/{id}', 'AdminController@delete');

// User Data Routes
Route::get('/data-user', 'UserController@index');
Route::get('/data-user/delete/{id}', 'UserController@delete');
