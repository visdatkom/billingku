

import language from "~/data/language.json"
import lang from "~/types/language"

export const useLanguageStore = defineStore('language', () => {

    const data: lang[] = (JSON.parse(JSON.stringify(language.langs)))
    return {
        data,

    }
})
