import { useRouter } from 'next/router'
import GuestLayout from '../../layouts/guest-layout';
import ProductList from '../../components/product-list';
import maskproducts from '../../components/mask-data-products';
import arrivalsproducts from '../../components/arrivals-dataproduct';
import bodyproducts from '../../components/body-data-product';
import tableproducts from '../../components/table-new-products';

const productsByCategory = {
    mask: maskproducts,
    arrivals: arrivalsproducts,
    body: bodyproducts,
    table: tableproducts,
};

export default function CategoryPage() {
    const router = useRouter();

    if (!router.isReady) return null;

    const { category } = router.query;

    console.log("Catégorie reçue depuis l'URL :", category);

    const products = productsByCategory[category];

    if (!products) {
        return (
            <GuestLayout>
                <div className="p-8 text-center text-gray-500">
                    Catégorie inconnue : {category}
                </div>
            </GuestLayout>
        );
    }

    return (
        <GuestLayout>
            <ProductList products={products} title={`Nos produits ${category}`} />
        </GuestLayout>
    );
}
