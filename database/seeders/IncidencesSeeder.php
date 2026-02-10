<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class IncidencesSeeder extends Seeder
{
    // Array maestro de configuración
    private $arrIncedence = [
        ['code_incidence' => '010', 'type_incidence' => 'light'],
        ['code_incidence' => '020', 'type_incidence' => 'medium'],
        ['code_incidence' => '030', 'type_incidence' => 'serious'],
    ];

    private function getStudentsFailed(): array
    {
        $students = Student::with('subjects')->get();
        $failedStudents = [];

        foreach ($students as $student) {
            $average = $student->subjects->avg('pivot.subject_grade');

            if ($average < 5) {
                // Obtenemos la fecha de matriculación del pivot o la de creación del alumno
                $fechaMatricula = $student->subjects->first()->pivot->created_at ?? $student->created_at;

                $failedStudents[] = [
                    'id_student' => $student->id_student,
                    'nombre' => $student->name,
                    'media' => $average,
                    'fecha_matriculacion' => $fechaMatricula,
                ];
            }
        }
        return $failedStudents; // CORREGIDO: Ahora sí devuelve los datos
    }

    private function dateIncidence($fechaMatricula)
    {
        $start = Carbon::parse($fechaMatricula);
        $end = Carbon::parse('2025-05-13');

        // Si la matrícula fuera posterior al límite (raro), ajustamos para evitar errores
        if ($start->gt($end)) {
            $start = $end->copy()->subMonth();
        }

        $diffInDays = $start->diffInDays($end);
        return $start->addDays(rand(0, $diffInDays))->format('Y-m-d');
    }

    public function run(): void
    {
        $suspendidos = $this->getStudentsFailed();

        foreach ($suspendidos as $alumno) {
            $nota = $alumno['media'];
            $numIncidencias = 0;
            $tiposPosibles = [];

            // --- LÓGICA CONDICIONAL ---
            if ($nota >= 3 && $nota < 5) {
                // Nota entre 3 y 5: 2-3 incidencias, leves o medias
                $numIncidencias = rand(2, 3);
                $tiposPosibles = ['light', 'medium'];
            } else {
                // Nota entre 0 y 3: 3-4 incidencias, medias o graves
                $numIncidencias = rand(3, 4);
                $tiposPosibles = ['medium', 'serious'];
            }

            for ($i = 0; $i < $numIncidencias; $i++) {
                $tipoElegido = $tiposPosibles[array_rand($tiposPosibles)];
                
                // Buscamos el código correspondiente al tipo elegido
                $config = collect($this->arrIncedence)->firstWhere('type_incidence', $tipoElegido);

                DB::table('incidences')->insert([
                    'id_student'     => $alumno['id_student'],
                    'code_incidence' => $config['code_incidence'],
                    'type_incidence' => $tipoElegido,
                    'date_incidence' => $this->dateIncidence($alumno['fecha_matriculacion']),
                    'details'        => ''
                ]);
            }
        }

        $this->command->info('Seeder ejecutado: Incidencias lógicas generadas correctamente.');
    }
}