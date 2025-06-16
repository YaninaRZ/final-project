import { Head, Link } from '@inertiajs/react';
import { CheckCircleIcon } from '@heroicons/react/24/solid';
import GuestLayout from '../../layouts/guest-layout';

export default function Success() {
    return (
        <GuestLayout>
            <Head title="Payment Successful" />
            <div className="flex flex-col items-center justify-center min-h-[60vh] px-4 text-center">
                <CheckCircleIcon className="w-20 h-20 text-green-500 mb-4" />
                <h1 className="text-3xl font-bold text-gray-800">Thank you for your purchase!</h1>
                <p className="mt-2 text-gray-600">Your payment has been successfully processed.</p>
                <Link
                    href="/"
                    className="mt-6 inline-block bg-[#252B42] text-white px-6 py-3 rounded-md hover:bg-[#1e2333] transition"
                >
                    Return to Shop
                </Link>
            </div>
        </GuestLayout>
    );
}
