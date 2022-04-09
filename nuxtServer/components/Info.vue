<template>
  <div>
    <div class="box-show-page box-show-page-special mb-2">
      <div class="special" v-if="Advertising.special && !contentLoading">
        <span class="spe-text">ویژه</span>
      </div>
      <div class="special" v-else-if="Advertising.create_time < month && !contentLoading">
        <span class="spe-text">منقضی</span>
      </div>
      <codeLoading v-if="contentLoading"></codeLoading>
      <div v-else class="row">
        <div class="col-9 col-md-10 pl-md-0" :class="{paddingRight40 : Advertising.special || Advertising.create_time < month}">
          <h1 class="title-advertising-show-page ml-1 d-inline" >
            {{ Advertising.title }}
          </h1>
          <br class="d-md-none"/>
          <span class="font-13 d-inline" style="word-spacing: -3px;">
            (
            {{Advertising.created_at}}
            -
            کد
            {{Code}}
            )
        </span>
        </div>

        <div class="col-3 col-md-2 d-flex justify-content-end">
          <client-only>
            <share></share>
          </client-only>

          <Icon v-if="!like"  @click="liked" class="box-icon-j icon-box" type="ios-bookmark-outline" />
          <Icon v-if="like"  @click="disliked" class="box-icon-j icon-box" type="ios-bookmark" />
        </div>
<!--        <div v-if="!LoggedIN" class="col-12"  style="font-size: 13px ; color: rgba(119, 119, 119, 0.84);">-->
<!--          <span>کارفرما: </span>-->
<!--          <span class="disappeared-company">-->
<!--                      آگهی استخدام در-->
<!--                    <span >{{Advertising.Company.name_fa}}</span>-->
<!--                </span>-->
<!--          <a title="برای مشاهده کارفرما وارد شوید">-->
<!--            <Icon @click="Gologin" type="ios-lock" class="lock-company" />-->
<!--          </a>-->
<!--        </div>-->
        <div  class="col-12"  style="font-size: 13px ; color: rgba(119, 119, 119, 0.84); cursor: pointer">
            <span @click="openAd">
                آگهی استخدام در
                <span>{{Advertising.Company.name_fa}}</span>
            </span>
        </div>
      </div>
      <div v-if="!contentLoading">
        <div class="row mb-3">
          <div class="col-md-4 col-6 mt-3" v-if="Advertising.job">
            <div>
              <span class="font-weight-bold">دسته‌بندی شغلی:</span>
            </div>
            <div class="mt-2">
                <span class="box-activity-advetising box-activity-advetising-box-shadow box-activity-advetising-color box-activity-advetising-background">
                    {{ Advertising.job.title }}
                </span>
            </div>
          </div>
          <div class="col-md-4 col-6 mt-3" v-if="Advertising.category">
            <div>
              <span class="font-weight-bold"> زیرمجموعه شغلی:</span>
            </div>
            <div class="mt-2">
                <span class="box-activity-advetising box-activity-advetising-box-shadow box-activity-advetising-color box-activity-advetising-background">
                    {{ Advertising.category.title }}
                </span>
            </div>
          </div>
          <div class="col-md-12 mt-3" v-if="Advertising.work_category.length != 0">
            <div>
              <span class="font-weight-bold"> تخصص نهایی: </span>
            </div>
            <div class="mt-2">
                <span v-for="wjob in Advertising.work_category" :key="wjob.id"
                      class="box-activity-advetising box-activity-advetising-box-shadow box-activity-advetising-color box-activity-advetising-background mb-1">
                    {{ wjob.title }}
                </span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="box-show-page box-show-page-special mb-2">

      <codeLoading v-if="contentLoading"></codeLoading>
      <div v-else>
        <div class="row mb-3">
          <div class="col-md-4 col-6 mt-3" v-if="Advertising.province || Advertising.city">
            <div>
              <span class="font-weight-bold">موقعیت مکانی : </span>
            </div>
            <div class="mt-2">
                        <span class="box-activity-advetising box-activity-advetising-box-shadow box-activity-advetising-color box-activity-advetising-background">
                            {{ Advertising.province.title }} ، {{ Advertising.city.title }}
                        </span>
            </div>
          </div>
          <div class="col-md-4 col-6 mt-3" v-if="Advertising.location">
            <div>
              <span class="font-weight-bold">محدوده محل کار: </span>
            </div>
            <div class="mt-2">
                        <span class="box-activity-advetising  box-activity-advetising-box-shadow box-activity-advetising-color box-activity-advetising-background">
                            {{Advertising.location}}
                        </span>
            </div>
          </div>
          <div class="col-md-4 col-6 mt-3" v-if="Advertising.age">
            <div>
              <span class="font-weight-bold"> محدوده سنی: </span>
            </div>
            <div class="mt-2">
                        <span class="box-activity-advetising  box-activity-advetising-box-shadow box-activity-advetising-color box-activity-advetising-background">
                            {{ Advertising.age.title }}
                        </span>
            </div>
          </div>
          <div class="col-md-4 col-6 mt-3" v-if="Advertising.CooperationType">
            <div>
              <span class="font-weight-bold"> نوع همکاری:</span>
            </div>
            <div class="mt-3">
                        <span class="box-activity-advetising box-activity-advetising-box-shadow box-activity-advetising-color box-activity-advetising-background">
                            {{Advertising.CooperationType.title }}
                        </span>
            </div>
          </div>
          <div class="col-md-4 col-6 mt-3"  v-if="Advertising.TimeUp ||  Advertising.TimeDown">
            <div>
              <span class="font-weight-bold">ساعت کار:</span>
            </div>
            <div class="mt-2">
                        <span class="box-activity-advetising box-activity-advetising-box-shadow box-activity-advetising-color box-activity-advetising-background">
                            {{ Advertising.TimeDown }}
                            -
                            {{ Advertising.TimeUp }}
                        </span>
            </div>
          </div>
          <div class="col-md-4 col-6 mt-3" v-if="Advertising.HistoryJop">
            <div>
              <span class="font-weight-bold">سابقه کاری:</span>
            </div>
            <div class="mt-2">
                        <span class="box-activity-advetising box-activity-advetising-box-shadow box-activity-advetising-color box-activity-advetising-background">
                            {{ Advertising.HistoryJop.title }}
                        </span>
            </div>
          </div>
          <div class="col-md-4 col-6 mt-3" v-if="Advertising.money">
            <div>
              <span class="font-weight-bold"> حقوق:</span>
            </div>
            <div class="mt-2">
                        <span class="box-activity-advetising box-activity-advetising-box-shadow box-activity-advetising-color box-activity-advetising-background">
                            {{Advertising.money.title}}
                        </span>
            </div>
          </div>
          <div class="col-md-4 col-6 mt-3" v-if="Advertising.Gender">
            <div>
              <span class="font-weight-bold">جنسیت:</span>
            </div>
            <div class="mt-2">
                        <span class="box-activity-advetising box-activity-advetising-box-shadow box-activity-advetising-color box-activity-advetising-background">
                            {{ Advertising.Gender.title }}
                        </span>
            </div>
          </div>
          <div class="col-md-4 col-6 mt-3" v-if="Advertising.document">
            <div>
              <span class="font-weight-bold">مدرک تحصیلی:</span>
            </div>
            <div class="mt-2">
                        <span class="box-activity-advetising box-activity-advetising-box-shadow box-activity-advetising-color box-activity-advetising-background ">
                            {{ Advertising.document.title }}
                        </span>
            </div>
          </div>
          <div class="col-md-4 col-6 mt-3" v-if="Advertising.FildStudy">
            <div>
              <span class="font-weight-bold">رشته تحصیلی:</span>
            </div>
            <div class="mt-2">
                        <span class="box-activity-advetising box-activity-advetising-box-shadow box-activity-advetising-color box-activity-advetising-background">
                            {{ Advertising.FildStudy }}
                        </span>
            </div>
          </div>
          <div class="col-md-4 col-6 mt-3" v-if="Advertising.Soldier">
            <div>
              <span class="font-weight-bold">وضعیت سربازی: </span>
            </div>
            <div class="mt-2">
                        <span class="box-activity-advetising  box-activity-advetising-box-shadow box-activity-advetising-color box-activity-advetising-background">
                            {{ Advertising.Soldier.title }}
                        </span>
            </div>
          </div>
          <div class="col-md-12 mt-3" v-if="Advertising.language && Advertising.language.length != 0">
            <div>
              <span class="font-weight-bold"> زبان خارجی:</span>
            </div>
            <div class="mt-2">
                        <span  v-for="lang in Advertising.language" :key="lang.id"
                               class="box-activity-advetising box-activity-advetising-box-shadow box-activity-advetising-color box-activity-advetising-background mb-1">
                            {{lang.title }}
                        </span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="box-show-page box-show-page-special mb-2">
      <codeLoading v-if="contentLoading"></codeLoading>
      <div v-else>
        <div class="row">
          <div class="col-md-12 mt-3" v-if="Advertising.posibilities && Advertising.posibilities.length != 0">
            <div>
              <span class="font-weight-bold">امکانات:</span>
            </div>
            <div class="mt-2">
                        <span v-for="ad in Advertising.posibilities" :key="ad.id"
                              class="box-activity-advetising box-activity-advetising-box-shadow box-activity-advetising-color box-activity-advetising-background mb-1" >
                            {{ad.title}}
                        </span>
            </div>
          </div>
          <div class="col-md-12 mt-3"
               v-if="Advertising.behavioralskills && Advertising.behavioralskills.length != 0">
            <div>
              <span class="font-weight-bold">مهارت های رفتاری:</span>
            </div>
            <div class="mt-2">
                        <span v-for="ad in Advertising.behavioralskills" :key="ad.id"
                              class="box-activity-advetising box-activity-advetising-box-shadow box-activity-advetising-color box-activity-advetising-background mb-1">
                            {{ad.title }}
                        </span>
            </div>
          </div>
        </div>
        <div class="row mt-4 p-4">
          <div class="mb-2 w-100 font-weight-bold font-15 d-flex align-items-baseline">
              <h2 class="font-15">
                شرح شغل برای استخدام آژانس مسافرتی و هواپیمایی  :
              </h2>
<!--              <a v-if="!LoggedIN" title="برای مشاهده کارفرما وارد شوید">-->
<!--                <Icon @click="Gologin" type="ios-lock" class="lock-company" />-->
<!--              </a>-->
          </div>
<!--          :class="{disappearedCompany : !LoggedIN}"-->
          <div  class="mr-2 mt-2 advertsing-desc font-14" >
            <div v-html="Advertising.comment"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>



import Share from "./share";
export default {
  name:"advertisingInfo",
  components: {Share},
  props: ['Advertising' , 'LoggedIN'  , 'contentLoading' , 'Member' ,'memberRole'],
  data() {
    return {
      boxShare: false,
      shareText : 'دوست من این لینک رو ببین، یک فرصت شغلی است. شاید دوسش داشته باشی'
    }
  },
  methods : {
    Gologin() {
      if ( this.memberRole == '') {
        this.$store.commit('Auth/redirect/SET_ROUTE' , {
          route : {name : this.$route.fullPath  }
        })
        this.$router.push({path : '/users/login-register/Member' })
      }
      else if(this.memberRole == 'NOTMember')
        this.$router.push({path : '/register/member'})
      else if(this.memberRole == 'NOTCompany')
        this.$router.push({path : '/register/company'})
    },
    documentClick(e){
      let el = this.$refs.shareBoxShow
      if(el){
        let target = e.target
        if ( el !== target && !el.contains(target))
          this.boxShare = false
      }
    },
    shareTelegram() {
      let url = `https://telegram.me/share/url?text=${this.shareText}&url=${window.location.href}`
      window.open(url, "_blank");
    },
    sharewhatsapp(){
      let url = `https://api.whatsapp.com/send?text=${this.shareText}%20%20%20%20%20%20%20${window.location.href}`
      window.open(url, "_blank");

    },
    liked() {
      if (this.memberRole == 'Member') {
        this.$store.dispatch('Site/Advertising/LikeAdvertisings', {id: this.Advertising.id, member: this.Member.member.id})
          .catch(err => {console.log(err)})
      } else if (this.memberRole == 'Company') {
        this.$store.dispatch('globalFunctions/ErrorNotify2' ,  'شما با پروفایل کارفرما وارد شده اید')
      } else if (this.memberRole == 'Admin') {
        this.$store.dispatch('globalFunctions/ErrorNotify2' ,  'شما با پروفایل ادمین وارد شده اید')
      } else {
        this.$store.dispatch('globalFunctions/ErrorNotify2' ,  'لطفا ابتدا وارد شوید.')
      }

    },
    disliked() {
      this.$store.dispatch('Site/Advertising/dislikeAdvertisings', {id: this.Advertising.id, member: this.Member.member.id})
        .catch(err => {console.log(err)})
    },
    openAd() {
      let routeUrl = this.$router.resolve({ path : `/company/${this.pathName}`});
      window.open(routeUrl.href, '_blank');
    },
  } ,
  computed :  {
    month() {return this.$moment().add(-1 ,'months').format('YYYY-MM-DD');},
    like() {
      if (this.memberRole == 'Member')
        return this.$store.getters['Site/Advertising/memberLikeAd'](this.Member.member.id)
    },
    pathName() {
      var namee = this.Advertising.Company.name_en
      if(namee) {
        namee = namee.toLowerCase()
        namee = namee.replace(/\s/g, '-')
        return this.Advertising.Company.id + '-' + namee
      }
    },
    Code() {
      return 'KM' + ( this.Advertising.id * 2 + 3 )
    },
  },

}
</script>
<style>
.paddingRight40 {
  padding-right: 40px ;
}
.box-show-page-special .special {
  right: 10px !important;
  width: 83px !important;
  height: 82px !important;
}
</style>
