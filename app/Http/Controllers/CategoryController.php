<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * @group Catégories (Admin)
     * Lister toutes les catégories
     *
     * @response 200 {
     *   "props": {
     *     "categories": [{"id":1,"name":"Hair","parent":null}],
     *     "parentCategories": [{"id":1,"name":"Hair"}]
     *   }
     * }
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

    /**
     * @group Catégories (Admin)
     * Récupérer la hiérarchie des catégories
     *
     * @response 200 {
     *   "props": {
     *     "categories": [
     *       {"id":1,"name":"Hair","children":[{"id":2,"name":"Shampoo"}]}
     *     ]
     *   }
     * }
     */


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
     * @group Catégories (Admin)
     * Créer une nouvelle catégorie
     *
     * @bodyParam name string required Nom de la catégorie. Example: Masks
     * @bodyParam parent_id integer ID d’une catégorie parente (optionnel). Example: 1
     *
     * @response 302 {
     *   "message": "Redirection vers la liste des catégories"
     * }
     */

    public function store(Request $request)
    {
        // Validation basique
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:categories,id',
        ]);

        // Générer le slug à partir du nom
        $data['slug'] = Str::slug($data['name']);

        // Vérifier l’unicité
        $base = $data['slug'];
        $i = 1;
        while (Category::where('slug', $data['slug'])->exists()) {
            $data['slug'] = $base . '-' . $i++;
        }

        // Créer la catégorie
        Category::create($data);

        return redirect()->back()->with('success', 'Catégorie créée avec succès !');
    }

    /**
     * @group Catégories (Admin)
     * Créer une catégorie parente (sans parent_id)
     *
     * @bodyParam name string required Nom de la catégorie parente. Example: Hair
     *
     * @response 200 {
     *   "message": "Catégorie parente créée avec succès"
     * }
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
     * @group Catégories (Admin)
     * Mettre à jour une catégorie
     *
     * @urlParam category integer required ID de la catégorie. Example: 2
     * @bodyParam name string required Nouveau nom de la catégorie. Example: Conditionner
     * @bodyParam parent_id integer ID de la catégorie parente. Example: 1
     *
     * @response 302 {
     *   "message": "Redirection avec succès"
     * }
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
     * @group Catégories (Admin)
     * Supprimer une catégorie
     *
     * @urlParam category integer required ID de la catégorie. Example: 3
     *
     * @response 302 {
     *   "message": "Catégorie supprimée avec succès"
     * }
     */

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->back()->with('success', 'Category deleted with succes.');
    }
}
