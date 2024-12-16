

interface image {
    img: string
}

import owlcarousel from "~/data/owlcarousel.json"

export const useOwlcarouselStore = defineStore('owlcarousel', () => {

    const items: image[] = (JSON.parse(JSON.stringify(owlcarousel.items)))
    const item: image[] = (JSON.parse(JSON.stringify(owlcarousel.item)))

    return {
        item,
        items
    }
})
