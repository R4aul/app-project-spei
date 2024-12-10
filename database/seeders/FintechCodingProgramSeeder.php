<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Program;

class FintechCodingProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $program = Program::create([
            'name_program' => 'FINTECH CODING PROGRAM' //canviar a certificasion ejecutiva
        ]);

        $courses = [
            [
                'name_course' => 'Definiciones',
                'status' => true,
                'study_hours' => 0,
            ],
            [
                'name_course' => 'ACID',
                'status' => true,
                'study_hours' => 0,
            ],
            [
                'name_course' => 'Manejo de Errores',
                'status' => true,
                'study_hours' => 0,
            ],
            [
                'name_course' => 'Performance',
                'status' => true,
                'study_hours' => 0,
            ],
            [
                'name_course' => 'Seguridad',
                'status' => true,
                'study_hours' => 0,
            ],
            [
                'name_course' => 'Manejo de Datos',
                'status' => true,
                'study_hours' => 0,
            ],
            [
                'name_course' => 'Disponibilidad',
                'status' => true,
                'study_hours' => 0,
            ],
            [
                'name_course' => 'Interoperabilidad',
                'status' => true,
                'study_hours' => 0,
            ],
        ];

        foreach ($courses as $course) {
            $program->courses()->create($course);
        }
    }
}
