import OrderTable from '@/components/admin/order-table';
import AppLayout from '@/layouts/app-layout';
import { Head } from '@inertiajs/react';

const breadcrumbs = [
    {
        title: 'Order List',
    },
];

export default function orderList(orders) {

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Order List" />
            <div className="max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
                <h1 className="text-3xl font-bold tracking-tight text-gray-900">List of recent orders</h1>
                <p className="mt-4 max-w-xl text-sm text-gray-700">
                    Our thoughtfully designed workspace objects are crafted in limited runs. Improve your productivity and organization with these
                    sale items before we run out.
                </p>
            </div>
            <OrderTable orders={orders} />

        </AppLayout>
    );
}
