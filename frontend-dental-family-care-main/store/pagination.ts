

interface pagenation {
    class: string,
    color: string,
    size: string
}

import pagination from "~/data/pagination.json"

export const usePaginationStore = defineStore('pagination', () => {

    const alignment: pagenation[] = (JSON.parse(JSON.stringify(pagination.alignment)))
    const color: pagenation[] = (JSON.parse(JSON.stringify(pagination.color)))
    const size: pagenation[] = (JSON.parse(JSON.stringify(pagination.size)))

    return {
        alignment,
        color,
        size
    }
})
