<template>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header pb-0">
                    <h5>Hover Effect <span>3</span></h5>
                </div>
                <div class="card-body">
                    <div class="row gallery my-gallery" id="aniimated-thumbnials2" itemscope>
                        <figure class="col-md-3 col-6 img-hover hover-3" v-for="(n, index) in masonryItems" :key="index"
                            @click="() => showImg(index)" itemprop="associatedMedia" itemscope>
                            <a>
                                <div>
                                    <img :src="getImgUrl(n.image)" itemprop="thumbnail" alt="Image description"
                                        class="img-fluid">
                                </div>
                            </a>
                        </figure>
                    </div>
                    <vue-easy-lightbox :index="indexRef" :visible="visible" :imgs="lightBoxImages" @hide="handleHide">
                    </vue-easy-lightbox>
                </div>
            </div>
        </div>
    </div>
</template>
<script lang="ts" setup>

import { useMasonryStore } from "~/store/masonry"
const lightBoxImages: object = ref([])

const visible = ref<boolean>(false)
const indexRef = ref<number>(0)
const store = useMasonryStore()
const masonryItems = store.hover

function showImg(index: number) {
    indexRef.value = index
    visible.value = true
}
function handleHide() {
    visible.value = false
}

function getImgUrl(path: string) {
    return '/images/' + path
}
onMounted(() => {
    masonryItems.forEach(item => {
        lightBoxImages.value.push({ src: '/images/' + item.image })

    })
})
</script>