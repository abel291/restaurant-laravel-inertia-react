import { Menu, Transition } from "@headlessui/react";
import { Fragment } from "react";
import { ChevronDownIcon } from "@heroicons/react/solid";
import { Link, useForm } from "@inertiajs/inertia-react";
import SpinnerLoad from "@/componentss/SpinnerLoad";

const ProfileDropdown = ({ user }) => {
    const logout = useForm();
    const handleLogout = () => {
        logout.post(route("logout"));
    };

    if (logout.processing) {
        return <SpinnerLoad styleClass="h-5 w-5" />;
    }

    return (
        <Menu as="div" className="relative inline-block z-40 ">
            <Menu.Button className="inline-flex items-center rounded-md font-primary">
                {user.name}
                <ChevronDownIcon
                    className="w-5 h-5 ml-1 -mr-1 text-violet-200 hover:text-violet-100"
                    aria-hidden="true"
                />
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
                <Menu.Items className="absolute right-0 text-sm  w-52 mt-2 origin-top-right bg-yellow-500 divide-y divide-yellow-600 divide-opacity-30  shadow-lg focus:outline-none text-white uppercase font-semibold tracking-wide rounded font-sans">
                    <div>
                        <Menu.Item>
                            <Link href={route('my_account')} className="px-3 py-3 block ">
                                <span>Mi cuenta</span>
                            </Link>
                        </Menu.Item>
                    </div>
                    <div>
                        <Menu.Item>
                            <div
                                onClick={handleLogout}
                                className="px-3 py-3 block  cursor-pointer"
                            >
                                Salir
                            </div>
                        </Menu.Item>
                    </div>
                </Menu.Items>
            </Transition>
        </Menu>
    );
};

export default ProfileDropdown;
