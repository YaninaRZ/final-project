<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        // Ajuste ces infos si tu veux
        $email = 'admin@example.com';
        $password = 'password'; // change-le après la première connexion !

        // Si ta table users a ces colonnes, on les renseigne (sinon tu peux les enlever)
        $attrs = [
            'name' => 'Admin',
            'password' => Hash::make($password),
            'email_verified_at' => now(),
            // 'is_admin' => true, // décommente si tu as une colonne is_admin
            'remember_token' => Str::random(10),
        ];

        User::updateOrCreate(['email' => $email], $attrs);
    }
}
