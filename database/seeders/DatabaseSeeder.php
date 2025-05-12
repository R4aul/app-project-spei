<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Cell;
use App\Models\Employee;
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

        //Cell::factory(10)->create();
        
        $this->call([
            OperationelTechnicalSeeder::class,
            TechnicalSeeder::class,
            BusinessSeeder::class,
            AgilitySeeder::class,
            ExecutiveSeedr::class,
            QualitySeeder::class,
            SecuritySeeder::class,
            EstimatesSeeder::class,
            FintechCodingProgramSeeder::class,
            SoftwareArchitectureSeeder::class,
            RequirementsEngineeringSeeder::class,
            SchoolOfLeadershipSeeder::class,
            GramificationSeeder::class,
            OfficeSeeder::class,
            ComplementarySoftskillsSeeder::class,
            ProfileSeeder::class,
            CourseProfileSeeder::class,
            CellsSeeder::class
        ]);
        
        //Employee::factory(20)->create();
    }
}
