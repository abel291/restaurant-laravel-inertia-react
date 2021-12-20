const Information = () => {
    return (
        <div className="grid lg:grid-cols-3 gap-10">
            <div className="text-center">
                <h5 className="font-primary text-3xl">ubicación</h5>
                <p className="mt-5 font-light text-lg">
                    8721 M Central Avenue,
                    <br />
                    Los Angeles, CA 90036,
                    <br />
                    United States
                </p>
            </div>

            <div className="text-center">
                <h5 className="font-primary text-3xl">HORAS LABORALES</h5>
                <p className="mt-5 font-light text-lg">
                    Mon-Fri: 9:00AM - 10:00PM
                    <br />
                    Saturday: 10:00AM - 8:30PM
                    <br />
                    Sunday: 12:00PM - 5:00PM
                </p>
            </div>
            <div className="text-center">
                <h5 className="font-primary text-3xl">Telefonos</h5>
                <p className="mt-5 font-light text-lg">
                    P: +12 3 3456 7890
                    <br />
                    F: +12 9 8765 4321
                    <br />
                    E:{" "}
                    <a className="font-semibold yellow-color text-yellow-500" href="mailto:yourdoAppLayout@mail.com">
                        hello@yourdoAppLayout.com
                    </a>
                </p>
            </div>
        </div>
    )
}

export default Information
