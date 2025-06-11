// resources/js/Pages/Guest/ThankYou.jsx
import GuestLayout from '@/layouts/guest-layout';
import { Link } from '@inertiajs/react';

export default function ThankYou() {
    return (
        <GuestLayout>
            <div className="max-w-2xl mx-auto py-24 text-center px-4 sm:px-6 lg:px-8">
                <h1 className="text-3xl font-bold text-gray-900 mb-4">Thank you for your order!</h1>
                <p className="text-gray-600 mb-8">
                    We’ve received your order and will send you a confirmation email shortly.
                </p>
                <Link
                    href="/"
                    className="inline-block bg-[#252B42] text-white font-medium py-3 px-6 rounded-md hover:bg-[#1f243b]"
                >
                    Back to Home
                </Link>
            </div>
        </GuestLayout>
    );
}
