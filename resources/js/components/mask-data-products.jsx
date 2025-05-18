const maskproducts = [
    {
        uniqueId: 'mask-1',
        id: 9,
        name: 'MAsk',
        href: '',
        imageSrc: '/images/mask-ritual.webp',
        imageAlt: "Front of men's Basic Tee in black.",
        price: '$35',
        color: 'Black',
    },

    // More products...
].map((product) => ({
    ...product,
    href: `face/mask-details/${product.id}`,
}));

export default maskproducts;
