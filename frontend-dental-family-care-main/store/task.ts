
import task from "~/data/task.json"
interface data {
    title: string,
    desc: string
}

export const useTaskStore = defineStore('task', () => {

    const items: data[] = (JSON.parse(JSON.stringify(task.data)))


    return {
        items
    }
})
