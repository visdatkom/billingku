<template>
  <a class="nav-link" :class="{ 'active show': store.customizer == 'layouts' }" id="c-pills-home-tab"
    @click="openCustomizerSetting('layouts')" href="javascript:void(0)">
    <div class="settings">
      <i class="icofont icofont-laptop-alt"></i>
    </div>
    <span>Check Layout</span>
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
