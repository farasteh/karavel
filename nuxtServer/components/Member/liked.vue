<template>
  <div>
    <div class="col-6">
      <h2 class="panel-title font-15">آگهی های نشان شده</h2>
    </div>
    <div class="col-12" v-if="Loading">
      <lodingSkillLoading class="box-A karavel-box"></lodingSkillLoading>
    </div>
    <div v-else>
      <div class="box-list-jobs-info" v-if="AdvetisingList.length == 0">
        <p class="p-3 text-center">
          شما فرصت‌‌های شغلی مناسب خود را نشان‌نکرده‌اید با نشان کردن فرصت‌های شغلی می‌توانید آن‌ها را از طریق این صفحه بررسی‌کرده و سپس رزومه‌ی خود را برای فرصت‌های ارائه‌شده ارسال نمایید  .
        </p>
      </div>
      <MemberLikedBox v-else v-for="(List,index) in AdvetisingList" :key="index"
           :List="List" :index="index" :User="User"></MemberLikedBox>
    </div>


  </div>
</template>
<script>



export default {
  name : 'liked' ,

  data(){
    return{
      Loading : false
    }
  },
  computed:{
    User() { return this.$store.state.User.User.User; },
    AdvetisingList() {return this.$store.state.Member.favorite.favorit.likedAds} ,
  },
  created(){

  },
  mounted(){
    this.Loading = true
    this.$store.dispatch('Member/favorite/favorit/loadLikedAds').then(res => { this.Loading = false});
  },
}
</script>
<style>

.ivu-form .ivu-form-item-label{
  color: #949494 !important;
}
.ivu-select-single .ivu-select-selection .ivu-select-placeholder, .ivu-select-single .ivu-select-selection .ivu-select-selected-value{
  padding-right: 0 !important;
}
.ivu-select-input{
  padding: 0 5px 0 8px !important;
}
.box-A{
  padding: 15px;
  margin-top: 16px!important;
}
</style>
