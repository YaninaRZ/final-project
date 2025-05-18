const arrivalsproducts = [
    {
        uniqueId: 'arrivals-1',
        id: 1,
        name: 'Cream Forte',
        href: '',
        imageSrc: '/images/cream-forte.avif',
        imageAlt: 'Pink product.',
        price: '$35',
        color: 'Black',
    },
    {
        uniqueId: 'arrivals-2',
        id: 2,
        name: 'Basic Tee',
        href: '',
        imageSrc: '/images/product-beige.avif',
        imageAlt: 'Regenarative cream.',
        price: '$35',
        color: 'Black',
    },

    {
        uniqueId: 'arrivals-3',
        id: 3,
        name: 'SPF',
        href: '',
        imageSrc: '/images/spf.avif',
        imageAlt: 'Mosturise your skinn.',
        price: '$35',
        color: 'Black',
    },
    {
        uniqueId: 'arrivals-4',
        id: 4,
        name: 'Soap',
        href: '',
        imageSrc: '/images/soap.avif',
        imageAlt: 'Soap.',
        price: '$35',
        color: 'Black',
    },

    // More products...
].map((product) => ({
    ...product,
    href: `arrivals-details/${product.id}`,
}));

export default arrivalsproducts;
