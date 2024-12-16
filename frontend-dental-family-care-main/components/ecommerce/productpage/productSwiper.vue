<template>
    <div class="col-xl-5 col-md-6 box-col-12 xl-50">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-9 product-main">
                        <div class="pro-slide-single">
                            <Swiper :slidesPerView="1" :loop="true" :thumbs="{ swiper: thumbsSwiper }"
                                :autoplay="{ delay: 3500, disableOnInteraction: false, }" :spaceBetween="30"
                                :centeredSlides="true" :modules="modules" class="mySwiper">
                                <Swiper-slide v-for="(product, index) in products.images" :key="index">
                                    <img :src="getImgUrl(product)" class="img-fluid bg-img" alt="index" />
                                </Swiper-slide>
                            </Swiper>
                        </div>
                    </div>
                    <div class="col-xl-3 product-thumbnail">
                        <div class="pro-slide-right">
                            <div>
                                <Swiper :breakpoints="swiperOptions" @swiper="setThumbsSwiper" :loop="true"
                                    :autoHeight="true" :slidesPerView="3" :spaceBetween="3" :watchSlidesProgress="true"
                                    :pagination="{
                                        clickable: true,
                                    }" :modules="modules" class="Swiper">
                                    <Swiper-slide v-for="(product, index) in products.images" :key="index">
                                        <img :src="getImgUrl(product)" class="img-fluid bg-img " alt="index"
                                            style="height:auto; " />
                                    </Swiper-slide>
                                </Swiper>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script lang="ts" setup>

import { useRouter } from 'vue-router'
import { Swiper, SwiperSlide } from "swiper/vue";
import { Autoplay, FreeMode, Navigation, Thumbs, } from "swiper";
import "swiper/css/free-mode";
import "swiper/css";
import "swiper/css/navigation";
import 'swiper/css/pagination';
import "swiper/css/thumbs"
import { useProductsStore } from "~/store/products"
const thumbsSwiper = ref()
const router = useRouter()
const store = useProductsStore()
const setThumbsSwiper = (swiper: string) => {
    thumbsSwiper.value = swiper;
}
const products = store.products.find((item) => {
    if (parseInt(router.currentRoute._rawValue.params.id) === item.sku) return item;
})
const modules = [Autoplay, Navigation, FreeMode, Thumbs]

const swiperOptions = {

    1215: {
        direction: 'vertical'
    }

}
function getImgUrl(path: string) {
    return '/images/' + path;
}

</script>