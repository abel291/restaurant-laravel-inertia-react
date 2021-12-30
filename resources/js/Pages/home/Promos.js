import Card from "./Card";

const Promos = ({ promos }) => {
    return (
        promos.data && (
            <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
                {promos.data.map((promo,index) => (
                    <div key={index}>
                        <Card
                            title={promo.title}
                            subTitle={promo.sub_title}
                            img={promo.img}
                            url={promo.product_url}
                        />
                    </div>
                ))}
            </div>
        )
    );
};

export default Promos;
