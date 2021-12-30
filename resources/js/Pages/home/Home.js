import BannerHero from "../../componentss/BannerHero"
import ProductItem from "../../componentss/ProductItem"
import Promo from "../../componentss/ThreeCards"
import BannerDelivery from "./BannerDelivery"
import MenuList from "./MenuList"
import AppLayout from "@/Layouts/AppLayout"
import Promos from "./Promos"

const Home = (props) => {
    
    return (
        <AppLayout>
            <BannerHero img={props.page.img} title={props.page.title} />
            <div className="container ">
                <div className=" py-content">
                    <Promos promos={props.promos}/>
                </div>
                <div className=" py-content">
                    <div className="text-center">
                        <h3 className="title-section text-red-500">EXPLORA NUESTRO MENÚ</h3>
                    </div>
                    <div className="grid md:grid-cols-2 lg:grid-cols-4 gap-6 md:mt-8 lg:mt-16">
                        {props.products_featured.data.map((product) => (
                            <ProductItem product={product} key={product.id} />
                        ))}
                    </div>
                </div>
            </div>
            <div className=" px-0 mx-3 py-content  ">
                <Promo />
            </div>
            <div className="container   ">
                {props.menus.data.map((category, index) => (
                    <div className="py-content" key={index}>
                        <MenuList title={category.name} products={category.products} img={category.img} />
                    </div>
                ))}
            </div>
            <div className=" pt-content">
                <BannerDelivery />
            </div>
        </AppLayout>
    )
}

export default Home
