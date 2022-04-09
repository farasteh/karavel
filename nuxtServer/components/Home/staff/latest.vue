<template>
  <div>
    <HomeStaffSearchBox/>
    <div class="mt-2">
      <div class="container">
        <ul class="nav filter-date d-flex justify-content-center">
          <li class="nav-item">
              <span class="nav-link_list ml-lg-1 active-list">
                  <h2 class="d-none d-md-block font-15" style="margin-bottom: auto !important;">کارمندان استخدام آژانس مسافرتی و هواپیمایی</h2>
                  <h2 class="d-block d-md-none font-15" style="margin-bottom: auto !important;">همه کارمندان&zwnj;ها</h2>
              </span>
          </li>
        </ul>
        <div class="jobs-home-box mb-2 pb-4" style="padding-top: 5px; position: relative">
          <client-only v-if="loading">
            <homeDateBoxLoading></homeDateBoxLoading>
          </client-only>

          <div v-else class="row">
            <div v-if="staffList.length == 0" class="col-12 text-center text-primary py-2">در این بازه زمانی هیج آگهی ثبت نشده.</div>
            <HomeStaffBox class="col-md-6" v-else v-for="(staff , index) in staffList"
                                :key="index"
                                :staff="staff"
                                :class="{ 'pr-md-1' : index%2 != 0 , 'pl-md-0' : index%2 ==0}"
                                :role="memberRole">
            </HomeStaffBox>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    name : 'latest-staff' ,
    props : ['loading'],
    computed:{
      staffList() {return this.$store.state.Site.Staff.StaffList},
      User(){ return this.$store.state.User.User.User;},
      memberRole() {return this.$store.getters['User/User/userRole']},
      // form() {return this.$store.state.Site.Staff.form}
    },
  }
</script>
