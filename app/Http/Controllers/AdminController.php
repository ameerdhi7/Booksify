<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins=Admin::all();
        $data=["admins"=>$admins];

        return view("dashboard.admins_in_dashboard.index_admin",$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("dashboard.admins_in_dashboard.create_admin");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=[

            "name"=>"required",
            "email"=>"required",
            "password"=>"required"
        ];
        $data=$this->validate($request,$rules);
        Admin::create($data);
return Response::redirectTo("/admins/");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        $data=[
            "admin"=>$admin
        ];
        return view("dashboard.admins_in_dashboard.update_admin",$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {

        $rules=[

            "name"=>"required",
            "email"=>"required",
            "password"=>"required"
        ];
        $data=$this->validate($request,$rules);
        $admin->update($data);
           return Response::redirectTo("/admins/");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        $admin->delete();
      return  Response::redirectTo("/admins/");
    }
}
