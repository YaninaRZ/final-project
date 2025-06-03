import { usePage } from '@inertiajs/react';
import GuestLayout from '@/layouts/guest-layout';
import ProductsGrid from '@/components/products/products-grid';

export default function ProductIndex() {
    const { products: rawProducts } = usePage().props;
    const productsByCategory = rawProducts.reduce((groups, product) => {
        const categoryName = product.category?.name || 'Uncategorized';
        if (!groups[categoryName]) {
            groups[categoryName] = [];
        }
        groups[categoryName].push(product);
        return groups;
    }, {});

    console.log('Produits groupés par catégorie:', productsByCategory);


    return (
        <GuestLayout>
            <div className="font-montserrat flex min-h-screen flex-col items-center bg-white px-4 py-16 font-bold text-[#252B42]">
                <h1 className="mb-12 text-center text-4xl">Our Products</h1>

                {Object.entries(productsByCategory).map(([category, products]) => (
                    <div key={category} className="mb-10 w-full">
                        <h2 className="mb-6 text-2xl">{category}</h2>
                        <ProductsGrid products={products} />
                    </div>
                ))}
            </div>
        </GuestLayout>
    );
}
