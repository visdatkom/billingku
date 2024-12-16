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
              <!-- Tambah Pasien -->
              <div class="row" v-if="showForm" @submit.prevent="submitForm">
                <div class="col-md-1"></div>
                <div class="col-md-5 bordered-column m-1">
                  <div class="row">
                    <div class="col-md-2 mt-2">
                      <label for="" class="form-label">No. Rm</label>
                    </div>
                    <div class="col-md-4">
                      <input
                        type="number"
                        class="form-control"
                        name="no_rm_pasien"
                        id="no_rm_pasien" />
                    </div>
                    <div class="col-md-2 mt-2">
                      <label for="" class="form-label">Tgl. Daftar</label>
                    </div>
                    <div class="col-md-4">
                      <input
                        type="date"
                        class="form-control"
                        name="tgl_daftar_pasien"
                        id="tgl_daftar_pasien" />
                    </div>
                  </div>
                  <div class="row mt-3">
                    <div class="col-md-2 mt-2">
                      <label for="" class="form-label">Nama</label>
                    </div>
                    <div class="col-md-10">
                      <input
                        type="text"
                        class="form-control"
                        name="nama_pasien"
                        id="nama_pasien" />
                    </div>
                  </div>
                  <div class="row mt-3">
                    <div class="col-md-2 mt-2">
                      <label for="" class="form-label">Tgl. Lahir</label>
                    </div>
                    <div class="col-md-4">
                      <input
                        type="date"
                        class="form-control"
                        name="tgl_lahir_pasien"
                        id="tgl_lahir_pasien" />
                    </div>
                    <div class="col-md-2 mt-2">
                      <label for="" class="form-label">J. Kelamin</label>
                    </div>
                    <div class="col-md-4">
                      <select
                        name="jk_pasien"
                        id="jk_pasien"
                        class="form-control">
                        <option value="laki-laki">L</option>
                        <option value="perempuan">P</option>
                      </select>
                    </div>
                  </div>
                  <div class="row mt-3">
                    <div class="col-md-2 mt-2">
                      <label for="" class="form-label">Pekerjaan</label>
                    </div>
                    <div class="col-md-4">
                      <input
                        type="text"
                        class="form-control"
                        name="pekerjaan_pasien"
                        id="pekerjaan_pasien" />
                    </div>
                    <div class="col-md-2 mt-2">
                      <label for="" class="form-label">Agama</label>
                    </div>
                    <div class="col-md-4">
                      <select name="agama" id="agama" class="form-control">
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Budha">Budha</option>
                        <option value="Konghucu">Konghucu</option>
                      </select>
                    </div>
                  </div>
                  <div class="row mt-3">
                    <div class="col-md-2 mt-2">
                      <label for="" class="form-label">Alamat</label>
                    </div>
                    <div class="col-md-10">
                      <textarea
                        name="alamat_pasien"
                        id="alamat_pasien"
                        class="form-control"
                        cols="30"
                        rows="2"></textarea>
                    </div>
                  </div>
                </div>
                <div class="col-md-5 bordered-column m-1">
                  <div class="row">
                    <div class="col-md-2 mt-2">
                      <label for="" class="form-label">Nomor Telepon</label>
                    </div>
                    <div class="col-md-10">
                      <input
                        type="number"
                        class="form-control"
                        name="nomor_telepon_pasien"
                        id="nomor_telepon_pasien" />
                    </div>
                  </div>
                  <div class="row mt-3">
                    <div class="col-md-2 mt-2">
                      <label for="" class="form-label">Keluhan Umum</label>
                    </div>
                    <div class="col-md-10">
                      <textarea
                        name="keluhan_pasien"
                        id="keluhan_pasien"
                        class="form-control"
                        cols="30"
                        rows="6"></textarea>
                    </div>
                  </div>
                  <div class="row mt-3">
                    <div class="col-md-2 mt-2">
                      <label for="" class="form-label">Dokter</label>
                    </div>
                    <div class="col-md-10">
                      <select
                        name="nama_dokter"
                        id="nama_dokter"
                        class="form-control">
                        <option value="--pilih--">--pilih--</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="text-center mt-4">
                  <button
                    class="btn btn-primary mx-2"
                    v-on:click="successAlertState">
                    <i class="icofont icofont-save"></i> Simpan
                  </button>
                  <button class="btn btn-danger mx-2" @click="toggleForm">
                    <i class="icofont icofont-close"></i> Batal
                  </button>
                </div>
              </div>
              <!-- End Tambah Pasien  -->
              <!-- Edit Pasien -->
              <div class="row" v-if="selectedItem">
                <div class="col-md-1"></div>
                <div class="col-md-5 bordered-column m-1">
                  <div class="row">
                    <div class="col-md-2 mt-2">
                      <label for="" class="form-label">No. Rm</label>
                    </div>
                    <div class="col-md-4">
                      <input
                        type="number"
                        class="form-control"
                        name="no_rm_pasien"
                        id="no_rm_pasien"
                        v-model="selectedItem.no_rm_pasien" />
                    </div>
                    <div class="col-md-2 mt-2">
                      <label for="" class="form-label">Tgl. Daftar</label>
                    </div>
                    <div class="col-md-4">
                      <input
                        type="text"
                        class="form-control"
                        name="tgl_daftar_pasien"
                        id="tgl_daftar_pasien"
                        v-model="selectedItem.tgl_daftar_pasien" />
                    </div>
                  </div>
                  <div class="row mt-3">
                    <div class="col-md-2 mt-2">
                      <label for="" class="form-label">Nama</label>
                    </div>
                    <div class="col-md-10">
                      <input
                        type="text"
                        class="form-control"
                        name="nama_pasien"
                        id="nama_pasien"
                        v-model="selectedItem.nama_pasien" />
                    </div>
                  </div>
                  <div class="row mt-3">
                    <div class="col-md-2 mt-2">
                      <label for="" class="form-label">Tgl. Lahir</label>
                    </div>
                    <div class="col-md-4">
                      <input
                        type="text"
                        class="form-control"
                        name="tgl_lahir_pasien"
                        id="tgl_lahir_pasien"
                        v-model="selectedItem.tgl_lahir_pasien" />
                    </div>
                    <div class="col-md-2 mt-2">
                      <label for="" class="form-label">J. Kelamin</label>
                    </div>
                    <div class="col-md-4">
                      <select
                        name="jk_pasien"
                        id="jk_pasien"
                        class="form-control"
                        v-model="selectedItem.jk_pasien">
                        <option value="L">L</option>
                        <option value="P">P</option>
                      </select>
                    </div>
                  </div>
                  <div class="row mt-3">
                    <div class="col-md-2 mt-2">
                      <label for="" class="form-label">Pekerjaan</label>
                    </div>
                    <div class="col-md-4">
                      <input
                        type="text"
                        class="form-control"
                        name="pekerjaan_pasien"
                        id="pekerjaan_pasien"
                        v-model="selectedItem.pekerjaan_pasien" />
                    </div>
                    <div class="col-md-2 mt-2">
                      <label for="" class="form-label">Agama</label>
                    </div>
                    <div class="col-md-4">
                      <select
                        name="agama"
                        id="agama"
                        class="form-control"
                        v-model="selectedItem.agama_pasien">
                        <option value="">--Pilih--</option>
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Budha">Budha</option>
                        <option value="Konghucu">Konghucu</option>
                      </select>
                    </div>
                  </div>
                  <div class="row mt-3">
                    <div class="col-md-2 mt-2">
                      <label for="" class="form-label">Alamat</label>
                    </div>
                    <div class="col-md-10">
                      <textarea
                        name="alamat_pasien"
                        id="alamat_pasien"
                        class="form-control"
                        cols="30"
                        rows="2"
                        v-model="selectedItem.alamat_pasien"></textarea>
                    </div>
                  </div>
                </div>
                <div class="col-md-5 bordered-column m-1">
                  <div class="row">
                    <div class="col-md-2 mt-2">
                      <label for="" class="form-label">Nomor Telepon</label>
                    </div>
                    <div class="col-md-10">
                      <input
                        type="number"
                        class="form-control"
                        name="nomor_telepon_pasien"
                        id="nomor_telepon_pasien"
                        v-model="selectedItem.nomor_telepon_pasien" />
                    </div>
                  </div>
                  <div class="row mt-3">
                    <div class="col-md-2 mt-2">
                      <label for="" class="form-label">Keluhan Umum</label>
                    </div>
                    <div class="col-md-10">
                      <textarea
                        name="keluhan_pasien"
                        id="keluhan_pasien"
                        class="form-control"
                        cols="30"
                        rows="6"
                        v-model="selectedItem.keluhan_pasien"></textarea>
                    </div>
                  </div>
                  <div class="row mt-3">
                    <div class="col-md-2 mt-2">
                      <label for="" class="form-label">Dokter</label>
                    </div>
                    <div class="col-md-10">
                      <select
                        name="nama_dokter"
                        id="nama_dokter"
                        class="form-control"
                        v-model="selectedItem.nama_dokter">
                        <option value="">--pilih--</option>
                        <option value="Dr. Luqman">Dr. Luqman</option>
                        <option value="Dr. adi">Dr. adi</option>
                        <option value="Dr. Faisal, Sp.">Dr. Faisal, Sp.</option>
                      </select>
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
              <!-- End Edit Pasien  -->
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
                        {{ item.no_rm_pasien }}
                      </td>
                      <td style="border: 1px solid white">
                        {{ item.nama_pasien }}
                      </td>
                      <td style="border: 1px solid white">
                        {{ item.umur_pasien }}
                      </td>
                      <td style="border: 1px solid white">
                        {{ item.alamat_pasien }}
                      </td>
                      <td style="border: 1px solid white">
                        {{ item.jk_pasien }}
                      </td>
                      <td style="border: 1px solid white">
                        {{ item.agama_pasien }}
                      </td>
                      <td style="border: 1px solid white">
                        {{ item.pekerjaan_pasien }}
                      </td>
                      <td style="border: 1px solid white">
                        {{ item.nomor_telepon_pasien }}
                      </td>
                      <td style="border: 1px solid white">
                        {{ item.tgl_daftar_pasien }}
                      </td>
                      <td style="border: 1px solid white">
                        {{ item.nama_dokter }}
                      </td>
                      <td style="border: 1px solid white">
                        <button
                          class="btn btn-warning"
                          v-on:click="selectedItem = item">
                          <i class="icofont icofont-settings-alt"></i>
                        </button>
                        <button
                          class="btn btn-info mx-2"
                          data-bs-toggle="modal"
                          data-bs-target="#modalLihat"
                          data-whatever="@mdo">
                          <i class="icofont icofont-file"></i>
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
          <!-- MODAL VIEW -->
          <div
            class="modal fade modal-xl"
            id="modalLihat"
            tabindex="-1"
            role="dialog"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
            ref="modalLihat">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">
                    History Pasien
                  </h5>
                  <button
                    class="btn-close"
                    type="button"
                    data-bs-dismiss="modal"
                    aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <h6>Data Riwayat Perawatan</h6>
                  <div class="table table-responsive">
                    <table
                      width="100%"
                      border="1"
                      align="center"
                      cellpadding="3px"
                      cellspacing="0"
                      class="tbl_form">
                      <tbody>
                        <tr class="isi">
                          <td valign="top" width="20%">No.RM</td>
                          <td valign="top" width="1%" align="center">:</td>
                          <td valign="top" width="79%">
                            <span id="no_rkm_medis">000212</span>
                          </td>
                        </tr>
                        <tr class="isi">
                          <td valign="top" width="20%">Tgl. Daftar</td>
                          <td valign="top" width="1%" align="center">:</td>
                          <td valign="top" width="79%">12/02/2003</td>
                        </tr>
                        <tr class="isi">
                          <td valign="top" width="20%">Nama</td>
                          <td valign="top" width="1%" align="center">:</td>
                          <td valign="top" width="79%">
                            Jl. Manggis III Blok. 10
                          </td>
                        </tr>
                        <tr class="isi">
                          <td valign="top" width="20%">Umur</td>
                          <td valign="top" width="1%" align="center">:</td>
                          <td valign="top" width="79%">
                            0 Th 0 Bl 0 Hr Tahun (Laki-Laki)
                          </td>
                        </tr>
                        <tr class="isi">
                          <td valign="top" width="20%">Tanggal Lahir</td>
                          <td valign="top" width="1%" align="center">:</td>
                          <td valign="top" width="79%">2000-06-22</td>
                        </tr>
                        <tr class="isi">
                          <td valign="top" width="20%">Agama</td>
                          <td valign="top" width="1%" align="center">:</td>
                          <td valign="top" width="79%">Islam</td>
                        </tr>
                        <tr class="isi">
                          <td valign="top" width="20%">Pekerjaan</td>
                          <td valign="top" width="1%" align="center">:</td>
                          <td valign="top" width="79%">-</td>
                        </tr>
                        <tr class="isi">
                          <td valign="top" width="20%">Nomor Telepon</td>
                          <td valign="top" width="1%" align="center">:</td>
                          <td valign="top" width="79%">08123193213</td>
                        </tr>
                      </tbody>
                    </table>
                    <br />
                    <h6 class="m-t-xl">Data Riwayat</h6>
                    <table
                      width="100%"
                      border="1"
                      align="center"
                      cellpadding="3px"
                      cellspacing="0"
                      class="tbl_form">
                      <tbody>
                        <tr class="isi">
                          <td valign="top" width="20%">Tanggal Tindakan</td>
                          <td valign="top" width="1%" align="center">:</td>
                          <td valign="top" width="79%">2024-05-29</td>
                        </tr>
                        <tr class="isi">
                          <td valign="top" width="20%">Dokter</td>
                          <td valign="top" width="1%" align="center">:</td>
                          <td valign="top" width="79%">Dr. Faisal</td>
                        </tr>
                        <tr class="isi">
                          <td valign="top" width="20%">Pemeriksaan</td>
                          <td valign="top" width="1%" align="center">:</td>
                          <td valign="top" width="79%">
                            <table
                              width="100%"
                              border="1"
                              align="center"
                              cellpadding="3px"
                              cellspacing="0"
                              class="tbl_form">
                              <tbody>
                                <tr>
                                  <td valign="top" colspan="4">Odontogram</td>
                                </tr>
                                <tr align="center">
                                  <td
                                    valign="top"
                                    width="15%"
                                    bgcolor="#FFFAF8">
                                    Tanggal
                                  </td>
                                  <td
                                    valign="top"
                                    width="20%"
                                    bgcolor="#FFFAF8">
                                    Elemen
                                  </td>
                                  <td
                                    valign="top"
                                    width="20%"
                                    bgcolor="#FFFAF8">
                                    Kondisi
                                  </td>
                                  <td
                                    valign="top"
                                    width="45%"
                                    bgcolor="#FFFAF8">
                                    Catatan
                                  </td>
                                </tr>
                                <tr>
                                  <td
                                    valign="top"
                                    rowspan="2"
                                    class="text-center"
                                    style="
                                      text-align: center;
                                      vertical-align: middle;
                                    ">
                                    2024-05-29 08:18:50
                                  </td>
                                  <td valign="top">Gigi 62</td>
                                  <td valign="top">Tanggal</td>
                                  <td valign="top">
                                    Lorem ipsum dolor, sit amet consectetur
                                    adipisicing elit. Illo, consequatur aperiam
                                    similique veniam alias perferendis quis
                                    dignissimos nesciunt eaque sint, quasi
                                    quibusdam ipsam velit praesentium libero
                                    tenetur sapiente. Dolor, obcaecati.
                                  </td>
                                </tr>
                                <tr>
                                  <td valign="top">Gigi 14</td>
                                  <td valign="top">Tanggal</td>
                                  <td valign="top">
                                    Lorem ipsum dolor, sit amet consectetur
                                    adipisicing elit. Illo, consequatur aperiam
                                    similique veniam alias perferendis quis
                                    dignissimos nesciunt eaque sint, quasi
                                    quibusdam ipsam velit praesentium libero
                                    tenetur sapiente. Dolor, obcaecati.
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                            <br />
                            <table
                              width="100%"
                              border="1"
                              align="center"
                              cellpadding="3px"
                              cellspacing="0"
                              class="tbl_form">
                              <tbody>
                                <tr>
                                  <td valign="top" colspan="6 ">OHIS</td>
                                </tr>
                                <tr align="center">
                                  <td
                                    valign="top"
                                    width="15%"
                                    bgcolor="#FFFAF8">
                                    Tanggal
                                  </td>
                                  <td
                                    valign="top"
                                    width="15%"
                                    bgcolor="#FFFAF8">
                                    Debrix Index
                                  </td>
                                  <td
                                    valign="top"
                                    width="15%"
                                    bgcolor="#FFFAF8">
                                    Calculus Index
                                  </td>
                                  <td
                                    valign="top"
                                    width="15%"
                                    bgcolor="#FFFAF8">
                                    Index OHIS
                                  </td>
                                  <td
                                    valign="top"
                                    width="15%"
                                    bgcolor="#FFFAF8">
                                    Kriteria OHIS
                                  </td>
                                </tr>
                                <tr>
                                  <td
                                    valign="top"
                                    rowspan="2"
                                    class="text-center"
                                    style="
                                      text-align: center;
                                      vertical-align: middle;
                                    ">
                                    2024-05-29 08:18:50
                                  </td>
                                  <td valign="top">13.5</td>
                                  <td valign="top">12</td>
                                  <td valign="top">25.5</td>
                                  <td valign="top">25.5</td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                        <tr class="isi">
                          <td valign="top" width="20%">Tindakan Perawatan</td>
                          <td valign="top" width="1%" align="center">:</td>
                          <td valign="top" width="79%">
                            <table
                              width="100%"
                              border="1"
                              align="center"
                              cellpadding="3px"
                              cellspacing="0"
                              class="tbl_form"
                              style="margin-bottom: 2px">
                              <tbody>
                                <tr>
                                  <td valign="top" colspan="8">Tindakan</td>
                                </tr>
                                <tr align="center">
                                  <td valign="top" width="5%" bgcolor="#FFFAF8">
                                    Id
                                  </td>
                                  <td
                                    valign="top"
                                    width="15%"
                                    bgcolor="#FFFAF8">
                                    Tanggal
                                  </td>
                                  <td
                                    valign="top"
                                    width="10%"
                                    bgcolor="#FFFAF8">
                                    Diagnosa
                                  </td>
                                  <td
                                    valign="top"
                                    width="10%"
                                    bgcolor="#FFFAF8">
                                    Perawatan
                                  </td>
                                  <td
                                    valign="top"
                                    width="10%"
                                    bgcolor="#FFFAF8">
                                    Dokter
                                  </td>
                                  <td
                                    valign="top"
                                    width="10%"
                                    bgcolor="#FFFAF8">
                                    Biaya
                                  </td>
                                  <td
                                    valign="top"
                                    width="20%"
                                    bgcolor="#FFFAF8">
                                    Catatan
                                  </td>
                                  <td
                                    valign="top"
                                    width="10%"
                                    bgcolor="#FFFAF8">
                                    Pembayaran
                                  </td>
                                </tr>
                                <tr>
                                  <td valign="top">1</td>
                                  <td
                                    valign="top"
                                    class="text-center"
                                    style="
                                      text-align: center;
                                      vertical-align: middle;
                                    "
                                    rowspan="2">
                                    2024-05-29 08:18:50
                                  </td>

                                  <td valign="top">Cabut Gigi</td>
                                  <td valign="top">Tindakan</td>
                                  <td valign="top">Dr. Faisal</td>
                                  <td valign="top">Rp. 50.000</td>
                                  <td valign="top">
                                    Lorem, ipsum dolor sit amet consectetur
                                    adipisicing elit.
                                  </td>
                                  <td valign="top">Tunai</td>
                                </tr>
                                <tr>
                                  <td valign="top">2</td>
                                  <td valign="top">Cabut Gigi</td>
                                  <td valign="top">Tindakan</td>
                                  <td valign="top">Dr. Faisal</td>
                                  <td valign="top">Rp. 50.000</td>
                                  <td valign="top">
                                    Lorem, ipsum dolor sit amet consectetur
                                    adipisicing elit.
                                  </td>
                                  <td valign="top">Tunai</td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <br />
                    <br />
                    <h1>
                      Munculkan Ki Nanti Riwayat Tindakannya semua kalau misal
                      lakukan ki lgi tindakan selanjutnya
                    </h1>
                  </div>
                </div>
                <div class="modal-footer">
                  <button
                    class="btn btn-danger"
                    type="button"
                    data-bs-dismiss="modal"
                    id="filterModalHistoryClose">
                    Batal
                  </button>
                  <button
                    class="btn btn-success"
                    type="button"
                    data-bs-dismiss="modal">
                    Cetak
                  </button>
                </div>
              </div>
            </div>
          </div>
          <!-- END MODAL VIEW -->
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
      title: "Pasien ",
      subTitle: "Data Pasien",
      filters: {
        nama: "",
        alamat: "",
      },
      tableColums: [
        "No RM",
        "Nama Lengkap",
        "Umur",
        "Alamat",
        "JK",
        "Agama",
        "Pekerjaan",
        "Telepon",
        "T.Daftar",
        "Dokter",
        "#",
      ],
      tableDatas: [
        {
          no_rm_pasien: "01",
          tgl_lahir_pasien: "12/01/2022",
          nama_pasien: "Nazriel Irham, S.Kom",
          umur_pasien: "34 Tahun",
          alamat_pasien: "Jl. Manggis III, No.12",
          jk_pasien: "L",
          agama_pasien: "Kristen",
          pekerjaan_pasien: "Pekerjaan",
          nomor_telepon_pasien: "08574324234",
          tgl_daftar_pasien: "13/01/2023",
          keluhan_pasien: "Sakit Gigi dan Ingin Mencabut Gigi ",
          nama_dokter: "Dr. Faisal, Sp.",
        },
        {
          no_rm_pasien: "02",
          nama_pasien: "Nama Pasien",
          umur_pasien: "34 Tahun",
          alamat_pasien: "Alamat Pasien",
          jk_pasien: "P",
          agama_pasien: "Islam",
          pekerjaan_pasien: "Pekerjaan",
          nomor_telepon_pasien: "08574324234",
          tgl_daftar_pasien: "13/01/2023",
          nama_dokter: "Dr. adi",
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
