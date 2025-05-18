'use client';

import { Dialog, DialogBackdrop, DialogPanel } from '@headlessui/react';
import { XMarkIcon } from '@heroicons/react/24/outline';
import { useState } from 'react';
import { useCart } from '../hooks/use-cart';

function classNames(...classes) {
    return classes.filter(Boolean).join(' ');
}

export default function ProductOverview({ open, setOpen, product }) {
    const [quantity, setQuantity] = useState(1);
    const { addToCart } = useCart();

    const decreaseQuantity = () => {
        setQuantity((q) => (q > 1 ? q - 1 : 1));
    };

    const increaseQuantity = () => {
        setQuantity((q) => q + 1);
    };

    if (!product) return null;

    const handleSubmit = (e) => {
        e.preventDefault();
        addToCart(product, quantity); // ajoute le produit avec la quantité sélectionnée
        setOpen(false); // ferme la popup
    };

    return (
        <Dialog open={open} onClose={() => setOpen(false)} className="relative z-10">
            <DialogBackdrop className="fixed inset-0 bg-gray-500/75 md:block" />

            <div className="fixed inset-0 z-10 w-screen overflow-y-auto">
                <div className="flex min-h-full items-stretch justify-center text-center md:items-center md:px-2 lg:px-4">
                    <span aria-hidden="true" className="hidden md:inline-block md:h-screen md:align-middle">
                        &#8203;
                    </span>
                    <DialogPanel className="flex w-full transform text-left text-base transition md:my-8 md:max-w-2xl md:px-4 lg:max-w-4xl">
                        <div className="relative flex w-full items-center overflow-hidden bg-white px-4 pt-14 pb-8 shadow-2xl sm:px-6 sm:pt-8 md:p-6 lg:p-8">
                            <button
                                type="button"
                                onClick={() => setOpen(false)}
                                className="absolute top-4 right-4 text-gray-400 hover:text-gray-500 sm:top-8 sm:right-6 md:top-6 md:right-6 lg:top-8 lg:right-8"
                            >
                                <span className="sr-only">Close</span>
                                <XMarkIcon aria-hidden="true" className="h-6 w-6" />
                            </button>

                            <div className="grid w-full grid-cols-1 items-start gap-x-6 gap-y-8 sm:grid-cols-12 lg:items-center lg:gap-x-8">
                                <img
                                    alt={product.imageAlt}
                                    src={product.imageSrc}
                                    className="aspect-[2/3] w-full rounded-lg bg-gray-100 object-cover sm:col-span-4 lg:col-span-5"
                                />
                                <div className="sm:col-span-8 lg:col-span-7">
                                    <h2 className="text-xl font-medium text-gray-900 sm:pr-12">{product.name}</h2>

                                    <section aria-labelledby="information-heading" className="mt-1">
                                        <h3 id="information-heading" className="sr-only">
                                            Product information
                                        </h3>

                                        <p className="font-medium text-gray-900">{product.price}</p>
                                    </section>

                                    <section aria-labelledby="options-heading" className="mt-8">
                                        <h3 id="options-heading" className="sr-only">
                                            Product options
                                        </h3>

                                        <form onSubmit={handleSubmit}>
                                            <div className="mb-4 flex items-center space-x-4">
                                                <label htmlFor="quantity" className="text-sm font-medium text-gray-700">
                                                    Quantité
                                                </label>
                                                <div className="flex items-center rounded-md border border-gray-300">
                                                    <button
                                                        type="button"
                                                        onClick={decreaseQuantity}
                                                        className="px-3 py-1 text-gray-700 hover:bg-gray-200"
                                                    >
                                                        -
                                                    </button>
                                                    <input
                                                        type="text"
                                                        id="quantity"
                                                        name="quantity"
                                                        value={quantity}
                                                        readOnly
                                                        className="w-12 text-center text-sm font-medium text-gray-900 outline-none"
                                                    />
                                                    <button
                                                        type="button"
                                                        onClick={increaseQuantity}
                                                        className="px-3 py-1 text-gray-700 hover:bg-gray-200"
                                                    >
                                                        +
                                                    </button>
                                                </div>
                                            </div>

                                            <button
                                                type="submit"
                                                className="mt-2 flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 px-8 py-3 text-base font-medium text-white hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:outline-hidden"
                                            >
                                                Add to cart
                                            </button>
                                        </form>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </DialogPanel>
                </div>
            </div>
        </Dialog>
    );
}
