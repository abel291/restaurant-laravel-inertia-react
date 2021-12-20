import Card from "./Card";

const Promos = ({ promos }) => {
    return (
        <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
            {promos.map((promo) => (
                <div key={promo.title}>
                    <Card
                        title={promo.title}
                        subTitle={promo.sub_title}
                        img={promo.img}
                        path={promo.img}
                    />
                </div>
            ))}
        </div>
    );
};

export default Promos;
