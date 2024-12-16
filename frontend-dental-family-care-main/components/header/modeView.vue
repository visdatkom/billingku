<template>
    <div class="mode">
        <i class="fa fa-moon-o" v-show="mixLayout == 'light-only'" @click="customizeMixLayout('dark-only')"></i>
        <i class="fa fa-lightbulb-o" v-show="mixLayout == 'dark-only'" @click="customizeMixLayout('light-only')"></i>
    </div>
</template>
<script lang="ts" setup>

import { uselayoutStore } from '~/store/layout'
const darkMode = ref<boolean>(false)
const mixLayout = ref<string>('light-only')
let store = uselayoutStore()

function customizeMixLayout(val: string) {
    mixLayout.value = val;

    store.setLayout({ class: val })
}
</script>
  