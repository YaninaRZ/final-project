import Footer from '@/components/footer';
import NavbarDesign from '@/components/ui/navbar';
import { subNavigation } from '../components/nav-client';
import { Link } from '@inertiajs/react';
import { ArrowRightOnRectangleIcon } from '@heroicons/react/24/outline';


function classNames(...classes) {
    return classes.filter(Boolean).join(' ');
}

export default function ClientLayout({ children }) {
    return (
        <>
            <NavbarDesign />

            <main className="bg-[#F6F3F0] min-h-screen pt-20">
                <div className="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 lg:pb-16">
                    <div className="overflow-hidden rounded-lg bg-white shadow-sm">
                        <div className="divide-y divide-gray-200 lg:grid lg:grid-cols-12 lg:divide-x lg:divide-y-0">
                            {/* Sidebar */}
                            <aside className="py-6 lg:col-span-3 bg-[#F5F1ED] border-r border-[#E2DCD7]">
                                <nav className="space-y-1">
                                    {subNavigation.map((item) => (
                                        <Link
                                            key={item.name}
                                            href={item.href}
                                            className={classNames(
                                                item.current
                                                    ? 'border-[#68513F] bg-[#DACEC6] text-[#68513F] hover:bg-[#DACEC6]'
                                                    : 'border-transparent text-gray-900 hover:bg-gray-50',
                                                'group flex items-center border-l-4 px-3 py-2 text-sm font-medium'
                                            )}
                                        >
                                            <item.icon
                                                className={classNames(
                                                    item.current
                                                        ? 'text-[#68513F]'
                                                        : 'text-gray-400 group-hover:text-gray-500',
                                                    'mr-3 -ml-1 h-6 w-6 shrink-0'
                                                )}
                                            />
                                            <span className="truncate">{item.name}</span>
                                        </Link>
                                    ))}

                                    <Link
                                        method="post"
                                        href={route('logout')}
                                        as="button"
                                        className="group flex items-center border-l-4 border-transparent px-3 py-2 text-sm font-medium text-gray-900 hover:bg-gray-50 hover:text-gray-900 w-full"
                                    >
                                        <ArrowRightOnRectangleIcon
                                            aria-hidden="true"
                                            className="mr-3 -ml-1 size-6 shrink-0 text-gray-400 group-hover:text-gray-500"
                                        />
                                        <span className="truncate">Log out</span>
                                    </Link>
                                </nav>
                            </aside>

                            {/* Content Area */}
                            <div className="px-4 py-6 sm:p-6 lg:col-span-9">
                                {children}
                            </div>
                        </div>
                    </div>
                </div>
            </main>

            <Footer />
        </>
    );
}
