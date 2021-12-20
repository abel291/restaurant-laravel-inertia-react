import BannerHero from "@/componentss/BannerHero"
import AppLayout from "@/Layouts/AppLayout"
import TeamItem from "./TeamItem"
import people from "./people.json"
const Team = (props) => {
    

    return (
        <AppLayout>
            <BannerHero img={props.page.img} title={props.page.title} />
            <div className="container py-content">
                <div className="grid grid-cols-1 md:grid-cols-2  lg:grid-cols-4 gap-6 ">
                    {people.map((person) => (
                        <TeamItem person={person} />
                    ))}
                </div>
            </div>
        </AppLayout>
    )
}

export default Team
