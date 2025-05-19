import { PaperClipIcon } from '@heroicons/react/20/solid';
import { usePage } from '@inertiajs/react';
import { useState } from 'react';
import Button from '../button';
import products from './admin-data-products';
export default function DataColumns() {
    const { id } = usePage().props;
    const productId = parseInt(id);
    const product = products.find((p) => p.id === productId);
    if (!product) {
        return (
            <div className="p-6">
                <p>Post not found.</p>
                <Link href="/" className="text-blue-600 underline">
                    ← Back to posts
                </Link>
            </div>
        );
    }

    const [editMode, setEditMode] = useState(false);

    return (
        <>
            two-data-columns.jsx
            <div className="flex flex-col gap-8 p-6 lg:flex-row">
                <div className="w-full lg:w-1/2">
                    <div className="px-4 sm:px-0">
                        <div className="flex items-center justify-between">
                            <div>
                                <h3 className="text-base/7 font-semibold text-gray-900">Product</h3>
                                <p className="mt-1 max-w-2xl text-sm/6 text-gray-500">{product.name}</p>
                            </div>
                            <div className="scale-125">
                                <Button text={editMode ? 'View' : 'Edit'} onClick={() => setEditMode(!editMode)} />
                            </div>
                        </div>
                    </div>

                    <div className="mt-6 border-t border-gray-100">
                        <dl className="divide-y divide-gray-100">
                            <div className="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                <dt className="text-sm/6 font-medium text-gray-900">Description</dt>
                                <dd className="mt-1 flex text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">
                                    {editMode ? (
                                        <input
                                            id="description"
                                            name="description"
                                            type="text"
                                            placeholder="description"
                                            aria-label="Description"
                                            value="Description of the product"
                                            className="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                        />
                                    ) : (
                                        <>
                                            <span className="grow">Description of the product</span>
                                            <span className="ml-4 shrink-0"></span>
                                        </>
                                    )}
                                </dd>
                            </div>
                            <div className="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                <dt className="text-sm/6 font-medium text-gray-900">Category</dt>

                                <dd className="mt-1 flex text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">
                                    {editMode ? (
                                        <input
                                            id="category"
                                            name="category"
                                            type="text"
                                            placeholder="category"
                                            aria-label="Category"
                                            value="Category"
                                            className="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                        />
                                    ) : (
                                        <>
                                            <span className="grow">Description of the product</span>
                                            <span className="ml-4 shrink-0"></span>
                                        </>
                                    )}
                                </dd>
                            </div>
                            <div className="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                <dt className="text-sm/6 font-medium text-gray-900">SKU</dt>
                                <dd className="mt-1 flex text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">
                                    {editMode ? (
                                        <input
                                            id="sku"
                                            name="sku"
                                            type="text"
                                            placeholder="sku"
                                            aria-label="sku"
                                            value="sku"
                                            className="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                        />
                                    ) : (
                                        <>
                                            <span className="grow">sku</span>
                                            <span className="ml-4 shrink-0"></span>
                                        </>
                                    )}
                                </dd>
                            </div>
                            <div className="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                <dt className="text-sm/6 font-medium text-gray-900"> Remaining Stock Quantity</dt>
                                <dd className="mt-1 flex text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">
                                    <dd className="mt-1 flex text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">
                                        {editMode ? (
                                            <input
                                                id="remaining-stock-quantity"
                                                name="remaining-stock-quantity"
                                                type="number"
                                                placeholder="remaining-stock-quantity"
                                                aria-label="remaining-stock-quantity"
                                                value={product.sales.remainingProducts}
                                                className="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                            />
                                        ) : (
                                            <>
                                                <span className="grow">{product.sales.remainingProducts}</span>
                                                <span className="ml-4 shrink-0"></span>
                                            </>
                                        )}
                                    </dd>
                                </dd>
                            </div>
                            <div className="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                <dt className="text-sm/6 font-medium text-gray-900">Sales Quantity</dt>
                                <dd className="mt-1 flex text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">
                                    {editMode ? (
                                        <input
                                            id="sales-quantity"
                                            name="sales-quantity"
                                            type="number"
                                            placeholder="sales-quantity"
                                            aria-label="sales-quantity"
                                            value={product.sales.quantity}
                                            className="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                        />
                                    ) : (
                                        <>
                                            <span className="grow">{product.sales.quantity}</span>
                                            <span className="ml-4 shrink-0"></span>
                                        </>
                                    )}
                                </dd>
                            </div>

                            <div className="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                <dt className="text-sm/6 font-medium text-gray-900">Sale Price</dt>
                                <dd className="mt-1 flex text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">
                                    {editMode ? (
                                        <input
                                            id="sales-price"
                                            name="sales-price"
                                            type="number"
                                            placeholder="sales-price"
                                            aria-label="sales-price"
                                            value={product.sales.quantity}
                                            className="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                        />
                                    ) : (
                                        <>
                                            <span className="grow">{product.sales.quantity}</span>
                                            <span className="ml-4 shrink-0"></span>
                                        </>
                                    )}
                                </dd>
                            </div>

                            <div className="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                <dt className="text-sm/6 font-medium text-gray-900">Product Gallery</dt>
                                <dd className="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">
                                    <ul role="list" className="divide-y divide-gray-100 rounded-md border border-gray-200">
                                        <li className="flex items-center justify-between py-4 pr-5 pl-4 text-sm/6">
                                            <div className="flex w-0 flex-1 items-center">
                                                <PaperClipIcon aria-hidden="true" className="size-5 shrink-0 text-gray-400" />
                                                <div className="ml-4 flex min-w-0 flex-1 gap-2">
                                                    <span className="truncate font-medium">resume_back_end_developer.pdf</span>
                                                    <span className="shrink-0 text-gray-400">2.4mb</span>
                                                </div>
                                            </div>
                                            <div className="ml-4 flex shrink-0 space-x-4">
                                                {editMode ? (
                                                    <>
                                                        <button
                                                            type="button"
                                                            className="rounded-md bg-white font-medium text-indigo-600 hover:text-indigo-500"
                                                        >
                                                            Update
                                                        </button>
                                                        <span aria-hidden="true" className="text-gray-200">
                                                            |
                                                        </span>
                                                        <button
                                                            type="button"
                                                            className="rounded-md bg-white font-medium text-gray-900 hover:text-gray-800"
                                                        >
                                                            Remove
                                                        </button>
                                                    </>
                                                ) : (
                                                    <></>
                                                )}
                                            </div>
                                        </li>
                                        <li className="flex items-center justify-between py-4 pr-5 pl-4 text-sm/6">
                                            <div className="flex w-0 flex-1 items-center">
                                                <PaperClipIcon aria-hidden="true" className="size-5 shrink-0 text-gray-400" />
                                                <div className="ml-4 flex min-w-0 flex-1 gap-2">
                                                    <span className="truncate font-medium">coverletter_back_end_developer.pdf</span>
                                                    <span className="shrink-0 text-gray-400">4.5mb</span>
                                                </div>
                                            </div>
                                            <div className="ml-4 flex shrink-0 space-x-4">
                                                {editMode ? (
                                                    <>
                                                        <button
                                                            type="button"
                                                            className="rounded-md bg-white font-medium text-indigo-600 hover:text-indigo-500"
                                                        >
                                                            Update
                                                        </button>
                                                        <span aria-hidden="true" className="text-gray-200">
                                                            |
                                                        </span>
                                                        <button
                                                            type="button"
                                                            className="rounded-md bg-white font-medium text-gray-900 hover:text-gray-800"
                                                        >
                                                            Remove
                                                        </button>
                                                    </>
                                                ) : (
                                                    <></>
                                                )}
                                            </div>
                                        </li>
                                    </ul>
                                </dd>
                            </div>

                            <div className="mt-6 flex items-center justify-end gap-x-6">
                                {editMode ? (
                                    <>
                                        <button type="button" className="text-sm/6 font-semibold text-gray-900">
                                            Cancel
                                        </button>
                                        <button
                                            type="submit"
                                            className="inline-flex justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                                        >
                                            Save
                                        </button>
                                    </>
                                ) : (
                                    <></>
                                )}
                            </div>
                        </dl>
                    </div>
                </div>
                <div className="w-full lg:w-1/2">
                    <img src={product.imageUrl} alt={product.imageAlt} className="w-full rounded-xl object-cover shadow-md" />
                </div>
            </div>
        </>
    );
}
