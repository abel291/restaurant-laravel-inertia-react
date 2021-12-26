import { CheckCircleIcon, XIcon } from "@heroicons/react/solid";
import { usePage } from "@inertiajs/inertia-react";
import { useEffect, useRef, useState } from "react";

const NotificationSuccess = () => {
    const { flash } = usePage().props;
    const _isMounted = useRef(true);
    useEffect(() => {
        if (flash.success) {
            let divError = document.getElementById("success-message");
            scroll({
                top: divError.offsetTop - 50,
                behavior: "smooth",
            });
        }
        return () => {
            // ComponentWillUnmount in Class Component
            _isMounted.current = false;
        };
    }, [flash.success]);

    return (
        flash.success && (
            <div
                id="success-message"
                className="bg-green-100 p-2 md:p-4 flex items-start space-x-2 rounded-md"
            >
                <div>
                    <CheckCircleIcon className="h-6 w-6 text-green-400" />
                </div>
                <div className="text-green-700 flex-grow">
                    <span className="font-medium block text-green-600">
                        {flash.success}
                    </span>
                </div>

                {/* <button
                type="button"
                onClick={(e) => setShow(false)}
                className="outline-none focus:outline-none"
            >
                <XIcon className="h-5 w-5 text-green-500" />
            </button> */}
            </div>
        )
    );
};

export default NotificationSuccess;
