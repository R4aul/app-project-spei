<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Profile;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $profiles = [
            ['name_profile'=>'Desarrollador'],
            ['name_profile'=>'Soporte'],
            ['name_profile'=>'Soporte a Producción'],
            ['name_profile'=>'Tester'],
            ['name_profile'=>'Implementador'],
            ['name_profile'=>'Infraestructura'],
            ['name_profile'=>'DBA'],
            ['name_profile'=>'Analista'],
            ['name_profile'=>'Arquitecto'],
            ['name_profile'=>'Scrum Master'],
            ['name_profile'=>'Administrador de Servicio'],
            ['name_profile'=>'Preventa'],
            ['name_profile'=>'Ejecutivo (Consultor de Negocio/Gerente de Cta)'],
        ];

    
        foreach ($profiles as $profile) {
            Profile::create($profile);
        }
    }
}
