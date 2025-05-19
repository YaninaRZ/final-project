const products = [
    {
        uniqueId: 'cremes-1',
        id: 1,
        name: 'SKINN coffee mask',
        href: '',
        imageSrc: '/images/coffee.svg',
        imageAlt: "Front of men's Basic Tee in black.",
        price: '$35',
        description:
            'Awaken your skin with the energizing power of coffee! This revitalizing mask gently exfoliates and deeply nourishes, leaving your face refreshed, smooth, and glowing. Perfect for a natural boost anytime you need a pick-me-up.',
    },
    {
        uniqueId: 'cremes-2',
        id: 2,
        name: 'SKINN night cream',
        href: '',
        imageSrc: '/images/night-cream-skinn.svg',
        imageAlt: "Front of men's Basic Tee in black.",
        price: '$35',
        description:
            'Nourish and restore your skin overnight with SKINN Night Cream. Its rich, hydrating formula works while you sleep to deeply moisturize, reduce signs of fatigue, and leave your skin feeling soft and rejuvenated by morning.',
    },

    // More products...
].map((product) => ({
    ...product,
    href: `face/creme-details/${product.id}`,
}));

export default products;
