import Button from "@/Components/Button";
import BannerHero from "@/componentss/BannerHero";
import AppLayout from "@/Layouts/AppLayout";
import { Link, useForm, usePage } from "@inertiajs/inertia-react";
const profileRoutes = [
    {
        name: "Dashboard",
        path: route("my_account"),
        active: "dashboard",
    },
    {
        name: "Ordenes",
        path: route("my_account"),
        active: "order",
    },
    {
        name: "Detalles de cuenta",
        path: route("show_account_details"),
        active: "account-details",
    },
    {
        name: "Cambiar contraseña",
        path: route("my_account"),
        active: "password",
    },
];
const MyAccount = ({ children, active }) => {
    const { auth } = usePage().props;

    const logout = useForm();
    const handleLogout = () => {
        logout.post(route("logout"));
    };
    return (
        <AppLayout>
            <BannerHero title={auth.user.name} img="shopping_cart/banner.jpg" />

            <div className="container py-content">
                <div className="grid grid-cols-12 md:gap-4 gap-y-10">
                    <div className="col-span-12 md:col-span-3">
                        <h3 className="text-3xl text-red-500 font-primary ">
                            My cuenta
                        </h3>
                        <div className="flex flex-col font-bold text-lg mt-6">
                            {profileRoutes.map((route,index) => (
                                <Link
                                    key={index}
                                    href={route.path}
                                    preserveScroll
                                    className={
                                        "block py-3 pl-4 border-l-4  " +
                                        (active === route.active
                                            ? "border-yellow-500 text-yellow-500  "
                                            : "border-yellow-100 text-gray-500 hover:border-yellow-500 hover:text-yellow-500")
                                    }
                                >
                                    {route.name}
                                </Link>
                            ))}
                        </div>
                        <div className="mt-6">
                            <button
                                className="uppercase font-bold rounded  text-yellow-500 border border-yellow-500 text-sm py-2 px-4 hover:bg-yellow-500 hover:text-white disabled:opacity-25 leading-none"
                                onClick={handleLogout}
                                type="Button"
                                disabled={logout.processing}
                                
                            >
                               Cerrar Sesion
                            </button>
                        </div>
                    </div>
                    <div className="col-span-12 md:col-span-9">{children}</div>
                </div>
            </div>
        </AppLayout>
    );
};

export default MyAccount;
