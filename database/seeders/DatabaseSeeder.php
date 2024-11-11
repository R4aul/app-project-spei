<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Program;
use App\Models\Course;
use App\Models\Module;
use App\Models\Profile;

use App\Models\Employee;
use App\Models\Cell;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password'=>bcrypt('12345678')
        ]);

        User::factory()->create([
            'name' => 'Raul Damian Rafael',
            'email' => 'raul.damian220@gmail.com',
            'password'=>bcrypt('12345678')
        ]);

        Profile::factory(5)->create();
        Cell::factory(5)->create();

        Employee::factory(20)->create([
            'profile_id'=>random_int(1,5),
            'cell_id'=>random_int(1,5)
        ]);

        //Creando 2 modules 
        Module::factory(2)->create()->each(function($module){
            //Creando 12 programes por cada module
            Program::factory(12)->create([
                'module_id' => $module->id
            ])->each(function($program){
                //Por cada programa creado recibo el el id del programa y creao 12 curos
                Course::factory(15)->create([
                   'program_id' => $program->id 
                ]);
            });
        });
    }
}
