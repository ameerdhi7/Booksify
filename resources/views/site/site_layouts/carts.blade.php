@extends("site.site_layouts.site_master")
@section("content")
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-12 mt-3">
                <div class="card">
                    <div class="card-header-info m-0 blue-gradient-rgba card-header">
                        <h5>        {{auth()->user()->name}}' books
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table bg-light table-shopping">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>book poster</th>
                                    <th>title</th>
                                    <th class="th-description">price</th>
                                    <th class="th-description">author</th>
                                    <th>remove books</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($carts as $cart)
                                    @foreach($cart->books as $book)
                                        <tr>
                                            <td>
                                                {{$cart->id}}
                                            </td>
                                            <td>
                                                <div class="img-container ">
                                                    <img src="/{{$book->poster}}" alt="...">
                                                </div>
                                            </td>
                                            <td class="td-name">
                                                {{$book->title}}
                                            </td>
                                            <td>
                                                {{$book->price}} &dollar;
                                            </td>
                                            <td>
                                                {{$book->author}}</td>
                                            <td>
                                                <form action="/books/carts/{{$cart->id}}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-round btn-danger btn-sm" type="submit">
                                                        <i class="material-icons"> remove</i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection