import {
    CreditCardIcon,
    KeyIcon,
    UserCircleIcon,
} from '@heroicons/react/24/outline';

export const subNavigation = [
    { name: 'Profile', href: 'user-account', icon: UserCircleIcon },
    { name: 'Password', href: 'user-password', icon: KeyIcon },
    { name: 'Orders', href: 'user-billing', icon: CreditCardIcon },
];
