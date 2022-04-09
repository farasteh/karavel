<template>
  <div>
    <div class="container pt-md-4 p-0 px-md-3 res-dist">
      <div class="row m-auto pr-0 pl-0 py-3">
        <div class="col-12 col-lg-9">

            <Info :Advertising="Advertising" :LoggedIN="LoggedIN"
                  :contentLoading="contentLoading"
                  :Member="Member" :memberRole="memberRole"/>


          <similarAdvertisings :Advertisings="AdvertisingSimilar" :loading="similarLoading"
                               :User="Member" :role="memberRole"/>
        </div>
        <div class="col-12 col-lg-3 p-0 box-pad">
          <div style="position: sticky ; top: 85px">
            <client-only>
              <companyHeadBox :compLoading="contentLoading" :LoggedIN="LoggedIN"
                              :company="Advertising.Company" :memberRole="memberRole"/>
            </client-only>
            <client-only>
              <resumeSendBox :loading="contentLoading" :Member="Member" :memberRole="memberRole"
                             :adId="Advertising.id" :moneys="moneys"/>
            </client-only>
          </div>


        </div>
        <div class="col-12 res-similar">
          <div class="mt-3 mb-2" v-if="AdvertisingSimilar.length != 0">
            <h2 class="font-14">
              مشاغل مشابه استخدام آژانس هواپیمایی و مسافرتی
            </h2>
          </div>
          <hr v-if="AdvertisingSimilar.length != 0" class="hr-title">
          <div class="row" >
            <div class="col-12" v-if="similarLoading" >
              <div class="box-list-jobs karavel-box p-3 col-12" style="padding: 15px !important;">
                <!--                <Vcl-facebook rtl ></Vcl-facebook>-->
              </div>
            </div>

            <similarAdvertisingBox v-else  v-for="(List,index) in  AdvertisingSimilar " :key="index" :List="List" :User="Member" :index="index" :role="memberRole"></similarAdvertisingBox>
          </div>
        </div>
        <div class="mobile-send-resume" >
          <button @click="modalMobile = true" style="width:30%"
                  class="d-flex justify-content-center align-items-center text-light bottom-section-right font-12">
            ارتباط با آژانس
          </button>
<!--          <button v-if="!LoggedIN" style="width: 60%"-->
<!--                  class="d-flex justify-content-center align-items-center flex-column text-light position-relative p-1 font-12 bottom-section-left">-->
<!--            <div>-->
<!--              کارفرما :-->
<!--              <span class="disappeared-company">-->
<!--                                {{Advertising.Company.name_fa}}-->
<!--                            </span>-->
<!--            </div>-->
<!--            <div>-->
<!--              تلفن :-->
<!--              <span class="disappeared-company">-->
<!--                            {{Advertising.Company.phone}}-->
<!--                        </span>-->
<!--            </div>-->
<!--            <a title="برای مشاهده کارفرما وارد شوید">-->
<!--              <Icon @click="Gologin" type="ios-lock" class="lock-company" style="left: 10px;  bottom: 25%" />-->
<!--            </a>-->
<!--          </button>-->
          <button  @click="openAd" style="width: 60%"
                  class="d-flex justify-content-center align-items-center flex-column text-light p-1 font-12 bottom-section-left">
            <div>
              کارفرما :
              {{Advertising.Company.name_fa}}
            </div>
            <div>
              تلفن :
              {{Advertising.Company.phone}}
            </div>
          </button>

        </div>

      </div>
    </div>
    <Modal v-model="modalMobile" footer-hide>
      <client-only>
        <resumeSendBox :loading="contentLoading" :Member="Member" :memberRole="memberRole"
                       :adId="Advertising.id" :moneys="moneys"/>
      </client-only>

    </Modal>
  </div>
</template>
<script>

export default {
  name: 'JobsShow',

  props  : ['Advertising' , 'contentLoading' , 'AdvertisingSimilar',  'similarLoading'],

  data() {
    return {
      modalMobile: false,
    }
  },

  mounted() {
   //  this.$store.dispatch('Site/Advertising/LoadAdvertising', {id: this.$route.params.id})
   //    .then(response => {
   //      this.contentLoading = false
   //    });
   //  this.$store.dispatch('Site/Advertising/LoadAdvertisingSimilar', {id: this.$route.params.id})
   //    .then(response => {
   //      this.similarLoading = false
   //    })
    if(this.moneys.length == 0 )
      this.$store.dispatch('Money/LoadMoneyList')

  },
  //
  // beforeRouteUpdate(to, from, next){
  //   this.$store.dispatch('LoadAdvertising', {id: to.params.id})
  //     .then(response => {
  //       this.contentLoading = false
  //     });
  //   this.$store.dispatch('LoadAdvertisingSimilar', {id: to.params.id})
  //     .then(response => {
  //       this.similarLoading = false
  //     })
  //   next();
  // },
  computed: {
    pathName() {
      var namee = this.Advertising.Company.name_en
      if(namee) {
        namee = namee.toLowerCase()
        namee = namee.replace(/\s/g, '-')
        return this.Advertising.Company.id + '-' + namee
      }
    },
    Member() {return this.$store.state.User.User.User},
    // AdvertisingSimilar() {return this.$store.state.Site.Advertising.AdvertisingSimilar},
    memberRole() {return this.$store.getters['User/User/userRole']},
    moneys () {return this.$store.state.Money.MoneyList} ,
    LoggedIN () {
      if ( this.memberRole == '' || this.memberRole == 'NOTMember' || this.memberRole == 'NOTCompany'  )
        return false
      else return  true
    },

  },
  methods: {
    Gologin() {
      if ( this.memberRole == '') {
        this.$store.commit('Auth/redirect/SET_ROUTE' , {
          route : {name : this.$route.fullPath}
        })
        this.$router.push({path : '/users/login-register/Member' })
      }
      else if(this.memberRole == 'NOTMember')
        this.$router.push({path : '/register/member'})
      else if(this.memberRole == 'NOTCompany')
        this.$router.push({path : '/register/company'})
    },
    openAd() {
      let routeUrl = this.$router.resolve({path: `/company/${this.pathName}`});
      window.open(routeUrl.href, '_blank');
    },
  } ,
  watch  : {
    Advertising(){
      this.metaTitle = this.Advertising.title
      this.description = this.Advertising.comment
      //this.$store.commit('Auth/redirect/SET_ROUTE' ,   `/jobs/${this.Advertising.id}` )
    }
  }
}
</script>

