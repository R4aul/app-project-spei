<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;

class ProgressProfileController extends Controller
{
    public function index()
    {
        // Usamos paginate para obtener la paginación de los empleados
        $employees = Employee::with([
            'courses.program.courses',
            'profile',
            'cell',
        ])->paginate(10);  // Aquí agregamos la paginación

        // Mapeamos los empleados de la colección de la paginación
        $progressData = $employees->items(); // Usamos items() para acceder a la colección de resultados paginados

        $progressData = collect($progressData)->map(function ($employee) {
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
                $totalCourses = $program->courses->count();
                $completedCourses = $courses->where('pivot.completed', true)->count();

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
        ]);
    }
}
