const tableproducts = [
    {
        uniqueId: 'table-1',
        id: 13,
        name: 'Anti Acne Face Wash',
        price: '$48',
        imageSrc: '/images/cleanser.svg',
        imageAlt: 'Tall slender porcelain bottle with natural clay textured body and cork stopper.',
        description: 'A refreshing face wash designed to deeply cleanse and balance oily skin while preventing acne breakouts.',
    },
    {
        uniqueId: 'table-2',
        id: 14,
        name: 'Vitamin C Hand & Nail Cream',
        price: '$35',
        imageSrc: '/images/vitamin.png',
        imageAlt: 'Olive drab green insulated bottle with flared screw lid and flat top.',
        description: 'Nourish and protect your hands and nails with this vitamin-rich cream that leaves skin soft and radiant.',
    },
    {
        uniqueId: 'table-3',
        id: 15,
        name: 'Vitamin C Clay Face Mask',
        price: '$89',
        imageSrc: '/images/coffee.svg',
        imageAlt: 'Person using a pen to cross a task off a productivity paper card.',
        description: 'A detoxifying clay mask infused with Vitamin C to brighten and purify your skin for a smoother complexion.',
    },
    {
        uniqueId: 'table-4',
        id: 16,
        name: '10 In 1 Active Miracle',
        price: '$35',
        imageSrc: '/images/miracle.svg',
        imageAlt: 'Hand holding black machined steel mechanical pencil with brass tip and top.',
        description: 'A powerful multi-benefit formula that revitalizes dull skin, promoting elasticity and hydration in one step.',
    },
].map((product) => ({
    ...product,
    href: `/productDetail/${product.id}`,
}));

export default tableproducts;
