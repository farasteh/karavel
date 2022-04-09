<template>
  <div>
    <HeaderCompany :Company="Company" :loading="laoding"></HeaderCompany>
    <div class="col-12 col-md-8 m-auto">
      <div class="box-list-job karavel-box p-3" v-if="laoding">
        <lodingCompanyContentLoading></lodingCompanyContentLoading>
      </div>
      <div class="box-list-job karavel-box p-3" v-if="!laoding && Company.comment">
        <h5 style="font-size: 16px">معرفی شرکت</h5>
        <p class="text-right my-2">
          {{ Company.comment }}
        </p>
      </div>
      <div class="row">
        <div class="col-6">
          <div class="box-list-job karavel-box" v-if="laoding">
            <client-only>
              <lodingCompanyContentLoading></lodingCompanyContentLoading>
            </client-only>

          </div>
        </div>
        <div class="col-6">
          <div class="box-list-job karavel-box" v-if="laoding">
            <client-only>
              <lodingCompanyContentLoading></lodingCompanyContentLoading>
            </client-only>

          </div>
        </div>
        <div class="col-lg-6" v-if="!laoding">
          <div class="box-list-job karavel-box semi-company" v-if="Company.year || Company.Employee_count"  style="flex-direction: inherit">
            <div class="col-6" v-if="Company.year ">
              <h5 style="font-size: 16px"> سال تاسیس</h5>
              <p class="text-left my-2">
                {{ Company.year }}
              </p>
            </div>
            <div class="col-6" v-if="Company.Employee_count">
              <h5  style="font-size: 16px"> تعداد پرسنل </h5>
              <p class="text-right my-2">
                {{ Company.Employee_count }}
                نفر
              </p>
            </div>

          </div>
        </div>
        <div class="col-lg-6" v-if="!laoding">
          <div class="box-list-job karavel-box semi-company" v-if="Company.address_site || Company.Phone"  style="flex-direction: inherit">
            <div class="col-4" v-if="Company.Phone">
              <h5  style="font-size: 16px">  شماره تلفن </h5>
              <p class="text-left my-2">
                {{ Company.Phone }}
              </p>
            </div>
            <div class="col-8" v-if="Company.address_site">
              <h5 style="font-size: 16px">  آدرس سایت</h5>
              <p class="text-left my-2 " style="direction: ltr">
                <a :href="setLink" target="_blank"> {{ Company.address_site }} </a>
              </p>
            </div>
          </div>
        </div>

      </div>
      <div>
        <div class="my-4 mb-2">
          <h2 class="font-20">
             فرصت های شغلی در استخدام آژانس مسافرتی و هواپیمایی
          </h2>
          <hr class="hr-res" >
        </div>
        <advertisingBoxLoading v-if="laoding"></advertisingBoxLoading>

          <showCompanyAd v-else v-for="(List,index) in  Company.advertisings"
                         :key="index" :List="List" :User="User" :index="index">
          </showCompanyAd>

      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: "SiteShowJob",
 // middleware : 'ComapnyAuth' ,
  head() {
    return {
      title: `${this.Company.name_fa}-  استخدام آژانس مسافرتی و هواپیمایی  - کاراول - ` ,
      meta: [
        // hid is used as unique identifier. Do not use `vmid` for it as it will not work
        {
          hid: 'description',
          name: 'description',
          content: this.descReg
        }
      ]
    }
  },

  async fetch({store , route}) {
    let id = route.params.name.split('-')
      await store.dispatch('Site/company/LoadSiteCompany' , {id : id[0]})
  },

  data() {
    return {
      laoding : false ,
    }
  },
  mounted() {
    // this.laoding = true
    // let id = this.$route.params.name.split('-')
    // this.$store.dispatch('Site/company/LoadSiteCompany' , {id : id[0]}).then(response => {this.laoding = false});
  },
  computed: {
    Company() { return this.$store.state.Site.company.siteCompanies },
    User(){ return this.$store.state.User.User.User;},
    setLink() {
      if(this.Company.address_site) {
        if(this.Company.address_site.includes('https://' || 'http://'))
          return this.Company.address_site
        else
          return `http://${this.Company.address_site}`
      }
    },

    descReg() {
      var comment =  this.Company.comment
      if (comment != null)
      {
        var comment1 = comment.replace(/(<([^>]+)>)/ig, "")
        return  comment1.replace(/\&nbsp;/g, "") + 'استخدام آژانس مسافرتی و هواپیمایی - ';
      }

      return  'استخدام آژانس مسافرتی و هواپیمایی'
    }
  },
}
</script>
<style scoped>
.hr-res  {
  position: relative;
  width: 40%;
  right: 60%;
  color: #000;
  bottom: 25px;
}
.semi-company div:first-child::before
{
  content: "";
  position: absolute;
  left: 10px;
  z-index: 100;
  top: 15%;
  width: 1px;
  height: 70%;
  background: #c6c6c678;
}
.box-list-job {
  padding: 15px 0;
  margin-top: 25px !important;
}
@media screen and (max-width: 992px) {

  .hr-res  {
    display: none;
  }
}
@media screen and (max-width: 759px) {
  .v-navigation-drawer__content {
    right: -264px;
  }

  .btn-menu-re {
    display: flex !important;
  }
  .hr-res  {
    display: none;
  }
}
</style>
