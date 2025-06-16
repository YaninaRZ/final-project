import CategoriesTable from '@/components/admin/categories-table';
import AdminLayout from '@/layouts/admin-layout';
import AppLayout from '@/layouts/app-layout';
import { Head } from '@inertiajs/react';

const breadcrumbs = [
    {
        title: 'Categories',
    },
];

export default function Categories() {
    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Categories" />
            <div className="max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
                <h1 className="text-3xl font-bold tracking-tight text-gray-900"> List of Categories</h1>
                <p className="mt-4 max-w-xl text-sm text-gray-700">

                    Explore our carefully curated categories designed to help you find exactly what you need. Organize your store efficiently and boost your productivity by managing these categories.
                </p>
            </div>
            <CategoriesTable />
        </AppLayout>
    );
}
