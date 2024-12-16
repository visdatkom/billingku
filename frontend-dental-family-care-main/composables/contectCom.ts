
export const src = ref<string>('null')
export const filtered = ref<boolean>(false)
export const filter = ref<boolean>(false)
export const lastModified = ref(null)

export function loadFile(event: Event, contact: { imgUrl: string }) {
    const file = (event.target as HTMLInputElement).files?.[0];
    if (file) {
        src.value = URL.createObjectURL(file);
        contact.imgUrl = src.value;
    }
}

export function collapseFilter() {
    filtered.value = !filtered.value;
}
export function collapse() {
    filter.value = !filter.value;
}
