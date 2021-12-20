import BannerHero from "@/componentss/BannerHero"
import CardSection from "@/componentss/CardSection"
import Subscribe from "@/componentss/Subscribe"
import AppLayout from "@/Layouts/AppLayout"

import Burgers from "./Burgers"
import Section1 from "./Section1"
import Section2 from "./Section2"

const About = (props) => {
    

    return (
        <AppLayout>
            <BannerHero title={props.page.title} img={props.page.img}/>
            <div className="container py-content">
               <Section1/>
            </div>
            <div className="py-content">
                <Burgers />
            </div>
            <div className="container py-content">
                <Section2/>
            </div>
            <div className=" px-0 mx-3 py-content  ">
                <CardSection />
            </div>
            <div className="container py-content">
                <Subscribe />
            </div>
        </AppLayout>
    )
}

export default About
