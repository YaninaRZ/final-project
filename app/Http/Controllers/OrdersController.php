<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Orders;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Orders::all();
        return Inertia::render('admin/order-list', ['orders' => $orders]);
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
        ]);

        Orders::create([
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'total_price' => $request->total_price,
            'status' => $request->status,
            'shipping_address' => $request->shipping_address,
            'order_items' => $request->order_items,
        ]);

        return redirect()->route('orders.index')->with('success', 'Order created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Orders $order)
    {
        return Inertia::render('admin/order-summary', [
            'order' => $order,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Orders $orders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Orders $orders)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Orders $orders)
    {
        $orders->delete();
        return redirect()->back()->with('success', 'Order deleted successfully.');
    }
}
