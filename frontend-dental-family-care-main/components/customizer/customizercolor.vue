<template>
  <a class="nav-link" :class="{ 'active show': store.customizer == 'colors' }" id="c-pills-home-tab"
    @click="openCustomizerSetting('colors')" href="javascript:void(0)">
    <div class="settings">
      <i class="icofont icofont-color-bucket"></i>
    </div>
    <span>Color Picker</span>
  </a>
</template>

<script lang="ts" setup>
import { useMenuStore } from '~/store/menu'

const store = useMenuStore()
const customizer = store.customizer
function openCustomizerSetting(val: string) {
  store.customizer = val;
}
</script>
