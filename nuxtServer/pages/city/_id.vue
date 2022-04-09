<template>
  <div style="margin-top: 90px">
    <div class="mt-2">
      <div class="container">
        <ul class="nav filter-date d-flex justify-content-center">
          <li class="nav-item">
              <span  class="nav-link_list ml-lg-1 active-list" style="position :relative ; padding: 14px !important ; padding-bottom: 10px">
                  <h1 class="d-none d-md-block font-15" style="margin-bottom: auto !important;">
                    آگهی های استخدام آژانس مسافرتی و هواپیمایی
                    {{city ? city.center : ''}}
                  </h1>
                  <h1 class="d-block d-md-none font-15" style="margin-bottom: auto !important;">
                    همه آگهی&zwnj;ها
                  {{city ? city.center : ''}}
                  </h1>
              </span>
          </li>
        </ul>
        <div class="jobs-home-box mb-2" style="padding-top: 5px; position: relative">

          <div class="row">
            <div v-if="advertisings.length == 0" class="col-12 text-center text-primary py-2">در شهر {{this.city ? this.city.center : '' }} هیچ اگهی ثبت نشده</div>
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
  name : 'advertising-city',
  head() {
    return {
      title: `استخدام آژانس مسافرتی و هواپیمایی ${this.city ? this.city.center : ''} - کاراول ` ,
      meta: [
        {
          hid: 'description',
          name: 'description',
          content: ` آگهی کارمندیابی در آژانس مسافرتی و هواپیمایی${this.city ? this.city.center : ''}  ایجاد کنید, کارفرمایان عزیز، میتوانید با عضویت در کاراول، به سادگی یک آگهی کارمندیابی در آژانسهای مسافرتی ${this.city ? this.city.center : ''} ایجاد کنید. سامانه کاراول، تمام آگهی های استخدام در آژانسهای مسافرتی و هواپیمایی ${this.city ? this.city.center : ''} را در سایت، کانال تلگرام و صفحه اینستاگرام نمایش میدهد و این فرصت های شغلی در آژانسهای مسافرتی ${this.city ? this.city.center : ''} را در اختیار کارجویان قرار میدهد. کاریابی و استخدام در آژانس مسافرتی و هواپیمایی ${this.city ? this.city.center : ''} , کارمندان عزیز، شما میتوانید با عضویت در کاراول، به سادگی یک رزومه تخصصی برای استخدام در آژانس مسافرتی ${this.city ? this.city.center : ''} بسازید و خیلی ساده یک شغل در آژانسهای هواپیمایی پیدا کرده و از فرصت های شغلی در آژانسهای مسافرتی  ${this.city ? this.city.center : ''} استفاده کنید. - استخدام آژانس مسافرتی و هواپیمایی `
        }
      ]
    }
  },
  async fetch({store , route}) {
    await store.dispatch('Site/Advertising/loadAdvertisingByCity' , {id : route.params.id})
    await store.dispatch('Map/Province/LoadProvinces')
  },
  computed : {
    memberRole() {return this.$store.getters['User/User/userRole']},
    advertisings() {
      return this.$store.state.Site.Advertising.AdvetisingList
    } ,
    city () {
      return this.$store.getters['Map/Province/getProvinceById'](this.$route.params.id)
    }
  } ,

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

