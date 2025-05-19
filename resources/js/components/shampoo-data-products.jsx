const hairproducts = [
    {
        uniqueId: 'shampoo-1',
        id: 1,
        name: 'Sakura shampoo',
        href: '',
        imageSrc: '/images/shampoo-sakura.webp',
        imageAlt: "Front of men's Basic Tee in black.",
        price: '$35',
        description:
            'Infuse your hair with the delicate scent of cherry blossoms. This gentle shampoo cleanses deeply while nourishing each strand, leaving your hair soft, shiny, and beautifully fragrant.',
    },

    // More products...
].map((product) => ({
    ...product,
    href: route('shampoo-details', { id: product.id }),
}));

export default hairproducts;
