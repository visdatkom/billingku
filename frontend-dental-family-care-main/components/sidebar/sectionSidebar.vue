<template>
  <SidebarProfileMenu />
  <nav>
    <div class="main-navbar">
      <li
        class="left-arrow"
        :class="hideLeftArrow ? 'disabled' : hideLeftArrow"
        @click="display2()">
        <Icon name="iconamoon:arrow-left-1-bold" class="fs-1" size="20" />
      </li>
      <div id="mainnav">
        <ul
          class="nav-menu custom-scrollbar"
          id="myDIV"
          :style="[
            layoutobject?.split(' ').includes('horizontal-wrapper')
              ? { 'margin-left': margin + 'px' }
              : { margin: '0px' },
          ]">
          <SidebarNavMenu />
        </ul>
      </div>
      <li
        class="right-arrow"
        :class="hideRightArrow ? 'disabled' : hideRightArrow"
        @click="display()">
        <Icon name="iconamoon:arrow-right-1-bold" class="fs-1" size="20" />
      </li>
    </div>
  </nav>
</template>
<script lang="ts" setup>
import { uselayoutStore } from "~/store/layout";
import { useMenuStore } from "~/store/menu";
import { layoutClasses } from "~/constants/layout";
import { useRouter } from "vue-router";
let sidebarType = useMenuStore();
const route = useRouter();
const layoutobj = ref<object>({});
const store = useMenuStore();
const storeLayout = uselayoutStore();
const data = store.data;
const hideRightArrow = ref(store.hideRightArrow);
const hideLeftArrow = ref(store.hideLeftArrow);
const margin = ref(store.margin);
const isActive = ref<boolean>(false);
const layoutobject = computed({
  get() {
    return storeLayout.layout.settings.sidebar_setting;
  },
  set() {
    layoutobj.value = storeLayout.layout.settings.sidebar_setting;
    layoutobj.value = layoutClasses.find(
      (item) => Object.keys(item).pop() === storeLayout.layout.settings.layout
    );
    layoutobj.value = JSON.parse(JSON.stringify(layoutobj.value))[
      storeLayout.layout.settings.layout
    ];
    return layoutobj;
  },
});
onMounted(() => {
  setTimeout(() => {
    const elmnt = document.getElementById("myDIV");
    store.menuWidth = elmnt.offsetWidth;
    store.menuWidth > window.innerWidth
      ? ((store.hideRightArrow = false), (store.hideLeftArrowRTL = false))
      : ((store.hideRightArrow = false), (store.hideLeftArrowRTL = true));
  }, 500);
  if (margin.value == 0) {
    hideRightArrow.value = false;
  }
});
onMounted(() => {
  data.filter((items) => {
    store.setActiveRoute(items);
    if (!items.children) return false;
    store.setActiveRoute(items);
    items.children.filter((subItems) => {
      if (subItems.path == route.path) store.setActiveRoute(subItems);
      if (!subItems.children) return false;
      subItems.children.filter((item) => {
        if (item.path == route.path) store.setActiveRoute(item);
      });
    });
  });
});
function display() {
  if (isActive.value == false) {
    isActive.value = !isActive.value;
  }
  if (margin.value >= -4500) {
    margin.value = margin.value - 500;
    hideLeftArrow.value = false;
    hideRightArrow.value = false;
  }
  if (margin.value == -4500) {
    hideRightArrow.value = true;
  }
}
function display2() {
  if (margin.value <= -500) {
    margin.value = margin.value + 500;
    hideLeftArrow.value = false;
    hideRightArrow.value = false;
  }
  if (margin.value == 0) {
    hideLeftArrow.value = true;
  }
}
</script>
