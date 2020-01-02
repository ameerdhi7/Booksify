<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Employee;
use Validator;
use  MaddHatter\LaravelFullcalendar\Facades\Calendar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
class AttendanceController extends Controller
{
    protected $range=[];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getEmployeeCalender(Employee $employee,Request $request){
        session()->put("id",$request->employee_id);
        session()->put("modalType","getEmployeeAttendanceReport");
        $rules=["from"=>"required",
        "to"=>"required"
        ];
        $data=$this->validate($request,$rules);
        array_push($this->range,$data["from"]);
        array_push($this->range,$data["to"]);
        $attendances=$employee->attendances;
        $attendances=$this->filterFromTo($attendances);
        $data=["attendances"=>$attendances,"employee"=>$employee];
        return view('dashboard.employee.calender',$data);
    }

    public function filterFromTo($attendances){
      return  $attendances->whereBetween("attendance_day",$this->range);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        session()->put("id",$request->employee_id);
        session()->put("modalType","addAttendance");
        $rules=["attendance_day"=>"required",
            "check_in"=>["required"]
            ,"check_out"=>["required"]
            ,"employee_id"=>"required",
          "late"=>"required"

        ];
        $data=$this->validate($request,$rules);
        Attendance::create($data);
        return Response::redirectTo("/dashboard/employees/");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show(Attendance $attendance)
    {



    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendance $attendance)
    {
        //
    }
}
