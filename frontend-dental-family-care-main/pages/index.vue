<template>
  <head>
    <title>Viho</title>
  </head>
  <div class="container-fluid dashboard-default-sec">
    <div
      class="alert alert-warning dark alert-dismissible fade show"
      role="alert">
      <strong>Hallo ! </strong>
      Selamat Datang <strong>Emay Walter</strong>.
      <button
        class="btn-close"
        type="button"
        data-bs-dismiss="alert"
        aria-label="Close"></button>
    </div>
    <div class="row">
      <div class="col-sm-6 col-xl-3 col-lg-6">
        <div class="card o-hidden border-0">
          <div class="bg-primary b-r-4 card-body">
            <div class="media static-top-widget">
              <div class="align-self-center text-center">
                <Icon name="tabler:database" class="fs-1" size="20" />
              </div>
              <div class="media-body">
                <span class="m-0">Total Pasien</span>
                <h4 class="mb-0 counter">
                  <CommenNumberAnimations data="6659" />
                </h4>
                <Icon name="tabler:database" class="icon-bg fs-1" size="20" />
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-xl-3 col-lg-6">
        <div class="card o-hidden border-0">
          <div class="bg-secondary b-r-4 card-body">
            <div class="media static-top-widget">
              <div class="align-self-center text-center">
                <Icon name="tabler:users" class="fs-1" size="20" />
              </div>
              <div class="media-body">
                <span class="m-0">Pasien Hari Ini</span>
                <h4 class="mb-0 counter">
                  <CommenNumberAnimations data="200" />
                </h4>
                <Icon name="tabler:users" class="icon-bg fs-1" size="20" />
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-xl-3 col-lg-6">
        <div class="card o-hidden border-0">
          <div class="bg-info b-r-4 card-body">
            <div class="media static-top-widget">
              <div class="align-self-center text-center">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  class="icon icon-tabler icons-tabler-outline icon-tabler-gender-male fs-1">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <path d="M10 14m-5 0a5 5 0 1 0 10 0a5 5 0 1 0 -10 0" />
                  <path d="M19 5l-5.4 5.4" />
                  <path d="M19 5h-5" />
                  <path d="M19 5v5" />
                </svg>
              </div>
              <div class="media-body">
                <span class="m-0">Pasien Laki - Laki</span>
                <h4 class="mb-0 counter">
                  <CommenNumberAnimations data="200" />
                </h4>

                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  class="icon icon-tabler icons-tabler-outline icon-tabler-gender-male icon-bg fs-1">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <path d="M10 14m-5 0a5 5 0 1 0 10 0a5 5 0 1 0 -10 0" />
                  <path d="M19 5l-5.4 5.4" />
                  <path d="M19 5h-5" />
                  <path d="M19 5v5" />
                </svg>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-xl-3 col-lg-6">
        <div class="card o-hidden border-0">
          <div class="bg-success b-r-4 card-body">
            <div class="media static-top-widget">
              <div class="align-self-center text-center">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  class="icon icon-tabler icons-tabler-outline icon-tabler-gender-female fs-1">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <path d="M12 9m-5 0a5 5 0 1 0 10 0a5 5 0 1 0 -10 0" />
                  <path d="M12 14v7" />
                  <path d="M9 18h6" />
                </svg>
              </div>
              <div class="media-body">
                <span class="m-0">Pasien Perempuan</span>
                <h4 class="mb-0 counter">
                  <CommenNumberAnimations data="200" />
                </h4>

                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  class="icon icon-tabler icons-tabler-outline icon-tabler-gender-female fs-1 icon-bg">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <path d="M12 9m-5 0a5 5 0 1 0 10 0a5 5 0 1 0 -10 0" />
                  <path d="M12 14v7" />
                  <path d="M9 18h6" />
                </svg>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script lang="ts" setup></script>
