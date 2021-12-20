const Subscribe = () => {
    return (
        <div className=" bg-gray-100 ">
            <div className="lg:max-w-3xl mx-auto pt-14 pb-5 px-6 text-center">
                <h3 className="text-3xl lg:text-5xl font-primary">SUSCRÍBETE AL BOLETÍN</h3>
                <p className="text-lg md:text-base lg:text-lg mt-3 text-gray-500">
                    Suscríbase al boletín semanal para recibir las últimas actualizaciones
                </p>
                <div className="mt-6 flex flex-col md:flex-row">
                    <input className="w-full flex-grow  h-14 rounded px-5 border border-gray-300 outline-none" type="text" />
                    <button className=" w-full md:w-auto px-14  h-14 mt-4 md:mt-0 rounded bg-[#e3000e] font-primary text-lg text-white md:ml-3">
                        inscribirse
                    </button>
                </div>
                <div className="text-red-500 mt-5 text-lg invisible">Please enter your email address</div>
            </div>
        </div>
    )
}

export default Subscribe
