<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use PhpParser\Node\Stmt\DeclareDeclare;

class Attendance extends Model
{
    public $totalAttendanceHours = 7;
    protected $fillable = ["attendance_day", "check_in", "check_out", "employee_id", "late"];

    public function setLateAttribute()
    {
        $checkInCarboned = Carbon::parse($this->attributes["check_in"]);
        $checkOutCarboned = Carbon::parse($this->attributes["check_out"]);
        $diffInMin = $checkInCarboned->diffInMinutes($checkOutCarboned); // to get total attendance in mins
        $attendanceHours = intdiv($diffInMin, 60); // get to get total attendance in hours
        $remainder = $diffInMin % 60;
        $lateInHours = $this->totalAttendanceHours - $attendanceHours;
        $this->attributes['late'] = $lateInHours . ':' . $remainder . ':00'; // simulate time format
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }


}
