<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;
use App\Models\Teacher;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        // 1. Creamos los alumnos con el factory
        Student::factory(100)->create();
        Teacher::factory(6)->create();
        // 2. Llamamos a los otros seeders usando el método call
        $this->call([
            TeacherSeeder::class, //Profesores
            SubjectSeeders::class,  // Primero las asignaturas
            ResultsSeeder::class,   // Luego las notas (intermedia)
            IncidencesSeeder::class,  // Y al final las incidencias
        ]);

       
    }
}
