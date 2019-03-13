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
    Route::resource("books","bookcontroller");
    Route::resource("categories","categorycontroller");
    Route::resource("users","userscontroller");
    Route::resource("orders","ordercontroller");
    Route::get("/user/orders/{user}","ordersitecontroller@orderbyuser");
});

Route::group(["middleware"=>["auth:admin","admin.super"]],function (
){
    Route::resource("admins","admincontroller");

});


Route::get('/',"sitecontroller@home");
Route::get('/books/',"sitecontroller@getallbooks");
Route::get('/booksbysearch/',"sitecontroller@search");
Route::group(["middleware"=>"auth"],function (){

    Route::get('/books/orders/{book}',"ordersitecontroller@orderform");
    Route::post('/books/orders/create/',"ordersitecontroller@storeorder");
    Route::post('/books/carts/',"cartsitecontroller@store"); //store to cart
    Route::delete('/books/carts/{cart}',"cartsitecontroller@delete"); //delete cart
}
);
/////////admin auth routes
Route::get('/admin/login', 'Admin\LoginAdminController@showLoginForm')->name("admin.login");
Route::post('/admin/login', 'Admin\LoginAdminController@login');
Route::post('/admin/logout', 'Admin\LoginAdminController@logout');
///////////
Auth::routes();
//////
Route::get('/home', 'HomeController@index')->name('home');
