<template>
    <div class="min-h-screen bg-[#372948] flex flex-col items-center">
      <!-- Hero Section -->
      <section class="container mx-auto mt-10 px-4 flex flex-col lg:flex-row items-center gap-10">
        <!-- Left Content -->
        <div class="lg:w-1/2 text-center lg:text-left">
          <h2 class="text-xl lg:text-4xl font-bold text-white">
            Aplikasi billing no 1 
          </h2>
          <p class="text-white mt-4">
            Solusi terlengkap dalam satu aplikasi yang telah dipercaya di indonesia
          </p>
  
          <!-- Features -->
          <div class="flex flex-wrap gap-4 mt-6 justify-center lg:justify-start">
            <!-- <div class="bg-white shadow-lg rounded-lg p-4 text-center">
              <img src="" alt="Video Belajar" class="w-12 mx-auto" />
              <p class="text-sm mt-2">Video Belajar</p>
            </div> -->
            <!-- <div class="bg-white shadow-lg rounded-lg p-4 text-center w-full"> -->
              <img src="../public/images/mockup.png" alt="Tryout" class="w-full mx-auto " />
              <!-- <p class="text-sm mt-2 mx-auto text-white">Tryout</p> -->
            
            <!-- <div class="bg-white shadow-lg rounded-lg p-4 text-center">
              <img src="" alt="Rapor Belajar" class="w-12 mx-auto" />
              <p class="text-sm mt-2">Rapor Belajar</p>
            </div> -->
          </div>
        </div>
  
        <!-- Right Content -->
        <div class="lg:w-1/2 bg-white shadow-lg rounded-lg p-6 mt-16">
          <h3 class="text-xl font-bold text-gray-700">Cek tagihanmu disini!</h3>
          <form @submit.prevent="handleSubmit" class="mt-6">
            <baseInput 
              id="namaPaket"
              name="namaPaket"
              label="Nomor Pelanggan"
              placeholder="Masukkan nomor pelanggan anda"
              inputClass="custom-input-class"
              type="text"
              v-model="pelanggan_id"
              />
  
              <div class="mt-6 bg-[#f9f9f9] p-4 rounded-lg border border-gray-300">
                <template v-if="dataBelumDicari || loading">
                  <div class="animate-pulse">
                    <div class="h-4 bg-gray-300 rounded w-3/4 mb-2"></div>
                    <div class="h-4 bg-gray-300 rounded w-1/2 mb-2"></div>
                    <div class="h-6 bg-gray-300 rounded w-1/3 mb-2"></div>
                    <div class="h-4 bg-gray-300 rounded w-2/3"></div>
                  </div>
                </template>
                <template v-else>
                  <template v-if="detailData">
                    <p class="text-gray-600 text-sm font-bold">Nama Pelanggan: {{ detailData.nm_pelanggan }}</p>
                    <p class="text-gray-500 text-sm">Nama Paket: {{ detailData.nm_paket }}</p>
                    <p class="text-2xl font-bold text-yellow-400">Rp. {{ detailData.harga_paket }}</p>
                    <p class="text-sm text-gray-500 mt-2">Jatuh Tempo: {{ detailData.jatuh_tempo }}</p>
                  </template>
                  <template v-else>
                    <p class="text-gray-600 text-sm font-bold">Data tidak tersedia</p>
                  </template>
                </template>
              </div>
            <button
              type="submit"
              @click="loadData(pelanggan_id)"
              class="w-full mt-6 bg-yellow-400 hover:bg-yellow-500 text-white py-3 rounded-lg font-semibold "
            >
              Cari tagihan
            </button>
          </form>
        </div>
      </section>
    </div>
  </template>

<script>
import baseInput from '../../components/input/baseInput.vue';
import {useCekTagihanStore} from '@/store/cekTagihan';
import navBar from '../components/navbar';


definePageMeta({
  layout: "front",
});

export default {
  components: {
    navBar,
    baseInput
  },
  mounted() {
    this.store = useCekTagihanStore();
  },
  data() {
    return {
      pelanggan_id: '',
      detailData: null,
      loading: false,
      dataBelumDicari: true // Default: belum ada pencarian
    };
  },
  watch: {
    pelanggan_id(newVal) {
      if (!newVal) {
        // Jika input kosong, reset ke keadaan awal
        this.detailData = null;
        this.dataBelumDicari = true;
      }
    }
  },
  methods: {
    async loadData(operatorId) {
      // Set status loading dan ubah dataBelumDicari menjadi false
      this.loading = true;
      this.dataBelumDicari = false;

      try {
        // Simulasi delay (opsional)
        await new Promise((resolve) => setTimeout(resolve, 500));

        // Ambil data dari store
        const data = await this.store.getData(operatorId);

        if (data && data.length > 0) {
          this.detailData = data[0]; // Ambil data pertama
        } else {
          this.detailData = null; // Data tidak ditemukan
        }
      } catch (error) {
        console.error('Error loading data:', error);
        this.detailData = null;
      } finally {
        this.loading = false; // Matikan loading
      }
    }
  }
};

</script>
  
  <style>
  .container {
    max-width: 1200px;
  }
  .animate-pulse {
  animation: pulse 1.5s ease-in-out infinite;
}

@keyframes pulse {
  0%, 100% {
    opacity: 1;
  }
  50% {
    opacity: 0.5;
  }
}

.h-4 {
  height: 1rem;
}

.h-6 {
  height: 1.5rem;
}

.bg-gray-300 {
  background-color: #e0e0e0;
}

.rounded {
  border-radius: 0.25rem;
}
.mb-2 {
  margin-bottom: 0.5rem;
}
.w-3\/4 {
  width: 75%;
}
.w-1\/2 {
  width: 50%;
}
.w-1\/3 {
  width: 33.333%;
}
.w-2\/3 {
  width: 66.666%;
}


  </style>
  