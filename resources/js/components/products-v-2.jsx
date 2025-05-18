import { Link } from '@inertiajs/react';
import { useState } from 'react';
import ProductOverview from './product-overview'; // ✅ importe la popup
import tableProducts from './table-new-products';

export default function ProductsV2() {
    const [isDialogOpen, setIsDialogOpen] = useState(false);
    const [selectedProduct, setSelectedProduct] = useState(null);

    const handleProductClick = (product) => {
        const parsedProduct = {
            ...product,
            price: typeof product.price === 'string' ? parseFloat(product.price.replace(/[^\d.-]/g, '')) : product.price,
        };
        setSelectedProduct(parsedProduct);
        setIsDialogOpen(true);
    };

    return (
        <div className="bg-white">
            <div className="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
                <h2 className="sr-only">Products</h2>

                <div className="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                    {tableProducts.map((product) => (
                        <div key={product.id} className="group relative">
                            <Link href={product.href} className="block">
                                <img
                                    alt={product.imageAlt}
                                    src={product.imageSrc}
                                    className="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-7/8"
                                />
                                <h3 className="mt-4 text-sm text-gray-700">{product.name}</h3>
                                <p className="mt-1 text-lg font-medium text-gray-900">{product.price}</p>
                            </Link>

                            {/* ✅ Bouton pour ouvrir la popup */}
                            <button
                                onClick={() => handleProductClick(product)}
                                className="mt-2 w-full rounded-md bg-[#252B42] px-4 py-2 text-sm text-white hover:bg-[#3a3f54]"
                            >
                                Add to Cart
                            </button>
                        </div>
                    ))}
                </div>
            </div>

            {/* ✅ Intégration de la popup */}
            <ProductOverview open={isDialogOpen} setOpen={setIsDialogOpen} product={selectedProduct} />
        </div>
    );
}
