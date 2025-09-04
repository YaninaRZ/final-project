<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\Order;
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeCheckoutSession;

class CheckoutController extends Controller
{
    public function __construct()
    {
        // Toujours charger la clé SECRÈTE depuis la config
        Stripe::setApiKey(config('services.stripe.secret'));
        // (optionnel) forcer une version API :
        // Stripe::setApiVersion('2024-06-20');
    }

    public function create(Request $request)
    {
        // $order = Order::where('client_id', Auth::id())->latest()->first();
        // if (!$order) {
        //     abort(404, 'Aucune commande trouvée.');
        // }
        $order = Order::with('products')->where('client_id', Auth::id())->latest()->first();
        if (!$order) {
            abort(404, 'Aucune commande trouvée.');
        }

        $order->amount = (int) round($order->calculateAmount()); // en euros
        $order->status = $order->status ?? 'pending';
        $order->save();


        $lineItems = [];
        foreach ($order->products as $product) {
            $unit = $product->sales_price ?? $product->price ?? 0;
            $qty  = (int) ($product->pivot->quantity ?? 1);

            $lineItems[] = [
                'price_data' => [
                    'currency' => 'eur',
                    'product_data' => ['name' => $product->name],
                    // 'unit_amount' => (int) round($product->sales_price * 100),
                    'unit_amount'  => (int) round($unit * 100), // centimes
                ],
                // 'quantity' => $product->pivot->quantity,
                'quantity' => $qty,
            ];
        }

        $session = StripeCheckoutSession::create([
            // 'payment_method_types' => ['card'], // inutile, Stripe le gère par défaut
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('checkout.success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url'  => route('checkout.cancel'),
            'metadata' => [
                'order_id' => (string) $order->id,     // 👈 pour la retrouver
                'user_id'  => (string) Auth::id(),
            ],
            'client_reference_id' => (string) Auth::id(),
        ]);

        return Inertia::location($session->url);
    }

    // public function success()
    // {
    //     return inertia('checkout/success');
    // }

    public function success(Request $request)
    {
        $sessionId = $request->query('session_id');
        abort_if(!$sessionId, 404, 'Session Stripe manquante.');

        // Récupère la session Stripe
        $session = StripeCheckoutSession::retrieve($sessionId, ['expand' => ['payment_intent']]);

        $orderId = $session->metadata->order_id ?? null;
        abort_if(!$orderId, 404, 'Commande introuvable.');

        // Vérifie le paiement
        if ($session->payment_status === 'paid') {
            Order::where('id', $orderId)
                ->where('client_id', Auth::id())
                ->update(['status' => 'paid']);
        }

        // Redirige vers ta page de remerciement ou résumé
        return inertia('checkout/success', [
            'orderId' => $orderId,
        ]);
    }

    public function cancel()
    {
        return inertia('checkout/cancel');
    }
}
