<?php

namespace App\Http\Controllers;

use App\Models\AllProduct;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AllProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = AllProduct::all();
        return Inertia::render('admin/all-products', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'sku' => 'nullable|string|max:100',
            'sales_quantity' => 'nullable|integer',
            'sales_remaining_products' => 'nullable|integer',
            'sales_price' => 'nullable|numeric',
            'image_src' => 'nullable|string|max:255',
            'image_alt' => 'nullable|string|max:255',
            'product_gallery' => 'nullable|array',
        ]);

        $product = AllProduct::create([
            'name' => $request->name,
            'description' => $request->description,
            'sku' => $request->sku,
            'sales_quantity' => $request->sales_quantity,
            'sales_remaining_products' => $request->sales_remaining_products,
            'sales_price' => $request->sales_price,
            'image_src' => $request->image_src,
            'image_alt' => $request->image_alt,
            'product_gallery' => $request->product_gallery,
        ]);

        return to_route('all-products');
    }

    /**
     * Display the specified resource. ma page detail
     */
    public function show(AllProduct $allProduct)
    {
        return Inertia::render('admin/product-detail', [
            'product' => $allProduct,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AllProduct $allProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AllProduct $allProduct)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'sku' => 'nullable|string|max:100',
            'sales_quantity' => 'nullable|integer',
            'sales_remaining_products' => 'nullable|integer',
            'sales_price' => 'nullable|numeric',
            'image_src' => 'nullable|string',
            'image_alt' => 'nullable|string',
            'product_gallery' => 'nullable|string',
        ]);


        $allProduct->update($validated);
        return redirect()->route('product-detail', $allProduct->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AllProduct $allProduct)
    {
        //
    }
}
