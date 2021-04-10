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

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/admin/home', 'HomeController@index')->name('admin.home');
Route::get('/home', 'HomeController@index')->name('admin.home');
Route::get('/admin/cylinder/show/{id}', 'CylinderController@show')->name('show.cylinder');
Route::get('/admin/history/show/{id}', 'HistoryController@show')->name('show.history');
Route::get('/admin/cylinder', 'CylinderController@index')->name('admin.cylinder');
Route::get('/admin/history', 'HistoryController@index')->name('admin.history');
Route::get('/admin/cylinder/create', 'CylinderController@create')->name('create.cylinder');
Route::post('admin/cylinder/store', 'CylinderController@store')->name('store.cylinder');
Route::get('admin/cylinder/edit/{id}', 'CylinderController@edit')->name('edit.cylinder');
Route::post('admin/cylinder/update/{id}', 'CylinderController@update')->name('update.cylinder');
Route::get('/admin/cylinder/delete/{id}', 'CylinderController@destroy')->name('delete.cylinder');

Route::get('/admin/cylinder/search', 'CylinderController@search')->name('search.cylinder');
Route::get('/admin/history/search', 'HistoryController@search')->name('search.history');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');