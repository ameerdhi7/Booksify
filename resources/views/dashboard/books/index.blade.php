<!-- ================ BOOKS INDEX ============ -->
@extends("layouts.master")
@section("content")

    <div class="row justify-content-center mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card-header blue-gradient-rgba text-white m-0">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto"><h4>Books Table</h4></div>
                        <div class="col-auto"><a class="btn btn-success btn-round btn-sm blue-gradient-rgba"
                                                 href="/dashboard/books/create"><i class="material-icons">add</i></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Title</th>
                                <th>Price</th>
                                <th>Author</th>
                                <th>Edition Number</th>
                                <th>Edition Year</th>
                                <th>Book ISBN</th>
                                <th class="text-center">Poster</th>
                                <th class="text-center">Category</th>
                                <th class="text-right">Actions</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($books as $book)
                                <tr>

                                    <td class="text-center">{{$book->id}}</td>
                                    <td>{{$book->title}}</td>
                                    <td>{{$book->price}} &dollar;</td>
                                    <td>{{$book->author}}</td>
                                    <td>{{$book->edition_number}}</td>
                                    <td>{{$book->edition_year}}</td>
                                    <td>{{$book->isbn}}</td>
                                    <td class="text-center">
                                        <img src="/{{$book->poster}}" alt="poster" class="poster_height"></td>
                                    <td>
                                        @foreach($book->categories as $categroy)
                                            {{$categroy->type}}
                                        @endforeach
                                    </td>
                                    <td class="td-actions text-right">

                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="/dashboard/books/{{$book->id}}/edit" class="btn btn-info"> <i
                                                        class="material-icons">edit</i>
                                            </a>

                                            <form action="/dashboard/books/{{$book->id}}" METHOD="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn-danger btn"><i class="material-icons">close</i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <h1>{{ $books->links() }}
                        </h1>
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection

