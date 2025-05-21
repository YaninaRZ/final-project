import ProductCards from '@/components/product-cards';
import HeroSectionMain from '@/components/hero-section-main';
import FaqSection from '@/components/faq-section';
import HeroImitaton from '@/components/hero-imitation';
import GuestLayout from '@/layouts/guest-layout';

export default function About() {
    return (
        <GuestLayout>
            <HeroSectionMain />
            <HeroImitaton />
            <ProductCards />
            <FaqSection />
        </GuestLayout>
    );
}
