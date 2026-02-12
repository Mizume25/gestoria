<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        // 1. Creamos los alumnos con el factory
        Student::factory(100)->create();

        // 2. Llamamos a los otros seeders usando el método call
        $this->call([
            SubjectSeeders::class,  // Primero las asignaturas
            ResultsSeeder::class,   // Luego las notas (intermedia)
            IncidencesSeeder::class,  // Y al final las incidencias
            UserSeeder::class   //creamos usuarios para cada studiante
            
        ]);

       
    }
}
