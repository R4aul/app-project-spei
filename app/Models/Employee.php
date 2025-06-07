<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Employee extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name_employee', 'id_employee','email', 'profile_id', 'cell_id','admission_date'];

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
        return $this->belongsToMany(Course::class)
                                ->withPivot('init_date','completion_date','completed','grade');
    }

    public function scopeFilter($query)
    {
        $query->when(request('search'), function ($query) {
            $query->where('name_employee', 'like', '%' . request('search') . '%');
        })
        ->when(request('idEmployee'), function($query){
            $query->where('id_employee',"=",request('idEmployee'));
        })
        ->when(request('profile'), function ($query) {
            $query->where('profile_id', '=', request('profile'));
        })
        ->when(request('cell'), function ($query) {
            $query->where('cell_id', '=', request('cell'));
        });
    }
}
