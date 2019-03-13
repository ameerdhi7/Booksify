<!-- =========== Books update form view===========-->

@extends("layouts.master")
@section("content")

    <div class="row mt-5 justify-content-center">
        <div class="col-sm-6">
            @include("layouts.errors")
            <div class="card">
                <h5 class="card-header blue-gradient-rgba text-white text-center py-4">
                    Update Book
                </h5>
                <!--Card content-->
                <div class="card-body px-lg-5">

                    <!-- Form -->
                    <form action="/dashboard/books/{{$book->id}}" method="post" class="text-center"
                          enctype="multipart/form-data">
                        @csrf
                        @method('patch')

                        <div class="row align-items-center justify-content-between mt-4">
                            <div class="col-5">
                                <!-- Book title -->

                                <input type="text" name="title" type="text" id="title" class="form-control"
                                       value="{{old('title',"$book->title")}}">
                                <label for="title">Book Title</label>

                            </div>
                            <div class="col-5">
                                <!-- Book price -->
                                <input name="price" type="number" id="price" class="form-control"
                                       value="{{old('price',"$book->price")}}">
                                <label for="price">Book Price</label>
                            </div>

                        </div>
                        <div class="row justify-content-between align-items-center mt-4">
                            <div class="col-5">
                                <!-- Book  author-->
                                <input name="author" type="text" id="author" class="form-control"
                                       value="{{old('author',"$book->author")}}">
                                <label for="author">Book author</label>
                            </div>
                            <div class="col-5">
                                <!-- Book  edition number-->

                                <input name="edition_number" type="number" id="edition_number" class="form-control"
                                       value="{{old('edition_number',"$book->edition_number")}}">
                                <label for="edition_number">Edition Number</label>
                            </div>

                        </div>
                        <div class="row justify-content-between align-items-center mt-4">
                            <div class="col-5">
                                <!-- Book  edition year-->

                                <input name="edition_year" type="number" id="edition_year" class="form-control"
                                       value="{{old('edition_number',"$book->edition_year")}}">
                                <label for="edition_year">Edition Year</label>

                            </div>
                            <div class="col-5">

                                <!--Book ISBN  -->
                                <input name="isbn" type="number" id="isbn" class="form-control"
                                       value="{{old('isbn',"$book->isbn")}}">
                                <label for="isbn">Book ISBN</label>

                            </div>
                        </div>


                        <div class="row justify-content-between align-items-center mt-4">
                            <div class="col-5">
                                <!-- Book  edition year-->
                                <input value="{{$book->poster}}" name="poster" type="file" id="poster"
                                       class="form-control">
                                <label for="poster">Upload Book Poster</label>

                            </div>
                            <div class="col-5">

                                <!--Book ISBN  -->
                                <select class="form-control" name="categories[]"  multiple data-style="btn btn-link"
                                        id="writer_id">
                                    @foreach($book->categories as $category)
                                        <option value="{{$category->id}}">{{$category->type}}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>

                        <!-- Submit button -->
                        <button type="submit" class="btn btn-outline-info btn-block z-depth-0 my-5 btn-round">Submit
                        </button>

                    </form>

                </div>

            </div>
        </div>
    </div>



@endsection