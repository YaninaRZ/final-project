import { Link, usePage } from '@inertiajs/react';
import { useState } from 'react';
import allProducts from '../components/all-products-data';
import ProductOverview from '../components/product-overview';
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
            <div className="mx-auto max-w-xl px-6 py-10">
                <img src={product.imageSrc} alt={product.imageAlt} className="w-full rounded-xl" />
                <h1 className="mt-4 text-2xl font-bold">{product.name}</h1>
                <p className="mt-4">{product.description}</p>

                <div className="mt-2 flex items-center justify-between">
                    <p className="text-xl text-gray-800">{parsedProduct.price.toFixed(2)} $</p>
                    <button onClick={handleOpenPopup} className="ml-4 rounded-[5px] bg-[#252B42] px-[13px] py-2 text-sm text-white">
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
