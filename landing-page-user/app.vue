<template>
  <div>
    <navBar />
    <!-- Gunakan <NuxtPage /> untuk merender halaman -->
    <NuxtPage />
  </div>
</template>
<script>

import navBar from'../components/navbar/index.vue';

export default {
components: {
    navBar
}
}

</script>  