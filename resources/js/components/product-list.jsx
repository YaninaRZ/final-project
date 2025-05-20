import { useState } from 'react';
import ProductOverview from './product-overview';

export default function ProductList({ products, title = 'Produits' }) {
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

    if (!products || products.length === 0) {
        return (
            <div className="p-8 text-center text-gray-500">
                Aucun produit trouvé.
            </div>
        );
    }

    return (
        <div className="bg-white">
            <div className="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
                <h2 className="text-2xl font-bold tracking-tight text-gray-900">{title}</h2>

                <div className="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                    {products.map((product) => (
                        <div key={product.id} className="group relative">
                            <a href={product.href || '#'}>
                                <img
                                    alt={product.imageAlt || product.name}
                                    src={product.imageSrc || product.image}
                                    className="aspect-square w-full rounded-md bg-gray-200 object-cover group-hover:opacity-75 lg:aspect-auto lg:h-80"
                                />
                            </a>
                            <div className="mt-4 flex justify-between">
                                <div>
                                    <h3 className="text-sm text-gray-700 hover:underline">
                                        <a href={product.href || '#'}>{product.name}</a>
                                    </h3>
                                    {product.color && (
                                        <p className="mt-1 text-sm text-gray-500">{product.color}</p>
                                    )}
                                </div>
                                <p className="text-sm font-medium text-gray-900">
                                    {typeof product.price === 'number'
                                        ? `${product.price.toFixed(2)} €`
                                        : product.price}
                                </p>
                            </div>
                            <button
                                onClick={(e) => {
                                    e.preventDefault();
                                    handleProductClick(product);
                                }}
                                className="mt-2 w-full rounded-md bg-[#252B42] px-4 py-2 text-sm text-white hover:bg-[#3a3f54]"
                            >
                                Ajouter au panier
                            </button>
                        </div>
                    ))}
                </div>
            </div>

            <ProductOverview
                open={isDialogOpen}
                setOpen={setIsDialogOpen}
                product={selectedProduct}
            />
        </div>
    );
}
