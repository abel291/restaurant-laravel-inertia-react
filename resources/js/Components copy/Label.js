import React from 'react';

export default function Label({ forInput, value, className, children }) {
    return (
        <label htmlFor={forInput} className={`block font-medium text-sm text-gray-700  font-primary ` + className}>
            {value ? value : { children }}
        </label>
    );
}
