
import Card2 from "../Pages/home/Card2"
const routes={}
const CardSection = () => {
    return (
        <div className="grid md:grid-cols-3 lg:grid-cols-4 gap-3">
            <div>
                <Card2 
                title="CARRERA" 
                subTitle="¿Quieres unirte a nuestro equipo?" 
                path='/' 
                img="home/team.jpg" 

                />
            </div>
            <div className="lg:col-span-2">
                <Card2 
                    title="ORDENA AHORA" 
                subTitle="¡Disfruta una Burger en casa!" 
                path='/' 
                img="home/order.jpg" 
                />
            </div>
            <div>
                <Card2
                  title="TARJETAS REGALO" 
                subTitle="¡Regala Yummy!" 
                path='/' 
                img="home/gift-card.jpg"  />
            </div>
        </div>
    )
}

export default CardSection
