import GuestLayout from '@/layouts/guest-layout';
export default function Terms() {
    return (
        <GuestLayout>
            <section className="mx-auto max-w-4xl bg-[#F1EBE7] px-6 py-12 text-gray-800">
                <h1 className="mb-6 text-center text-4xl font-bold">Terms of Service</h1>
                <p className="mb-4 text-lg">
                    Welcome to our platform. By accessing or using our services, you agree to be bound by these Terms of Service. If you do not agree
                    to all the terms and conditions, you may not access the service.
                </p>

                <h2 className="mt-8 mb-2 text-2xl font-semibold">1. Use of the Service</h2>
                <p className="mb-4">
                    You agree to use the service only for lawful purposes and in accordance with these Terms. You are responsible for ensuring that
                    your use of the service does not violate any applicable laws or regulations.
                </p>

                <h2 className="mt-8 mb-2 text-2xl font-semibold">2. User Accounts</h2>
                <p className="mb-4">
                    To access certain features, you may be required to create an account. You are responsible for safeguarding your password and for
                    any activities that occur under your account.
                </p>

                <h2 className="mt-8 mb-2 text-2xl font-semibold">3. Intellectual Property</h2>
                <p className="mb-4">
                    All content, features, and functionality of the service are owned by us or our licensors. You agree not to reproduce, distribute,
                    modify, or create derivative works without our explicit permission.
                </p>

                <h2 className="mt-8 mb-2 text-2xl font-semibold">4. Termination</h2>
                <p className="mb-4">
                    We reserve the right to suspend or terminate your access to the service at our sole discretion, without notice, if we believe you
                    have violated these Terms.
                </p>

                <h2 className="mt-8 mb-2 text-2xl font-semibold">5. Disclaimer & Limitation of Liability</h2>
                <p className="mb-4">
                    The service is provided "as is" and "as available". We do not guarantee that the service will be uninterrupted or error-free. In
                    no event shall we be liable for any damages arising from your use of the service.
                </p>

                <h2 className="mt-8 mb-2 text-2xl font-semibold">6. Changes to the Terms</h2>
                <p className="mb-4">
                    We may revise these Terms at any time by updating this page. Your continued use of the service after any changes constitutes your
                    acceptance of the new Terms.
                </p>

                <h2 className="mt-8 mb-2 text-2xl font-semibold">7. Contact Us</h2>
                <p className="mb-4">If you have any questions about these Terms, please contact us at support@example.com.</p>
            </section>
        </GuestLayout>
    );
}
