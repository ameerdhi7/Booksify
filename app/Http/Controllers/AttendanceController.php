<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Employee;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class AttendanceController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getEmployeeCalender(Employee $employee, Request $request)
    {
        session()->put("id", $request->employee_id);
        session()->put("modalType", "getEmployeeAttendanceReport");
        $rules = ["from" => "required",
            "to" => "required"
        ];
        $data = $this->validate($request, $rules);
        $range = [$data["from"], $data["to"]];
        $attendances = Attendance::where("employee_id", $employee->id)->whereBetween("attendance_day", $range)->get();
        $totalLateInSec = Attendance::where("employee_id", $employee->id)->whereBetween("attendance_day", $range)->sum(DB::raw("TIME_TO_SEC(late)"));
        $totalLate = $this->getLateInHoursAndMin($totalLateInSec);
        $data = ["attendances" => $attendances, "employee" => $employee, "totalLate" => $totalLate];
        return view('dashboard.employee.calender', $data);
    }


    public function getLateInHoursAndMin($totaInSec)
    {
        $totaInMin = intdiv($totaInSec,60);
        $totaInHours = intdiv($totaInMin,60);
        $remainder = $totaInMin % 60;
        return $totaInHours . ':' . $remainder;


    }


    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        session()->put("id", $request->employee_id);
        session()->put("modalType", "addAttendance");
        $rules = ["attendance_day" => "required",
            "check_in" => ["required"]
            , "check_out" => ["required"]
            , "employee_id" => "required",
            "late" => "required"
        ];
        $data = $this->validate($request, $rules);
        Attendance::create($data);
        return Response::redirectTo("/dashboard/employees/");
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Attendance $attendance
     * @return \Illuminate\Http\Response
     */
    public function show(Attendance $attendance)
    {


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Attendance $attendance
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Attendance $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Attendance $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendance $attendance)
    {
        //
    }
}
