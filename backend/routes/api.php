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
//USERS
Route::get('product','ProductController@getAll')->name('products.list');
Route::post('register','UserController@add')->name('user.add');
Route::post('login','AuthenticateController@authenticate')->name('login');
//PRODUCTS
Route::post('product','ProductController@add')->name('product.add');
Route::get('product/{id}','ProductController@get')->name('product.get');
Route::get('category/{id}','CategoriaController@ListProducts')->name('category.get');
Route::post('product/delete/{id}','ProductController@delete')->name('product.delete');
Route::get('/product/file/{filename}','ProductController@getImage')->name('product.file');
Route::group(['middleware' => ['cors']], function () {
    //Rutas a las que se permitirá acceso
    


});



//CATEGORIES

