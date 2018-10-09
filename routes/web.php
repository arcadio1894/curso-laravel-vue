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
    return view('dashboard');
});

Route::resource('products', 'ProductController')->except([
    'show', 'create', 'edit'
]);

Route::resource('sales', 'SaleController')->except([
    'show', 'create', 'edit'
]);

Route::resource('customers', 'CustomerController')->except([
    'show', 'create', 'edit'
]);

Route::get('/maestro-detalle', function () {
    return view('headerDetail');
});

Route::get('/getProductByID/{id}', 'ProductController@getProductById');