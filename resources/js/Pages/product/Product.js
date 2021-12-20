import BannerHero from "@/componentss/BannerHero"
import AppLayout from "@/Layouts/AppLayout"
import Description from "./Description"

import Feature from "./Feature"
import Images from "./Images"
import RelatedProducts from "./RelatedProducts"


const Product = (props) => {
 

    return (
        <AppLayout>
            <BannerHero title={props.product.data.name} img={props.product.data.banner} />
            <div className="container  max-w-7xl">
                <div className="py-content">
                    <div className="flex flex-wrap ">
                        <div className="w-full lg:w-7/12">
                            <Images img={props.product.data.img} images={props.product.data.images} />
                        </div>
                        <div className="w-full lg:w-5/12 lg:pl-10 mt-12 lg:mt-0">
                            <Feature product={props.product.data} />
                        </div>
                    </div>
                </div>
                <div className="py-content">
                    <Description description={props.product.data.description_max} />
                </div>
            </div>
            <div className="pt-content">
                <RelatedProducts products={props.related_products.data} />
            </div>
        </AppLayout>
    )
}

export default Product
