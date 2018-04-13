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

Auth::routes();

Route::get('/', 'ProductsController@index');

Route::get('/dashboard', 'DashboardController@index');

Route::get('/categories', 'CategoriesController@index');

Route::get('/welkom', 'PagesController@index');

Route::get('/about', function(){
	return view('pages.about');
});

Route::get('/users/{id}/{name}', function($id, $name){
	return 'This is user '.$name;
});

Route::resource('products', 'ProductsController');Route::resource('categories', 'CategoriesController');