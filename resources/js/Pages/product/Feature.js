import Stars from "@/componentss/Stars";
import { fomatCurrency } from "@/helpers/helpers";
import { ShoppingBagIcon } from "@heroicons/react/solid";
import { Link, useForm } from "@inertiajs/inertia-react";
import SelectQuantity from "./SelectQuantity";

const Feature = ({ product }) => {
    const { data, setData, post, processing, errors } = useForm({
        id: product.id,
        quantity: 1,
    });
    function submit(e) {
        e.preventDefault();
        post(route("shopping-cart.store"));
    }
    const handleChangeQuantity = (newQuantity) => {
        setData("quantity", newQuantity);
    };

    return (
        <div className="space-y-3 lg:space-y-5">
            <h1 className="title-section">{product.name}</h1>
            <div>
                <Stars quantity_stars={product.stars} />
            </div>
            <div className="text-3xl  lg:text-4xl font-primary">
                <span className=" text-yellow-400 ml-4">
                    {fomatCurrency(product.price)}
                </span>
            </div>

            <p className="font-light text-lg">{product.descripction_min}</p>

            <div className="divide-y divide-gray-200">
                {product.portion_size && (
                    <div className="flex items-center justify-between py-3">
                        <div className="font-bold">Tamaño de porcion</div>
                        <div>{product.portion_size}</div>
                    </div>
                )}
                {product.calories && (
                    <div className="flex items-center justify-between py-3">
                        <div className="font-bold">Calorias</div>
                        <div>{product.calories}</div>
                    </div>
                )}
                {product.allergies && (
                    <div className="flex items-center justify-between py-3">
                        <div className="font-bold">Alergias</div>
                        <div>{product.allergies}</div>
                    </div>
                )}
            </div>
            <form onSubmit={submit}>
                <div className="md:flex md:items-center md:justify-between">
                    <div>
                        <SelectQuantity
                            quantity={data.quantity}
                            stock={product.stock}
                            onChange={handleChangeQuantity}
                        />
                    </div>

                    <button
                        className="flex items-center bg-yellow-400 py-3 px-8 rounded justify-center md:justify-start disabled:opacity-50 mt-3 md:mt-0"
                        disabled={processing}
                    >
                        {processing && (
                            <span className=" leading-none font-bold ml-2">
                                Agregando....
                            </span>
                        )}

                        {!processing && (
                            <>
                                <ShoppingBagIcon className="h-5 w-5" />
                                <span className=" leading-none font-bold ml-2">
                                    Añadir al carrito
                                </span>
                            </>
                        )}
                    </button>
                </div>
            </form>
            <div>
                {errors.id && (
                    <span className="text-sm text-red">{errors.id}</span>
                )}
                {errors.slug && (
                    <span className="text-sm text-red">{errors.slug}</span>
                )}
            </div>
            <div>
                <ul className="font-light list-disc  space-y-1 text-md mt-6 lg:mt-10 ml-4">
                    <li>
                        Aceptamos tarjetas de crédito o efectivo a mensajería
                    </li>
                    <li>El costo de envío es de $ 2 (Gratis desde $ 35)</li>
                    <li>Pedido antes del mediodía para envío el mismo día</li>
                </ul>
            </div>
        </div>
    );
};

export default Feature;
