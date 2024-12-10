<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Program;

class GramificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $program = Program::create([
            'name_program' => 'GAMIFICACIÓN' //canviar a certificasion ejecutiva
        ]);

        $courses = [
            [
                'name_course' => 'Gamificación SPEI - Revisión League of Weeks',
                'status' => true,
                'study_hours' => 2,
            ],
            [
                'name_course' => 'Tablero de Gamificacion',
                'status' => true,
                'study_hours' => 2,
            ],
        ];
    
        foreach ($courses as $course) {
            $program->courses()->create($course);
        }
    }
}
