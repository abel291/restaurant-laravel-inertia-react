import Button from "@/Components/Button";
import Input from "@/Components/Input";
import Label from "@/Components/Label";
import { useForm } from "@inertiajs/inertia-react";
import MyAccount from "./MyAccount";

const AccountDetails = (props) => {
    const { data, setData, processing, post } = useForm({
        name: props.auth.user.name,
        phone: props.auth.user.phone,
        email: props.auth.user.email,
        email_confirmation: props.auth.user.email,
        city: props.auth.user.city,
        address: props.auth.user.address,
    });
    const handleSubmit = async (e) => {
        e.preventDefault();
    };
    const onHandleChange = (event) => {
        setData(event.target.name, event.target.value);
    };
    return (
        <MyAccount active="account-details">
            <div className="space-y-2">
                <h3 className="font-bold text-2xl mb-6"> Detalles de Cuenta</h3>

                <form onSubmit={handleSubmit}>
                    <div className="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                        <div>
                            <Label
                                forInput="email"
                                value="Nombre y Apellido *"
                            />
                            <Input
                                className="w-full mt-1"
                                onChange={onHandleChange}
                                name="name"
                                value={data.name}
                            />
                        </div>
                        <div>
                            <Label forInput="email" value="Telefono *" />
                            <Input
                                className="w-full mt-1"
                                onChange={onHandleChange}
                                name="phone"
                                value={data.phone}
                            />
                        </div>
                        <div>
                            <Label forInput="email" value="Email *" />
                            <Input
                                className="w-full mt-1"
                                type="email"
                                onChange={onHandleChange}
                                name="email"
                                value={data.email}
                            />
                        </div>

                        <div>
                            <Label forInput="email" value="Confirmar Email *" />
                            <Input
                                className="w-full mt-1"
                                type="email"
                                onChange={onHandleChange}
                                value={data.email_confirmation}
                                name="email_confirmation"
                            />
                        </div>
                        <div>
                            <Label forInput="email" value="Ciudad *" />
                            <Input
                                className="w-full mt-1"
                                onChange={onHandleChange}
                                name="city"
                                value={data.city}
                            />
                        </div>
                        <div className="md:col-span-2">
                            <Label forInput="email" value="Direccion *" />
                            <Input
                                className="w-full mt-1"
                                onChange={onHandleChange}
                                name="address"
                                value={data.address}
                            />
                        </div>
                    </div>
                    <Button processing={processing}>Guardar</Button>
                </form>
            </div>
        </MyAccount>
    );
};

export default AccountDetails;
