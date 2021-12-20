import BannerHero from "@/componentss/BannerHero";
import AppLayout from "@/Layouts/AppLayout";
import MenuSectionList from "./MenuSectionList";

const Menu = (props) => {
    return (
        <AppLayout>
            <BannerHero
                img={props.page.img}
                title={props.page.title}
                breadcrumb="/ Menu"
            />
            <div className="container ">
                {props.menu.data.map((category) => (
                    <MenuSectionList key={category.slug} category={category} />
                ))}
            </div>
        </AppLayout>
    );
};

export default Menu;
