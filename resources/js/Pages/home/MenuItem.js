import { fomatCurrency } from "@/helpers/helpers"
import { Link } from "@inertiajs/inertia-react"




const MenuItem = ({ product }) => {
    return (
        <div className="flex flex-col md:flex-row justify-between">
            <div className="md:mr-4 text-center md:text-left flex-grow">
                <div className="flex  md:text-left justify-center md:justify-start ">
                    <a to={"/product/"+ product.slug}>
                        <h5 className=" font-primary text-3xl md:text-2xl md:mr-1 leading-none">{product.name}</h5>
                    </a>
                    <div className="hidden md:inline-block border-b-2 border-gray-400 border-dotted flex-grow"></div>
                </div>

                <p className="text-base font-light mt-4 md:mt-3 line-clamp-2">{product.description_min}</p>
            </div>
            <div className="flex md:flex-col flex-row justify-center md:justify-start items-center md:items-end mt-4 md:mt-0 ">
                <h5 className="mr-4 md:mr-1 font-primary text-2xl  leading-none md:leading-normal whitespace-nowrap">
                {fomatCurrency(product.price)}
                </h5>

                <div className="badge badge-sm md:mt-3 text-right bg-gray-200 text-gray-500 font-primary">{product.portion_size}</div>
            </div>
        </div>
    )
}

export default MenuItem
