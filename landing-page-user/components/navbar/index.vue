<template>
    <header class="w-full bg-white shadow-md py-4">
        <div class="container mx-auto flex justify-between items-center px-4">
            <h1 class="text-3xl font-bold text-[#372948]">BILLINGKU</h1>
            <nav class="flex gap-6">
                <router-link class="text-gray-600 hover:text-[#372948] font-bold" :to="item.link" v-for="item in menu" :key="item.text">
                    <span style="font-size: 16px; font-weight: lighter;" class="ms-5">{{ item.text }}</span>
                </router-link>
            </nav>
        </div>
    </header>
</template>

<script>
export default {
    data() {
        return {
            menu: [
                { text: 'Beranda', link: '/' },
                { text: 'Pengaduan', link: '/pengaduan' },
                { text: 'Cara Bayar',link: '/cara-bayar' },
            ]
        }
    }
}
</script>

<style>

</style>