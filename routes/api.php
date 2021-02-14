<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('products', 'ProductController@get_all_products');
Route::get('category/{id}/product', 'ProductController@categorie_product');
Route::get('searchProduct/{name}', 'ProductController@searchProduct');
Route::get('get_subcCategorie', 'CategorieController@get_subcCategorie');

Route::apiResource('product', 'ProductController');
Route::apiResource('Category', 'CategorieController');

