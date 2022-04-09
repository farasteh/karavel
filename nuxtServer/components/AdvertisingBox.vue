<template>
  <div>
    <div class="box-list-jobs karavel-box desk-box" style="padding : 20px 0 !important;">
      <div class="special" v-if="List.special">
        <span class="spe-text">ویژه</span>
      </div>
      <div>
        <Icon v-if="!like"  @click="liked" class="box-icon-jobs" type="ios-bookmark-outline" />
        <Icon v-if="like"  @click="disliked" class="box-icon-jobs" type="ios-bookmark" />
      </div>
      <div class="col-12 p-0 d-flex">
        <div class="box-img">
<!--          <div v-if="!LoggedIN" class="disappeared-company disapeard-company-image"-->
<!--               :style="{'background-image': 'url(' + CompanyImage + ')'}"></div>-->
          <nuxt-link :to="`/jobs/${List.id}`" style="z-index: 1;">
            <img :src="CompanyImage" class="cursor-poiner"  :alt="List.title" @error="imageError">
          </nuxt-link>
<!--          <Tooltip v-if="!LoggedIN" trigger="hover" style="top: -122px;" placement="top">-->
<!--            <Icon @click="Goloign" type="ios-lock" class="lock-company-image" />-->
<!--            <div style="line-height: 2.25;" slot="content">-->
<!--              <p class="font-weight-bold" ><Icon class="lump-icon" type="ios-bulb" /> برای مشاهده آژانس ابتدا وارد شوید</p>-->
<!--            </div>-->
<!--          </Tooltip>-->
        </div>
        <div class="center-box arrow">
          <div class="left-board">
            <h3 class="mb-1">
              <nuxt-link :to="`/jobs/${List.id}`"  class="color-link" style="color: #777; !important;">
                {{List.title}}
              </nuxt-link>
              <span class="font-12">
                 ({{List.created_at}})
             </span>
            </h3>
            <div>
              <i class="fas fa-building"></i>
<!--              <span v-if="!LoggedIN">کارفرما: </span>-->
<!--              :class="{disappearedCompany : !LoggedIN}"-->
              <span  v-if="List.Company" class="pr-1" >
                  {{List.Company.name_fa }}
              </span>
<!--              <a v-if="!LoggedIN" title="برای مشاهده کارفرما وارد شوید">-->
<!--                <Icon @click="Goloign" type="ios-lock" class="lock-company" />-->
<!--              </a>-->
            </div>
            <div>
              <i class="fas fa-tag"></i>
              <span v-if="List.job" class="pr-1">
                  {{List.job.title}} ، {{List.category.title}}
              </span>
            </div>
            <div>
              <i class="fas fa-map-marker-alt"></i>
              <span v-if="List.province" class="pr-1">
                  {{List.province.title}} ، {{List.city.title}}
              </span>
            </div>
            <div>
              <i class="far fa-file-alt"></i>
              <span  v-if="List.CooperationType" class="pr-1">
                  {{List.CooperationType.title}}
              </span>
              <span>
                  (
                  <nuxt-link  :to="`/jobs/${List.id}`" class="color-link">
                      <i class="fas fa-donate"></i>
                      <span class="pr-1">مشاهده حقوق</span>
                  </nuxt-link>
                  )
              </span>
            </div>
          </div>
        </div>
        <div class="left-box-board" >
          <div v-if="memberRole == 'Member' &&
                        $store.getters['Site/Advertising/memberSentResume'](List.id , User.member.id) ">
            <p>
              رزومه ارسال شده
              <span class="tick-icon-color">
                  <Icon type="md-checkmark" class="sent-title-icon"/>
              </span>
            </p>
          </div>
          <nuxt-link v-else :to="`/jobs/${List.id}`" class="color-link">
            <p  class="send-resume-box">
              ارتباط با آژانس
              <span class="color-link">
                  <Icon type="ios-return-left" class="sent-title-icon color-link" />
              </span>
            </p>
          </nuxt-link>
        </div>
      </div>
    </div>
    <div class="box-list-jobs karavel-box mobile-box">
      <div>
        <Icon v-if="!like"  @click="liked" class="box-icon-jobs" type="ios-bookmark-outline" />
        <Icon v-if="like"  @click="disliked" class="box-icon-jobs" type="ios-bookmark" />
      </div>
      <div class="advertizing-half-box">
        <div class="advertizing-half-box-image">
<!--          <div v-if="!LoggedIN" class="disappeared-company disapeard-company-image"-->
<!--               :style="{'background-image': 'url(' + CompanyImage + ')'}"></div>-->
          <nuxt-link  :to="`/jobs/${List.id}`" >
            <img  class="cursor-poiner"  :src="CompanyImage" :alt="List.title" @error="imageError" >
          </nuxt-link>
<!--          <Tooltip v-if="!LoggedIN" trigger="hover" style="top: -122px;" placement="top">-->
<!--            <Icon @click="Goloign" type="ios-lock" class="lock-company-image" />-->
<!--            <div style="line-height: 2.25;" slot="content">-->
<!--              <p class="font-weight-bold" ><Icon class="lump-icon" type="ios-bulb" /> برای مشاهده آژانس ابتدا وارد شوید</p>-->
<!--            </div>-->
<!--          </Tooltip>-->
        </div>


        <div class="center-box">
          <div class="mr-2">
            <h3 class="my-3 px-0" style="word-spacing: -1px">
              <nuxt-link :to="`/jobs/${List.id}`"  class="color-link"  style="color: #777; !important;">
                {{List.title}}
              </nuxt-link>
            </h3>
            <div class="d-flex flex-column">
              <div class="mb-2 px-0">
                <i class="fas fa-building"></i>
<!--                <span v-if="!LoggedIN">کارفرما: </span>-->
<!--                :class="{disappearedCompany : !LoggedIN}"-->
                <span  v-if="List.Company" class="pr-1" >
                    {{List.Company.name_fa }}
                </span>
<!--                <a v-if="!LoggedIN" title="برای مشاهده کارفرما وارد شوید">-->
<!--                  <Icon @click="Goloign" type="ios-lock" class="lock-company" />-->
<!--                </a>-->
              </div>
              <div class="mb-2 px-0">
                <i class="fas fa-map-marker-alt"></i>
                <span v-if="List.province" class="pr-1">
                    {{List.province.title}} ، {{List.city.title}}
                </span>
              </div>
              <div >
                <i class="far fa-file-alt"></i>
                <span  v-if="List.CooperationType" class="pr-1" >{{List.CooperationType.title}}</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="py-2 px-3 d-flex justify-content-between" style="line-height: 32px;">
        <div>
          {{List.created_at}}
        </div>
        <div v-if="memberRole == 'Member' &&
                            $store.getters['Site/Advertising/memberSentResume'] (List.id , User.member.id )">
          <p>
            رزومه ارسال شده
            <span class="tick-icon-color"><Icon type="md-checkmark" class="sent-title-icon"/></span>
          </p>
        </div>
        <nuxt-link :to="`/jobs/${List.id}`" v-else class="color-link">
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
  props: ['List' , 'User' , 'memberRole'],
  data() {
    return {
      title : '',
      ErrorImage : false ,
    }
  },
  methods : {
    Goloign() {
      if(this.memberRole == '') {
        this.$store.commit('Auth/redirect/SET_ROUTE', {
          route: {name: this.$route.fullPath}
        })
        this.$router.push({path: '/users/login-register/Member'})
      }
      else if(this.memberRole == 'NOTMember')
        this.$router.push({path : '/register/member'})
      else if(this.memberRole == 'NOTCompany')
        this.$router.push({path : '/register/company'})
    },

    imageError ()  {
      this.ErrorImage = true
    },
    liked() {
      if(this.memberRole == 'Member')
      {
        this.$store.dispatch('Site/Advertising/LikeAdvertising' , {id : this.List.id , member : this.User.member.id})
      }
      else if(this.memberRole == 'Company')
      {
        this.$store.dispatch('globalFunctions/ErrorNotify2' , ' شما با پروفایل کارفرما وارد شده اید')

      }
      else if(this.memberRole == 'Admin')
      {
        this.$store.dispatch('globalFunctions/ErrorNotify2' , ' شما با پروفایل ادمین وارد شده اید')

      }
      else
      {
        this.$store.dispatch('globalFunctions/ErrorNotify2' , 'لطفا ابتدا لاگین کنید')
      }

    } ,
    disliked () {
      this.$store.dispatch('Site/Advertising/dislikeAdvertising' , {id : this.List.id , member : this.User.member.id})
        .then(success => {
          console.log(success)
        }).catch(err => {
        console.log(err)

      })
    }  ,
  } ,
  computed :  {
    CompanyImage() {
      if(this.ErrorImage)
        return  '/images/company/no-company.png'
      return this.List.Company.logo
    },

    LoggedIN () {
      if ( this.memberRole == '' || this.memberRole == 'NOTMember' || this.memberRole == 'NOTCompany'  )
        return false
      else return  true
    },

    like() {
      if(this.User && this.List)
        if(this.memberRole == 'Member')
          return this.$store.getters['Site/Advertising/LikedUsersList'](this.List.id , this.User.member.id)      },
    pathName() {
      var namee = this.List.Company.name_en
      namee = namee.toLowerCase()
      namee = namee.replace(/\s/g, '-')
      return this.List.Company.id + '-' + namee
    },
  },
}
</script>
<style>
.lock-company-image {
  position: absolute;
  z-index: 99;
  font-size: 25px;
  top: 7px;
  right: -55px;
  color: #ff2a2a;
}
.box-img .ivu-tooltip-popper {
  right: -75px !important
}
.box-img .ivu-tooltip  {
  width : auto !important
}
.box-img  .ivu-tooltip-popper[x-placement="top"] .ivu-tooltip-arrow {
  display : none
}
.lock-company {
  color: #e3342f;
  font-size: 16px;
}
.special {
  position: absolute;
  right: -6px;
  top: -6px;
  z-index: 1;
  overflow: hidden;
  width: 83px;
  height: 82px;
  text-align: right;
}
.spe-text {
  font-size: 12px;
  font-weight: bold;
  color: #FFF;
  text-align: center;
  line-height: 15px;
  transform: rotate(45deg);
  -webkit-transform: rotate(45deg);
  width: 100px;
  display: block;
  background: #FF365D;
  position: absolute;
  top: 15px;
  right: -21px;
  padding: 0 0 5px 0;
}
.special .spe-text::before {
  content: "";
  position: absolute;
  left: 5px;
  top: 100%;
  z-index: -1;
  border-left: 3px solid #d85800;
  border-right: 3px solid transparent;
  border-bottom: 3px solid transparent;
  border-top: 3px solid #d85800;
}
.special .spe-text::after {
  content: "";
  position: absolute;
  right: 0px;
  top: 100%;
  z-index: -1;
  border-left: 3px solid transparent;
  border-right: 3px solid #d85800;
  border-bottom: 3px solid transparent;
  border-top: 3px solid #d85800;
}
.send-resume-box {
  padding: 10px;
  border: 1px solid;
  border-radius: 5px;
}
.left-box-board {
  display: flex;
  width: 27%;
  justify-content: center;
  align-items: center;
  margin: -10px 0;
}
.left-board:before {
  content : "";
  position: absolute;
  left    : 0;
  z-index: 100;
  top  : 24%;
  width  : 1px;
  height   : 50%;  /* or 100px */
  background: #c6c6c678;
}
.tick-icon-color {
  color : #61c9b0
}
.box-img {
  width: 15% !important;
  display: flex;
  justify-content: center;
  z-index: 2;
}
.box-img img{
  width: 80px !important;
  height: 80px !important;
  border-radius: 50%;
}
.center-box{
  display: flex !important;
  align-items: center !important;
  padding-right: 15px;
  font-size: 12px;
  color: #777;
  line-height: 1.75;
  position: relative;
}
.center-box.arrow {
  width: calc(100% - 35%);

}
.center-box.arrow::before{
  content: "";
  display: block;
  position: absolute;
  top: 0;
  width: 0;
  height: 0;
  border: 12px solid transparent;
  border-top-color: transparent;
  border-bottom-color: transparent;
  border-top-color: transparent;
  border-bottom-color: transparent;
  border-bottom-color: transparent;
  border-top-color: #ddd;
  left: -12px;
  top: -20px;
}
.center-box.arrow::after{
  content: "";
  display: block;
  position: absolute;
  bottom: 0;
  width: 0;
  height: 0;
  border: 12px solid transparent;
  border-top-color: transparent;
  border-bottom-color: transparent;
  border-top-color: transparent;
  border-bottom-color: transparent;
  border-bottom-color: transparent;
  border-bottom-color: #ddd;
  left: -12px;
  bottom: -20px;
}
.center-box h3{
  font-size: 18px;
}
.box-icon-jobs{
  position: absolute;
  left: 15px !important;
  top: 5px !important;
  font-size: 28px !important;
  z-index: 1 !important;
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
.sent-title-icon {
  font-size:20px
}
.mobile-box { display: none !important;}

@media screen and (max-width: 759px){
  .center-box h3{
    font-size: 18px !important;
  }
  .padding-box-list{
    padding-right: 0 !important;
  }
}
@media screen and (max-width: 768px){
  .mobile-box { display: block !important;}
  .desk-box { display: none !important;}
  .mobile-box .box-img {
    width: 80px;
    height: 80px;
  }
  .mobile-box .box-img img{
    width: 100%;
    height: 100%;
    border-radius: 50%;
  }
  .mobile-box .center-box{
    display: flex !important;
    align-items: center !important;
    padding-right: 15px;
    width: calc(100% - 110px);
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
    width: 70px;
    height: 70px;
    position: relative;
    right: 10px;
    margin-top: .5rem;
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
    font-size:18px
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
    font-size: 12px;
    color: #777;
    line-height: 1.75;
    border-bottom: 1px dashed #ddd;
    display: inline-flex;
    padding: 5px 0;
    width: 100%;
  }
  .lock-company-image {
    right: -13px;
    top: -64px;
  }
  .advertizing-half-box-image .ivu-tooltip-popper {
    top : -38px !important;
  }
  .advertizing-half-box-image  .ivu-tooltip  {
    width : auto !important
  }
  .advertizing-half-box-image   .ivu-tooltip-popper[x-placement="top"] .ivu-tooltip-arrow {
    display : none
  }

}
</style>
