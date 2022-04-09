<template>
  <div>
    <div class="col-8">
      <p>#رزومه کارجو</p>
      <p>کد {{code}}</p>
      <p>
        <span v-if="user.gender == 2"> خانم / </span>
        <span v-if="user.gender == 3"> آقا / </span>
        <span v-if="user.birhdate">{{user.birhdate}} ساله</span>
      </p>
      <p>
        <span v-if="user.job || user.category"> تخصص من :  <span v-if="user.job">{{user.job.title}}</span> , <span v-if="user.category">{{user.category.title}}</span> </span>
      </p>
      <p>
        <span v-if="user.province || user.city">  محل :  <span v-if="user.province">{{user.province.title}}</span> , <span v-if="user.city">{{user.city.title}}</span> </span>
      </p>
      <p> نمره کاراول من: <span>{{ user.rank }}%</span> </p>
      <p><nuxt-link to="`/resume/pdf/${user.id}`" >www.karavel.ir/resume/pdf/{{user.id}}</nuxt-link></p>
    </div>
    <div class="col-4 d-flex justify-content-center align-items-center">
      <Button v-if="!user.telegram" type="primary" @click="AddToChannel()" :loading="loading">افزودن به کانال</Button>
      <p class="text-dark" v-else>
        این رزومه به تلگرام افزوده شده
        <span class="tick-icon-color">
            <Icon type="md-checkmark"  class="sent-title-icon" />
        </span>
      </p>
    </div>
  </div>
</template>
<script>

export default {
  name : 'singleUser',
  props: ['user'] ,
  data(){
    return {
      loading : false ,
    };
  },
  computed:{
    code () {
      return 'KS' + ( this.user.id * 2 + 3 )
    }
  },
  methods:{
    AddToChannel() {
      this.loading = true
      this.$store.dispatch('Admin/telegram/advertising/AddUserTelegram' , {id : this.user.id})
        .then(response => {
          if (response.status == 202)
            this.$store.dispatch('globalFunctions/ErrorNotify2' , response.data.data.message)
          else
            this.$store.dispatch('globalFunctions/SuccessNotify' , response.data.data.message)
          this.loading = false
        })
        .catch(error =>   this.$store.dispatch('globalFunctions/ErrorNotify2' ,'با خطا مواجه شدید لطفا کمی بعد تلاش کنید')  )
        .finally(() =>  this.loading = false)
    }
  }
}
</script>
<style>

</style>
