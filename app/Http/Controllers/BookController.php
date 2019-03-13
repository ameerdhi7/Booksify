<?php

namespace App\Http\Controllers;
use Adsdsdsdspp\Category;
use app\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $books=book::with("categories")->paginate(10);
        $data=["books"=>$books];
        return view("dashboard.books.index",$data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = category::all();
        $data = [
            "categories" => $categories
        ];
        return view("dashboard.books.create",$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $rules=[

            "title"=>"required",
            "price"=>"required",
            "author"=>"required",
            "isbn"=>"required",
            "edition_number"=>"required",
            "edition_year"=>"required",
            "poster"=>['required','image'],

        ];
        if (request()->poster!="")
        $url=request()->poster->store('uploads');
        $data=$this->validate($request,$rules);
        $data["poster"]=$url;

        Book::create($data)->categories()->sync($request->categories);
        return Response::redirectTo("dashboard/books/");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $data=["book"=>$book];
        return view("dashboard.books.update",$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $rules=[

            "title"=>"required",
            "price"=>"required",
            "author"=>"required",
            "isbn"=>"required",
            "edition_number"=>"required",
            "edition_year"=>"required",
            "poster"=>['required','image'],


        ];
        if (request()->poster!="")
            $url=request()->poster->store('uploads');
        $data=$this->validate($request,$rules);
        $data["poster"]=$url;
        $book->update($data);
        $book->categories()->sync($request->categories);
        return Response::redirectTo("dashboard/books/");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return Response::redirectTo("/dashboard/books/");
    }
}
