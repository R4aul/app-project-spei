<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Program;

class QualitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $program = Program::create([
            'name_program' => 'CALIDAD' //canviar a certificasion ejecutiva
        ]);

        $courses = [
            [
                'name_course' => 'Procesos',
                'status' => true,
                'study_hours' => 2,
            ],
            [
                'name_course' => 'Modelo de Calidad SPEI',
                'status' => true,
                'study_hours' => 2,
            ],
            [
                'name_course' => 'SCM Coach',
                'status' => true,
                'study_hours' => 2,
            ],
        ];

        foreach ($courses as $course) {
            $program->courses()->create($course);
        }
    }
}
