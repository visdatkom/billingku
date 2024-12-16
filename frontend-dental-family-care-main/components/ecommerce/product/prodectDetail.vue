<template>
    <div class="product-wrapper-grid " :class="store.listViewEnable ? 'list-view' : ''">
        <div class="row">
            <div :class="[store.col2 ? 'col-md-6' : store.col3 ? 'col-xl-4 col-sm-4' : store.col4 ? 'col-xl-3 col-md-6' : store.col6 ? 'col-xl-2 col-lg-4 col-md-6' : store.list ? 'col-xl-3 col-lg-4 col-sm-6 xl-25 col-xl-12' : 'col-xl-3 col-md-6',]"
                v-for="(product, index) in filterProduct" :key="index">
                <div class="card">
                    <div class="product-box">
                        <div class="product-img">
                            <div class="ribbon ribbon-danger" v-if="product.sale">Sale</div>
                            <div class="ribbon ribbon-success ribbon-right" v-if="product.off">50%</div>
                            <img class="img-fluid" :src="getImgUrl(product.images[0])" />
                            <div class="product-hover">
                                <ul>
                                    <nuxt-link :to="'/ecommerce/cart'">
                                        <li @click="addToCart(product)">
                                            <i class="icon-shopping-cart"> </i>
                                        </li>
                                    </nuxt-link>
                                    <a data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <li @click="quickView(product)">
                                            <i class="icon-eye"> </i>
                                        </li>
                                    </a>
                                </ul>
                            </div>
                        </div>
                        <EcommerceProductModel :quickViewProduct="quickViewProduct" />
                        <div class="product-details">
                            <nuxt-link :to="'/ecommerce/details/' + product.sku">
                                <h4>{{ product.name }}</h4>
                            </nuxt-link>
                            <p>{{ product.shortDescription }}</p>
                            <div class="product-price">
                                ${{ product.price }}
                                <del>${{ product.salePrice }}</del>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script lang="ts" setup>

import { useProductsStore } from "~/store/products"
import { storeToRefs } from "pinia";
const modalShow = ref<boolean>(false)
const store = useProductsStore()
let { filterProducts: filterProduct } = storeToRefs(store)

const quickViewProduct = ref(store.filterProducts)
function quickView(product: boolean) {
    modalShow.value = true;
    return (quickViewProduct.value = product);
}
function getImgUrl(path: string) {
    return '/images/' + path
}
function addToCart(product: object) {
    store.addToCart(product);
}
</script>