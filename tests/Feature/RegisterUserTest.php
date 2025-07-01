<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class RegisterUserTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_be_created()
    {
        $response = $this->post('/register', [
            'name' => 'Jean Dupont',
            'email' => 'jean@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertRedirect(route('dashboard'));

        $this->assertDatabaseHas('users', ['email' => 'jean@example.com']);
    }

    public function test_email_must_be_unique()
    {
        User::factory()->create([
            'email' => 'jean@example.com',
        ]);

        $response = $this->post('/register', [
            'name' => 'Duplication',
            'email' => 'jean@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertSessionHasErrors('email');
    }
}
