@extends("layouts.master")
@section("content")
    <div class="row mt-5 justify-content-center">
        <div class="col-sm-6">
            @include("layouts.errors")
            <div class="card">
                <h5 class="card-header blue-gradient-rgba text-white text-center py-4">
                    Update Category
                </h5>
                <!--Card content-->
                <div class="card-body px-lg-5">
                    <!-- Form -->
                    <form action="/dashboard/categories/{{$employee->id}}" method="post" class="text-center">
                        @csrf
                        @method('patch')
                        <div class="row align-items-center justify-content-between mt-4">
                            <div class="col">
                                <!-- category type-->
                                <input type="text" name="type" type="text" id="type" class="form-control" value="{{old('type',"$employee->type")}}">
                                <label for="type">Book Category</label>
                            </div>
                        </div>
                        <!-- Submit button -->
                        <button type="submit" class="btn btn-outline-info btn-block z-depth-0 my-5 btn-round">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
