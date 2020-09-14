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

Auth::routes();
Route::get('/admin', 'UserController@login');
Route::post('/admin', 'UserController@loginPost');
Route::get('/admin/home', 'UserController@adminHome');

Route::get('/admin/car', 'CarController@index');
Route::get('/admin/car/create', 'CarController@create');
Route::post('/admin/car/create', 'CarController@createPost');
Route::delete('/admin/car/{car}', 'CarController@destroy');
Route::get('/admin/car/{car}/edit', 'CarController@edit');
Route::patch('/admin/car/{car}', 'CarController@update');
Route::get('/admin/car/search', 'CarController@search');

Route::get('/admin/brand', 'BrandController@index');
Route::get('/admin/brand/create', 'BrandController@create');
Route::post('/admin/brand/create', 'BrandController@createPost');
Route::delete('/admin/brand/{brand}', 'BrandController@destroy');
Route::get('/admin/brand/{brand}/edit', 'BrandController@edit');
Route::patch('/admin/brand/{brand}', 'BrandController@update');
Route::get('/admin/brand/search', 'BrandController@search');

Route::get('/admin/user', 'UserController@list');
Route::get('/admin/user/create', 'UserController@create');
Route::post('/admin/user/create', 'UserController@createPost');
Route::delete('/admin/user/{user}', 'UserController@destroy');
Route::get('/admin/user/{user}/edit', 'UserController@edit');
Route::patch('/admin/user/{user}', 'UserController@update');
Route::get('/admin/user/search', 'UserController@search');

Route::get('/admin/review', 'ReviewController@index');
Route::get('/admin/review/create', 'ReviewController@create');
Route::post('/admin/review/create', 'ReviewController@createPost');
Route::delete('/admin/review/{review}', 'ReviewController@destroy');
Route::get('/admin/review/{review}/edit', 'ReviewController@edit');
Route::patch('/admin/review/{review}', 'ReviewController@update');
Route::get('/admin/review/search', 'ReviewController@search');



Route::get('/', 'UserController@redirecthome');
Route::get('/home', 'UserController@home');
Route::get('/login', 'UserController@login')->name('login');
Route::post('/login', 'UserController@loginPost')->name('login');
Route::get('/logout', 'UserController@logout')->name('logout');
Route::get('/register', 'UserController@register');
Route::post('/register', 'UserController@registerPost');
Route::get('/car', 'CarController@allList');
Route::get('/car/search', 'CarController@list');
Route::get('/brand', 'BrandController@allList');
Route::get('/brand/search', 'BrandController@list');
Route::get('/car/{car}', 'CarController@detail');
Route::post('/car/create', 'ReviewController@reviewPost');
Route::patch('/car/{car}', 'ReviewController@updateReview');
Route::get('/car/{id_car}/{id_review}/edit', 'ReviewController@editReview');
Route::delete('/car/{car}', 'ReviewController@destroyReview');
Route::get('/brand/{brand}', 'BrandController@detail');
