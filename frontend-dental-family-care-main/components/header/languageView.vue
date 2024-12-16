<template>
    <div class="translate_wrapper" :class="filtered ? 'active' : ''">
        <div class="current_lang">
            <div class="lang">
                <Icon name="majesticons:globe-grid" class="fs-1" size="20" @click="collapseFilter()" />

            </div>
        </div>
        <div class="more_lang" :class="filtered ? 'active' : ''">
            <div class="lang" v-for="(lang, index) in langs" :key="index" @click.prevent="setLanguage(lang.lan)"><i
                    class="flag-icon " :class="lang.icon"></i><span class="lang-txt">{{ lang.lan }}<span>
                        {{ lang.span }}</span></span></div>
        </div>

    </div>
</template>
<script lang="ts" setup>

import { useLanguageStore } from "~/store/language"
import { useI18n } from "vue-i18n";
const i18n = ref(useI18n())
const filtered = ref<boolean>(false)
const store = useLanguageStore()
const langs = store.data

function setLanguage(language: string) {
    i18n.value.locale = language
    collapseFilter()
}
function collapseFilter() {
    filtered.value = !filtered.value;
}
</script>