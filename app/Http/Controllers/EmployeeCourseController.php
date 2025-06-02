<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Course;

class EmployeeCourseController extends Controller
{
    public function assignCourseEmployee(Request $request, Employee $employee){
        $request->validate([
            'courses'=>['nullable','array']
        ]);

        $employee->courses()->sync($request->courses);

        return redirect()->route('employees.show',$employee);
    }

    public function assignGrade(Request $request, Employee $employee, Course $course){
        $request->validate([
            'grade' => ['numeric', 'min:1', 'max:10']
        ]);
        $employee->courses()->updateExistingPivot($course->id, [
            'completion_date'=> now(),
            'completed' => true,
            'grade' => $request->grade
        ]);
        return redirect()->route('employees.show',$employee);
    }
}
