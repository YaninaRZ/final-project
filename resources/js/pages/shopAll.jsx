import { ProductSection } from '@/components/product-section';
import GuestLayout from '../layouts/guest-layout';

const faceCareProducts = [
    {
        image: 'https://cdn.builder.io/api/v1/image/assets/6748326f477a456b9e05ce0199194608/d4e65699b933d120a50b52958c9f280d15c32200?placeholderIfAbsent=true',
        title: 'Facial Cleanser',
        price: '$29.99',
    },
    {
        image: 'https://cdn.builder.io/api/v1/image/assets/6748326f477a456b9e05ce0199194608/d4e65699b933d120a50b52958c9f280d15c32200?placeholderIfAbsent=true',
        title: 'Facial Cleanser',
        price: '$29.99',
    },
    {
        image: 'https://cdn.builder.io/api/v1/image/assets/6748326f477a456b9e05ce0199194608/d4e65699b933d120a50b52958c9f280d15c32200?placeholderIfAbsent=true',
        title: 'Facial Cleanser',
        price: '$29.99',
    },
];

const bodyCareProducts = [
    {
        image: 'https://cdn.builder.io/api/v1/image/assets/6748326f477a456b9e05ce0199194608/6eba2ad24cbc248f4df01829ca0b22a1dfe61db4?placeholderIfAbsent=true',
        title: 'Body Wash',
        price: '$29.99',
    },
    {
        image: 'https://cdn.builder.io/api/v1/image/assets/6748326f477a456b9e05ce0199194608/6eba2ad24cbc248f4df01829ca0b22a1dfe61db4?placeholderIfAbsent=true',
        title: 'Body Wash',
        price: '$29.99',
    },
    {
        image: 'https://cdn.builder.io/api/v1/image/assets/6748326f477a456b9e05ce0199194608/6eba2ad24cbc248f4df01829ca0b22a1dfe61db4?placeholderIfAbsent=true',
        title: 'Body Wash',
        price: '$29.99',
    },
];

const hairCareProducts = [
    {
        image: 'https://cdn.builder.io/api/v1/image/assets/6748326f477a456b9e05ce0199194608/07806e87877abb11c97d58b87be52bedf9372c6a?placeholderIfAbsent=true',
        title: 'Hair Wash',
        price: '$29.99',
    },
    {
        image: 'https://cdn.builder.io/api/v1/image/assets/6748326f477a456b9e05ce0199194608/07806e87877abb11c97d58b87be52bedf9372c6a?placeholderIfAbsent=true',
        title: 'Hair Wash',
        price: '$29.99',
    },
    {
        image: 'https://cdn.builder.io/api/v1/image/assets/6748326f477a456b9e05ce0199194608/07806e87877abb11c97d58b87be52bedf9372c6a?placeholderIfAbsent=true',
        title: 'Hair Wash',
        price: '$29.99',
    },
];

export default function ShopAll() {
    return (
        <GuestLayout>
            <div className="font-montserrat flex min-h-screen flex-col items-center bg-white px-2.5 py-2.5 font-bold text-[#252B42]">
                <h1 className="text-center text-4xl">Our Products</h1>

                <ProductSection title="Face Care" products={faceCareProducts} />
                <ProductSection title="Body Care" products={bodyCareProducts} />
                <ProductSection title="Hair Care" products={hairCareProducts} />
            </div>
        </GuestLayout>
    );
}
