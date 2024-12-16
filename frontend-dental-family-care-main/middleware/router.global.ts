export default defineNuxtRouteMiddleware((to, from) => {

  const path = ['/auth/register', '/auth/login'];


  if (path.includes(to.path) || useCookie('user').value) {

  }
  else {

    navigateTo('/auth/login')
  }

})
