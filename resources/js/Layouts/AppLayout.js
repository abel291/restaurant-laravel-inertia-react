import Footer from "./Footer";
import Navbar from "./navbar/Navbar";
import { Head } from "@inertiajs/inertia-react";
const AppLayout = ({ children, title = "" }) => {
    return (
        <>
            <Head title={(title && title + " | ") + "React restaurant"} />
            <Navbar />
            {children}
            <Footer />
        </>
    );
};

export default AppLayout;
