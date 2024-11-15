<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name_employee', 'email', 'profile_id', 'cell_id'];

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    public function cell()
    {
        return $this->belongsTo(Cell::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }

    public function scopeFilter($query)
    {
        $query->when(request('search'), function ($query) {
            $query->where('name_employee', 'like', '%' . request('search') . '%');
        })
        ->when(request('profile'), function ($query) {
            $query->where('profile_id', '=', request('profile'));
        })
        ->when(request('cell'), function ($query) {
            $query->where('cell_id', '=', request('cell'));
        });
    }
}
