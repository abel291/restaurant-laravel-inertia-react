

const LinkProduct = ({ product, children }) => {
    return <a to={"/product/" + product.category + "/" + product.slug}>{children}</a>
}

export default LinkProduct
