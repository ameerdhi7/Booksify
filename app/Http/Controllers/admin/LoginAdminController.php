<?php

namespace App\Http\Controllers\admin;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;




class LoginAdminController extends Controller
{

    use authenticatesusers;

    protected function guard(){

        return Auth::guard("admin");

    }

    public function username()
    {
        return 'name';
    }

    public function redirectPath()
    {
        return '/';
    }
   public function showLoginForm(){

    return view("admin.login_admin");
    }
}