import { Button } from '@/components/ui/button';
import { Dialog, DialogContent, DialogFooter, DialogHeader, DialogTitle } from '@/components/ui/dialog';
import { useState } from 'react';
import { useForm } from '@inertiajs/react';
import InputError from '@/components/input-error';

export default function Table({ clients }) {
    const [open, setOpen] = useState(false);
    const [deleteDialogOpen, setDeleteDialogOpen] = useState(false);
    const [selectedUser, setSelectedUser] = useState(null);

    ///////////////////////////////////////////////////////////////////////////


    const { data, setData, post, processing, errors, reset, delete: deleteUser } = useForm({
        name: '',
        email: '',
        password: '',
    });

    const submit = (e) => {
        e.preventDefault();
        post(route('client.store'), {
            onFinish: () => {
                reset('email');
                reset('password');
                reset('name');
                setOpen(false);
            },
        });
    };

    const handleDeleteUser = () => {
        if (!selectedUser) return;

        deleteUser(route('client.destroy', selectedUser.id), {
            onFinish: () => {
                setDeleteDialogOpen(false);
                setSelectedUser(null);
            },
        });
    };

    ////////////////////////////////////////////////////////////////////:

    return (
        <div className="px-4 sm:px-6 lg:px-8">

            <div className="flex justify-end">
                <div>
                    <Button onClick={() => setOpen(true)}>Add Client</Button>
                </div>
            </div>

            <Dialog open={open} onOpenChange={setOpen}>
                <DialogContent>
                    <form className="flex flex-col gap-6" onSubmit={submit}>
                        <DialogHeader>
                            <DialogTitle>Add a New User</DialogTitle>
                        </DialogHeader>
                        <div className="space-y-4">
                            <input
                                type="text"
                                name="name"
                                placeholder="Name"
                                className="w-full rounded border p-2"
                                value={data.name}
                                onChange={(e) => setData('name', e.target.value)}
                            />
                            <InputError message={errors.name} />

                            <input
                                type="email"
                                name="email"
                                placeholder="Email"
                                className="w-full rounded border p-2"
                                value={data.email}
                                onChange={(e) => setData('email', e.target.value)}
                            />
                            <InputError message={errors.email} />
                            <input
                                type="password"
                                name="password"
                                placeholder="Password"
                                className="w-full rounded border p-2"
                                value={data.password}
                                onChange={(e) => setData('password', e.target.value)}
                            />
                            <InputError message={errors.password} />
                        </div>
                        <DialogFooter>
                            <Button type="submit" disabled={!data.name || !data.password || !data.email}>
                                Save
                            </Button>
                        </DialogFooter>
                    </form>
                </DialogContent>
            </Dialog>


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
                                {clients.map((person) => (
                                    <tr key={person.email}>
                                        <td className="px-4 py-4 text-sm text-gray-900">{person.name}</td>
                                        <td className="px-3 py-4 text-sm text-gray-500">{person.title}</td>
                                        <td className="px-3 py-4 text-sm text-gray-500">{person.email}</td>
                                        <td className="px-4 py-4 text-right text-sm">
                                            <button
                                                onClick={() => {
                                                    setSelectedUser(person);
                                                    setDeleteDialogOpen(true);
                                                }}
                                                className="text-red-600 hover:text-red-800"
                                            >
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
