import { Link } from '@inertiajs/react';

export default function Selection() {
    return (
        <div className="bg-white">
            <div className="px-6 py-24 sm:px-6 sm:py-32 lg:px-8">
                <div className="mx-auto max-w-2xl text-center">
                    {/* Titre 1 avec le style du HeroHeading */}
                    <h1 className="mb-6 text-6xl leading-[98px] text-black max-md:text-6xl max-sm:text-5xl">New</h1>
                    {/* Titre 3 avec le style du HeroHeading */}
                    {/* <h2 className="mb-6 text-9xl leading-[112px] rotate-[-5.079deg] text-stone-600 max-md:text-9xl max-sm:text-8xl">
              Selection
            </h2> */}
                    <p className="mx-auto mt-6 max-w-xl text-lg/8 text-pretty text-gray-600">
                        At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos
                        dolores et quas molestias excepturi.
                    </p>
                    <div className="mt-10 flex items-center justify-center gap-x-6">
                        <Link
                            href="shop-all"
                            className="w-full rounded-md border border-solid border-stone-300 bg-stone-200 px-6 py-3.5 transition-colors hover:bg-stone-300"
                        >
                            Shop all
                        </Link>
                    </div>
                </div>
            </div>
        </div>
    );
}
