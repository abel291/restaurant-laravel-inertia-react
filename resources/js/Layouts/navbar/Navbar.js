import { useEffect } from "react"

import NavbarDesktop from "./NavbarDesktop"
import NavbarMovil from "./NavbarMovil.js"

const Navbar = () => {
    
    return (
        <nav className="z-50">
            <div className="hidden lg:block">
                <NavbarDesktop />
            </div>
            <div className="block lg:hidden pb-16 lg:pb-0">
                {/* <NavbarMovil /> */}
            </div>
        </nav>
    )
}

export default Navbar
