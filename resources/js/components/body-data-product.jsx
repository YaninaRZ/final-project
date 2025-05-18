const bodyproducts = [
    {
        uniqueId: 'body-1',
        id: 5,
        name: 'The ritual of Sakura',
        href: '',
        imageSrc: '/images/body-cream-white.webp',
        imageAlt:
            'Enjoy soft, silky skin every day with our favorite body cream. Its rich, non-sticky formula contains nourishing rice milk and cherry blossom with refreshing notes.',
        price: '$35',
        color: 'Black',
    },
    {
        uniqueId: 'body-2',
        id: 6,
        name: 'The ritual of Mehr',
        href: '',
        imageSrc: '/images/body-cream-yellow.webp',
        imageAlt:
            'Enjoy soft, silky skin every day with our favorite body cream. Its rich, non-sticky formula contains nourishing rice milk and cherry blossom with refreshing notes.',
        price: '$35',
        color: 'Black',
    },
    {
        uniqueId: 'body-3',
        id: 7,
        name: 'The ritual of Yozakura',
        href: '',
        imageSrc: '/images/rich-body-cream.webp',
        imageAlt:
            'Enjoy soft, silky skin every day with our favorite body cream. Its rich, non-sticky formula contains nourishing rice milk and cherry blossom with refreshing notes.',
        price: '$35',
        color: 'Black',
    },
    {
        uniqueId: 'body-4',
        id: 8,
        name: 'The dream colelction',
        href: '',
        imageSrc: '/images/purple-body-cream.webp',
        imageAlt:
            'Enjoy soft, silky skin every day with our favorite body cream. Its rich, non-sticky formula contains nourishing rice milk and cherry blossom with refreshing notes.',
        price: '$35',
        color: 'Black',
    },
    // More products...
].map((product) => ({
    ...product,
    href: `body/body-details/${product.id}`,
}));

export default bodyproducts;
