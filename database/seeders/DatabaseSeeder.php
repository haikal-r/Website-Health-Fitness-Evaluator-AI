<?php

namespace Database\Seeders;

use App\Models\BiodataUser;
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
        ]);

        $heightInMeters = 175 / 100;
        $bmi = 50 / ($heightInMeters ** 2);

        BiodataUser::factory()->create([
            'id' => 1,
            'user_id' => 1,
            'age' => 20,
            'gender' => 'male',
            'weight' => 50,
            'height' => 175,
            'bmi' => $bmi,
            'birth_date' => '2005-10-11',
            'fitness_goal' => 'muscle_gain',
            'experience_level' => 'beginner',
            'activity_level' => 'not_active',
            'training_duration' => '20_minutes',
            'accessibility' => 'no_equipment',
            'dietary_preferences' => 'none',
            'dislike_food' => 'fish'
        ]);
    }
}
