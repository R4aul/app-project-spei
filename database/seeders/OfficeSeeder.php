<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Program;

class OfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $program = Program::create([
            'name_program' => 'OFFICE' //canviar a certificasion ejecutiva
        ]);

        $courses = [
            [
                'name_course' => 'Excel',
                'status' => true,
                'study_hours' => 24,
            ],
        ];

        foreach ($courses as $course) {
            $program->courses()->create($course);
        }
    }
}
