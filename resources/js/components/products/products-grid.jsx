import { Link } from '@inertiajs/react';
import ProductOverview from "../product-overview"
import { useEffect, useState } from 'react';

function renderProductGrid(products, onProductClick) {
    return (
        <section className="mb-12 w-full max-w-7xl">
            <div className="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                {products.map((product) => (
                    <div key={product.id} className="group relative rounded-lg p-4">
                        <Link href={route('products.show', { id: product.uniqueId || product.id })} className="block">
                            <img
                                src={product.imageSrc}
                                alt={product.imageAlt}
                                className="aspect-square w-full rounded-md bg-gray-200 object-cover group-hover:opacity-75 lg:aspect-auto lg:h-80"
                            />
                        </Link>
                        <div className="mt-4 flex flex-col gap-2">
                            <h3 className="text-sm text-gray-700">
                                <Link href={route('products.show', { id: product.uniqueId || product.id })} className="relative">
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


export default function ProductsGrid({ products }) {

    const [isDialogOpen, setIsDialogOpen] = useState(false);
    const [selectedProduct, setSelectedProduct] = useState(null);
    const [allProducts, setAllProducts] = useState(products);

    const handleProductClick = (product) => {
        const parsedProduct = {
            ...product,
            price: typeof product.price === 'string' ? parseFloat(product.price.replace(/[^\d.-]/g, '')) : product.price,
        };
        setSelectedProduct(parsedProduct);
        setIsDialogOpen(true);

    };

    useEffect(() => {
        setAllProducts(products);
    }, [])
    return (
        <div className='font-montserrat flex flex-col items-center font-bold text-[#252B42]'>
            <h2 id={`${products[0].category}`}>{products[0].categoryTitle}</h2>
            {renderProductGrid(products, handleProductClick)}

            <ProductOverview open={isDialogOpen} setOpen={setIsDialogOpen} product={selectedProduct} />
        </div>
    )
}