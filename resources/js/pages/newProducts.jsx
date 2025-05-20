import HeroSecret from '../components/hero-secret';
import Selection from '../components/New-selection';
import TextH from '../components/texthero';
import GuestLayout from '../layouts/guest-layout';

import ProductsGrid from '../components/products/products-grid';
import tableproducts from '../components/table-new-products';

export default function NewProducts() {
    return (
        <GuestLayout>
            <Selection></Selection>
            <ProductsGrid products={tableproducts} />
            <HeroSecret></HeroSecret>
            <TextH></TextH>
        </GuestLayout>
    );
}
