export default {
  // Global page headers: https://go.nuxtjs.dev/config-head
  head: {
    title: 'استخدام آژانس مسافرتی و هواپیمایی - کاراول',
    htmlAttrs: {
      lang: 'en'
    },
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      { hid: 'description', name: 'description', content: '' },
      { hid: 'google-site-verification', name: 'google-site-verification', content: 'G0HOyo-ldT9EI90yTCG3ZOZltFSnhue5jwev4Cemlmg' },
    ],
    link: [
      { rel: 'icon', type: 'image/x-icon', href: '/karavel-ico.jpg' } ,
      { rel: 'stylesheet', href: 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css' },
    ] ,

    script: [
      { hid : 'script',  src: 'https://code.jquery.com/jquery-3.5.1.slim.min.js', defer: true },
      { hid : 'script',  src:'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js', defer: true },
      { hid : 'script',  src: 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js', defer: true } ,
      { hid : 'script',  src: 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js', defer: true } ,
    ]
  },

  // Global CSS: https://go.nuxtjs.dev/config-css
  css: [
    '~/assets/css/docs.min.css',
    '~/assets/css/bootstrap.rtl.min.css',
    'iview/dist/styles/iview.css',
    '~/assets/sass/app.scss',
    '~/assets/css/app.css',
    '~/assets/css/fontawesome.min.css'

  ],

  // Plugins to run before rendering page: https://go.nuxtjs.dev/config-plugins
  plugins: [
     { src: '~/plugins/ckeditor.client.js', ssr: false } ,
    { src: '~/plugins/iview.js', ssr: true },
    { src: '~/plugins/nprogress.js', ssr: false },
    { src: '~/plugins/FileUpload.js', ssr: true },
     { src: '~/plugins/countdown.js', ssr: true } ,
      { src: '~/plugins/draggable.js', ssr: false },
     { src: '~/plugins/alert.js', ssr: false } ,
     { src: '~/plugins/scroll.client.js'} ,
     { src: '~/plugins/timePicker.js', ssr: true } ,
    { src: '~/plugins/vuelidate.js', ssr: true } ,
    { src: '~/plugins/axios.js', ssr: true } ,
     { src: '~/plugins/image-crup.js' , ssr : false} ,
    { src: '~/plugins/select.js' , ssr : false} ,


  ],

  // Auto import components: https://go.nuxtjs.dev/config-components
  components: true,

  // Modules for dev and build (recommended): https://go.nuxtjs.dev/config-modules
  buildModules: [
  ],

  // Modules: https://go.nuxtjs.dev/config-modules
  modules: [
    '@nuxtjs/axios',
    'nuxt-vue-select',
    '@nuxtjs/moment',
    'vue-swatches/nuxt',
    ['vue-scrollto/nuxt', { duration: 300 }] ,
    ["vue-toastification/nuxt", {
      position: 'bottom-left',
      duration  : 3000 ,
      timeout: 5000,
      closeOnClick: true,
      pauseOnFocusLoss: true,
      pauseOnHover: true,
      draggable: true,
      draggablePercent: 0.6,
      showCloseButtonOnHover: false,
      hideProgressBar: true,
      closeButton: "button",
      icon: false,
      rtl: true
    }],
    ['cookie-universal-nuxt', { alias: 'cookies' } , { parseJSON: false }],

  ],
  axios: {
    baseURL: "https://api.karavel.ir",
  },

  // Build Configuration: https://go.nuxtjs.dev/config-build
  build: {
    transpile: ['vue-image-crop-upload' ] ,
    vendor: [
      'iview' ,'vue-image-crop-upload'
    ]
  }
}
