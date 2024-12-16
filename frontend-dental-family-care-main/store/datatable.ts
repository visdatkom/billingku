

import datatable from "~/types/datatable"
import table from "~/data/datatable.json"

export const useDatatableStore = defineStore('datatable', () => {

    const data: datatable[] = (JSON.parse(JSON.stringify(table.items)))

    return {
        data,
    }
})
