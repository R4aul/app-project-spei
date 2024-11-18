<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;

class ProgressProfileController extends Controller
{
    public function index(){
        $employees = Employee::with(['profile','cell'])->paginate(10);
        return view('progress.index',compact('employees'));
    }
}
