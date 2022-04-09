<template>
  <div>
    <HomeStaffSearchBox/>
    <div>
      <div class="container row px-0 py-3 m-auto">

        <div class="col-12">
          <advertisingBoxLoading  v-if="staffLoading"></advertisingBoxLoading>
          <div v-else>
            <div class="box-list-jobs-info mb-4 mt-3" v-if="staffList.length == 0 ">
              <p class="p-3 text-center ">
               {{message}}
              </p>
            </div>
            <div v-else>
              <div class="row mt-3">
                <div class="col-md-12 mb-1">
                  <div class="karavel-box d-flex flex-row justify-content-center align-items-center" style="height: 50px">
                    <h2 class="font-14 mb-0 text-center">{{staffList.length}} کارمند در آژانس هواپیمایی و مسافرتی یافت شد .</h2>
                  </div>
                </div>
              </div>
              <HomeStaffSingle  v-for="(staff,index) in  staffList"
                               :key="index"
                               :staff="staff"
                               :index="index"
                                :User="User"
                                :memberRole="memberRole"
              ></HomeStaffSingle>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</template>
<script>

export default {
  name: 'staff-list' ,
  props : [ 'staffLoading'] ,
  data() {
    return {
      LoadingBox : false ,
      message : 'برای پیدا کردن کارمند مورد نظر خود لطفا جستجو نمایید.'
    }
  },
  computed:{
    staffList() {return this.$store.state.Site.Staff.StaffList},
    User(){ return this.$store.state.User.User.User;},
    memberRole() {return this.$store.getters['User/User/userRole']},
    form() {return this.$store.state.Site.Staff.form}
  },
  watch:{
    staffList() {
      if(this.form.Job != '' && this.staffList.length == 0 )
        this.message = 'هیچ کارمندی درنتایج سرچ شما یافت نشد. لطفا مورد دیگری سرچ کنید'
    }
  }
}
</script>

<style>
.ivu-collapse > .ivu-collapse-item > .ivu-collapse-header > i {
  transition: transform .2s ease-in-out;
  margin-right: 14px;
  left: 0;
  position: absolute;
  left: 10px;
  top: 12px;
}
.ivu-collapse > .ivu-collapse-item > .ivu-collapse-header > i {
  transition: transform .2s ease-in-out;
  margin-right: 14px;
  left: 0;
  position: absolute;
  left: 10px;
  top: 12px;
}
.ivu-collapse > .ivu-collapse-item > .ivu-collapse-header > i {
  transition: transform .2s ease-in-out;
  margin-right: 14px;
}
.ivu-collapse > .ivu-collapse-item.ivu-collapse-item-active > .ivu-collapse-header > i {
  transform: rotate(90deg);
  font-size: 15px !important;
}
</style>
