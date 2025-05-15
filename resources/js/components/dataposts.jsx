const posts = [
    {
        id: 1,
        name: 'Anti Acne Face Wash',
        href: '',
        description: 'THE best product.',
        imageSrc: '/images/cleanser.svg',
        categories: 'Cleanser',
    },
    {
        id: 2,
        name: 'Vitamin C Hand & Nail Cream',
        href: '',
        description: 'Vitamin C Hand & Nail Cream.',
        imageSrc: '/images/vitamin.png',
        categories: 'Serums',
    },
    {
        id: 3,
        name: 'Vitamin C Clay Face Mask',
        href: '',
        description: 'Vitamin C Clay Face Mask',
        imageSrc: '/images/coffee.svg',
        categories: 'Body Wash',
    },
].map((post) => ({
    ...post,
    href: `/postDetail/${post.id}`,
}));

export default posts;
