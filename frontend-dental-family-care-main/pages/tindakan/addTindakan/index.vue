<template>
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
              <div class="col-12">
                <table class="table">
                  <thead>
                    <tr>
                      <div class="row">
                        <!-- Data Pasien -->
                        <div class="col-md-6">
                          <div class="card">
                            <div
                              class="card-header bg-primary text-white"
                              @click="toggleCardBody1">
                              Data Pasien
                              <i
                                :class="[
                                  expanded1
                                    ? 'icofont icofont-arrow-up'
                                    : 'icofont icofont-arrow-down',
                                  'float-end',
                                ]"
                                style="font-size: 24px"></i>
                            </div>
                            <div class="card-body" v-show="expanded1">
                              <div class="mb-3">
                                <label for="nama" class="form-label"
                                  >Nama</label
                                >
                                <input
                                  type="text"
                                  id="nama"
                                  class="form-control" />

                                <label for="tgl_lahir" class="form-label mt-3"
                                  >Tanggal Lahir</label
                                >
                                <input
                                  type="date"
                                  id="tgl_lahir"
                                  class="form-control" />

                                <label for="umur" class="form-label mt-3"
                                  >Umur</label
                                >
                                <input
                                  type="text"
                                  id="umur"
                                  class="form-control" />

                                <label for="alamat" class="form-label mt-3"
                                  >Alamat</label
                                >
                                <input
                                  type="text"
                                  id="alamat"
                                  class="form-control" />

                                <label for="jk" class="form-label mt-3"
                                  >Jenis Kelamin</label
                                >
                                <select id="jk" class="form-select">
                                  <option value="laki-laki">Laki-laki</option>
                                  <option value="perempuan">Perempuan</option>
                                </select>

                                <label for="agama" class="form-label mt-3"
                                  >Agama</label
                                >
                                <input
                                  type="text"
                                  id="agama"
                                  class="form-control" />

                                <label for="pekerjaan" class="form-label mt-3"
                                  >Pekerjaan</label
                                >
                                <input
                                  type="text"
                                  id="pekerjaan"
                                  class="form-control" />

                                <label for="no_telepon" class="form-label mt-3"
                                  >Nomor Telepon</label
                                >
                                <input
                                  type="text"
                                  id="no_telepon"
                                  class="form-control" />

                                <label
                                  for="keluhan_umum"
                                  class="form-label mt-3"
                                  >Keluhan Umum</label
                                >
                                <textarea
                                  id="keluhan_umum"
                                  class="form-control"
                                  rows="8"></textarea>

                                <label for="nama_dokter" class="form-label mt-3"
                                  >Nama Dokter</label
                                >
                                <input
                                  type="text"
                                  id="nama_dokter"
                                  class="form-control" />
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- End Data Pasien -->
                        <!-- Data Pemeriksaan  -->
                        <div class="col-md-6">
                          <div class="card">
                            <div
                              class="card-header bg-primary text-white"
                              @click="toggleCardBody2">
                              Pemeriksaan
                              <i
                                :class="[
                                  expanded2
                                    ? 'icofont icofont-arrow-up'
                                    : 'icofont icofont-arrow-down',
                                  'float-end',
                                ]"
                                style="font-size: 24px"></i>
                            </div>
                            <div class="card-body" v-show="expanded2">
                              <ul
                                class="nav nav-tabs border-tab"
                                id="top-tab"
                                role="tablist">
                                <li class="nav-item">
                                  <a
                                    class="nav-link active"
                                    id="top-home-tab"
                                    data-bs-toggle="tab"
                                    href="#top-home"
                                    role="tab"
                                    aria-controls="top-home"
                                    aria-selected="true"
                                    >Odontogram</a
                                  >
                                </li>
                                <li class="nav-item">
                                  <a
                                    class="nav-link"
                                    id="profile-top-tab"
                                    data-bs-toggle="tab"
                                    href="#top-profile"
                                    role="tab"
                                    aria-controls="top-profile"
                                    aria-selected="false"
                                    >OHIS</a
                                  >
                                </li>
                              </ul>
                              <div class="tab-content" id="top-tabContent">
                                <div
                                  class="tab-pane fade show active"
                                  id="top-home"
                                  role="tabpanel"
                                  aria-labelledby="top-home-tab">
                                  <div class="mx-4">
                                    <h6>Odontogram</h6>
                                    <div class="table-odontogram">
                                      <table
                                        style="
                                          margin: 0 auto;
                                          width: 600px;
                                          text-align: center;
                                        ">
                                        <tbody>
                                          <tr>
                                            <td>8</td>
                                            <td>7</td>
                                            <td>6</td>
                                            <td>5</td>
                                            <td>4</td>
                                            <td>3</td>
                                            <td>2</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>2</td>
                                            <td>3</td>
                                            <td>4</td>
                                            <td>5</td>
                                            <td>6</td>
                                            <td>7</td>
                                            <td>8</td>
                                          </tr>
                                          <tr>
                                            <td
                                              class="gigi_posterior"
                                              style="
                                                height: 40px;
                                                width: 40px;
                                                padding: 0;
                                                margin: 0;
                                              ">
                                              <i
                                                class="fa fa-"
                                                style="font-size: 2.1em"></i>
                                            </td>
                                            <td
                                              class="gigi_posterior"
                                              style="
                                                height: 40px;
                                                width: 40px;
                                                padding: 0;
                                                margin: 0;
                                              ">
                                              <i
                                                class="fa fa-"
                                                style="font-size: 2.1em"></i>
                                            </td>
                                            <td
                                              class="gigi_posterior"
                                              style="
                                                height: 40px;
                                                width: 40px;
                                                padding: 0;
                                                margin: 0;
                                              ">
                                              <i
                                                class="fa fa-"
                                                style="font-size: 2.1em"></i>
                                            </td>
                                            <td
                                              class="gigi_posterior"
                                              style="
                                                height: 40px;
                                                width: 40px;
                                                padding: 0;
                                                margin: 0;
                                              ">
                                              <i
                                                class="fa fa-"
                                                style="font-size: 2.1em"></i>
                                            </td>
                                            <td
                                              class="gigi_posterior"
                                              style="
                                                height: 40px;
                                                width: 40px;
                                                padding: 0;
                                                margin: 0;
                                              ">
                                              <i
                                                class="fa fa-"
                                                style="font-size: 2.1em"></i>
                                            </td>
                                            <td
                                              class="gigi_anterior"
                                              style="
                                                height: 40px;
                                                width: 40px;
                                                padding: 0;
                                                margin: 0;
                                              ">
                                              <i
                                                class="fa fa-"
                                                style="font-size: 2.1em"></i>
                                            </td>
                                            <td
                                              class="gigi_anterior"
                                              style="
                                                height: 40px;
                                                width: 40px;
                                                padding: 0;
                                                margin: 0;
                                              ">
                                              <i
                                                class="fa fa-"
                                                style="font-size: 2.1em"></i>
                                            </td>
                                            <td
                                              class="gigi_anterior"
                                              style="
                                                height: 40px;
                                                width: 40px;
                                                padding: 0;
                                                margin: 0;
                                              ">
                                              <i
                                                class="fa fa-"
                                                style="font-size: 2.1em"></i>
                                            </td>
                                            <td
                                              class="gigi_anterior"
                                              style="
                                                height: 40px;
                                                width: 40px;
                                                padding: 0;
                                                margin: 0;
                                              ">
                                              <i
                                                class="fa fa-"
                                                style="font-size: 2.1em"></i>
                                            </td>
                                            <td
                                              class="gigi_anterior"
                                              style="
                                                height: 40px;
                                                width: 40px;
                                                padding: 0;
                                                margin: 0;
                                              ">
                                              <i
                                                class="fa fa-"
                                                style="font-size: 2.1em"></i>
                                            </td>
                                            <td
                                              class="gigi_anterior"
                                              style="
                                                height: 40px;
                                                width: 40px;
                                                padding: 0;
                                                margin: 0;
                                              ">
                                              <i
                                                class="fa fa-"
                                                style="font-size: 2.1em"></i>
                                            </td>
                                            <td
                                              class="gigi_posterior"
                                              style="
                                                height: 40px;
                                                width: 40px;
                                                padding: 0;
                                                margin: 0;
                                              ">
                                              <i
                                                class="fa fa-"
                                                style="font-size: 2.1em"></i>
                                            </td>
                                            <td
                                              class="gigi_posterior"
                                              style="
                                                height: 40px;
                                                width: 40px;
                                                padding: 0;
                                                margin: 0;
                                              ">
                                              <i
                                                class="fa fa-"
                                                style="font-size: 2.1em"></i>
                                            </td>
                                            <td
                                              class="gigi_posterior"
                                              style="
                                                height: 40px;
                                                width: 40px;
                                                padding: 0;
                                                margin: 0;
                                              ">
                                              <i
                                                class="fa fa-"
                                                style="font-size: 2.1em"></i>
                                            </td>
                                            <td
                                              class="gigi_posterior"
                                              style="
                                                height: 40px;
                                                width: 40px;
                                                padding: 0;
                                                margin: 0;
                                              ">
                                              <i
                                                class="fa fa-"
                                                style="font-size: 2.1em"></i>
                                            </td>
                                            <td
                                              class="gigi_posterior"
                                              style="
                                                height: 40px;
                                                width: 40px;
                                                padding: 0;
                                                margin: 0;
                                              ">
                                              <i
                                                class="fa fa-"
                                                style="font-size: 2.1em"></i>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td style="height: 5px"></td>
                                          </tr>
                                          <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td
                                              class="gigi_posterior"
                                              style="
                                                height: 40px;
                                                width: 40px;
                                                padding: 0;
                                                margin: 0;
                                              ">
                                              <i
                                                class="fa fa-"
                                                style="font-size: 2.1em"></i>
                                            </td>
                                            <td
                                              class="gigi_posterior"
                                              style="
                                                height: 40px;
                                                width: 40px;
                                                padding: 0;
                                                margin: 0;
                                              ">
                                              <i
                                                class="fa fa-"
                                                style="font-size: 2.1em"></i>
                                            </td>
                                            <td
                                              class="gigi_anterior"
                                              style="
                                                height: 40px;
                                                width: 40px;
                                                padding: 0;
                                                margin: 0;
                                              ">
                                              <i
                                                class="fa fa-"
                                                style="font-size: 2.1em"></i>
                                            </td>
                                            <td
                                              class="gigi_anterior"
                                              style="
                                                height: 40px;
                                                width: 40px;
                                                padding: 0;
                                                margin: 0;
                                              ">
                                              <i
                                                class="fa fa-"
                                                style="font-size: 2.1em"></i>
                                            </td>
                                            <td
                                              class="gigi_anterior"
                                              style="
                                                height: 40px;
                                                width: 40px;
                                                padding: 0;
                                                margin: 0;
                                              ">
                                              <i
                                                class="fa fa-"
                                                style="font-size: 2.1em"></i>
                                            </td>
                                            <td
                                              class="gigi_anterior"
                                              style="
                                                height: 40px;
                                                width: 40px;
                                                padding: 0;
                                                margin: 0;
                                              ">
                                              <i
                                                class="fa fa-"
                                                style="font-size: 2.1em"></i>
                                            </td>
                                            <td
                                              class="gigi_anterior"
                                              style="
                                                height: 40px;
                                                width: 40px;
                                                padding: 0;
                                                margin: 0;
                                              ">
                                              <i
                                                class="fa fa-"
                                                style="font-size: 2.1em"></i>
                                            </td>
                                            <td
                                              class="gigi_anterior"
                                              style="
                                                height: 40px;
                                                width: 40px;
                                                padding: 0;
                                                margin: 0;
                                              ">
                                              <i
                                                class="fa fa-"
                                                style="font-size: 2.1em"></i>
                                            </td>
                                            <td
                                              class="gigi_posterior"
                                              style="
                                                height: 40px;
                                                width: 40px;
                                                padding: 0;
                                                margin: 0;
                                              ">
                                              <i
                                                class="fa fa-"
                                                style="font-size: 2.1em"></i>
                                            </td>
                                            <td
                                              class="gigi_posterior"
                                              style="
                                                height: 40px;
                                                width: 40px;
                                                padding: 0;
                                                margin: 0;
                                              ">
                                              <i
                                                class="fa fa-"
                                                style="font-size: 2.1em"></i>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                          </tr>
                                          <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>5</td>
                                            <td>4</td>
                                            <td>3</td>
                                            <td>2</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>2</td>
                                            <td>3</td>
                                            <td>4</td>
                                            <td>5</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                          </tr>
                                          <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td
                                              class="gigi_posterior"
                                              style="
                                                height: 40px;
                                                width: 40px;
                                                padding: 0;
                                                margin: 0;
                                              ">
                                              <i
                                                class="fa fa-"
                                                style="font-size: 2.1em"></i>
                                            </td>
                                            <td
                                              class="gigi_posterior"
                                              style="
                                                height: 40px;
                                                width: 40px;
                                                padding: 0;
                                                margin: 0;
                                              ">
                                              <i
                                                class="fa fa-"
                                                style="font-size: 2.1em"></i>
                                            </td>
                                            <td
                                              class="gigi_anterior"
                                              style="
                                                height: 40px;
                                                width: 40px;
                                                padding: 0;
                                                margin: 0;
                                              ">
                                              <i
                                                class="fa fa-"
                                                style="font-size: 2.1em"></i>
                                            </td>
                                            <td
                                              class="gigi_anterior"
                                              style="
                                                height: 40px;
                                                width: 40px;
                                                padding: 0;
                                                margin: 0;
                                              ">
                                              <i
                                                class="fa fa-"
                                                style="font-size: 2.1em"></i>
                                            </td>
                                            <td
                                              class="gigi_anterior"
                                              style="
                                                height: 40px;
                                                width: 40px;
                                                padding: 0;
                                                margin: 0;
                                              ">
                                              <i
                                                class="fa fa-"
                                                style="font-size: 2.1em"></i>
                                            </td>
                                            <td
                                              class="gigi_anterior"
                                              style="
                                                height: 40px;
                                                width: 40px;
                                                padding: 0;
                                                margin: 0;
                                              ">
                                              <i
                                                class="fa fa-"
                                                style="font-size: 2.1em"></i>
                                            </td>
                                            <td
                                              class="gigi_anterior"
                                              style="
                                                height: 40px;
                                                width: 40px;
                                                padding: 0;
                                                margin: 0;
                                              ">
                                              <i
                                                class="fa fa-"
                                                style="font-size: 2.1em"></i>
                                            </td>
                                            <td
                                              class="gigi_anterior"
                                              style="
                                                height: 40px;
                                                width: 40px;
                                                padding: 0;
                                                margin: 0;
                                              ">
                                              <i
                                                class="fa fa-"
                                                style="font-size: 2.1em"></i>
                                            </td>
                                            <td
                                              class="gigi_posterior"
                                              style="
                                                height: 40px;
                                                width: 40px;
                                                padding: 0;
                                                margin: 0;
                                              ">
                                              <i
                                                class="fa fa-"
                                                style="font-size: 2.1em"></i>
                                            </td>
                                            <td
                                              class="gigi_posterior"
                                              style="
                                                height: 40px;
                                                width: 40px;
                                                padding: 0;
                                                margin: 0;
                                              ">
                                              <i
                                                class="fa fa-"
                                                style="font-size: 2.1em"></i>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                          </tr>
                                          <tr>
                                            <td style="height: 5px"></td>
                                          </tr>
                                          <tr>
                                            <td
                                              class="gigi_posterior"
                                              style="
                                                height: 40px;
                                                width: 40px;
                                                padding: 0;
                                                margin: 0;
                                              ">
                                              <i
                                                class="fa fa-"
                                                style="font-size: 2.1em"></i>
                                            </td>
                                            <td
                                              class="gigi_posterior"
                                              style="
                                                height: 40px;
                                                width: 40px;
                                                padding: 0;
                                                margin: 0;
                                              ">
                                              <i
                                                class="fa fa-"
                                                style="font-size: 2.1em"></i>
                                            </td>
                                            <td
                                              class="gigi_posterior"
                                              style="
                                                height: 40px;
                                                width: 40px;
                                                padding: 0;
                                                margin: 0;
                                              ">
                                              <i
                                                class="fa fa-"
                                                style="font-size: 2.1em"></i>
                                            </td>
                                            <td
                                              class="gigi_posterior"
                                              style="
                                                height: 40px;
                                                width: 40px;
                                                padding: 0;
                                                margin: 0;
                                              ">
                                              <i
                                                class="fa fa-"
                                                style="font-size: 2.1em"></i>
                                            </td>
                                            <td
                                              class="gigi_posterior"
                                              style="
                                                height: 40px;
                                                width: 40px;
                                                padding: 0;
                                                margin: 0;
                                              ">
                                              <i
                                                class="fa fa-"
                                                style="font-size: 2.1em"></i>
                                            </td>
                                            <td
                                              class="gigi_anterior"
                                              style="
                                                height: 40px;
                                                width: 40px;
                                                padding: 0;
                                                margin: 0;
                                              ">
                                              <i
                                                class="fa fa-"
                                                style="font-size: 2.1em"></i>
                                            </td>
                                            <td
                                              class="gigi_anterior"
                                              style="
                                                height: 40px;
                                                width: 40px;
                                                padding: 0;
                                                margin: 0;
                                              ">
                                              <i
                                                class="fa fa-"
                                                style="font-size: 2.1em"></i>
                                            </td>
                                            <td
                                              class="gigi_anterior"
                                              style="
                                                height: 40px;
                                                width: 40px;
                                                padding: 0;
                                                margin: 0;
                                              ">
                                              <i
                                                class="fa fa-"
                                                style="font-size: 2.1em"></i>
                                            </td>
                                            <td
                                              class="gigi_anterior"
                                              style="
                                                height: 40px;
                                                width: 40px;
                                                padding: 0;
                                                margin: 0;
                                              ">
                                              <i
                                                class="fa fa-"
                                                style="font-size: 2.1em"></i>
                                            </td>
                                            <td
                                              class="gigi_anterior"
                                              style="
                                                height: 40px;
                                                width: 40px;
                                                padding: 0;
                                                margin: 0;
                                              ">
                                              <i
                                                class="fa fa-"
                                                style="font-size: 2.1em"></i>
                                            </td>
                                            <td
                                              class="gigi_anterior"
                                              style="
                                                height: 40px;
                                                width: 40px;
                                                padding: 0;
                                                margin: 0;
                                              ">
                                              <i
                                                class="fa fa-"
                                                style="font-size: 2.1em"></i>
                                            </td>
                                            <td
                                              class="gigi_posterior"
                                              style="
                                                height: 40px;
                                                width: 40px;
                                                padding: 0;
                                                margin: 0;
                                              ">
                                              <i
                                                class="fa fa-"
                                                style="font-size: 2.1em"></i>
                                            </td>
                                            <td
                                              class="gigi_posterior"
                                              style="
                                                height: 40px;
                                                width: 40px;
                                                padding: 0;
                                                margin: 0;
                                              ">
                                              <i
                                                class="fa fa-"
                                                style="font-size: 2.1em"></i>
                                            </td>
                                            <td
                                              class="gigi_posterior"
                                              style="
                                                height: 40px;
                                                width: 40px;
                                                padding: 0;
                                                margin: 0;
                                              ">
                                              <i
                                                class="fa fa-"
                                                style="font-size: 2.1em"></i>
                                            </td>
                                            <td
                                              class="gigi_posterior"
                                              style="
                                                height: 40px;
                                                width: 40px;
                                                padding: 0;
                                                margin: 0;
                                              ">
                                              <i
                                                class="fa fa-"
                                                style="font-size: 2.1em"></i>
                                            </td>
                                            <td
                                              class="gigi_posterior"
                                              style="
                                                height: 40px;
                                                width: 40px;
                                                padding: 0;
                                                margin: 0;
                                              ">
                                              <i
                                                class="fa fa-"
                                                style="font-size: 2.1em"></i>
                                            </td>
                                          </tr>

                                          <tr>
                                            <td>8</td>
                                            <td>7</td>
                                            <td>6</td>
                                            <td>5</td>
                                            <td>4</td>
                                            <td>3</td>
                                            <td>2</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>2</td>
                                            <td>3</td>
                                            <td>4</td>
                                            <td>5</td>
                                            <td>6</td>
                                            <td>7</td>
                                            <td>8</td>
                                          </tr>
                                        </tbody>
                                      </table>
                                      <br /><br />
                                      <table
                                        style="margin: 0 auto; width: 450px">
                                        <tbody>
                                          <tr>
                                            <td>
                                              <span
                                                class="fa fa-arrows-h fa-2x"></span>
                                            </td>
                                            <td>= Erupsi</td>
                                            <td>
                                              <span
                                                class="fa fa-times fa-2x"></span>
                                            </td>
                                            <td>= Hilang</td>
                                            <td>
                                              <span
                                                class="fa fa-circle-o fa-2x"></span>
                                            </td>
                                            <td>= Karies</td>
                                          </tr>
                                          <tr>
                                            <td style="height: 5px"></td>
                                          </tr>
                                          <tr>
                                            <td>
                                              <span
                                                class="fa fa-check fa-2x"></span>
                                            </td>
                                            <td>= Sisa Akar</td>
                                            <td>
                                              <span
                                                class="fa fa-circle fa-2x"></span>
                                            </td>
                                            <td>= Tambalan</td>
                                            <td>
                                              <span
                                                class="fa fa-euro fa-2x"></span>
                                            </td>
                                            <td>= Goyang</td>
                                          </tr>
                                        </tbody>
                                      </table>
                                      <br /><br />
                                    </div>
                                    <div class="row">
                                      <div class="col-md-6">
                                        <label for="" class="form-label"
                                          >Elemen Pemeriksaan
                                        </label>
                                        <multiselect
                                          v-model="valueGigi"
                                          :options="optionsGigi"
                                          placeholder="---------"></multiselect>
                                      </div>
                                      <div class="col-md-6">
                                        <label for="" class="form-label"
                                          >Kondisi Pemeriksaan
                                        </label>
                                        <multiselect
                                          v-model="valueKondisi"
                                          :options="optionsKondisi"
                                          placeholder="---------"></multiselect>
                                      </div>
                                      <div class="col-md-12">
                                        <label for="" class="form-label"
                                          >Catatan Pemeriksaan</label
                                        >
                                        <textarea
                                          class="form-control"
                                          name=""
                                          id=""
                                          cols="30"
                                          rows="3"></textarea>
                                      </div>
                                      <div class="col-md-12 mt-3">
                                        <button
                                          class="btn btn-primary"
                                          @click="success">
                                          Simpan
                                        </button>
                                      </div>
                                    </div>
                                    <h6 class="mt-4">History Odontogram</h6>
                                    <br />
                                    <table
                                      class="table table-bordered table-hover display nowrap"
                                      width="100%">
                                      <thead>
                                        <tr>
                                          <th>Tanggal</th>
                                          <th>Elemen</th>
                                          <th>Kondisi</th>
                                          <th>Catatan</th>
                                          <th>Aksi</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr>
                                          <td>2024-06-13</td>
                                          <td>Gigi 62</td>
                                          <td>Tanggal</td>
                                          <td></td>
                                          <td>
                                            <button
                                              href="#"
                                              class="btn btn-xs btn-danger delete"
                                              v-on:click="hapusAlertState">
                                              <span
                                                class="fa fa-trash fa-2x"></span>
                                            </button>
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </div>
                                </div>
                                <div
                                  class="tab-pane fade"
                                  id="top-profile"
                                  role="tabpanel"
                                  aria-labelledby="profile-top-tab">
                                  <h6 class="mx-4">OHIS</h6>
                                  <p class="mx-4">Debris Index</p>
                                  <div class="row mx-3 mt-3">
                                    <div class="col-md-3">
                                      <input
                                        type="text"
                                        class="form-control"
                                        placeholder="16" />
                                    </div>
                                    <div class="col-md-3">
                                      <input
                                        type="text"
                                        class="form-control"
                                        placeholder="11" />
                                    </div>
                                    <div class="col-md-3">
                                      <input
                                        type="text"
                                        class="form-control"
                                        placeholder="26" />
                                    </div>
                                    <div class="col-md-3 d-none"></div>
                                  </div>
                                  <div class="row mx-3 mt-1">
                                    <div class="col-md-3">
                                      <input
                                        type="text"
                                        class="form-control"
                                        placeholder="46" />
                                    </div>
                                    <div class="col-md-3">
                                      <input
                                        type="text"
                                        class="form-control"
                                        placeholder="31" />
                                    </div>
                                    <div class="col-md-3">
                                      <input
                                        type="text"
                                        class="form-control"
                                        placeholder="36" />
                                    </div>
                                    <div class="col-md-3 d-none"></div>
                                  </div>
                                  <p class="mx-4 mt-4">Calculus Index</p>
                                  <div class="row mx-3 mt-3">
                                    <div class="col-md-3">
                                      <input
                                        type="text"
                                        class="form-control"
                                        placeholder="16" />
                                    </div>
                                    <div class="col-md-3">
                                      <input
                                        type="text"
                                        class="form-control"
                                        placeholder="11" />
                                    </div>
                                    <div class="col-md-3">
                                      <input
                                        type="text"
                                        class="form-control"
                                        placeholder="26" />
                                    </div>
                                    <div class="col-md-3 d-none"></div>
                                  </div>
                                  <div class="row mx-3 mt-1">
                                    <div class="col-md-3">
                                      <input
                                        type="text"
                                        class="form-control"
                                        placeholder="46" />
                                    </div>
                                    <div class="col-md-3">
                                      <input
                                        type="text"
                                        class="form-control"
                                        placeholder="31" />
                                    </div>
                                    <div class="col-md-3">
                                      <input
                                        type="text"
                                        class="form-control"
                                        placeholder="36" />
                                    </div>
                                    <div class="col-md-3 d-none"></div>
                                  </div>
                                  <button
                                    class="btn btn-primary mx-4 mt-3"
                                    @click="success">
                                    Simpan
                                  </button>
                                  <h6 class="mt-5">History OHIS</h6>
                                  <table
                                    class="table table-bordered table-hover display nowrap"
                                    width="100%">
                                    <thead>
                                      <tr>
                                        <th>Tanggal</th>
                                        <th>Debris Index</th>
                                        <th>Calculus Index</th>
                                        <th>Index OHIS</th>
                                        <th>Kriteria OHIS</th>
                                        <th>Aksi</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td>2024-06-13</td>
                                        <td>13.5</td>
                                        <td>12</td>
                                        <td>25.5</td>
                                        <td></td>
                                        <td>
                                          <button
                                            href="#"
                                            class="btn btn-xs btn-danger delete"
                                            v-on:click="hapusAlertState">
                                            <span
                                              class="fa fa-trash fa-2x"></span>
                                          </button>
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- End Data Pemeriksaan  -->
                      </div>
                    </tr>
                  </thead>
                </table>
                <h5 class="">Rincian Tindakan</h5>
                <div>
                  <button @click="addRow" class="btn btn-primary mb-3">
                    Tambah Kolom
                  </button>

                  <table class="table table-bordered no-padding" width="100%">
                    <thead>
                      <tr>
                        <th class="bg-primary" width="5">Id Tindakan</th>
                        <th class="bg-primary" width="5">Tanggal</th>
                        <th class="bg-primary" width="200">Diagnosa</th>
                        <th class="bg-primary" width="200">Perawatan</th>
                        <th class="bg-primary" width="100">Biaya</th>
                        <th class="bg-primary" width="150">Catatan</th>
                        <th class="bg-primary" width="150">Pembayaran</th>
                        <th class="bg-primary" width="5">Aksi</th>
                        <th class="bg-primary" width="100">Sub Total</th>
                      </tr>
                    </thead>
                    <tbody>
                      <template v-for="(row, index) in rows" :key="index">
                        <tr
                          :class="{
                            merged: shouldMerge(index, 'tanggal'),
                          }">
                          <td>{{ row.no_tindakan }}</td>

                          <template v-if="shouldRenderCell(index, 'tanggal')">
                            <td :rowspan="calculateRowspan(index, 'tanggal')">
                              {{ row.tanggal }}
                            </td>
                          </template>
                          <td>
                            <textarea
                              v-model="row.diagnosa"
                              class="form-control"
                              placeholder="Silahkan Di isi jika ada Diagnosa..."></textarea>
                          </td>

                          <td>
                            <textarea
                              v-model="row.perawatan"
                              class="form-control"
                              placeholder="Silahkan Di isi jika ada Perawatan..."></textarea>
                          </td>

                          <td>
                            <input
                              v-model="row.biaya"
                              type="text"
                              class="form-control"
                              placeholder="Biaya..." />
                          </td>

                          <td>
                            <textarea
                              v-model="row.catatan"
                              class="form-control"
                              placeholder="Silahkan Di isi jika ada Catatan..."></textarea>
                          </td>
                          <td>
                            <select
                              name="pembayaran_pasien"
                              id="pembayaran_pasien"
                              class="form-control">
                              <option value="">--Pilih--</option>
                              <option value="Tunai">Tunai</option>
                              <option value="Transfer">Transfer</option>
                            </select>
                          </td>

                          <td class="text-center">
                            <button
                              class="btn btn-xs btn-danger delete mt-3"
                              @click="deleteRow(index)">
                              <span class="fa fa-trash fa-2x"></span>
                            </button>
                          </td>

                          <td>
                            <input
                              type="number"
                              v-model="row.sub_total"
                              class="form-control"
                              placeholder="Sub Total..." />
                          </td>
                        </tr>
                      </template>
                    </tbody>
                  </table>
                  <table class="table table-bordered no-padding" width="100%">
                    <tbody>
                      <tr>
                        <td valign="top" class="bg-primary">Total</td>
                        <td valign="top" class="bg-primary">
                          <div class="row align-items-center">
                            <div class="col-auto">
                              <span>Rp.</span>
                            </div>
                            <div class="col">
                              <input
                                type="number"
                                class="form-control"
                                placeholder="Masukkan Total..." />
                            </div>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="d-flex justify-content-end">
                  <button
                    class="btn btn-warning"
                    v-on:click="successAlertState">
                    Selesai
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { useToast } from "vue-toast-notification";
import Multiselect from "vue-multiselect";
import swal from "sweetalert2";
import "vue-toast-notification/dist/theme-sugar.css";

const toast = useToast();

export default {
  created() {},

  data() {
    return {
      loading: false,
      start: true,
      store: null,
      showForm: false,
      title: "Layanan & Tindakan",
      subTitle: "Kelola Data",
      nextTanggal: 1,
      nextNoTindakan: 1,
      expanded1: false,
      expanded2: false,
      rows: [],
      valueGigi: null,
      optionsTindakan: ["Cabut Gigi"],
      optionsGigi: [
        "Gigi 18",
        "Gigi 17",
        "Gigi 16",
        "Gigi 15",
        "Gigi 14",
        "Gigi 13",
        "Gigi 12",
        "Gigi 11",
        "Gigi 21",
        "Gigi 22",
        "Gigi 23",
        "Gigi 24",
        "Gigi 25",
        "Gigi 26",
        "Gigi 27",
        "Gigi 28",
        "Gigi 38",
        "Gigi 37",
        "Gigi 36",
        "Gigi 35",
        "Gigi 34",
        "Gigi 33",
        "Gigi 32",
        "Gigi 31",
        "Gigi 41",
        "Gigi 42",
        "Gigi 43",
        "Gigi 44",
        "Gigi 45",
        "Gigi 46",
        "Gigi 47",
        "Gigi 48",
        "Gigi 55",
        "Gigi 54",
        "Gigi 53",
        "Gigi 52",
        "Gigi 51",
        "Gigi 61",
        "Gigi 62",
        "Gigi 63",
        "Gigi 64",
        "Gigi 65",
        "Gigi 75",
        "Gigi 74",
        "Gigi 73",
        "Gigi 72",
        "Gigi 71",
        "Gigi 81",
        "Gigi 82",
        "Gigi 83",
        "Gigi 84",
        "Gigi 85",
      ],
      valueKondisi: null,
      optionsKondisi: [
        "Erupsi",
        "Tanggal",
        "Karies",
        "Sisa Akar",
        "Tumpatan",
        "Goyang",
      ],
    };
  },
  methods: {
    success() {
      toast.success("Data Berhasil Di Simpan ", {
        hideProgressBar: true,
        autoClose: 2000,
        theme: "colored",
        position: "top-right",
      });
    },
    successAlertState() {
      swal
        .fire({
          icon: "success",
          title: "Berhasil!",
          text: "Data Di Simpan!",
          confirmButtonColor: "var(--theme-default)",
        })
        .then(() => {
          const router = useRouter();
          router.push("/tindakan");
        });
    },
    hapusAlertState() {
      swal.fire({
        icon: "success",
        title: "Berhasil!",
        text: "Data Di Hapus!",
        confirmButtonColor: "var(--theme-default)",
      });
    },
    toggleCardBody1() {
      this.expanded1 = !this.expanded1;
    },
    toggleCardBody2() {
      this.expanded2 = !this.expanded2;
    },
    addRow() {
      const newRow = {
        no_tindakan: this.nextNoTindakan++,
        tanggal: "23/01/2023",
        diagnosa: "",
        perawatan: "",
        biaya: "",
        catatan: "",
        sub_total: "",
      };

      this.rows.push(newRow);
    },
    deleteRow(index) {
      this.rows.splice(index, 1);
    },
    calculateRowspan(rowIndex, key) {
      let rowspan = 1;

      for (let i = rowIndex + 1; i < this.rows.length; i++) {
        if (this.rows[i][key] === this.rows[rowIndex][key]) {
          rowspan++;
        } else {
          break;
        }
      }

      return rowspan;
    },
    shouldMerge(rowIndex, key) {
      return (
        rowIndex > 0 &&
        this.rows[rowIndex][key] === this.rows[rowIndex - 1][key]
      );
    },
    shouldRenderCell(rowIndex, key) {
      return (
        rowIndex === 0 ||
        this.rows[rowIndex][key] !== this.rows[rowIndex - 1][key]
      );
    },
  },
  computed: {},
};
definePageMeta({
  layout: "default",
});
</script>
<style scoped>
table td,
table th {
  padding: 5px;
}
.table-odontogram {
  width: 100%;
  overflow-y: auto;
  _overflow: auto;
  margin: 0 0 1em;
  padding-right: 0px;
}
.gigi_posterior {
  background: url("@/assets/img/posterior.png");
  background-repeat: no-repeat;
  background-size: 100% 100%;
}
.gigi_anterior {
  background: url("@/assets/img/anterior.png");
  background-repeat: no-repeat;
  background-size: 100% 100%;
}
td.name {
  font-weight: bold;
  font-size: 14px;
}
input.odont_input,
.odont_color {
  width: 25px;
  height: 25px;
  padding: 6px 6px;
  font-weight: bold;
  font-size: 14px;
  text-align: center;
}

div.form-container {
  margin: 10px;
  padding: 5px;
  background-color: #fff;
}

p.legend {
  margin-bottom: 1em;
}
p.legend em {
  color: #c00;
  font-style: normal;
}

div.form-container div.controlset {
  display: block;
  float: left;
  width: 100%;
  padding: 0.25em 0;
}

div.form-container div.controlset label,
div.form-container div.controlset input,
div.form-container div.controlset div {
  display: inline;
  float: left;
}

div.form-container div.controlset label {
  width: 100px;
}

div.color_picker {
  height: 25px;
  width: 25px;
  padding: 0 !important;
  border: 1px solid #ccc;
  background: url(arrow.gif) no-repeat top right;
  cursor: pointer;
  line-height: 16px;
}

div#color_selector {
  width: 106px;
  position: absolute;
  border: 1px solid #598fef;
  background-color: #efefef;
  padding: 2px;
}
div#color_custom {
  width: 100%;
  float: left;
}
div#color_custom label {
  font-size: 95%;
  color: #2f2f2f;
  margin: 5px 2px;
  width: 25%;
}
div#color_custom input {
  margin: 5px 2px;
  padding: 0;
  font-size: 95%;
  border: 1px solid #000;
  width: 65%;
}

div.color_swatch {
  height: 20px;
  width: 20px;
  border: 1px solid #000;
  margin: 2px;
  float: left;
  cursor: pointer;
  line-height: 12px;
}
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
.float-end {
  float: right;
}
.no-padding {
  padding: 0;
}
.table th,
.table td {
  vertical-align: middle;
}
.delete {
  text-decoration: none;
}
</style>
