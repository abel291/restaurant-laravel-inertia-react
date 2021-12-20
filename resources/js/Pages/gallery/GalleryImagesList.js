import FsLightbox from "fslightbox-react"
import { useState } from "react"

const GalleryImagesList = ({ gallery }) => {
    
    const [lightboxController, setLightboxController] = useState({
        toggler: false,
        slide: 0,
    })
    
    const openLightboxOnSlide = (number) => {
        setLightboxController({
            toggler: !lightboxController.toggler,
            slide: number+1,
        })       
    }   

    return (
        <div className="py-content">
            <div className="text-center">
                <h3 className="title-section text-red-500">{gallery.name}</h3>
            </div>
            <div className="grid grid-cols-1 md:grid-cols-2  lg:grid-cols-4 gap-4 mt-9 lg:mt-16">
                {gallery.images.map((image,index) => (
                    <div
                        key={image.id}
                        className="cursor-pointer relative rounded overflow-hidden shadow-md galleries-image-hover"
                        onClick={() => openLightboxOnSlide(index)}
                    >
                        <img src={'/storage/'+image.img} alt={image.slug} className="object-cover w-full md:h-64  " />
                        <div className=" absolute inset-x-0 opacity-0 p-5 ">
                            <div className="text-white font-primary text-2xl">{image.title}</div>
                        </div>
                    </div>
                ))}
            </div>
            <FsLightbox
                toggler={lightboxController.toggler}
                sources={gallery.images.map((image) => '/storage/'+image.img)}
                slide={lightboxController.slide}
            />
        </div>
    )
}

export default GalleryImagesList
