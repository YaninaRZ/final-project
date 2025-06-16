import { Link } from '@inertiajs/react';

export default function HeroSection() {
    return (
        <div className="bg-white-900 relative h-screen">
            <div className="relative h-80 overflow-hidden bg-indigo-600 md:absolute md:left-0 md:h-full md:w-1/3 lg:w-1/2">
                <img alt="" src="/images/product-with-model.webp" className="size-full object-cover" />
                <svg viewBox="0 0 926 676" aria-hidden="true" className="absolute -bottom-24 left-24 w-[57.875rem] transform-gpu blur-[118px]">
                    <path
                        d="m254.325 516.708-90.89 158.331L0 436.427l254.325 80.281 163.691-285.15c1.048 131.759 36.144 345.144 168.149 144.613C751.171 125.508 707.17-93.823 826.603 41.15c95.546 107.978 104.766 294.048 97.432 373.585L685.481 297.694l16.974 360.474-448.13-141.46Z"
                        fill="url(#60c3c621-93e0-4a09-a0e6-4c228a0116d8)"
                        fillOpacity=".4"
                    />
                    <defs>
                        <linearGradient
                            id="60c3c621-93e0-4a09-a0e6-4c228a0116d8"
                            x1="926.392"
                            x2="-109.635"
                            y1=".176"
                            y2="321.024"
                            gradientUnits="userSpaceOnUse"
                        >
                            <stop stopColor="#776FFF" />
                            <stop offset={1} stopColor="#FF4694" />
                        </linearGradient>
                    </defs>
                </svg>
            </div>
            <div className="relative mx-auto max-w-7xl py-24 sm:py-32 lg:px-8 lg:py-40">
                <div className="pr-6 pl-6 md:ml-auto md:w-2/3 md:pl-16 lg:w-1/2 lg:pr-0 lg:pl-24 xl:pl-32">
                    <p className="text-black-500 mt-2 text-4xl font-semibold tracking-tight sm:text-5xl">Discover The Beauty Within</p>
                    <div className="mt-8">

                        <Link href={route('collection')} className="w-full rounded-md border border-solid border-stone-300 bg-stone-200 px-16 py-3.5">
                            View collection
                        </Link>
                    </div>
                </div>
            </div>
        </div>
    );
}
