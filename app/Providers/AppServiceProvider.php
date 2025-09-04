<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Inertia::share([
            // Nombre d’articles DISTINCTS
            'cartCount' => function () {
                $cart = session('cart', ['items' => []]);
                return count($cart['items']); // 👈 un par produit
            },

            // (Optionnel) Total de quantités, si tu veux aussi l’avoir ailleurs
            'cartQty' => function () {
                $cart = session('cart', ['items' => []]);
                return collect($cart['items'])->sum('qty');
            },
        ]);
    }
}
