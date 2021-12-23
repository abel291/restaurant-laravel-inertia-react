import { useForm, usePage } from "@inertiajs/inertia-react";
import { useEffect, useRef, useState } from "react";
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
import Button from "@/Components/Button";

const Form = ({ onsubmit }) => {
    const { auth } = usePage().props;
    const nameCreditCard = useRef();
    const [loading, setLoading] = useState(false);
    const { data, setData, post, processing, errors } = useForm({
        name: auth.user.name,
        address: auth.user.address,
        phone: auth.user.phone,
        email: auth.user.email,
        city: auth.user.city,
        postalCode: auth.user.postalCode,
        note: auth.user.note,
        note: auth.user.note,
        paymentMethod: "",
    });

    const [errorStripe, setErrorStripe] = useState({});
    const stripe = useStripe();
    const elements = useElements();

    const onHandleChange = (e) => {
        let target = e.target;
        setData(target.name, target.value);
    };

    const handleSubmit = async (event) => {
        event.preventDefault();

        setErrorStripe({});
        setLoading(true);

        if (elements == null) {
            return;
        }

        if (!nameCreditCard.current.value) {
            setErrorStripe({
                nameCreditCard:
                    "El nombre del titular de la targeta de credito es requerido",
            });
        }

        const { error, paymentMethod } = await stripe.createPaymentMethod({
            type: "card",
            card: elements.getElement(CardElement),
            billing_details: {
                name: nameCreditCard.current.value,
            },
        });

        if (error) {
            setLoading(false);
            console.log("[error]", error);
            if (error.type === "validation_error") {
                setErrorStripe({ stripe: error.message });
            } else {
                setErrorStripe({
                    stripe: "Al parecer hubo un error! El pago a través de su targeta no se pudo realizar.",
                });
            }
        } else {
            setData("paymentMethod", paymentMethod.id);
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
            post("/checkout", { preserveScroll: true });
        }
    }, [data.paymentMethod]);
    
    useEffect(() => {
        setLoading(processing);
    }, [processing]);

    return (
        <form
            className="grid grid-cols-1 md:grid-cols-2 gap-4"
            onSubmit={handleSubmit}
        >
            <div className="md:col-span-2">
                <ValidationErrors errors={errors} />
            </div>

            <div>
                <Label forInput="name" value="Nombre" />
                <input
                    className="mt-1 w-full"
                    type="text"
                    disabled
                    defaultValue={data.name}
                />
            </div>

            <div>
                <Label forInput="email" value="Email" />

                <input
                    className="mt-1 w-full"
                    type="email"
                    disabled
                    defaultValue={data.email}
                />
            </div>

            <div className="md:col-span-2">
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

            <div>
                <Label forInput="phone" value="Telefono" />

                <Input
                    className="mt-1"
                    type="text"
                    name="phone"
                    required
                    handleChange={onHandleChange}
                    value={data.phone}
                />
            </div>

            <div className="md:col-span-2">
                <Label forInput="note" value="Nota" />

                <textarea
                    name="note"
                    onChange={onHandleChange}
                    className="mt-1 w-full text-sm px-4 py-3"
                    rows="5"
                    value={data.note}
                />
            </div>

            <div>
                <Label
                    forInput="nameCreditCard"
                    value="Titular de la Targeta de credito"
                />
                <input
                    className="w-full mt-1"
                    id="nameCreditCard"
                    type="text"
                    ref={nameCreditCard}
                    defaultValue={data.name}
                />
                {errorStripe.nameCreditCard && (
                    <div>
                        <span className="text-red-500 text-sm font-medium">
                            {errorStripe.nameCreditCard}
                        </span>
                    </div>
                )}
            </div>

            <div className="md:col-span-2">
                <Label forInput="note" value="Targeta de credito" />
                <div className="content_stripe py-3 mt-1">
                    <CardElement options={options} />
                </div>
                {errorStripe.stripe && (
                    <div>
                        <span className="text-red-500 text-sm font-medium">
                            {errorStripe.stripe}
                        </span>
                    </div>
                )}
            </div>
            <div className="md:col-span-2 text-right">
                <Button processing={loading}>
                    <div className="flex items-center">
                        <CashIcon className="h-5 w-5 mr-2" />
                        <span>Proceder a pago</span>
                    </div>
                </Button>
            </div>
        </form>
    );
};

export default Form;
