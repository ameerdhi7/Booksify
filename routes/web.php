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
Route::group(["prefix" => "/dashboard", "middleware" => "auth:admin"], function () {
    Route::resource("books", "BookController");
    Route::resource("categories", "CategoryController");
    Route::resource("users", "UsersController");
    Route::resource("employees", "EmployeeController");
    Route::resource("orders", "OrderController");
    Route::get("/orders/{order}/", "OrderSiteController@UserOrders");
});

Route::group(["middleware" => ["auth:admin", "admin.super"]], function () {
    Route::resource("admins", "AdminController");

});


Route::get('/', "SiteController@home");
Route::get('/books/', "SiteController@getallbooks");
Route::get('/booksbysearch/', "SiteController@search");
Route::group(["middleware" => "auth"], function () {

    Route::get('/books/orders/{book}', "OrderSiteController@orderform");
    Route::post('/books/orders/create/', "OrderSiteController@storeorder"); //store order
    Route::post('/books/carts/add/{book}', "CartSiteController@addToCart"); //add new way to cart
    Route::get('/books/carts/', "CartSiteController@index"); //cart index
    Route::get('/books/carts/cart', "CartSiteController@ShowCarts"); //get user cart via api
    Route::delete('/books/carts/{book}', "CartSiteController@delete"); //delete cart
}
);
/////////admin auth routes
Route::get('/admin/login', 'admin\LoginAdminController@showLoginForm')->name("admin.login");
Route::post('/admin/login', 'admin\LoginAdminController@login');
Route::post('/admin/logout', 'admin\LoginAdminController@logout');
///////////
//user auth routes
Auth::routes();
//////
