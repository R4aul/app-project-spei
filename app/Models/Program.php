<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    /** @use HasFactory<\Database\Factories\ProgramFactory> */
    use HasFactory;

    public function module(){
        return $this->belongsTo(Module::class);
    }

    public function courses(){
        return $this->hasMany(Course::class);
    }
}
