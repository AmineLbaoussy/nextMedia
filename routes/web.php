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

// Route::get('/', function () {
//     return view('welcome');
// });

  Route::get('/', 'ProductController@index')->name('home');

  
  // Route::get('{any}', 'ProductController@index')->where('any', '.*');
  Route::get('commed', function () {
    Artisan::call('create:category');
    return 'success';
  });


  Route::get('/{any}', function ($any) {
    return view('pages.product.index');
  })->where('any', '.*');



