<!-- =========== users update form view===========-->


@extends("layouts.master")
@section("content")

    <div class="row justify-content-center">

        <div class="col-sm-6">
            @include("layouts.errors")
            <div class="card">
                <h5 class="card-header blue-gradient-rgba text-white text-center py-4">
                    Updata User
                </h5>
                <!--Card content-->
                <div class="card-body px-lg-5">
                    <!-- Form -->
                    <form action="/dashboard/users/{{$user->id}}" METHOD="post" class="text-center"
                          enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="row justify-content-between align-items-center mt-4">
                            <div class="col-5">
                                <!-- users  name-->
                                <input value="{{$user->name}}" name="name" type="text" id="username"
                                       class="form-control">
                                <label for="username">User Name</label>

                            </div>
                            <div class="col-5">

                                <!--user Email  -->
                                <input value="{{$user->email}}" name="email" type="email" id="useremail"
                                       class="form-control">
                                <label for="useremail">User email</label>

                            </div>
                        </div>


                        <div class="row justify-content-between align-items-center mt-4">
                            <div class="col-5">

                                <!-- user password -->

                                <input name="password" type="password" id="userpassword" class="form-control">
                                <label for="userpassword">Password</label>

                            </div>
                            <div class="col-5">

                                <!--user phone number  -->
                                <input value="{{$user->phone_number}}" name="phone_number" type="number"
                                       id="user phone number" class="form-control">
                                <label for="user phone number">Phone Number</label>

                            </div>
                        </div>
                        <div class="row justify-content-between align-items-center mt-4">
                            <div class="col-5">
                                <!-- user city-->

                                <input value="{{$user->city}}" name="city" type="text" id="usercity"
                                       class="form-control">
                                <label for="usercity">City</label>

                            </div>
                            <div class="col-5">

                                <!--user region  -->
                                <input value="{{$user->region}}" name="region" type="text" id="userregion"
                                       class="form-control">
                                <label for="userregion">Region</label>

                            </div>
                        </div>
                        <div class="row justify-content-center align-items-center m-0">
                            <div class="col-5 m-0">

                                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail img-raised">
                                        <img src="http://style.anu.edu.au/_anu/4/images/placeholders/person_8x10.png"
                                             alt="...">
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail img-raised"></div>
                                    <div>
        <span class="btn btn-raised btn-round btn-default btn-file">
            <span class="fileinput-new">Select image</span>
            <span class="fileinput-exists">Change</span>
            <input type="file" name="image"/>
        </span>
                                        <a href="#pablo" class="btn btn-danger btn-round fileinput-exists"
                                           data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Submit button -->
                        <button type="submit" class="btn btn-outline-info btn-block z-depth-0 my-5 mt-0 btn-round">
                            Submit
                        </button>
                    </form>

                </div>

            </div>
        </div>

    </div>




@endsection