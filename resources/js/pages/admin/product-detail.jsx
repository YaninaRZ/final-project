import { Link, usePage } from '@inertiajs/react';
import DataColumns from '@/components/admin/data-columns';
import AdminLayout from '@/layouts/admin-layout';
export default function ProductDetails({ product }) {

    console.log(product);
    if (!product) {
        return (
            <div className="p-6">
                <p>Post no non trouvé.</p>
                <Link href={route("home")} className="text-blue-600 underline">
                    ← Back
                </Link>
            </div>
        );
    }

    return (
        <AdminLayout>
            <DataColumns product={product} />
        </AdminLayout>
    );
}
