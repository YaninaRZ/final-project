'use client';

import { Disclosure } from '@headlessui/react';
import { ArrowRightOnRectangleIcon, CreditCardIcon, KeyIcon, UserCircleIcon } from '@heroicons/react/24/outline';
import ClientLayout from '@/layouts/client-layout.jsx';
import { Link, usePage } from '@inertiajs/react';

function classNames(...classes) {
    return classes.filter(Boolean).join(' ');
}

export default function Login() {
    const { auth, url } = usePage().props;
    const user = auth.user;



    return (
        <ClientLayout>
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


                            {/* Form content */}
                            <form action="#" method="POST" className="divide-y divide-gray-200 lg:col-span-9">
                                <div className="px-4 py-6 sm:p-6 lg:pb-8">
                                    <div>
                                        <h2 className="text-lg font-medium text-gray-900">Profile</h2>
                                        <p className="mt-1 text-sm text-gray-500">This is your profile</p>
                                    </div>

                                    <div className="mt-6 flex flex-col lg:flex-row">
                                        <div className="grow space-y-6">
                                            <div>
                                                <label htmlFor="username" className="block text-sm font-medium text-gray-900">
                                                    Name
                                                </label>
                                                <div className="mt-2">
                                                    <div className="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-sky-600">
                                                        <div className="shrink-0 text-base text-gray-500 select-none sm:text-sm">
                                                            {user.name}
                                                        </div>
                                                        <input

                                                            id="username"
                                                            name="username"
                                                            type="text"
                                                            placeholder=""
                                                            className="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm"
                                                        />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div className="mt-6 grid grid-cols-12 gap-6">
                                        <div className="col-span-12 sm:col-span-6">
                                            <label htmlFor="first-name" className="block text-sm font-medium text-gray-900">
                                                Email
                                            </label>
                                            <div className="mt-2">
                                                <input
                                                    defaultValue={user.email}
                                                    id="first-name"
                                                    name="first-name"
                                                    type="text"
                                                    autoComplete="given-name"
                                                    className="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-sky-600 sm:text-sm"
                                                />
                                            </div>
                                        </div>

                                        <div className="col-span-12 sm:col-span-6">
                                            <label htmlFor="created-at" className="block text-sm font-medium text-gray-900">
                                                Created at:
                                            </label>
                                            <div className="mt-2">
                                                <input
                                                    defaultValue={new Date(user.created_at).toLocaleDateString()}
                                                    id="created-at"
                                                    name="created-at"
                                                    type="text"
                                                    readOnly
                                                    className="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-sky-600 sm:text-sm"
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
        </ClientLayout>
    );
}
