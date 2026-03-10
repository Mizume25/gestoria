<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Seeder;
use App\Models\Teacher;
use Illuminate\Support\Facades\Hash;
class TeacherSeeder extends Seeder
{
    public function run(): void
    {
        

        $teachers = Teacher::all();
        foreach ($teachers as $teacher) {
            $teacher->update([
                'email' => $teacher->name .$teacher->id_teacher . '@lumina.cat',
                'password' => Hash::make("{$teacher->id_teacher}-inslumina"),

            ]);
        }
        
        $this->command->info('Profesores insertados correctamente!');
    }
}
