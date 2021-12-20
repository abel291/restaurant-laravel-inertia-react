import BannerHero from "./BannerHero"

const PageError = ({codeError=404}) => {
    return (
        <main>
            <BannerHero title={codeError} />
            <div className="text-center text-lg py-28 font-medium font-primary">Pagina no encontrada</div>
        </main>
    )
}

export default PageError
