import GuestLayout from '@/layouts/guest-layout';

export default function ClientOrders({ orders }) {
    return (
        <GuestLayout>
            <div className="max-w-4xl mx-auto py-8">
                <h1 className="text-2xl font-bold mb-6">My Orders</h1>

                {orders.length === 0 ? (
                    <p>You have no orders yet.</p>
                ) : (
                    <ul className="space-y-4">
                        {orders.map((order) => (
                            <li key={order.id} className="border p-4 rounded-md shadow-sm">
                                <p><strong>Order ID:</strong> {order.id}</p>
                                <p><strong>Status:</strong> {order.status}</p>
                                <p><strong>Total Price:</strong> ${order.total_price.toFixed(2)}</p>
                                <p><strong>Products:</strong></p>
                                <ul className="ml-4 list-disc">
                                    {order.products.map((product) => (
                                        <li key={product.id}>
                                            {product.name} - Quantity: {product.pivot.quantity}
                                        </li>
                                    ))}
                                </ul>
                            </li>
                        ))}
                    </ul>
                )}
            </div>
        </GuestLayout>
    );
}
