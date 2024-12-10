<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Program;

class AgilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $program = Program::create([
            'name_program' => 'AGILIDAD'
        ]);

        $courses = [
            [
                'name_course' => 'Scrum Fundamentals',
                'status' => true,
                'study_hours' => 12,
            ],
            [
                'name_course' => 'Criterios Nivel Avanzados TA-SC Herramientas',
                'status' => true,
                'study_hours' => 12,
            ],
            [
                'name_course' => 'Framework Scrum Aplicado',
                'status' => true,
                'study_hours' => 12,
            ],
            [
                'name_course' => 'Intercélula (Temática) ',
                'status' => true,
                'study_hours' => 12,
            ],
            [
                'name_course' => 'Técnicas de Retrospectivass',
                'status' => true,
                'study_hours' => 12,
            ],
            [
                'name_course' => 'Scrum Master Certificate',
                'status' => true,
                'study_hours' => 16,
            ],
            [
                'name_course' => 'Scrum Developer Certificate ',
                'status' => true,
                'study_hours' => 16,
            ],
            [
                'name_course' => 'Scrum Product Owner Certificate',
                'status' => true,
                'study_hours' => 16,
            ],
/*             [
                'name_course' => 'SCM Coach',
                'status' => true,
                'study_hours' => 6,
            ], */
        ];
    
        foreach ($courses as $course) {
            $program->courses()->create($course);
        }
    }
}
