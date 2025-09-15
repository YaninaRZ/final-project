<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{

    /**
     * @group Orders
     * Lister toutes les commandes (admin)
     *
     * Retourne la page Inertia avec la liste des commandes (clients + produits).
     * @authenticated
     * @response 200 {"component":"admin/order-list","props":{"orders":[{"id":1,"status":"pending"}]}}
     */

    public function index()
    {
        $orders = Order::with('client', 'products')->get();
        return Inertia::render('admin/order-list', [
            'orders' => $orders,
        ]);
    }

    /**
     * @group Orders
     * Tableau de bord des ventes (admin)
     *
     * Statistiques (totaux, pending, paid, etc.) + ventes mensuelles 2025.
     * @authenticated
     * @response 200 {"component":"admin/dashboard","props":{"stats":{"totalOrders":12,"paidOrders":5},"sales2025":[0,1200,0,...]}}
     */

    public function dashboard()
    {
        $orders = Order::with('client', 'products')->get();

        $stats = [
            'totalOrders' => Order::whereIn('status', ['pending', 'paid'])->count(),
            'pendingOrders' => Order::where('status', 'pending')->count(),
            'paidOrders' => Order::where('status', 'paid')->count(),
            'activeOrders' => Order::where('status', 'active')->count(),
            'completedOrders' => Order::where('status', 'completed')->count(),
            'returnOrders' => Order::where('status', 'returned')->count(),
        ];


        $monthlySales = DB::table('orders')
            ->join('order_product', 'orders.id', '=', 'order_product.order_id')
            ->join('products', 'order_product.product_id', '=', 'products.id')
            ->selectRaw("CAST(strftime('%m', orders.created_at) AS INTEGER) as month, SUM(order_product.quantity * products.sales_price) as total_sales")
            ->whereYear('orders.created_at', 2025)
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total_sales', 'month');


        $completeMonthlySales = [];
        for ($i = 1; $i <= 12; $i++) {
            $completeMonthlySales[$i] = $monthlySales[$i] ?? 0;
        }

        return Inertia::render('admin/dashboard', [
            'orders' => $orders,
            'stats' => $stats,
            'sales2025' => array_values($completeMonthlySales), // ✅ Ajouté ici
        ]);
    }

    // public function showSalesDashboard()
    // {
    //     $monthlySales = Order::selectRaw('MONTH(created_at) as month, SUM(total_price) as total_sales')
    //         ->whereYear('created_at', 2025)
    //         ->groupBy('month')
    //         ->orderBy('month')
    //         ->pluck('total_sales', 'month');

    //     $completeMonthlySales = [];
    //     for ($i = 1; $i <= 12; $i++) {
    //         $completeMonthlySales[$i] = $monthlySales[$i] ?? 0;
    //     }

    //     return Inertia::render('Dashboard', [
    //         'sales2025' => array_values($completeMonthlySales),
    //     ]);
    // }

    /**
     * @group Orders
     * Mes commandes (client)
     *
     * Liste les commandes pour l’utilisateur connecté (filtrage par email).
     * @authenticated
     * @response 200 {"component":"client/my-orders","props":{"orders":[{"id":7,"status":"paid"}]}}
     */
    public function myOrders()
    {
        $user = Auth::user();

        $orders = Order::with('products')
            ->where('customer_email', $user->email)
            ->get();

        return Inertia::render('client/my-orders', [
            'orders' => $orders,
        ]);
    }

    /**
     * @group Orders
     * Formulaire de création (admin)
     *
     * Affiche la page Inertia pour créer une nouvelle commande.
     * @authenticated
     * @response 200 {"component":"admin/order-create"}
     */

    public function create()
    {
        return Inertia::render('admin/order-create');
    }
    /**
     * @group Orders
     * Créer une commande (admin ou client connecté)
     *
     * Crée une commande et attache les produits (id + quantity).
     * @authenticated
     * @bodyParam customer_name string required Nom du client. Example: Alice Martin
     * @bodyParam customer_email string required Email du client. Example: alice@example.com
     * @bodyParam total_price number required Total de la commande. Example: 149.99
     * @bodyParam status string Statut initial. Example: pending
     * @bodyParam shipping_address string Adresse de livraison. Example: 10 rue de Paris, 75000 Paris
     * @bodyParam products array required Tableau des produits.
     * @bodyParam products[].id integer required ID du produit. Example: 3
     * @bodyParam products[].quantity integer required Quantité. Example: 2
     * @response 302 Redirection vers la page suivante (clientOrders ou thank-you) avec message de succès.
     */

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'total_price' => 'required|numeric',
            'status' => 'nullable|string|max:100',
            'shipping_address' => 'nullable|string|max:500',
            'products' => 'required|array',
            'products.*.id' => 'required|exists:products,id',
            'products.*.quantity' => 'required|integer|min:1',
        ]);

        $user = Auth::user(); // On peut le garder ici, pour associer l'ID s'il est connecté

        $order = Order::create([
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'total_price' => $request->total_price,
            'status' => $request->status ?? 'pending',
            'shipping_address' => $request->shipping_address ?? '',
            'client_id' => $user?->id, // null si pas connecté
        ]);

        $productData = collect($request->products)->mapWithKeys(function ($product) {
            return [
                $product['id'] => ['quantity' => $product['quantity']],
            ];
        });

        $order->products()->attach($productData);

        return redirect()->route($user ? 'orders.clientOrders' : 'thank-you')->with('success', 'Commande passée avec succès.');
    }

    /**
     * @group Orders
     * Détails d’une commande (admin)
     *
     * Affiche le résumé d’une commande avec client + produits + montant calculé.
     * @authenticated
     * @urlParam order integer required ID de la commande. Example: 12
     * @response 200 {"component":"admin/order-summary","props":{"order":{"id":12},"amount":199.9}}
     */


    public function show(Order $order)
    {
        $order->load(['client', 'products']);
        $amount = $order->calculateAmount();

        return Inertia::render('admin/order-summary', [
            'order' => $order,
            'amount' => $amount,
        ]);
    }

    /**
     * @group Orders
     * Factures de l’utilisateur (client)
     *
     * Liste des commandes de l’utilisateur connecté (par client_id).
     * @authenticated
     * @response 200 {"component":"client/user-billing","props":{"orders":[{"id":4}],"auth":{"user":{"id":1}}}}
     */

    public function clientOrders()
    {
        $user = Auth::user();

        $orders = Order::with('products')
            ->where('client_id', $user->id)
            ->get();

        return Inertia::render('client/user-billing', [
            'orders' => $orders,
            'auth' => ['user' => $user],
        ]);
    }

    /**
     * @group Orders
     * Voir une commande (client)
     *
     * Affiche une commande précise appartenant au user connecté (sécurisée).
     * @authenticated
     * @urlParam id integer required ID de la commande. Example: 9
     * @response 200 {"component":"client/view-order","props":{"order":{"id":9}}}
     * @response 404 {"message":"Commande non trouvée ou accès non autorisé"}
     */

    public function showClientOrder($id)
    {
        $user = Auth::user();

        $order = Order::with('products', 'client')
            ->where('id', $id)
            ->where('client_id', $user->id)
            ->first();

        if (!$order) {
            abort(404, 'Commande non trouvée ou accès non autorisé');
        }

        return Inertia::render('client/view-order', [
            'order' => $order,
        ]);
    }

    public function edit(Order $orders)
    {
        //
    }

    public function update(Request $request, Order $orders)
    {
        //
    }

    /**
     * @group Orders
     * Supprimer une commande (admin)
     *
     * Supprime la commande et redirige avec un message de succès.
     * @authenticated
     * @urlParam orders integer required ID de la commande. Example: 5
     * @response 302 Redirection avec message "Order deleted successfully."
     */

    public function destroy(Order $orders)
    {
        $orders->delete();
        return redirect()->back()->with('success', 'Order deleted successfully.');
    }
}
