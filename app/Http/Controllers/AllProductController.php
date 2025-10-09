<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Schema;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;


class AllProductController extends Controller
{
    /**
     * @group Produits (Admin)
     * Lister tous les produits (admin)
     *
     * 
     * lalalla 
     * @response 200 {
     *   "props": {
     *     "products": [{"id": 1, "name": "Shampoo", "category": {"id": 2, "name":"Hair"}}],
     *     "categories": [{"id": 2, "name":"Hair"}]
     *   }
     * }
     * 
     * 
     * 
     */

    public function index()
    {
        $products = Product::with('category')->get();
        $categories = Category::all();

        return Inertia::render('admin/products', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }

    /**
     * @group Produits (Client)
     * Lister les produits côté client
     *
     * @queryParam category string Filtrer par slug ou nom de catégorie. Example: mode
     * @response 200 {
     *   "props": {
     *     "products": [{"id": 1, "name": "Shampoo"}],
     *     "categories": [{"id": 2, "name":"Hair"}],
     *     "category": "hair"
     *   }
     * }
     */

    public function clientIndex(Request $request)
    {
        $active = trim((string) $request->query('category', ''));

        $query = Product::with('category');

        if ($active !== '') {
            $query->whereHas('category', function ($q) use ($active) {
                $q->whereRaw('LOWER(TRIM(name)) = ?', [mb_strtolower($active)])
                    ->orWhere(function ($qq) use ($active) {
                        if (\Illuminate\Support\Facades\Schema::hasColumn('categories', 'slug')) {
                            $qq->where('slug', $active);
                        }
                    });
            });
        }

        // Récupération
        $products = $query->latest()->get();

        // ✅ Normaliser sales_price -> float (pour éviter les strings côté front)
        $products = $products->map(function ($p) {
            $p->sales_price = (float) ($p->sales_price ?? 0);
            return $p;
        });

        $categories = Category::select('id', 'name')
            ->when(\Illuminate\Support\Facades\Schema::hasColumn('categories', 'slug'), fn($q) => $q->addSelect('slug'))
            ->orderBy('name')
            ->get();

        return Inertia::render('products/index', [
            'products'       => $products,
            'categories'     => $categories,
            'activeCategory' => $active,
        ]);
    }







    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * @group Produits (Admin)
     * Créer un produit
     *
     * @bodyParam name string required Nom du produit. Example: Shampoo 
     * @bodyParam description string Description du produit. Example: A natural shampoo
     * @bodyParam sku string Référence interne. Example: TS-OVR-001
     * @bodyParam sales_quantity integer Quantité vendue. Example: 10
     * @bodyParam sales_remaining_products integer Stock restant. Example: 50
     * @bodyParam sales_price number Prix de vente (EUR). Example: 29.99
     * @bodyParam image_src string URL ou chemin d'image. Example: /images/ts-ovr.jpg
     * @bodyParam image_alt string Texte alternatif. Example: Shampoo natural 
     * @bodyParam category_id integer ID de catégorie existante. Example: 2
     *
     * @response 302 {
     *   "message": "Redirection vers la liste des produits"
     * }
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
            'category_id' => 'nullable|exists:categories,id',
        ]);

        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'sku' => $request->sku,
            'sales_quantity' => $request->sales_quantity,
            'sales_remaining_products' => $request->sales_remaining_products,
            'sales_price' => $request->sales_price,
            'image_src' => $request->image_src,
            'image_alt' => $request->image_alt,
            'category_id' => $request->category_id,
        ]);

        return to_route('products');
    }

    /**
     * @group Produits (Admin)
     * Voir le détail d’un produit
     *
     * @urlParam product integer required ID du produit. Example: 1
     * @response 200 {
     *   "props": {
     *     "product": {"id": 1, "name": "Shampoo", "category": {"id": 2, "name":"hair"}},
     *     "categories": [{"id":2,"name":"Hair"}]
     *   }
     * }
     */

    public function show(Product $allProduct)
    {
        $allProduct->load('category');

        // ✅ Normaliser sales_price -> float pour la page détail
        $product = $allProduct->toArray();
        $product['sales_price'] = (float) ($product['sales_price'] ?? 0);

        $categories = Category::all();

        return Inertia::render('admin/product-detail', [
            'product'     => $product,
            'categories'  => $categories,
        ]);
    }



    public function edit(Product $allProduct) {}

    /**
     * @group Produits (Admin)
     * Mettre à jour un produit
     *
     * @urlParam product integer required ID du produit. Example: 1
     * @bodyParam name string required Nom du produit. Example: Shampoo
     * @bodyParam description string Description du produit. Example: A natural shampoo
     * @bodyParam sku string Référence interne. Example: TS-OVR-001
     * @bodyParam sales_quantity integer Quantité vendue. Example: 12
     * @bodyParam sales_remaining_products integer Stock restant. Example: 38
     * @bodyParam sales_price number Prix de vente (EUR). Example: 31.99
     * @bodyParam image_src string URL/chemin image. Example: /images/ts-ovr.jpg
     * @bodyParam image_alt string Alt image. Example: Shampoo natural
     * @bodyParam product_gallery string Galerie images (format libre). Example: /g/ts-ovr
     * @bodyParam category_id integer ID de catégorie. Example: 2
     *
     * @response 302 {
     *   "message": "Redirection vers la page détail"
     * } 
     * */

    public function update(Request $request, Product $allProduct)
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
            'category_id' => 'nullable|exists:categories,id',
        ]);


        $allProduct->update($validated);
        return redirect()->route('product-detail', $allProduct->id);
    }

    /**
     * @group Produits (Admin)
     * Supprimer un produit
     *
     * @urlParam product integer required ID du produit. Example: 1
     * @response 302 {
     *   "message": "Redirection vers la page précédente"
     * }
     */

    public function destroy(Product $allProduct)
    {
        $allProduct->delete();
        return redirect()->back()->with('success', 'Category deleted with succes.');
    }
}
