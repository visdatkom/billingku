<template>
    <ClientOnly>
        <apexchart :height="height" :type="type" :options="options" :series="series" />
    </ClientOnly>
</template>
<script lang="ts" setup>
import apexchart from "vue3-apexcharts";

let props = defineProps(['height', 'type', 'options', 'series']);
</script>