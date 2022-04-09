<template>
  <div>
    <div class="row">
      <div class=" col-12 mb-2">
        <h2 style="font-weight: 600;font-size: 22px;"> نمایش در تلگرام </h2>
      </div>
      <div class="bottom-message"></div>
      <div class="col-12">
        <lodingAdminTelegramLoading v-if="loaidng"/>
        <div v-else v-for="( data, index) in mergedData" :key="'A'+ index">
          <AdminAdvertisingSingle  v-if="data.type == 'advertising'" :advertising="data" ></AdminAdvertisingSingle>
          <AdminSingleUser v-else  :user="data"
                        class="my-2 p-2 karavel-box flex-row" ></AdminSingleUser>
        </div>

      </div>
    </div>
    <div>
    </div>
  </div>
</template>
<script>

export default {
  name : 'TelegramUser',
  data(){
    return {
      loaidng : false ,
    };
  },
  created() {
    this.loaidng = true
    this.$store.dispatch('Admin/telegram/advertising/LoadTelegramAdvertising').then(res => {this.loaidng = false})
  },
  computed:{
    mergedData(){ return  this.$store.getters['Admin/telegram/advertising/telegramUserAds']} ,
  },
}
</script>
<style>

</style>
