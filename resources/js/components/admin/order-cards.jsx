import { CalendarDaysIcon, CreditCardIcon, UserCircleIcon } from '@heroicons/react/20/solid';

export default function Row() {
    return (
        <div className="flex flex-wrap items-center justify-center gap-8 p-6">

            <div className="w-full sm:w-2/3 xl:w-1/4">
                <div className="rounded-lg bg-gray-50 shadow-xs ring-1 ring-gray-900/5">
                    <dl className="flex flex-wrap p-6">
                        <div className="flex-auto">
                            <dt className="text-sm font-semibold text-gray-900">Full Name</dt>
                            <dd className="mt-1 text-base font-semibold text-gray-900">$10,560.00</dd>
                        </div>
                        <div className="flex-none self-end">
                            <dt className="sr-only">Email</dt>
                            <dd className="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-green-600/20 ring-inset">
                                Paid
                            </dd>
                        </div>
                        <div className="mt-6 flex w-full flex-none gap-x-4 border-t border-gray-900/5 px-6 pt-6">
                            <dt className="flex-none">
                                <span className="sr-only">Phone</span>
                                <UserCircleIcon aria-hidden="true" className="h-6 w-5 text-gray-400" />
                            </dt>
                            <dd className="text-sm font-medium text-gray-900">Alex Curren</dd>
                        </div>
                        <div className="mt-4 flex w-full flex-none gap-x-4 px-6">
                            <dt className="flex-none">
                                <span className="sr-only">Due date</span>
                                <CalendarDaysIcon aria-hidden="true" className="h-6 w-5 text-gray-400" />
                            </dt>
                            <dd className="text-sm text-gray-500">
                                <time dateTime="2023-01-31">January 31, 2023</time>
                            </dd>
                        </div>
                        <div className="mt-4 flex w-full flex-none gap-x-4 px-6">
                            <dt className="flex-none">
                                <span className="sr-only">Status</span>
                                <CreditCardIcon aria-hidden="true" className="h-6 w-5 text-gray-400" />
                            </dt>
                            <dd className="text-sm text-gray-500">Paid with MasterCard</dd>
                        </div>
                    </dl>
                    <div className="mt-6 border-t border-gray-900/5 px-6 py-6">
                        <a href="#" className="text-sm font-semibold text-gray-900">
                            Download receipt <span aria-hidden="true">&rarr;</span>
                        </a>
                    </div>
                </div>
            </div>


            <div className="w-full sm:w-2/3 xl:w-1/4">
                <div className="rounded-lg bg-gray-50 shadow-xs ring-1 ring-gray-900/5">
                    <dl className="flex flex-wrap p-6">
                        <div className="flex-auto">
                            <dt className="text-sm font-semibold text-gray-900">Order Info</dt>
                            <dd className="mt-1 text-base font-semibold text-gray-900">$12,450.00</dd>
                        </div>
                        <div className="flex-none self-end">
                            <dt className="sr-only">Email</dt>
                            <dd className="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-green-600/20 ring-inset">
                                Paid
                            </dd>
                        </div>
                        <div className="mt-6 flex w-full flex-none gap-x-4 border-t border-gray-900/5 px-6 pt-6">
                            <dt className="flex-none">
                                <span className="sr-only">Phone</span>
                                <UserCircleIcon aria-hidden="true" className="h-6 w-5 text-gray-400" />
                            </dt>
                            <dd className="text-sm font-medium text-gray-900">John Doe</dd>
                        </div>
                        <div className="mt-4 flex w-full flex-none gap-x-4 px-6">
                            <dt className="flex-none">
                                <span className="sr-only">Due date</span>
                                <CalendarDaysIcon aria-hidden="true" className="h-6 w-5 text-gray-400" />
                            </dt>
                            <dd className="text-sm text-gray-500">
                                <time dateTime="2023-03-01">March 1, 2023</time>
                            </dd>
                        </div>
                        <div className="mt-4 flex w-full flex-none gap-x-4 px-6">
                            <dt className="flex-none">
                                <span className="sr-only">Status</span>
                                <CreditCardIcon aria-hidden="true" className="h-6 w-5 text-gray-400" />
                            </dt>
                            <dd className="text-sm text-gray-500">Paid with Visa</dd>
                        </div>
                    </dl>
                    <div className="mt-6 border-t border-gray-900/5 px-6 py-6">
                        <a href="#" className="text-sm font-semibold text-gray-900">
                            Download receipt <span aria-hidden="true">&rarr;</span>
                        </a>
                    </div>
                </div>
            </div>


            <div className="w-full sm:w-2/3 xl:w-1/4">
                <div className="rounded-lg bg-gray-50 shadow-xs ring-1 ring-gray-900/5">
                    <dl className="flex flex-wrap p-6">
                        <div className="flex-auto">
                            <dt className="text-sm font-semibold text-gray-900">Deliver To</dt>
                            <dd className="mt-1 text-base font-semibold text-gray-900">$8,720.00</dd>
                        </div>
                        <div className="flex-none self-end">
                            <dt className="sr-only">Email</dt>
                            <dd className="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-green-600/20 ring-inset">
                                Paid
                            </dd>
                        </div>
                        <div className="mt-6 flex w-full flex-none gap-x-4 border-t border-gray-900/5 px-6 pt-6">
                            <dt className="flex-none">
                                <span className="sr-only">Phone</span>
                                <UserCircleIcon aria-hidden="true" className="h-6 w-5 text-gray-400" />
                            </dt>
                            <dd className="text-sm font-medium text-gray-900">Megan Fox</dd>
                        </div>
                        <div className="mt-4 flex w-full flex-none gap-x-4 px-6">
                            <dt className="flex-none">
                                <span className="sr-only">Due date</span>
                                <CalendarDaysIcon aria-hidden="true" className="h-6 w-5 text-gray-400" />
                            </dt>
                            <dd className="text-sm text-gray-500">
                                <time dateTime="2023-02-20">February 20, 2023</time>
                            </dd>
                        </div>
                        <div className="mt-4 flex w-full flex-none gap-x-4 px-6">
                            <dt className="flex-none">
                                <span className="sr-only">Status</span>
                                <CreditCardIcon aria-hidden="true" className="h-6 w-5 text-gray-400" />
                            </dt>
                            <dd className="text-sm text-gray-500">Unpaid with PayPal</dd>
                        </div>
                    </dl>
                    <div className="mt-6 border-t border-gray-900/5 px-6 py-6">
                        <a href="#" className="text-sm font-semibold text-gray-900">
                            Download receipt <span aria-hidden="true">&rarr;</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    );
}
