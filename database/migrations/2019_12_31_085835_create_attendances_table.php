<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->increments('id');
            $table->date('attendance_day');
            $table->time('check_in');
            $table->time('check_out');
            $table->time('late');
            $table->bigInteger('employee_id');
            $table->timestamps();
        });
     $dummyOne=["attendance_day"=>"2020:01:01","check_in"=>"09:00:00","check_out"=>"03:00:00","late"=>"0","employee_id"=>"1"];
     $anotherOne=["attendance_day"=>"2020:01:02","check_in"=>"09:30:00","check_out"=>"02:00:00","late"=>"0","employee_id"=>"1"];
  \App\Attendance::create($dummyOne);
  \App\Attendance::create($anotherOne);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendances');
    }
}
