<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $data = ["users" => $users];
        return view("dashboard.users.users_index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("dashboard.users.users_create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            "name" => "required",
            "email" => ["required", "unique:users"],
            "password" => "required",
            "phone_number" => "required",
            "city" => "required",
            "region" => "required",
            "image" => ['required', 'image']
        ];
        if (request()->image != "")
            $url = request()->image->store("uploads");
        $data = $this->validate($request, $rules);
        $data['image'] = $url;
        $data['password'] = Hash::make($data['password']);
        User::create($data);

        return Response::redirectTo("/dashboard/users/");

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(user $user)
    {
        $data = ["user" => $user];
        return view("dashboard.users.users_update", $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user $user)
    {
        $rules = [
            "name" => "required",
            "email" => ["required", "unique:users"],
            "password" => "required",
            "phone_number" => "required",
            "city" => "required",
            "region" => "required",
            "image" => ['required', 'image']
        ];
        if (request()->image != "")
            $url = request()->image->store("uploads");
        $data = $this->validate($request, $rules);
        $data['image'] = $url;
        $data['password'] = Hash::make($data['password']);
        $user->update($data);
        return Response::redirectTo("/dashboard/users/");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user)
    {
        $user->delete();
        return Response::redirectTo("/dashboard/users/");
    }
}
