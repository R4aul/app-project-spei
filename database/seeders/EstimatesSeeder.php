<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Program;

class EstimatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $program = Program::create([
            'name_program' => 'ESTIMACIONES' //canviar a certificasion ejecutiva
        ]);

        $courses = [
            [
                'name_course' => 'Proceso de Estimación ',
                'status' => true,
                'study_hours' => 3,
            ],
            [
                'name_course' => 'Método de Estimación',
                'status' => true,
                'study_hours' => 3,
            ],
        ];
    
        foreach ($courses as $course) {
            $program->courses()->create($course);
        }
    }
}
