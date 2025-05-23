<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Mapeamos el ID o identificador de cursos y perfiles
        // Puedes usar 'name', 'slug', etc. — aquí usamos 'id' para simplificar

        // Define la matriz manualmente
        // [curso_id => [perfil_id_1, perfil_id_2, ...]]
        $courseProfileMatrix = [
            1 => [1,2,3,4,5,6,7,8,9,10,11,12], // Curso 1 lo toman los perfiles 1 y 3
            2 => [1,2,3,4,5,6,7,8,9,10,11,12], // Curso 1 lo toman los perfiles 1 y 3
            3 => [1,2,3,4,5,6,7,8,9,10,11,12], // Curso 1 lo toman los perfiles 1 y 3
            4 => [1,2,3,4,5,6,7,8,9,10,11,12], // Curso 1 lo toman los perfiles 1 y 3
            5 => [1,2,3,4,5,6,7,8,9,10,11,12], // Curso 1 lo toman los perfiles 1 y 3
            6 => [1,2,3,4,5,6,7,8,9,10,11,12], // Curso 1 lo toman los perfiles 1 y 3
            7 => [1,2,3,4,5,6,7,8,9,10,11,12], // Curso 1 lo toman los perfiles 1 y 3
            8 => [1,2,3,4,5,6,7,8,9,10,11,12], // Curso 1 lo toman los perfiles 1 y 3
            9 => [1,2,3,4,5,6,7,8,9,10,11,12], // Curso 1 lo toman los perfiles 1 y 3
            10 => [1,2,3,4,5,6,7,8,9,10,11,12], // Curso 1 lo toman los perfiles 1 y 3
            11 => [1,2,3,4,5,6,7,8,9,10,11,12], // Curso 1 lo toman los perfiles 1 y 3
            12 => [1,2,3,4,5,6,7,8,9,10,11,12],
            13 => [1,2,3,4,5,6,7,8,9,10,11,12], 
        

            14 => [1,6,9], // Curso 1 lo toman los perfiles 1 y 3
            15 => [1,9], // Curso 1 lo toman los perfiles 1 y 3
            16 => [1,9], 
            17 => [1,9],
            18 => [1,9],
            19 => [8,10,11,12],
            20 => [1,2,3,4,5,6,9],
            21 => [1,4,6,9],
            22 => [1,4,6,9],
            23 => [1,9],
            24 => [1,3,4,5,9],
            25 => [1,4,9],
            26 => [4,6],
            27 => [1,4,9],
            28 => [1,3,4,5,7,8,9],
            29 => [4],
            30 => [3,5],
            31 => [3,5],
            32 => [2],
            33 => [2,10,11],
            34 => [1,2,3,4,5,8,9,10,11],
            35 => [1,2,3,4,5,8,9,10,11],
            36 => [1,2,3,4,5,8,9,10,11],
            
            37 => [1,2,3,4,5,6,7,8,9,10,11,12],
            38 => [8,10,11,12],
            39 => [8,10,11,12],
            40 => [2,8,10,11,12,13],
            41 => [8,10,11,12],
            42 => [1,2,3,4,5,6,7,9,12],
            43 => [1,2,3,4,5,6,7,8,9,12],
            44 => [10,11,12],
            
            //Agules
            45 => [1,2,3,4,5,6,7,8,9,10,12],
            46 => [9],
            47 => [9],
            48 => [9],
            49 => [9],
            50 => [9],
            51 => [1,3,4,5,9],
            52 => [11],

            //Certificacion ejecutiva
            53 => [12,13],
            54 => [12,13],
            55 => [12,13],
            56 => [12,13],
            57 => [12,13],
            58 => [12,13],
            59 => [12,13],
            60 => [12,13],
            61 => [12,13],
            62 => [12,13],
            63 => [12,13],
        
            //Calidad y procesos
            64 => [1,2,3,4,5,6,7,8,9,10,11,12],
            65 => [1,2,3,4,5,6,7,8,9,10,11,12,13],
            66 => [11],
            
            //seguridad
            67 => [1,8,9],
            68 => [2,3,4,5,6,7,8,10,11,12],
            69 => [9],
        
            //estimaciones
            70 => [6,8,9,12],
            71 => [6,8,9,12],
            
            //Fintech Program
            72 => [1,7,9],
            73 => [1,7,9],
            74 => [1,7,9],
            75 => [1,7,9],
            76 => [1,7,9],
            77 => [1,7,9],
            78 => [1,7,9],
            79 => [1,7,9],
        
            //arquitectura de software
            80 => [9],
            81 => [9],
            82 => [9],
            83 => [9],
            84 => [9],
            85 => [9],
            86 => [9],
            
            //ingeneria de requrimientos
            87 => [1,2,3,4,5,6,7,8,9,10,11,12,13],
            88 => [1,2,3,4,5,6,7,8,9,10,11,12,13],
            89 => [1,2,3,4,5,6,7,8,9,10,11,12,13],
            90 => [1,2,3,4,5,6,7,8,9,10,11,12,13],
            91 => [1,2,3,4,5,6,7,8,9,10,11,12,13],
            92 => [1,2,3,4,5,6,7,8,9,10,11,12,13],
            93 => [1,2,3,4,5,6,7,8,9,10,11,12,13],
        
            //escuela de liderazgo
            94 => [1,2,3,4,5,6,7,8,9,10,11,12],
            95 => [1,2,3,4,5,6,7,8,9,10,11,12],
            96 => [1,2,3,4,5,6,7,8,9,10,11,12],
            97 => [1,2,3,4,5,6,7,8,9,10,11,12],
            98 => [1,2,3,4,5,6,7,8,9,10,11,12],
            99 => [1,2,3,4,5,6,7,8,9,10,11,12],
            100 => [1,2,3,4,5,6,7,8,9,10,11,12],
            101 => [1,2,3,4,5,6,7,8,9,10,11,12],
            
            //Gramificacion
            102 => [1,2,3,4,5,6,7,9,10],
            103 => [1,2,3,4,5,6,7,9,10],
            

            //Office
            104 => [7,8],
            
            //Softkills
            105 => [11],
            106 => [11,12],
        ];

        foreach ($courseProfileMatrix as $courseId => $profileIds) {
            $course = Course::find($courseId);
            if ($course) {
                $course->profiles()->syncWithoutDetaching($profileIds);
            }
        }
    }
}
