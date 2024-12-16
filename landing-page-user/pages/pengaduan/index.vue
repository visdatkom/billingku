<template>
  <div class="min-h-screen bg-[#372948] flex flex-col items-center">
    <!-- Hero Section -->
    <section class="container mx-auto mt-10 px-4 flex flex-col lg:flex-row items-center gap-10">
      <!-- Right Content -->
      <div class="lg:w-1/2 bg-white shadow-lg rounded-lg p-6 mt-16 mx-auto">
        <h3 class="text-xl font-bold text-gray-700">Form Pengaduan</h3>
        <form @submit.prevent="handleSubmit" class="mt-6">
          <baseInput 
            id="namaPaket"
            name="namaPaket"
            label="Nomor Pelanggan"
            placeholder="Masukkan nomor pelanggan anda"
            inputClass="custom-input-class"
            type="text"
            v-model="formData.pelanggan_id"
            />

          <div class="mt-6 bg-[#f9f9f9] p-4 rounded-lg border border-gray-300">
            <textArea 
              v-model="formData.deskripsi" 
              label="Pengaduan anda" 
              placeholder="Masukkan deskripsi panjang"
              :rows="8" 
              :cols="60" 
              :error="textError"
            />
          </div>

          <button
            type="submit"
            class="w-full mt-6 bg-yellow-400 hover:bg-yellow-500 text-white py-3 rounded-lg font-semibold"
          >
            Kirim Pengaduan
          </button>
        </form>
      </div>
    </section>
  </div>
</template>

<script>
import baseInput from '../../components/input/baseInput.vue';
import textArea from '../../components/input/textArea.vue';
import { usePengaduanStore } from '@/store/pengaduan'; // Pastikan path ini sesuai dengan store Anda
import navBar from '../components/navbar';
import swal from "sweetalert2";

definePageMeta({
  layout: "front",
});

export default {
  components: {
    baseInput,
    textArea,
    navBar
  },
  data() {
    return {
      formData: {
        pelanggan_id: '',
        deskripsi: ''
      },
      textError: '',     // Untuk error handling pada text area
      loading: false     // Status loading untuk button Kirim Pengaduan
    }
  },
  mounted() {
    this.store = usePengaduanStore();
  },
  methods: {
    validateFormData() {
      if (!this.formData.pelanggan_id) {
        swal.fire({
          title: "Masukkan Nomor Pelanggan",
          text: "Tolong Masukkan Nomor Pelanggan!",
          allowOutsideClick: false,
          onBeforeOpen: () => {
            swal.showLoading();
          }
        });
        return false;
      }
      return true;
    },

    async handleSubmit() {
      if (this.validateFormData()) {
        swal.fire({
          title: "Tunggu Sejenak",
          text: "Menyimpan Data...",
          allowOutsideClick: false,
          onBeforeOpen: () => {
            swal.showLoading();
          }
        });

        try {
          // Menyimpan data pengaduan
          const response = await this.store.tambahPengaduan(this.formData);

          // Debug: log response untuk melihat apakah data ada
          console.log('Response dari API:', response);

          // Memeriksa apakah response dan response.data ada
          if (response && response.data && response.data.status === 'success') {
            swal.fire("Berhasil!", "Data Disimpan!", "success");
            this.formData = {
              pelanggan_id: '',
              deskripsi: ''
            }
          } else {
            const errorMessage = response?.data?.message || 'Terjadi kesalahan tidak terduga';
            throw new Error(errorMessage);
          }
        } catch (error) {
          swal.fire("Gagal!", "Data Tidak Tersimpan!", "error");
          console.error("API error:", error);  // Menampilkan error yang lebih lengkap
        }
      } else {
        swal.fire({
        icon: "warning",
        title: "Peringatan",
        text: "Harap isi semua field yang diperlukan!",
        confirmButtonColor: "var(--theme-default)"
      });

      }
    },
    errorAlertState(){
      swal
        .fire({
          icon: "error",
          title: "Gagal!",
          text: "Data Tidak Tersimpan!",
          confirmButtonColor: "var(--theme-default)",
        })
        
    },
    successAlertState(){
      swal
        .fire({
          icon: "success",
          title: "Berhasil!",
          text: "Data Disimpan!",
          confirmButtonColor: "var(--theme-default)",
        })
    },
    deleteAlertState() {
      swal
        .fire({
          icon: "success",
          title: "Berhasil!",
          text: "Data Dihapus!",
          confirmButtonColor: "var(--theme-default)",
        })
        .then((result) => {
          if (result.isConfirmed) {
            // location.reload();
          }
        });
    }
  }
}
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
