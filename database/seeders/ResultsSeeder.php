<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\Subject;

class ResultsSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Recuperamos a todos los estudiantes y separamos las materias
        $students = Student::all();
        $troncales = Subject::where('elective_subject', false)->get();
        $optativas = Subject::where('elective_subject', true)->get();

        $this->command->info('Datos obtenidos...');
        
        //Recorremos estudiantes
        foreach ($students as $student) {
            //Recorremos materias
            foreach ($troncales as $subject) {
                //Estudiante - Materia | id_materia
                $student->subjects()->attach($subject->id_subject, [
                    'subject_grade' => rand(1, 10) // Nota aleatoria para cada troncal
                ]);
            }

            //80 % de los alumnos haran optativa
            if (rand(1, 100) <= 80) {

                $optativaElegida = $optativas->random();
                
                $student->subjects()->attach($optativaElegida->id_subject, [
                    'subject_grade' => rand(1, 10)
                ]);
            }
           
        }

        $this->command->info('Datos inyectados relacionados correctamente');
    }
}
