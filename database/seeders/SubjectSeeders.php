<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Subject;
use App\Models\Teacher;
class SubjectSeeders extends Seeder
{   
    public $timestamps = false; // <--- AÑADE ESTO
    protected $primaryKey = 'id_subject'; // <--- ESTO ES VITAL
    //Array de materias que creamo
    private $arraySubjects = [
        ['name_subject' => 'Matematicas', 'elective_subject' => false],
        ['name_subject' => 'Lengua', 'elective_subject' => false],
        ['name_subject' => 'Ciencias', 'elective_subject' => false],
        ['name_subject' => 'Historia', 'elective_subject' => false],
        ['name_subject' => 'Teatro', 'elective_subject' => true],
        ['name_subject' => 'Informatica', 'elective_subject' => true],
    ];

    public function run()
    {   
        
        $this->seedCatalog(); 
        $this->command->info('Tabla catálogo inicializada con datos!');
    }

    //Funcion que accede a ese array y lo recorre con un foreach
    private function seedCatalog()
    {   
        $teachers = Teacher::all();
        $i = 0;
        foreach ($this->arraySubjects as $subject) {
            $p = new Subject;
            $p->name_subject = $subject['name_subject'];
            $p->elective_subject = $subject['elective_subject'];
            if (isset($teachers[$i])) {
                $p->id_teacher = $teachers[$i]->id_teacher;
            } else {
                // Si tienes más materias que profes, le asignamos uno al azar para que no de error
                $p->id_teacher = $teachers->random()->id_teacher;
            }
            $i++;
            $p->save();
        }
    }
}
