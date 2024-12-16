



import blogdetail from "~/types/blogdetail"
import bloglist from "~/types/bloglist"
import blogsingle from "~/types/blogsingle"
import blog from "~/data/blog.json"

export const useBlogStore = defineStore('blog', () => {

    const data: blogdetail[] = (JSON.parse(JSON.stringify(blog.details)))
    const list: bloglist[] = (JSON.parse(JSON.stringify(blog.list)))
    const single: blogsingle[] = (JSON.parse(JSON.stringify(blog.single)))
    return {
        data,
        list,
        single
    }
})
