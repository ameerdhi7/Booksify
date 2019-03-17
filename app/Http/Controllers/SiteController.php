<?php

namespace App\Http\Controllers;

use App\Book;
use App\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;


class SiteController extends Controller
{
    public function home()
    {


        return view("site.home");

    }
    public function search(Request $request)
    {


        $term = $request->term;
        //Here im checking if the type of term is string i will go with title column
        // else meaning the type of term is int so i will go with price column
        if (intval($term) == 0)
            $books = Book::where('title', 'like', "%$term%")->get();
        else
            $books = Book::where('price', 'like', "%$term%")->get();

        $data = [
            "books" => $books
        ];
        return Response::json($data);
    }
    public function getAllBooks()
    {
        $books = Book::orderBy("id", "desc")->with("categories")->paginate(12);
        $response = [
            "success" => true,
            "books" => $books,
        ];
        return \Response::json($response);

    }


}
