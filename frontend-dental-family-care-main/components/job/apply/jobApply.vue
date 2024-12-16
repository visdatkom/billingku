<template>
    <div class="col-xl-9 xl-60 box-col-60">
        <div class="card">
            <div class="job-search">
                <div class="card-body pb-0">
                    <div class="media"><img class="img-40 img-fluid m-r-20" :src="getImages(jobs.image)" alt="">
                        <div class="media-body">
                            <h5 class="f-w-700 mb-0"><nuxt-link :to="`/job/details/${jobs.id}`">{{
                                jobs.title }}</nuxt-link>
                            </h5>
                            <p>{{ jobs.company }} <span>{{ jobs.city }}, {{ jobs.country }} </span> <span
                                    v-html="stars(jobs.stars)"></span></p>
                            <button class="btn btn-primary job-apply-btn" type="button"><span><i
                                        class="fa fa-check text-white"></i></span> Save this job</button>
                        </div>
                    </div>
                    <JobApplyPersonalDetails />
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary me-1" type="submit">Submit</button>
                    <input class="btn btn-light" type="reset" value="Cancel">
                </div>
            </div>
        </div>
    </div>
</template>
<script lang="ts" setup>
import { useJobStore } from "~/store/job"
import { useRouter } from 'vue-router'
import { getImages } from "~/composables/commen/imgMixin"
const store = useJobStore()
const router = useRouter()
const jobs: any = store.job.find(job => {
    if (parseInt(router.currentRoute._rawValue.params.id) === job.id)
        return job;
})

function stars(count: number) {
    var stars = '';

    for (var i = 0; i < 5; i++) {
        if (count > i) {
            stars = stars + '<i class="fa fa-star font-warning"></i>';
        } else {
            stars = stars + '<i class="fa fa-star-o font-warning"></i>';
        }
    }

    return stars;
}


</script>