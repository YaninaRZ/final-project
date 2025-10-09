<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ce que tu as déjà (admin par défaut, catégories, produits)
        User::firstOrCreate(
            ['email' => 'admin@example.com'],
            ['name' => 'Admin', 'password' => Hash::make('password')]
        );

        $beauty = Category::firstOrCreate(['name' => 'Beauty']);
        $hair   = Category::firstOrCreate(['name' => 'Hair']);

        Product::firstOrCreate(
            ['name' => 'Shampoo'],
            ['category_id' => $hair->id, 'price' => 12.9, 'description' => 'Gentle shampoo']
        );
        Product::firstOrCreate(
            ['name' => 'Face Cream'],
            ['category_id' => $beauty->id, 'price' => 19.9, 'description' => 'Hydrating cream']
        );

        // ➜ Appelle en plus le seeder dédié (il mettra à jour le même admin si besoin)
        $this->call(AdminUserSeeder::class);
    }
}
