import BannerHero from "@/componentss/BannerHero";
import AppLayout from "@/Layouts/AppLayout";
import { Elements } from "@stripe/react-stripe-js";
import { loadStripe } from "@stripe/stripe-js";

import CartItem from "./CartItem";
import CartResumen from "./CartResumen";
import Form from "./Form";

const ShoppingCart = (props) => {
    const stripePromise = loadStripe("pk_test_ejdWQWajqC4QwST95KoZiDZK");
    return (
        <AppLayout title="Carrito de Compra">
            <BannerHero
                title="Carrito de compras"
                img="shopping_cart/banner.jpg"
                breadcrumb="home / carrtio de compra"
            />
            <div className="container ">
                <div className="py-content max-w-5xl mx-auto">
                    {props.products.data.length === 0 ? (
                        <div className="text-center text-2xl font-primary">
                            No tienes articulos en el carrito
                        </div>
                    ) : (
                        <>
                            <div>
                                <h2 className="font-primary text-4xl">
                                    Lista de productos
                                </h2>
                                <div className=" mx-auto divide-y divide-gray-200 mt-10">
                                    {props.products.data.map((product) => (
                                        <CartItem
                                            key={product.id}
                                            product={product}
                                        />
                                    ))}
                                </div>
                            </div>
                            <div className="mt-24">
                                <h2 className="font-primary text-4xl">
                                    Resumen y Datos de envio
                                </h2>
                                <div className="grid lg:grid-cols-12 gap-8 mt-10">
                                    <div className="lg:col-span-7">
                                        <Elements stripe={stripePromise}>
                                            <Form />
                                        </Elements>
                                    </div>
                                    <div className="lg:col-span-5">
                                        <CartResumen meta={props.meta} />
                                    </div>
                                </div>
                            </div>
                        </>
                    )}
                </div>
            </div>
        </AppLayout>
    );
};

export default ShoppingCart;
