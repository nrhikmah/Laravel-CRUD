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

Route::get('/','HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// ke halaman catatans/create
Route::get('/catatans/create', 'CatatansController@create');

// ke halaman catatan detail
Route::get('/catatans/{catatan}', 'CatatansController@show');

//untuk insert data
Route::post('/catatans', 'CatatansController@store');

//untuk delete
Route::delete('/catatans/{catatan}', 'CatatansController@destroy');

// untuk edit
Route::get('/catatans/{catatan}/edit', 'CatatansController@edit');

//untuk update
Route::patch('/catatans/{catatan}', 'CatatansController@update');

