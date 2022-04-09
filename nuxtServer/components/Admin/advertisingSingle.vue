<template>
  <div class="my-2 p-2 karavel-box flex-row">
    <div class="col-8">
      <p>#استخدام آژانس مسافرتی و هواپیمایی</p>
      <p>کد {{ code }}</p>
      <p><span>عنوان آگهی:</span>{{advertising.title}}</p>
      <p> شغل موردنیاز  :   {{advertising.job.title}} , {{advertising.category.title}}</p>
      <p>
        محل :
        <span>
                     {{advertising.province.title}} ,
                </span>
        <span>
                    {{advertising.city.title}}
               </span>
      </p>
      <p>
        <nuxt-link :to="`/jobs/${advertising.id}`">
          www.karavel.ir/jobs/{{advertising.id}}
        </nuxt-link>
      </p>
    </div>
    <div class="col-4 d-flex justify-content-center align-items-center">
      <Button v-if="!advertising.telegram" type="primary" :loading="loading" @click="addTelegram">افزودن به کانال</Button>
      <p class="text-dark" v-else>
        این آگهی به تلگرام افزوده شده
        <span class="tick-icon-color">
            <Icon type="md-checkmark"  class="sent-title-icon" />
        </span>
      </p>
    </div>
  </div>
</template>

<script>
export  default {
  name : "advertisingSingle" ,
  props : ['advertising' ] ,
  data() {
    return {
      loading : false
    }
  },
  computed : {
    code () {
      return 'KM' + ( this.advertising.id * 2 + 3 )
    }
  },
  methods : {
    addTelegram() {
      this.loading  = true
      this.$store.dispatch('Admin/telegram/advertising/AddAdvertisingTelegram' , { id : this.advertising.id})
        .then(response => {
          if (response.status == 202)
            this.$store.dispatch('globalFunctions/ErrorNotify2' , response.data.data.message)
          else
            this.$store.dispatch('globalFunctions/SuccessNotify' , response.data.data.message)
          this.loading = false
        })
        .catch(error =>    this.$store.dispatch('globalFunctions/ErrorNotify2' ,'با خطا مواجه شدید لطفا کمی بعد تلاش کنید') )
        .finally(() =>  this.loading = false)
    }
  }

}
</script>
