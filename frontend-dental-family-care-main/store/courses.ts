


import { computed } from "vue"

import learning from "~/types/learning"
import item from "~/data/courses.json"

export const useCoursesStore = defineStore('courses', () => {

    const cours: learning[] = (JSON.parse(JSON.stringify(item.courses)))

    const specialCourses = computed(() => {
        return cours.filter((course) => {
            if (course.special === 1)
                return course;
        });
    })
    const normalCourses = computed(() => {
        return cours.filter((course) => {
            if (course.special === 0)
                return course;
        });
    })
    return {
        cours,
        normalCourses,
        specialCourses
    }
})
