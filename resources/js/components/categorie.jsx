import { Link } from '@inertiajs/react';

export default function Categorie() {
    return (
        <>
            <div className="mb-100 grid min-h-full grid-cols-1 lg:grid-cols-3">
                <div className="relative flex h-[500px]">
                    <img alt="" src="images/bodywash.svg" className="absolute inset-0 h-full w-full object-cover" />
                    <div className="relative flex w-full flex-col items-start justify-end bg-black/40 p-8 sm:p-12">
                        <p className="mt-1 text-2xl font-medium text-white">Body Wash</p>
                        <Link
                            href="/shop-all#body-wash"
                            className="mt-4 rounded-md bg-white px-4 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-50"
                        >
                            Shop now
                        </Link>
                    </div>
                </div>

                <div className="relative flex h-[500px]">
                    <img alt="" src="images/facewash.svg" className="absolute inset-0 h-full w-full object-cover" />
                    <div className="relative flex w-full flex-col items-start justify-end bg-black/40 p-8 sm:p-12">
                        <p className="mt-1 text-2xl font-medium text-white">Face Wash</p>
                        <Link
                            href="/shop-all#face-wash"
                            className="mt-4 rounded-md bg-white px-4 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-50"
                        >
                            Shop now
                        </Link>
                    </div>
                </div>

                <div className="relative flex h-[500px]">
                    <img alt="" src="images/cleanserwash.svg" className="absolute inset-0 h-full w-full object-cover" />
                    <div className="relative flex w-full flex-col items-start justify-end bg-black/40 p-8 sm:p-12">
                        <p className="mt-1 text-2xl font-medium text-white">Cleanser</p>
                        <Link
                            href="/shop-all#cleanser"
                            className="mt-4 rounded-md bg-white px-4 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-50"
                        >
                            Shop now
                        </Link>
                    </div>
                </div>
            </div>
        </>
    );
}
