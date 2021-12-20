import BannerHero from "@/componentss/BannerHero"
import AppLayout from "@/Layouts/AppLayout"
import FaqItem from "./FaqItem"

const Faq = (props) => {
    
    return (
        <AppLayout>
            <BannerHero img={props.page.img} title={props.page.title} />
            <div className="container py-content">
                <div className="grid grid-cols-1 md:grid-cols-2   gap-x-6 gap-y-8 md:gap-y-12 ">
                    {[1, 2, 3, 4, 5, 6, 7, 8].map((item) => (
                        <FaqItem key={item} item={item} />
                    ))}
                </div>
            </div>
        </AppLayout>
    )
}

export default Faq
