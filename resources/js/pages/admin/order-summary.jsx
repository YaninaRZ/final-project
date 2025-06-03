import Example from '@/components/admin/details-screen';
import AdminLayout from '@/layouts/admin-layout';

export default function OrderSummary({ order, amount }) {
    console.log(order);

    if (!order) {
        return <>No order found</>;
    }

    return (
        <AdminLayout>
            <div className="divide-y divide-gray-200 overflow-hidden rounded-lg bg-white shadow-sm">
                <div className="px-4 py-5 sm:px-6">
                    <h2 className="sr-only">Products</h2>
                </div>
                <div className="px-4 py-5 sm:p-6">
                    <p>Details of the command #{order.id}</p>
                </div>
            </div>
            <Example order={order} amount={amount} />

        </AdminLayout>
    );
}
