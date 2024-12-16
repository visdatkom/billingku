<template>
    <div class="logo-wrapper">
        <nuxt-link to="/">
            <img class="img-fluid for-light" src="/images/logo/logo.png" alt="" />
        </nuxt-link>
    </div>
    <div class="dark-logo-wrapper"><nuxt-link to="/"><img class="img-fluid" src="/images/logo/dark-logo.png"
                alt=""></nuxt-link></div>
    <div class="toggle-sidebar" @click="store.toggleSidebar()">
        <Icon name="uim:align-center" class="status_toggle middle fs-1" size="20" />

    </div>
</template>
<script lang="ts" setup>
import { useMenuStore } from '~/store/menu'
let store = useMenuStore()

function toggleSidebar() {
    store.togglesidebar = !store.togglesidebar;
    if (window.innerWidth < 991) {
        store.activeoverlay = true;
    } else {
        store.activeoverlay = false;
    }
    store.activeoverlay = false
}

</script>