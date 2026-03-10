<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TeacherFactory extends Factory
{
    public function definition(): array
    {   
        return [
            'name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'age' => $this->faker->numberBetween(25, 65),
            'group' => $this->faker->randomElement(['Year 1', 'Year 2', 'Year 3', 'Year 4']),
            'fecha_contratacion' => $this->faker->date(),
            'salary' => $this->faker->randomElement([1100, 1200, 1300]), 
        ];
    }
}

