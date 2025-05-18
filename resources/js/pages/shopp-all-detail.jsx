import { usePage } from '@inertiajs/react';
import { useState } from 'react';
import allProducts from '../components/all-products-data';
import { useCart } from '../hooks/use-cart';
import GuestLayout from '../layouts/guest-layout';

export default function ProductDetail() {
    const { addToCart } = useCart();
    const { id } = usePage().props;
    const [added, setAdded] = useState(false); // Pour l'affichage temporaire

    const product = allProducts.find((p) => p.uniqueId === id);

    if (!product) {
        return (
            <GuestLayout>
                <div className="p-8 text-center text-xl text-gray-600">Produit non trouvé.</div>
            </GuestLayout>
        );
    }

    // On parse le prix si c'est une string genre "$39.00"
    const parsedProduct = {
        ...product,
        price: typeof product.price === 'string' ? parseFloat(product.price.replace('$', '')) : product.price,
    };

    const handleAddToCart = () => {
        addToCart(parsedProduct, 1);
        setAdded(true);
        setTimeout(() => setAdded(false), 2000); // Disparait après 2 secondes
    };

    return (
        <GuestLayout>
            <div className="mx-auto max-w-3xl p-8">
                <h1 className="mb-4 text-3xl font-bold">{product.name}</h1>
                <img src={product.imageSrc} alt={product.imageAlt} className="mb-4 w-full max-w-md rounded" />
                <p className="text-lg text-gray-700">ID: {product.uniqueId}</p>
                <p className="mb-4 text-lg font-semibold text-gray-900">Prix : {parsedProduct.price.toFixed(2)} €</p>

                <button onClick={handleAddToCart} className="rounded bg-indigo-600 px-4 py-2 text-white hover:bg-indigo-700">
                    Ajouter au panier
                </button>

                {added && <p className="mt-2 text-green-600">✅ Produit ajouté au panier</p>}
            </div>
        </GuestLayout>
    );
}
