import { CheckIcon, XMarkIcon } from '@heroicons/react/20/solid';
import { useState } from 'react';
import { useCart } from '@/hooks/use-cart';
import GuestLayout from '@/layouts/guest-layout';
import { router } from '@inertiajs/react';


export default function CartStep1({ user, csrfToken }) {
    const [customerName, setCustomerName] = useState(user?.name || '');
    const [customerEmail, setCustomerEmail] = useState(user?.email || '');
    const { cart, updateQuantity, removeFromCart, clearCart } = useCart();
    const [quantities, setQuantities] = useState({});

    const handleQuantityChange = (productId, qty) => {
        setQuantities((prev) => ({ ...prev, [productId]: qty }));
        updateQuantity(productId, parseInt(qty));
    };

    const subtotal = cart.reduce((sum, item) => sum + item.price * item.quantity, 0);

    const handleSubmit = (e) => {
        e.preventDefault();

        const totalPrice =
            cart.reduce(
                (sum, item) => sum + item.sales_price * (quantities[item.id] ?? item.quantity),
                0
            ) + 5; // shipping

        const data = {
            customer_name: customerName,
            customer_email: customerEmail,
            total_price: totalPrice,
            status: 'pending', // ou ce que tu souhaites
            shipping_address: '', // si tu veux récupérer l'adresse, ajoute un champ dans le formulaire ou user.address
            products: cart.map(product => ({
                id: product.id,
                quantity: quantities[product.id] ?? product.quantity,
            })),
        };

        router.post('/orders-store', data, {
            onSuccess: () => {
                clearCart(); // vide le panier après une commande réussie
            },
        });
    };



    return (
        <GuestLayout>
            <div className="bg-white">
                <div className="mx-auto max-w-2xl px-4 pt-16 pb-24 sm:px-6 lg:max-w-7xl lg:px-8">
                    <h1 className="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Shopping Cart</h1>
                    {cart.length > 0 && (
                        <div className="mb-4 flex justify-end">
                            <button
                                type="button"
                                onClick={clearCart}
                                className="rounded-md border border-red-600 px-4 py-2 text-sm text-red-600 hover:bg-red-50"
                            >
                                Empty cart
                            </button>
                        </div>
                    )}

                    {cart.length === 0 ? (
                        <p className="mt-8 text-gray-500">Your cart is empty.</p>
                    ) : (
                        <form onSubmit={handleSubmit} className="mt-12 lg:grid lg:grid-cols-12 lg:items-start lg:gap-x-12 xl:gap-x-16">
                            <input type="hidden" name="_token" value={csrfToken} />

                            <section aria-labelledby="cart-heading" className="lg:col-span-7">
                                <ul role="list" className="divide-y divide-gray-200 border-t border-b border-gray-200">
                                    {cart.map((product, productIdx) => (
                                        <li key={product.id || product.name} className="flex py-6 sm:py-10">
                                            <div className="shrink-0">
                                                <img
                                                    alt={product.imageAlt}
                                                    src={product.image_src}
                                                    className="size-24 rounded-md object-cover sm:size-48"
                                                />
                                            </div>

                                            <div className="ml-4 flex flex-1 flex-col justify-between sm:ml-6">
                                                <div className="relative pr-9 sm:grid sm:grid-cols-2 sm:gap-x-6 sm:pr-0">
                                                    <div>
                                                        <div className="flex justify-between">
                                                            <h3 className="text-sm font-medium text-gray-700">{product.name}</h3>
                                                        </div>
                                                        <p className="mt-1 text-sm font-medium text-gray-900">${product.sales_price}</p>
                                                    </div>

                                                    <div className="mt-4 sm:mt-0 sm:pr-9">
                                                        <div className="relative">
                                                            <select
                                                                value={quantities[product.id] ?? product.quantity}
                                                                onChange={(e) => handleQuantityChange(product.id, e.target.value)}
                                                                className="rounded-md bg-white py-1.5 pr-8 pl-3 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm"
                                                            >
                                                                {[...Array(8).keys()].map((i) => (
                                                                    <option key={`qty-${product.id}-${i + 1}`} value={i + 1}>
                                                                        {i + 1}
                                                                    </option>
                                                                ))}
                                                            </select>
                                                        </div>

                                                        <div className="absolute top-0 right-0">
                                                            <button
                                                                type="button"
                                                                onClick={() => removeFromCart(product.id)}
                                                                className="-m-2 inline-flex p-2 text-gray-400 hover:text-gray-500"
                                                            >
                                                                <span className="sr-only">Remove</span>
                                                                <XMarkIcon aria-hidden="true" className="size-5" />
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <p className="mt-4 flex space-x-2 text-sm text-gray-700">
                                                    <CheckIcon aria-hidden="true" className="size-5 shrink-0 text-green-500" />
                                                    <span>In stock</span>
                                                </p>
                                            </div>

                                        </li>
                                    ))}
                                </ul>
                            </section>


                            <section
                                aria-labelledby="summary-heading"
                                className="mt-16 rounded-lg bg-gray-50 px-4 py-6 sm:p-6 lg:col-span-5 lg:mt-0 lg:p-8"
                            >
                                <h2 id="summary-heading" className="text-lg font-medium text-gray-900">
                                    Order summary
                                </h2>

                                {!user && (
                                    <div className="mt-6 space-y-4">
                                        <div>
                                            <label className="block text-sm font-medium text-gray-700">Nom</label>
                                            <input
                                                type="text"
                                                value={customerName}
                                                onChange={(e) => setCustomerName(e.target.value)}
                                                className="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"
                                                required
                                            />
                                        </div>
                                        <div>
                                            <label className="block text-sm font-medium text-gray-700">Email</label>
                                            <input
                                                type="email"
                                                value={customerEmail}
                                                onChange={(e) => setCustomerEmail(e.target.value)}
                                                className="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"
                                                required
                                            />
                                        </div>
                                    </div>
                                )}

                                <dl className="mt-6 space-y-4">
                                    <div className="flex items-center justify-between border-t border-gray-200 pt-4">
                                        <dt className="text-sm text-gray-600">Shipping</dt>
                                        <dd className="text-sm font-medium text-gray-900">$5.00</dd>
                                    </div>
                                    <div className="flex items-center justify-between border-t border-gray-200 pt-4">
                                        <dt className="text-base font-medium text-gray-900">Total</dt>
                                        <dd className="text-base font-medium text-gray-900">
                                            ${
                                                (
                                                    cart.reduce((sum, item) => sum + item.sales_price * item.quantity, 0) + 5
                                                ).toFixed(2)
                                            }
                                        </dd>
                                    </div>
                                </dl>

                                <div className="mt-6">
                                    <button
                                        type="submit"
                                        className="w-full rounded-md bg-[#252B42]  px-4 py-3 text-base font-medium text-white shadow hover:-bg-[#252B42] "
                                    >
                                        Checkout
                                    </button>
                                </div>
                            </section>
                        </form>
                    )}
                </div>
            </div>
        </GuestLayout >
    );
}
