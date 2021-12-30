import { Link } from "@inertiajs/inertia-react"


const Card = ({ title, subTitle, img, url="/" }) => {
    return (
        <Link href={url}>
            <div
                className="px-6  pt-10 pb-10 lg:pt-20 lg:pb-12 rounded-lg relative overflow-hidden bg-center bg-cover bg-no-repeat"
                style={{ backgroundImage: "url(/storage/" + img + ")" }}
            >
                <div className="flex flex-col justify-between items-end">
                    <div className="text-right">
                        <h4 className="text-4xl text-yellow-900 font-light font-primary  leading-none">{title}</h4>
                        <h4 className="text-[2.37rem] text-yellow-900  font-primary mt-3 leading-none">{subTitle}</h4>
                    </div>
                    <div className="mt-6">
                        <button className="btn btn-red btn-sm">Conoce mas</button>
                    </div>
                </div>
            </div>
        </Link>
    )
}

export default Card
