<template>
  <div>
    <head>
      <title>{{ title }}</title>
    </head>
    <div class="container-fluid" style="padding: 10px">
      <div class="row">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header pb-0">
              <h5>{{ title }}</h5>
              <span>{{ subTitle }}</span>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-3 mt-2">
                  <label class="col-12 col-form-label"></label>
                  <div class="col-sm-12">
                    <input
                      class="form-control form-control-sm"
                      placeholder="Silahkan Cari Data.."
                      v-model="filters.nama"
                      type="text" />
                  </div>
                </div>
                <div class="col-6">
                  <label class="col-12 col-form-label"></label>
                  <button class="btn btn-primary mt-2" @click="loadData">
                    <i class="fa fa-search"></i>
                    <span> Cari </span>
                  </button>
                  <button class="btn btn-info mt-2 mx-2">
                    <i class="fa fa-print"></i>
                    <span> Cetak </span>
                  </button>
                </div>
              </div>
              <div class="col-12 mt-3">
                <table class="table table-striped border">
                  <thead>
                    <tr class="bg-primary">
                      <th
                        v-for="(item, index) in tableColums"
                        :key="index"
                        class="text-white"
                        style="border: 1px solid white">
                        {{ item }}
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-if="loading">
                      <td :colspan="tableColums.length">
                        <p class="placeholder-glow" v-for="index in 3">
                          <span class="placeholder col-12 bg-primary"></span>
                        </p>
                      </td>
                    </tr>
                    <tr v-else v-for="(item, index) in tableDatas" :key="index">
                      <td style="border: 1px solid white">
                        {{ item.tanggal_pasien }}
                      </td>
                      <td style="border: 1px solid white">
                        {{ item.no_rm_pasien }}
                      </td>
                      <td style="border: 1px solid white">
                        {{ item.nama_pasien }}
                      </td>
                      <td style="border: 1px solid white">
                        {{ item.diagnosa_pasien }}
                      </td>
                      <td style="border: 1px solid white">
                        {{ item.perawatan_pasien }}
                      </td>
                      <td style="border: 1px solid white">
                        <button
                          v-if="item.pembayaran_pasien.method === 'Tunai'"
                          class="btn btn-primary">
                          {{ item.pembayaran_pasien.method }}
                          {{ item.pembayaran_pasien.amount }}
                        </button>
                        <button
                          v-else-if="
                            item.pembayaran_pasien.method === 'Transfer'
                          "
                          class="btn btn-secondary">
                          {{ item.pembayaran_pasien.method }}

                          {{ item.pembayaran_pasien.amount }}
                        </button>
                        <span v-else>
                          {{ item.pembayaran_pasien.amount }}
                        </span>
                      </td>

                      <td style="border: 1px solid white">
                        {{ item.catatan_pasien }}
                      </td>
                      <td style="border: 1px solid white">
                        {{ item.total_pasien }}
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="container">
                <div class="row justify-content-end">
                  <div class="col-lg-4 col-md-6">
                    <div class="card bg-secondary mb-3">
                      <div class="card-body">
                        <h5 class="card-title">Transfer</h5>
                        <p class="card-text">Rp. 500.000</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-6">
                    <div class="card bg-success mb-3">
                      <div class="card-body">
                        <h5 class="card-title">Tunai</h5>
                        <p class="card-text">Rp. 500.000</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-6">
                    <div class="card bg-primary mb-3">
                      <div class="card-body">
                        <h5 class="card-title">Total</h5>
                        <p class="card-text">Rp. 1.000.000</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div
                class="col-12 mt-3 d-flex justify-content-end"
                v-if="!loading">
                <nav aria-label="Page navigation example">
                  <ul class="pagination">
                    <li class="page-item">
                      <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                      </a>
                    </li>
                    <li class="page-item active">
                      <a class="page-link" href="#">1</a>
                    </li>
                    <li class="page-item">
                      <a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item">
                      <a class="page-link" href="#">3</a>
                    </li>
                    <li class="page-item">
                      <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                      </a>
                    </li>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import swal from "sweetalert2";

export default {
  created() {},
  data() {
    return {
      loading: false,
      store: null,
      selectedItem: null,
      title: "Laporan Harian ",
      subTitle: "(Nama Dokter Yang Login)",
      filters: {
        nama: "",
        alamat: "",
      },
      tableColums: [
        "Tanggal",
        "No. RM",
        "Nama Lengkap",
        "Diagnosa",
        "Perawatan",
        "Pembayaran",
        "Catatan",
        "Total",
      ],
      tableDatas: [
        {
          tanggal_pasien: "25/12/2024",
          no_rm_pasien: "01",
          nama_pasien: "Nazriel Irham, S.Kom",
          diagnosa_pasien: "Sakit Gigi",
          perawatan_pasien: "Sakit Gigi",
          pembayaran_pasien: { method: "Transfer", amount: "Rp.500.000" },
          catatan_pasien: "Sakit Gigi",
          total_pasien: "Rp.500.000",
        },
        {
          tanggal_pasien: "25/12/2024",
          no_rm_pasien: "02",
          nama_pasien: "adakan, S.Kom",
          diagnosa_pasien: "Sakit Gigi",
          perawatan_pasien: "Sakit Gigi",
          pembayaran_pasien: { method: "Tunai", amount: "Rp.500.000" },
          catatan_pasien: "Sakit Gigi",
          total_pasien: "Rp.500.000",
        },
      ],
      metaData: [],
      currentPage: 1,
      range: 5,
    };
  },
  methods: {
    loadData() {
      this.loading = true;
      this.store.getData(this.filters).then((res) => {
        console.log(this.store.data);
        this.tableDatas = this.store.data;
        this.loading = false;
        this.metaData = this.store.meta;
        console.log(this.metaData);
      });
    },
    handlePage(page) {
      if (page != 0 && page <= this.metaData.total_rows) {
        this.currentPage = page;
        this.store.page = page;
        this.loadData();
      }
    },
    successAlertState() {
      swal
        .fire({
          icon: "success",
          title: "Berhasil!",
          text: "Data Disimpan!",
          confirmButtonColor: "var(--theme-default)",
        })
        .then((result) => {
          if (result.isConfirmed) {
            location.reload();
          }
        });
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
            location.reload();
          }
        });
    },
  },
  computed: {
    pages() {
      const start = Math.max(1, this.currentPage - Math.floor(this.range / 2));
      const end = Math.min(this.metaData.total_rows, start + this.range - 1);

      return Array.from({ length: end - start + 1 }, (_, i) => start + i);
    },
  },
};

definePageMeta({
  layout: "default",
});
</script>
<style scoped>
.bordered-column {
  border: 1px solid #ccc;
  padding: 10px;
  border-radius: 5px;
}
.table {
  width: 100%;
  border-collapse: collapse;
  margin-bottom: 20px;
}

.isi td,
.isi th {
  border: 1px solid #ddd;
  padding: 8px;
}

.isi th {
  background-color: #f2f2f2;
}

.isi td {
  text-align: left;
}

.table-responsive {
  overflow-x: auto;
}
</style>
