import HeroSecret from '../components/hero-secret';
import Selection from '../components/New-selection';
import ProductsV2 from '../components/products-v-2';
import TextH from '../components/texthero';
import GuestLayout from '../layouts/guest-layout';

export default function NewProducts() {
    return (
        <GuestLayout>
            <Selection></Selection>
            <ProductsV2></ProductsV2>
            <HeroSecret></HeroSecret>
            <TextH></TextH>
        </GuestLayout>
    );
}
