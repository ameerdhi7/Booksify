<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $employees = Employee::all();
        $data = [
            "employees" => $employees
        ];

        return view("dashboard.employee.index-employee", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("dashboard.employee.create-employee");
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
        ];

        $data = $this->validate($request, $rules);
        Employee::create($data);
        return Response::redirectTo("/dashboard/employees/");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $data = ["employe" => $employee];
        return view("dashboard.employee.edit-employe", $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Employee $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $rules = [
            "name" => "required"
        ];
        $data = $this->validate($request, $rules);
        $employee->update($data);
        return Response::redirectTo("/dashboard/employees/");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return Response::redirectTo("/dashboard/employees/");
    }
}
