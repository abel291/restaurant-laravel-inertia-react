import ValidationErrors from "@/Components/ValidationErrors";
import NotificationSuccess from "@/componentss/NotificationSuccess";
import { formatCurrency } from "@/helpers/helpers";
import MyAccount from "./MyAccount";

const orderDetails = ({ order }) => {
    return (
        <MyAccount active="orders" title={"Orden: #" + order.order}>
            <div className="space-y-2">
                <div className="flex items-center">
                    <span className="font-semibold mr-2">Telefono:</span>
                    {order.phone}
                </div>
                <div className="flex items-center">
                    <span className="font-semibold mr-2">Direccion:</span>
                    {order.address}
                </div>
                <div className="flex items-center">
                    <span className="font-semibold mr-2">Nota:</span>
                    {order.note ? order.note : "sin Nota"}
                </div>
                <div className="flex items-center">
                    <span className="font-semibold mr-2">
                        Fecha de creacion:
                    </span>
                    {order.created_at}
                </div>
            </div>
            <div>
                <table className="w-full rounded-lg overflow-hidden table-fixed">
                    <thead>
                        <tr>
                            <th className="p-4 bg-gray-100 text-heading font-semibold text-left">
                                Pedido
                            </th>
                            <th className="p-4 bg-gray-100 text-heading font-semibold text-left">
                                Monto
                            </th>
                        </tr>
                    </thead>
                    <tbody className="divide-y divide-gray-200 text-lg">
                        {order.products.map((product, index) => (
                            <tr key={index}>
                                <td className="p-4 text-left">
                                    {product.quantity} x {product.name}
                                </td>
                                <td className="p-4 text-left">
                                    {formatCurrency(
                                        product.total_price_quantity
                                    )}
                                </td>
                            </tr>
                        ))}
                        <tr className="font-semibold italic bg-gray-100">
                            <td className="p-4 text-left ">Subtotal</td>
                            <td className="p-4 text-left">
                                {formatCurrency(order.sub_total)}
                            </td>
                        </tr>

                        {order.discount && (
                            <tr className="font-semibold italic">
                                <td className="p-4 text-left ">Descuento</td>
                                <td className="p-4 text-left">
                                    -{formatCurrency(order.discount.applied)}
                                </td>
                            </tr>
                        )}
                        <tr className="font-semibold italic">
                            <td className="p-4 text-left ">
                                Impuestos ({order.tax_percent}%)
                            </td>
                            <td className="p-4 text-left">
                                {formatCurrency(order.tax_amount)}
                            </td>
                        </tr>
                        <tr className="font-semibold italic">
                            <td className="p-4 text-left ">Envio</td>
                            <td className="p-4 text-left">
                                {formatCurrency(order.shipping)}
                            </td>
                        </tr>
                        <tr className="font-bold  text-xl">
                            <td className="p-4 text-left ">Total</td>
                            <td className="p-4 text-left">
                                {formatCurrency(order.total)}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </MyAccount>
    );
};

export default orderDetails;
