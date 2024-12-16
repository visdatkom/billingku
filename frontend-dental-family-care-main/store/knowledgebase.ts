


import { computed } from "vue"

import featured from "~/types/featuredknow"
import categoryknow from "~/types/categoryknow"
import knowledgebase from "~/data/knowledgebase.json"

export const useKnowledgebaseStore = defineStore('knowledgebase', () => {

    const cours: featured[] = (JSON.parse(JSON.stringify(knowledgebase.featured)))
    const category: categoryknow[] = (JSON.parse(JSON.stringify(knowledgebase.category)))

    return {
        cours,
        category
    }
})
