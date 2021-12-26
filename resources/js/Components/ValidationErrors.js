import React, { useEffect, useRef } from "react";

export default function ValidationErrors({ errors }) {
    const _isMounted = useRef(true);
    useEffect(() => {        
        if (Object.keys(errors).length) {
            let divError = document.getElementById("error-message");
            
            scroll({
                top: divError.offsetTop - 50,
                behavior: "smooth",
            });
        }
        return () => { // ComponentWillUnmount in Class Component
            _isMounted.current = false;
        }
    }, [errors]);
    return (
        Object.keys(errors).length > 0 && (
            <div id="error-message" className="mb-4 text-red-600">
                <div className="font-medium">¡Ups! Algo salió mal.</div>

                <ul className="mt-3 list-disc list-inside text-sm ">
                    {Object.keys(errors).map(function (key, index) {
                        return <li key={index}>{errors[key]}</li>;
                    })}
                </ul>
            </div>
        )
    );
}
