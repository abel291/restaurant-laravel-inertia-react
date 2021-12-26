import SpinnerLoad from "@/componentss/SpinnerLoad";
import { formatCurrency } from "@/helpers/helpers";
import { XIcon } from "@heroicons/react/solid";
import { Link, useForm, usePage } from "@inertiajs/inertia-react";

const CartResumen = ({ meta }) => {
    const applyDiscount = useForm({ code: "" });
    const removeDiscount = useForm();
    const { errors } = usePage().props
    const handleSubmitDiscount = (e) => {
        e.preventDefault();
        if (applyDiscount.data.code === "") {
            return;
        }

        applyDiscount.get(route("apply_cupon_discount"), {
            preserveScroll: true,
        });
    };

    const handleClickRemoveDiscount = (code) => {
        applyDiscount.get(route("remove_cupon_discount"), {
            preserveScroll: true,
        });
    };
    
    return (
        <div>
            <div className=" p-12 rounded-md bg-gray-100 text-left relative">
                {(removeDiscount.processing || applyDiscount.processing) && (
                    <div className="flex items-center absolute inset-0 justify-center">
                        <div className="absolute inset-0 bg-gray-300 filter brightness-125 opacity-50"></div>
                        <SpinnerLoad styleClass="h-7 w-7" />
                    </div>
                )}

                <h5 className="text-3xl font-primary"> Pedidos</h5>
                <div className="mt-5 divide-y divide-gray-200 font-medium ">
                    <div className="flex justify-between py-4  leading-none">
                        <div>Subtotal</div>
                        <div>{formatCurrency(meta.sub_total)}</div>
                    </div>
                    <div className="flex justify-between py-4  leading-none">
                        <div>Shipping</div>
                        <div>{formatCurrency(meta.shipping)}</div>
                    </div>
                    <div className="flex justify-between py-4  leading-none">
                        <div>Tax ({meta.tax_percent} %)</div>
                        <div>{formatCurrency(meta.tax_amount)}</div>
                    </div>
                    {meta.discount && (
                        <div className="flex justify-between py-4 text-green-500 ">
                            <div className="flex items-center">
                                <button
                                    onClick={() =>
                                        handleClickRemoveDiscount(
                                            meta.discount.code
                                        )
                                    }
                                >
                                    <XIcon className="h-5 w-5 text-gray-400" />
                                </button>
                                <div className="ml-2">Descuento</div>
                            </div>
                            <div>-{formatCurrency(meta.discount.applied)}</div>
                        </div>
                    )}
                    <div className="flex justify-between pt-5 text-xl font-bold ">
                        <div>Total</div>
                        <div>{formatCurrency(meta.total)}</div>
                    </div>
                </div>
                
            </div>
            <form onSubmit={handleSubmitDiscount} className="flex mt-5">
                <input
                    onChange={(e) =>
                        applyDiscount.setData("code", e.target.value)
                    }
                    type="text"
                    className="flex-grow"
                />
                <button
                    disabled={applyDiscount.processing}
                    className="btn px-5 py-3 bg-yellow-500 text-white ml-3 disabled:opacity-50 "
                >
                    {applyDiscount.processing
                        ? "Cargando...."
                        : "Aplicar Cupon"}
                </button>
            </form>
            <span className="text-sm text-red-500">
                {errors.code && errors.code}
            </span>

            {meta.discount_availables && (
                <div className="space-x-3 mt-2">
                    {meta.discount_availables.map((item) => (
                        <span
                            key={item.code}
                            className="text-sm text-gray-400 "
                        >
                            {item.code} {item.active ? "1" : "0"}
                        </span>
                    ))}
                </div>
            )}
        </div>
    );
};

export default CartResumen;
