export default function PartnersLogo() {
    return (
        <div className="bg-white py-24 sm:py-32">
            <div className="mx-auto max-w-7xl px-6 lg:px-8">
                <div className="mx-auto mt-10 grid max-w-lg grid-cols-4 items-center gap-x-8 gap-y-10 sm:max-w-xl sm:grid-cols-6 sm:gap-x-10 lg:mx-0 lg:max-w-none lg:grid-cols-5">
                    <img
                        alt="Transistor"
                        src="/images/vertioPartner.svg"
                        width={158}
                        height={48}
                        className="col-span-2 max-h-12 w-full object-contain lg:col-span-1"
                    />
                    <img
                        alt="Reform"
                        src="/images/happenzPartner.svg"
                        width={158}
                        height={48}
                        className="col-span-2 max-h-12 w-full object-contain lg:col-span-1"
                    />
                    <img
                        alt="Tuple"
                        src="/images/katerioPartner.svg"
                        width={158}
                        height={48}
                        className="col-span-2 max-h-12 w-full object-contain lg:col-span-1"
                    />
                    <img
                        alt="SavvyCal"
                        src="/images/OugreyPartner.svg"
                        width={158}
                        height={48}
                        className="col-span-2 max-h-12 w-full object-contain sm:col-start-2 lg:col-span-1"
                    />
                    <img
                        alt="Statamic"
                        src="https://tailwindcss.com/plus-assets/img/logos/158x48/statamic-logo-gray-900.svg"
                        width={158}
                        height={48}
                        className="col-span-2 col-start-2 max-h-12 w-full object-contain sm:col-start-auto lg:col-span-1"
                    />
                </div>
            </div>
        </div>
    );
}
