import Footer from '@/components/footer';
import NavbarDesign from '@/components/ui/navbar';

export default function GuestLayout({ children, ...props }) {
    return (
        <>
            <NavbarDesign />
            <main>{children}</main>
            <Footer />
        </>
    );
}
