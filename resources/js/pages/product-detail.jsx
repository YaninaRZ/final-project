import { Link, usePage } from '@inertiajs/react';
import { useState } from 'react';
import ProductOverview from '@/components/product-overview';
import products from '@/components/table-new-products';
import { useCart } from '@/hooks/use-cart';
import GuestLayout from '@/layouts/guest-layout';

export default function ProductDetail() {
    const { addToCart } = useCart();
    const { id } = usePage().props;
    const productId = parseInt(id);
    const product = products.find((p) => p.id === productId);

    const [isDialogOpen, setIsDialogOpen] = useState(false);

    if (!product) {
        return (
            <div className="p-6">
                <p>Produit non trouvé.</p>
                <Link href="/" className="text-blue-600 underline">
                    ← Back
                </Link>
            </div>
        );
    }

    const parsedProduct = {
        ...product,
        price: typeof product.price === 'string' ? parseFloat(product.price.replace(/[^\d.-]/g, '')) : product.price,
    };

    function handleAddToCart() {
        addToCart(parsedProduct, 1);
        setIsDialogOpen(true);
    }

    return (
        <GuestLayout>
            <div className="mx-auto max-w-xl px-6 py-10">
                <img src={product.imageSrc} alt={product.imageAlt} className="w-full rounded-xl object-contain" style={{ maxHeight: '400px' }} />
                <h1 className="mt-4 text-2xl font-bold">{product.name}</h1>

                <div className="mt-2 flex items-center justify-between">
                    <p className="text-xl text-gray-800">{parsedProduct.price.toFixed(2)} $</p>
                    <button onClick={handleAddToCart} className="ml-4 rounded-[5px] bg-[#252B42] px-[13px] py-2 text-sm text-white">
                        Add to Cart
                    </button>
                </div>

                <Link href="/new-products" className="mt-6 block text-blue-500">
                    ← Back
                </Link>

                <ProductOverview open={isDialogOpen} setOpen={setIsDialogOpen} product={parsedProduct} />
            </div>
        </GuestLayout>
    );
}
