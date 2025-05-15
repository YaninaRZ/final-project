import ProductArrivals from '../components/product-arrivals';
import GuestLayout from '../layouts/guest-layout';

export default function Arrivals() {
    return (
        <GuestLayout>
            <p>New arrivals</p>
            <ProductArrivals />
        </GuestLayout>
    );
}
