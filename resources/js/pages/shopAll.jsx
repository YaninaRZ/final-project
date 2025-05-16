import { Link } from '@inertiajs/react';
import GuestLayout from '../layouts/guest-layout';

import arrivalsProducts from '../components/arrivals-dataproduct';
import bodyProducts from '../components/body-data-product';
import maskProducts from '../components/mask-data-products';
import tableProducts from '../components/table-new-products';

function renderProductGrid(title, products) {
    return (
        <section className="mb-12 w-full max-w-7xl">
            <h2 className="mb-6 text-2xl font-bold tracking-tight text-gray-900">{title}</h2>
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
                        <div className="mt-4 flex justify-between">
                            <div>
                                <h3 className="text-sm text-gray-700">
                                    <Link href={route('shopp-all-detail', { id: product.uniqueId || product.id })} className="relative">
                                        <span aria-hidden="true" className="absolute inset-0" />
                                        {product.name}
                                    </Link>
                                </h3>
                            </div>
                        </div>
                    </div>
                ))}
            </div>
        </section>
    );
}

export default function ShopAll() {
    return (
        <GuestLayout>
            <div className="font-montserrat flex min-h-screen flex-col items-center bg-white px-4 py-16 font-bold text-[#252B42]">
                <h1 className="mb-12 text-center text-4xl">Our Products</h1>

                {renderProductGrid('Arrivals', arrivalsProducts)}
                {renderProductGrid('Body Care', bodyProducts)}
                {renderProductGrid('Masks', maskProducts)}
                {renderProductGrid('Table Products', tableProducts)}
            </div>
        </GuestLayout>
    );
}
