@extends('layouts.master')
@section("content")
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            @include("layouts.errors")
            <div class="card">
                <div class="card-header mt-0  blue-gradient-rgba">
                   <h5 class="text-white title">Login As Admin</h5>
                </div>
                <div class="card-body">
                    <form action="/admin/login" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="email">name</label>
                            <input id="email" name="name" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="password" name="password" type="password" class="form-control">
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-auto">
                                <button class="btn btn-round btn-instagram btn-round">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection