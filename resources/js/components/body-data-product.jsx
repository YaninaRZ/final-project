const bodyproducts = [
    {
        uniqueId: 'body-1',
        id: 5,
        name: 'The ritual of Sakura',
        href: '',
        imageSrc: '/images/body-cream-white.webp',
        imageAlt: 'Soft, silky skin with nourishing rice milk and cherry blossom.',
        price: '$35',
        color: 'Black',
        description:
            'Immerse your skin in the delicate aroma of cherry blossoms with this light, hydrating cream that leaves skin radiant and smooth.',
    },
    {
        uniqueId: 'body-2',
        id: 6,
        name: 'The ritual of Mehr',
        href: '',
        imageSrc: '/images/body-cream-yellow.webp',
        imageAlt: 'Brighten your skin with our nourishing Mehr body cream.',
        price: '$35',
        color: 'Black',
        description:
            'Energize your skin daily with Mehr’s vibrant formula, packed with nourishing ingredients that refresh and revitalize your body.',
    },
    {
        uniqueId: 'body-3',
        id: 7,
        name: 'The ritual of Yozakura',
        href: '',
        imageSrc: '/images/rich-body-cream.webp',
        imageAlt: 'Rich hydration with the Yozakura body cream for deep nourishment.',
        price: '$35',
        color: 'Black',
        description:
            'Experience deep hydration with the luxurious Yozakura cream, crafted to soothe and restore your skin’s natural softness overnight.',
    },
    {
        uniqueId: 'body-4',
        id: 8,
        name: 'The dream collection',
        href: '',
        imageSrc: '/images/purple-body-cream.webp',
        imageAlt: 'Indulge in dreamy softness with our signature body cream.',
        price: '$35',
        color: 'Black',
        description: 'Wrap your skin in velvety softness with The Dream Collection, a rich body cream designed to nourish and pamper every inch.',
    },
].map((product) => ({
    ...product,
    href: `body/body-details/${product.id}`,
}));

export default bodyproducts;
