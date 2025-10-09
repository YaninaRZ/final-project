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

    /**
     * @group Checkout
     * Créer une session Stripe Checkout pour la dernière commande de l’utilisateur
     *
     * Démarre un paiement pour la dernière commande du client connecté.
     * Retourne une redirection (Inertia::location) vers la page Stripe.
     *
     * @authenticated
     * @response 302 Redirection vers Stripe Checkout.
     * @responseField url string URL Stripe Checkout (transportée via redirection côté client)
     *
     * @remarks
     * - Récupère la dernière commande du user (via `client_id`).
     * - Calcule/maj `amount` et `status`.
     * - Construit `line_items` à partir des produits de la commande (prix en centimes).
     * - Redirige vers Stripe.
     */

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
            'client_reference_id' => (string) $order->id,

        ]);

        return Inertia::location($session->url);
    }

    // public function success()
    // {
    //     return inertia('checkout/success');
    // }

    /**
     * @group Checkout
     * Succès de paiement Stripe
     *
     * Vérifie la session Stripe et marque la commande comme "paid" si le paiement est réussi.
     * Renvoie une page Inertia avec l’ID de commande.
     *
     * @authenticated
     * @queryParam session_id string required Identifiant renvoyé par Stripe. Example: cs_test_a1b2c3
     *
     * @response 200 {
     *   "props": {
     *     "orderId": 42
     *   }
     * }
     */

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

    /**
     * @group Checkout
     * Annulation du paiement Stripe
     *
     * Affiche une page d’annulation simple.
     *
     * @authenticated
     * @response 200 {
     *   "component": "checkout/cancel"
     * }
     */

    public function cancel()
    {
        return inertia('checkout/cancel');
    }
}
