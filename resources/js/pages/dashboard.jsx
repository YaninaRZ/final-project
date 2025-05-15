import AppLayout from '@/layouts/app-layout';
import { Head } from '@inertiajs/react';
import StatsCard from '../components/admin/card-stats';
import { LineChart } from '../components/line-chart';
import OrderTable from '../components/order-table';

const breadcrumbs = [
    {
        title: 'Dashboard',
        href: '/dashboard',
    },
];

export default function Dashboard() {
    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Dashboard" />
            <div className="max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
                <h1 className="text-3xl font-bold tracking-tight text-gray-900">Dashboard</h1>
                <p className="mt-4 max-w-xl text-sm text-gray-700">
                    Our thoughtfully designed workspace objects are crafted in limited runs. Improve your productivity and organization with these
                    sale items before we run out.
                </p>
            </div>
            <div className="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
                <StatsCard></StatsCard>
                <div className="relative min-h-[100vh] flex-1 overflow-hidden">
                    <LineChart></LineChart>
                    <OrderTable></OrderTable>
                </div>
            </div>
        </AppLayout>
    );
}
