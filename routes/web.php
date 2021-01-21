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
Route::get('/', 'LoginController@index')->name('home');
Route::get('/register', 'RegisterController@view')->name('register.view');
Route::post('/register', 'RegisterController@register')->name('register.post');
Route::post('/login', 'LoginController@logint')->name('login.post');
Route::get('/karyawan_dashboard', 'KaryawanController@index')->name('karyawan.index');
Route::get('/karyawan_pengajuan', 'KaryawanController@form_imp')->name('karyawan.pengajuan');
Route::get('/list_pengajuan', 'KaryawanController@list_pengajuan')->name('list_pengajuan');
