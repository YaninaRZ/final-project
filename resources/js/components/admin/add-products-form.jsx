import { useState } from 'react';

export default function AddProduct() {
    const [formData, setFormData] = useState({
        description: '',
        category: '',
        sku: '',
        stock: '',
        sales: '',
        price: '',
        gallery: [],
    });

    const handleChange = (e) => {
        const { name, value } = e.target;
        setFormData({ ...formData, [name]: value });
    };

    const handleSubmit = (e) => {
        e.preventDefault();

        console.log('Submitting new product:', formData);
    };

    return (
        <div className="p-10">
            <form onSubmit={handleSubmit} className="space-y-6">
                <div>
                    <h3 className="text-base font-semibold text-gray-900">Add a New Product</h3>
                    <p className="mt-1 text-sm text-gray-500">Fill in the details below.</p>
                </div>

                <div>
                    <label className="block text-sm font-medium text-gray-700">Description</label>
                    <input
                        type="text"
                        name="description"
                        value={formData.description}
                        onChange={handleChange}
                        className="block w-1/2 rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                        required
                    />
                </div>

                <div>
                    <label className="block text-sm font-medium text-gray-700">Category</label>
                    <input
                        type="text"
                        name="category"
                        value={formData.category}
                        onChange={handleChange}
                        className="block w-1/2 rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                        required
                    />
                </div>

                <div>
                    <label className="block text-sm font-medium text-gray-700">SKU</label>
                    <input
                        type="text"
                        name="sku"
                        value={formData.sku}
                        onChange={handleChange}
                        className="block w-1/2 rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                    />
                </div>

                <div>
                    <label className="block text-sm font-medium text-gray-700">Stock Quantity</label>
                    <input
                        type="number"
                        name="stock"
                        value={formData.stock}
                        onChange={handleChange}
                        className="block w-1/2 rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                    />
                </div>

                <div>
                    <label className="block text-sm font-medium text-gray-700">Sales Quantity</label>
                    <input
                        type="number"
                        name="sales"
                        value={formData.sales}
                        onChange={handleChange}
                        className="block w-1/2 rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                    />
                </div>

                <div>
                    <label className="block text-sm font-medium text-gray-700">Sale Price ($)</label>
                    <input
                        type="number"
                        name="price"
                        step="0.01"
                        value={formData.price}
                        onChange={handleChange}
                        className="block w-1/2 rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                        required
                    />
                </div>


                <div>
                    <label className="block text-sm font-medium text-gray-700">Product Gallery</label>
                    <input
                        type="file"
                        multiple
                        onChange={(e) => setFormData({ ...formData, gallery: [...e.target.files] })}
                        className="mt-1 block w-1/2 text-sm text-gray-500"
                    />
                </div>

                <div>
                    <button type="submit" className="inline-flex justify-center rounded-md  bg-[#68513F] px-4 py-2 text-white hover:bg-[#68513F]">
                        Add Product
                    </button>
                </div>
            </form>
        </div>
    );
}
