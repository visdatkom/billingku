import apexchart from 'vue3-apexcharts';
export default defineNuxtPlugin((nuxtApp) => {
    nuxtApp.vueApp.use(apexchart);
});
