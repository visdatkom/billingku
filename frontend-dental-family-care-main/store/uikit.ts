

interface desc {
    desc: string
}
interface spinn {
    title: string,
    class: string
}
interface items {
    classes: string
}
interface drop {
    classes: string,
    title: string
}
import model from "~/data/uikit.json"

export const useUikitStore = defineStore('social', () => {

    const data: desc[] = (JSON.parse(JSON.stringify(model.data)))
    const spinner = ref<spinn[]>(model.spinner)
    const dropdown = ref<items[]>(model.dropdown)
    const dropdown1 = ref<drop[]>(model.dropdown1)
    return {
        data,
        spinner,
        dropdown,
        dropdown1
    }
})
