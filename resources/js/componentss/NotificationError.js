

const NotificationError = ({ error }) => {
    let data = error.response.data

    return (
        data?.errors && (
            <div className="text-white text-sm font-medium bg-red-500p-4 rounded opacity-50">
                <ul className="list-disc list-inside">
                    {Object.values(data.errors).map((item, index) => (
                        <li key={index}>{item[0]}</li>
                    ))}
                </ul>
            </div>
        )
    )
}

export default NotificationError
