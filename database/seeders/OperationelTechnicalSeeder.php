<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Program;
use App\Models\Course;

class OperationelTechnicalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $program = Program::create([
            'name_program'=>'TÉCNICO OPERATIVO '
        ]);

        $courses = [
            [
                'name_course'=>'Introducción SPEI y SPID',
                'status'=>true,
                'study_hours'=>2 ,
            ],
            [
                'name_course'=>'Introducción CEP',
                'status'=>true,
                'study_hours'=>2 ,
            ],
            [
                'name_course'=>'Arquitectura del sistema SPEI',
                'status'=>true,
                'study_hours'=>2,
            ],
            [
                'name_course'=>'Arquitectura y Componentes de SICE',
                'status'=>true,
                'study_hours'=>2 ,
            ],
            [
                'name_course'=>'Introducción SPEI y SPID',
                'status'=>true,
                'study_hours'=>2 ,
            ],
            [
                'name_course'=>'Sistemas Satélites',
                'status'=>true,
                'study_hours'=>2 ,
            ],
            [
                'name_course'=>'Estados de Envío y Estados de Recepción',
                'status'=>true,
                'study_hours'=>2 ,
            ],
            [
                'name_course'=>'Introducción a Listeners eKarpay',
                'status'=>true,
                'study_hours'=>2 ,
            ],
            [
                'name_course'=>'Usuario eKarpay',
                'status'=>true,
                'study_hours'=>2 ,
            ],
            [
                'name_course'=>'Cuadre eKarpay',
                'status'=>true,
                'study_hours'=>2 ,
            ],
            [
                'name_course'=>'Monitoreo eKarpay',
                'status'=>true,
                'study_hours'=>2 ,
            ],
            [
                'name_course'=>'Operación en contngencia',
                'status'=>true,
                'study_hours'=>2 ,
            ],
            [
                'name_course'=>'Juego del SPEI',
                'status'=>true,
                'study_hours'=>2,
            ]
        ];

        foreach ($courses as $course) {
            $program->courses()->create($course);
        }
    }
}
