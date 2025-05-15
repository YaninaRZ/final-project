import CardGroup from '../components/Card-group';
import AboutSection from '../components/about-welcome';
import FAQ from '../components/accordion-centered';
import HeroImitaton from '../components/imitation-content';
import GuestLayout from '../layouts/guest-layout';

export default function About() {
    return (
        <GuestLayout>
            <AboutSection></AboutSection>
            <HeroImitaton></HeroImitaton>
            <CardGroup></CardGroup>
            <FAQ></FAQ>
        </GuestLayout>
    );
}
