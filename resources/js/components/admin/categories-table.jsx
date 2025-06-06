
import { Button } from '@/components/ui/button';
import { Dialog, DialogContent, DialogFooter, DialogHeader, DialogTitle } from '@/components/ui/dialog';
import { useForm, usePage } from '@inertiajs/react';
import { useState } from 'react';



export default function CategoriesTable() {
    const [open, setOpen] = useState(false);
    const [openParent, setOpenParent] = useState(false); // modal parent category
    const [deleteDialogOpen, setDeleteDialogOpen] = useState(false);
    const [selectedCategory, setSelectedCategory] = useState(null);
    const [editingCategory, setEditingCategory] = useState(null);


    const { categories, parentCategories } = usePage().props;

    const confirmDelete = (category) => {
        setSelectedCategory(category);
        setDeleteDialogOpen(true);
    }; console.log(parentCategories);

    // Form for add/edit child or normal category (with optional parent_id)
    const { data, setData, post, put, processing, errors, reset, delete: deleteCategory } = useForm({
        name: '',
        parent_id: null,
    });

    // Form specifically for parent category creation
    const parentForm = useForm({
        name: '',
    });

    const submit = (e) => {
        e.preventDefault();

        if (editingCategory) {
            // Mise à jour
            put(route('categories.update', editingCategory.id), {
                onFinish: () => {
                    reset();
                    setOpen(false);
                    setEditingCategory(null);
                },
            });
        } else {
            // Création (peut aussi gérer parent_id si besoin)
            post(route('categories.store'), {
                onFinish: () => {
                    reset();
                    setOpen(false);
                },
            });
        }
    };


    const handleDeleteCategory = () => {
        if (!selectedCategory) return;

        deleteCategory(route('categories.destroy', selectedCategory.id), {
            onFinish: () => {
                setDeleteDialogOpen(false);
                setSelectedCategory(null);
            },
        });
    };

    const openAddModal = () => {
        setEditingCategory(null);
        setData({ name: '', parent_id: null });
        setOpen(true);
    };

    const openEditModal = (category) => {
        setEditingCategory(category);
        setData({
            name: category.name,
            parent_id: category.parent_id ?? '',
        });
        setOpen(true);
    };



    return (
        <div className="px-4 sm:px-6 lg:px-8">

            <div className="sm:flex sm:items-center sm:justify-end space-x-4">
                <Button onClick={openAddModal}>Add Category</Button>
            </div>

            {/* Modal Add/Edit Category */}
            <Dialog open={open} onOpenChange={setOpen}>
                <DialogContent>
                    <DialogHeader>
                        <DialogTitle>{editingCategory ? 'Edit Category' : 'Add a category'}</DialogTitle>
                    </DialogHeader>

                    <form onSubmit={submit} className="space-y-4">
                        <input
                            type="text"
                            name="name"
                            value={data.name}
                            onChange={(e) => setData('name', e.target.value)}
                            className="w-full rounded border p-2"
                            placeholder="Category name"
                            required
                        />
                        {errors.name && <p className="text-red-500 text-sm">{errors.name}</p>}

                        <select
                            name="parent_id"
                            value={data.parent_id ?? ''}
                            onChange={(e) => setData('parent_id', e.target.value || null)}
                            className="w-full rounded border p-2"
                        >
                            <option value="">No parent </option>
                            {parentCategories.map((parent) => (
                                <option key={parent.id} value={parent.id}>
                                    {parent.name}
                                </option>
                            ))}
                        </select>
                        {errors.parent_id && <p className="text-red-500 text-sm">{errors.parent_id}</p>}

                        <DialogFooter>
                            <Button type="submit" disabled={processing || !data.name.trim()}>
                                Save
                            </Button>
                        </DialogFooter>
                    </form>
                </DialogContent>
            </Dialog>



            <Dialog open={deleteDialogOpen} onOpenChange={setDeleteDialogOpen}>
                <DialogContent>
                    <DialogHeader>
                        <DialogTitle>Deletion confirmation</DialogTitle>
                    </DialogHeader>
                    <p className="text-sm text-gray-700">
                        Do you really want to delete the category? <strong>{selectedCategory?.name}</strong>? This action is irreversible.
                    </p>
                    <DialogFooter>
                        <Button variant="outline" onClick={() => setDeleteDialogOpen(false)}>
                            Cancel
                        </Button>
                        <Button variant="destructive" onClick={handleDeleteCategory}>
                            Delete
                        </Button>
                    </DialogFooter>
                </DialogContent>
            </Dialog>

            <div className="mt-8 flow-root">
                <div className="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div className="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                        <table className="min-w-full divide-y divide-gray-300">
                            <thead>
                                <tr>
                                    <th className="px-4 py-3.5 text-left text-sm font-semibold text-gray-900">Name</th>
                                    <th className="px-4 py-3.5 text-left text-sm font-semibold text-gray-900">Parent Category</th>
                                    <th className="relative px-4 py-3.5 text-right text-sm font-medium text-gray-900">
                                        <span className="sr-only">Actions</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody className="divide-y divide-gray-200">
                                {categories.map((category) => (
                                    <tr key={category.id}>
                                        <td className="px-4 py-4 text-sm text-gray-900">{category.name}</td>
                                        <td className="px-4 py-4 text-sm text-gray-900">
                                            {category.parent ? category.parent.name : '—'}
                                        </td>
                                        <td className="px-4 py-4 text-right text-sm">
                                            <button
                                                onClick={() => openEditModal(category)}
                                                className="text-blue-600 hover:text-blue-800 mr-4"
                                            >
                                                Edit
                                            </button>
                                            <button
                                                onClick={() => confirmDelete(category)}
                                                className="text-red-600 hover:text-red-800"
                                            >
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                ))}
                                {categories.length === 0 && (
                                    <tr>
                                        <td colSpan={3} className="py-4 text-center text-gray-500">
                                            No category
                                        </td>
                                    </tr>
                                )}
                            </tbody>
                        </table>



                    </div>
                </div>
            </div>
        </div>
    );
}
