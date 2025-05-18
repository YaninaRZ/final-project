const products = [
    {
        uniqueId: 'cremes-1',
        id: 1,
        name: 'SKINN coffee mask',
        href: '',
        imageSrc: '/images/coffee.svg',
        imageAlt: "Front of men's Basic Tee in black.",
        price: '$35',
    },
    {
        uniqueId: 'cremes-2',
        id: 2,
        name: 'SKINN night cream',
        href: '',
        imageSrc: '/images/night-cream-skinn.svg',
        imageAlt: "Front of men's Basic Tee in black.",
        price: '$35',
    },

    // More products...
].map((product) => ({
    ...product,
    href: `face/creme-details/${product.id}`,
}));

export default products;
