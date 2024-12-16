

import menu from "~/types/menu"

import Menu from "~/data/menu.json"
interface item {
    desc: string
}
interface searchdatas {
    icon: string,
    path: string,
    title: string
}
interface search {
    icon: string,
    path: string,
    title: string,
    bookmark: string
}
interface MenuItem {
    active: boolean;
    children?: MenuItem[];
}
export const useMenuStore = defineStore('menu', () => {
    const data = ref<menu[]>(Menu?.data)
    const togglesidebar = ref<boolean>(true);
    const activeoverlay = ref<boolean>(true);
    const customizer = ref<string>("");
    const searchData = ref<searchdatas[]>([]);
    const searchDatas = ref<search[]>([]);
    const searchOpen = ref<boolean>(false);
    const hideRightArrowRTL = ref<boolean>(false)
    const hideLeftArrowRTL = ref<boolean>(true)
    const hideRightArrow = ref<boolean>(true)
    const hideLeftArrow = ref<boolean>(true)
    const width = ref<number>(0)
    const height = ref<number>(0)
    const margin = ref<number>(0)
    const menuWidth = ref<number>(0)
    const searchKey = ref('')
    onMounted(() => {
        window.addEventListener('resize', function () {
            if (screen.availWidth < 991) {
                togglesidebar.value = false
            }
            else {
                togglesidebar.value = true
            }
        })
    })

    function toggleSidebar() {
        togglesidebar.value = !togglesidebar.value;
        if (window.innerWidth < 991) {
            activeoverlay.value = true;
        } else {
            activeoverlay.value = false;
        }
        activeoverlay.value = false
    }
    function searchTerm(term: any) {

        const items: any = [];

        const searchval = term.toLowerCase()
        data.value.filter((menuItems: any) => {

            if (menuItems.title) {
                if (menuItems.title.toLowerCase().includes(searchval) && menuItems.type === 'link') {
                    items.push(menuItems);

                }
                if (!menuItems.children) return false;
                menuItems.children.filter(subItems => {
                    if (subItems.title.toLowerCase().includes(searchval) && subItems.type === 'link') {
                        subItems.icon = menuItems.icon;
                        items.push(subItems);
                    }
                    if (!subItems.children) return false;
                    subItems.children.filter(suSubItems => {
                        if (suSubItems.title.toLowerCase().includes(searchval)) {
                            suSubItems.icon = menuItems.icon;
                            items.push(suSubItems);
                        }
                    });
                });
                searchData.value = items;
            }
        })
    }
    function setNavActive(item: MenuItem) {
        if (!item.active) {
            data.value.forEach(a => {
                if (data.value.includes(item))
                    a.active = false;
                if (!a.children) return false;
                a.children.forEach(b => {
                    if (a.children.includes(item)) {
                        b.active = false;
                    }
                });
            });
        }
        item.active = !item.active;
    }

    function setActiveRoute(item: MenuItem) {

    }
    return {
        data,
        togglesidebar,
        activeoverlay,
        toggleSidebar,
        customizer,
        setNavActive,
        searchData,
        searchTerm,
        searchOpen,
        setActiveRoute,
        hideRightArrowRTL,
        hideLeftArrowRTL,
        hideRightArrow,
        hideLeftArrow,
        width,
        height,
        margin,
        menuWidth,
    }
})
