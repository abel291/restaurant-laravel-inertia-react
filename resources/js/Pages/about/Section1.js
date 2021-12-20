const Section1 = () => {
    return (
        <div className="grid grid-cols-1 md:grid-cols-2 md:gap-x-7 lg:gap-x-10">
            <div>
                <img src="/storage/about/about-1.png" alt="dd" className="w-full rounded-lg" />
            </div>
            <div className="mt-8 lg:mt-12 lg:pr-6">
                <h2 className="font-primary text-4xl lg:text-5xl lg:leading-tight ">NADA UNE A LA GENTE COMO UNA BUENA HAMBURGUESA</h2>

                <p className=" leading-normal font-light text-lg mt-8">
                    Semper lacus cursus porta primis ligula risus tempus and sagittis ipsum mauris lectus laoreet purus ipsum tempor enim
                    ipsum porta justo integer ultrice aligula lectus aenean magna and pulvinar purus at pretium gravida                    
                </p>
                <ul className=" ml-4 mt-5 style list-disc space-y-3">
                        <li>Fringilla risus, luctus mauris orci auctor purus euismod pretium purus pretium ligula rutrum tempor sapien </li>
                        <li>Quaerat sodales sapien euismod purus blandit quaerat</li>
                        <li>Nemo ipsam egestas volute turpis dolores ut aliquam sodales sapien undo pretium a purus mauris</li>
                    </ul>
            </div>
        </div>
    )
}

export default Section1
