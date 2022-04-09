require('./bootstrap');

window.Vue = require('vue');
import router from './routes';
import store from './stores/store.js';
import NProgress from 'nprogress';
import 'iview/dist/styles/iview.css'
import 'nprogress/nprogress.css';
import '@fortawesome/fontawesome-free/js/all.js';
import Loadingbutton from './components/Loading/LoadingButton.vue';


import FileUpload from 'v-file-upload'

Vue.use(FileUpload)


Vue.component('Loadingbutton', Loadingbutton);

axios.interceptors.request.use(function(config) {
    NProgress.start();
    return config
});

axios.interceptors.response.use(function(response) {
    NProgress.done();
    return response
}, error => {
    NProgress.done();
    return Promise.reject(error);
});

router.beforeResolve((to, from, next) => {
    NProgress.start();
    next()
});

router.afterEach((to, from) => {
    NProgress.done();
});


Vue.mixin({
    methods: {
        generatedToken() {
            return localStorage.getItem('token');
        },

        Authorized() {
            if (this.generatedToken() != null) {
                axios.get('api/v1/user', { headers: { Authorization: `Bearer ${this.generatedToken()}`, scope: 'kar' } })
                    .then(response => {
                        this.userProfile = response.data;
                    })
                    .catch(() => {
                        return false;
                    })
            } else {
                if (this.$route.name != 'Login') this.$router.push({ name: 'Login' }).catch(() => {

                });
            }
        },
    }
});

Vue.component('app-header', require('./components/includes/VueHeader.vue').default);
Vue.component('app-header-admin', require('./components/includes/Admin/VueHeader.vue').default);
Vue.component('notifications-app', require('./components/includes/NotificationsApp.vue').default);
// Vue.component('app-footer', require('./components/ExampleComponent.vue'));

// Vue.component('VueHeader', Header);


const app = new Vue({
    el: '#app',
    router,
    store,
    created() {}
});
