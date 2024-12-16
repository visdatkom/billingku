export default defineNuxtConfig({
  compatibilityDate: '2024-04-03',
  ssr: true,
  devtools: { enabled: false },
  css: ["~/assets/css/tailwind.css"],
  postcss: {
    plugins: {
      tailwindcss: {},
      autoprefixer: {},
    },
  },
  modules: [
    '@pinia/nuxt',
  ],
  app: {
    baseURL: '/', // Base URL proyek
    buildAssetsDir: '/_nuxt/', // Direktori aset build
  },
  vite: {
    server: {
      fs: {
        allow: [
          '.', // Direktori proyek saat ini
          'D:/nuxt3-admin-template-main', // Direktori proyek
        ],
      },
    },
  },
  runtimeConfig: {
    apiSecret: "",
    public: {
      apiBase: "/api",
      axios: {
        baseURL: "http://localhost/billingku", // Pastikan URL benar
      },
    },
  }
});
