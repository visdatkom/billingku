



import supportticket from "~/types/supportticket"
import supportDetails from "~/types/supportDetails"
import support from "~/data/support.json"

export const useSupportStore = defineStore('support', () => {

    const item: supportDetails[] = (JSON.parse(JSON.stringify(support.items)))
    const ticket: supportticket[] = (JSON.parse(JSON.stringify(support.ticket)))

    return {
        item,
        ticket
    }
})
