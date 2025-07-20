<?php

namespace Database\Factories;

use App\Models\BiodataUser;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BiodataUser>
 */
class BiodataUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = BiodataUser::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'weight' => $this->faker->numberBetween(40, 120), // in kg
            'height' => $this->faker->numberBetween(150, 200), // in cm
            'gender' =>  $this->faker->randomElement(['female', 'male']),
            'bmi' => $this->faker->randomFloat(2, 15, 40), // BMI range
            'birth_date' => $this->faker->date('Y-m-d', '2005-12-31'),
            'experience_level' => $this->faker->randomElement(['beginner', 'moderate', 'expert']),
            'activity_level' => $this->faker->randomElement(['not_active', 'quite_active', 'active']),
            'training_duration' => $this->faker->randomElement(['20_minute', '30_minute', '60_minute']),
            'accessibility' => $this->faker->randomElement(['no_equipment', 'with_equipment', 'both']),
            'dietary_preferences' => $this->faker->randomElement(['none', 'vegan', 'gluten', 'pescatarian', 'vegatarian']),
        ];
    }
}
