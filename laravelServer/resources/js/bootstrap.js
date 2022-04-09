window._ = require('lodash');


try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {}

import axios from 'axios';
import Vue from 'vue';
import iView from 'iview';
import VueRouter from 'vue-router';
import Notifications from 'vue-notification';
import Vuelidate from 'vuelidate';
import VueSimpleAlert from "vue-simple-alert";
import VueSimpleScrollbar from 'vue-simple-scrollbar'
import CKEditor from '@ckeditor/ckeditor5-vue';
// import * as VueGoogleMaps from 'vue2-google-maps'
import VueFormWizard from 'vue-form-wizard'
// import ImageUploader from 'vue-image-upload-resize'
import VueDraggable from 'vue-draggable'
import 'vue-form-wizard/dist/vue-form-wizard.min.css'
import vueAwesomeCountdown from 'vue-awesome-countdown'
import VueMeta from 'vue-meta'
import moment from 'moment'

Vue.use(require('vue-moment'));
Vue.prototype.moment = moment
window.axios = axios;
window.Vue = Vue;
Vue.use(VueRouter);
Vue.use(moment);
Vue.use(iView);
Vue.use(Notifications);
Vue.use(Vuelidate);
Vue.use(VueSimpleAlert);
Vue.use(VueSimpleScrollbar);
Vue.use(CKEditor);
Vue.use(VueFormWizard);
// Vue.use(ImageUploader);
Vue.use(VueDraggable);
Vue.use(VueMeta);
Vue.use(vueAwesomeCountdown, 'vac') // Component name, `countdown` and `vac` by default
// Vue.use(VueGoogleMaps, {
//     load: {
//         key: 'AIzaSyAbXmAwxwfI-8JwHzr5KoB9ag0yT7GWHMk',
//         // libraries: 'places',
//     },
// })
axios.interceptors.request.use(function(config) {
    const accessToken = localStorage.getItem('token');
    if (accessToken) {
        config.headers.Authorization = "Bearer " + accessToken;
    }
    return config;
});

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
