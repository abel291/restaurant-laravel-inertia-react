import BannerHero from "@/componentss/BannerHero"
import AppLayout from "@/Layouts/AppLayout"
import CardLocation from "./CardLocation"


const Location = (props) => {
    return (
        <AppLayout>
            <BannerHero img={props.page.img} title={props.page.title} />
            <div className="container py-content">
                <div className="grid grid-cols-1 md:grid-cols-3 gap-5">
                    <CardLocation
                        title="DOWNTOWN"
                        address="8721 M Central Avenue,los Angeles, CA 90036 Daily 11AM - 10PM"
                        img="/storage/locations/img-1.jpg"
                    />
                    <CardLocation
                        title="CENTRAL CITY"
                        address="8721 M Central Avenue,los Angeles, CA 90036 Daily 11AM - 10PM"
                        img="/storage/locations/img-2.jpg"
                    />
                    <CardLocation
                        title="HOLLYWOOD"
                        address="8721 M Central Avenue,los Angeles, CA 90036 Daily 11AM - 10PM"
                        img="/storage/locations/img-3.jpg"
                    />
                </div>
            </div>
        </AppLayout>
    )
}

export default Location
