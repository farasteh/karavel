<template>
  <div class="col-12 col-xl-6" >
    <div class="box-list-jobs karavel-box box-list-advertising-box">
      <div v-if="">
        <Icon v-if="!like"  @click="liked" class="box-icon-jobs" type="ios-bookmark-outline" />
        <Icon v-if="like"  @click="disliked" class="box-icon-jobs" type="ios-bookmark" />
      </div>
      <div class="advertizing-half-box">
<!--        <div class="advertizing-half-box-image" v-if="!LoggedIN">-->
<!--          <img v-if="ErrorImage"  src="~/assets/images/company/no-company.png" style="cursor: pointer" class="disappeared-company"  :alt="List.title">-->
<!--          <img v-else :src="List.Company.logo" style="cursor: pointer" class="disappeared-company"  :alt="List.title" @error="imageError">-->
<!--          <Tooltip trigger="hover" style="top: -65px;" placement="top" class="position-relative">-->
<!--            <Icon @click="Goloign" type="ios-lock" class="lock-company-image lock-compamy-image-mobile" />-->
<!--            <div style="line-height: 2.25;" slot="content">-->
<!--              <p class="font-weight-bold" ><Icon class="lump-icon" type="ios-bulb" /> برای مشاهده آژانس ابتدا وارد شوید</p>-->
<!--            </div>-->
<!--          </Tooltip>-->
<!--        </div>-->
        <div class="advertizing-half-box-image">
          <img v-if="ErrorImage"  src="/images/company/no-company.png" style="cursor: pointer"  :alt="List.title">
          <img v-else :src="List.Company.logo" style="cursor: pointer"  :alt="List.title" @error="imageError">
        </div>
        <div class="center-box">
          <div class="mr-2 mt-2">
            <a class="mb-3 px-0" @click="openAd" style="color: inherit">
              <h3  style="word-spacing: -1px">
                {{List.title}}
              </h3>
            </a>
            <div class="d-flex flex-column">
<!--              <div class="mb-2 px-0" v-if="!LoggedIN">-->
<!--                <i class="fas fa-building"></i>-->
<!--                <span v-if="!LoggedIN">کارفرما: </span>-->
<!--                <span  v-if="List.Company" class="pr-1 disappeared-company">-->
<!--                                    {{List.Company.name_fa }}-->
<!--                                </span>-->
<!--                <a title="برای مشاهده کارفرما وارد شوید"><Icon @click="Goloign" type="ios-lock" class="lock-company" /></a>-->
<!--              </div>-->
              <div class="mb-2 px-0">
                <i class="fas fa-building"></i>
                <span  v-if="List.Company" class="pr-1">
                                    {{List.Company.name_fa }}
                                </span>
              </div>
              <div class="mb-2 px-0">
                <i class="fas fa-map-marker-alt"></i>
                <span v-if="List.province" class="pr-1">
                                    {{List.province.title}} ، {{List.city.title}}
                                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="my-2 px-3 d-flex justify-content-between" style="line-height: 32px;">
        <div>
          {{List.created_at}}
        </div>
        <div class="sendResume" v-if="role == 'Member' && $store.getters['Site/Advertising/SimilarHasSent'](List.id , User.member.id)">
          <p>
            رزومه ارسال شده
            <span><Icon type="md-checkmark" class="sent-title-icon"/></span>
          </p>
        </div>
        <nuxt-link v-else tag="a" :to="`/jobs/${List.id}`"  class="color-link sendResume">
          <p>
            ارتباط با آژانس
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
  props: ['List' , 'User' , 'index' , 'role'],
  data() {
    return {
      ErrorImage : false ,
    }
  },
  methods : {
    Goloign() {
      if(this.role == '') {
        this.$store.commit('Auth/redirect/SET_ROUTE' ,  { route : {name : this.$route.fullPath } })
        this.$router.push({path : '/users/login-register/Member' })
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
      this.$router.replace({path: `/jobs/${this.List.id}`})
      // window.location.reload()
    } ,
    liked() {
      if(this.role == 'Member')
      {
        this.$store.dispatch('Site/Advertising/LikeAdvertising' ,
          {id : this.List.id , member : this.User.member.id})
          .then(success => {
            console.log(success)
          }).catch(err => {
          console.log(err)
        })
      }
      else if(this.role == 'Company')
      {
        this.$store.dispatch('globalFunctions/ErrorNotify2' ,' شما با پروفایل کارفرما وارد شده اید')
      }
      else if(this.role == 'Admin')
      {
        this.$store.dispatch('globalFunctions/ErrorNotify2' ,' شما با پروفایل ادمین وارد شده اید')
      }
      else {
        this.$store.dispatch('globalFunctions/ErrorNotify2' , 'لطفا ابتدا لاگین کنید')
      }

    } ,

    disliked () {
      this.$store.dispatch('Site/Advertising/dislikeAdvertising' ,
        {id : this.List.id , member : this.User.member.id})
        .then(success => {
          console.log(success)
        }).catch(err => {
        console.log(err)

      })
    }  ,
  } ,

  computed :  {
    id() {
      if(this.role == 'Member')
        if(this.User)
          return this.User.member.id
    },
    like() {
      if(this.User && this.List)
        if(this.role == 'Member')
          return this.$store.getters['Site/Advertising/LikedSimilarUsersList' ] (this.List.id , this.User.member.id)
    },
    pathName() {
      var namee = this.List.Company.name_en
      namee = namee.toLowerCase()
      namee = namee.replace(/\s/g, '-')
      return this.List.Company.id + '-' + namee
    },
    LoggedIN()  {
      if ( this.role == '' || this.role == 'NOTMember' || this.role == 'NOTCompany'  )
        return false
      else return  true
    }

  },
}
</script>
<style scoped>

.color-link {
  color:  var(--var-advertising-feature-box-color) !important;
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
