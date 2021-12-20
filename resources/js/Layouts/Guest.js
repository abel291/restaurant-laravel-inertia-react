import React from 'react';
import ApplicationLogo from '@/Components/ApplicationLogo';
import { Link } from '@inertiajs/inertia-react';
import Logo from './Logo';

export default function Guest({ children }) {
    return (
        <div className="min-h-screen flex flex-col sm:justify-center items-center bg-gray-50 pt-6 sm:pt-0 ">
            <div>
                <Link href="/">
                    <Logo className="text-yellow-500 text-3xl" />
                </Link>
            </div>

            <div className="w-full sm:max-w-md mt-6 px-6 py-6 bg-white  shadow-md overflow-hidden sm:rounded-md">
                {children}
            </div>
        </div>
    );
}
