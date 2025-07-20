<?php
// tests/Feature/Questionnaire/StoreAnswerTest.php
namespace Tests\Feature\QuestionnaireTest;

use App\Enums\QuestionnaireStep;
use App\Models\BiodataUser;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class QuestionnaireTest extends TestCase
{
    use RefreshDatabase;

    protected User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        $this->actingAs($this->user);
    }

    /** @test */
    public function step5_calculates_and_saves_bmi(): void
    {
        $response = $this->post(
            route('questionnaire.store', 5),
            ['answer' => [70 /* kg */, 175 /* cm */]]
        );

        $response->assertRedirect(
            route('questionnaire.show', 5 + 1)
        );

        $this->assertDatabaseHas(BiodataUser::class, [
            'user_id' => $this->user->id,
            'weight'  => 70,
            'height'  => 175,
            'bmi'     => round(70 / (1.75 ** 2), 2),
        ]);
    }

    /** @test */
    public function generic_option_step_persists_correct_field(): void
    {
        $response = $this->post(
            route('questionnaire.store', 2),
            ['answer' => 'active']
        );

        $response->assertRedirect(route('questionnaire.show', 2 + 1));

        $this->assertDatabaseHas(BiodataUser::class, [
            'user_id'        => $this->user->id,
            'activity_level' => 'active',
        ]);
    }
}
