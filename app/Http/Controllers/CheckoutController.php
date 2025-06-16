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

        // Récupère la dernière commande de l'utilisateur (à adapter si besoin)
        $order = Order::where('client_id', Auth::id())
            ->latest() // retourne un tableau 
            ->first(); // retourne le premier élément du tableau


        if (!$order) {
            abort(404, 'Aucune commande trouvée.');
        }

        // Session = lien de paiement Stripe
        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'eur',
                    'product_data' => [
                        'name' => 'Commande #' . $order->id,
                    ],
                    'unit_amount' => 12 * 100, // montant en centimes
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment', // subscription or payment
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
