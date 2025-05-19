'use client';
import { Disclosure } from '@headlessui/react';
import { ArrowRightOnRectangleIcon, CreditCardIcon, KeyIcon, UserCircleIcon } from '@heroicons/react/24/outline';
import { Link } from '@inertiajs/react';
import GuestLayout from '../../layouts/guest-layout';

const user = {
    name: 'Debbie Lewis',
    handle: 'deblewis',
    email: 'debbielewis@example.com',
};

const subNavigation = [
    { name: 'Profile', href: 'user-account', icon: UserCircleIcon, current: false },
    { name: 'Password', href: 'user-password', icon: KeyIcon, current: false },
    { name: 'Orders', href: 'user-billing', icon: CreditCardIcon, current: true },
    { name: 'Sign Out', href: '/', icon: ArrowRightOnRectangleIcon, current: false },
];


const orders = [
    { id: 'ORD123456', date: '2025-04-25', total: '$89.99', status: 'Shipped' },
    { id: 'ORD123455', date: '2025-03-10', total: '$49.99', status: 'Delivered' },
];

function classNames(...classes) {
    return classes.filter(Boolean).join(' ');
}

export default function UserBilling() {
    return (
        <GuestLayout>
            <Disclosure as="div" className="relative overflow-hidden bg-[#E7DED8] pb-32">
                <header className="relative py-10">
                    <div className="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                        <h1 className="text-3xl font-bold tracking-tight text-white">Welcome to your account!</h1>
                    </div>
                </header>
            </Disclosure>

            <main className="relative -mt-32">
                <div className="mx-auto max-w-7xl px-4 pb-6 sm:px-6 lg:px-8 lg:pb-16">
                    <div className="overflow-hidden rounded-lg bg-white shadow-sm">
                        <div className="divide-y divide-gray-200 lg:grid lg:grid-cols-12 lg:divide-x lg:divide-y-0">

                            <aside className="py-6 lg:col-span-3">
                                <nav className="space-y-1">
                                    {subNavigation.map((item) => (
                                        <a
                                            key={item.name}
                                            href={item.href}
                                            aria-current={item.current ? 'page' : undefined}
                                            className={classNames(
                                                item.current
                                                    ? 'border-[#68513F] bg-[#DACEC6] text-[#68513F] hover:bg-[#DACEC6] hover:text-[#68513F]'
                                                    : 'border-transparent text-gray-900 hover:bg-gray-50 hover:text-gray-900',
                                                'group flex items-center border-l-4 px-3 py-2 text-sm font-medium',
                                            )}
                                        >
                                            <item.icon
                                                aria-hidden="true"
                                                className={classNames(
                                                    item.current ? 'text-[#68513F]' : 'text-gray-400 group-hover:text-gray-500',
                                                    'mr-3 -ml-1 h-6 w-6 shrink-0',
                                                )}
                                            />
                                            <span className="truncate">{item.name}</span>
                                        </a>
                                    ))}
                                </nav>
                            </aside>


                            <div className="px-4 py-6 sm:p-6 lg:col-span-9">
                                <div>
                                    <h2 className="text-lg font-medium text-gray-900">Orders</h2>
                                    <p className="mt-1 text-sm text-gray-500">Manage your orders information and view your invoices.</p>
                                </div>

                                <div className="mt-6 space-y-8">

                                    <div>
                                        <h3 className="text-sm font-medium text-gray-900">Payment Method</h3>
                                        <div className="mt-2 flex items-center justify-between rounded-md border border-gray-300 bg-white px-4 py-3 shadow-sm">
                                            <div>
                                                <p className="text-sm font-medium text-gray-700">Visa ending in 4242</p>
                                                <p className="text-sm text-gray-500">Expires 04/27</p>
                                            </div>
                                            <button
                                                type="button"
                                                className="rounded-md bg-[#68513F] px-4 py-2 text-sm font-medium text-white hover:bg-[#4e3a2c]"
                                            >
                                                Update
                                            </button>
                                        </div>
                                    </div>
                                </div>


                                <div>
                                    <div className="p-4">
                                        <h3 className="text-sm font-medium text-gray-900">Order History</h3>
                                    </div>
                                    <div className="mt-2 overflow-x-auto">
                                        <table className="min-w-full divide-y divide-gray-200 text-sm">
                                            <thead className="bg-gray-50">
                                                <tr>
                                                    <th className="px-4 py-2 text-left font-medium text-gray-700">Order ID</th>
                                                    <th className="px-4 py-2 text-left font-medium text-gray-700">Date</th>
                                                    <th className="px-4 py-2 text-left font-medium text-gray-700">Total</th>
                                                    <th className="px-4 py-2 text-left font-medium text-gray-700">Status</th>
                                                    <th className="px-4 py-2 text-left font-medium text-gray-700">Details</th>
                                                </tr>
                                            </thead>
                                            <tbody className="divide-y divide-gray-100 bg-white">
                                                {orders.map((order, id) => (
                                                    <tr key={id}>
                                                        <td className="px-4 py-2 text-gray-900">{order.id}</td>
                                                        <td className="px-4 py-2 text-gray-900">{order.date}</td>
                                                        <td className="px-4 py-2 text-gray-900">{order.total}</td>
                                                        <td
                                                            className={classNames(
                                                                'px-4 py-2',
                                                                order.status === 'Shipped' ? 'text-green-600' : 'text-gray-600',
                                                            )}
                                                        >
                                                            {order.status}
                                                        </td>
                                                        <td className="px-4 py-2">
                                                            <Link href={`/client/view-order/${order.id}`} className="text-[#68513F] hover:underline">
                                                                View
                                                            </Link>
                                                        </td>
                                                    </tr>
                                                ))}
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </GuestLayout>
    );
}
