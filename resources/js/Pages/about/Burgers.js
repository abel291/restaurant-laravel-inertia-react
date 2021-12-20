


import { Link } from '@inertiajs/inertia-react';
const Burgers = () => {
    return (
        <div className="py-20 md:py-16 lg:py-24 bg-gray-200 text-center px-4">
            <div className="md:max-w-2xl lg:max-w-[920px] mx-auto">
                <h1 className="font-primary text-6xl lg:text-7xl px-[5%] leading-tight">
                    <span className="text-yellow-500 leading-none">BURGUES…</span>
                    ¿QUÉ MÁS?
                </h1>
                <p className="leading-normal font-light mt-5 lg:mt-10 text-lg lg:text-xl text-gray-500">
                    Porta semper lacus cursus, feugiat primis ultrice a ligula risus auctor an tempus feugiat dolor lacinia cubilia curae
                    integer orci congue and metus mollislorem primis in integer metus curae integer orci congue integer and primis in
                    integer metus mollis faucibus
                </p>

                <div className="grid grid-cols-2 md:grid-cols-6 gap-x-7 gap-y-10 md:gap-1 mt-9">
                    <div className="text-center">
                        <img className="w-20 h-20 md:w-16 md:h-16 inline-block  " src="/storage/icon/burger.png" alt="" />
                        <span className=" text-xl md:text-lg font-primary mt-5 block leading-none md:leading-none">burger</span>
                    </div>
                    <div className="text-center">
                        <img className="w-20 h-20 md:w-16 md:h-16 inline-block  " src="/storage/icon/fries.png" alt="" />
                        <span className=" text-xl md:text-lg font-primary mt-5 block leading-none md:leading-none">PAPAS</span>
                    </div>
                    <div className="text-center">
                        <img className="w-20 h-20 md:w-16 md:h-16 inline-block  " src="/storage/icon/chicken.png" alt="" />
                        <span className=" text-xl md:text-lg font-primary mt-5 block leading-none md:leading-none">pollo</span>
                    </div>
                    <div className="text-center">
                        <img className="w-20 h-20 md:w-16 md:h-16 inline-block  " src="/storage/icon/salads.png" alt="" />
                        <span className=" text-xl md:text-lg font-primary mt-5 block leading-none md:leading-none">ensaldas</span>
                    </div>
                    <div className="text-center">
                        <img className="w-20 h-20 md:w-16 md:h-16 inline-block  " src="/storage/icon/donut.png" alt="" />
                        <span className=" text-xl md:text-lg font-primary mt-5 block leading-none md:leading-none">POSTRES</span>
                    </div>
                    <div className="text-center">
                        <img className="w-20 h-20 md:w-16 md:h-16 inline-block  " src="/storage/icon/drink.png" alt="" />
                        <span className=" text-xl md:text-lg font-primary mt-5 block leading-none md:leading-none">BEBIDAS</span>
                    </div>
                </div>
                <div className="mt-12">
                <Link href={route('menu')} className="btn btn-lg bg-red-500 inline-block">Explorar menu</Link>
                    
                </div>
            </div>
        </div>
    )
}

export default Burgers
