'use client';

import { usePage } from '@inertiajs/react';
import GuestLayout from '@/layouts/guest-layout';
import { CreditCardIcon, KeyIcon, Link, UserCircleIcon } from 'lucide-react';
import { ArrowRightOnRectangleIcon } from '@heroicons/react/24/outline';
import ClientLayout from '@/layouts/client-layout.jsx';

function classNames(...classes) {
    return classes.filter(Boolean).join(' ');
}



export default function ViewOrder() {
    const { order } = usePage().props;

    if (!order) {
        return <p className="text-center text-red-600 mt-10">Order not found.</p>;
    }

    const totalCalculated = order.products.reduce((acc, product) => {
        const price = product.price ?? product.sales_price ?? 0;
        const quantity = product.pivot?.quantity ?? 1;
        return acc + price * quantity;
    }, 0);

    return (

        <ClientLayout>





            <div className="mx-auto max-w-7xl px-4 py-16 sm:px-6 sm:py-24 lg:px-8">
                <h1 className="text-3xl font-bold tracking-tight text-gray-900">Order Details #{order.id}</h1>

                <div className="mt-2 border-b border-gray-200 pb-5 text-sm sm:flex sm:justify-between">
                    <dl className="flex">
                        <dt className="text-gray-500">Order number&nbsp;</dt>
                        <dd className="font-medium text-gray-900">#{order.id}</dd>
                        <dt>
                            <span className="sr-only">Date</span>
                            <span aria-hidden="true" className="mx-2 text-gray-400">&middot;</span>
                        </dt>
                        <dd className="font-medium text-gray-900">
                            <time dateTime={order.created_at}>{new Date(order.created_at).toLocaleDateString()}</time>
                        </dd>
                    </dl>
                </div>

                <section aria-labelledby="products-heading" className="mt-8">
                    <h2 id="products-heading" className="sr-only">Products purchased</h2>

                    <div className="space-y-24">
                        {order.products.map((product) => {
                            const unitPrice = product.price ?? product.sales_price ?? 0;
                            const quantity = product.pivot?.quantity ?? 1;
                            const total = (unitPrice * quantity).toFixed(2);

                            return (
                                <div
                                    key={product.id}
                                    className="grid grid-cols-1 text-sm sm:grid-cols-12 sm:grid-rows-1 sm:gap-x-6 md:gap-x-8 lg:gap-x-8"
                                >
                                    <div className="sm:col-span-4 md:col-span-5 md:row-span-2 md:row-end-2">
                                        <img
                                            alt={product.image_alt ?? product.name}
                                            src={product.image_src ?? 'https://via.placeholder.com/300'}
                                            className="aspect-square w-full rounded-lg bg-gray-50 object-cover"
                                        />
                                    </div>
                                    <div className="mt-6 sm:col-span-7 sm:mt-0 md:row-end-1">
                                        <h3 className="text-lg font-medium text-gray-900">{product.name}</h3>
                                        <p className="mt-1 font-medium text-gray-900">{unitPrice.toFixed(2)} €</p>
                                        {product.description && <p className="mt-3 text-gray-500">{product.description}</p>}
                                    </div>
                                    <div className="sm:col-span-12 md:col-span-7">
                                        <dl className="grid grid-cols-1 gap-y-8 border-b border-gray-200 py-8 sm:grid-cols-2 sm:gap-x-6 sm:py-6 md:py-10">
                                            <div>
                                                <dt className="font-medium text-gray-900">Quantity</dt>
                                                <dd className="mt-3 text-gray-500">{quantity}</dd>
                                            </div>
                                            <div>
                                                <dt className="font-medium text-gray-900">Total</dt>
                                                <dd className="mt-3 text-gray-500">{total} €</dd>
                                            </div>
                                        </dl>
                                        <p className="mt-6 font-medium text-gray-900 md:mt-10">
                                            Status: <span className="capitalize">{order.status}</span>
                                        </p>
                                    </div>
                                </div>
                            );
                        })}
                    </div>
                </section>

                {/* Summary */}
                <section className="mt-24">
                    <h2 className="sr-only">Billing Summary</h2>

                    <div className="rounded-lg bg-gray-50 px-6 py-6 lg:grid lg:grid-cols-12 lg:gap-x-8 lg:px-0 lg:py-8">
                        <dl className="grid grid-cols-1 gap-6 text-sm sm:grid-cols-2 md:gap-x-8 lg:col-span-5 lg:pl-8">

                            <div>
                                <dt className="font-medium text-gray-900">Status</dt>
                                <dd className="mt-3 text-gray-500 capitalize">{order.status}</dd>
                            </div>
                        </dl>

                        <dl className="mt-8 divide-y divide-gray-200 text-sm lg:col-span-7 lg:mt-0 lg:pr-8">
                            <div className="flex items-center justify-between pb-4">
                                <dt className="text-gray-600">Subtotal</dt>
                                <dd className="font-medium text-gray-900">{totalCalculated.toFixed(2)} €</dd>
                            </div>
                            <div className="flex items-center justify-between pt-4">
                                <dt className="font-medium text-gray-900">Order total</dt>
                                <dd className="font-medium text-indigo-600">{totalCalculated.toFixed(2)} €</dd>
                            </div>
                        </dl>
                    </div>
                </section>

                <p className="mt-8 text-center">
                    <a href="/user-billing" className="inline-block text-blue-600 hover:underline font-semibold">
                        ← Back to orders
                    </a>
                </p>
            </div>


        </ClientLayout>
    );
}
