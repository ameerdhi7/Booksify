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
$ids[]=$id;
        $books = Book::findMany($ids);
        $data = [
            "books" => $books
        ];
        return view("site.site_layouts.order_form", $data);
    }
    public function StoreOrder(Request $request)
    {
        $rules = [
            "phone_number" => ["required","regex:/^((((00)|(\+))964|0)?)7[0-9]{9}$/"],
            "city" => "required",
            "region" => "required",
            "books_id" => ["array", "required"],
            "user_id" => "required",
            "title" => "required",
        ];
        $data = $this->validate($request, $rules);
        Order::create($data)->books();
        \Session::forget('books');
        return view("site.site_success");
    }
    public function UserOrders(Order $order)
    {
         $books=Book::findMany($order->books_id);
         $data=["books"=>$books];
       return view("dashboard.orders.items_in_order",$data);

    }


}
