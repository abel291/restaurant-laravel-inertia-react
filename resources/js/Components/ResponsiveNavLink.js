import React from 'react';
import { Link } from '@inertiajs/inertia-react';

export default function ResponsiveNavLink({ method = 'get', as = 'a', href, active = false, children }) {
    return (
        <Link
            method={method}
            as={as}
            href={href}
            className={`w-full flex items-start pl-3 pr-4 py-2 border-l-4 ${
                active
                    ? 'border-yellow-400 text-yellow-700 bg-yellow-50 focus:outline-none focus:text-yellow-800 focus:bg-yellow-100 focus:border-yellow-700'
                    : 'border-transparent text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300'
            }  focus:outline-none transition duration-150 ease-in-out`}
        >
            {children}
        </Link>
    );
}
