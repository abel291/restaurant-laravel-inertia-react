import { StarIcon } from "@heroicons/react/outline"
import { StarIcon as StarIconSolid } from "@heroicons/react/solid"
const Stars = ({ quantity_stars  }) => {
    const stars = []

    for (let i = 0; i < 5; i++) {
        if (i < quantity_stars) {            
            stars.push(<StarIconSolid key={i} className=" h-6 w-6 text-yellow-400 leading-none" />)
        } else {
            stars.push(<StarIcon key={i} className=" h-6 w-6 text-yellow-400 leading-none" />)
        }
    }

    return <div className="flex space-x-0">{stars}</div>
}

export default Stars
