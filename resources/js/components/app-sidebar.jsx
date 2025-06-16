import { NavFooter } from '@/components/nav-footer';
import { NavMain } from '@/components/nav-main';
import { NavUser } from '@/components/nav-user';
import { Sidebar, SidebarContent, SidebarFooter, SidebarHeader, SidebarMenu, SidebarMenuButton, SidebarMenuItem } from '@/components/ui/sidebar';

import { Link } from '@inertiajs/react';
import { LayoutGrid, ListOrdered, Package, Tags, Users } from 'lucide-react';
import { useState } from 'react';

const mainNavItems = [
    {
        title: 'Dashboard',
        url: '/admin/dashboard',
        icon: LayoutGrid,
    },
    {
        title: 'All Products',
        url: '/admin/all-products',
        icon: Package,
    },
    {
        title: 'Order List',
        url: '/admin/order-list',
        icon: ListOrdered,
    },
    {
        title: 'Clients',
        url: '/admin/client',
        icon: Users,
    },
    {
        title: 'Categories',
        url: '/admin/categories',
        icon: Tags,
    },
];

const footerNavItems = [];

export function AppSidebar() {
    const [isCategoryOpen, setIsCategoryOpen] = useState(false); // State to toggle category filter dropdown

    const handleCategoryToggle = () => {
        setIsCategoryOpen(!isCategoryOpen);
    };

    return (
        <Sidebar collapsible="icon" variant="inset">
            <SidebarHeader>
                <SidebarMenu>
                    <SidebarMenuItem>
                        <SidebarMenuButton size="lg" asChild>
                            <Link href={route('home')} prefetch>
                                <span className="sr-only">Skinn</span>
                                <img alt="" src="/images/Skinn.svg" className="h-8 w-auto" />
                            </Link>
                        </SidebarMenuButton>
                    </SidebarMenuItem>
                </SidebarMenu>
            </SidebarHeader>

            <SidebarContent>
                <NavMain items={mainNavItems} />
            </SidebarContent>

            <SidebarFooter>
                <NavFooter items={footerNavItems} className="mt-auto" />
                <NavUser />
            </SidebarFooter>
        </Sidebar>
    );
}
