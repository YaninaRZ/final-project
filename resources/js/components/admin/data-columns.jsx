import { PaperClipIcon } from '@heroicons/react/20/solid';
import { usePage, useForm } from '@inertiajs/react';
import { useState } from 'react';
import Button from '@/components/button';

export default function DataColumns({ product, categories }) {
    console.log(product);
    const [editMode, setEditMode] = useState(false);

    const { data, setData, put, processing, errors, reset } = useForm({
        name: product?.name || '',
        description: product?.description || '',
        sku: product?.sku || '',
        sales_quantity: product?.sales_quantity || 0,
        sales_remaining_products: product?.sales_remaining_products || 0,
        sales_price: product?.sales_price || 0,
        image_src: product?.image_src || '',
        image_alt: product?.image_alt || '',
        product_gallery: product?.product_gallery || '', // supposé JSON ou string URLs
        category_id: product?.category?.id,
    });

    const submit = (e) => {
        e.preventDefault();
        put(route('all-products.update', product.id), {
            data,
            onSuccess: () => setEditMode(false),
        });
    };

    if (!product) {
        return (
            <div className="p-6">
                <p>Product not found.</p>
                <Link href={route("home")} className="text-blue-600 underline">
                    ← Back to home
                </Link>
            </div>
        );
    }

    // Pour afficher la galerie sous forme de liste d'images
    let galleryImages = [];
    try {
        galleryImages = typeof data.product_gallery === 'string'
            ? JSON.parse(data.product_gallery)
            : data.product_gallery;
    } catch {
        galleryImages = [];
    }


    function getCategoryNameById(id) {
        //fonction pour recup le nom de ma categorie selon id 
        if (id) {
            return categories.filter(category => category.id == id)[0].name;
        }
        return 'No category';
    }

    return (
        <>
            <form onSubmit={submit} className="flex flex-col gap-8 p-6 lg:flex-row">
                <div className="w-full lg:w-1/2">
                    <div className="flex items-center justify-between px-4 sm:px-0">
                        <h3 className="text-base/7 font-semibold text-gray-900">Product Details</h3>
                        <Button text={editMode ? 'Cancel' : 'Edit'} onClick={() => {
                            if (editMode) reset();
                            setEditMode(!editMode);
                        }} />
                    </div>

                    <div className="mt-6 border-t border-gray-100 divide-y divide-gray-100">
                        {[
                            { label: 'Name', key: 'name', type: 'text' },
                            { label: 'Description', key: 'description', type: 'textarea' },
                            { label: 'SKU', key: 'sku', type: 'text' },
                            { label: 'Sales Quantity', key: 'sales_quantity', type: 'number' },
                            { label: 'Remaining Products', key: 'sales_remaining_products', type: 'number' },
                            { label: 'Sales Price', key: 'sales_price', type: 'number' },
                            { label: 'Image URL', key: 'image_src', type: 'text' },
                            { label: 'Image Alt Text', key: 'image_alt', type: 'text' },
                            { label: 'Product Gallery (JSON)', key: 'product_gallery', type: 'textarea' },
                            { label: 'Category', key: 'category_id', type: 'select' }
                        ].map(({ label, key, type }) => (
                            <div key={key} className="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                <dt className="text-sm/6 font-medium text-gray-900">{label}</dt>
                                <dd className="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">
                                    {editMode ? (
                                        type === 'textarea' ? (
                                            <textarea
                                                name={key}
                                                value={data[key]}
                                                onChange={(e) => setData(key, e.target.value)}
                                                className="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                            />
                                        ) : type === 'select' ? (
                                            <select
                                                type={type}
                                                name={key}
                                                value={data[key]}
                                                onChange={(e) => setData(key, e.target.value)}
                                                className="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                            >
                                                <option value={''}>No Category</option>
                                                {categories.map(category => <option key={category.id} value={category.id}>{category.name}</option>)}
                                            </select>
                                        )

                                            : (
                                                <input
                                                    type={type}
                                                    name={key}
                                                    value={data[key]}
                                                    onChange={(e) => setData(key, e.target.value)}
                                                    className="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                                />
                                            )
                                    ) : (
                                        // jappelle ma fonction et data key va chercher dans mes label et si le data key cest categorie id beh il maffiche le nom 
                                        <span>{key === 'category_id' ? getCategoryNameById(data[key]) : data[key]}</span>
                                    )}
                                    {errors[key] && <p className="text-red-600 text-sm mt-1">{errors[key]}</p>}
                                </dd>
                            </div>
                        ))}

                        {!editMode && galleryImages.length > 0 && (
                            <div className="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                <dt className="text-sm/6 font-medium text-gray-900">Gallery</dt>
                                <dd className="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0 flex flex-wrap gap-4">
                                    {galleryImages.map((url, i) => (
                                        <img
                                            key={i}
                                            src={url}
                                            alt={`Gallery image ${i + 1}`}
                                            className="w-24 h-24 rounded-md object-cover"
                                        />
                                    ))}
                                </dd>
                            </div>
                        )}

                        {editMode && (
                            <div className="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                <dd className="mt-1 sm:col-span-3 sm:mt-0 flex justify-end gap-4">
                                    <button
                                        type="submit"
                                        disabled={processing}
                                        className="rounded-md bg-[#68513F] px-4 py-2 text-white font-semibold hover:bg-[#573f32]"
                                    >
                                        Save
                                    </button>
                                </dd>
                            </div>
                        )}
                    </div>
                </div>

                <div className="w-full lg:w-1/2">
                    <img
                        src={data.image_src || product.image_src || product.imageSrc}
                        alt={data.image_alt || product.image_alt || product.imageAlt}
                        className="w-full rounded-xl object-cover shadow-md"
                    />
                </div>
            </form>
        </>
    );
}
