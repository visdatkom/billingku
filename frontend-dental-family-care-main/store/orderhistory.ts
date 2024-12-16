

interface order {
    images: string,
    product1: string,
    product2: string,
    orderStatus: string,
    size: string,
    color: string,
    articlenumber: number,
    units: number,
    price: number
}
import orderhistory from "~/data/orderhistory.json"

export const useOrderhistoryStore = defineStore('orderhistory', () => {

    const data: order[] = (JSON.parse(JSON.stringify(orderhistory.product)))


    return {
        data,

    }
})
