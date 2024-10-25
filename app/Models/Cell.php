<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cell extends Model
{
    /** @use HasFactory<\Database\Factories\CellFactory> */
    use HasFactory;

    public function employees(){
        return $this->hasMany(Employee::class);
    }
}
