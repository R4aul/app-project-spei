<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Program;

class ComplementarySoftskillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $program = Program::create([
            'name_program' => 'SOFTSKILLS COMPLEMENTARIOS' //canviar a certificasion ejecutiva
        ]);

        $courses = [
            [
                'name_course' => 'Cómo dar instrucciones',
                'status' => true,
                'study_hours' => 0,
            ],
            [
                'name_course' => 'Habilidades de Presentación',
                'status' => true,
                'study_hours' => 0,
            ],
            [
                'name_course' => 'Manejo de Juntas de Trabajo',
                'status' => true,
                'study_hours' => 0,
            ],
            [
                'name_course' => 'Ortografia y Redacción',
                'status' => true,
                'study_hours' => 0,
            ],
            [
                'name_course' => 'Pensamiento Critico',
                'status' => true,
                'study_hours' => 0,
            ],
            [
                'name_course' => 'Solución de Problemas y Toma de Decisiones',
                'status' => true,
                'study_hours' => 0,
            ],
            [
                'name_course' => 'Administración para obtener Resultados',
                'status' => true,
                'study_hours' => 0,
            ],
            [
                'name_course' => 'Servicio al cliente',
                'status' => true,
                'study_hours' => 0,
            ],
        ];

        foreach ($courses as $course) {
            $program->courses()->create($course);
        }
    }
}
