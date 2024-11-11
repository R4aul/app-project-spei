<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    /** @use HasFactory<\Database\Factories\EmployeeFactory> */
    use HasFactory;

    public function profile(){
        return $this->belongsTo(Profile::class);
    }

    public function cell(){
        return $this->belongsTo(Cell::class);
    }

    public function courses(){
        return $this->belongsToMany(Course::class);
    }
}
