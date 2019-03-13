@extends('site.site_layouts.site_master')
@section('content')
    <div class="rgba-black-strong">
        <div class="container-fluid m-0 order_vector ">
            <div class="row mt-5 justify-content-center">
                <div class="col-md-6">
                    @include("layouts.errors")
                    <div class="card">
                        <div class="card-header m-0 blue-gradient-rgba card-header-info"><h4>{{ __('Register') }}</h4> </div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group align-items-center  row ">

                                    <div class="col-md-5">
                                        <label for="name" class="text-md-right m-0">{{ __('Name') }}</label>

                                        <input id="name" type="text"
                                               class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                               name="name" value="{{ old('name') }}" required autofocus>

                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="col-md-5">
                                        <label for="email"
                                               class="  text-md-right">{{ __('E-Mail Address') }}</label>

                                        <input id="email" type="email"
                                               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                               name="email" value="{{ old('email') }}" required>

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group align-items-center  row ">

                                    <div class="col-md-5">
                                        <label for="password"
                                               class=" text-md-right">{{ __('Password') }}</label>

                                        <input id="password" type="password"
                                               class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                               name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                     <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="col-md-5">
                                        <label for="password-confirm"
                                               class=" text-md-right">{{ __('Confirm Password') }}</label>

                                        <input id="password-confirm" type="password" class="form-control"
                                               name="password_confirmation" required>
                                    </div>
                                </div>


                                <div class="form-group align-items-center  row ">

                                    <div class="col-md-5">
                                        <label for="phone number"
                                               class=" text-md-right">Phone number</label>

                                        <input id="phone number" type="number" class="form-control"
                                               name="phone_number" required>
                                    </div>
                                    <div class="col-md-5">
                                        <label for="city"
                                               class=" text-md-right">City</label>

                                        <input id="city" type="text" class="form-control"
                                               name="city" required>
                                    </div>
                                </div>


                                <div class="form-group row align-items-center ">

                                    <div class="col-md-6">
                                        <label for="region"
                                               class=" text-md-right">Region</label>

                                        <input  id="region" type="text" class="form-control"
                                               name="region" required>
                                    </div>

                                    <div class="col-md-6">

                                    </div>
                                </div>
                                <div class="row mt-2"><div class="col-md-6">  <input id="image" class="form-control " placeholder="select image" type="file" name="image"/></div></div>

                                <div class="row justify-content-center mt-3">
                                    <div class="col-auto">
                                        <div class="form-group row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn  btn-instagram blo btn-round ">
                                                    {{ __('Register') }}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="_footer">
                @include("site.site_layouts.site_footer")

            </div>
        </div>
    </div>
@endsection
