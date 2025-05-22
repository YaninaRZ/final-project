'use client';
import { Link } from '@inertiajs/react';
import { useLayoutEffect, useRef, useState } from 'react';
import AdminFilter from './filter';
import orders from '@/data/orders';
function classNames(...classes) {
    return classes.filter(Boolean).join(' ');
}

export default function OrderTable() {
    const checkbox = useRef();
    const [checked, setChecked] = useState(false);
    const [indeterminate, setIndeterminate] = useState(false);
    const [selectedOrder, setSelectedOrder] = useState([]);

    useLayoutEffect(() => {
        const isIndeterminate = selectedOrder.length > 0 && selectedOrder.length < orders.length;
        setChecked(selectedOrder.length === orders.length);
        setIndeterminate(isIndeterminate);
        checkbox.current.indeterminate = isIndeterminate;
    }, [selectedOrder]);

    function toggleAll() {
        setSelectedOrder(checked || indeterminate ? [] : order);
        setChecked(!checked && !indeterminate);
        setIndeterminate(false);
    }

    return (
        <div className="px-4 sm:px-6 lg:px-8">
            <div className="sm:flex sm:items-center">
                <div className="sm:flex-auto">
                    <AdminFilter></AdminFilter>
                    <h1 className="text-base font-semibold text-gray-900">Recent Orders</h1>
                    <p className="mt-2 text-sm text-gray-700">A list of all the recents orders</p>
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
                                        <th scope="col" className="min-w-[12rem] py-3.5 pr-3 text-left text-sm font-semibold text-gray-900">
                                            Product
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
                                        <th scope="col" className="rpx-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                            Amount
                                        </th>

                                        <th scope="col" className="rpx-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                            See details
                                        </th>
                                    </tr>
                                </thead>
                                <tbody className="divide-y divide-gray-200 bg-white">
                                    {orders.map((command) => (
                                        <tr key={command.Date} className={selectedOrder.includes(command) ? 'bg-gray-50' : undefined}>
                                            <td className="relative px-7 sm:w-12 sm:px-6">
                                                {selectedOrder.includes(command) && <div className="absolute inset-y-0 left-0 w-0.5 bg-indigo-600" />}
                                                <div className="group absolute top-1/2 left-4 -mt-2 grid size-4 grid-cols-1">
                                                    <input
                                                        type="checkbox"
                                                        className="col-start-1 row-start-1 appearance-none rounded-sm border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto"
                                                        value={command.Date}
                                                        checked={selectedOrder.includes(command)}
                                                        onChange={(e) =>
                                                            setSelectedOrder(
                                                                e.target.checked
                                                                    ? [...selectedOrder, command]
                                                                    : selectedOrder.filter((p) => p !== command),
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
                                            <td
                                                className={classNames(
                                                    'py-4 pr-3 text-sm font-medium whitespace-nowrap',
                                                    selectedOrder.includes(command) ? 'text-indigo-600' : 'text-gray-900',
                                                )}
                                            >
                                                {command.Product}
                                            </td>
                                            <td className="px-3 py-4 text-sm whitespace-nowrap text-gray-500">{command.OrderID}</td>
                                            <td className="px-3 py-4 text-sm whitespace-nowrap text-gray-500">{command.Date}</td>
                                            <td className="px-3 py-4 text-sm whitespace-nowrap text-gray-500">{command.Name}</td>
                                            <td className="px-3 py-4 text-sm whitespace-nowrap text-gray-500">{command.Status}</td>
                                            <td className="px-3 py-4 text-sm whitespace-nowrap text-gray-500">{command.Amount}</td>
                                            <td className="px-3 py-4 text-sm whitespace-nowrap text-[#68513F]">
                                                <Link href={route('order-summary', command.OrderID)}>See</Link>
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
