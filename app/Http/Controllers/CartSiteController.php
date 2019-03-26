<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Book;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use vendor\project\StatusTest;


class CartSiteController extends Controller
{
    //لا تنسى تصفر الكارتس من يصير جيك اوت
    public function index()
    {
        return view("site.carts_index");
    }
public function addToCart(Book $book){
       $books = \Session::get("books",[]);
       if(in_array($book->id,$books)){ //اذا موجود لاتسوي شي اذا مموجود خلي
           return;
       }
       $books[] = $book->id;
       \Session::put("books",$books);


}

    public function ShowCarts(){

        $ids = \Session::get("books",[]);
        $books=Book::findMany($ids);
        $data=["success"=>"true",
            "books"=>$books];
        return \Illuminate\Support\Facades\Response::json($data);


    }

    public function delete(book $book)
    {
        $books = \Session::get("books",[]);
        unset($books[array_search($book->id,$books,true)]);
        \session::put("books",$books);
        return \Illuminate\Support\Facades\Response::redirectTo("books/carts/");

    }

}
