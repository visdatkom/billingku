

import invoice from "~/data/invoice.json"
import wishlist from '~/types/wishlist'
import Invoice from "~/types/invoice"
import pricing from "~/types/pricing"

export const useInvoiceStore = defineStore('invoice', () => {

    const data: Invoice[] = (JSON.parse(JSON.stringify(invoice?.invoice)))
    const simplePricing: pricing[] = (JSON.parse(JSON.stringify(invoice?.simplePricing)))
    const pricing: pricing[] = (JSON.parse(JSON.stringify(invoice?.pricing)))
    const wishlist: wishlist[] = (JSON.parse(JSON.stringify(invoice?.whislist)))

    return {
        data,
        simplePricing,
        pricing,
        wishlist
    }
})
