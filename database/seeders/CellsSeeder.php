<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CellsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cells = [
            'SMART WARRIORS',
            'ORDEN JEDI',
            'GUARDIANES',
            'ESCUADRÓN SMART',
            'SKYNET',
            'GUARDIANES ASA',
            'MICROSERVICIOS',
            'X-MEN',
            'CALI MANTO',
            'ADMIN',
            'OFICCE LEAGUE',
            'NEO KELI',
            'Kukulcán',
            'ARASAKA',
            'GAIAC',
            'JOVENES TITANES',
            'NUEVO ASGARD',
            'CALI PROYECTOS',
            'AZTLAN'
        ];

        foreach ($cells as $cell) {
            DB::table('cells')->insert([
                'name_cell' => $cell,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
