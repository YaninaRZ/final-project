// resources/js/Pages/ProductDetail.jsx (ou autre chemin)
import { Link, usePage } from '@inertiajs/react';
import posts from '../components/dataposts';
import GuestLayout from '../layouts/guest-layout';
export default function PostDetail() {
    const { id } = usePage().props;
    const postId = parseInt(id);
    const post = posts.find((p) => p.id === postId);

    if (!post) {
        return (
            <div className="p-6">
                <p>Post no non trouvé.</p>
                <Link href="/" className="text-blue-600 underline">
                    ← Retour
                </Link>
            </div>
        );
    }

    return (
        <GuestLayout>
            <div className="mx-auto flex max-w-7xl flex-col items-center space-x-8 px-6 py-10 md:flex-row">
                {/* Image section */}
                <div className="mb-6 flex w-full md:mb-0 md:w-1/2">
                    <img src={post.imageSrc} alt={post.imageAlt} className="w-full rounded-xl object-cover shadow-lg" />
                </div>

                {/* Text section */}
                <div className="w-full md:w-1/2">
                    <h1 className="text-3xl font-bold text-gray-900">{post.name}</h1>
                    <h2 className="mt-4 text-2xl font-semibold text-gray-500">{post.categories}</h2>
                    <p className="mt-4 text-xl text-gray-800">{post.description}</p>
                    <Link href="/" className="mt-6 inline-block text-blue-500 hover:text-blue-700">
                        ← Retour aux posts
                    </Link>
                </div>
            </div>
        </GuestLayout>
    );
}
