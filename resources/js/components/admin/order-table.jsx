'use client';

import { Link, useForm } from '@inertiajs/react';
import { useLayoutEffect, useMemo, useRef, useState } from 'react';
import { ChevronLeftIcon, ChevronRightIcon } from '@heroicons/react/20/solid';

function classNames(...classes) {
    return classes.filter(Boolean).join(' ');
}

export default function OrderTable({ orders = [] }) {
    const checkbox = useRef(null);

    // Normalise la prop
    const orderList = Array.isArray(orders) ? orders : (orders.orders || []);

    // Pagination
    const [currentPage, setCurrentPage] = useState(1);
    const itemsPerPage = 15;
    const totalItems = orderList.length;
    const totalPages = Math.max(1, Math.ceil(totalItems / itemsPerPage));
    const indexOfLastItem = currentPage * itemsPerPage;
    const indexOfFirstItem = indexOfLastItem - itemsPerPage;
    const currentOrders = orderList.slice(indexOfFirstItem, indexOfLastItem);

    // IDs de la page courante
    const pageIds = useMemo(() => currentOrders.map(o => o.id), [currentOrders]);

    // Sélection basée sur les IDs
    const [selectedIds, setSelectedIds] = useState(new Set());

    // Etats du checkbox "Select all" (page)
    const [checked, setChecked] = useState(false);
    const [indeterminate, setIndeterminate] = useState(false);

    useLayoutEffect(() => {
        const selectedOnPage = pageIds.filter(id => selectedIds.has(id)).length;
        const allOnPage = pageIds.length;

        const isChecked = allOnPage > 0 && selectedOnPage === allOnPage;
        const isIndeterminate = selectedOnPage > 0 && selectedOnPage < allOnPage;

        setChecked(isChecked);
        setIndeterminate(isIndeterminate);
        if (checkbox.current) checkbox.current.indeterminate = isIndeterminate;
    }, [pageIds, selectedIds]);

    function toggleAll() {
        const newSet = new Set(selectedIds);
        const allSelected = pageIds.every(id => newSet.has(id));
        if (allSelected) {
            // désélectionne uniquement ceux de la page
            pageIds.forEach(id => newSet.delete(id));
        } else {
            // sélectionne uniquement ceux de la page
            pageIds.forEach(id => newSet.add(id));
        }
        setSelectedIds(newSet);
    }

    function toggleOne(id, isChecked) {
        const newSet = new Set(selectedIds);
        if (isChecked) newSet.add(id);
        else newSet.delete(id);
        setSelectedIds(newSet);
    }

    const pageSelectedCount = pageIds.filter(id => selectedIds.has(id)).length;

    const { delete: destroy, processing } = useForm({});

    // Pages (numéros)
    const pages = useMemo(() => Array.from({ length: totalPages }, (_, i) => i + 1), [totalPages]);

    return (
        <div className="px-4 sm:px-6 lg:px-8">
            <div className="sm:flex sm:items-center">
                <div className="sm:flex-auto">
                    <h1 className="text-base font-semibold text-gray-900">Recent Orders</h1>
                    <p className="mt-2 text-sm text-gray-700">A list of all the recent orders</p>
                </div>
            </div>

            <div className="mt-8 flow-root">
                <div className="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div className="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                        <div className="relative">

                            {pageSelectedCount > 0 && (
                                <div className="absolute top-0 left-14 flex h-12 items-center space-x-3 bg-white sm:left-12">
                                    <button
                                        type="button"
                                        disabled={processing}
                                        onClick={async () => {
                                            if (!confirm(`Delete ${pageSelectedCount} orders on this page?`)) return;
                                            for (const id of pageIds) {
                                                if (selectedIds.has(id)) {
                                                    await destroy(route('orders.destroy', id), { preserveScroll: true });
                                                }
                                            }
                                            // Nettoie la sélection de la page
                                            const newSet = new Set(selectedIds);
                                            pageIds.forEach(id => newSet.delete(id));
                                            setSelectedIds(newSet);
                                        }}
                                        className="inline-flex items-center rounded-sm bg-white px-2 py-1 text-sm font-semibold text-gray-900 shadow-xs ring-1 ring-gray-300 ring-inset hover:bg-gray-50 disabled:opacity-30"
                                    >
                                        Delete {pageSelectedCount} selected
                                    </button>
                                </div>
                            )}

                            <table className="min-w-full table-fixed divide-y divide-gray-300">
                                <thead>
                                    <tr>
                                        <th scope="col" className="relative px-7 sm:w-12 sm:px-6">
                                            <div className="group absolute top-1/2 left-4 -mt-2 grid size-4 grid-cols-1">
                                                <input
                                                    type="checkbox"
                                                    ref={checkbox}
                                                    checked={checked}
                                                    onChange={toggleAll}
                                                    className="col-start-1 row-start-1 appearance-none rounded-sm border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                                                />
                                                <svg className="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white" viewBox="0 0 14 14" fill="none">
                                                    <path className="opacity-0 group-has-checked:opacity-100" d="M3 8L6 11L11 3.5" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round" />
                                                    <path className="opacity-0 group-has-indeterminate:opacity-100" d="M3 7H11" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round" />
                                                </svg>
                                            </div>
                                        </th>

                                        <th className="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">OrderID</th>
                                        <th className="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Date</th>
                                        <th className="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Customer Name</th>
                                        <th className="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Status</th>
                                        <th className="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Actions</th>
                                    </tr>
                                </thead>

                                <tbody className="divide-y divide-gray-200 bg-white">
                                    {currentOrders.map(order => {
                                        const selected = selectedIds.has(order.id);
                                        return (
                                            <tr key={order.id} className={selected ? 'bg-gray-50' : undefined}>
                                                <td className="relative px-7 sm:w-12 sm:px-6">
                                                    {selected && <div className="absolute inset-y-0 left-0 w-0.5 bg-indigo-600" />}
                                                    <div className="group absolute top-1/2 left-4 -mt-2 grid size-4 grid-cols-1">
                                                        <input
                                                            type="checkbox"
                                                            checked={selected}
                                                            onChange={e => toggleOne(order.id, e.target.checked)}
                                                            className="col-start-1 row-start-1 appearance-none rounded-sm border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                                                        />
                                                        <svg className="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white" viewBox="0 0 14 14" fill="none">
                                                            <path className="opacity-0 group-has-checked:opacity-100" d="M3 8L6 11L11 3.5" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round" />
                                                            <path className="opacity-0 group-has-indeterminate:opacity-100" d="M3 7H11" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round" />
                                                        </svg>
                                                    </div>
                                                </td>

                                                <td className="px-3 py-4 text-sm whitespace-nowrap text-gray-500">{order.id}</td>
                                                <td className="px-3 py-4 text-sm whitespace-nowrap text-gray-500">{order.created_at}</td>
                                                <td className="px-3 py-4 text-sm whitespace-nowrap text-gray-500">{order.client?.name || order.customer_name || 'Unknown'}</td>
                                                <td className="px-3 py-4 text-sm whitespace-nowrap text-gray-500">{order.status}</td>
                                                <td className="px-3 py-4 text-sm whitespace-nowrap text-left space-x-3">
                                                    <Link href={route('orders.show', order.id)} className="text-[#68513F]">See</Link>
                                                    <button
                                                        type="button"
                                                        className="text-red-600 hover:underline"
                                                        disabled={processing}
                                                        onClick={async () => {
                                                            if (!confirm('Delete this order?')) return;
                                                            await destroy(route('orders.destroy', order.id), { preserveScroll: true });
                                                            setSelectedIds(prev => {
                                                                const ns = new Set(prev);
                                                                ns.delete(order.id);
                                                                return ns;
                                                            });
                                                        }}
                                                    >
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>
                                        );
                                    })}
                                </tbody>
                            </table>

                            {/* Pagination */}
                            <div className="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6 mt-6">
                                <div>
                                    <p className="text-sm text-gray-700">
                                        Showing <span className="font-medium">{totalItems ? indexOfFirstItem + 1 : 0}</span> to{' '}
                                        <span className="font-medium">{Math.min(indexOfLastItem, totalItems)}</span> of{' '}
                                        <span className="font-medium">{totalItems}</span> results
                                    </p>
                                </div>
                                <div>
                                    <nav className="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
                                        <button
                                            onClick={() => setCurrentPage(p => Math.max(p - 1, 1))}
                                            disabled={currentPage === 1}
                                            className={classNames(
                                                'relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-gray-300 ring-inset hover:bg-gray-50 focus:z-20',
                                                currentPage === 1 && 'cursor-not-allowed opacity-50'
                                            )}
                                        >
                                            <span className="sr-only">Previous</span>
                                            <ChevronLeftIcon className="size-5" aria-hidden="true" />
                                        </button>

                                        {pages.map(page => (
                                            <button
                                                key={page}
                                                onClick={() => setCurrentPage(page)}
                                                aria-current={page === currentPage ? 'page' : undefined}
                                                className={classNames(
                                                    page === currentPage
                                                        ? 'z-10 bg-[#82684c] text-white'
                                                        : 'text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50',
                                                    'relative inline-flex items-center px-4 py-2 text-sm font-semibold'
                                                )}
                                            >
                                                {page}
                                            </button>
                                        ))}

                                        <button
                                            onClick={() => setCurrentPage(p => Math.min(p + 1, totalPages))}
                                            disabled={currentPage === totalPages}
                                            className={classNames(
                                                'relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-gray-300 ring-inset hover:bg-gray-50 focus:z-20',
                                                currentPage === totalPages && 'cursor-not-allowed opacity-50'
                                            )}
                                        >
                                            <span className="sr-only">Next</span>
                                            <ChevronRightIcon className="size-5" aria-hidden="true" />
                                        </button>
                                    </nav>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
}
