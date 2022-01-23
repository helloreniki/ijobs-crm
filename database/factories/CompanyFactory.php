<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company(),
            'email' => $this->faker->unique()->safeEmail(),
            'address' => $this->faker->address(),
            'country' => $this->faker->country(),
            'website' => $this->faker->domainName(),
            'contacted' => $this->faker->boolean(),
            'my_rating' => $this->faker->optional()->numberBetween(0,6),
            'notes' => $this->faker->realText(rand(10,20)),
        ];
    }
}
