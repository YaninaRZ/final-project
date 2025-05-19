import { Button } from '@/components/ui/button';
import { Dialog, DialogContent, DialogFooter, DialogHeader, DialogTitle } from '@/components/ui/dialog';
import { useState } from 'react';

// Exemple de données initiales pour les catégories
const initialCategories = [
    { id: 1, name: 'Informatique' },
    { id: 2, name: 'Cuisine' },
    { id: 3, name: 'Sport' },
];

export default function CategoriesTable() {
    const [open, setOpen] = useState(false);
    const [deleteDialogOpen, setDeleteDialogOpen] = useState(false);
    const [selectedCategory, setSelectedCategory] = useState(null);
    const [formData, setFormData] = useState({ name: '' });

    // State local pour gérer la liste des catégories
    const [categories, setCategories] = useState(initialCategories);

    const handleChange = (e) => {
        setFormData({ ...formData, [e.target.name]: e.target.value });
    };

    const handleAddCategory = () => {
        const newCategory = {
            id: categories.length ? categories[categories.length - 1].id + 1 : 1, // id auto-incrémenté
            name: formData.name.trim(),
        };
        if (newCategory.name === '') return; // ignore si vide

        setCategories([...categories, newCategory]);
        setFormData({ name: '' }); // reset formulaire
        setOpen(false);
    };

    const confirmDelete = (category) => {
        setSelectedCategory(category);
        setDeleteDialogOpen(true);
    };

    const handleDeleteCategory = () => {
        setCategories(categories.filter((cat) => cat.id !== selectedCategory.id));
        setDeleteDialogOpen(false);
    };

    return (
        <div className="px-4 sm:px-6 lg:px-8">
            {/* Header */}
            <div className="sm:flex sm:items-center sm:justify-between">
                <div className="max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
                    <h1 className="text-3xl font-bold tracking-tight text-gray-900">List of Categories</h1>
                    <p className="mt-4 max-w-xl text-sm text-gray-700">
                        Explore our carefully curated categories designed to help you find exactly what you need. Organize your store efficiently and
                        boost your productivity by managing these categories.
                    </p>
                </div>
                <div className="mt-4 sm:mt-0 sm:flex-none">
                    <Button onClick={() => setOpen(true)}>Add Category</Button>
                </div>
            </div>

            {/* Add Category Dialog */}
            <Dialog open={open} onOpenChange={setOpen}>
                <DialogContent>
                    <DialogHeader>
                        <DialogTitle>Add a category</DialogTitle>
                    </DialogHeader>
                    <div className="space-y-4">
                        <input
                            type="text"
                            name="name"
                            placeholder="Name of the category"
                            className="w-full rounded border p-2"
                            value={formData.name}
                            onChange={handleChange}
                        />
                    </div>
                    <DialogFooter>
                        <Button onClick={handleAddCategory} disabled={!formData.name.trim()}>
                            Save
                        </Button>
                    </DialogFooter>
                </DialogContent>
            </Dialog>

            {/* Confirm Delete Dialog */}
            <Dialog open={deleteDialogOpen} onOpenChange={setDeleteDialogOpen}>
                <DialogContent>
                    <DialogHeader>
                        <DialogTitle>Deletion confirmation</DialogTitle>
                    </DialogHeader>
                    <p className="text-sm text-gray-700">
                        Do you really want to delete the category?<strong>{selectedCategory?.name}</strong> ? This action is irreversible.
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

            {/* Table */}
            <div className="mt-8 flow-root">
                <div className="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div className="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                        <table className="min-w-full divide-y divide-gray-300">
                            <thead>
                                <tr>
                                    <th className="px-4 py-3.5 text-left text-sm font-semibold text-gray-900">Name</th>
                                    <th className="relative px-4 py-3.5 text-right text-sm font-medium text-gray-900">
                                        <span className="sr-only">Delete</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody className="divide-y divide-gray-200">
                                {categories.map((category) => (
                                    <tr key={category.id}>
                                        <td className="px-4 py-4 text-sm text-gray-900">{category.name}</td>
                                        <td className="px-4 py-4 text-right text-sm">
                                            <button onClick={() => confirmDelete(category)} className="text-red-600 hover:text-red-800">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                ))}
                                {categories.length === 0 && (
                                    <tr>
                                        <td colSpan={2} className="py-4 text-center text-gray-500">
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
