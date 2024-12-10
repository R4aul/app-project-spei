<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Program;

class SchoolOfLeadershipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $program = Program::create([
            'name_program' => ' ESCUELA DE LIDERAZGO' //canviar a certificasion ejecutiva
        ]);

        $courses = [
            [
                'name_course' => 'Liderazgo',
                'status' => true,
                'study_hours' => 6,
            ],
            [
                'name_course' => 'Comunicación',
                'status' => true,
                'study_hours' => 6,
            ],
            [
                'name_course' => 'Creatividad e Iniciativa',
                'status' => true,
                'study_hours' => 6,
            ],
            [
                'name_course' => 'Negociación',
                'status' => true,
                'study_hours' => 6,
            ],
            [
                'name_course' => 'Trabajo en Equipo',
                'status' => true,
                'study_hours' => 6,
            ],
            [
                'name_course' => 'Disciplina',
                'status' => true,
                'study_hours' => 6,
            ],
            [
                'name_course' => 'Definición de Objetivos',
                'status' => true,
                'study_hours' => 6,
            ],
            [
                'name_course' => 'Transmisión de Conocimiento',
                'status' => true,
                'study_hours' => 6,
            ],
        ];
    
        foreach ($courses as $course) {
            $program->courses()->create($course);
        }
    }
}
