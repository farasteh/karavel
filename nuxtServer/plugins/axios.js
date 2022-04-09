export default function ({ $axios, redirect , app }) {
  $axios.onRequest(config => {
    const accessToken = app.$cookies.get('token');
    if (accessToken) {
      //$axios.setHeader('Authorization', "Bearer " + accessToken)
      config.headers.Authorization = "Bearer " + accessToken;
    }
    return config;
  })
}


//
//
//
// import Vue from 'vue';
// import axios from 'axios';
//
// axios.interceptors.request.use(function(config) {
//   const accessToken = localStorage.getItem('token');
//   if (accessToken) {
//     config.headers.Authorization = "Bearer " + accessToken;
//   }
//   return config;
// });
//
// //window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
//
//
// Vue.use(axios);
