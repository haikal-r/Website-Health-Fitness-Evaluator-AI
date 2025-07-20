<?php
// tests/Feature/Questionnaire/GenerateResultTest.php
namespace Tests\Feature\GenerateResultTest;

use App\Models\BiodataUser;
use App\Models\MealPlan;
use App\Models\User;
use App\Models\WorkoutPlan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class GenerateResultTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function result_endpoint_recommendatio(): void
    {
        $user = User::factory()->create();
        BiodataUser::factory()->for($user)->create([
            'weight' => 50, // in kg
            'height' => 150, // in cm
            'gender' =>  'male',
            'bmi' => 50, // BMI range
            'birth_date' => '2005-12-31',
            'experience_level' => 'moderate',
            'activity_level' => 'active',
            'training_duration' => '60_minute',
            'accessibility' => 'both',
            'dietary_preferences' => 'gluten'
        ]);

        // Fake AI response
        $response = Http::fake([
            env('API_AI') . '/recommendation' => Http::response([
                'meals' => [

                    'breakfast' => [
                        'image_url' => 'https://test.jpg',
                        'name' => 'Sandhwich Chicken',
                        'serving_per_gram' => 280,
                    ],
                    'lunch' => [
                        'image_url' => 'https://test.jpg',
                        'name' => 'Chicken Karee',
                        'serving_per_gram' => 210,
                    ],
                    'dinner' => [
                        'image_url' => 'https://test.jpg',
                        'name' => 'Sirloin Steak',
                        'serving_per_gram' => 920,
                    ]

                ],
                'workouts' => [[
                    "expected_burn_kcal" => 200,
                    "intensity" => "Medium",
                    "target_muscles" => "Legs, Glutes",
                    "workout_name" => "Lunges"
                ]]
            ], 200),
        ]);

        $this->actingAs($user);
        $response = $this->get(route('result'));

        $response->assertOk()
            ->assertViewIs('result')
            ->assertViewHas('data');
    }
}
