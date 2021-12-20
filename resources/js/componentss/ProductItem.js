//import { ShoppingBagIcon } from "@heroicons/react/outline"

import { fomatCurrency } from "@/helpers/helpers";
import { Link } from "@inertiajs/inertia-react";

import Stars from "./Stars";

const ProductItem = ({ product }) => {
    return (
        <Link href={route('product',{ slug: product.slug })}>
            <div className="rounded-lg overflow-hidden  border border-gray-200 flex flex-col h-full bg-white">
                <div className="h-80 md:h-60 flex items-center justify-center">
                    <img
                        src={"/storage/" + product.img}
                        alt={product.img}
                        className="w-full max-h-full object-cover"
                    />
                </div>
                <div className=" flex flex-col justify-between py-6 px-5 bg-white flex-grow">
                    <div className="">
                        <div>
                            <Stars quantity={product.stars} />
                        </div>
                        <h5 className="mt-1 text-3xl lg:text-2xl font-primary text-gray-900  ">
                            {product.name}
                        </h5>
                        <p className="my-4 font-light lg:text-sm text-gray-500 line-clamp-2">
                            {product.description_min}
                        </p>
                    </div>
                    <div className="flex items-center justify-between">
                        <div className="bg-yellow-900 inline-block rounded py-2 px-3 ">
                            <h5 className="leading-none lg:leading-none text-yellow-400 font-primary font-bold text-2xl lg:text-xl ">
                                {fomatCurrency(product.price)}
                            </h5>
                        </div>
                        {/* <div className="badge badge-md bg-yellow-400 flex items-center ">
                            <ShoppingBagIcon className="h-5 w-5 lg:h-4 lg:w-4 mr-1 " />
                            <div className="text-base lg:text-sm font-bold leading-none">Agregar</div>
                        </div> */}
                    </div>
                </div>
            </div>
        </Link>
    );
};

export default ProductItem;
