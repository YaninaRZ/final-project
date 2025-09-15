<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;

    public function test_guests_are_redirected_to_the_login_page()
    {
        // /admin/dashboard (route('dashboard')) est protégée
        $this->get(route('dashboard'))
            ->assertRedirect(route('login'));
    }

    public function test_authenticated_users_can_visit_the_dashboard()
    {
        // Crée un admin vérifié (passe les middlewares auth|verified|role:admin)
        $admin = User::factory()->create([
            'role' => 'admin',            // ⚠️ Assure-toi que ta table users a bien une colonne 'role'
            'email_verified_at' => now(), // si middleware 'verified' est actif
        ]);

        $this->actingAs($admin)
            ->get(route('dashboard'))
            ->assertOk();
    }
}
