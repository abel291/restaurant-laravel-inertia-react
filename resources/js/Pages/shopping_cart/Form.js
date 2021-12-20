import { useForm, usePage } from "@inertiajs/inertia-react";
import { useEffect, useState } from "react";
import StripeInput from "./StripeInput";
import { loadStripe } from "@stripe/stripe-js";
import {
    CardElement,
    Elements,
    useElements,
    useStripe,
} from "@stripe/react-stripe-js";
import { CashIcon } from "@heroicons/react/outline";
import { Inertia } from "@inertiajs/inertia";
import Label from "@/Components/Label";
import Input from "@/Components copy/Input";
import ValidationErrors from "@/Components/ValidationErrors";

const Form = ({ onsubmit }) => {
    const { auth } = usePage().props;
    const { data, setData, post, processing, errors } = useForm({
        name: '',
        address: auth.user.address,
        phone: auth.user.phone,
        email: auth.user.email,
        city: auth.user.city,
        postalCode: auth.user.postalCode,
        note: auth.user.note,
        note: auth.user.note,
        paymentMethod: "",
    });

    const [errorStripe, setErrorStripe] = useState("");
    const stripe = useStripe();
    const elements = useElements();

    const onHandleChange = (e) => {
        let target = e.target;
        setData(target.name, target.value);
    };

    const handleSubmit = async (event) => {
        event.preventDefault();
        
        setErrorStripe("");
        post("/checkout",{ preserveScroll: true,});
        return
        if (elements == null) {
            return;
        }

        const { error, paymentMethod } = await stripe.createPaymentMethod({
            type: "card",
            card: elements.getElement(CardElement),
        });

        if (error) {
            console.log("[error]", error);
            if (error.type === "validation_error") {
                setErrorStripe(error.message);
            } else {
                setErrorStripe(
                    "Al parecer hubo un error! El pago a través de su targeta no se pudo realizar."
                );
            }
        } else {
            setData("paymentMethod", paymentMethod);
           
        }
    };
    const options = {
        style: {
            base: {
                color: "#303238",
                fontSize: "16px",
                fontFamily: '"Roboto", sans-serif',
                fontSmoothing: "antialiased",
                "::placeholder": {
                    color: "#CFD7DF",
                },
            },
            invalid: {
                color: "#e5424d",
                ":focus": {
                    color: "#303238",
                },
            },
        },
    };

    useEffect(() => {
        if (data.paymentMethod) {
            post("/checkout");
        }
    }, [data.paymentMethod]);

    return (
        <form
            className="grid grid-cols-1 md:grid-cols-2 gap-4"
            onSubmit={handleSubmit}
        >
            <div className="md:col-span-2 ">
            <ValidationErrors errors={errors} />
            </div>
            <div>
                <Label forInput="name" value="Nombre" />

                <Input
                    className="mt-1"
                    type="text"
                    name="name"
                    
                    handleChange={onHandleChange}
                    value={data.name}
                />
            </div>
            <div className=" ">
                <Label forInput="email" value="Email" />

                <Input
                    className="mt-1"
                    type="email"
                    name="email"
                    required
                    handleChange={onHandleChange}
                    value={data.email}
                />
            </div>
            <div className=" md:col-span-2 ">
                <Label forInput="address" value="Direccion" />

                <Input
                    className="mt-1"
                    type="text"
                    name="address"
                    required
                    handleChange={onHandleChange}
                    value={data.address}
                />
            </div>
            <div className=" ">
                <Label forInput="phone" value="Telefono" />

                <Input
                    className="mt-1"
                    type="text"
                    name=""
                    required
                    handleChange={onHandleChange}
                    value={data.phone}
                />
            </div>
            <div className=" ">
                <Label forInput="city" value="Ciudad" />

                <Input
                    className="mt-1"
                    type="text"
                    name="city"
                    required
                    handleChange={onHandleChange}
                    value={data.city}
                />
            </div>
            <div className="md:col-span-2 ">
                <Label forInput="note" value="Nota" />

                <textarea
                    name="note"
                    onChange={onHandleChange}
                    className="mt-1 w-full text-sm px-4 py-3"
                    rows="5"
                    value={data.note}
                />
            </div>
            <div className="md:col-span-2">
                <Label forInput="note" value="Targeta de credito" />
                <div className="content_stripe py-3 mt-1">
                    <CardElement options={options} />
                </div>
                {errorStripe && (
                    <div>
                        <span className="text-red-500 text-sm font-medium">
                            {errorStripe}
                        </span>
                    </div>
                )}
            </div>
            <div className="md:col-span-2 text-right">
                <button
                    className="btn btn-sm bg-red-500 text-white "
                    disabled={processing}
                >
                    <div className="flex items-center">
                        <CashIcon className="h-5 w-5 mr-2" />
                        <span>Proceder a pago</span>
                    </div>
                </button>
            </div>
        </form>
    );
};

export default Form;
