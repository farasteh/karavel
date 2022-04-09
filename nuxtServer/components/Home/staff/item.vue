<template>
  <div class="container pt-md-4 p-0 px-md-3 res-dist">
    <div class="row m-auto pr-0 pl-0 py-3">
      <div class="col-12 col-lg-9">
        <HomePdfTheme2 :staff="staff" :Member="Member" :memberRole="memberRole"/>
        <HomeStaffSimilarStaffs :similarStaffList="similarStaffList"
                                :User="Member" :role="memberRole"/>
      </div>
      <div class="col-12 col-lg-3 p-0 box-pad">
        <HomeStaffSendRequestBox :Member="Member" :memberRole="memberRole" :staff="staff"/>
      </div>
      <div class="col-12 res-similar">
        <div class="mt-3 mb-2" v-if="similarStaffList.length != 0">
          <h2 class="font-14">
            کارمندان مشابه استخدام آژانس هواپیمایی و مسافرتی
          </h2>
        </div>
        <hr v-if="similarStaffList.length != 0" class="hr-title">
        <div class="row" >
          <HomeStaffSimilarStaffBox v-for="(staff , index) in  similarStaffList"
                                    :key="index" :staff="staff" :User="Member"
                                    :index="index" :role="memberRole"></HomeStaffSimilarStaffBox>
        </div>
      </div>
      <div class="mobile-send-resume" >
        <button @click="modalMobile = true"
                class="w-100 d-flex justify-content-center align-items-center text-light bottom-section-right font-12">
          ارسال پیشنهاد همکاری به ایشان
        </button>
      </div>
    </div>
    <Modal v-model="modalMobile" footer-hide>
      <client-only>
        <HomeStaffSendRequestBox :Member="Member" :memberRole="memberRole" :staff="staff"/>
      </client-only>

    </Modal>
  </div>
</template>

<script>
  export default {
    name : 'staff-item',
    props : ['similarStaffList' , 'staff'] ,
    data() {
      return {
        modalMobile: false,
      }
    },
    computed: {
      memberRole() {return this.$store.getters['User/User/userRole']},
      Member() {return this.$store.state.User.User.User},
    },
    methods : {

    }

  }
</script>

<style>
  .res-similar {
    display: none;
  }
  .mobile-send-resume {
    display: none !important;

  }
  @media screen and (max-width: 990px) {
    .similar-res {
      display: none;
    }
    .res-similar {
      display: block;
    }
    .box-pad {
      display: none;
    }
    .mobile-send-resume {
      position: fixed !important;
      display: flex !important;
      right: 5px;
      bottom: 30px;
      height: 50px;
      width: 97%;
      background: #1e88e5;
      align-items: center;
      z-index: 10000;
      border-radius: 3px;
    }
    .ivu-modal-body {
      padding: 0px !important;
    }
  }

</style>
