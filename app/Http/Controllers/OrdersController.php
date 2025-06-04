<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::with('client', 'products')->get();
        return Inertia::render('admin/order-list', [
            'orders' => $orders,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('admin/order-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'total_price' => 'required|numeric',
            'status' => 'nullable|string|max:100',
            'shipping_address' => 'nullable|string|max:500',
            'order_items' => 'nullable|array',

            'products' => 'required|array',
            'products.*.id' => 'required|exists:products,id',
            'products.*.quantity' => 'required|integer|min:1',
        ]);

        $order = Order::create([
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'total_price' => $request->total_price,
            'status' => $request->status,
            'shipping_address' => $request->shipping_address,
            'order_items' => $request->order_items,
        ]);

        $productData = collect($request->products)->mapWithKeys(function ($product) {
            return [
                $product['id'] => ['quantity' => $product['quantity']],
            ];
        });

        $order->products()->attach($productData);


        return redirect()->route('orders.index')->with('success', 'Order created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //affiche toutes les infos de client si jai une clef etrangere client vient fichier orders.php le nom de ma function
        $order->load(['client', 'products']);
        $amount = $order->calculateAmount();

        return Inertia::render('admin/order-summary', [
            'order' => $order,
            'amount' => $amount,
        ]);
    }

    public function clientOrders()
    {
        $user = Auth::user(); // utilisateur connecté

        // Récupère ses commandes
        $orders = Order::with('products') // ou d'autres relations si tu veux
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

        $order = Order::with('products', 'client')->where('id', $id)->where('client_id', $user->id)->first();

        if (!$order) {
            abort(404, 'Commande non trouvée ou accès non autorisé');
        }

        return Inertia::render('client/view-order', [
            'order' => $order,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $orders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $orders)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $orders)
    {
        $orders->delete();
        return redirect()->back()->with('success', 'Order deleted successfully.');
    }
}
