import GuestLayout from '../layouts/guest-layout';

export default function License() {
    return (
        <GuestLayout>
            <section className="mx-auto max-w-4xl bg-[#F1EBE7] px-6 py-12 text-gray-800">
                <h1 className="mb-6 text-center text-4xl font-bold">License Razvetka</h1>
                <p className="mb-4 text-lg">This License Agreement of Razvetka.</p>

                <h2 className="mt-8 mb-2 text-2xl font-semibold">1. Grant of License</h2>
                <p className="mb-4">
                    We grant you a limited, non-exclusive, non-transferable, and revocable license to use our software and services for personal or
                    internal business use, subject to the terms of this agreement.
                </p>

                <h2 className="mt-8 mb-2 text-2xl font-semibold">2. Restrictions</h2>
                <p className="mb-4">
                    You may not: (a) reproduce, distribute, or resell our software or services; (b) modify, reverse-engineer, or decompile any part of
                    the software; or (c) use the services for any unlawful or unauthorized purpose.
                </p>

                <h2 className="mt-8 mb-2 text-2xl font-semibold">3. Ownership</h2>
                <p className="mb-4">
                    All intellectual property rights in the software and content remain the exclusive property of the company or its licensors. This
                    agreement does not transfer any ownership rights.
                </p>

                <h2 className="mt-8 mb-2 text-2xl font-semibold">4. Termination</h2>
                <p className="mb-4">
                    We reserve the right to terminate your license at any time if you breach these terms. Upon termination, you must cease all use of
                    the software and destroy any copies in your possession.
                </p>

                <h2 className="mt-8 mb-2 text-2xl font-semibold">5. Disclaimer of Warranties</h2>
                <p className="mb-4">
                    The software and services are provided "as is", without warranty of any kind. We disclaim all warranties, express or implied,
                    including but not limited to warranties of merchantability or fitness for a particular purpose.
                </p>

                <h2 className="mt-8 mb-2 text-2xl font-semibold">6. Limitation of Liability</h2>
                <p className="mb-4">
                    In no event shall we be liable for any direct, indirect, incidental, or consequential damages arising out of the use or inability
                    to use the licensed material, even if advised of the possibility of such damages.
                </p>

                <h2 className="mt-8 mb-2 text-2xl font-semibold">7. Modifications</h2>
                <p className="mb-4">
                    We reserve the right to modify this License Agreement at any time. Changes will be effective immediately upon posting. Continued
                    use of the software constitutes acceptance of the updated terms.
                </p>

                <h2 className="mt-8 mb-2 text-2xl font-semibold">8. Contact</h2>
                <p className="mb-4">For any questions about this License Agreement, please contact us at license@example.com.</p>
            </section>
        </GuestLayout>
    );
}
