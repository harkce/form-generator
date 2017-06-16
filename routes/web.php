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

Route::resource('forms', 'FormController');

Route::get('categories', 'CategoryController@index');
Route::post('categories', 'CategoryController@store');

Route::get('modules', 'ModuleController@index');
Route::post('modules', 'ModuleController@store');

Route::get('forms/{id}', 'FormController@show');

Route::get('test/{id}', 'FormController@view');

Route::get('upload', 'UploadController@index');
Route::post('store', 'UploadController@store');
Route::get('show', 'UploadController@show');

Route::get('nyobain', function() {
	return '<form method="POST"><input type="hidden" name="coba1" value="haha"/><input type="hidden" name="coba2" value="hehe"/><input type="checkbox" name="vehicle[]" value="Bike"> I have a bike<br><input type="checkbox" name="vehicle[]" value="Car" checked> I have a car<br><input type="submit"/></form>';
});

Route::post('nyobain', 'FormController@nyobain');