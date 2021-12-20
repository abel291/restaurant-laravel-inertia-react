import ProductItem from "@/componentss/ProductItem"


const RelatedProducts = ({products}) => {
    return (
        <div className="bg-gray-100 py-content">
            <div className="container">
                <div className="max-w-2xl mx-auto text-center ">
                    <h2 className="title-section">PRODUCTOS RELACIONADOS</h2>
                    <p className="font-light text-lg lg:text-xl text-gray-600 mt-2 lg:mt-10 ">
                        Aliquam a augue suscipit, luctus neque purus ipsum neque undo dolor primis libero tempus, blandit a cursus varius
                        magna
                    </p>
                </div>
                <div className="py-content grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                    {products.map((product) => (
                        <ProductItem product={product} key={product.id} />
                    ))}
                </div>
            </div>
        </div>
    )
}

export default RelatedProducts
