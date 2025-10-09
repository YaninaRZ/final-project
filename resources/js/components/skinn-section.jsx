import { Link } from '@inertiajs/react';

export default function SkinnSection() {
    return (
        <div className="bg-white">
            <div className="px-6 py-24 sm:px-6 sm:py-32 lg:px-8">
                <div className="mx-auto max-w-2xl text-center">

                    {/* Premier titre */}
                    <h1 className="mb-0 text-6xl leading-[70px] font-light text-black max-md:text-5xl max-md:leading-[55px]  max-sm:text-4xl max-sm:leading-[45px]">
                        Natural and
                    </h1>

                    {/* Deuxième titre */}
                    <h2 className="mb-4 text-6xl leading-[70px] font-light text-black max-md:text-5xl max-md:leading-[55px] max-sm:text-4xl max-sm:leading-[45px]">
                        certified organic
                    </h2>


                    {/* Troisième titre avec Style Script */}
                    <h3 className="mb-6 font-style text-[80px] leading-[48px] sm:text-[90px] sm:leading-[70px] lg:text-[137px] lg:leading-[112px] text-[#68513F] text-center">
                        Skincare
                    </h3>


                    {/* Description */}
                    <p className="mx-auto mt-6 max-w-xl text-lg/8 text-pretty text-gray-600">
                        At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis
                        praesentium voluptatum deleniti atque corrupti quos dolores et quas
                        molestias excepturi.
                    </p>

                    {/* Bouton */}
                    <div className="mt-10 flex items-center justify-center gap-x-6">
                        <Link
                            href="/products"
                            className="w-full rounded-md border border-solid border-stone-300 bg-stone-200 px-16 py-3.5"
                        >
                            Shop all
                        </Link>
                    </div>
                </div>
            </div>
        </div>
    );
}
