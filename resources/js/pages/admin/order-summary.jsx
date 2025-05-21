import { Link, usePage } from '@inertiajs/react';
import orders from '@/data/orders';
import Example from '@/components/admin/details-screen';
import AdminLayout from '@/layouts/admin-layout';

export default function OrderSummary() {
    const { props } = usePage();

    const command = orders.filter((order) => order.OrderID == props.id)[0];

    if (!command) {
        return <>No order found</>;
    }

    return (
        <AdminLayout>
            <div className="divide-y divide-gray-200 overflow-hidden rounded-lg bg-white shadow-sm">
                <div className="px-4 py-5 sm:px-6">
                    <h2 className="sr-only">Products</h2>
                </div>
                <div className="px-4 py-5 sm:p-6">
                    <p>Details of the command #{command.OrderID}</p>
                </div>
                <div className="px-4 py-4 sm:px-6">
                    <Link key={command.OrderID} href={command.href} className="group">
                        <h3 className="mt-4 text-sm text-gray-700">{command.Product}</h3>
                        <p className="mt-1 text-lg font-medium text-gray-900">{command.Status}</p>
                        <p className="mt-1 text-lg font-medium text-gray-900">{command.Amount}</p>
                        <p className="mt-1 text-lg font-medium text-gray-900">{command.Date}</p>
                        <p className="mt-1 text-lg font-medium text-gray-900">{command.Name}</p>
                    </Link>
                </div>
            </div>
            <Example></Example>
        </AdminLayout>
    );
}
