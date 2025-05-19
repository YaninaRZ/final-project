import { Link, usePage } from '@inertiajs/react';
import { useState } from 'react';
import maskProducts from '../../components/mask-data-products';
import ProductOverview from '../../components/product-overview';
import { useCart } from '../../hooks/use-cart';
import GuestLayout from '../../layouts/guest-layout';

export default function ProductMask() {
    const { id } = usePage().props;
    const productId = parseInt(id);
    const product = maskProducts.find((p) => p.id === productId);

    const [isDialogOpen, setIsDialogOpen] = useState(false);
    const { addToCart } = useCart();
    const [addedProductId, setAddedProductId] = useState(null);

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

    return (
        <GuestLayout>
            <div className="mx-auto max-w-xl px-6 py-10">
                <img src={product.imageSrc} alt={product.imageAlt} className="w-full rounded-xl" />
                <h1 className="mt-4 text-2xl font-bold">{product.name}</h1>
                <p className="mt-4">{product.description}</p>

                <div className="mt-2 flex flex-col gap-2">
                    <div className="flex items-center justify-between">
                        <p className="text-xl text-gray-800">{product.price}</p>
                        <button onClick={() => setIsDialogOpen(true)} className="ml-4 rounded-[5px] bg-[#252B42] px-[13px] py-2 text-sm text-white">
                            Add to Cart
                        </button>
                    </div>


                    {addedProductId === product.id && <p className="text-sm text-green-600"> Product added to cart</p>}
                </div>

                <Link href="/new-products" className="mt-6 block text-blue-500">
                    ← Back
                </Link>


                <ProductOverview open={isDialogOpen} setOpen={setIsDialogOpen} product={product} />
            </div>
        </GuestLayout>
    );
}
