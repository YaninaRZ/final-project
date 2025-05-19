import { Link } from '@inertiajs/react';
import { useState } from 'react';
import GuestLayout from '../layouts/guest-layout';

import arrivalsProducts from '../components/arrivals-dataproduct';
import bodyProducts from '../components/body-data-product';
import maskProducts from '../components/mask-data-products';
import tableProducts from '../components/table-new-products';

import ProductOverview from '../components/product-overview';

function renderProductGrid(products, onProductClick) {
    return (
        <section className="mb-12 w-full max-w-7xl">
            <div className="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                {products.map((product) => (
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
                            <button className="rounded-[5px] bg-[#252B42] px-[13px] py-2 text-sm text-white" onClick={() => onProductClick(product)}>
                                Add to Cart
                            </button>
                        </div>
                    </div>
                ))}
            </div>
        </section>
    );
}

export default function ShopAll() {
    const [isDialogOpen, setIsDialogOpen] = useState(false);
    const [selectedProduct, setSelectedProduct] = useState(null);

    // Lorsqu'on clique sur "Add to Cart" => ouvrir la popup avec ce produit
    const handleProductClick = (product) => {
        const parsedProduct = {
            ...product,
            price: typeof product.price === 'string' ? parseFloat(product.price.replace(/[^\d.-]/g, '')) : product.price,
        };
        setSelectedProduct(parsedProduct);
        setIsDialogOpen(true);
    };

    return (
        <GuestLayout>
            <div className="font-montserrat flex min-h-screen flex-col items-center bg-white px-4 py-16 font-bold text-[#252B42]">
                <h1 className="mb-12 text-center text-4xl">Our Products</h1>

                <h2 id="face-wash">New arrivals</h2>
                {renderProductGrid(arrivalsProducts, handleProductClick)}

                <h2 id="body-wash">Body Categorie</h2>
                {renderProductGrid(bodyProducts, handleProductClick)}

                <h2 id="face-wash">Mask Categorie</h2>
                {renderProductGrid(maskProducts, handleProductClick)}

                <h2 id="cleanser">Skinn Categorie</h2>
                {renderProductGrid(tableProducts, handleProductClick)}

                {/* ✅ Popup produit avec ajout au panier */}
                <ProductOverview open={isDialogOpen} setOpen={setIsDialogOpen} product={selectedProduct} />
            </div>
        </GuestLayout>
    );
}
