const products = [
    {
        uniqueId: 'cremes-1',
        id: 1,
        name: 'Basic Tee',
        href: '',
        imageSrc: 'https://tailwindcss.com/plus-assets/img/ecommerce-images/product-page-01-related-product-01.jpg',
        imageAlt: "Front of men's Basic Tee in black.",
        price: '$35',
        color: 'Black',
    },
    {
        uniqueId: 'cremes-2',
        id: 2,
        name: 'Basic Tee',
        href: '',
        imageSrc: 'https://tailwindcss.com/plus-assets/img/ecommerce-images/product-page-01-related-product-01.jpg',
        imageAlt: "Front of men's Basic Tee in black.",
        price: '$35',
        color: 'Black',
    },
    {
        uniqueId: 'cremes-3',
        id: 3,
        name: 'Basic Tee',
        href: '',
        imageSrc: 'https://tailwindcss.com/plus-assets/img/ecommerce-images/product-page-01-related-product-01.jpg',
        imageAlt: "Front of men's Basic Tee in black.",
        price: '$35',
        color: 'Black',
    },
    {
        uniqueId: 'cremes-4',
        id: 4,
        name: 'Basic Tee',
        href: '',
        imageSrc: 'https://tailwindcss.com/plus-assets/img/ecommerce-images/product-page-01-related-product-01.jpg',
        imageAlt: "Front of men's Basic Tee in black.",
        price: '$35',
        color: 'Black',
    },
    // More products...
].map((product) => ({
    ...product,
    href: `face/creme-details/${product.id}`,
}));

export default products;
