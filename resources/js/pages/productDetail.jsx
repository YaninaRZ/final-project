import { Link, usePage } from '@inertiajs/react';
import { useState } from 'react';
import ProductOverview from '../components/product-overview';
import products from '../components/table-new-products';
import { useCart } from '../hooks/use-cart';
import GuestLayout from '../layouts/guest-layout';

export default function ProductDetail() {
    const { addToCart } = useCart();
    const { id } = usePage().props;
    const productId = parseInt(id);
    const product = products.find((p) => p.id === productId);

    const [isDialogOpen, setIsDialogOpen] = useState(false);
    const [selectedProduct, setSelectedProduct] = useState(null);
    const [added, setAdded] = useState(false);

    if (!product) {
        return (
            <div className="p-6">
                <p>Produit non trouvé.</p>
                <Link href="/" className="text-blue-600 underline">
                    ← Retour
                </Link>
            </div>
        );
    }

    const parsedProduct = {
        ...product,
        price: typeof product.price === 'string' ? parseFloat(product.price.replace(/[^\d.-]/g, '')) : product.price,
    };

    // Ouvre la popup avec le produit
    const handleOpenPopup = () => {
        setSelectedProduct(parsedProduct);
        setIsDialogOpen(true);
    };

    // Fonction ajout panier déclenchée depuis la popup ou ici si besoin
    const handleAddToCart = (productToAdd) => {
        addToCart(productToAdd, 1);
        setAdded(true);
        setTimeout(() => setAdded(false), 2000);
    };

    return (
        <GuestLayout>
            <div className="mx-auto max-w-xl px-6 py-10">
                <img
                    src={product.imageSrc}
                    alt={product.imageAlt}
                    className="max-h-96 w-full rounded-xl object-contain"
                    style={{ maxWidth: '100%', maxHeight: '400px' }}
                />
                <h1 className="mt-4 text-2xl font-bold">{product.name}</h1>
                <p className="mt-2 text-xl text-gray-800">{parsedProduct.price.toFixed(2)} €</p>

                {/* Bouton pour ouvrir la popup */}
                <button onClick={handleOpenPopup} className="mt-6 rounded bg-[#252B42] px-6 py-2 text-white hover:bg-[#3a3f54]">
                    Ajouter au panier
                </button>

                {added && <p className="mt-2 text-green-600">✅ Produit ajouté au panier</p>}

                <Link href="/new-products" className="mt-6 block text-blue-500">
                    ← Retour aux produits
                </Link>

                {/* Popup avec possibilité d'ajouter au panier */}
                <ProductOverview
                    open={isDialogOpen}
                    setOpen={setIsDialogOpen}
                    product={selectedProduct}
                    onAddToCart={handleAddToCart} // passer la fonction d'ajout pour popup si nécessaire
                />
            </div>
        </GuestLayout>
    );
}
