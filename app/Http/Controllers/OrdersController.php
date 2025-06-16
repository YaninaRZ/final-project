<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Order::with('client', 'products')->get();
        return Inertia::render('admin/order-list', [
            'orders' => $orders,
        ]);
    }

    public function dashboard()
    {
        $orders = Order::with('client', 'products')->get();

        $stats = [
            'totalOrders' => Order::count(),
            'activeOrders' => Order::where('status', 'active')->count(),
            'completedOrders' => Order::where('status', 'completed')->count(),
            'returnOrders' => Order::where('status', 'returned')->count(),
        ];

        return Inertia::render('admin/dashboard', [
            'orders' => $orders,
            'stats' => $stats,
        ]);
    }
    public function showSalesDashboard()
    {
        $monthlySales = Order::selectRaw('MONTH(created_at) as month, SUM(total_price) as total_sales')
            ->whereYear('created_at', 2025)
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total_sales', 'month');

        $completeMonthlySales = [];
        for ($i = 1; $i <= 12; $i++) {
            $completeMonthlySales[$i] = $monthlySales[$i] ?? 0;
        }

        return Inertia::render('Dashboard', [
            'sales2025' => array_values($completeMonthlySales),
        ]);
    }


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

    public function create()
    {
        return Inertia::render('admin/order-create');
    }

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

    public function show(Order $order)
    {
        $order->load(['client', 'products']);
        $amount = $order->calculateAmount();

        return Inertia::render('admin/order-summary', [
            'order' => $order,
            'amount' => $amount,
        ]);
    }

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

    public function destroy(Order $orders)
    {
        $orders->delete();
        return redirect()->back()->with('success', 'Order deleted successfully.');
    }
}
