'use client';
import { Link, useForm } from '@inertiajs/react';
import { useLayoutEffect, useRef, useState } from 'react';
import AdminFilter from './filter';

function classNames(...classes) {
    return classes.filter(Boolean).join(' ');
}

export default function OrderTable({ orders = [] }) {

    const checkbox = useRef();

    const orderList = orders.orders || [];

    const [checked, setChecked] = useState(false);
    const [indeterminate, setIndeterminate] = useState(false);
    const [selectedOrder, setSelectedOrder] = useState([]);

    useLayoutEffect(() => {
        const isIndeterminate = selectedOrder.length > 0 && selectedOrder.length < order.length;
        setChecked(selectedOrder.length === orders.length);
        setIndeterminate(isIndeterminate);
        if (checkbox.current) {
            checkbox.current.indeterminate = isIndeterminate;
        }
    }, [selectedOrder, orders]);

    function toggleAll() {
        setSelectedOrder(checked || indeterminate ? [] : [...orders]);
        setChecked(!checked && !indeterminate);
        setIndeterminate(false);
    }

    const { data, setData, post, put, processing, errors, reset, delete: deleteProduct } = useForm({
        Product: '',
        OrderID: '',
        Date: '',
        Customer_Name: '',
        Status: '',
        Amount: '',
    });

    console.log(orders);

    return (
        <div className="px-4 sm:px-6 lg:px-8">
            <div className="sm:flex sm:items-center">
                <div className="sm:flex-auto">
                    <AdminFilter />
                    <h1 className="text-base font-semibold text-gray-900">Recent Orders</h1>
                    <p className="mt-2 text-sm text-gray-700">A list of all the recent orders</p>
                </div>
            </div>
            <div className="mt-8 flow-root">
                <div className="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div className="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                        <div className="relative">
                            {selectedOrder.length > 0 && (
                                <div className="absolute top-0 left-14 flex h-12 items-center space-x-3 bg-white sm:left-12">
                                    <button
                                        type="button"
                                        className="inline-flex items-center rounded-sm bg-white px-2 py-1 text-sm font-semibold text-gray-900 shadow-xs ring-1 ring-gray-300 ring-inset hover:bg-gray-50 disabled:cursor-not-allowed disabled:opacity-30 disabled:hover:bg-white"
                                        onClick={() => {
                                            // exemple suppression multiple
                                            // tu peux appeler une fonction delete ici
                                            alert(`Delete ${selectedOrder.length} orders`);
                                        }}
                                        disabled={processing}
                                    >
                                        Delete all
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
                                                    className="col-start-1 row-start-1 appearance-none rounded-sm border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto"
                                                    ref={checkbox}
                                                    checked={checked}
                                                    onChange={toggleAll}
                                                />
                                                <svg
                                                    className="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-disabled:stroke-gray-950/25"
                                                    viewBox="0 0 14 14"
                                                    fill="none"
                                                >
                                                    <path
                                                        className="opacity-0 group-has-checked:opacity-100"
                                                        d="M3 8L6 11L11 3.5"
                                                        strokeWidth="2"
                                                        strokeLinecap="round"
                                                        strokeLinejoin="round"
                                                    />
                                                    <path
                                                        className="opacity-0 group-has-indeterminate:opacity-100"
                                                        d="M3 7H11"
                                                        strokeWidth="2"
                                                        strokeLinecap="round"
                                                        strokeLinejoin="round"
                                                    />
                                                </svg>
                                            </div>
                                        </th>

                                        <th scope="col" className="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                            OrderID
                                        </th>
                                        <th scope="col" className="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                            Date
                                        </th>
                                        <th scope="col" className="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                            Customer Name
                                        </th>
                                        <th scope="col" className="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                            Status
                                        </th>
                                        <th scope="col" className="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                            See details
                                        </th>
                                    </tr>
                                </thead>
                                <tbody className="divide-y divide-gray-200 bg-white">
                                    {orderList.map((order) => (
                                        <tr
                                            key={order.id}
                                            className={selectedOrder.includes(order) ? 'bg-gray-50' : undefined}
                                        >
                                            <td className="relative px-7 sm:w-12 sm:px-6">
                                                {selectedOrder.includes(order) && <div className="absolute inset-y-0 left-0 w-0.5 bg-indigo-600" />}
                                                <div className="group absolute top-1/2 left-4 -mt-2 grid size-4 grid-cols-1">
                                                    <input
                                                        type="checkbox"
                                                        className="col-start-1 row-start-1 appearance-none rounded-sm border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto"
                                                        value={order.id}
                                                        checked={selectedOrder.includes(order)}
                                                        onChange={(e) =>
                                                            setSelectedOrder(
                                                                e.target.checked
                                                                    ? [...selectedOrder, order]
                                                                    : selectedOrder.filter((o) => o !== order)
                                                            )
                                                        }
                                                    />
                                                    <svg
                                                        className="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-disabled:stroke-gray-950/25"
                                                        viewBox="0 0 14 14"
                                                        fill="none"
                                                    >
                                                        <path
                                                            className="opacity-0 group-has-checked:opacity-100"
                                                            d="M3 8L6 11L11 3.5"
                                                            strokeWidth="2"
                                                            strokeLinecap="round"
                                                            strokeLinejoin="round"
                                                        />
                                                        <path
                                                            className="opacity-0 group-has-indeterminate:opacity-100"
                                                            d="M3 7H11"
                                                            strokeWidth="2"
                                                            strokeLinecap="round"
                                                            strokeLinejoin="round"
                                                        />
                                                    </svg>
                                                </div>
                                            </td>

                                            <td className="px-3 py-4 text-sm whitespace-nowrap text-gray-500">{order.id}</td>
                                            <td className="px-3 py-4 text-sm whitespace-nowrap text-gray-500">{order.created_at}</td>
                                            <td className="px-3 py-4 text-sm whitespace-nowrap text-gray-500">
                                                {order.client?.name || order.customer_name || 'Unknown'}
                                            </td>
                                            <td className="px-3 py-4 text-sm whitespace-nowrap text-gray-500">{order.status}</td>
                                            <td className="px-3 py-4 text-sm whitespace-nowrap text-[#68513F]">
                                                <Link href={route('orders.show', order.id)}>See</Link>
                                            </td>
                                        </tr>
                                    ))}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
}
