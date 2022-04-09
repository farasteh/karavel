<template>
  <div>
<!--    <client-only>-->
<!--      <HomeHomeRaychat></HomeHomeRaychat>-->
<!--    </client-only>-->

    <HomeSearchComponent></HomeSearchComponent>

    <HomeHomeBestCompanyCompnent
      :noticeLoading="noticeLoading"
      :companies="companies"
    > </HomeHomeBestCompanyCompnent>


    <div class="mt-2">
      <div class="container">
       <HomeHomeBanner></HomeHomeBanner>

        <ul class="nav filter-date d-flex justify-content-center">
          <li class="nav-item">
              <span @click="monthFilter" class="nav-link_list ml-lg-1 "
                    :class="{'active-list' : activeDate == 'month'}">
                  <h2 class="d-none d-md-block font-15" style="margin-bottom: auto !important;">آگهی های استخدام آژانس مسافرتی و هواپیمایی</h2>
                  <h2 class="d-block d-md-none font-15" style="margin-bottom: auto !important;">همه آگهی&zwnj;ها</h2>
              </span>
          </li>
          <li class="nav-item">
            <span @click="activeDate = 'special'" class="nav-link_list ml-lg-1 font-14"
                  :class="{'active-list' : activeDate == 'special'}">
                <h2 class="d-none d-md-block font-15" style="margin-bottom: auto !important;"> ویژه&zwnj;های استخدام آژانس مسافرتی و هواپیمایی</h2>
                <h2 class="d-block d-md-none font-15" style="margin-bottom: auto !important;"> آگهی&zwnj;های ویژه</h2>
            </span>
          </li>
        </ul>
        <div class="jobs-home-box mb-2 pb-4" style="padding-top: 5px; position: relative">
          <client-only v-if="loading">
            <homeDateBoxLoading  ></homeDateBoxLoading>
          </client-only>

          <div v-else class="row">
            <div v-if="advertisings.length == 0" class="col-12 text-center text-primary py-2">در این بازه زمانی هیج آگهی ثبت نشده.</div>
            <HomeHomeV-box-date class="col-md-6" v-else v-for="(ad , index) in advertisings"
                        :key="index"
                        :advertising="ad"
                         :class="{ 'pr-md-1' : index%2 != 0 , 'pl-md-0' : index%2 ==0}"
                        :role="memberRole">
            </HomeHomeV-box-date>
          </div>
          <nuxt-link to="/employ" class="d-flex justify-content-center align-items-center">
            <div class="plus_add" >
              +
            </div>
          </nuxt-link>
        </div>
      </div>
    </div>
    
      <HomeHomeBlog></HomeHomeBlog>

    <HomeHomeKarjoKarfarma></HomeHomeKarjoKarfarma>

  </div>
</template>
<script>

export default {
  name : 'Home',
  head() {
    return {
      title: 'استخدام آژانس مسافرتی و هواپیمایی - کاراول' ,
      meta: [
        {
          hid: 'description',
          name: 'description',
          content: 'آگهی کارمندیابی در آژانس مسافرتی و هواپیمایی ایجاد کنید, کارفرمایان عزیز، میتوانید با عضویت در کاراول، به سادگی یک آگهی کارمندیابی در آژانسهای مسافرتی ایجاد کنید. سامانه کاراول، تمام آگهی های استخدام در آژانسهای مسافرتی و هواپیمایی را در سایت، کانال تلگرام و صفحه اینستاگرام نمایش میدهد و این فرصت های شغلی در آژانسهای مسافرتی را در اختیار کارجویان قرار میدهد. کاریابی و استخدام در آژانس مسافرتی و هواپیمایی , کارمندان عزیز، شما میتوانید با عضویت در کاراول، به سادگی یک رزومه تخصصی برای استخدام در آژانس مسافرتی بسازید و خیلی ساده یک شغل در آژانسهای هواپیمایی پیدا کرده و از فرصت های شغلی در آژانسهای مسافرتی استفاده کنید. - استخدام آژانس مسافرتی و هواپیمایی'
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
    await store.dispatch('Site/Advertising/LoadAdvertisingList' , {date : 'month'})
   // await store.dispatch('noticedCompany/LoadNoticeCompany')
  },

  created() {
    // this.loading  = true
    // this.$store.dispatch('Site/Advertising/LoadAdvertisingList').then(response => { this.loading  = false})
    this.noticeLoading = true
    this.$store.dispatch('noticedCompany/LoadNoticeCompany').then(response => { this.noticeLoading  = false})
    this.monthFilter()
  } ,
  computed : {
    memberRole() {return this.$store.getters['User/User/userRole']},
    advertisings() {
       if(this.activeDate == 'special')
        return this.$store.getters['Site/Advertising/getSpecialAdvertising']
     return this.$store.state.Site.Advertising.AdvetisingList
    } ,
    companies () { return this.$store.state.noticedCompany.noticedCompanies} ,
    todayIs() {return  this.$moment().format('YYYY-MM-DD');},
    weeks() {return this.$moment().add(-7 ,'day').format('YYYY-MM-DD');},
    month() {return this.$moment().add(-1 ,'months').format('YYYY-MM-DD');},
  } ,

  methods  : {
    weekFilter()  {
      this.activeDate  = 'week'
      this.date = this.todayI
      this.date2 = this.weeks
    } ,
    monthFilter() {
      this.activeDate  = 'month'
      this.date = this.todayIs
      this.date2 = this.month
    },
  }
}
</script>

<style>
.plus_add {
  border-radius: 50%;
  position: absolute;
  bottom: -24px ;
  color: #fff;
  width: 45px;
  height: 45px;
  background: var(--var-background-color) ;
  display: flex;
  justify-content: center ;
  align-items: center ;
  font-size: 25px
}
</style>
