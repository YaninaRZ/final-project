<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {
        $categories = Category::with('parent')->get();
        $parentCategories = Category::whereNull('parent_id')->get();



        return Inertia::render('admin/categories', [
            'categories' => $categories,
            'parentCategories' => $parentCategories,
        ]);
    }

    /// categories hierarchy
    public function getHierarchy()
    {
        $categories = Category::with('children')->whereNull('parent_id')->get();

        return Inertia::render('admin/categories-hierarchy', [
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Pas besoin car modal
    }

    /**
     * Store a newly created category (sans parent ou enfant).
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:categories,id',
        ]);

        Category::create([
            'name' => $request->name,
            'parent_id' => $request->parent_id ?? null,
        ]);

        return to_route('categories');
    }

    /**
     * Store a newly created category parente (pour ta popup).
     */
    public function storeParent(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // parent_id = null explicitement pour une catégorie parente
        Category::create([
            'name' => $request->name,
            'parent_id' => null,
        ]);

        return response()->json(['message' => 'Catégorie parente créée avec succès']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        // Pas besoin car modal
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate(['name' => 'required|string|max:255']);
        $category->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
        ]);

        return redirect()->back()->with('success', 'Category modified.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->back()->with('success', 'Category deleted with succes.');
    }
}
