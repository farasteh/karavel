<template>
  <div class="similar-res mb-3">
    <div class="mt-3 mb-2" v-if="Advertisings.length != 0">
      <h2 class="font-16">
     مشاغل مشابه استخدام آژانس مسافرتی و هواپیمایی
      </h2>
      <hr class="hr-style" >
    </div>
    <div class="d-flex align-content-between"  v-if="loading">
      <div  class="box-list-jobs karavel-box p-3 w-50 ml-2" style="padding: 15px !important;">
        <Vcl-facebook rtl ></Vcl-facebook>
      </div>
      <div class="box-list-jobs karavel-box p-3 w-50 mr-2" style="padding: 15px !important;">
        <Vcl-facebook rtl ></Vcl-facebook>
      </div>
    </div>
    <div class="row" v-else>
      <similarAdvertisingBox   v-for="(List , index) in  Advertisings "
                               :key="index" :List="List" :User="User" :index="index"
                               :role="role"></similarAdvertisingBox>
    </div>
  </div>
</template>
<script>
import { VclFacebook } from 'vue-content-loading';
export default {
  name:"similarAdvertisings",
  props: ['Advertisings' , 'loading' , 'User' , 'role'],
  components: {
    VclFacebook
  },
  data() {
    return {

    }
  },
  methods : {

  } ,
  computed :  {

  },
}
</script>
<style>

</style>
