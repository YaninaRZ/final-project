const tableproducts = [
    {
        uniqueId: 'table-1',
        id: 13,
        name: 'Anti Acne Face Wash',
        href: ``,
        price: '$48',
        imageSrc: '/images/cleanser.svg',
        imageAlt: 'Tall slender porcelain bottle with natural clay textured body and cork stopper.',
    },
    {
        uniqueId: 'table-2',
        id: 14,
        name: 'Vitamin C Hand & Nail Cream',
        href: ``,
        price: '$35',
        imageSrc: '/images/vitamin.png',
        imageAlt: 'Olive drab green insulated bottle with flared screw lid and flat top.',
    },
    {
        uniqueId: 'table-3',
        id: 15,
        name: 'Vitamin C Clay Face Mask',
        href: ``,
        price: '$89',
        imageSrc: '/images/coffee.svg',
        imageAlt: 'Person using a pen to cross a task off a productivity paper card.',
    },
    {
        uniqueId: 'table-4',
        id: 16,
        name: '10 In 1 Active Miracle',
        href: ``,
        price: '$35',
        imageSrc: '/images/miracle.svg',
        imageAlt: 'Hand holding black machined steel mechanical pencil with brass tip and top.',
    },
].map((product) => ({
    ...product,
    href: `/productDetail/${product.id}`,
}));

export default tableproducts;
