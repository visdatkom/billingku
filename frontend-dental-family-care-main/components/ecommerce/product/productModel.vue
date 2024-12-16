<template>
    <div class="modal fade" id="exampleModal" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="product-box row">
                        <div class="product-img col-lg-6"><img class="img-fluid" v-if="quickViewProduct?.images"
                                :src="getImgUrl(quickViewProduct?.images[0])" /></div>
                        <div class="product-details col-lg-6">
                            <h4 @click.prevent="$router.push('/ecommerce/details/' + quickViewProduct?.sku)"
                                data-bs-dismiss="modal">{{ quickViewProduct?.name }}</h4>
                            <div class="product-price">
                                ${{ quickViewProduct?.price }}
                                <del>${{ quickViewProduct?.salePrice }} </del>
                            </div>
                            <div class="product-view">
                                <h6 class="f-w-600">Product Details</h6>
                                <p class="mb-0">{{ quickViewProduct?.description }}</p>
                            </div>
                            <div class="product-size">
                                <ul>
                                    <li> <button class="btn btn-outline-light" type="button" data-bs-original-title=""
                                            title="">M</button></li>
                                    <li> <button class="btn btn-outline-light" type="button" data-bs-original-title=""
                                            title="">L</button></li>
                                    <li> <button class="btn btn-outline-light" type="button" data-bs-original-title=""
                                            title="">Xl</button> </li>
                                </ul>
                            </div>
                            <div class="product-qnty">
                                <h6 class="f-w-600">Quantity</h6>
                                <fieldset class="qty-box">
                                    <div class="input-group bootstrap-touchspin">
                                        <button class="btn btn-primary btn-square bootstrap-touchspin-down"
                                            v-on:click="decrement()" type="button"><i class="fa fa-minus"></i></button>
                                        <input class="touchspin text-center form-control" v-model="counter"
                                            name="item.quantity" type="text">
                                        <button class="btn btn-primary btn-square bootstrap-touchspin-up"
                                            v-on:click="increment()" type="button">
                                            <i class="fa fa-plus"></i></button>
                                    </div>
                                </fieldset>
                                <div class="addcart-btn mt-3">
                                    <nuxt-link to="/ecommerce/cart">
                                        <button class="btn btn-primary m-r-10" type="button"
                                            data-original-title="btn btn-info-gradien" @click="addToCart(quickViewProduct)"
                                            data-bs-dismiss="modal">
                                            Add To Cart
                                        </button>
                                    </nuxt-link>
                                    <a href="javascript:void(0)" class="btn btn-primary cart-btn-transform"
                                        @click.prevent="$router.push('/ecommerce/checkout')" data-bs-dismiss="modal">Buy
                                        Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn-close" type="button" data-bs-dismiss="modal"></button>
                </div>
            </div>
        </div>
    </div>
</template>
<script lang="ts" setup>

import { useProductsStore } from "~/store/products"
let props = defineProps({
    quickViewProduct: Object,
});
const counter = ref<number>(1)
const store = useProductsStore()
function getImgUrl(path: string) {
    return '/images/' + path
}
function addToCart(product: object) {
    store.addToCart(product);
}
function increment() {
    if (counter.value < props.quickViewProduct.stock) counter.value++;
}
function decrement() {
    if (counter.value > 1) counter.value--;
}
</script>