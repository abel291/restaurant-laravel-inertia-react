import { formatCurrency } from "@/helpers/helpers";
import { Link } from "@inertiajs/inertia-react";

const GiftCardsItem = ({ card }) => {
    return (
        <div className="text-center">
            <img
                src={"/storage/" + card.img}
                alt="gift-card"
                className="w-full"
            />

            <h5 className="mt-6 text-3xl font-primary">
                {formatCurrency(card.price)} Gift Card
            </h5>

            <p className="mt-3 font-light text-lg px-[5%]">
                {card.description_min}
            </p>

            <Link href={route('product',{ slug: card.slug })}  className="btn btn-sm bg-red-500 text-white mt-4">
                Añadir al carrito
            </Link>
        </div>
    );
};

export default GiftCardsItem;
