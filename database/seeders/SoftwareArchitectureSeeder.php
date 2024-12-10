<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Program;

class SoftwareArchitectureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $program = Program::create([
            'name_program' => 'ARQUITECTURA DE SOFTWARE' //canviar a certificasion ejecutiva
        ]);

        $courses = [
            [
                'name_course' => 'Introducción',
                'status' => true,
                'study_hours' => 0,
            ],
            [
                'name_course' => 'Patrones de Diseño',
                'status' => true,
                'study_hours' => 0,
            ],
            [
                'name_course' => 'Esquemas de Arquitectura de Software',
                'status' => true,
                'study_hours' => 0,
            ],
            [
                'name_course' => 'Documentando la Arquitectura de Software',
                'status' => true,
                'study_hours' => 0,
            ],
            [
                'name_course' => 'Evaluando la Arquitectura de Software',
                'status' => true,
                'study_hours' => 0,
            ],
            [
                'name_course' => 'La Arquitectura y su relación con otras áreas',
                'status' => true,
                'study_hours' => 0,
            ],
            [
                'name_course' => 'Habilidades del Arquitecto de Software',
                'status' => true,
                'study_hours' => 0,
            ],
        ];

        foreach ($courses as $course) {
            $program->courses()->create($course);
        }
    }
}
