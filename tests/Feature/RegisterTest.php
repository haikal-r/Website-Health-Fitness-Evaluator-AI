<?php
// tests/Feature/Auth/RegisterTest.php
namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_register_with_valid_payload(): void
    {
        $payload = [
            'name'                  => 'Jane Doe',
            'email'                 => 'jane@example.com',
            'password'              => 'secret123',
            'password_confirmation' => 'secret123',
            'birth_day'             => 15,
            'birth_month'           => 4,
            'birth_year'            => 1995,
        ];

        $response = $this->post(route('register.store'), $payload);

        $response->assertRedirect(route('questionnaire.show', 1));
        $this->assertAuthenticated();
        $this->assertDatabaseHas(User::class, [
            'email' => 'jane@example.com',
        ]);
    }
}
