import Table from '@/components/admin/client-table';
import AdminLayout from '@/layouts/admin-layout';
export default function Clients({ clients }) {
    return (
        <AdminLayout>
            <div className="max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
                <h1 className="text-3xl font-bold tracking-tight text-gray-900">All Clients</h1>
                <p className="mt-4 max-w-xl text-sm text-gray-700">
                    Our thoughtfully designed workspace objects are crafted in limited runs. Improve your productivity and organization with these
                    sale items before we run out.
                </p>
            </div>
            <Table clients={clients} />
        </AdminLayout>
    );
}
