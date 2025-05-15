import CategoriesTable from '../../components/admin/categories-table';
import AdminLayout from '../../layouts/admin-layout';
export default function Caegories() {
    return (
        <AdminLayout>
            <p>Categories</p>
            <CategoriesTable />
        </AdminLayout>
    );
}
