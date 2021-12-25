import SpinnerLoad from "@/componentss/SpinnerLoad";
import React from "react";

export default function Button({
    type = "submit",
    className = "",
    processing,
    children,
}) {
    return (
        <button type={type} className={"btn  bg-yellow-500 btn-sm disabled:opacity-50 "+className} disabled={processing} >
            {children}
        </button>
    );
}
