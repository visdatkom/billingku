// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  devtools: { enabled: true },
  ssr: false,
  app: {
    head: {
      link: [
        {
          href: "https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap.",
          rel: "stylesheet",
        },
        {
          href: "https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap",
          rel: "stylesheet",
        },
        {
          href: "https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap",
          rel: "stylesheet",
        },
      ],
    },
  },
  baseURL: "/viho/",
  css: ["bootstrap/dist/css/bootstrap.min.css", "@/assets/scss/app.scss"],
  script: [
    {
      src: "bootstrap/dist/js/bootstrap.bundle.min.js",
    },
  ],
  alias: {
    pinia: "/node_modules/@pinia/nuxt/node_modules/pinia/dist/pinia.mjs",
  },
  modules: ["@pinia/nuxt", "nuxt-icon", "floating-vue/nuxt"],

  pinia: {
    autoImports: [
      "defineStore", // import { defineStore } from 'pinia'
      ["defineStore", "definePiniaStore"], // import { defineStore as definePiniaStore } from 'pinia'
    ],
  },
  plugins: [
    { src: "~/plugins/plugins.ts", ssr: false, mode: "client" },
    { src: "./plugins/useBootstrap.client.ts", mode: "client" },
  ],
});
