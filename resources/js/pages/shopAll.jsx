import { Link } from '@inertiajs/react';
import { useState } from 'react';
import { useCart } from '../hooks/use-cart';
import GuestLayout from '../layouts/guest-layout';

import arrivalsProducts from '../components/arrivals-dataproduct';
import bodyProducts from '../components/body-data-product';
import maskProducts from '../components/mask-data-products';
import tableProducts from '../components/table-new-products';

import ProductOverview from '../components/product-overview';

function renderProductGrid(products, setIsDialogOpen, setSelectedProduct, handleAddToCart, addedProductIds) {
    return (
        <section className="mb-12 w-full max-w-7xl">
            <div className="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                {products.map((product) => {
                    const parsedProduct = {
                        ...product,
                        price: typeof product.price === 'string' ? parseFloat(product.price.replace('$', '')) : product.price,
                    };

                    return (
                        <div key={product.id} className="group relative rounded-lg p-4">
                            <Link href={route('shopp-all-detail', { id: product.uniqueId || product.id })} className="block">
                                <img
                                    src={product.imageSrc}
                                    alt={product.imageAlt}
                                    className="aspect-square w-full rounded-md bg-gray-200 object-cover group-hover:opacity-75 lg:aspect-auto lg:h-80"
                                />
                            </Link>
                            <div className="mt-4 flex flex-col gap-2">
                                <h3 className="text-sm text-gray-700">
                                    <Link href={route('shopp-all-detail', { id: product.uniqueId || product.id })} className="relative">
                                        <span aria-hidden="true" className="absolute inset-0" />
                                        {product.name}
                                    </Link>
                                </h3>
                                <button
                                    className="rounded-[5px] bg-[#252B42] px-[13px] py-2 text-sm text-white"
                                    onClick={() => handleAddToCart(parsedProduct)}
                                >
                                    Add to Cart
                                </button>
                                {addedProductIds.includes(product.id) && <p className="text-sm text-green-600">✅ Produit ajouté au panier</p>}
                            </div>
                        </div>
                    );
                })}
            </div>
        </section>
    );
}

export default function ShopAll() {
    const { addToCart } = useCart();
    const [isDialogOpen, setIsDialogOpen] = useState(false);
    const [selectedProduct, setSelectedProduct] = useState(null);
    const [addedProductIds, setAddedProductIds] = useState([]);

    const handleAddToCart = (product) => {
        addToCart(product, 1);
        setAddedProductIds((prev) => [...prev, product.id]);

        setTimeout(() => {
            setAddedProductIds((prev) => prev.filter((id) => id !== product.id));
        }, 2000);
    };

    return (
        <GuestLayout>
            <div className="font-montserrat flex min-h-screen flex-col items-center bg-white px-4 py-16 font-bold text-[#252B42]">
                <h1 className="mb-12 text-center text-4xl">Our Products</h1>

                <h2>New arrivals</h2>
                {renderProductGrid(arrivalsProducts, setIsDialogOpen, setSelectedProduct, handleAddToCart, addedProductIds)}
                <h2>Body Categorie</h2>
                {renderProductGrid(bodyProducts, setIsDialogOpen, setSelectedProduct, handleAddToCart, addedProductIds)}
                <h2>Mask Categorie</h2>
                {renderProductGrid(maskProducts, setIsDialogOpen, setSelectedProduct, handleAddToCart, addedProductIds)}
                <h2>Skinn Categorie</h2>
                {renderProductGrid(tableProducts, setIsDialogOpen, setSelectedProduct, handleAddToCart, addedProductIds)}

                {/* Popup produit */}
                <ProductOverview open={isDialogOpen} setOpen={setIsDialogOpen} product={selectedProduct} />
            </div>
        </GuestLayout>
    );
}
