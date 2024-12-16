<template>
  <div class="tab-pane fade" :class="{ 'active show': store.customizer == 'settings' }" id="c-pills-home">
    <h6>Layout Type</h6>
    <ul class="main-layout layout-grid">
      <li data-attr="ltr" :class="{ active: layoutType == 'ltr' }" @click="customizeLayoutType('ltr')">
        <div class="header bg-light">
          <ul>
            <li></li>
            <li></li>
            <li></li>
          </ul>
        </div>
        <div class="body">
          <ul>
            <li class="bg-light sidebar"></li>
            <li class="bg-light body">
              <span class="badge badge-primary">LTR</span>
            </li>
          </ul>
        </div>
      </li>
      <li data-attr="rtl" :class="{ active: layoutType == 'rtl' }" @click="customizeLayoutType('rtl')">
        <div class="header bg-light">
          <ul>
            <li></li>
            <li></li>
            <li></li>
          </ul>
        </div>
        <div class="body">
          <ul>
            <li class="bg-light body">
              <span class="badge badge-primary">RTL</span>
            </li>
            <li class="bg-light sidebar"></li>
          </ul>
        </div>
      </li>
      <li v-bind:style="storeLayout.boxlayout ? '' : 'display: none;'" data-attr="box"
        :class="{ active: layoutType == 'box-layout' }" @click="customizeLayoutType('box-layout')"
        class="box-layout px-3">
        <div class="header bg-light">
          <ul>
            <li></li>
            <li></li>
            <li></li>
          </ul>
        </div>
        <div class="body">
          <ul>
            <li class="bg-light sidebar"></li>
            <li class="bg-light body">
              <span class="badge badge-primary">Box</span>
            </li>
          </ul>
        </div>
      </li>
    </ul>
    <h6>SIDEBAR TYPE</h6>
    <ul class="sidebar-type layout-grid">
      <li data-attr="normal-sidebar" @click="customizeSidebarSetting('horizontal-wrapper ', 'Horizontal')">
        <div class="header bg-light">
          <ul>
            <li></li>
            <li></li>
            <li></li>
          </ul>
        </div>
        <div class="body">
          <ul>
            <li class="bg-dark sidebar"></li>
            <li class="bg-light body"></li>
          </ul>
        </div>
      </li>
      <li data-attr="compact-sidebar" @click="customizeSidebarSetting('compact-wrapper', 'Defaul')">
        <div class="header bg-light">
          <ul>
            <li></li>
            <li></li>
            <li></li>
          </ul>
        </div>
        <div class="body">
          <ul>
            <li class="bg-dark sidebar"></li>
            <li class="bg-light body"></li>
          </ul>
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
const store = useMenuStore();
let storeLayout = uselayoutStore();
const layout = storeLayout.layout;
store.customizer;
storeLayout.boxlayout;
function customizeLayoutType(val: string) {
  layoutType.value = val;
  storeLayout.setLayoutType(layout, val);
}
function customizeSidebarSetting(val: string, layout: string) {
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
onMounted(() => {
  if (localStorage.getItem("SidebarType") === 'compact-wrapper') {
    storeLayout.layout.settings.sidebar_setting = 'compact-wrapper';
    storeLayout.setCustomizeSidebarType('compact-wrapper');
  }
  else {
    storeLayout.layout.settings.sidebar_setting = 'horizontal-wrapper';
    storeLayout.setCustomizeSidebarType('horizontal-wrapper');

  }
})
</script>
