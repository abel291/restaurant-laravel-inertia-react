

const BannerDelivery = () => {
    return (
        <div
            className="py-16 md:py-20 lg:py-24 text-center  bg-center bg-cover bg-no-repeat"
            style={{ backgroundImage: "url(/storage/home/banner-delivery.jpg)" }}
        >
            <div className=" max-w-xl lg:max-w-2xl mx-auto">
                <h4 className="font-primary text-3xl lg:text-4xl leading-none font-light">WE GUARANTEE</h4>
                <h3 className="font-primary text-6xl lg:text-7xl leading-none mt-4 lg:mt-6">30 MINUTES DELIVERY!</h3>
                <p className="font-light text-base lg:text-xl mx-3 lg:mx-6 mt-4 lg:mt-6">
                    Aliquam a augue suscipit, luctus neque purus ipsum neque undo dolor primis libero tempus, blandit a cursus varius luctus
                    neque magna
                </p>
                <div className="mt-6 lg:mt-7">
                    <button className="btn btn-red btn-lg">Llama: 789-654-3210</button>
                </div>
            </div>
        </div>
    )
}

export default BannerDelivery
