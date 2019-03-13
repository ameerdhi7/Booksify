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
Route::group(["prefix"=>"/dashboard","middleware"=>"auth:admin"],function (
){
    Route::resource("books","BookController");
    Route::resource("categories","CategoryController");
    Route::resource("users","UsersController");
    Route::resource("orders","OrderController");
    Route::get("/user/orders/{user}","OrderSiteController@orderbyuser");
});

Route::group(["middleware"=>["auth:admin","admin.super"]],function (
){
    Route::resource("admins","AdminController");

});


Route::get('/',"SiteController@home");
Route::get('/books/',"SiteController@getallbooks");
Route::get('/booksbysearch/',"SiteController@search");
Route::group(["middleware"=>"auth"],function (){

    Route::get('/books/orders/{book}',"OrderSiteController@orderform");
    Route::post('/books/orders/create/',"OrderSiteController@storeorder");
    Route::post('/books/carts/',"CartSiteController@store"); //store to cart
    Route::get('/books/carts/',"CartSiteController@index"); //index to cart
    Route::get('/books/carts/user',"CartSiteController@getusercarts"); //get user carts
    Route::delete('/books/carts/{cart}',"CartSiteController@delete"); //delete cart
}
);
/////////admin auth routes
Route::get('/admin/login', 'Admin\LoginAdminController@showLoginForm')->name("admin.login");
Route::post('/admin/login', 'Admin\LoginAdminController@login');
Route::post('/admin/logout', 'Admin\LoginAdminController@logout');
///////////
Auth::routes();
//////
