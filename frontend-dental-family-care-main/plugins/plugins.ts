import { defineNuxtPlugin } from '#app'
import Datepicker from '@vuepic/vue-datepicker';
import VueNumber from "vue-number-animation";
import DropZone from "dropzone-vue";
import TheBreadcrumbs from '@/components/TheBreadcrumbs.vue';
import Lightbox from 'vue-easy-lightbox'
import Multiselect from 'vue-multiselect'
import SimpleTypeahead from 'vue3-simple-typeahead';
import Notifications from '@kyvg/vue3-notification'
import rate from 'vue-rate'
import VueJsTour from '@globalhive/vuejs-tour';
import VueSlider from 'vue-slider-component'
import VueCropper from 'vue-cropperjs';
import AosVue from "aos-vue";
import VueFeather from 'vue-feather';
import { Popover } from "bootstrap/dist/js/bootstrap.esm.min.js";
import { Tooltip } from "bootstrap/dist/js/bootstrap.esm.min.js";
import Swal from "sweetalert2";
import CKEditor from '@ckeditor/ckeditor5-vue';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
import { VueDraggableNext } from 'vue-draggable-next'
import StarRating from 'vue-star-rating'
import Tree from "vue3-tree";
import { GChart } from "vue-google-charts";
import { toast } from 'vue3-toastify';
import Wizard from 'form-wizard-vue3'
import { createToaster } from "@meforma/vue-toaster";


import 'cropperjs/dist/cropper.css';
import "vue3-tree/dist/style.css";
import 'vue3-toastify/dist/index.css';
import "form-wizard-vue3/dist/form-wizard-vue3.css";
import "@vuepic/vue-datepicker/dist/main.css";
import "vue-multiselect/dist/vue-multiselect.css"
import 'vue3-simple-typeahead/dist/vue3-simple-typeahead.css';
import 'vue-rate/dist/vue-rate.css'
import '@globalhive/vuejs-tour/dist/style.css';
import 'vue-slider-component/theme/antd.css'
import "leaflet/dist/leaflet.css";
import 'dropzone-vue/dist/dropzone-vue.common.css';
import {
    LIcon,
    LMap,
    LMarker,
    LPopup,
    LPolygon,
    LTileLayer,
} from "@vue-leaflet/vue-leaflet";
import L from "leaflet";
import { GoogleMap, Marker, Polyline } from "vue3-google-map";
const options = {
    reverseButtons: true,

}
const $swal = {
    install: (Vue, options) => {
        Vue.provide("$swal", Swal.mixin(options));
    },
}
export default defineNuxtPlugin(nuxtApp => {
    if (process.server) {

        nuxtApp.vueApp.component('TheBreadcrumbs', TheBreadcrumbs)

        nuxtApp.vueApp.use(rate)
    } else if (process.client) {
        nuxtApp.vueApp.component("Polyline", Polyline);
        nuxtApp.vueApp.component("GoogleMap", GoogleMap);
        nuxtApp.vueApp.component("Marker", Marker);
        nuxtApp.vueApp.component("LPolygon", LPolygon);
        nuxtApp.vueApp.component("LMap", LMap);
        nuxtApp.vueApp.component("LTileLayer", LTileLayer);
        nuxtApp.vueApp.component("LMarker", LMarker);
        nuxtApp.vueApp.component("LIcon", LIcon);
        nuxtApp.vueApp.component("LPopup", LPopup);
        nuxtApp.provide('Swal', Swal)
        nuxtApp.vueApp.use($swal, options);
        nuxtApp.vueApp.component('Datepicker', Datepicker)
        nuxtApp.vueApp.use(VueNumber)
        nuxtApp.vueApp.use(Lightbox)
        nuxtApp.vueApp.use(DropZone)
        nuxtApp.vueApp.component('multiselect', Multiselect)
        nuxtApp.vueApp.use(SimpleTypeahead)
        nuxtApp.vueApp.use(Notifications)
        nuxtApp.vueApp.use(VueJsTour)
        nuxtApp.vueApp.use(AosVue)
        nuxtApp.vueApp.component("Wizard", Wizard)
        nuxtApp.vueApp.component("GChart", GChart)
        nuxtApp.vueApp.component("Tree", Tree)
        nuxtApp.vueApp.component("VueCropper", VueCropper)
        nuxtApp.vueApp.component("VueSlider", VueSlider)
        nuxtApp.vueApp.component('vue-feather', VueFeather)
        nuxtApp.vueApp.provide("Popover", Popover);
        nuxtApp.vueApp.provide("Tooltip", Tooltip);
        nuxtApp.vueApp.component('star-rating', StarRating)
        nuxtApp.vueApp.provide("toast", toast);
        nuxtApp.vueApp.provide("createToaster ", createToaster);
        nuxtApp.vueApp.provide("ClassicEditor", ClassicEditor);
        nuxtApp.vueApp.provide("VueDraggableNext", VueDraggableNext);
        nuxtApp.vueApp.component("ckeditor", CKEditor.component);
        return {
            provide: {
                L
            }
        }
    }
})