

import emailinbox from "~/types/emailinbox"
import email from "~/data/email.json"

export const useEmaillStore = defineStore('emaill', () => {

    const data: emailinbox[] = (JSON.parse(JSON.stringify(email.data)))

    return {
        data,

    }
})
