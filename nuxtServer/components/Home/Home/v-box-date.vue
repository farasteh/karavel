<template>
  <div class="mt-2">
    <div class="box-list-date-home">
      <div class="date-box-list-home" v-if="!advertising.special">( {{ advertising.created_at }} )</div>
      <div>
        <nuxt-link :to="`/jobs/${advertising.id}`">
          <h3  class="w-75">  {{ advertising.title }} </h3>
        </nuxt-link>
        <span class="date-box-list-home font-14" style="top: 5px;" v-if="advertising.special">
                    <span class="spe-text-home badge badge-danger">ویژه</span>
                </span>
      </div>

      <div class="mt-2 data-list-box" >
                <span class="ml-2">
                    <i class="fas fa-tag"></i>
                    <span v-if="advertising.job">{{advertising.job.title}} ، {{advertising.category.title}}</span>
                </span>
        <span v-if="advertising.special" class="date-box-list-home position-relative float-left"  style="left: 0px">( {{ advertising.created_at }} )</span>

      </div>
      <div class="mt-2 data-list-box">
        <div class="w-75">
<!--                     <span class="ml-2" v-if="!LoggedIN">-->
<!--                        <i class="fas fa-building"></i>-->
<!--                         کارفرما:-->
<!--                        <span class="disappeared-company" v-if="advertising.Company"> {{ advertising.Company.name_fa }}</span>-->
<!--                        <a  title="برای مشاهده کارفرما وارد شوید">-->
<!--                            <Icon @click="Gologin" type="ios-lock" class="lock-company" />-->
<!--                        </a>-->
<!--                     </span>-->
          <span class="ml-2" >
                        <i class="fas fa-building"></i>
                        <span v-if="advertising.Company"> {{ advertising.Company.name_fa }}</span>
                    </span>
          <span>
             <i class="fas fa-map-marker-alt"></i>
                <span v-if="advertising.province"> {{ advertising.province.title }} </span>
          </span>
        </div>
        <span class="link-list-resume"
              v-if="role == 'Member' &&
                            $store.getters['Site/Advertising/memberSentResume'](advertising.id , User.member.id)">
                    <span style="color:#777"> رزومه ارسال شده</span>
                    <span class="tick-icon-color">
                        <Icon type="md-checkmark"  class="sent-title-icon" />
                    </span>
                </span>
        <nuxt-link v-else :to="`/jobs/${advertising.id}`" class="link-list-resume" >
          <span>ارتباط با آژانس</span>
          <span class="">
              <Icon type="ios-return-left" class="sent-title-icon color-link" />
          </span>
        </nuxt-link>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "BoxListHome" ,
  props :  ['advertising' , 'role'] ,
  methods :  {
    Gologin() {
      if(this.role == '') {
        this.$store.commit('Auth/redirect/SET_ROUTE' , {
          route : {name : this.$route.fullPath }
        })
        this.$router.push({path : '/users/login-register/Member' })
      }
      else if(this.role == 'NOTMember')
        this.$router.push({path : '/register/member'})
      else if(this.role == 'NOTCompany')
        this.$router.push({path : '/register/company'})

    }
  },
  computed : {
    pathName() {
      var namee = this.advertising.Company.name_en
      namee = namee.toLowerCase()
      namee = namee.replace(/\s/g, '-')
      return this.advertising.Company.id + '-' + namee
    },
    LoggedIN () {
      if ( this.role == '' || this.role == 'NOTMember' || this.role == 'NOTCompany'  )
        return false
      else return  true
    },
    User(){ return this.$store.state.User.User.User;},
  }
}
</script>

<style scoped>

</style>
