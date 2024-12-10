<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Program;

class ExecutiveSeedr extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $program = Program::create([
            'name_program' => 'EJECUTIVO' //canviar a certificasion ejecutiva
        ]);

        $courses = [
            [
                'name_course' => 'Definición del Ekarpay',
                'status' => true,
                'study_hours' => 1,
            ],
            [
                'name_course' => 'Descripción de los productos/ambientes',
                'status' => true,
                'study_hours' => 1,
            ],
            [
                'name_course' => 'Venta: Modalidades , Servicios',
                'status' => true,
                'study_hours' => 1,
            ],
            [
                'name_course' => 'Contrato Legal',
                'status' => true,
                'study_hours' => 4,
            ],
            [
                'name_course' => 'Auditorias',
                'status' => true,
                'study_hours' => 1,
            ],
            [
                'name_course' => 'Células de Trabajo',
                'status' => true,
                'study_hours' => 1,
            ],
            [
                'name_course' => 'Customer Care',
                'status' => true,
                'study_hours' => 1,
            ],
            [
                'name_course' => 'Gestión Interna: Gasto y Costeo',
                'status' => true,
                'study_hours' => 1,
            ],
            [
                'name_course' => 'Comité de Cambios',
                'status' => true,
                'study_hours' => 1,
            ],
            [
                'name_course' => 'Calidad SPEI',
                'status' => true,
                'study_hours' => 2,
            ],
            [
                'name_course' => 'Certificación de Ejecutivos SPEI',
                'status' => true,
                'study_hours' => 3,
            ],
        ];

        foreach ($courses as $course) {
            $program->courses()->create($course);
        }
    }
}
