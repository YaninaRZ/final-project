import { Link } from '@inertiajs/react';
import { useState } from 'react';
import GuestLayout from '../layouts/guest-layout';

import arrivalsProducts from '../components/arrivals-dataproduct';
import bodyProducts from '../components/body-data-product';
import maskProducts from '../components/mask-data-products';
import tableProducts from '../components/table-new-products';

import ProductOverview from '../components/product-overview';

function renderProductGrid(products, setIsDialogOpen, setSelectedProduct) {
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
                        <div className="mt-4 flex items-center justify-between">
                            <h3 className="text-sm text-gray-700">
                                <Link href={route('shopp-all-detail', { id: product.uniqueId || product.id })} className="relative">
                                    <span aria-hidden="true" className="absolute inset-0" />
                                    {product.name}
                                </Link>
                            </h3>
                            <button
                                className="ml-4 rounded-[5px] bg-[#252B42] px-[13px] py-2 text-sm text-white"
                                onClick={() => {
                                    setSelectedProduct(product);
                                    setIsDialogOpen(true);
                                }}
                            >
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

    return (
        <GuestLayout>
            <div className="font-montserrat flex min-h-screen flex-col items-center bg-white px-4 py-16 font-bold text-[#252B42]">
                <h1 className="mb-12 text-center text-4xl">Our Products</h1>

                <h2>New arrivals</h2>
                {renderProductGrid(arrivalsProducts, setIsDialogOpen, setSelectedProduct)}
                <h2>Body Categorie</h2>
                {renderProductGrid(bodyProducts, setIsDialogOpen, setSelectedProduct)}
                <h2>Mask Categorie</h2>
                {renderProductGrid(maskProducts, setIsDialogOpen, setSelectedProduct)}
                <h2>Skinn Categorie</h2>
                {renderProductGrid(tableProducts, setIsDialogOpen, setSelectedProduct)}

                {/* Popup */}
                <ProductOverview open={isDialogOpen} setOpen={setIsDialogOpen} product={selectedProduct} />
            </div>
        </GuestLayout>
    );
}
