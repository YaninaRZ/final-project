'use client';

import { Dialog, DialogBackdrop } from '@headlessui/react';
import { XMarkIcon } from '@heroicons/react/24/outline';
import { useState } from 'react';
import { useCart } from '@/hooks/use-cart';

export default function ProductOverview({ open, setOpen, product }) {
    const [quantity, setQuantity] = useState(1);
    const { addToCart } = useCart();

    if (!product) return null;

    const increaseQuantity = () => setQuantity((q) => q + 1);
    const decreaseQuantity = () => setQuantity((q) => (q > 1 ? q - 1 : 1));

    const handleSubmit = (e) => {
        e.preventDefault();
        addToCart(product, quantity);
        setOpen(false);
    };

    return (
        <Dialog open={open} onClose={() => setOpen(false)} className="relative z-10">
            <DialogBackdrop className="fixed inset-0 bg-black/30" />

            <div className="fixed inset-y-0 right-0 h-screen z-20 w-1/2 overflow-y-auto bg-white shadow-xl">
                <div className="relative flex h-full flex-col p-6">

                    <button type="button" onClick={() => setOpen(false)} className="absolute top-4 right-4 text-gray-400 hover:text-gray-600">
                        <span className="sr-only">Close</span>
                        <XMarkIcon className="h-6 w-6" aria-hidden="true" />
                    </button>


                    <img src={product.imagesrc} alt={product.imageAlt} className="mb-6 w-full  max-h-150 rounded-lg object-cover" />


                    <h2 className="mb-2 text-xl font-semibold text-gray-900">{product.name}</h2>


                    <p className="mb-4 text-lg font-medium text-bg-[#252B42] ">{product.sales_price}$</p>


                    <div className="mb-4 flex items-center gap-4">
                        <label htmlFor="quantity" className="text-sm font-medium text-gray-700">
                            Quantity
                        </label>
                        <div className="flex items-center rounded border border-gray-300">
                            <button type="button" onClick={decreaseQuantity} className="px-3 py-1 text-gray-700 hover:bg-gray-200">
                                -
                            </button>
                            <input
                                type="text"
                                id="quantity"
                                value={quantity}
                                readOnly
                                className="w-12 text-center text-sm font-medium text-gray-900 outline-none"
                            />
                            <button type="button" onClick={increaseQuantity} className="px-3 py-1 text-gray-700 hover:bg-gray-200">
                                +
                            </button>
                        </div>
                    </div>


                    <form onSubmit={handleSubmit} className="mt-auto">
                        <button type="submit" className="w-full rounded-md bg-[#252B42]  px-6 py-3 text-white hover:bg-[#252B42] ">
                            Add to cart
                        </button>
                    </form>
                </div>
            </div>
        </Dialog>
    );
}
