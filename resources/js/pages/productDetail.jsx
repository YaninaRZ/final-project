import { Link, usePage } from '@inertiajs/react';
import { useState } from 'react';
import ProductOverview from '../components/product-overview'; // Assure-toi que le chemin est correct
import products from '../components/table-new-products';
import GuestLayout from '../layouts/guest-layout';

export default function ProductDetail() {
    const { id } = usePage().props;
    const productId = parseInt(id);
    const product = products.find((p) => p.id === productId);

    const [isDialogOpen, setIsDialogOpen] = useState(false);

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

    return (
        <GuestLayout>
            <div className="mx-auto max-w-xl px-6 py-10">
                <img src={product.imageSrc} alt={product.imageAlt} className="w-full rounded-xl" />
                <h1 className="mt-4 text-2xl font-bold">{product.name}</h1>

                <div className="mt-2 flex items-center justify-between">
                    <p className="text-xl text-gray-800">{product.price}</p>
                    <button onClick={() => setIsDialogOpen(true)} className="ml-4 rounded-[5px] bg-[#252B42] px-[13px] py-2 text-sm text-white">
                        Add to Cart
                    </button>
                </div>

                <Link href="/new-products" className="mt-6 block text-blue-500">
                    ← Retour aux produits
                </Link>

                {/* Popup aperçu produit */}
                <ProductOverview open={isDialogOpen} setOpen={setIsDialogOpen} product={product} />
            </div>
        </GuestLayout>
    );
}
