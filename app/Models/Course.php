<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    /** @use HasFactory<\Database\Factories\CourseFactory> */
    use HasFactory;

    protected $guarded = [];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function profiles()
    {
        return $this->belongsToMany(Profile::class, 'course_profile');
    }

    public function scopeFilter($query)
    {
        $query->when(request('search'), function ($query) {
            $query->where('name_course', 'like', '%' . request('search') . '%');
        })
            ->when(request('program'), function ($query) {
                $query->where('program_id', '=', request('program'));
            })
            ->when(request('status') !== null , function ($query) {
                $query->where('status', request('status') == 1 ? 1 : 0);
            });
    }
}
