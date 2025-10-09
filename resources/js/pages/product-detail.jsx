import { Link, usePage } from '@inertiajs/react';
import { useState } from 'react';
import ProductOverview from '@/components/product-overview';
import GuestLayout from '@/layouts/guest-layout';

// Helpers prix
const toPrice = (v) => {
    if (typeof v === 'string') {
        // "12,99 €" -> "12.99"
        v = v.replace(',', '.').replace(/[^\d.-]/g, '');
    }
    const n = Number(v);
    return Number.isFinite(n) ? n : 0;
};
const formatPrice = (n) =>
    new Intl.NumberFormat('fr-FR', { style: 'currency', currency: 'EUR' }).format(n);

export default function ProductShow() {
    const { product } = usePage().props;

    const [isDialogOpen, setIsDialogOpen] = useState(false);
    const [selectedProduct, setSelectedProduct] = useState(null);

    if (!product) {
        return (
            <GuestLayout>
                <div className="p-8 text-center text-xl text-gray-600">Produit non trouvé.</div>
            </GuestLayout>
        );
    }

    // Normalisation du produit reçu (force sales_price en number)
    const parsedProduct = {
        ...product,
        sales_price: toPrice(product?.sales_price ?? product?.price ?? 0),
    };
    const priceText = formatPrice(parsedProduct.sales_price);

    const handleOpenPopup = () => {
        setSelectedProduct(parsedProduct);
        setIsDialogOpen(true);
    };

    return (
        <GuestLayout>
            <div className="mx-auto max-w-xl px-6 py-10">
                <img
                    src={product.image_src}
                    alt={product.imageAlt || product.name}
                    className="w-full rounded-xl"
                />

                <h1 className="mt-4 text-2xl font-bold">{product.name}</h1>
                <p className="mt-4">{product.description}</p>

                <div className="mt-2 flex items-center justify-between">
                    <p className="text-xl text-gray-800">{priceText}</p>

                    <button
                        onClick={handleOpenPopup}
                        className="ml-4 rounded-[5px] bg-[#252B42] px-[13px] py-2 text-sm text-white"
                    >
                        Add to Cart
                    </button>
                </div>

                <Link href="/new-products" className="mt-6 block text-blue-500">
                    ← Back
                </Link>

                <ProductOverview open={isDialogOpen} setOpen={setIsDialogOpen} product={selectedProduct} />
            </div>
        </GuestLayout>
    );
}
