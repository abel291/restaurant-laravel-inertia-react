import { formatCurrency } from "@/helpers/helpers";
import { Link, useForm, usePage } from "@inertiajs/inertia-react";
import { useEffect, useRef } from "react";
import SelectQuantity from "../product/SelectQuantity";

const CartItem = ({ product }) => {
    const removeProductToCart = useForm();
    const addProductToCart = useForm({
        id: product.id,
        quantity: product.quantity,
    });

    const handleChangeQuantity = (newQuantity) => {
        addProductToCart.setData("quantity", newQuantity);
        
    };
    const handleClickRemoveItem = () => {
        removeProductToCart.delete(
            route("shopping-cart.destroy", { id: product.id }),
            { preserveScroll: true }
        );
    };

    const init = useRef(false);
    useEffect(() => {
        if (init.current === true) {
            addProductToCart.post(route("shopping-cart.store"), {
                preserveScroll: true,
            });
        }
        init.current = true;
    }, [addProductToCart.data.quantity]);

    return (
        <>
            <div
                className={
                    "grid grid-cols-12 gap-y-8  py-4 relative " +
                    (removeProductToCart.processing ||
                    addProductToCart.processing
                        ? "opacity-25"
                        : "")
                }
            >
                <div className="col-span-4 lg:col-span-2 min-h-16 ">
                    <img
                        src={"/storage/" + product.img}
                        alt={"img" + product.img}
                        className=" max-h-20 mx-auto"
                    />
                </div>

                <div className="col-span-8 lg:col-span-6 ">
                    <div className="my-auto">
                        <Link href={route("product", { slug: product.slug })}>
                            <h5 className="font-primary text-2xl">
                                {product.name}
                            </h5>
                        </Link>
                        <p className="font-light text-sm md:text-base mt-2">
                            {product.description_min}
                        </p>
                    </div>
                </div>

                <div className=" col-span-6 lg:col-span-2 ">
                    <div className="flex flex-col justify-between h-full">
                        <div className="w-auto">
                            <SelectQuantity
                                quantity={product.quantity}
                                stock={product.stock}
                                onChange={handleChangeQuantity}
                            />
                            <div>
                                {addProductToCart.errors.quantity && (
                                    <span className="text-sm text-red-500">
                                        {addProductToCart.errors.quantity}
                                    </span>
                                )}
                            </div>
                        </div>

                        {product.quantity > 1 && (
                            <div className="text-sm text-gray-500 mt-2">
                                1 x {formatCurrency(product.price)}
                            </div>
                        )}
                    </div>
                </div>

                <div className=" col-span-6 lg:col-span-2 text-right">
                    <div className="flex flex-col justify-between h-full">
                        <div className="font-primary text-2xl ">
                            {formatCurrency(product.quantity * product.price)}
                        </div>
                        <div className="text-sm text-red mt-2">
                            {removeProductToCart.errors &&
                                removeProductToCart.errors.message}
                        </div>
                        <button
                            className="text-sm text-blue-500 mt-2 font-medium text-right "
                            onClick={handleClickRemoveItem}
                            disabled={removeProductToCart.processing}
                        >
                            Remover
                        </button>
                    </div>
                </div>
            </div>
        </>
    );
};

export default CartItem;
