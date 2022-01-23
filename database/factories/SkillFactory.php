<?php

namespace Database\Factories;

use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

class SkillFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // $names = ['php', 'laravel', 'css', 'statamic', 'vue', 'inertia', 'livewire', 'sql'];

        return [
            'name' => $this->faker->name(),
        ];
    }
}
