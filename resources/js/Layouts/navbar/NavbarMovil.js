import { Disclosure, Transition } from "@headlessui/react"
import { MenuIcon, PhoneIcon, XIcon } from "@heroicons/react/solid"

import Logo from "../Logo"
import routes from "../routes"
const NavbarMovil = ({ data }) => {
    return (
        <Disclosure>
            {({ open, close }) => (
                <>
                    <div className="fixed inset-x-0 bg-white shadow-lg z-50">
                        <div className=" flex justify-between items-center h-16 px-5  ">
                            <div>
                                <PhoneIcon className="w-7 h-7" />
                            </div>
                            <div className="text-xl">
                                <Logo />
                            </div>
                            <div>
                                <Disclosure.Button className="inline-flex items-center justify-center p-2 rounded-md  outline-none ">
                                    <span className="sr-only">Open main menu</span>
                                    {open ? (
                                        <XIcon className="block h-7 w-7" aria-hidden="true" />
                                    ) : (
                                        <MenuIcon className="block h-7 w-7" aria-hidden="true" />
                                    )}
                                </Disclosure.Button>
                            </div>
                        </div>
                        <Transition
                            enter="transition duration-100 ease-out"
                            enterFrom="transform scale-95 opacity-0"
                            enterTo="transform scale-100 opacity-100"
                            leave="transition duration-75 ease-out"
                            leaveFrom="transform scale-100 opacity-100"
                            leaveTo="transform scale-95 opacity-0"
                        >
                            <Disclosure.Panel>
                                <div className="px-2 pt-2 pb-3 space-y-2 text-center ">
                                    <>
                                        <a onClick={close} href='/' className="nav-link-item ">
                                            {routes.menu.name}
                                        </a>

                                        <a onClick={close} href='/' className="nav-link-item ">
                                            {routes.about.name}
                                        </a>

                                        <a onClick={close} href='/' className="nav-link-item">
                                            {routes.gallery.name}
                                        </a>

                                        <a onClick={close} href='/' className="nav-link-item ">
                                            {routes.hours.name}
                                        </a>
                                    </>
                                </div>
                            </Disclosure.Panel>
                        </Transition>
                    </div>
                </>
            )}
        </Disclosure>
    )
}

export default NavbarMovil
