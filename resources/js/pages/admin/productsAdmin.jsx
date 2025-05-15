import { Link, usePage } from '@inertiajs/react';
import products from '../../components/admin/admin-data-products';
import DataColumns from '../../components/admin/two-columns-data';
import AdminLayout from '../../layouts/admin-layout';
export default function ProductsAdmin() {
    const { id } = usePage().props;
    const productId = parseInt(id);
    const product = products.find((p) => p.id === productId);

    if (!product) {
        return (
            <div className="p-6">
                <p>Post no non trouvé.</p>
                <Link href="/" className="text-blue-600 underline">
                    ← Retour
                </Link>
            </div>
        );
    }

    return (
        <AdminLayout>
            productsAdmin.jsx
            <DataColumns />
        </AdminLayout>
    );
}
