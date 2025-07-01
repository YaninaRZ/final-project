import PhilosophySection from '@/components/philosophy-section';
import Selection from '@/components/new-selection';
import TextHero from '@/components/text-hero';
import GuestLayout from '@/layouts/guest-layout';


export default function NewProducts() {
    return (
        <GuestLayout>
            <Selection />
            <PhilosophySection />
            <TextHero />
        </GuestLayout>
    );
}
