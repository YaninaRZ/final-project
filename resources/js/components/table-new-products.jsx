const products = [
    {
        id: 1,
        name: 'Anti Acne Face Wash',
        price: '$48',
        imageSrc: '/images/cleanser.svg',
        imageAlt: 'Tall slender porcelain bottle with natural clay textured body and cork stopper.',
    },
    {
        id: 2,
        name: 'Vitamin C Hand & Nail Cream',
        price: '$35',
        imageSrc: '/images/vitamin.png',
        imageAlt: 'Olive drab green insulated bottle with flared screw lid and flat top.',
    },

    {
        id: 3,
        name: 'Vitamin C Clay Face Mask',
        href: ``,
        price: '$89',
        imageSrc: '/images/coffee.svg',
        imageAlt: 'Person using a pen to cross a task off a productivity paper card.',
    },
    {
        id: 4,
        name: '10 In 1 Active Miracle',
        href: ``,
        price: '$35',
        imageSrc: '/images/miracle.svg',
        imageAlt: 'Hand holding black machined steel mechanical pencil with brass tip and top.',
    },
    {
        id: 5,
        name: 'Anti Acne Face Wash',
        href: ``,
        price: '$48',
        imageSrc: '/images/cleanser.svg',
        imageAlt: 'Tall slender porcelain bottle with natural clay textured body and cork stopper.',
    },
    {
        id: 6,
        name: 'Vitamin C Hand & Nail Cream',
        href: ``,
        price: '$35',
        imageSrc: '/images/vitamin.png',
        imageAlt: 'Olive drab green insulated bottle with flared screw lid and flat top.',
    },
    {
        id: 7,
        name: 'Vitamin C Clay Face Mask',
        href: ``,
        price: '$89',
        imageSrc: '/images/coffee.svg',
        imageAlt: 'Person using a pen to cross a task off a productivity paper card.',
    },
    {
        id: 8,
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

export default products;
