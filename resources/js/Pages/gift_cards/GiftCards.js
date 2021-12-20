import BannerHero from "@/componentss/BannerHero"
import AppLayout from "@/Layouts/AppLayout"
import GiftCardsItem from "./GiftCardsItem"
const GiftCards = (props) => {
    
    return (
        <AppLayout>
            <BannerHero img={props.page.img} title={props.page.title} />
            <div className="container">
                <div className="max-w-xl mx-auto text-center py-content">
                    <h3 className="title-section">SELECCIONA TU TARJETA</h3>
                    <p className="font-light text-lg mt-5">
                        Aliquam a augue suscipit, luctus neque purus ipsum neque undo dolor primis libero tempus, blandit a cursus varius
                        magna
                    </p>
                </div>

                <div className="grid grid-cols-1 md:grid-cols-3 gap-10 py-content">
                    {props.cards.map((card) => (
                        <GiftCardsItem key={card.id} card={card} />
                    ))}
                </div>
            </div>
        </AppLayout>
    )
}

export default GiftCards
