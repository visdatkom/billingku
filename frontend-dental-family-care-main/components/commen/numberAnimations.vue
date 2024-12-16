<template>
  <number
    class="bold counter"
    ref="number1"
    :from="0"
    :to="data"
    :duration="5"
    :delay="0"
    easing="Power1.easeOut" />
</template>
<script lang="ts" setup>
let props = defineProps({
  data: String,
});
</script>
