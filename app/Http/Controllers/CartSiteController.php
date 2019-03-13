<?php

namespace App\Http\Controllers;
use App\cart;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use vendor\project\StatusTest;


class CartSiteController extends Controller
{
    public function store(Request $request){
      $request->user_id=intval($request->user_id);
        $rules=[
            "books"=>"required",
            "user_id"=>"required"
        ];
        $data=$this->validate($request,$rules);
           cart::create($data)->books()->sync($request->books);
           $carts=cart::all()->where("user_id","equal","$request->user_id");
         $data=[
               "carts"=>$carts
           ];
           return view("site.site_layouts.carts",$data);

    }

public function delete(cart $cart){
    $cart->delete();
    $cart->user_id=intval($cart->user_id);
    $carts=cart::all()->where("user_id","equal","$cart->user_id");
    $data=[
        "carts"=>$carts
    ];
    return view("site.site_layouts.carts",$data);


}

}
