<?php

namespace App\Http\Controllers;

use App\Book;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class OrderSiteController extends Controller
{
    public function orderForm($id)
    {

$ids = \Session::get("books",[]);
        $books = Book::findMany($ids);
        $data = [
            "books" => $books
        ];
        return view("site.site_layouts.order_form", $data);


    }

    public function StoreOrder(Request $request)
    {
        $rules = [
            "phone_number" => "required",
            "city" => "required",
            "region" => "required",
            "books_id" => ["array", "required"],
            "user_id" => "required",
            "title" => "required",
        ];
        $data = $this->validate($request, $rules);
        Order::create($data)->books();
        return view("site.site_success");
    }


    public function orderbyuser(user $user)
    {
        $orders = Order::where("user_id", "like", $user->id)->get();
        $data = [
            "orders" => $orders,
            "user" => $user
        ];
        return view("dashboard.orders.order_by_user", $data);


    }


}
