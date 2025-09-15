<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


class HomePageTest extends TestCase
{
    use RefreshDatabase;

    public function test_home_page_is_accessible(): void
    {
        $this->artisan('migrate');

        // Crée une catégorie test
        $category = \App\Models\Category::factory()->create([
            'name' => 'Test Category',
        ]);

        $response = $this->get(route('home'));

        $response->assertStatus(200);
    }
}
