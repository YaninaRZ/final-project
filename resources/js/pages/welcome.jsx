import Categorie from '../components/categorie';
import Clean from '../components/cleanwoman';
import Hero from '../components/hero-section';
import PartnersLogo from '../components/partners-logo';
import ProductsV1 from '../components/productsv1';
import Skinn from '../components/skinnsection';
import TextH from '../components/texthero';
import GuestLayout from '../layouts/guest-layout';

export default function Welcome() {
    return (
        <GuestLayout>
            <Hero></Hero>
            <Skinn></Skinn>
            <Clean></Clean>
            <ProductsV1></ProductsV1>
            <TextH></TextH>
            <PartnersLogo></PartnersLogo>
            <Categorie></Categorie>
        </GuestLayout>
    );
}
