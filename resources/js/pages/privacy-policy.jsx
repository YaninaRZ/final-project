import GuestLayout from '../layouts/guest-layout';

export default function PrivacyPolicy() {
    return (
        <GuestLayout>
            <section className="mx-auto max-w-4xl bg-[#F1EBE7] px-6 py-12 text-gray-800">
                <h1 className="mb-6 text-center text-4xl font-bold">Privacy Policy</h1>
                <p className="mb-4 text-lg">
                    This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you visit our website or use our
                    services. Please read this policy carefully to understand our views and practices regarding your personal data.
                </p>

                <h2 className="mt-8 mb-2 text-2xl font-semibold">1. Information We Collect</h2>
                <p className="mb-4">
                    We may collect personal information that you provide to us directly, such as your name, email address, and any other details you
                    submit through forms or account creation. We may also automatically collect data such as IP addresses, browser types, and usage
                    patterns.
                </p>

                <h2 className="mt-8 mb-2 text-2xl font-semibold">2. How We Use Your Information</h2>
                <p className="mb-4">
                    Your information is used to provide and improve our services, communicate with you, personalize your experience, and ensure the
                    security of our platform. We do not sell or rent your personal data to third parties.
                </p>

                <h2 className="mt-8 mb-2 text-2xl font-semibold">3. Sharing Your Information</h2>
                <p className="mb-4">
                    We may share your information with trusted service providers who help us operate the website and provide services. We may also
                    disclose information if required by law or to protect our legal rights.
                </p>

                <h2 className="mt-8 mb-2 text-2xl font-semibold">4. Cookies and Tracking Technologies</h2>
                <p className="mb-4">
                    We use cookies and similar tracking technologies to improve your experience on our website, analyze usage, and deliver
                    personalized content. You can control cookie settings through your browser preferences.
                </p>

                <h2 className="mt-8 mb-2 text-2xl font-semibold">5. Data Security</h2>
                <p className="mb-4">
                    We implement appropriate technical and organizational measures to protect your personal data from unauthorized access, disclosure,
                    alteration, or destruction. However, no internet-based service is completely secure.
                </p>

                <h2 className="mt-8 mb-2 text-2xl font-semibold">6. Your Rights</h2>
                <p className="mb-4">
                    Depending on your jurisdiction, you may have rights to access, correct, or delete your personal data. To exercise your rights,
                    please contact us directly.
                </p>

                <h2 className="mt-8 mb-2 text-2xl font-semibold">7. Changes to This Policy</h2>
                <p className="mb-4">
                    We may update this Privacy Policy from time to time. Any changes will be posted on this page with an updated effective date.
                    Continued use of our services after changes means you accept the revised policy.
                </p>

                <h2 className="mt-8 mb-2 text-2xl font-semibold">8. Contact Us</h2>
                <p className="mb-4">If you have any questions or concerns about this Privacy Policy, please contact us at privacy@example.com.</p>
            </section>
        </GuestLayout>
    );
}
