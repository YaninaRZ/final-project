// resources/js/Pages/ProductDetail.jsx (ou autre chemin)
import { Link, usePage } from '@inertiajs/react';
import products from '../components/arrivals-dataproduct';
import GuestLayout from '../layouts/guest-layout';

export default function ProductDetails() {
    const { id } = usePage().props;
    const productId = parseInt(id);
    const product = products.find((p) => p.id === productId);

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
                    <button className="ml-4 rounded-[5px] bg-[#252B42] px-[13px] py-2 text-sm text-white">Add to Cart</button>
                </div>

                <Link href="/new-products" className="mt-6 block text-blue-500">
                    ← Retour aux produits
                </Link>
            </div>
        </GuestLayout>
    );
}
