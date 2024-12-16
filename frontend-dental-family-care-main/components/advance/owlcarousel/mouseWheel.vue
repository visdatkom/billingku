<template>
    <div class="card">
        <div class="card-header pb-0">
            <h5>Mouse Wheel Example</h5>
        </div>
        <div class="card-body">
            <div class="owl-carousel owl-theme" id="owl-carousel-15">
                <Swiper :autoHeight="true" :breakpoints="swiperOptions" :mousewheel="true" :loop="true" :slidesPerView="1"
                    :spaceBetween="10" :pagination="{
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
import { Pagination, FreeMode, Mousewheel } from "swiper";
import "swiper/css";
import "swiper/css/pagination";
import "swiper/css/free-mode";
import { useOwlcarouselStore } from "~/store/owlcarousel"
import { getImages } from "~/composables/commen/imgMixin"

const store = useOwlcarouselStore()
const owlCarousel = store.items
const modules = [Pagination, FreeMode, Mousewheel]
const swiperOptions = {
    0: {
        slidesPerView: 1,
    },
    600: {
        slidesPerView: 3,
    },
    960: {
        slidesPerView: 5,
    },
    1200: {
        slidesPerView: 5,
    }
}
</script>