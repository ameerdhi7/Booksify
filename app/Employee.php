<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ["name"];

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
}
