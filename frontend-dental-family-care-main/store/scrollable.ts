


import scrollable from "~/data/scrollable.json"
import horizontalscroll from "~/types/horizontalscroll"

interface always {
    id: number,
    desc: string,
    desc1: string,
    desc2: string
}
interface vertical {
    id: number,
    desc: string
}

export const useScrollableStore = defineStore('scrollable', () => {

    const data: horizontalscroll[] = (JSON.parse(JSON.stringify(scrollable.horizontalscroll)))
    const always: always[] = (JSON.parse(JSON.stringify(scrollable.alwaysVisible)))
    const vertical: vertical[] = (JSON.parse(JSON.stringify(scrollable.verticalscroll)))
    return {
        data,
        always,
        vertical
    }
})