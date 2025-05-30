import { Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/react';
import { EllipsisHorizontalIcon } from '@heroicons/react/20/solid';
import { Link, useForm, usePage } from '@inertiajs/react';
import { useState } from 'react';
import { Button } from '@/components/ui/button';
import {
    Dialog, DialogContent, DialogFooter, DialogHeader, DialogTitle,
} from '@/components/ui/dialog';
import InputError from '@/components/input-error';


/////////////////////////
const statuses = {
    Paid: 'text-green-700 bg-green-50 ring-green-600/20',
    Withdraw: 'text-gray-600 bg-gray-50 ring-gray-500/10',
    Overdue: 'text-red-700 bg-red-50 ring-red-600/10',
};

function classNames(...classes) {
    return classes.filter(Boolean).join(' ');
}


////////////////////////

export default function ProductListCard({ products, categories }) {
    const [open, setOpen] = useState(false);
    const [deleteDialogOpen, setDeleteDialogOpen] = useState(false);
    const [selectedProduct, setSelectedProduct] = useState(null);

    const confirmDelete = (product) => {
        setSelectedProduct(product);
        setDeleteDialogOpen(true);
    };

    const handleDeleteProduct = () => {
        if (!selectedProduct) return;

        deleteProduct(route('all-products.destroy', selectedProduct.id), {
            onFinish: () => {
                setDeleteDialogOpen(false);
                setSelectedProduct(null);
            },
        });
    };

    console.log(products);

    const { data, setData, post, put, processing, errors, reset, delete: deleteProduct } = useForm({
        name: '',
        description: '',
        sku: '',
        sales_quantity: '',
        sales_remaining_products: '',
        sales_price: '',
        image_src: '',
        image_alt: '',
        category_id: '',
    });

    const submit = (e) => {
        e.preventDefault();
        post(route('all-products.store'), {
            onFinish: () => {
                reset(
                    'name',
                    'description',
                    'sku',
                    'sales_quantity',
                    'sales_remaining_products',
                    'sales_price',
                    'image_src',
                    'image_alt',

                );
                setOpen(false);
            },
        });
    };


    return (
        <>
            <Dialog open={open} onOpenChange={setOpen}>
                <DialogContent>
                    <form className="flex flex-col gap-6" onSubmit={submit}>
                        <DialogHeader>
                            <DialogTitle>Add a New Product</DialogTitle>
                        </DialogHeader>

                        <input
                            type="text"
                            placeholder="Name"
                            className="rounded border p-2"
                            value={data.name}
                            onChange={(e) => setData('name', e.target.value)}
                        />
                        <InputError message={errors.name} />

                        <select
                            className="rounded border p-2"
                            value={data.category_id}
                            onChange={(e) => setData('category_id', e.target.value)}
                        >
                            <option value="">Choisir une catégorie</option>
                            {categories.map((category) => (
                                <option key={category.id} value={category.id}>
                                    {category.name}
                                </option>
                            ))}
                        </select>
                        <InputError message={errors.category_id} />


                        <textarea
                            placeholder="Description"
                            className="rounded border p-2"
                            value={data.description}
                            onChange={(e) => setData('description', e.target.value)}
                        />
                        <InputError message={errors.description} />

                        <input
                            type="text"
                            placeholder="SKU"
                            className="rounded border p-2"
                            value={data.sku}
                            onChange={(e) => setData('sku', e.target.value)}
                        />
                        <InputError message={errors.sku} />

                        <input
                            type="number"
                            placeholder="Sales Quantity"
                            className="rounded border p-2"
                            value={data.sales_quantity}
                            onChange={(e) => setData('sales_quantity', e.target.value)}
                        />
                        <InputError message={errors.sales_quantity} />

                        <input
                            type="number"
                            placeholder="Remaining Products"
                            className="rounded border p-2"
                            value={data.sales_remaining_products}
                            onChange={(e) => setData('sales_remaining_products', e.target.value)}
                        />
                        <InputError message={errors.sales_remaining_products} />

                        <input
                            type="number"
                            placeholder="Price"
                            className="rounded border p-2"
                            value={data.sales_price}
                            onChange={(e) => setData('sales_price', e.target.value)}
                        />
                        <InputError message={errors.sales_price} />

                        <input
                            type="text"
                            placeholder="Image URL"
                            className="rounded border p-2"
                            value={data.image_src}
                            onChange={(e) => setData('image_src', e.target.value)}
                        />
                        <InputError message={errors.image_src} />

                        <input
                            type="text"
                            placeholder="Image Alt Text"
                            className="rounded border p-2"
                            value={data.image_alt}
                            onChange={(e) => setData('image_alt', e.target.value)}
                        />
                        <InputError message={errors.image_alt} />



                        <DialogFooter>
                            <Button type="submit" disabled={processing}>Save</Button>
                        </DialogFooter>
                    </form>
                </DialogContent>
            </Dialog>


            <div className="flex justify-end">
                <div className="w-40 px-4 py-4">
                    <Button onClick={() => setOpen(true)}>Add Product</Button>
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
                                                href={route('product-detail', product.id)}
                                                className="block px-3 py-1 text-sm text-gray-900 hover:bg-gray-50"
                                            >
                                                View
                                            </Link>
                                        </MenuItem>
                                        <MenuItem>
                                            <button
                                                onClick={() => confirmDelete(product)}
                                                className="block w-full px-3 py-1 text-sm text-left text-red-600 hover:bg-gray-50"
                                            >
                                                Delete
                                            </button>
                                        </MenuItem>
                                    </MenuItems>

                                </Menu>

                                <Dialog open={deleteDialogOpen} onOpenChange={setDeleteDialogOpen}>
                                    <DialogContent>
                                        <DialogHeader>
                                            <DialogTitle>Confirm Deletion</DialogTitle>
                                        </DialogHeader>
                                        <p className="text-sm text-gray-700">
                                            Are you sure you want to delete <strong>{selectedProduct?.name}</strong>? This action cannot be undone.
                                        </p>
                                        <DialogFooter>
                                            <Button variant="outline" onClick={() => setDeleteDialogOpen(false)}>
                                                Cancel
                                            </Button>
                                            <Button variant="destructive" onClick={handleDeleteProduct}>
                                                Delete
                                            </Button>
                                        </DialogFooter>
                                    </DialogContent>
                                </Dialog>

                            </div>
                            <dl className="-my-3 divide-y divide-gray-100 px-6 py-4 text-sm/6">
                                <div className="flex justify-between gap-x-4 py-3">
                                    <dt className="text-gray-500">Sales</dt>
                                    <dd className="text-gray-700">
                                        <time>{product.sales_quantity}</time>
                                    </dd>
                                </div>
                                <div className="flex justify-between gap-x-4 py-3">
                                    <dt className="text-gray-500">Remaining Products</dt>
                                    <dd className="flex items-start gap-x-2">
                                        <div className="font-medium text-gray-900">{product.sales_remaining_products}</div>
                                        <div
                                            className={classNames(
                                                statuses[product.sales_quantity],
                                                'rounded-md px-2 py-1 text-xs font-medium ring-1 ring-inset',
                                            )}
                                        >
                                            {product.sales_quantity}
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
