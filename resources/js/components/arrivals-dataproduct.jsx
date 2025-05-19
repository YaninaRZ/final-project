const arrivalsproducts = [
    {
        uniqueId: 'arrivals-1',
        id: 1,
        name: 'Cream Forte',
        href: '',
        imageSrc: '/images/cream-forte.avif',
        imageAlt: 'Pink product.',
        price: '$35',

        description:
            'Power up your skincare routine with Cream Forte, a rich formula designed to deeply nourish and strengthen your skin’s natural barrier.',
    },
    {
        uniqueId: 'arrivals-2',
        id: 2,
        name: 'Basic Tee',
        href: '',
        imageSrc: '/images/product-beige.avif',
        imageAlt: 'Regenerative cream.',
        price: '$35',

        description: 'Effortless comfort meets style in our Basic Tee—crafted from soft, breathable fabric for everyday wear with a modern touch.',
    },
    {
        uniqueId: 'arrivals-3',
        id: 3,
        name: 'SPF',
        href: '',
        imageSrc: '/images/spf.avif',
        imageAlt: 'Moisturize your skin.',
        price: '$35',

        description: 'Protect and hydrate with our lightweight SPF, providing broad-spectrum defense while keeping your skin soft and nourished.',
    },
    {
        uniqueId: 'arrivals-4',
        id: 4,
        name: 'Soap',
        href: '',
        imageSrc: '/images/soap.avif',
        imageAlt: 'Soap.',
        price: '$35',

        description: 'Cleanse gently with our soothing soap, crafted to refresh your skin without stripping natural moisture.',
    },
].map((product) => ({
    ...product,
    href: `arrivals-details/${product.id}`,
}));

export default arrivalsproducts;
