<!-- ================ CATEGORIES CREATE FORM ============ -->
@extends("layouts.master")
@section("content")
    <div class="row mt-5 justify-content-center">

        <div class="col-sm-6">
            @include("layouts.errors")

            <div class="card">
                <h5 class="card-header blue-gradient-rgba text-white text-center py-4">
                    Create New Employee
                </h5>
                <!--Card content-->
                <div class="card-body px-lg-5">

                    <!-- Form -->
                    <form action="/dashboard/employees" method="post" class="text-center">
                        @csrf
                        <div class="row align-items-center justify-content-between mt-4">
                            <div class="col">

                                <input type="text" name="name" type="text" id="type" class="form-control"  required>
                                <label for="type" class="mt-3">Employee name</label>

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
