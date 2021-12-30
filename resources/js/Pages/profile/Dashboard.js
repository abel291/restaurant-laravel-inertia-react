import { Link } from "@inertiajs/inertia-react";

import MyAccount from "./MyAccount";

const Dashboard = () => {
    return (
        <MyAccount active="dashboard" title="Dashboard">
            <div>
                Desde el panel de control de su cuenta, puede ver sus ,
                administrar los
                <Link href="/" className="font-bold underline px-1 ">
                    pedidos recientes
                </Link>
                , administrar los
                <Link
                    href={route("account_details")}
                    className="font-bold underline px-1 "
                >
                    detalles de su cuenta
                </Link>
                y
                <Link href="/" className="font-bold underline px-1 ">
                    cambiar su contraseña.
                </Link>
                .
            </div>
        </MyAccount>
    );
};

export default Dashboard;
