import { usePage } from '@inertiajs/react';
import { useEffect, useState } from 'react';
import GuestLayout from '../../layouts/guest-layout';
import allProducts from '../../components/all-products-data';
import ProductsGrid from '../../components/products/products-grid';


function groupProductsByCategory(products) {
    return products.reduce((acc, product) => {
        const slug = product.category;

        if (!acc[slug]) {
            acc[slug] = {
                slug: product.category,
                title: product.categoryTitle,
                products: []
            };
        }

        acc[slug].products.push(product);
        return acc;
    }, {});
}


export default function ProductIndex() {
    const { category } = usePage().props;



    const [products, setProducts] = useState(allProducts);



    useEffect(() => {

        if (category) {
            console.log(category);
            const filteredProducts = products.filter(product => product.category == category);
            setProducts(filteredProducts);
        } else {
            setProducts(groupProductsByCategory(products))
        }
    }, []);



    return (
        <GuestLayout>
            <div className="font-montserrat flex min-h-screen flex-col items-center bg-white px-4 py-16 font-bold text-[#252B42]">
                <h1 className="mb-12 text-center text-4xl">Our Products</h1>
                {category ?
                    <><ProductsGrid products={products} /></>
                    :
                    (Object.entries(products).map(([slug, category]) => (


                        <ProductsGrid products={category.products} />

                    )))}
            </div>
        </GuestLayout>
    );
}
