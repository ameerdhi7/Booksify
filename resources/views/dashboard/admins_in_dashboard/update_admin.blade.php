@extends("layouts.master")
@section("content")

    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-6">
                @include("layouts.errors")
                <div class="card">
                    <div class="card-header card-header-info blue-gradient-rgba">
                        <h5>updata admin</h5>
                    </div>
                    <div class="card-body">
                        <form METHOD="post" action="/admins/{{$admin->id}}">
                            @csrf
                            @method('patch')
                            <div class=" row mt-5">
                                <div class="col">
                                    <label for="adminname">admin name</label>
                                    <input value="{{$admin->name}}" placeholder="admin name" name="name" id="adminname"
                                           class="form-control"
                                           type="text">
                                </div>
                            </div>


                            <div class=" row mt-5">
                                <div class="col">
                                    <label for="adminemail">admin email</label>
                                    <input id="adminemail" value="{{$admin->email}}" placeholder="admin email"
                                           name="email" class="form-control" type="text">
                                </div>
                            </div>
                            <div class=" row mt-5">
                                <div class="col">
                                    <label for="adminpassword">admin password</label>
                                    <input id="adminpassword"  placeholder="admin password"
                                           name="password" class="form-control" type="password">
                                </div>
                            </div>





                            <div class="row mt-3 justify-content-center">
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-round btn-instagram btn-round">updata</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection