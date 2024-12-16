// plugins/axios.ts
import { defineNuxtPlugin, useRuntimeConfig } from '#app';
import axios from 'axios';

export default defineNuxtPlugin(() => {
  const config = useRuntimeConfig();
  
  const instance = axios.create({
    baseURL: config.public.axios.baseURL, // Menggunakan baseURL dari runtimeConfig.
    headers: {
        "Content-Type": "application/json",
      },
  });

  return {
    provide: {
      axios: instance
    }
  };
});
