<template>
  <a class="nav-link" :class="{ 'active show': store.customizer == 'settings' }" id="c-pills-home-tab"
    @click="openCustomizerSetting('settings')" href="javascript:void(0)">
    <div class="settings">
      <i class="icofont icofont-ui-settings"></i>
    </div>
    <span>Sidebar Type</span>
  </a>
</template>

<script lang="ts" setup>
import { useMenuStore } from '~/store/menu'

const store = useMenuStore()
const customizer = store.customizer
function openCustomizerSetting(val: string) {
  store.customizer = val;
}
</script>>
