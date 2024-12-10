<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Program;

class BusinessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $program = Program::create([
            'name_program' => 'NEGOCIO '
        ]);

        $courses = [
            [
                'name_course' => 'Inducción Gral a la Gerencia',
                'status' => false,
                'study_hours' => 6,
            ],
            [
                'name_course' => 'Preventa Karpay',
                'status' => false,
                'study_hours' => 2,
            ],
            [
                'name_course' => 'Administración y Finanzas',
                'status' => false,
                'study_hours' => 2,
            ],
            [
                'name_course' => 'Análisis y Auditorias',
                'status' => false,
                'study_hours' => 2,
            ],
            [
                'name_course' => 'Contratos y Pólizas Karpay - Completo',
                'status' => false,
                'study_hours' => 2,
            ],
            [
                'name_course' => 'Contratos y Pólizas Karpay - Recortado',
                'status' => false,
                'study_hours' => 1,
            ],
            [
                'name_course' => 'Certificaciones Banxico',
                'status' => false,
                'study_hours' => 40,
            ],
            [
                'name_course' => 'Conocimientos Grales para Administradores de Servicio',
                'status' => false,
                'study_hours' => 6,
            ],
        ];

        foreach ($courses as $course) {
            $program->courses()->create($course);
        }
    }
}
