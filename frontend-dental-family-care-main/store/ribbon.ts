

import ribbonview from "~/types/ribbonview"
import ribbon from "~/data/ribbon.json"

export const useRibbonStore = defineStore('ribbon', () => {

    const data: ribbonview[] = (JSON.parse(JSON.stringify(ribbon.colored)))
    const left: ribbonview[] = (JSON.parse(JSON.stringify(ribbon.left)))
    const right: ribbonview[] = (JSON.parse(JSON.stringify(ribbon.right)))
    const verticalLeft: ribbonview[] = (JSON.parse(JSON.stringify(ribbon.verticalleft)))
    const bookmark: ribbonview[] = (JSON.parse(JSON.stringify(ribbon.bookmark)))
    const verticalRight: ribbonview[] = (JSON.parse(JSON.stringify(ribbon.verticalright)))
    const clip: ribbonview[] = (JSON.parse(JSON.stringify(ribbon.clip)))
    const item: ribbonview[] = (JSON.parse(JSON.stringify(ribbon.ribbon)))
    return {
        data,
        left,
        right,
        verticalLeft,
        bookmark,
        verticalRight,
        clip,
        item
    }
})
