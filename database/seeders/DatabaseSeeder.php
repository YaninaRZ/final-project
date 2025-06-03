<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
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

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $order = Order::create(['client_id' => 1, 'status' => 'paid']);

        $product1 = Product::get(1);
        $order->products()->attach([
            1 => ['quantity' => 49],
            3 => ['quantity' => 10],
        ]);
    }
}
