
import Vue from 'vue'
import NProgress from 'nprogress'
import 'nprogress/nprogress.css'


Vue.use(NProgress)


export default ({ app }) => {
  app.router.beforeResolve((to, from, next) => {
    NProgress.start();
    next()
  });

  app.router.afterEach((to, from) => {
    NProgress.done();
  });

  app.router.beforeEach( ( to , from , next ) => {
    if (!to.meta.middleware) {
      return next()
    }
  })

  app.$axios.interceptors.request.use(function(config) {
    NProgress.start();
    return config
  });

  app.$axios.interceptors.response.use(function(response) {
    NProgress.done();
    return response
  }, error => {
    NProgress.done();
    return Promise.reject(error);
  });
}
