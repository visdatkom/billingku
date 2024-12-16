<template>
  <button class="btn btn-primary-light" type="button" @click="logOut">
    <a class="d-flex">
      <Icon name="mdi:power" class="fs-1" size="20" />Log Out
    </a>
  </button>
</template>
<script lang="ts" setup>
import { useRouter } from "vue-router";

const router = useRouter();
function logOut() {
  router.push("/auth/login");
  useCookie("User").value = undefined;
}
</script>
