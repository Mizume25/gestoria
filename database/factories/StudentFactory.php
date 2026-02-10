<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class StudentFactory extends Factory
{
    
   public function definition(): array
{
    // 1. Decidimos primero el año académico y lo guardamos en la variable $grade
    $grade = $this->faker->randomElement(['Year 1', 'Year 2', 'Year 3', 'Year 4']);

    // 2. Extraemos el número (sin comillas en la constante)
    $gradeNumber = (int) filter_var($grade, FILTER_SANITIZE_NUMBER_INT);
    $year = 2026 - $gradeNumber;

    // 3. Creamos el objeto fecha basado en ese año
    $fechaMatricula = $this->faker->dateTimeBetween("$year-08-01", "$year-09-30");
    
    return [
        'name' => $this->faker->firstName(),
        'last_name' => $this->faker->lastName(),
        'age' => $this->faker->numberBetween(18, 30),
        // USAMOS las variables que calculamos arriba:
        'grade' => $grade, 
        'fecha_matricula' => $fechaMatricula->format('Y-m-d'),
    ];
}
}
