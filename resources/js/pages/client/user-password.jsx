'use client';

import { Disclosure } from '@headlessui/react';
import {
    ArrowRightOnRectangleIcon,
    CreditCardIcon,
    KeyIcon,
    UserCircleIcon,
} from '@heroicons/react/24/outline';
import { useForm, usePage, Link } from '@inertiajs/react';
import ClientLayout from '@/layouts/client-layout.jsx';


function classNames(...classes) {
    return classes.filter(Boolean).join(' ');
}

export default function UserPassword() {
    const { flash, auth } = usePage().props;
    const user = auth.user;

    const form = useForm({
        current_password: '',
        password: '',
        password_confirmation: '',
    });

    const submit = (e) => {
        e.preventDefault();
        form.put(route('user-password.update'));
    };

    return (
        <ClientLayout>
            <Disclosure as="div" className="relative overflow-hidden bg-[#E7DED8] pb-32">
                <header className="relative py-10">
                    <div className="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                        <h1 className="text-3xl font-bold tracking-tight text-white">
                            Welcome to your account!
                        </h1>
                    </div>
                </header>
            </Disclosure>

            <main className="relative -mt-32">
                <div className="mx-auto max-w-7xl px-4 pb-6 sm:px-6 lg:px-8 lg:pb-16">
                    <div className="overflow-hidden rounded-lg bg-white shadow-sm">
                        <div className="divide-y divide-gray-200 lg:grid lg:grid-cols-12 lg:divide-x lg:divide-y-0">


                            <form onSubmit={submit} className="divide-y divide-gray-200 lg:col-span-9">
                                <div className="px-4 py-6 sm:p-6 lg:pb-8">
                                    <div>
                                        <h2 className="text-lg font-medium text-gray-900">Update your password</h2>
                                        <p className="mt-1 text-sm text-gray-500">
                                            Ensure your account is using a long, random password to stay secure.
                                        </p>
                                    </div>

                                    {/* Message succès */}
                                    {flash?.status && (
                                        <div className="mb-4 rounded-md bg-green-100 border border-green-400 text-green-800 px-4 py-3 text-sm">
                                            {flash.status}
                                        </div>
                                    )}

                                    {/* Message erreur générique si erreurs mais pas sur champs spécifiques */}
                                    {form.hasErrors &&
                                        !form.errors.current_password &&
                                        !form.errors.password &&
                                        !form.errors.password_confirmation && (
                                            <div className="mb-4 rounded-md bg-red-100 border border-red-400 text-red-800 px-4 py-3 text-sm">
                                                An error occurred. Please try again.
                                            </div>
                                        )}

                                    <div className="mt-6 space-y-6">
                                        <div>
                                            <label className="block text-sm font-medium text-gray-700">Current Password</label>
                                            <input
                                                type="password"
                                                value={form.data.current_password}
                                                onChange={(e) => form.setData('current_password', e.target.value)}
                                                className="mt-1 block w-full rounded-md border-gray-300 shadow-sm px-3 py-2 focus:outline-none focus:ring focus:ring-[#68513F]/50 focus:border-[#68513F]"
                                            />
                                            {form.errors.current_password && (
                                                <p className="text-red-600 text-sm mt-1">{form.errors.current_password}</p>
                                            )}
                                        </div>

                                        <div>
                                            <label className="block text-sm font-medium text-gray-700">New Password</label>
                                            <input
                                                type="password"
                                                value={form.data.password}
                                                onChange={(e) => form.setData('password', e.target.value)}
                                                className="mt-1 block w-full rounded-md border-gray-300 shadow-sm px-3 py-2 focus:outline-none focus:ring focus:ring-[#68513F]/50 focus:border-[#68513F]"
                                            />
                                            {form.errors.password && (
                                                <p className="text-red-600 text-sm mt-1">{form.errors.password}</p>
                                            )}
                                        </div>

                                        <div>
                                            <label className="block text-sm font-medium text-gray-700">Confirm New Password</label>
                                            <input
                                                type="password"
                                                value={form.data.password_confirmation}
                                                onChange={(e) => form.setData('password_confirmation', e.target.value)}
                                                className="mt-1 block w-full rounded-md border-gray-300 shadow-sm px-3 py-2 focus:outline-none focus:ring focus:ring-[#68513F]/50 focus:border-[#68513F]"
                                            />
                                            {form.errors.password_confirmation && (
                                                <p className="text-red-600 text-sm mt-1">{form.errors.password_confirmation}</p>
                                            )}
                                        </div>

                                        <div>
                                            <button
                                                type="submit"
                                                disabled={form.processing}
                                                className="bg-[#68513F] hover:bg-[#4e3a2c] text-white px-4 py-2 rounded"
                                            >
                                                Update password
                                            </button>
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
