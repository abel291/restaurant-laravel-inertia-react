import BannerHero from "./BannerHero"

const PageLoading = () => {
    return (
        <main className="animate-pulse">
            <BannerHero />
            <div className="container  py-content">
            <div className="w-full md:w-64 py-5 bg-gray-100 rounded-lg">

            </div>
                <div className="grid grid-cols-4 gap-4 mt-4">
                    <div className=" col-span-2 h-44 bg-gray-100 rounded-lg"></div>
                    <div className=" col-span-2 h-44 bg-gray-100 rounded-lg"></div>

                    <div className="h-40 bg-gray-100 rounded-lg"></div>
                    <div className="h-40 bg-gray-100 rounded-lg"></div>
                    <div className="h-40 bg-gray-100 rounded-lg"></div>
                    <div className="h-40 bg-gray-100 rounded-lg"></div>
                    <div className="h-40 bg-gray-100 rounded-lg"></div>
                    <div className="h-40 bg-gray-100 rounded-lg"></div>
                    <div className="h-40 bg-gray-100 rounded-lg"></div>
                    <div className="h-40 bg-gray-100 rounded-lg"></div>
                </div>
            </div>
        </main>
    )
}

export default PageLoading
