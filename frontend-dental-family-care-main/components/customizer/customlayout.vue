<template>
    <div class="tab-pane fade" :class="{ 'active show': store.customizer == 'layouts' }" id="c-pills-home">
        <ul class="sidebar-type layout-grid layout-types">
            <li data-attr="compact-sidebar">
                <div class="layout-img">
                    <a @click="handlePageLayputs('compact-wrapper', 'Defaul')"><img src="/images/landing/demo/1.jpg"
                            class="img-fluid" alt="oneone" /></a>

                    <h6>Defaul layout</h6>
                </div>
            </li>
            <li class="only-body" data-attr="default-body">
                <div class="layout-img">
                    <a @click="
                        handlePageLayputs('compact-wrapper compact-sidebar', 'Compact')
                        "><img src="/images/landing/demo/2.jpg" class="img-fluid" alt="one" /></a>

                    <h6>Compact layout</h6>
                </div>
            </li>
            <li data-attr="modern-layout">
                <div class="layout-img">
                    <a @click="
                        handlePageLayputs('compact-wrapper modern-sidebar ', 'Modern')
                        ">
                        <img src="/images/landing/demo/3.jpg" class="img-fluid" alt="one" /></a>
                    <h6>Modern layout</h6>
                </div>
            </li>
        </ul>
    </div>
</template>
<script lang="ts" setup>

import { useMenuStore } from "~/store/menu";
import { uselayoutStore } from "~/store/layout";
import { useRouter } from "vue-router";
import { layoutClasses } from "~/constants/layout";
const router = useRouter();
const layoutType = ref<string>("ltr");
const mixLayout = ref<string>("default");
const layoff = ref<string>('')
const store = useMenuStore();
let storeLayout = uselayoutStore();
const layout = storeLayout.layout;
const margin = ref(store.margin);

store.customizer;
storeLayout.boxlayout;

function handlePageLayputs(val: string, layout: string) {
    const layoutobj = layoutClasses.find(
        (item) => Object.keys(item).pop() === layout
    );
    storeLayout.setCustomizeSidebarType(layoutobj[layout]);
    storeLayout.layout.settings.layout = layout;
    router.push({ query: { layout: layout } }).catch(err => err);
    if (!layoutobj[layout].split(" ").includes("compact-sidebar")) {
        store.activeoverlay = true;
        document.getElementById("mainnav");
    } else {
        store.activeoverlay = false;
        document.getElementById("mainnav");
    }
    if (layout === "Defaul") {
        storeLayout.boxlayout = true;
    } else {
        storeLayout.boxlayout = false;
    }
}

</script>
