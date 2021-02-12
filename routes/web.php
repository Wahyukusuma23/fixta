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
Route::post('/karyawan_pengajuan', 'KaryawanController@form_imp_post')->name('karyawan.pengajuan.post');
Route::get('/list_pengajuan', 'KaryawanController@list_pengajuan')->name('list_pengajuan');

Route::get('/line_leader', 'KaryawanController@line_leader')->name('line_leader');
Route::get('/supervisor', 'KaryawanController@supervisor')->name('supervisor');
Route::get('/human_resources', 'KaryawanController@human_resources')->name('human_resources');
Route::get('/human_resources_opt', 'KaryawanController@human_resources_option')->name('human_resources_option');
Route::get('/human_resources_report', 'KaryawanController@human_resources_report')->name('human_resources_report');
Route::get('logout', 'LoginController@logout')->name('user.logout');
Route::post('ll_accept', 'KaryawanController@ll_accept')->name('ll_accept');
