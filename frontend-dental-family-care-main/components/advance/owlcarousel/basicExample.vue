<template>
    <div class="card">
        <div class="card-header pb-0">
            <h5>Basic Example</h5>
        </div>
        <div class="card-body">
            <div class="owl-carousel owl-theme" id="owl-carousel-1">
                <Swiper :autoHeight="true" :breakpoints="swiperOptions" :slidesPerView="5" :spaceBetween="10" :loop="true"
                    :pagination="{
                        clickable: true,
                    }" :modules="modules" class="mySwiper">
                    <SwiperSlide v-for="(item, index) in owlCarousel" :key="index">
                        <div class="item"><img :src="getImages(item.img)" alt=""></div>
                    </SwiperSlide>
                </Swiper>
            </div>
        </div>
    </div>
</template>
<script lang="ts" setup>
import { Swiper, SwiperSlide } from "swiper/vue";
import { Pagination } from "swiper";
import { useOwlcarouselStore } from "~/store/owlcarousel"
import { getImages } from "~/composables/commen/imgMixin"

const store = useOwlcarouselStore()
const owlCarousel = store.items
const modules = [Pagination]
const swiperOptions = {
    0: {
        slidesPerView: 1,
    },
    600: {
        slidesPerView: 3,
    },
    1000: {
        slidesPerView: 5,
    }
}
</script>