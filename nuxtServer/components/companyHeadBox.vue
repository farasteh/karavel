<template>
  <div>
    <div class="box-show-page" v-if="compLoading">
      <Vcl-list rtl></Vcl-list>
    </div>
    <div class="box-show-page-company karavel-box" v-else>
<!--      <div v-if="!LoggedIN" >-->
<!--        <div v-if="!compLoading"-->
<!--             class="box-form-header-company box-form-header-back-company mBox-company">-->
<!--          <div :style="{'background-image': 'url(' + CompanyImage + ')'}" class="disappeared-company company-box-img cursor-poiner"></div>-->
<!--          <div class="d-flex flex-column justify-content-center">-->
<!--            <p class="mr-0 text-dark">کارفرما: </p>-->
<!--            <p class="disappeared-company mb-0 text-dark">-->
<!--              {{company.name_fa}}-->
<!--            </p>-->
<!--            <p class="disappeared-company mb-1 mt-0 text-dark">-->
<!--              {{company.name_en}}-->
<!--            </p>-->
<!--            <p class="mr-0 text-dark">تلفن:-->
<!--              <span class="disappeared-company "> {{company.phone}} </span>-->
<!--            </p>-->
<!--          </div>-->
<!--        </div>-->
<!--          <Tooltip trigger="hover" style="top: -122px;" placement="top">-->
<!--            <Icon @click="Gologin" type="ios-lock" class="lock-company-image" />-->
<!--            <div style="line-height: 2.25;" slot="content">-->
<!--              <p class="font-weight-bold" ><Icon class="lump-icon" type="ios-bulb" /> برای مشاهده آژانس ابتدا وارد شوید</p>-->
<!--            </div>-->
<!--          </Tooltip>-->
<!--      </div>-->
      <div >
        <a v-if="!compLoading" @click="openAd"
           class="box-form-header-company box-form-header-back-company mBox-company">
          <img :src="CompanyImage" class="cursor-poiner"  :alt="company.name_fa" @error="imageError">
          <div class="d-flex flex-column justify-content-center">
            <p class="mr-0 text-dark">کارفرما: </p>
            <p class="mb-0 text-dark">
              {{company.name_fa}}
            </p>
            <p class="mb-1 mt-0 text-dark">
              {{company.name_en}}
            </p>
            <p class="mr-0 text-dark">تلفن تماس:
              <span > {{company.phone}} </span>
            </p>
          </div>
        </a>
      </div>
    </div>
  </div>
</template>
<script>

import { VclList } from 'vue-content-loading';

export default {
  name:"advertisingInfo",
  props: [ 'LoggedIN'  , 'compLoading' , 'memberRole' , 'company'],
  components: {
    'Vcl-list'   :  VclList
  },
  data() {
    return {
      ErrorImage : false ,
    }
  },
  methods : {
    Gologin() {
      if ( this.memberRole == '') {
        this.$store.commit('Auth/redirect/SET_ROUTE' , {
          route : {name : this.$route.fullPath }
        })
        this.$router.push({path : '/users/login-register/member'})
      }
      else if(this.memberRole == 'NOTMember')
        this.$router.push({path : '/register/member'})
      else if(this.memberRole == 'NOTCompany')
        this.$router.push({path : '/register/company'})
    },
    imageError ()  {
      this.ErrorImage = true
    },
    openAd() {
      let routeUrl = this.$router.resolve( `/company/${this.pathName}`);
      window.open(routeUrl.href, '_blank');
    },
  } ,
  computed :  {
    CompanyImage() {
      if(this.ErrorImage)
        return  '/images/company/no-company.png'
      return this.company.logo
    },
    pathName() {
      var namee = this.company.name_en
      if(namee) {
        namee = namee.toLowerCase()
        namee = namee.replace(/\s/g, '-')
        return this.company.id + '-' + namee
      }
    },

  },
}
</script>
<style>

</style>
