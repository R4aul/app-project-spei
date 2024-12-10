<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Program;

class SecuritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $program = Program::create([
            'name_program' => 'SEGURIDAD' //canviar a certificasion ejecutiva
        ]);

        $courses = [
            [
                'name_course' => 'Seguridad SPEI para Dersarrollo',
                'status' => false,
                'study_hours' => 6,
            ],
            [
                'name_course' => 'Seguridad SPEI Administrativo',
                'status' => false,
                'study_hours' => 4,
            ],
            [
                'name_course' => 'Diplomado en Seguridad',
                'status' => false,
                'study_hours' => 0,
            ],
        ];

        foreach ($courses as $course) {
            $program->courses()->create($course);
        }
    }
}
