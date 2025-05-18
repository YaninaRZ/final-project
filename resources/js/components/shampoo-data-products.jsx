const hairproducts = [
    {
        uniqueId: 'shampoo-1',
        id: 1,
        name: 'Sakura shampoo',
        href: '',
        imageSrc: '/images/shampoo-sakura.webp',
        imageAlt: "Front of men's Basic Tee in black.",
        price: '$35',
        color: 'Black',
    },

    // More products...
].map((product) => ({
    ...product,
    href: route('shampoo-details', { id: product.id }),
}));

export default hairproducts;
