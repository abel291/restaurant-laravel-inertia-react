import BannerHero from "@/componentss/BannerHero"
import AppLayout from "@/Layouts/AppLayout"
//import Form from "./Form"
import Information from "./Information"
import MapFrime from "./MapFrime"
const Contact = (props) => {
    return (
        <AppLayout>
            <BannerHero img={props.page.img} title={props.page.title} />
            <div className="container py-content">
                <div className="py-content">
                    <Information />
                </div>
                <div className="py-content">
                    <MapFrime />
                </div>
                <div className="py-content">
                    {/* <Form /> */}
                </div>
            </div>
        </AppLayout>
    )
}

export default Contact
