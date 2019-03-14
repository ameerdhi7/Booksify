<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Book;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use vendor\project\StatusTest;


class CartSiteController extends Controller
{
    public function index()
    {

        return view("site.carts_index");

    }

    public function getUserCarts(Request $request)
    {
        $request->userid = intval($request->userid);
        $carts = Cart::all()->where("user_id", "equal", "$request->userid")->load("books");
        $data = [
            "success" => true,

            "carts" => $carts
        ];
        return \Illuminate\Support\Facades\Response::json($data);


    }

    public function store(Request $request)
    {
        $request->user_id = intval($request->user_id);
        $rules = [
            "books" => "required",
            "user_id" => "required"
        ];
        $data = $this->validate($request, $rules);
        Cart::create($data)->books()->sync($request->books);
//
        return \Illuminate\Support\Facades\Response::redirectTo("/books/carts/");
    }

    public function delete(cart $cart)
    {
        $cart->delete();
//
        return \Illuminate\Support\Facades\Response::redirectTo("books/carts/");

    }

}
