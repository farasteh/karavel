<template>
  <div class="mt-2">
    <div class="box-list-date-home">
      <div>
        <nuxt-link :to="`/resume/pdf/${staff.id}`">
          <h3  class="w-75">  {{staff.name}} {{ staff.last_name}} </h3>
        </nuxt-link>
        <span class="date-box-list-home font-14" style="top: 5px;" v-if="staff.disabled">
            <span class="spe-text-home badge badge-danger">استخدام شده</span>
        </span>
      </div>

      <div class="mt-2 data-list-box" >
        <span class="ml-2">
            <i class="fas fa-tag"></i>
            <span v-if="staff.job">{{staff.job.title}}  <span v-if="staff.category">، {{staff.category.title}}</span></span>
        </span>

      </div>
      <div class="mt-2 data-list-box">
        <div class="w-75">
          <span>
             <i class="fas fa-map-marker-alt"></i>
                <span v-if="staff.province">
                  {{staff.province.title}}
                  <span v-if="staff.city">
                    , {{staff.city.title}}
                  </span>
                </span>
                <span v-if="!staff.province && !staff.city">
                  ------
                </span>
          </span>
        </div>
        <span class="link-list-resume"
          v-if="role === 'Company' &&
                        $store.getters['Site/Staff/companySendRequest'](staff.id , User.Company.id) ">
              <span style="color:#777">پیشنهاد داده شده</span>
              <span class="tick-icon-color">
                  <Icon type="md-checkmark"  class="sent-title-icon" />
              </span>
          </span>
        <nuxt-link v-else :to="`/resume/pdf/${staff.id}`" class="link-list-resume" >
          <span>ارسال پیشنهاد</span>
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
  props :  ['staff' , 'role'] ,
  methods :  {
    Goloign() {
      if(this.role === '') {
        this.$store.commit('Auth/redirect/SET_ROUTE', {
          route: {name: this.$route.fullPath}
        })
        this.$router.push({path: '/users/login-register/Company'})
      }
      else if(this.role === 'NOTMember')
        this.$router.push({path : '/register/member'})
      else if(this.role === 'NOTCompany')
        this.$router.push({path : '/register/company'})
    },
  },
  computed : {
    LoggedIN () {
      if(this.role !== '') {
        if ( this.role === 'Company' || this.role === 'Admin'  )
          return true
      }
      else return  false
    },
    User(){ return this.$store.state.User.User.User;},
  }
}
</script>

<style scoped>

</style>
