interface product {
    sku: number,
    name: string,
    images: string[],
    shortDescription: string,
    description: string,
    details: string,
    salePrice: string,
    price: string,
    sale: boolean,
    category: string[],
    colors: string[],
    size: string[],
    brand: string,
    tags: string[],
    stock: number,
    quantity: number
}
export default product