

interface photo {
    id: number,
    title: string,
    descr: string,
    image: string
}
interface aos {
    image: string,
    animation: string
}
interface image {
    image: string
}
import masonry from "~/data/masonry.json"

export const useMasonryStore = defineStore('masonry', () => {

    const data: photo[] = (JSON.parse(JSON.stringify(masonry.photo)))
    const search: photo[] = (JSON.parse(JSON.stringify(masonry.search)))
    const aos: aos[] = (JSON.parse(JSON.stringify(masonry.aos)))
    const image: image[] = (JSON.parse(JSON.stringify(masonry.image)))
    const imgs: photo[] = (JSON.parse(JSON.stringify(masonry.imgs)))
    const imags: image[] = (JSON.parse(JSON.stringify(masonry.imags)))
    const imageArray: photo[] = (JSON.parse(JSON.stringify(masonry.imagearray)))
    const hover: image[] = (JSON.parse(JSON.stringify(masonry.hover)))
    return {
        data,
        search,
        aos,
        image,
        imgs,
        imags,
        imageArray,
        hover
    }
})
