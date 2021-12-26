import Pagination from "@/componentss/Pagination";
import { formatCurrency } from "@/helpers/helpers";
import { Link } from "@inertiajs/inertia-react";

import MyAccount from "./MyAccount";

const Orders = (props) => {
    console.log(props.orders)
    return (
        <MyAccount active="orders">
            <table className="w-full rounded-md overflow-hidden">
                <thead>
                    <tr>
                        <th className="p-4 bg-gray-100 text-heading font-medium text-left">
                            Orders
                        </th>
                        <th className="p-4 bg-gray-100 text-heading font-medium text-left">
                            Cantidad
                        </th>
                        <th className="p-4 bg-gray-100 text-heading font-medium text-left">
                            Fecha
                        </th>
                        <th className="p-4 bg-gray-100 text-heading font-medium text-left">
                            Estado
                        </th>
                        <th className="p-4 bg-gray-100 text-heading font-medium text-left">
                            Total
                        </th>
                        {/* <th className="p-4 bg-gray-100 text-heading font-medium text-left">
                            Opciones
                        </th> */}
                    </tr>
                </thead>
                <tbody className="divide-y divide-gray-200">
                    {props.orders.data.map((order, index) => (
                        <tr key={index}>
                            <td className="px-4 py-5 text-left underline">
                                <Link
                                    href={route("order_details", [order.order])}
                                >
                                    #{order.order}
                                </Link>
                            </td>
                            <td className="px-4 py-5 text-left ">
                                {order.created_at}
                            </td>
                            <td className="px-4 py-5 text-left ">
                                {order.state}
                            </td>
                            <td className="px-4 py-5 text-left ">
                                {formatCurrency(order.total)} 
                            </td>
                            {/* <td className="px-4 py-5 text-left ">
                                <button>Cancelar pedido</button>
                            </td> */}
                        </tr>
                    ))}
                </tbody>
            </table>
            <div className="border-t border-gray-200 px-4 py-5 ">
                <Pagination  data={props.orders} />
            </div>
        </MyAccount>
    );
};

export default Orders;
