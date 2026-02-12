<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
class UserSeeder extends Seeder
{
    public function run(): void
    {
        //Recogemos todos los estudiantes
        $students = Student::all();
        $this->command->info('Creando Todos los Usuarios');

        //Recorremos cada studiante
        foreach ($students as $student) {
            User::create([
                'name' => $student->name,
                'email' => $student->name . '@lumina.cat',
                'password' => Hash::make("{$student->id}-inslumina"),

            ]);
        }

        // 2. Vinculamos en la tabla intermedia 'student_user'
        // Opción A: Usando DB directo (si no tienes relación definida aún)
       

        //Creamos user admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@lumina.com',
            'password' => Hash::make('admin1234'),
        ]);
    }
}
