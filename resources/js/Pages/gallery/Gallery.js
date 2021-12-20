import BannerHero from "@/componentss/BannerHero";
import AppLayout from "@/Layouts/AppLayout";
import GalleryImagesList from "./GalleryImagesList";

const Gallery = (props) => {
    return (
        <AppLayout>
            <BannerHero title={props.page.title} img={props.page.img} />
            <div className="container ">
                {props.galleries.map((gallery) => (
                    <GalleryImagesList key={gallery.slug} gallery={gallery} />
                ))}
            </div>
        </AppLayout>
    );
};

export default Gallery;
