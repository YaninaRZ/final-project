import { usePage } from '@inertiajs/react';
import allProducts from '../components/all-products-data';
import GuestLayout from '../layouts/guest-layout';

export default function ProductDetail() {
    const { id } = usePage().props;
    console.log('ID reçu :', id);
    console.log('allProducts:', allProducts);

    const product = allProducts.find((p) => p.uniqueId === id);

    if (!product) {
        return (
            <GuestLayout>
                <div className="p-8 text-center text-xl text-gray-600">Produit non trouvé.</div>
            </GuestLayout>
        );
    }

    return (
        <GuestLayout>
            <div className="mx-auto max-w-3xl p-8">
                <h1 className="mb-4 text-3xl font-bold">{product.name}</h1>
                <img src={product.imageSrc} alt={product.imageAlt} className="mb-4 w-full max-w-md rounded" />
                <p className="text-lg text-gray-700">ID: {product.uniqueId}</p>
            </div>
        </GuestLayout>
    );
}
