<template>
  <div style="margin-top: 90px">
    <div class="mt-2">
      <div class="container">
        <ul class="nav filter-date d-flex justify-content-center">
          <li class="nav-item">
              <span  class="nav-link_list ml-lg-1 active-list" style="position :relative ; padding: 14px !important ; padding-bottom: 10px">
                  <h1 class="d-none d-md-block font-15" style="margin-bottom: auto !important;">آگهی های استخدام آژانس مسافرتی و هواپیمایی</h1>
                  <h1 class="d-block d-md-none font-15" style="margin-bottom: auto !important;">همه آگهی&zwnj;ها</h1>
                  <span class="date-expired-box">منقضی شده</span>
              </span>
          </li>
        </ul>
        <div class="jobs-home-box mb-2" style="padding-top: 5px; position: relative">
          <client-only v-if="loading">
            <homeDateBoxLoading  ></homeDateBoxLoading>
          </client-only>

          <div v-else class="row">
            <div v-if="advertisings.length == 0" class="col-12 text-center text-primary py-2">در این بازه زمانی هیج آگهی ثبت نشده.</div>
            <HomeHomeV-box-date class="col-md-6" v-else v-for="(ad , index) in advertisings"
                                :key="index"
                                :advertising="ad"
                                :class="{ 'pr-md-2' : index%2 != 0 , 'pl-md-1' : index%2 ==0}"
                                :role="memberRole">
            </HomeHomeV-box-date>
          </div>
        </div>
      </div>
    </div>

  </div>
</template>
<script>

export default {
  name : 'employ',
  head() {
    return {
      title: 'استخدام های قبلی آژانس مسافرتی و هواپیمایی - کاراول' ,
      meta: [
        {
          hid: 'description',
          name: 'description',
          content: 'آگهی کارمندیابی در آژانس مسافرتی و هواپیمایی ایجاد کنید, کارفرمایان عزیز، میتوانید با عضویت در کاراول، به سادگی یک آگهی کارمندیابی در آژانسهای مسافرتی ایجاد کنید. سامانه کاراول، تمام آگهی های استخدام در آژانسهای مسافرتی و هواپیمایی را در سایت، کانال تلگرام و صفحه اینستاگرام نمایش میدهد و این فرصت های شغلی در آژانسهای مسافرتی را در اختیار کارجویان قرار میدهد. کاریابی و استخدام در آژانس مسافرتی و هواپیمایی , کارمندان عزیز، شما میتوانید با عضویت در کاراول، به سادگی یک رزومه تخصصی برای استخدام در آژانس مسافرتی بسازید و خیلی ساده یک شغل در آژانسهای هواپیمایی پیدا کرده و از فرصت های شغلی در آژانسهای مسافرتی استفاده کنید. در این صفحه لیست آگهی های منقضی شده دیده میشود. - استخدام آژانس مسافرتی و هواپیمایی'
        }
      ]
    }
  },
  data() {
    return {
      loading  : false ,
      date : '' ,
      date2 : '' ,
      activeDate :  'month' ,
      noticeLoading : false ,
    }
  },
  async fetch({store}) {
    await store.dispatch('Site/Advertising/LoadAdvertisingList' , {date : 'before'})

  },

  created() {

  } ,
  computed : {
    memberRole() {return this.$store.getters['User/User/userRole']},
    advertisings() {
      return this.$store.state.Site.Advertising.AdvetisingList
    } ,
  } ,

  methods  : {

    monthFilter() {
      this.activeDate  = 'month'
      this.date = this.todayIs
      this.date2 = this.month
    },
  }
}
</script>
<style>
.date-expired-box {
  font-size : 9px ;
  position : absolute ;
  top : 2px ;
  left:2px;
  border-radius: 3px;
  color: #fff;
  word-spacing: -1px;
  padding: 0 2px;
  font-weight: bold;
  background: #e3342f;
}
</style>

