


import userCard from "~/types/user"
import user from "~/data/user.json"

export const useUserStore = defineStore('user', () => {

    const data: userCard[] = (JSON.parse(JSON.stringify(user.data1)))


    return {
        data,

    }
})
