import { Link, usePage } from '@inertiajs/react';
import GuestLayout from '@/layouts/guest-layout';

export default function ViewOrder() {
    const { id } = usePage().props;
    if (!id) {
        return <p>no order</p>;
    }
    const orders = [
        { id: 'ORD123456', date: '2025-04-25', total: '$89.99', status: 'Shipped' },
        { id: 'ORD123455', date: '2025-03-10', total: '$49.99', status: 'Delivered' },
    ];
    const order = orders.filter((order) => order.id == id)[0];
    return (
        <GuestLayout>
            <div className="mx-auto flex max-w-7xl flex-col items-center space-x-8 px-6 py-10 md:flex-row">

                <div className="mb-6 flex w-full md:mb-0 md:w-1/2">
                    <img
                        src="/images/order-placeholder.jpg"
                        alt={`Order ${order.id}`}
                        className="w-full rounded-xl object-cover shadow-lg"
                    />
                </div>


                <div className="w-full space-y-4 md:w-1/2">
                    <h1 className="text-3xl font-bold text-gray-900">Order Details</h1>
                    <p className="text-gray-700">
                        <strong>Order ID:</strong> {order.id}
                    </p>
                    <p className="text-gray-700">
                        <strong>Date:</strong> {order.date}
                    </p>
                    <p className="text-gray-700">
                        <strong>Total:</strong> {order.total}
                    </p>
                    <p className="text-gray-700">
                        <strong>Status:</strong>{' '}
                        <span className={order.status === 'Shipped' ? 'text-green-600' : 'text-gray-600'}>{order.status}</span>
                    </p>

                    <Link href="/user-billing" className="inline-block text-blue-500 hover:text-blue-700">
                        ← Back
                    </Link>
                </div>
            </div>
        </GuestLayout>
    );
}
