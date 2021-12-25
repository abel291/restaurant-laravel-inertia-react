import BannerHero from "@/componentss/BannerHero";
import { fomatCurrency } from "@/helpers/helpers";
import { CheckCircleIcon } from "@heroicons/react/solid";

import AppLayout from "../../Layouts/AppLayout";

const OrderDetails = ({ order }) => {
    return (
        <AppLayout title={"Orden " + order.order}>
            <BannerHero title="Detalles de pedido" img="order/banner.jpg" />
            <div className="container ">
                <div className="py-content max-w-3xl mx-auto space-y-7">
                    {/* <div className="bg-green-100 p-2 md:p-4 flex space-x-2 rounded-md">
                        <CheckCircleIcon className="h-5 w-5 text-green-400" />
                        <div className="text-green-700">
                            <span className="font-semibold block text-green-700">
                                Orden completada
                            </span>
                            <span className="text-green-600">
                                Gracias. Tu orden ha sido recibida .Todo los
                                datos han sido enviados a tu correo
                            </span>
                        </div>
                    </div> */}

                    <h2 className="font-primary text-4xl text-red-500">
                        Orden: #{order.order}
                    </h2>

                    <div className="flex flex-wrap item-stretch sm:divide-x divide-gray-200 sm:space-y-0 ">
                        <div className="w-1/2 md:w-auto md:pr-5 mb-2 md:mb-0">
                            <span className=" uppercase text-sm ">
                                numero de orden
                            </span>
                            <div className=" font-semibold ">
                                {"#" + order.order}
                            </div>
                        </div>
                        <div className="w-1/2 md:w-auto md:px-5 mb-2 md:mb-0">
                            <span className=" uppercase text-sm ">Fecha</span>
                            <div className=" font-semibold ">
                                {/* {order.created_at} */}
                            </div>
                        </div>
                        <div className="w-1/2 md:w-auto md:px-5 mb-2 md:mb-0">
                            <span className=" uppercase text-sm ">total</span>
                            <div className=" font-semibold ">
                                {fomatCurrency(order.total)}
                            </div>
                        </div>
                        <div className="w-1/2 md:w-auto md:px-5 mb-2 md:mb-0">
                            <span className=" uppercase text-sm ">
                                Metodo de pago
                            </span>
                            <div className=" font-semibold ">
                                Targeta de credito
                            </div>
                        </div>
                    </div>
                    <div className="">
                        <table className="w-full divide-y divide-gray-100">
                            <thead className="bg-gray-50">
                                <tr>
                                    <th className="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                                        Pedido
                                    </th>
                                    <th className="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                                        Monto
                                    </th>
                                </tr>
                            </thead>
                            <tbody className="divide-y divide-gray-100">
                                {order.products.map((product, index) => (
                                    <tr key={index}>
                                        <td className="px-6 py-3">
                                            {product.quantity} x {product.name}
                                        </td>
                                        <td className="px-6 py-3">
                                            {fomatCurrency(
                                                product.total_price_quantity
                                            )}
                                        </td>
                                    </tr>
                                ))}
                                <tr className="font-medium italic">
                                    <td className="px-6 py-3 ">Subtotal</td>
                                    <td className="px-6 py-3">
                                        {fomatCurrency(order.sub_total)}
                                    </td>
                                </tr>

                                {order.discount && (
                                    <tr className="font-medium italic">
                                        <td className="px-6 py-3 ">
                                            Descuento
                                        </td>
                                        <td className="px-6 py-3">
                                            -
                                            {fomatCurrency(
                                                order.discount.applied
                                            )}
                                        </td>
                                    </tr>
                                )}
                                <tr className="font-medium italic">
                                    <td className="px-6 py-3 ">
                                        Impuestos ({order.tax_percent}%)
                                    </td>
                                    <td className="px-6 py-3">
                                        {fomatCurrency(order.tax_amount)}
                                    </td>
                                </tr>
                                <tr className="font-medium italic">
                                    <td className="px-6 py-3 ">Envio</td>
                                    <td className="px-6 py-3">
                                        {fomatCurrency(order.shipping)}
                                    </td>
                                </tr>
                                <tr className="font-bold  text-xl">
                                    <td className="px-6 py-3 ">Total</td>
                                    <td className="px-6 py-3">
                                        {fomatCurrency(order.total)}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </AppLayout>
    );
};

export default OrderDetails;
