'use client';

import { Disclosure } from '@headlessui/react';
import { ArrowRightOnRectangleIcon, CreditCardIcon, KeyIcon, UserCircleIcon } from '@heroicons/react/24/outline';
import { useState } from 'react';
import GuestLayout from '@/layouts/guest-layout';
import { Link } from '@inertiajs/react';

const user = {
    name: 'Debbie Lewis',
    handle: 'deblewis',
    email: 'debbielewis@example.com',
};

const subNavigation = [
    { name: 'Profile', href: '#', icon: UserCircleIcon, current: true },
    { name: 'Password', href: 'user-password', icon: KeyIcon, current: false },
    { name: 'Orders', href: '/user-billing', icon: CreditCardIcon, current: false },
];
const userNavigation = [
    { name: 'Your Profile', href: '#' },
    { name: 'Settings', href: '#' },
];

function classNames(...classes) {
    return classes.filter(Boolean).join(' ');
}

export default function Login() {
    const [availableToHire, setAvailableToHire] = useState(true);
    const [privateAccount, setPrivateAccount] = useState(false);
    const [allowCommenting, setAllowCommenting] = useState(true);
    const [allowMentions, setAllowMentions] = useState(true);

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
                <div className="mx-auto max-w-(--breakpoint-xl) px-4 pb-6 sm:px-6 lg:px-8 lg:pb-16">
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
                                                    item.current
                                                        ? 'text-[#68513F] group-hover:text-[#68513F]'
                                                        : 'text-gray-400 group-hover:text-gray-500',
                                                    'mr-3 -ml-1 size-6 shrink-0',
                                                )}
                                            />
                                            <span className="truncate">{item.name}</span>
                                        </a>
                                    ))}
                                    <Link
                                        method="post"
                                        href={route('logout')}
                                        as="button"
                                        className="group flex items-center border-l-4 border-transparent px-3 py-2 text-sm font-medium text-gray-900 hover:bg-gray-50 hover:text-gray-900 w-full"
                                    >
                                        <ArrowRightOnRectangleIcon
                                            aria-hidden="true"
                                            className="mr-3 -ml-1 size-6 shrink-0 text-gray-400 group-hover:text-gray-500"
                                        />
                                        <span className="truncate">Log out</span>
                                    </Link>

                                </nav>
                            </aside>

                            <form action="#" method="POST" className="divide-y divide-gray-200 lg:col-span-9">
                                <div className="px-4 py-6 sm:p-6 lg:pb-8">
                                    <div>
                                        <h2 className="text-lg/6 font-medium text-gray-900">Profile</h2>
                                        <p className="mt-1 text-sm text-gray-500">This is your profile</p>
                                    </div>

                                    <div className="mt-6 flex flex-col lg:flex-row">
                                        <div className="grow space-y-6">
                                            <div>
                                                <label htmlFor="username" className="block text-sm/6 font-medium text-gray-900">
                                                    Username
                                                </label>
                                                <div className="mt-2">
                                                    <div className="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-sky-600">
                                                        <div className="shrink-0 text-base text-gray-500 select-none sm:text-sm/6">
                                                            workcation.com/
                                                        </div>
                                                        <input
                                                            defaultValue={user.handle}
                                                            id="username"
                                                            name="username"
                                                            type="text"
                                                            placeholder="janesmith"
                                                            className="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"
                                                        />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div className="mt-6 grid grid-cols-12 gap-6">
                                        <div className="col-span-12 sm:col-span-6">
                                            <label htmlFor="first-name" className="block text-sm/6 font-medium text-gray-900">
                                                First name
                                            </label>
                                            <div className="mt-2">
                                                <input
                                                    id="first-name"
                                                    name="first-name"
                                                    type="text"
                                                    autoComplete="given-name"
                                                    className="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-sky-600 sm:text-sm/6"
                                                />
                                            </div>
                                        </div>

                                        <div className="col-span-12 sm:col-span-6">
                                            <label htmlFor="last-name" className="block text-sm/6 font-medium text-gray-900">
                                                Last name
                                            </label>
                                            <div className="mt-2">
                                                <input
                                                    id="last-name"
                                                    name="last-name"
                                                    type="text"
                                                    autoComplete="family-name"
                                                    className="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-sky-600 sm:text-sm/6"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
        </GuestLayout>
    );
}
