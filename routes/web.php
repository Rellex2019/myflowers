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

Route::get('/', 'IndexController@show')
    ->name('home.index');

Route::get('/about_us', 'AboutUsController@show')
    ->name('about_us.index');




Route::get('/login', 'LoginController@show')
    ->name('login.index');

Route::post('/login/enter', 'LoginController@enter')
    ->name('login.enter');
Route::get('/login/logout', 'LoginController@exit')
    ->name('login.logout');


Route::get('/registration', 'RegisterController@show')
    ->name('register.index');

Route::post('/registration/create', 'RegisterController@store')
    ->name('register.create');



Route::get('/basket/', 'BasketController@show')
    ->name('basket.index');


Route::get('/catalog', 'CatalogController@show')
    ->name('catalog.index');
Route::get('/catalog/{id_product}', 'CatalogController@show_one')
    ->name('catalog.one_product');

Route::get('/whereplace', 'WherePlaceController@show')
    ->name('whereplace.index');

Route::get('/admin', 'AdminController@show')
    ->name('admin.index');

Route::get('/admin/add_product', 'AdminController@show_panel_add_product')
    ->name('admin.add.product');

Route::post('/admin/add_product_base', 'AdminController@store')
    ->name('add.product.store');

Route::get('/admin/product_list', 'AdminController@show_list')
    ->name('product.list');
