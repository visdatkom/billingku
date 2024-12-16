import {defineStore} from 'pinia';
// import axios from 'axios';
import { useNuxtApp } from 'nuxt/app';

export const usePengaduanStore = defineStore('pengaduan', {
    state: () => ({
        pengaduanList: [],
        loading: false,
        error: null
    }),

    actions: {
        async tambahPengaduan(pengaduan: any) {
            const nuxtApp = useNuxtApp();
            const axios = nuxtApp.$axios;
            try {
              const response = await axios.post('/pengaduan/insert.php', pengaduan);
              
              // Memeriksa apakah response.data ada dan memeriksa status
              if (response && response.data && response.data.status === 'success') {
                this.pengaduanList.push(response.data);  // Menambahkan data ke dalam pengaduanList
                return response;  // Pastikan response dikembalikan ke komponen pemanggil
              } else {
                // Memeriksa apakah 'message' ada
                const errorMessage = response?.data?.message || 'Terjadi kesalahan tidak terduga';
                throw new Error(errorMessage);
              }
            } catch (error) {
              console.error('Failed to add pengaduan:', error);
              throw error;  // Melempar ulang error agar bisa ditangani di komponen
            }
          }
                 
    }
})