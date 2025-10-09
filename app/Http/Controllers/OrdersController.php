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
     * Statistiques + ventes mensuelles
     */
    public function dashboard()
    {
        $orders = Order::with('client', 'products')->get();

        $stats = [
            'totalOrders'     => Order::whereIn('status', ['pending', 'paid'])->count(),
            'pendingOrders'   => Order::where('status', 'pending')->count(),
            'paidOrders'      => Order::where('status', 'paid')->count(),
            'activeOrders'    => Order::where('status', 'active')->count(),
            'completedOrders' => Order::where('status', 'completed')->count(),
            'returnOrders'    => Order::where('status', 'returned')->count(),
        ];

        // === Compatibilité MySQL & SQLite ===
        $driver = DB::connection()->getDriverName();   // 'mysql' ou 'sqlite'
        $year   = 2025; // ou (int) date('Y') si tu veux l’année courante

        if ($driver === 'mysql') {
            $monthExpr = 'MONTH(orders.created_at)';

            $monthlySales = DB::table('orders')
                ->join('order_product', 'orders.id', '=', 'order_product.order_id')
                ->join('products', 'order_product.product_id', '=', 'products.id')
                ->selectRaw("$monthExpr AS month, SUM(order_product.quantity * products.sales_price) AS total_sales")
                ->whereYear('orders.created_at', $year)
                ->groupByRaw($monthExpr)
                ->orderByRaw($monthExpr)
                ->pluck('total_sales', 'month');
        } else { // sqlite
            $monthExpr = "CAST(strftime('%m', orders.created_at) AS INTEGER)";

            $monthlySales = DB::table('orders')
                ->join('order_product', 'orders.id', '=', 'order_product.order_id')
                ->join('products', 'order_product.product_id', '=', 'products.id')
                ->selectRaw("$monthExpr AS month, SUM(order_product.quantity * products.sales_price) AS total_sales")
                ->whereRaw("CAST(strftime('%Y', orders.created_at) AS INTEGER) = ?", [$year])
                ->groupByRaw($monthExpr)
                ->orderByRaw($monthExpr)
                ->pluck('total_sales', 'month');
        }

        // Compléter les 12 mois
        $completeMonthlySales = [];
        for ($i = 1; $i <= 12; $i++) {
            $completeMonthlySales[$i] = (float) ($monthlySales[$i] ?? 0);
        }

        return Inertia::render('admin/dashboard', [
            'orders'    => $orders,
            'stats'     => $stats,
            'sales2025' => array_values($completeMonthlySales),
        ]);
    }

    /**
     * @group Orders
     * Mes commandes (client)
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
     */
    public function create()
    {
        return Inertia::render('admin/order-create');
    }

    /**
     * @group Orders
     * Créer une commande
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_name'        => 'required|string|max:255',
            'customer_email'       => 'required|email|max:255',
            'total_price'          => 'required|numeric',
            'status'               => 'nullable|string|max:100',
            'shipping_address'     => 'nullable|string|max:500',
            'products'             => 'required|array',
            'products.*.id'        => 'required|exists:products,id',
            'products.*.quantity'  => 'required|integer|min:1',
        ]);

        $user = Auth::user();

        $order = Order::create([
            'customer_name'    => $request->customer_name,
            'customer_email'   => $request->customer_email,
            'total_price'      => $request->total_price,
            'status'           => $request->status ?? 'pending',
            'shipping_address' => $request->shipping_address ?? '',
            'client_id'        => $user?->id,
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
     */
    public function show(Order $order)
    {
        $order->load(['client', 'products']);
        $amount = $order->calculateAmount();

        return Inertia::render('admin/order-summary', [
            'order'  => $order,
            'amount' => $amount,
        ]);
    }

    /**
     * @group Orders
     * Factures de l’utilisateur (client)
     */
    public function clientOrders()
    {
        $user = Auth::user();

        $orders = Order::with('products')
            ->where('client_id', $user->id)
            ->get();

        return Inertia::render('client/user-billing', [
            'orders' => $orders,
            'auth'   => ['user' => $user],
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
     */
    public function destroy(Order $orders)
    {
        $orders->delete();
        return redirect()->back()->with('success', 'Order deleted successfully.');
    }

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
}
