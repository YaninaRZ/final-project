import { Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/react';
import { EllipsisHorizontalIcon } from '@heroicons/react/20/solid';
import { Link } from '@inertiajs/react';
import ButtonAdd from '@/components/ui/button-add.jsx';
import products from '@/data/products';
const statuses = {
    Paid: 'text-green-700 bg-green-50 ring-green-600/20',
    Withdraw: 'text-gray-600 bg-gray-50 ring-gray-500/10',
    Overdue: 'text-red-700 bg-red-50 ring-red-600/10',
};

function classNames(...classes) {
    return classes.filter(Boolean).join(' ');
}

export default function ProductListCard() {
    return (
        <>

            <div className="flex justify-end">
                <div className="w-40 px-4 py-4">
                    <ButtonAdd />
                </div>
            </div>
            <div className="p-10">
                <ul role="list" className="grid grid-cols-1 gap-x-6 gap-y-8 lg:grid-cols-3 xl:gap-x-8">
                    {products.map((product) => (
                        <li key={product.id} className="overflow-hidden rounded-xl border border-gray-200">
                            <div className="flex items-center gap-x-4 border-b border-gray-900/5 bg-gray-50 p-6">
                                <img
                                    alt={product.name}
                                    src={product.imageSrc}
                                    className="size-12 flex-none rounded-lg bg-white object-cover ring-1 ring-gray-900/10"
                                />
                                <div className="text-sm/6 font-medium text-gray-900">{product.name}</div>
                                <Menu as="div" className="relative ml-auto">
                                    <MenuButton className="-m-2.5 block p-2.5 text-gray-400 hover:text-gray-500">
                                        <span className="sr-only">Open options</span>
                                        <EllipsisHorizontalIcon aria-hidden="true" className="size-5" />
                                    </MenuButton>
                                    <MenuItems
                                        transition
                                        className="absolute right-0 z-10 mt-0.5 w-32 origin-top-right rounded-md bg-white py-2 shadow-lg ring-1 ring-gray-900/5 transition focus:outline-hidden data-closed:scale-95 data-closed:transform data-closed:opacity-0 data-enter:duration-100 data-enter:ease-out data-leave:duration-75 data-leave:ease-in"
                                    >
                                        <MenuItem>
                                            <Link
                                                href={route('productsAdmin', product.id)}
                                                className="block px-3 py-1 text-sm/6 text-gray-900 data-focus:bg-gray-50 data-focus:outline-hidden"
                                            >
                                                View
                                                <span className="sr-only">, {product.name}</span>
                                            </Link>
                                        </MenuItem>
                                    </MenuItems>
                                </Menu>
                            </div>
                            <dl className="-my-3 divide-y divide-gray-100 px-6 py-4 text-sm/6">
                                <div className="flex justify-between gap-x-4 py-3">
                                    <dt className="text-gray-500">Sales</dt>
                                    <dd className="text-gray-700">
                                        <time>{product.sales.quantity}</time>
                                    </dd>
                                </div>
                                <div className="flex justify-between gap-x-4 py-3">
                                    <dt className="text-gray-500">Remaining Products</dt>
                                    <dd className="flex items-start gap-x-2">
                                        <div className="font-medium text-gray-900">{product.sales.remainingProducts}</div>
                                        <div
                                            className={classNames(
                                                statuses[product.sales.quantity],
                                                'rounded-md px-2 py-1 text-xs font-medium ring-1 ring-inset',
                                            )}
                                        >
                                            {product.sales.quantity}
                                        </div>
                                    </dd>
                                </div>
                            </dl>
                        </li>
                    ))}
                </ul>
            </div>
        </>
    );
}
