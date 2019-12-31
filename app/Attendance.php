<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
  protected $fillable=["attendance_day","check_in","check_out","employee_id","late_hours"];
   protected  $startTime=9;
   protected  $endTime=4;
//    public function setLateHoursAttribute() {
//        $this->attributes['late_hours'] = $this->attributes['check_in'] - $this->attributes['check_out'];
//    }
  public function employee(){
      return $this->belongsTo(Employee::class);
  }


}
