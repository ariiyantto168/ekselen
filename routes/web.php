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

// Testimonies
Route::get('/testimonies', 'TestimoniesController@index')->name('index');
Route::get('/testimonies/create-new', 'TestimoniesController@create_page')->name('create_page');
Route::post('/testimonies/create-new', 'TestimoniesController@save_page')->name('create_page');
Route::get('/testimonies/update/{testimonies}', 'TestimoniesController@update_page')->name('edit');
Route::post('/testimonies/update/{testimonies}', 'TestimoniesController@update_save')->name('edit');
Route::delete('/testimonies/delete/{testimonies}', 'TestimoniesController@delete')->name('delete');

// discounts
Route::get('/diskons', 'DiskonsController@index')->name('index');
Route::get('/diskons/create-new', 'DiskonsController@create_page')->name('create_page');
Route::post('/diskons/create-new', 'DiskonsController@save_page')->name('create_page');
Route::get('/diskons/update/{diskons}', 'DiskonsController@update_page')->name('edit');
Route::post('/diskons/update/{diskons}', 'DiskonsController@update_save')->name('edit');
Route::delete('/diskons/delete/{diskons}', 'DiskonsController@delete')->name('delete');

// Referal
Route::get('/referals', 'ReferalsController@index')->name('index');
Route::get('/referals/create-new', 'ReferalsController@create_page')->name('create_page');
Route::post('/referals/create-new', 'ReferalsController@save_page')->name('create_page');
Route::get('/referals/update/{referals}', 'ReferalsController@update_page')->name('edit');
Route::post('/referals/update/{referals}', 'ReferalsController@update_save')->name('edit');
Route::delete('/referals/delete/{referals}', 'ReferalsController@delete')->name('edit');

// Instructors
Route::get('/instructors', 'InstructorsController@index')->name('index');
Route::get('/instructors/create-new', 'InstructorsController@create_page')->name('create_page');
Route::post('/instructors/create-new', 'InstructorsController@save_page')->name('create_page');
Route::get('/instructors/update/{instructors}', 'InstructorsController@update_page')->name('edit');
Route::post('/instructors/update/{instructors}', 'InstructorsController@update_save')->name('edit');
Route::delete('/instructors/delete/{instructors}', 'InstructorsController@delete')->name('delete');

// class 
Route::get('/classes', 'ClassController@index')->name('index');
Route::get('/classes/create-new', 'ClassController@create_page')->name('create_page');
Route::post('/classes/create-new', 'ClassController@save_page')->name('create_page');
Route::get('/classes/update/{classes}', 'ClassController@update_page')->name('edit');
Route::post('/classes/update/{classes}', 'ClassController@update_save')->name('edit');
Route::delete('/classes/delete/{classes}', 'ClassController@delete')->name('delete');

// Highlights
Route::get('/highlights', 'HighlightsController@index')->name('index');
Route::get('/highlights/create-new', 'HighlightsController@create_page')->name('create_page');
Route::post('/highlights/create-new', 'HighlightsController@save_page')->name('create_page');
Route::get('/highlights/update/{highlights}', 'HighlightsController@update_page')->name('edit');