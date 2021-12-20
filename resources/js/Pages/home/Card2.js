import { Link } from "@inertiajs/inertia-react"


const Card2 = ({ title, subTitle, path, img }) => {
    return (
        <div className="pb-12 pt-12 md:pb-12 md:pt-24 lg:pb-12 lg:pt-44 flex flex-col items-center justify-end rounded-lg text-white relative overflow-hidden bg-gray-100">
            <div className="text-center z-10">
                <h3 className="text-3xl  lg:text-4xl leading-none font-primary ">{title}</h3>
                <p className=" text-base lg:text-lg leading-none  mt-3">{subTitle}</p>

                <div className="mt-4">
                    <a to={path} className="btn btn-red btn-sm">
                        Conoce mas
                    </a>
                </div>
            </div>
            <div className="absolute inset-0 z-0">
                <img src={'/storage/'+img} alt="" className=" max-h-full w-full object-cover brightness-75" />
            </div>
        </div>
    )
}

export default Card2
