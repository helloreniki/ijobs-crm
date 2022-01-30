<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Comm;
use App\Models\Skill;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::factory()->create([
            'name' => 'Renata',
            'email' => 'renata@email.com',
        ]);


        $companies = Company::factory(20)->create();
        // $employees = Employee::factory(100)->create();

        $skill_names = ['php', 'laravel', 'css', 'statamic', 'vue', 'inertia', 'livewire', 'sql'];
        foreach ($skill_names as $skill_name) {
            Skill::factory()->create(['name' => $skill_name]);
        }

        foreach ($companies as $company) {
          // attach 1-3 employees
          $company->employees()->saveMany(Employee::factory(rand(1,3))->create()); // saveMany(array)

          // attach 1-3 skills to each company
          $random_skills = Skill::inRandomOrder()->take(rand(1,3))->get();
          foreach($random_skills as $skill) {
            $company->skills()->attach($skill->id);
          }
        }

        $comms = Comm::factory(50)->create();

    }
}
