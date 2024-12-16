<template>
  <head>
    <title>{{ title }}</title>
  </head>
  <div class="login-form">
    <div class="login-img">
      <img
        src="/assets/img/logo.png"
        alt="Logo"
        style="width: 250px; margin-left: 16px" />
    </div>
    <h3 class="text-center">
      <strong>{{ title }}</strong>
    </h3>
    <p class="text-center mb-3">{{ subTitle }}</p>
    <div class="form-group">
      <input
        type="text"
        class="form-control"
        placeholder="Username"
        required="required" />
    </div>
    <div class="form-group">
      <input
        type="password"
        class="form-control"
        placeholder="Password"
        required="required" />
    </div>
    <div class="form-group">
      <button
        type="submit"
        style="background-color: #522d8c; color: #fff"
        class="btn btn-block">
        Login
      </button>
    </div>
    <div class="clearfix">
      <label class="float-left form-check-label"
        ><input type="checkbox" /> Remember me</label
      >
      <a href="#" class="forgot-link float-right">Forgot Password?</a>
    </div>
  </div>
</template>

<script>
export default {
  created() {},
  data() {
    return {
      title: "Login",
      subTitle: "Sistem Aplikasi Klinik",
    };
  },
  methods: {},
  computed: {},
};
definePageMeta({
  layout: "custom",
});
</script>
<style>
body {
  background-color: #522d8c;
}
.login-form {
  width: 350px;
  margin: 100px auto;
  padding: 30px;
  background: #fff;
  border: 1px solid #dee2e6;
  border-radius: 10px;
  filter: drop-shadow(1px 1px 6px #fff);
}

.login-form form {
  margin-bottom: 15px;
}

.login-form .form-control {
  border-radius: 20px;
  background-color: #522d8c;
  color: #fff;
}
.login-form .form-control::placeholder {
  color: #fff;
}
.login-form .btn {
  border-radius: 20px;
}

.login-form .forgot-link {
  text-decoration: none;
  float: right;
  color: #6c757d;
}

.login-form .forgot-link:hover {
  color: #343a40;
}
</style>
