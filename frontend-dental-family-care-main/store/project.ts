




import project from "~/data/project.json"
import projectlist from "~/types/projectlist"
import user from "~/data/user.json"
import bookmark from '~/types/bookmark'
import book from "~/data/bookmark.json"
interface item {
    icon: string,
    title: string,
    desc: string
}
interface items {
    img: string,
    name: string,
    frd: string
}
interface img {
    img: string
}
export const useProjectStore = defineStore('project', () => {
    const data = ref<projectlist[]>(project.all)
    const doing = ref<projectlist[]>(project.Doing)
    const done = ref<projectlist[]>(project.done)
    const about = ref<item[]>(user.data)
    const follower = ref<items[]>(user.follower)
    const following = ref<items[]>(user.following)
    const latest = ref<img[]>(user.latest)
    const friend = ref<img[]>(user.friend)
    const bookmark: bookmark[] = (JSON.parse(JSON.stringify(book.data)))
    const favourite = ref<string[]>([])
    const activeclass = ref<string>('pills_created')

    function say(item: string) {
        activeclass.value = item
    }
    function getActive(itemId: any) {
        const objIndex = favourite.value.findIndex(((obj: any) => obj.id === itemId));
        if (objIndex > -1) {
            return true;
        } else {
            return false;
        }
    }
    return {
        data,
        doing,
        done,
        about,
        getActive,
        bookmark,
        activeclass,
        favourite,
        follower,
        say,
        following,
        friend,
        latest
    }
})
