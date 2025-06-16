import PhilosophySection from '@/components/philosophy-section';
import Selection from '@/components/new-selection';
import TextHero from '@/components/text-hero';
import GuestLayout from '@/layouts/guest-layout';

import ProductsGrid from '@/components/products/products-grid';
import products from '../data/products';

export default function NewProducts() {
    return (
        <GuestLayout>
            <Selection />
            <PhilosophySection />
            <TextHero />
        </GuestLayout>
    );
}
