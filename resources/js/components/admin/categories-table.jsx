import { Button } from '@/components/ui/button';
import { Dialog, DialogContent, DialogFooter, DialogHeader, DialogTitle } from '@/components/ui/dialog';
import { useForm, usePage } from '@inertiajs/react';
import { useState } from 'react';


export default function CategoriesTable() {
    const [open, setOpen] = useState(false);
    const [deleteDialogOpen, setDeleteDialogOpen] = useState(false);
    const [selectedCategory, setSelectedCategory] = useState(null);

    const confirmDelete = (category) => {
        setSelectedCategory(category);
        setDeleteDialogOpen(true);
    };

    ///////////////////////////////////////////////////////////////
    const { categories } = usePage().props;
    const { data, setData, post, processing, errors, reset, delete: deleteCategory } = useForm({
        name: '',
    });

    const submit = (e) => {
        e.preventDefault();
        post(route('categories.store'), {
            onFinish: () => {
                reset('name');
                setOpen(false);
            },
        });
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

    return (
        <div className="px-4 sm:px-6 lg:px-8">

            <div className="sm:flex sm:items-center sm:justify-end">
                <div className="mt-4 sm:mt-0 sm:flex-none">
                    <Button onClick={() => setOpen(true)}>Add Category</Button>
                </div>
            </div>


            <Dialog open={open} onOpenChange={setOpen}>
                <DialogContent>
                    <DialogHeader>
                        <DialogTitle>Add a category</DialogTitle>
                    </DialogHeader>

                    <form onSubmit={submit} className="space-y-4">
                        <input
                            type="text"
                            name="name"
                            value={data.name}
                            onChange={(e) => setData('name', e.target.value)}
                            className="w-full rounded border p-2"
                        />
                        {errors.name && <p className="text-red-500 text-sm">{errors.name}</p>}

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
