import { defineStore } from 'pinia';
// import * from 'pinia';
// import {}
import { useNuxtApp } from 'nuxt/app';

export const useCekTagihanStore = defineStore('cekTagihan', {
    state: () => ({
        cekTagihan: [],
        loading: false,
        error: null,
      }),

    actions: {
        async getData(pelanggan_id) {
            const nuxtApp = useNuxtApp();
            const axios = nuxtApp.$axios;

            return new Promise ((resolve, reject) => {
                if (!pelanggan_id) {
                    const error = new Error("Nomor pelanggan tidak ada.");
                    return reject(error);
                }

                axios.get('/tagihan/cekTagihan.php', { params: { pelanggan_id: pelanggan_id } })
                    .then((response) => {
                        console.log('Response:', response.data);
                        if(response.data){
                            this.billings = response.data;
                            resolve(this.billings);
                        } else {
                            reject(new Error("Data tidak ditemukan"));
                        }
                    })
                    .catch((error) => {
                        console.error("Error loading data: ", error);
                        reject(error);
                    });
            });
        }
    }
})