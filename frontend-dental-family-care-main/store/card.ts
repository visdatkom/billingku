

interface creative {
    id: number,
    title: string,
    desc: string,
    header: string,
    card: string,
    class: string
}
interface basic {
    title: string | number,
    description: string
}
interface card {
    title: string,
    color: string,
    body: string,
    class: string,
    footer: string,
    description: string
}
import card from "~/data/card.json"

export const useCardStore = defineStore('card', () => {

    const creative: creative[] = (JSON.parse(JSON.stringify(card.creative)))
    const draggabler: basic[] = (JSON.parse(JSON.stringify(card.draggable)))
    const basic: basic[] = (JSON.parse(JSON.stringify(card.basic)))
    const footer: card[] = (JSON.parse(JSON.stringify(card.footer)))
    const cardbody: card[] = (JSON.parse(JSON.stringify(card.cardbody)))

    return {
        creative,
        draggabler,
        basic,
        footer,
        cardbody
    }
})
