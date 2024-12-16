

interface data {
    id: number,
    title: string,
    desc: string,
    link: string
}
interface data1 {
    id: number,
    title: string,
    desc: string,
    rating: string,
    rating1: string,
    link: string
}

import search from "~/data/search.json"

export const useSearchStore = defineStore('search', () => {

    const data: data[] = (JSON.parse(JSON.stringify(search.data)))
    const data1: data1[] = (JSON.parse(JSON.stringify(search.data1)))

    return {
        data,
        data1
    }
})
