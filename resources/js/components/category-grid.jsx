import { Link } from '@inertiajs/react';

export default function CategoryGrid() {
    return (
        <div className="mb-100 grid min-h-full grid-cols-1 lg:grid-cols-3">

            {/* Body Wash */}
            <div className="relative flex h-[500px] items-center justify-center">
                <img
                    alt="Body Wash"
                    src="images/bodywash.svg"
                    className="absolute inset-0 h-full w-full object-cover"
                />
                <div className="absolute inset-0 bg-black/30" />
                <Link
                    href={route('products.category', { category: 'gel' })}
                    className="relative flex h-40 w-40 items-center justify-center border border-white text-white text-sm tracking-wide transition hover:bg-white hover:text-black"
                >
                    BODY WASH
                </Link>
            </div>

            {/* Face Wash */}
            <div className="relative flex h-[500px] items-center justify-center">
                <img
                    alt="Face Wash"
                    src="images/facewash.svg"
                    className="absolute inset-0 h-full w-full object-cover"
                />
                <div className="absolute inset-0 bg-black/30" />
                <Link
                    href={route('products.category', { category: 'masks' })}
                    className="relative flex h-40 w-40 items-center justify-center border border-white text-white text-sm tracking-wide transition hover:bg-white hover:text-black"
                >
                    FACE WASH
                </Link>
            </div>

            {/* Cleanser */}
            <div className="relative flex h-[500px] items-center justify-center">
                <img
                    alt="Cleanser"
                    src="images/cleanserwash.svg"
                    className="absolute inset-0 h-full w-full object-cover"
                />
                <div className="absolute inset-0 bg-black/30" />
                <Link
                    href={route('products.category', { category: 'face cleanser' })}
                    className="relative flex h-40 w-40 items-center justify-center border border-white text-white text-sm tracking-wide transition hover:bg-white hover:text-black"
                >
                    CLEANSER
                </Link>
            </div>

        </div>
    );
}
