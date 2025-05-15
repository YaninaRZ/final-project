import { Button } from '@/components/ui/button';
import { Dialog, DialogContent, DialogFooter, DialogHeader, DialogTitle } from '@/components/ui/dialog';
import { useState } from 'react';
import people from './client-data';

export default function Table() {
    const [open, setOpen] = useState(false);
    const [deleteDialogOpen, setDeleteDialogOpen] = useState(false);
    const [selectedUser, setSelectedUser] = useState(null);
    const [formData, setFormData] = useState({
        name: '',
        title: '',
        email: '',
    });
    // State local pour gérer la liste des utilisateurs
    const [users, setUsers] = useState(people);

    const handleChange = (e) => {
        setFormData({ ...formData, [e.target.name]: e.target.value });
    };

    const handleAddUser = () => {
        const newUser = {
            name: formData.name,
            title: formData.title,
            email: formData.email,
            role: 'Member', // tu peux adapter si besoin
        };
        setUsers([...users, newUser]); // Ajout dans le state local
        setFormData({ name: '', title: '', email: '' }); // Reset formulaire
        setOpen(false);
    };

    const confirmDelete = (user) => {
        setSelectedUser(user);
        setDeleteDialogOpen(true);
    };

    const handleDeleteUser = () => {
        setUsers(users.filter((user) => user.email !== selectedUser.email)); // Supprime par email
        setDeleteDialogOpen(false);
    };

    return (
        <div className="px-4 sm:px-6 lg:px-8">
            {/* Header */}
            <div className="sm:flex sm:items-center sm:justify-between">
                <div className="max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
                    <h1 className="text-3xl font-bold tracking-tight text-gray-900">List of Clients</h1>
                    <p className="mt-4 max-w-xl text-sm text-gray-700">
                        Manage your client database efficiently and keep track of all essential information. Our tools help you maintain strong
                        relationships and deliver the best service to your valued clients.
                    </p>
                </div>
                <div className="mt-4 sm:mt-0 sm:flex-none">
                    <Button onClick={() => setOpen(true)}>Add Client</Button>
                </div>
            </div>

            {/* Add User Dialog */}
            <Dialog open={open} onOpenChange={setOpen}>
                <DialogContent>
                    <DialogHeader>
                        <DialogTitle>Add a New User</DialogTitle>
                    </DialogHeader>
                    <div className="space-y-4">
                        <input
                            type="text"
                            name="name"
                            placeholder="Name"
                            className="w-full rounded border p-2"
                            value={formData.name}
                            onChange={handleChange}
                        />
                        <input
                            type="text"
                            name="title"
                            placeholder="Title"
                            className="w-full rounded border p-2"
                            value={formData.title}
                            onChange={handleChange}
                        />
                        <input
                            type="email"
                            name="email"
                            placeholder="Email"
                            className="w-full rounded border p-2"
                            value={formData.email}
                            onChange={handleChange}
                        />
                    </div>
                    <DialogFooter>
                        <Button onClick={handleAddUser} disabled={!formData.name || !formData.title || !formData.email}>
                            Save
                        </Button>
                    </DialogFooter>
                </DialogContent>
            </Dialog>

            {/* Confirm Delete Dialog */}
            <Dialog open={deleteDialogOpen} onOpenChange={setDeleteDialogOpen}>
                <DialogContent>
                    <DialogHeader>
                        <DialogTitle>Are you sure?</DialogTitle>
                    </DialogHeader>
                    <p className="text-sm text-gray-700">
                        Are you sure you want to delete <strong>{selectedUser?.name}</strong>? This action cannot be undone.
                    </p>
                    <DialogFooter>
                        <Button variant="outline" onClick={() => setDeleteDialogOpen(false)}>
                            Cancel
                        </Button>
                        <Button variant="destructive" onClick={handleDeleteUser}>
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
                                    <th className="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Title</th>
                                    <th className="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Email</th>
                                    <th className="relative px-4 py-3.5 text-right text-sm font-medium text-gray-900">
                                        <span className="sr-only">delete</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody className="divide-y divide-gray-200">
                                {users.map((person) => (
                                    <tr key={person.email}>
                                        <td className="px-4 py-4 text-sm text-gray-900">{person.name}</td>
                                        <td className="px-3 py-4 text-sm text-gray-500">{person.title}</td>
                                        <td className="px-3 py-4 text-sm text-gray-500">{person.email}</td>
                                        <td className="px-4 py-4 text-right text-sm">
                                            <button onClick={() => confirmDelete(person)} className="text-red-600 hover:text-red-800">
                                                delete
                                            </button>
                                        </td>
                                    </tr>
                                ))}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    );
}
