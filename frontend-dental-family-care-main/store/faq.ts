
import faqfeatured from "~/types/faqfeatured"
import faqarticles from "~/types/faqarticles"
import faq from "~/data/faq.json"

export const useFaqStore = defineStore('faq', () => {

    const data: faqfeatured[] = (JSON.parse(JSON.stringify(faq.featured)))
    const list: faqarticles[] = (JSON.parse(JSON.stringify(faq.articles)))
    const articles: faqarticles[] = (JSON.parse(JSON.stringify(faq.articles1)))
    const articles1: faqarticles[] = (JSON.parse(JSON.stringify(faq.articles2)))
    return {
        data,
        list,
        articles,
        articles1
    }
})
