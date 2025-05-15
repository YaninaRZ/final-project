'use client';

import { Disclosure } from '@headlessui/react';
import { ArrowRightOnRectangleIcon, CreditCardIcon, KeyIcon, UserCircleIcon } from '@heroicons/react/24/outline';
import GuestLayout from '../../layouts/guest-layout';

const user = {
    name: 'Debbie Lewis',
    handle: 'deblewis',
    email: 'debbielewis@example.com',
};

const subNavigation = [
    { name: 'Profile', href: 'user-account', icon: UserCircleIcon, current: false },
    { name: 'Password', href: 'user-password', icon: KeyIcon, current: true },
    { name: 'Billing', href: 'user-billing', icon: CreditCardIcon, current: false },
    { name: 'Sign Out', href: '/', icon: ArrowRightOnRectangleIcon, current: false },
];

function classNames(...classes) {
    return classes.filter(Boolean).join(' ');
}

export default function UserPassword() {
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
                            {/* Sidebar */}
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
                                                    item.current
                                                        ? 'text-[#68513F] group-hover:text-[#68513F]'
                                                        : 'text-gray-400 group-hover:text-gray-500',
                                                    'mr-3 -ml-1 size-6 shrink-0',
                                                )}
                                            />
                                            <span className="truncate">{item.name}</span>
                                        </a>
                                    ))}
                                </nav>
                            </aside>

                            {/* Password Content */}
                            <div className="px-4 py-6 sm:p-6 lg:col-span-9">
                                <h2 className="text-lg font-medium text-gray-900">Password</h2>
                                <p className="mt-1 text-sm text-gray-500">Update your password to keep your account secure.</p>

                                <form className="mt-6 max-w-xl space-y-6">
                                    <div>
                                        <label htmlFor="current-password" className="block text-sm font-medium text-gray-700">
                                            Current password
                                        </label>
                                        <input
                                            type="password"
                                            name="current-password"
                                            id="current-password"
                                            className="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 text-sm shadow-sm focus:border-[#68513F] focus:ring-[#68513F]"
                                        />
                                    </div>

                                    <div>
                                        <label htmlFor="new-password" className="block text-sm font-medium text-gray-700">
                                            New password
                                        </label>
                                        <input
                                            type="password"
                                            name="new-password"
                                            id="new-password"
                                            className="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 text-sm shadow-sm focus:border-[#68513F] focus:ring-[#68513F]"
                                        />
                                    </div>

                                    <div>
                                        <label htmlFor="confirm-password" className="block text-sm font-medium text-gray-700">
                                            Confirm new password
                                        </label>
                                        <input
                                            type="password"
                                            name="confirm-password"
                                            id="confirm-password"
                                            className="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 text-sm shadow-sm focus:border-[#68513F] focus:ring-[#68513F]"
                                        />
                                    </div>

                                    <div>
                                        <button
                                            type="submit"
                                            className="inline-flex items-center rounded-md bg-[#68513F] px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-[#4e3a2c]"
                                        >
                                            Save
                                        </button>
                                    </div>
                                </form>
                            </div>
                            {/* End Password Content */}
                        </div>
                    </div>
                </div>
            </main>
        </GuestLayout>
    );
}
