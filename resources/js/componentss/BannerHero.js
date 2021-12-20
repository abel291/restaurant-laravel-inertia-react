const BannerHero = ({ title = "...", img, breadcrumb='' }) => {
    return (
        <div className="pb-content ">
            <div className="pt-20 pb-20 lg:pt-36 lg:pb-32 relative z-[-1] bg-gray-200">
                <div className="text-center text-white  ">
                    <div className="text-sm font-roboto font-bold uppercase leading-none">{breadcrumb}</div>
                    <h2 className="title-section mt-4">{title}</h2>
                </div>
                <div className="absolute inset-0 z-[-1]">
                    <img src={'/storage/'+img} alt="" className=" max-h-full w-full object-cover brightness-50" />
                </div>
            </div>
        </div>
    )
}

export default BannerHero
