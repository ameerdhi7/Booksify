<!-- ================ TO SHOW item in order=========== -->
@extends("layouts.master")
@section("content")
    <div class="row justify-content-center mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card-header blue-gradient-rgba text-white m-0">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto"><h4> ITEMS IN ORDER</h4></div>
                        <div class="col-auto"></div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>poster</th>
                                <th>book title</th>
                                <th>book price</th>
                                <th>book author</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($books as $book)
                                <tr>

                                    <td class="text-center">{{$book->id}}</td>
                                    <td>
                                        <img src="/{{$book->poster}}" alt="poster" class="poster_height"></td>
                                    <td>{{$book->title}}</td>
                                    <td>{{$book->price}} &dollar;</td>
                                    <td>{{$book->author}}</td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection

