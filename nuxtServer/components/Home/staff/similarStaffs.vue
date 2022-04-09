<template>
  <div class="mb-3 similar-res">
    <div class="mt-4 mb-2" v-if="similarStaffList.length != 0">
      <h2 class="font-16">
        کارمندان مشابه استخدام آژانس هواپیمایی و مسافرتی
      </h2>
      <hr class="hr-style" >
    </div>
    <div class="row">
      <HomeStaffSimilarStaffBox   v-for="(staff , index) in  similarStaffList "
                               :key="index" :staff="staff" :User="User" :index="index"
                               :role="role"></HomeStaffSimilarStaffBox>
    </div>
  </div>
</template>
<script>
export default {
  name:"similar-staff-list",
  props: ['similarStaffList' , 'User' , 'role'],
}
</script>
<style scoped>
  .hr-style {
    position: relative;
    width: 52%;
    right: 46%;
    color: #000;
    bottom: 20px;
  }

</style>
