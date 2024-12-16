


interface friends {
    image: string,
    StatusClass: string,
    name: string,
    email: string
}
interface activity {
    name: string,
    image: string
}
interface post {
    id: number,
    name: string,
    msg: string,
    class: string,
    image: string,
    date: string
}
interface addfriend {
    image: string,
    name: string
}
interface item {
    title: string,
    title1: string,
    desc: string,
    desc1: string
}
interface items {
    title: string,
    year: string,
    desc: string,
    title1: string,
    year1: string,
    desc1: string
}
import social from "~/data/social.json"

export const useSocialStore = defineStore('social', () => {

    const data: friends[] = (JSON.parse(JSON.stringify(social.friends)))
    const activity: activity[] = (JSON.parse(JSON.stringify(social.activity)))
    const post: post[] = (JSON.parse(JSON.stringify(social.post)))
    const post1: post[] = (JSON.parse(JSON.stringify(social.post1)))
    const addfriend: addfriend[] = (JSON.parse(JSON.stringify(social.addfriend)))
    const hobbies: item[] = (JSON.parse(JSON.stringify(social.hobbies)))
    const education: items[] = (JSON.parse(JSON.stringify(social.education)))
    return {
        data,
        activity,
        post,
        post1,
        addfriend,
        hobbies,
        education
    }
})
