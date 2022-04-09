<template>
  <div class="col-12 col-xl-6" >
    <div class="box-list-jobs karavel-box box-list-advertising-box">
<!--      <div v-if="">-->
<!--        <Icon v-if="!like"  @click="liked" class="box-icon-jobs" type="ios-bookmark-outline" />-->
<!--        <Icon v-if="like"  @click="disliked" class="box-icon-jobs" type="ios-bookmark" />-->
<!--      </div>-->
      <div class="advertizing-half-box">
        <div class="advertizing-half-box-image" v-if="!LoggedIN">
          <img v-if="ErrorImage"  src="~/assets/images/company/no-photo.jpg" style="cursor: pointer" class="disappeared-company"  :alt="staff.name">
          <img v-else :src="staff.image" style="cursor: pointer" class="disappeared-company"  :alt="staff.name" @error="imageError">
          <Tooltip trigger="hover" style="top: -65px;" placement="top" class="position-relative">
            <Icon @click="Goloign" type="ios-lock" class="lock-company-image lock-compamy-image-mobile" />
            <div style="line-height: 2.25;" slot="content">
              <p class="font-weight-bold" ><Icon class="lump-icon" type="ios-bulb" /> برای مشاهده رزومه ابتدا وارد شوید</p>
            </div>
          </Tooltip>
        </div>
        <div class="advertizing-half-box-image" v-else>
          <img v-if="ErrorImage"  src="/images/company/no-photo.jpg" style="cursor: pointer"  :alt="staff.name">
          <img v-else :src="staff.image" style="cursor: pointer"  :alt="staff.name" @error="imageError">
        </div>
        <div class="center-box">
          <div class="mr-2 mt-2">
            <div class="mb-3 px-0 d-flex" style="color: inherit" v-if="!LoggedIN">
                <h3 style="word-spacing: -1px" class="disappeared-company">
                   {{staff.name}} {{staff.last_name}}
                </h3>
              <a title="برای مشاهده رزومه وارد شوید"><Icon @click="Goloign" type="ios-lock" class="lock-company" /></a>
            </div>
            <a v-else class="mb-3 px-0" @click="openAd" style="color: inherit">
              <h3  style="word-spacing: -1px">
                {{staff.name}} {{staff.last_name}}
              </h3>
            </a>
            <div class="d-flex flex-column">
              <div class="mb-2 px-0" v-if="staff.birhdate || staff.gender">
                <i class="fas fa-genderless"></i>
                <span class="pr-1">
                     <span v-if="staff.birhdate">
                   {{staff.birhdate }} ساله
                </span>
                <span v-if="staff.gender">
                  /{{getGender}}
                </span>
                </span>
              </div>
              <div class="mb-2 px-0">
                <i class="fas fa-tag"></i>
                <span  v-if="staff.job" class="pr-1">
                    {{staff.job.title}}  <span v-if="staff.category"> , {{staff.category.title}}</span>
                </span>
              </div>
              <div class="mb-2 px-0" v-if="staff.province || staff.city">
                <i class="fas fa-map-marker-alt"></i>
                <span v-if="staff.province" class="pr-1">
                  {{staff.province.title}} <span v-if="staff.city"> ، {{staff.city.title}}</span>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="my-2 px-3 d-flex justify-content-between" style="line-height: 32px; direction: ltr">
        <div class="sendResume" v-if="role == 'Company' &&
        $store.getters['Site/Staff/SimilarRequestHasSent'](staff.id , User.Company.id)">
          <p>
            پیشنهاد ارسال شده
            <span><Icon type="md-checkmark" class="sent-title-icon"/></span>
          </p>
        </div>
        <nuxt-link v-else tag="a" :to="`/resume/pdf/${staff.id}`"  class="color-link sendResume" style="direction: rtl">
          <p>
            ارسال پیشنهاد
            <span><Icon type="ios-return-left" class="sent-title-icon color-link" /></span>
          </p>
        </nuxt-link>
      </div>
    </div>
  </div>
</template>
<script>

export default {
  name:"Box",
  props: ['staff' , 'User' , 'index' , 'role'],
  data() {
    return {
      ErrorImage : false ,
    }
  },

  methods : {

    Goloign() {
      if(this.role == '') {
        this.$store.commit('Auth/redirect/SET_ROUTE' ,  { route : {name : this.$route.fullPath } })
        this.$router.push({path : '/users/login-register/Company' })
      }
      else if(this.role == 'NOTMember')
        this.$router.push({path : '/register/member'})
      else if(this.role == 'NOTCompany')
        this.$router.push({path : '/register/company'})
    },
    imageError ()  {
      this.ErrorImage = true
    },
    openAd() {
      this.$router.replace({path: `/resume/pdf/${this.staff.id}`})
      // window.location.reload()
    } ,
  } ,

  computed :  {
    getCode() {
      return `KS${((this.staff.id*2)+3)}`
    },
    getGender() {
      if(this.staff.gender == 1)
        return 'آقا'
      else
        return 'خانم'
    },
    id() {
      if(this.role == 'Member')
        if(this.User)
          return this.User.member.id
    },
    LoggedIN()  {
      if(this.role != '') {
        if ( this.role == 'Company' || this.role == 'Admin'  )
          return true
      }
      else return  false
    }

  },
}
</script>
<style scoped>

.color-link {
  color:  var(--var-background-color) !important;
}
.box-img {
  width: 80px;
  height: 80px;
}
.box-img img{
  width: 100%;
  height: 100%;
  border-radius: 50%;
}
.center-box{
  display: flex !important;
  align-items: center !important;
  padding-right: 15px;
  width: calc(100% - 110px);
}
.center-box h3{
  font-size: 18px;
}
.box-icon-jobs{
  position: absolute;
  left: 20px !important;
  top: -2px !important;
  font-size: 28px !important;
}
.padding-box-list{
  padding-right: 40px;
  padding-top: 5px;
}
.date-box {
  position: absolute;
  left: 0;
  bottom: 30px;
}
.center-box h3 {
  font-size: 15px !important;
}
.box-list-jobs {
  padding: 0 !important;
  border-radius: 5px !important ;
}
.pr0 {
  padding-right: 0 !important;
}
.pl0 { padding-left: 0 !important}

.advertizing-half-box {
  font-size: 13px;
  color: #888;
  border-bottom: 1px dashed #ddd;
  display: inline-flex;
  padding: 5px 0;
}
.lock-compamy-image-mobile {
  top : auto;

}
@media screen and (max-width: 759px){
  .center-box h3{
    font-size: 15px !important;
  }
  .padding-box-list{
    padding-right: 0 !important;
  }
}
@media screen and (min-width: 769px){
  .lock-compamy-image-mobile {
    right: 28px
  }
}

.box-icon-jobs {
  position: absolute;
  left: 10px !important;
  top: 10px !important;
  font-size: 27px !important;
}
.advertizing-half-box-image {
  display: inline-block;
  text-align: center;
  width: 80px;
  height: 80px;
  position: relative;
  right: 10px;
}
.advertizing-half-box-image img{
  width: 100%;
  height: 100%;
  border-radius: 50%;
  display: block;
}
.sent-title{
  height: 32px;
  line-height: 32px;
  text-align: center;
}
.sent-title-icon {
  color: #61c9b0;
  font-size:25px
}



</style>
