<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Program;

class RequirementsEngineeringSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $program = Program::create([
            'name_program' => 'INGENIERIA DE REQUERIMIENTOS' //canviar a certificasion ejecutiva
        ]);

        $courses = [
            [
                'name_course' => 'Modelado de Negocio',
                'status' => true,
                'study_hours' => 0,
            ],
            [
                'name_course' => 'Introducción a Requerimientos',
                'status' => true,
                'study_hours' => 0,
            ],
            [
                'name_course' => 'Comunicación con el usuario',
                'status' => true,
                'study_hours' => 0,
            ],
            [
                'name_course' => 'Metodos, Tecnicas y Herramientas para el levantamiento de Requerimientos',
                'status' => true,
                'study_hours' => 0,
            ],
            [
                'name_course' => 'Historias de Usuario',
                'status' => true,
                'study_hours' => 0,
            ],
            [
                'name_course' => 'Ingenieria de Requerimientos',
                'status' => true,
                'study_hours' => 0,
            ],
            [
                'name_course' => 'Administración de Requerimientos',
                'status' => true,
                'study_hours' => 0,
            ],
        ];

        foreach ($courses as $course) {
            $program->courses()->create($course);
        }
    }
}
