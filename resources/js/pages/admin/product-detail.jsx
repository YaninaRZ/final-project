import { Link, usePage } from '@inertiajs/react';
import products from '@/data/products';
import DataColumns from '@/components/admin/data-columns';
import AdminLayout from '@/layouts/admin-layout';
export default function ProductDetails() {
    const { id } = usePage().props;
    const productId = parseInt(id);
    const product = products.find((p) => p.id === productId);

    if (!product) {
        return (
            <div className="p-6">
                <p>Post no non trouvé.</p>
                <Link href="/" className="text-blue-600 underline">
                    ← Back
                </Link>
            </div>
        );
    }

    return (
        <AdminLayout>
            <DataColumns />
        </AdminLayout>
    );
}
