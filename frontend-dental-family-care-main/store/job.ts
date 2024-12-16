

import jobdetails from "~/types/jobdetails"
import joblist from "~/types/joblist"
import item from "~/data/job.json"

export const useJobStore = defineStore('job', () => {

    const job: jobdetails[] = (JSON.parse(JSON.stringify(item.job)))
    const jobs: jobdetails[] = (JSON.parse(JSON.stringify(item.jobs)))
    const data: joblist[] = (JSON.parse(JSON.stringify(item.data)))
    return {
        data,
        job,
        jobs
    }
})
