
import Logo from "./Logo"
import routes from "./routes"
const Footer = () => {
    return (
        <div className="py-content border-t border-gray-200">
            <div className="text-center text-gray-700">
                <div className="text-4xl text-yellow-500">
                    <Logo />
                </div>
                <div className="mt-6">
                    <div className="inline-flex space-x-3 ">
                        <img className="w-9 h-9" src="/storage/social/facebook-icon.png" alt="" />
                        <img className="w-9 h-9" src="/storage/social/instagram-icon.png" alt="" />
                        <img className="w-9 h-9" src="/storage/social/twt-icon.png" alt="" />
                        <img className="w-9 h-9" src="/storage/social/ws-icon.png" alt="" />
                    </div>
                </div>
                <div className="mt-6">
                    <div className="inline-flex flex-wrap divide-x divide-gray-500 font-bold  justify-center uppercase">
                        <a href='/' className="px-3 lg:px-5 mb-4 leading-none">
                            {routes.about.name}
                        </a>
                        <a href='/' className="px-3 lg:px-5 mb-4 leading-none">
                            {routes.menu.name}
                        </a>
                        <a href='/' className="px-3 lg:px-5 mb-4 leading-none">
                            {routes.location.name}
                        </a>
                        <a href='/' className="px-3 lg:px-5 mb-4 leading-none">
                            {routes.gallery.name}
                        </a>
                        <a href='/' className="px-3 lg:px-5 mb-4 leading-none">
                            {routes.giftCards.name}
                        </a>
                        <a href='/' className="px-3 lg:px-5 mb-4 leading-none">
                            {routes.contacts.name}
                        </a>
                    </div>
                    <div className="mt-4 font-light">© 2020 Testo. All Rights Reserved</div>
                </div>
            </div>
        </div>
    )
}

export default Footer
