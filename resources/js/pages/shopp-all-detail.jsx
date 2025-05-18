import { usePage } from '@inertiajs/react';
import { useState } from 'react';
import allProducts from '../components/all-products-data';
import ProductOverview from '../components/product-overview'; // ✅ Import popup
import GuestLayout from '../layouts/guest-layout';

export default function ProductDetail() {
    const { id } = usePage().props;
    const [isDialogOpen, setIsDialogOpen] = useState(false);
    const [selectedProduct, setSelectedProduct] = useState(null);

    const product = allProducts.find((p) => p.uniqueId === id);

    if (!product) {
        return (
            <GuestLayout>
                <div className="p-8 text-center text-xl text-gray-600">Produit non trouvé.</div>
            </GuestLayout>
        );
    }

    // ✅ Parser le prix proprement
    const parsedProduct = {
        ...product,
        price: typeof product.price === 'string' ? parseFloat(product.price.replace(/[^\d.-]/g, '')) : product.price,
    };

    const handleOpenPopup = () => {
        setSelectedProduct(parsedProduct);
        setIsDialogOpen(true);
    };

    return (
        <GuestLayout>
            <div className="mx-auto max-w-3xl p-8">
                <h1 className="mb-4 text-3xl font-bold">{product.name}</h1>
                <img src={product.imageSrc} alt={product.imageAlt} className="mb-4 w-full max-w-md rounded" />
                <p className="text-lg text-gray-700">ID: {product.uniqueId}</p>
                <p className="mb-4 text-lg font-semibold text-gray-900">Prix : {parsedProduct.price.toFixed(2)} €</p>

                {/* ✅ Ouvre la popup au lieu d’ajouter directement */}
                <button onClick={handleOpenPopup} className="rounded bg-indigo-600 px-4 py-2 text-white hover:bg-indigo-700">
                    Ajouter au panier
                </button>
            </div>

            {/* ✅ Popup d'ajout au panier */}
            <ProductOverview open={isDialogOpen} setOpen={setIsDialogOpen} product={selectedProduct} />
        </GuestLayout>
    );
}
