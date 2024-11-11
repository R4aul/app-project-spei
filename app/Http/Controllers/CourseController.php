<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Profile;
use App\Models\Program;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index( Request $request)
    {
        $programs = Program::all();
        $courses = Course::with(['program'])
                            ->filter()
                            ->orderBy('name_course','desc')
                            ->paginate(15);
        return view('courses.index', compact('courses', 'programs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $programs = Program::all();
        $profiles = Profile::all();
        return view('courses.create', compact('profiles','programs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_course' => ['required', 'min:5'],
            'status' => ['required'],
            'study_hours' => ['required', 'integer'],
            'profiles' => ['nullable','array']
        ]);
        $course = Course::create([
            'name_course' => $request->name_course,
            'status' => $request->status,
            'study_hours' => $request->study_hours,
            'program_id'=>$request->program_id
        ]);
        $course->profiles()->attach($request->profiles);
        return redirect()->route('courses.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
       $programs = Program::all();
       $profiles = Profile::all();
       return view('courses.edit',compact('course','profiles','programs')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        //return $request->profiles;
        $request->validate([
            'name_course' => ['required'],
            'status' => ['required'],
            'study_hours' => ['required', 'integer'],
            'profiles' => ['nullable', 'array']
        ]);
        $course->update([
            'name_course' => $request->name_course,
            'status' => $request->status,
            'study_hours' => $request->study_hours
        ]);
        $course->profiles()->sync($request->profiles);
        return redirect()->route('courses.index');
    }
}
