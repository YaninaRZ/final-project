import { Link, usePage } from '@inertiajs/react';
import { useState } from 'react';
import allProducts from '@/data/products';
import ProductOverview from '@/components/product-overview';
import GuestLayout from '@/layouts/guest-layout';

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


    const parsedProduct = {
        ...product,
        price:
            typeof product.price === 'string'
                ? parseFloat(product.price.replace(/[^\d.-]/g, '')) || 0
                : typeof product.sales_price === 'number'
                    ? product.sales_price
                    : 0,
    };


    const handleOpenPopup = () => {
        setSelectedProduct(parsedProduct);
        setIsDialogOpen(true);
    };

    return (
        <GuestLayout>
            <div className="mx-auto max-w-xl px-6 py-10">
                {/* <img src={product.image_src} alt={product.imageAlt} className="w-full rounded-xl" /> */}
                <img
                    src={product.image_src}
                    alt={product.imageAlt || product.name}
                    className="w-full rounded-xl"
                />

                <h1 className="mt-4 text-2xl font-bold">{product.name}</h1>
                <p className="mt-4">{product.description}</p>

                <div className="mt-2 flex items-center justify-between">
                    <p className="text-xl text-gray-800">{parsedProduct.sales_price.toFixed(2)} $</p>
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
