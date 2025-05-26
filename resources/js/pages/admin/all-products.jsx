import { AppContent } from '@/components/app-content';
import { AppShell } from '@/components/app-shell';
import { AppSidebar } from '@/components/app-sidebar';
import { AppSidebarHeader } from '@/components/app-sidebar-header';
import ProductListCard from '@/components/admin/product-list-card';

export default function orderedProducts({ children, breadcrumbs = [], products }) {
    return (
        <AppShell variant="sidebar">
            <AppSidebar />
            <AppContent variant="sidebar">
                <AppSidebarHeader breadcrumbs={breadcrumbs} />
                {children}
                <div className="max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
                    <h1 className="text-3xl font-bold tracking-tight text-gray-900">All Products</h1>
                    <p className="mt-4 max-w-xl text-sm text-gray-700">
                        Our thoughtfully designed workspace objects are crafted in limited runs. Improve your productivity and organization with these
                        sale items before we run out.
                    </p>
                </div>
                <ProductListCard products={products} />
            </AppContent>
        </AppShell>
    );
}
