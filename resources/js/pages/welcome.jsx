import CategoryGrid from '@/components/category-grid';
import IngredientImage from '@/components/ingredient-image';
import HeroSection from '@/components/hero-section';
import PartnersLogo from '@/components/partners-logo';
import PostGrid from '@/components/post-grid';
import SkinnSection from '@/components/skinn-section';
import TextHero from '@/components/text-hero';
import GuestLayout from '@/layouts/guest-layout';

export default function Welcome() {
    return (
        <GuestLayout>
            <HeroSection />
            <SkinnSection />
            <IngredientImage />
            <PostGrid />
            <TextHero />
            <PartnersLogo />
            <CategoryGrid />
        </GuestLayout>
    );
}
