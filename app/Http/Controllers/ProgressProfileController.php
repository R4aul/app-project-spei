<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Profile;
use App\Models\Cell;

class ProgressProfileController extends Controller
{
    public function index()
    {
        $profiles = Profile::all(); 
        $cells = Cell::all(); 
        // Usamos paginate para obtener la paginación de los empleados
        $employees = Employee::where('status',true)->with([
            'courses.program.courses',
            'profile',
            'cell',
        ])
        ->when(request('search'),function($query){
            $query->where('name_employee','like','%'.request('search').'%');
        })
        ->when(request('id_employee'),function($query){
            $query->where('id_employee','=', request('id_employee'));
        })
        ->when(request('profile'),function($query){
            $query->where('profile_id','=', request('profile'));
        })
        ->when(request('cell'),function($query){
            $query->where('cell_id','=', request('cell'));
        })
        ->paginate(10);  // Aquí agregamos la paginación

        // Mapeamos los empleados de la colección de la paginación
        $progressData = $employees->items(); // Usamos items() para acceder a la colección de resultados paginados

        $progressData = collect($employees->items())->map(function ($employee) {
            // Verifica si los cursos están cargados
            if (!$employee->relationLoaded('courses')) {
                return null; // Si no tiene cursos, omítelo
            }

            // Agrupa los cursos por el ID del programa
            $programs = $employee->courses->groupBy(function ($course) {
                return $course->program->id;
            });

            // Mapea los programas y calcula el progreso
            $programProgress = $programs->map(function ($courses, $programId) {
                $program = $courses->first()->program;
                $totalCourses = $courses->count();
                $completedCourses = $courses->filter(function($course){
                    return $course->pivot->completed && $course->pivot->grade >= 8;
                })->count();

                // Calcula el porcentaje de progreso
                $percentage = $totalCourses > 0
                    ? round(($completedCourses / $totalCourses) * 100, 2)
                    : 0;

                return [
                    'program' => $program->name_program,
                    'total_courses' => $totalCourses,
                    'completed_courses' => $completedCourses,
                    'progress_percentage' => $percentage,
                ];
            });

            return [
                'employee' => [
                    'id' => $employee->id,
                    'name' => $employee->name_employee,
                    'id_employee' => $employee->id_employee,
                    'email' => $employee->email,
                    'profile' => $employee->profile->name_profile ?? 'Sin perfil',
                    'cell' => $employee->cell->name_cell ?? 'Sin celda',
                ],
                'programs' => $programProgress->values(),
            ];
        });
        return view('progress.index', [
            'progressData' => $progressData,
            'employees' => $employees,  // Pasamos el objeto de paginación completo
            'profiles' => $profiles,
            'cells'=>$cells
        ]);
    }
}
