import { Head, Link } from '@inertiajs/react';
import { XCircleIcon } from '@heroicons/react/24/solid';
import GuestLayout from '../../layouts/guest-layout';

export default function Cancel() {
    return (
        <GuestLayout>
            <Head title="Payment Cancelled" />
            <div className="flex flex-col items-center justify-center min-h-[60vh] px-4 text-center">
                <XCircleIcon className="w-20 h-20 text-red-500 mb-4" />
                <h1 className="text-3xl font-bold text-gray-800">Payment Cancelled</h1>
                <p className="mt-2 text-gray-600">You have cancelled the payment process.</p>
                <Link
                    href="/cart"
                    className="mt-6 inline-block bg-red-600 text-white px-6 py-3 rounded-md hover:bg-red-700 transition"
                >
                    Return to Cart
                </Link>
            </div>
        </GuestLayout>
    );
}
