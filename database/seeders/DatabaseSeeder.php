<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'jhon doe',
            'email' => 'jhon@example.com',
            'password' => 'password123',
            'age' => 50,
            'gender' => 'male',
            'weight' => 60,
            'height' => 178,
            'fitness_goal' => 'muscle_gain',
            'birth_date' => '1998-10-12'
        ]);
    }
}
