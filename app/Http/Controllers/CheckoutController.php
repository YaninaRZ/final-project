<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use Inertia\Inertia;

class CheckoutController extends Controller
{
    public function create(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_KEY'));

        $order = Order::where('client_id', Auth::id())->latest()->first();

        if (!$order) {
            abort(404, 'Aucune commande trouvée.');
        }

        // Générer les produits pour Stripe
        $lineItems = [];

        foreach ($order->products as $product) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'eur',
                    'product_data' => [
                        'name' => $product->name,
                    ],
                    'unit_amount' => $product->sales_price * 100, // En centimes
                ],
                'quantity' => $product->pivot->quantity,
            ];
        }

        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('checkout.success'),
            'cancel_url' => route('checkout.cancel'),
        ]);

        return Inertia::location($session->url);
    }


    public function success()
    {
        // Tu peux ici marquer la commande comme "payée"
        return inertia('checkout/success');
    }

    public function cancel()
    {
        return inertia('checkout/cancel');
    }
}
