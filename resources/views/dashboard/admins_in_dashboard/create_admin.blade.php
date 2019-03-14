@extends("layouts.master")
@section("content")
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-6">
                <div class="card">
                    <div class="card-header card-header-info blue-gradient-rgba">

                        <h5>create new admin</h5>


                    </div>
                    <div class="card-body">
                        <form method="post" action="/admins/">
                            @csrf
                            <div class=" row mt-5">
                                <div class="col">
                                    <input placeholder="admin name" name="name" id="adminname" class="form-control"
                                           type="text">

                                </div>

                            </div>
                            <div class=" row mt-5">
                                <div class="col">


                                    <input placeholder="admin email" name="email" class="form-control" type="text">
                                </div>

                            </div>

                            <div class=" row mt-5">
                                <div class="col">
                                    <input placeholder="admin password" id="adminpassword" name="password"
                                           class="form-control" type="password">

                                </div>

                            </div>
                            <div class="row justify-content-center">
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-round btn-instagram btn-round">Create</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection