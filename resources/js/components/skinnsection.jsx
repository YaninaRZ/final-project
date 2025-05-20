import { Link } from '@inertiajs/react';

export default function Skinn() {
    return (
        <div className="bg-white">
            <div className="px-6 py-24 sm:px-6 sm:py-32 lg:px-8">
                <div className="mx-auto max-w-2xl text-center">

                    <h1 className="mb-6 text-6xl leading-[98px] text-black max-md:text-6xl max-sm:text-5xl">Natural and</h1>

                    <h2 className="mb-6 text-7xl leading-[98px] text-black max-md:text-6xl max-sm:text-5xl">certified organic</h2>

                    <p className="mx-auto mt-6 max-w-xl text-lg/8 text-pretty text-gray-600">
                        At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos
                        dolores et quas molestias excepturi.
                    </p>
                    <div className="mt-10 flex items-center justify-center gap-x-6">
                        <Link href="/products" className="w-full rounded-md border border-solid border-stone-300 bg-stone-200 px-16 py-3.5">
                            Shop all
                        </Link>
                    </div>
                </div>
            </div>
        </div>
    );
}
