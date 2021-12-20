import MenuItem from "./MenuItem"

const MenuList = ({title,products,img}) => {
    
    return (
        <div>
            <div className="text-center">
                <h3 className="title-section text-red-500">{title}</h3>
            </div>
            <div className="md:mt-8 lg:mt-16 lg:px-16">
                <div className="grid lg:grid-cols-2  gap-y-0 gap-x-10 md:gap-y-8  divide-y divide-gray-400 divide-dotted md:divide-none">
                    {products.map((product) => (
                        <div key={product.id} className="py-8 md:py-0 ">
                            <MenuItem key={product.id} product={product} />
                        </div>
                    ))}
                    
                </div>
                <div className="md:mt-8 lg:mt-16">
                    <img src={'/storage/'+img} alt="img banner" className="w-full" />
                </div>
            </div>
        </div>
    )
}

export default MenuList
