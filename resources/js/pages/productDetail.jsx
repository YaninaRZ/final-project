// resources/js/Pages/ProductDetail.jsx (ou autre chemin)
import { Link, usePage } from '@inertiajs/react';
import products from '../components/table-new-products';
import GuestLayout from '../layouts/guest-layout';
export default function ProductDetail() {
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
                <p className="mt-2 text-xl text-gray-800">{product.price}</p>
                <Link href="/new-products" className="mt-6 block text-blue-500">
                    ← Retour aux produits
                </Link>
            </div>
        </GuestLayout>
    );
}
