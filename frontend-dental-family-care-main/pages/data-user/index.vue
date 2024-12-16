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
              <!-- Tambah User -->
              <div class="container mt-4">
                <div
                  class="row justify-content-center"
                  v-if="showForm"
                  @submit.prevent="submitForm">
                  <div class="col-m-1"></div>
                  <div class="col-md-5 bordered-column m-1">
                    <div class="form-group">
                      <label for="username">Username</label>
                      <input
                        type="text"
                        class="form-control"
                        id="username"
                        placeholder="Masukkan username" />
                    </div>
                    <div class="form-group">
                      <label for="password">Password</label>
                      <input
                        type="password"
                        class="form-control"
                        id="password"
                        placeholder="Masukkan password" />
                    </div>
                    <div class="form-group">
                      <label for="role">Role</label>
                      <select class="form-control" id="role">
                        <option>Admin</option>
                        <option>Dokter</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="nama">Nama</label>
                      <input
                        type="text"
                        class="form-control"
                        id="nama"
                        placeholder="Masukkan nama dokter" />
                    </div>
                    <div class="form-group">
                      <label>Jenis Kelamin</label>
                      <div>
                        <div class="form-check form-check-inline">
                          <input
                            class="form-check-input"
                            type="radio"
                            name="jenis_kelamin"
                            id="jenis_kelamin_l"
                            value="L" />
                          <label class="form-check-label" for="jenis_kelamin_l"
                            >Laki-laki</label
                          >
                        </div>
                        <div class="form-check form-check-inline">
                          <input
                            class="form-check-input"
                            type="radio"
                            name="jenis_kelamin"
                            id="jenis_kelamin_p"
                            value="P" />
                          <label class="form-check-label" for="jenis_kelamin_p"
                            >Perempuan</label
                          >
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="tgl_lahir">Tanggal Lahir</label>
                      <input type="date" class="form-control" id="tgl_lahir" />
                    </div>
                    <div class="form-group">
                      <label for="tempat_lahir">Tempat Lahir</label>
                      <input
                        type="text"
                        class="form-control"
                        id="tempat_lahir"
                        placeholder="Masukkan tempat lahir" />
                    </div>
                  </div>
                  <div class="col-md-5 bordered-column m-1">
                    <div class="form-group">
                      <label for="alamat">Alamat</label>
                      <textarea
                        class="form-control"
                        id="alamat"
                        rows="6"
                        placeholder="Masukkan alamat lengkap"></textarea>
                    </div>
                    <div class="form-group">
                      <label>Agama</label>
                      <select class="form-control" id="agama">
                        <option>Islam</option>
                        <option>Kristen</option>
                        <option>Hindu</option>
                        <option>Budha</option>
                        <option>Konghucu</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="nomor_telepon">Nomor Telepon</label>
                      <input
                        type="tel"
                        class="form-control"
                        id="nomor_telepon"
                        placeholder="Masukkan nomor telepon" />
                    </div>
                    <div class="form-group">
                      <label for="no_sip"
                        >Nomor SIP (Kosongkan Jika Tidak Ada)</label
                      >
                      <input
                        type="text"
                        class="form-control"
                        id="no_sip"
                        placeholder="Masukkan nomor SIP" />
                    </div>
                    <div class="form-group">
                      <label>Status</label>
                      <div>
                        <div class="form-check form-check-inline">
                          <input
                            class="form-check-input"
                            type="radio"
                            name="status"
                            id="status_aktif"
                            value="aktif"
                            checked />
                          <label class="form-check-label" for="status_aktif"
                            >Aktif</label
                          >
                        </div>
                        <div class="form-check form-check-inline">
                          <input
                            class="form-check-input"
                            type="radio"
                            name="status"
                            id="status_tidak_aktif"
                            value="tidak aktif" />
                          <label
                            class="form-check-label"
                            for="status_tidak_aktif"
                            >Tidak Aktif</label
                          >
                        </div>
                      </div>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary mr-2">
                        <i class="icofont icofont-save"></i> Simpan
                      </button>
                      <button
                        type="button"
                        class="btn btn-danger mx-2"
                        @click="toggleForm">
                        <i class="icofont icofont-close"></i> Batal
                      </button>
                    </div>
                  </div>
                </div>
              </div>

              <!-- End Tambah User  -->
              <!-- Edit User -->
              <div class="row" v-if="selectedItem">
                <div class="col-md-1"></div>
                <div class="col-md-5 bordered-column m-1">
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input
                      type="text"
                      class="form-control"
                      v-model="selectedItem.username_user"
                      placeholder="Masukkan username" />
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input
                      type="password"
                      class="form-control"
                      v-model="selectedItem.password_user"
                      placeholder="Masukkan password" />
                  </div>
                  <div class="form-group">
                    <label for="role">Role</label>
                    <select
                      class="form-control"
                      v-model="selectedItem.role_user">
                      <option>Admin</option>
                      <option>Dokter</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="nama">Nama</label>
                    <input
                      type="text"
                      class="form-control"
                      v-model="selectedItem.nama_lengkap_user"
                      placeholder="Masukkan nama dokter" />
                  </div>
                  <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <div>
                      <div class="form-check form-check-inline">
                        <input
                          class="form-check-input"
                          type="radio"
                          name="jenis_kelamin"
                          v-model="selectedItem.jk_user"
                          value="L" />
                        <label class="form-check-label" for="jenis_kelamin_l"
                          >Laki-laki</label
                        >
                      </div>
                      <div class="form-check form-check-inline">
                        <input
                          class="form-check-input"
                          type="radio"
                          name="jenis_kelamin"
                          v-model="selectedItem.jk_user"
                          value="P" />
                        <label class="form-check-label" for="jenis_kelamin_p"
                          >Perempuan</label
                        >
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="tgl_lahir">Tanggal Lahir</label>
                    <input
                      type="text"
                      class="form-control"
                      v-model="selectedItem.tgl_lahir_user" />
                  </div>
                  <div class="form-group">
                    <label for="tempat_lahir">Tempat Lahir</label>
                    <input
                      type="text"
                      class="form-control"
                      v-model="selectedItem.tempat_lahir_user"
                      placeholder="Masukkan tempat lahir" />
                  </div>
                </div>
                <div class="col-md-5 bordered-column m-1">
                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea
                      class="form-control"
                      v-model="selectedItem.alamat_user"
                      rows="6"
                      placeholder="Masukkan alamat lengkap"></textarea>
                  </div>
                  <div class="form-group">
                    <label>Agama</label>
                    <select
                      class="form-control"
                      v-model="selectedItem.agama_user">
                      <option>Islam</option>
                      <option>Kristen</option>
                      <option>Hindu</option>
                      <option>Budha</option>
                      <option>Konghucu</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="nomor_telepon">Nomor Telepon</label>
                    <input
                      type="tel"
                      class="form-control"
                      v-model="selectedItem.telepon_user"
                      placeholder="Masukkan nomor telepon" />
                  </div>
                  <div class="form-group">
                    <label for="no_sip"
                      >Nomor SIP (Kosongkan Jika Tidak Ada)</label
                    >
                    <input
                      type="text"
                      class="form-control"
                      v-model="selectedItem.no_sip_user"
                      placeholder="Masukkan nomor SIP" />
                  </div>
                  <div class="form-group">
                    <label>Status</label>
                    <div>
                      <div class="form-check form-check-inline">
                        <input
                          class="form-check-input"
                          type="radio"
                          name="status"
                          v-model="selectedItem.status_user"
                          value="aktif"
                          checked />
                        <label class="form-check-label" for="status_aktif"
                          >Aktif</label
                        >
                      </div>
                      <div class="form-check form-check-inline">
                        <input
                          class="form-check-input"
                          type="radio"
                          name="status"
                          v-model="selectedItem.status_user"
                          value="tidak aktif" />
                        <label class="form-check-label" for="status_tidak_aktif"
                          >Tidak Aktif</label
                        >
                      </div>
                    </div>
                  </div>
                </div>
                <div class="text-center mt-4">
                  <button
                    class="btn btn-primary mx-2"
                    v-on:click="successAlertState">
                    <i class="icofont icofont-save"></i> Simpan
                  </button>
                  <button
                    class="btn btn-danger mx-2"
                    v-on:click="selectedItem = item">
                    <i class="icofont icofont-close"></i> Batal
                  </button>
                </div>
              </div>
              <!-- End Edit User  -->
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
                  <button class="btn btn-warning mt-2 mx-3" @click="toggleForm">
                    {{ buttonText }}
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
                        {{ item.nomor }}
                      </td>
                      <td style="border: 1px solid white">
                        {{ item.username_user }}
                      </td>
                      <td style="border: 1px solid white">
                        {{ item.role_user }}
                      </td>
                      <td style="border: 1px solid white">
                        {{ item.nama_lengkap_user }}
                      </td>
                      <td style="border: 1px solid white">
                        {{ item.jk_user }}
                      </td>
                      <td style="border: 1px solid white">
                        {{ item.tgl_lahir_user }}
                      </td>
                      <td style="border: 1px solid white">
                        {{ item.tempat_lahir_user }}
                      </td>
                      <td style="border: 1px solid white">
                        {{ item.agama_user }}
                      </td>
                      <td style="border: 1px solid white">
                        {{ item.telepon_user }}
                      </td>
                      <td style="border: 1px solid white">
                        {{ item.no_sip_user }}
                      </td>
                      <td style="border: 1px solid white">
                        {{ item.status_user }}
                      </td>
                      <td style="border: 1px solid white">
                        <button
                          class="btn btn-warning mx-1"
                          v-on:click="selectedItem = item">
                          <i class="icofont icofont-settings-alt"></i>
                        </button>
                        <button
                          class="btn btn-danger"
                          v-on:click="deleteAlertState">
                          <i class="icofont icofont-trash"></i>
                        </button>
                      </td>
                    </tr>
                  </tbody>
                </table>
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
      showForm: false,
      selectedItem: null,
      title: "User ",
      subTitle: "Data user",
      filters: {
        nama: "",
        alamat: "",
      },
      tableColums: [
        "No",
        "Username",
        "Role",
        "Nama Lengkap",
        "JK",
        "Tgl. Lahir",
        "Tempat Lahir",
        "Agama",
        "Telepon",
        "No.SIP",
        "Status",
        "#",
      ],
      tableDatas: [
        {
          nomor: "1",
          username_user: "faisal01",
          role_user: "Admin",
          nama_lengkap_user: "Dr. Faisal",
          jk_user: "L",
          tgl_lahir_user: "13/01/1989",
          tempat_lahir_user: "Makassar",
          agama_user: "Islam",
          telepon_user: "084234242443",
          no_sip_user: "------",
          status_user: "aktif",
        },
        {
          nomor: "2",
          username_user: "Adam01",
          role_user: "Dokter",
          nama_lengkap_user: "Dr. Faisal",
          jk_user: "P",
          tgl_lahir_user: "13/01/1989",
          tempat_lahir_user: "Makassar",
          agama_user: "Islam",
          telepon_user: "084234242443",
          no_sip_user: "------",
          status_user: "tidak aktif",
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
    toggleForm() {
      this.showForm = !this.showForm;
    },
    submitForm() {},
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
    buttonText() {
      return this.showForm ? "Tutup Form" : "Buka Form";
    },
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
