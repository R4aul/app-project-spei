<?php

namespace App\Exports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class EmployeeExportProgres implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Employee::with(['cell', 'profile', 'courses.program.courses'])
            ->where('status', true)
            ->get()
            ->map(function ($employee) {
                $totalCourses = $employee->courses->count();

                $completedCourses = $employee->courses->filter(function ($course) {
                    return $course->pivot->completed && $course->pivot->grade >= 8;
                })->count();

                $progress = $totalCourses > 0
                    ? round(($completedCourses / $totalCourses) * 100, 2) // Resultado en proporción decimal (ej: 0.25)
                    : 0;

                return [
                    'Nombre' => $employee->name_employee,
                    'Fecha de Ingreso' => $employee->admission_date,
                    'ID' => $employee->id_employee,
                    'Puesto' => $employee->profile->name_profile ?? 'Sin perfil',
                    'Célula' => $employee->cell->name_cell ?? 'Sin célula',
                    'Porcentaje total de avance' => $progress."%",
                ];
            });
    }

    public function headings(): array
    {
        return ['Nombre', 'Fecha de Ingreso', 'ID', 'Puesto', 'Célula', 'Porcentaje total de avance'];
    }
}
