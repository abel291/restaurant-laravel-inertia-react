import { MinusIcon, PlusIcon } from "@heroicons/react/solid"
const SelectQuantity = ({ quantity, stock, onChange = () => {} }) => {
    return (
        <>
            <div className="inline-flex items-stretch border border-gray-200 divide-x divide-gray-200 rounded-md">
                <button type="button"
                    disabled={quantity <= 1}
                    onClick={() => onChange(quantity - 1)}
                    className="active:bg-gray-50 flex items-center disabled:text-gray-200 disabled:cursor-auto disabled:bg-gray-50 text-black py-1 px-3"
                >
                    <MinusIcon className="h-4 w-4 " />
                </button>

                <div className=" py-2 px-5">{quantity}</div>

                <button type="button"
                    disabled={quantity >= stock}
                    onClick={() => onChange(quantity + 1)}
                    className="active:bg-gray-50 flex items-center disabled:text-gray-200 disabled:cursor-auto disabled:bg-gray-50 text-black py-1 px-3"
                >
                    <PlusIcon className="h-4 w-4" />
                </button>
            </div>
        </>
        // <select value={quantity} className="w-full font-bold" onChange={onChange}>
        //     {optionValues}
        // </select>
    )
}

export default SelectQuantity
