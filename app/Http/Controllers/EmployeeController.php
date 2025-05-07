<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cell;
use App\Models\Course;
use App\Models\Employee;
use App\Models\Profile;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $profiles = Profile::all();
        $cells = Cell::all();
        $employees = Employee::with(['profile', 'cell'])
            ->filter()
            ->orderBy('name_employee', 'desc')
            ->paginate(15);
        return view('employees.index', compact('employees', 'cells', 'profiles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $profiles = Profile::all();
        $cells = Cell::all();
        return view('employees.create', compact('cells', 'profiles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_employee' => ['required', 'min:5'],
            'id_employee' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:employees,email'],
            'profiles' => ['nullable', 'array'],
            'cells' => ['nullable', 'array']
        ]);
        $employee = Employee::create([
            'name_employee' => $request->name_employee,
            'id_employee' => $request->id_employee,
            'email' => $request->email,
            'profile_id' => $request->profile_id,
            'cell_id' => $request->cell_id
        ]);
        $employee->courses()->attach($request->courses);
        return redirect()->route('employees.index');
    }

    public function show(Employee $employee)
    {
        $employee->with([
            'profile',
            'cell', 
            'courses'=> function ($query){
                $query->where('status',1);
            }
        ])->get();
        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        $profiles = Profile::all();
        $cells = Cell::all();
        return view('employees.edit', compact('employee', 'profiles', 'cells'));
    }


    public function low(Request $request, Employee $employee)
    {
        $request->validate([
            'status' => 'required|boolean',
        ]);

        $employee = Employee::findOrFail($employee->id);
        $employee->status = $request->input('status');
        $employee->save();

        return redirect()->route('employees.edit',compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name_employee' => ['required', 'min:5'],
            'email' => ['required'],
            'profiles' => ['nullable', 'array'],
            'cells' => ['nullable', 'array']
        ]);
        $employee->update([
            'name_employee' => $request->name_employee,
            'email' => $request->email,
            'profile_id' => $request->profile_id,
            'cell_id' => $request->cell_id
        ]);
        $employee->courses()->sync($request->courses);
        return redirect()->route('employees.index');
    }
}
