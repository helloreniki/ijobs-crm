<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // 'company_id' => $this->faker->numberBetween(1,20),
            'company_id' => Company::inRandomOrder()->first(), // ?
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'notes' => $this->faker->realText(rand(10,20)),
        ];
    }
}
