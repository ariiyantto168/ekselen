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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Categories
Route::get('/categories', 'CategoriesController@index')->name('index');
Route::get('/categories/create-new', 'CategoriesController@create_page')->name('create_page');
Route::post('/categories/create-new', 'CategoriesController@save_page')->name('create_page');
Route::get('/categories/update/{categories}', 'CategoriesController@update_page')->name('edit');
Route::post('/categories/update/{categories}', 'CategoriesController@update_save')->name('update');
Route::delete('/categories/delete/{categories}', 'CategoriesController@delete')->name('delete');


// Kupon
Route::get('/kupons', 'KuponsController@index')->name('index');
Route::get('/kupons/create-new', 'KuponsController@create_page')->name('create_page');
Route::post('/kupons/create-new', 'KuponsController@save_page')->name('create_page');
Route::get('/kupons/update/{kupons}', 'KuponsController@update_page')->name('edit');
Route::post('/kupons/update/{kupons}', 'KuponsController@update_save')->name('edit');
Route::delete('/kupons/delete/{kupons}', 'KuponsController@delete')->name('delete');
