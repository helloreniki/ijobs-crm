<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $types=Arr::random(['phone', 'email']);

        return [
            // 'employee_id' => $this->faker->numberBetween(1,20), // employee can have many comms or 0 (could never be picked)
            'employee_id' => Employee::inRandomOrder()->first(),
            'content' => $this->faker->realText(rand(100,250)), // max number of characters
            'type' => $types,
            'date' => $this->faker->dateTime(), //default dateTime($max='now')
            'date_of_next_contact' => $this->faker->dateTimeBetween('now', '2 years'),
        ];
    }
}
