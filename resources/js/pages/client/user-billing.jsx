import ClientLayout from '@/layouts/client-layout';
import { usePage } from '@inertiajs/react';

export default function UserBilling() {
    const { auth, orders = [] } = usePage().props;
    const user = auth.user;

    return (
        <ClientLayout>
            <div>
                <h2 className="text-lg font-medium text-gray-900">Orders</h2>
                <p className="mt-1 text-sm text-gray-500">Manage your orders and view invoices.</p>

                <div className="mt-6 space-y-8">
                    {/* Autres sections ici */}
                </div>

                <div className="mt-6">
                    <h3 className="text-sm font-medium text-gray-900">Order History</h3>
                    <div className="mt-2 overflow-x-auto">
                        <table className="min-w-full divide-y divide-gray-200 text-sm">
                            <thead className="bg-gray-50">
                                <tr>
                                    <th className="px-4 py-2 text-left font-medium text-gray-700">Date</th>
                                    <th className="px-4 py-2 text-left font-medium text-gray-700">Status</th>
                                    <th className="px-4 py-2 text-left font-medium text-gray-700">Details</th>
                                </tr>
                            </thead>
                            <tbody className="divide-y divide-gray-100 bg-white">
                                {orders.length === 0 ? (
                                    <tr>
                                        <td colSpan="3" className="px-4 py-2 text-center text-gray-500">
                                            Vous n'avez aucune commande.
                                        </td>
                                    </tr>
                                ) : (
                                    orders.map((order) => (
                                        <tr key={order.id}>
                                            <td className="px-4 py-2 text-gray-900">{order.created_at}</td>
                                            <td
                                                className={order.status === 'Shipped' ? 'text-green-600 px-4 py-2' : 'text-gray-600 px-4 py-2'}
                                            >
                                                {order.status}
                                            </td>
                                            <td className="px-4 py-2">
                                                <a href={route('view-order', order.id)} className="text-[#68513F] hover:underline">
                                                    View
                                                </a>
                                            </td>
                                        </tr>
                                    ))
                                )}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </ClientLayout>
    );
}
