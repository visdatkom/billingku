<template>
  <div class="loader-wrapper" v-if="showLoader">
    <div class="theme-loader">
      <div class="loader-p"></div>
    </div>
  </div>
  <div
    v-else
    class="page-wrapper"
    :class="display ? 'compact-wrapper' : layoutobj">
    <div class="page-main-header" :class="{ close_icon: !store.togglesidebar }">
      <HeaderSectionHeader @clicked="sidebarToggle" />
    </div>
    <div class="page-body-wrapper horizontal-menu">
      <div class="bg-overlay"></div>
      <header
        class="main-nav"
        :class="!store.togglesidebar ? 'close_icon' : ''">
        <SidebarSectionSidebar @clicked="sidebarToggle" />
      </header>
      <div class="page-body">
        <slot></slot>
      </div>
      <FooterView />
    </div>
  </div>
</template>
<script lang="ts" setup>
import { uselayoutStore } from "~/store/layout";
import { useMenuStore } from "~/store/menu";
import { useRouter } from "vue-router";
import { layoutClasses } from "~/constants/layout";
import { storeToRefs } from "pinia";
const sidebarToggleVar = ref<boolean>(false);
const layoutobj = ref({});
const showLoader = ref<boolean>(false);
const display = ref<boolean>(false);
let store = useMenuStore();
const router = useRouter();
const route = useRoute();
const storeLayout = uselayoutStore();
const { layout: layout } = storeToRefs(storeLayout);
watch(
  () => router,
  () => {
    layoutobj.value = layoutClasses.find(
      (item) => Object.keys(item).pop() === storeLayout.layout.settings.layout
    );
    if (
      (window.innerWidth < 991 &&
        storeLayout.layout.settings.layout === "LosAngeles") ||
      (window.innerWidth < 991 &&
        storeLayout.layout.settings.layout === "Singapore") ||
      (window.innerWidth < 991 &&
        storeLayout.layout.settings.layout === "Barcelona")
    ) {
      const newlayout = JSON.parse(
        JSON.stringify(layoutobj.value).replace(
          "horizontal-wrapper",
          "compact-wrapper"
        )
      );
      layoutobj.value = JSON.parse(JSON.stringify(newlayout))[
        storeLayout.layout.settings.layout
      ];
    } else {
      layoutobj.value = JSON.parse(JSON.stringify(layoutobj.value))[
        storeLayout.layout.settings.layout
      ];
    }
  },
  { deep: true }
);
watch(
  () => router,
  () => {
    showLoader.value = true;
    setTimeout(() => {
      showLoader.value = false;
    }, 1000);
  },
  { deep: true }
);
function sidebarToggle(value: boolean) {
  sidebarToggleVar.value = !value;
}

function handleScroll() {
  if (window.innerWidth <= 1199) {
    display.value = true;
  } else {
    display.value = false;
  }
}

onMounted(() => {
  storeLayout.layout.settings.layout = route.query.layout
    ? route.query.layout
    : "Defaul";
  window.addEventListener("resize", handleScroll);
  layoutobj.value = layoutClasses.find(
    (item) => Object.keys(item).pop() === storeLayout.layout.settings.layout
  );
  layoutobj.value = JSON.parse(JSON.stringify(layoutobj.value))[
    storeLayout.layout.settings.layout
  ];
});
</script>
