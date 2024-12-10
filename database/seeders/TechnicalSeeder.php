<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Program;

class TechnicalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $program = Program::create([
            'name_program' => 'TÉCNICO'
        ]);

        $courses = [
            [
                'name_course' => 'Desarrollo, Entorno y Procesos SPEI',
                'status' => true,
                'study_hours' => 18,
            ],
            [
                'name_course' => 'Webservices en Java - Básico',
                'status' => true,
                'study_hours' => 40,
            ],
            [
                'name_course' => 'Java Code Conventions',
                'status' => true,
                'study_hours' => 20,
            ],
            /*             [
                'name_course' => 'Diplomado en Seguridad Informática',//revisar
                'status' => true,
                'study_hours' => 2,
            ], */
            [
                'name_course' => 'Introducción TAGS y Release',
                'status' => true,
                'study_hours' => 20,
            ],
            [
                'name_course' => 'Flujo de Calidad y Sonar Qube',
                'status' => true,
                'study_hours' => 20,
            ],
            [
                'name_course' => 'Implementación Básica',
                'status' => true,
                'study_hours' => 3,
            ],
            [
                'name_course' => 'Implementación General',
                'status' => true,
                'study_hours' => 20,
            ],
            [
                'name_course' => 'Simulador y Automatización Robot',
                'status' => true,
                'study_hours' => 2,
            ],
            [
                'name_course' => 'Demo simuladores Robot',
                'status' => true,
                'study_hours' => 4,
            ],
            [
                'name_course' => 'Pruebas Junit',
                'status' => true,
                'study_hours' => 20,
            ],
            [
                'name_course' => 'Testing',
                'status' => true,
                'study_hours' => 3,
            ],
            [
                'name_course' => 'Bugzilla',
                'status' => true,
                'study_hours' => 12,
            ],
            [
                'name_course' => 'Llenado de Documentos',
                'status' => true,
                'study_hours' => 36,
            ],
            [
                'name_course' => 'Testlink',
                'status' => true,
                'study_hours' => 12,
            ],
            [
                'name_course' => 'Base de Datos',
                'status' => true,
                'study_hours' => 4,
            ],
            [
                'name_course' => 'Onboarding',
                'status' => true,
                'study_hours' => 24,
            ],
            [
                'name_course' => 'Instalación MQ y Parches de Weblogic',
                'status' => true,
                'study_hours' => 8,
            ],
            [
                'name_course' => 'Instalación Ekarpay',
                'status' => true,
                'study_hours' => 40,
            ],
            [
                'name_course' => 'Mesa de Servicio Ekarpay',
                'status' => true,
                'study_hours' => 40,
            ],

            [
                'name_course' => 'Flujo de tickets y herramientas asociadas',
                'status' => true,
                'study_hours' => 3,
            ],
            [
                'name_course' => 'Flujos Especiales ICBC',
                'status' => false,
                'study_hours' => 7,
            ],
            [
                'name_course' => 'Flujos Especiales Gentera',
                'status' => false,
                'study_hours' => 4,
            ],
            [
                'name_course' => 'Flujos Especiales Scotiabank',
                'status' => false,
                'study_hours' => 12,
            ]

        ];

        foreach ($courses as $course) {
            $program->courses()->create($course);
        }
    }
}
