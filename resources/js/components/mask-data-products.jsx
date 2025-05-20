const maskproducts = [
    {
        uniqueId: 'mask-1',
        id: 9,
        name: 'Mask',
        href: '',
        imageSrc: '/images/mask-ritual.webp',
        imageAlt: "Front of men's Basic Tee in black.",
        category: 'masks',
        categoryTitle: 'Masks',
        price: '$35',
        color: 'Black',
        description:
            'Experience the ultimate skincare ritual with this revitalizing mask. Designed to cleanse, hydrate, and refresh your skin, it’s the perfect addition to your self-care routine for a radiant, healthy glow.',
    },

    // More products...
].map((product) => ({
    ...product,
    href: `face/mask-details/${product.id}`,
}));

export default maskproducts;
