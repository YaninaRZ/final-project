const features = [
    {
        name: 'THE SECRET OF SKINN SKINCARE',
        description:
            'Directly inspired by biomimicry, our skincare products enhance the active ingredients and natural mechanisms present in the skin, restoring its natural function. Perfectly compatible, they ensure amplified performance and healthier skin. Furthermore, our scientific committee, composed of dermatologists and skin experts, validates the effectiveness and safety of all our skincare products.',
        imageSrc: '/images/coffee.svg',
        imageAlt: 'White canvas laptop sleeve with gray felt interior, silver zipper, and tan leather zipper pull.',
    },
    {
        name: 'THE SECRET OF SKINN',
        description:
            'Directly inspired by biomimicry, our skincare products enhance the active ingredients and natural mechanisms present in the skin, restoring its natural function. Perfectly compatible, they ensure amplified performance and healthier skin. Furthermore, our scientific committee, composed of dermatologists and skin experts, validates the effectiveness and safety of all our skincare products.',
        imageSrc: '/images/miracle.svg',
        imageAlt: 'Detail of zipper pull with tan leather and silver rivet.',
    },
];

function classNames(...classes) {
    return classes.filter(Boolean).join(' ');
}

export default function HeroSection() {
    return (
        <div className="bg-white">
            <div className="mx-auto max-w-2xl px-4 py-24 sm:px-6 sm:py-32 lg:max-w-7xl lg:px-8">
                <div className="mx-auto max-w-3xl text-center">
                    <h2 className="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Healthy skin, wildly you</h2>
                </div>

                <div className="mt-16 space-y-16">
                    {features.map((feature, featureIdx) => (
                        <div key={feature.name} className="flex flex-col-reverse lg:grid lg:grid-cols-12 lg:items-center lg:gap-x-8">
                            <div
                                className={classNames(
                                    featureIdx % 2 === 0 ? 'lg:col-start-1' : 'lg:col-start-8 xl:col-start-9',
                                    'mt-6 lg:col-span-5 lg:row-start-1 lg:mt-0 xl:col-span-4',
                                )}
                            >
                                <h3 className="text-lg font-medium text-gray-900">{feature.name}</h3>
                                <p className="mt-2 text-sm text-gray-500">{feature.description}</p>
                            </div>
                            <div
                                className={classNames(
                                    featureIdx % 2 === 0 ? 'lg:col-start-6 xl:col-start-5' : 'lg:col-start-1',
                                    'flex-auto lg:col-span-7 lg:row-start-1 xl:col-span-8',
                                )}
                            >
                                <img
                                    alt={feature.imageAlt}
                                    src={feature.imageSrc}
                                    className="aspect-5/2 w-full rounded-lg bg-gray-100 object-cover"
                                />
                            </div>
                        </div>
                    ))}
                </div>
            </div>
        </div>
    );
}
