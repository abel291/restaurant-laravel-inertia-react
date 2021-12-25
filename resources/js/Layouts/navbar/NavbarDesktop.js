import { Menu, Transition } from "@headlessui/react";
import { ChevronDownIcon, ShoppingBagIcon } from "@heroicons/react/solid";
import { Fragment } from "react";
import Logo from "../Logo";
import routes from "../routes";
import { Link, usePage } from "@inertiajs/inertia-react";
import ProfileDropdown from "./ProfileDropdown";

//import ProfileDropdown from "./ProfileDropdown"
const routesAbout = [
    {
        name: routes.about.name,
        path: route("about"),
    },
    {
        name: routes.team.name,
        path: route("team"),
    },
    {
        name: routes.faqs.name,
        path: route("faqs"),
    },
    {
        name: routes.terms.name,
        path: route("terms"),
    },
    {
        name: routes.giftCards.name,
        path: route("gift_cards"),
    },
    {
        name: routes.contacts.name,
        path: route("contacts"),
    },
];
const NavbarDesktop = () => {
    const { auth } = usePage().props;
    return (
        <div className="container py-5 text-white absolute inset-x-0  ">
            <div className="h-20 flex items-center justify-between">
                <div className="text-2xl">
                    <Link href="/">
                        <Logo />
                    </Link>
                </div>
                <div>
                    <div className="flex items-center space-x-8 font-primary text-lg ">
                        <Link href={route("menu")}>{routes.menu.name}</Link>

                        <Link href={route("gallery")}>
                            {routes.gallery.name}
                        </Link>

                        <Link href={route("locations")}>
                            {routes.location.name}
                        </Link>

                        <MenuHeader title="Nosotros" data={routesAbout} />

                        <div className="text-2xl font-bold text-yellow-400">
                            321-456-798
                        </div>

                        {auth.user ? (
                            <>
                                <Link href={route("shopping-cart.index")}>
                                    <ShoppingBagIcon className="h-8 w-8" />
                                </Link>
                                <ProfileDropdown user={auth.user} />
                            </>
                        ) : (
                            <Link href={route('login')}>Login</Link>
                        )}
                    </div>
                </div>
            </div>
        </div>
    );
};

const MenuHeader = ({ title, data }) => {
    return (
        <Menu as="div" className="relative inline-block text-left">
            <Menu.Button className="flex items-center ">
                <span className=" font-primary">{title}</span>
                <ChevronDownIcon className="h-5 w-5" />
            </Menu.Button>
            <Transition
                as={Fragment}
                enter="transition ease-out duration-100"
                enterFrom="transform opacity-0 scale-95"
                enterTo="transform opacity-100 scale-100"
                leave="transition ease-in duration-75"
                leaveFrom="transform opacity-100 scale-100"
                leaveTo="transform opacity-0 scale-95"
            >
                <Menu.Items className="absolute right-0 w-60 mt-2 origin-top-right bg-yellow-500 divide-y divide-yellow-600 divide-opacity-30  shadow-lg focus:outline-none text-white uppercase font-bold text-sm tracking-wide rounded font-sans">
                    {data.map((item) => (
                        <Menu.Item key={item.name}>
                            <Link href={item.path} className="py-3 px-3 block">
                                {item.name}
                            </Link>
                        </Menu.Item>
                    ))}
                </Menu.Items>
            </Transition>
        </Menu>
    );
};
export default NavbarDesktop;
