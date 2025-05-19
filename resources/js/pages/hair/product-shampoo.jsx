import { useState } from 'react';
import ProductOverview from '../../components/product-overview';
import hairproducts from '../../components/shampoo-data-products';

export default function ProductShampoo() {
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
                <h2 className="text-2xl font-bold tracking-tight text-gray-900">Trending</h2>

                <div className="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                    {hairproducts.map((product) => (
                        <div key={product.id} className="group relative">
                            {/* ✅ Lien sur l’image */}
                            <a href={product.href}>
                                <img
                                    alt={product.imageAlt}
                                    src={product.imageSrc}
                                    className="aspect-square w-full rounded-md bg-gray-200 object-cover group-hover:opacity-75 lg:aspect-auto lg:h-80"
                                />
                            </a>

                            <div className="mt-4 flex justify-between">
                                <div>
                                    {/* ✅ Lien sur le nom */}
                                    <h3 className="text-sm text-gray-700 hover:underline">
                                        <a href={product.href}>{product.name}</a>
                                    </h3>
                                    <p className="mt-1 text-sm text-gray-500">{product.color}</p>
                                </div>
                                <p className="text-sm font-medium text-gray-900">{product.price}</p>
                            </div>

                            {/* ✅ Bouton Add to Cart qui ouvre la popup */}
                            <button
                                onClick={(e) => {
                                    e.preventDefault(); // évite tout comportement par défaut
                                    handleProductClick(product);
                                }}
                                className="mt-2 w-full rounded-md bg-[#252B42] px-4 py-2 text-sm text-white hover:bg-[#3a3f54]"
                            >
                                Add to Cart
                            </button>
                        </div>
                    ))}
                </div>
            </div>

            {/* ✅ Composant de la popup */}
            <ProductOverview open={isDialogOpen} setOpen={setIsDialogOpen} product={selectedProduct} />
        </div>
    );
}
