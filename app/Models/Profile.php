<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    /** @use HasFactory<\Database\Factories\ProfileFactory> */
    use HasFactory;

    public function courses(){
        return $this->belongsToMany(Course::class);
    }

    public function employees(){
        return $this->hasMany(Employee::class);
    }
}
