import { Link, usePage } from '@inertiajs/react';
import { useState } from 'react';
import products from '../../components/creme-data-products';
import ProductOverview from '../../components/product-overview';
import { useCart } from '../../hooks/use-cart';
import GuestLayout from '../../layouts/guest-layout';

export default function ProductCreme() {
    const { id } = usePage().props;
    const productId = parseInt(id);
    const product = products.find((p) => p.id === productId);
    const [isDialogOpen, setIsDialogOpen] = useState(false);
    const { addToCart } = useCart();

    const [addedProductId, setAddedProductId] = useState(null); // ✅ nouveau

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

    function handleAddToCart() {
        addToCart(product, 1);
        setAddedProductId(product.id); // ✅ identifiant pour confirmation
        setTimeout(() => setAddedProductId(null), 2000); // ✅ réinitialise après 2 sec
    }

    return (
        <GuestLayout>
            <div className="mx-auto max-w-xl px-6 py-10">
                <img src={product.imageSrc} alt={product.imageAlt} className="w-full rounded-xl" />
                <h1 className="mt-4 text-2xl font-bold">{product.name}</h1>

                <div className="mt-2 flex flex-col gap-2">
                    <div className="flex items-center justify-between">
                        <p className="text-xl text-gray-800">{product.price}</p>
                        <button className="ml-4 rounded-[5px] bg-[#252B42] px-[13px] py-2 text-sm text-white" onClick={handleAddToCart}>
                            Add to Cart
                        </button>
                    </div>

                    {/* ✅ Message de confirmation */}
                    {addedProductId === product.id && <p className="text-sm text-green-600">✅ Produit ajouté au panier</p>}
                </div>

                <Link href="/new-products" className="mt-6 block text-blue-500">
                    ← Retour aux produits
                </Link>

                {/* Popup produit */}
                <ProductOverview open={isDialogOpen} setOpen={setIsDialogOpen} product={product} />
            </div>
        </GuestLayout>
    );
}
