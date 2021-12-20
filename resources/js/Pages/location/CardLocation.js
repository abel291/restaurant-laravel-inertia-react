const CardLocation = ({ title, phone = "879-123-444", address, img }) => {
    return (
        <div>
            <div className="overflow-hidden">
                <img
                    src={ img}
                    alt={img}
                    className="object-cover w-full md:h-96 transition duration-500 transform hover:scale-110 hover:brightness-75  "
                />
            </div>
            <div className="py-9 px-5 text-center space-y-2">
                <h5 className=" font-primary text-red-500 text-3xl ">{title}</h5>
                <h6 className="font-primary text-2xl">Telefono: {phone}</h6>
                <h6 className="font-primary text-2xl">Direccion</h6>
                <p className="text-lg">{address}</p>
            </div>
        </div>
    )
}

export default CardLocation
