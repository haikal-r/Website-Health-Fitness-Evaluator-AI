<?php

namespace Database\Seeders;

use App\Models\BiodataUser;
use App\Models\Progress;
use App\Models\User;
use App\Models\UserAnswers;
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
            'weight' => 50,
            'height' => 175,
            'gender' => 'male',
            'age' => 19,
            'bmi' => $bmi,
            'birth_date' => '2005-10-11',
            'experience_level' => 'beginner',
            'activity_level' => 'not_active',
            'training_duration' => '20_minute',
            'accessibility' => 'no_equipment',
            'dietary_preferences' => 'none',
        ]);

        Progress::factory()->create([
            'id' => 1,
            'user_id' => 1,
            'weight' => 50
        ]);
    }
}
