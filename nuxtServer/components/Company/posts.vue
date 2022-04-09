<template>
  <div>
    <div class="row">
      <div class="col-6">
        <h2 class="panel-title">لیست آگهی&zwnj;های فعال شما</h2>
      </div>
      <div class="col-6">
        <Button type="primary" class="col-md-6 col-8 karavel-btn float-left">
          <nuxt-link to="/posts/create" class="text-white">
            <Icon class="font-17 font-weight-bold" type="md-add" />ثبت آگهی
          </nuxt-link>
        </Button>
      </div>
<!--      <div class=" col-md-2 mt-3">-->
<!--        <Button class="w-100" @click="emptySelected()" :class="{ allBtnColored: all }" style="height: 42px">همه </Button>-->
<!--      </div>-->
      <div class="col-12 mt-3" >
        <v-select
          class="style-chooser multi-style-chooser"
          placeholder="آگهی های شما براساس دسته بندی شغلی"
          label="title" :options="jobs"
          v-model="jobSelected"
          :reduce="d => d.id"
          multiple
          :searchable="false"
          taggable>
          <div slot="no-options">موردی یافت نشد !</div>
        </v-select>
      </div>
<!--      <div class="col-12 col-md-5 mt-3" >-->
<!--        <Input class="search-ads karavel-btn" size="large" v-model="search" search enter-button placeholder="جستجو در عنوان آگهی" />-->
<!--      </div>-->
    </div>
    <company-loading v-if="loading"/>
    <div class="row">
      <div v-if="AdvertisingsBoxList.length == 0 && !loading">
        <div class="box-A karavel-box text-center text-danger" >
          نتیجه ای یافت نشد
        </div>
      </div>
      <company-advertising-box
        v-for="(advertising , index) in AdvertisingsBoxList"
              :key="'A'+ index"
              :advertising="advertising"
              :statusList="statusList"/>
    </div>
  </div>
</template>
<script>

import vSelect from 'vue-select'
import CompanyLoading from "../loding/companyLoading";
import CompanyAdvertisingBox from "./advertisings-box";

export default {
  components: {CompanyAdvertisingBox, CompanyLoading,  vSelect },
  name: 'DashboardCompany',
  data(){
    return {
      loading : false ,
      jobSelected :  [],
      fullPage: false  ,
      search : ''  ,
      all : true
    }
  },
  methods: {
    emptySelected () {
      this.jobSelected = []
      this.search = ''
      this.all = true
    }

  },
  created() {
    this.loading = true
    //this.$store.dispatch('LoadUser')
    if(this.statusList.length == 0 )
      this.$store.dispatch('Company/resumeStatus/LoadStatus');
    this.$store.dispatch('Company/advertizing/LoadCompanyAdvertizing')
      .then(res => {
        this.loading = false
      })
  } ,
  computed : {
    User(){ return this.$store.state.User.User.User;},
    jobs ()  {
      return this.$store.state.Company.Company.CompanyJobs;
    },
    statusList() { return this.$store.state.Company.resumeStatus.statusList} ,
    AdvertisingsBoxList() { return  this.$store.getters['Company/advertizing/selectedJobsAds'](this.jobSelected , this.search)},
  } ,
  watch :{
    User () {
      this.$store.dispatch('Company/Company/loadCompanyJobs' , {id : this.User.Company.id})
    } ,
    jobSelected () {
      if(this.jobSelected.length != 0 )
        this.all = false
      if(this.jobSelected.length == 0 && this.search == '' )
        this.all = true

    } ,
    search() {
      if(this.search != '')
        this.all = false
      if(this.jobSelected.length == 0 && this.search == '' )
        this.all = true
    }
  }

}
</script>
<style>
.allBtnColored {
  background: var(--var-background-color) !important;
  border-color: var(--var-background-color) !important;
  color: #fff !important;
}
.ivu-input {

  border-radius: 0px 4px 4px 0px !important;
}
.ivu-input-group-append, .ivu-input-group > .ivu-input:last-child {
  border-bottom-left-radius: 4px !important;
  border-top-left-radius: 4px !important;
}
.ivu-input-search::before {

  right: -1px !important;
  background: inherit;
}
.ivu-input-group-append, .ivu-input-group-prepend {

  border-radius: 4px 0px 0px 4px !important;
}
.box-A{
  padding: 15px;
  margin-top: 16px!important;
}

.box-icon{
  font-size: 18px;
  margin-left: 10px;
  color: #908d8d;
}
.box-show{
  padding: 10px;
  cursor: pointer;
}

.vld-icon svg {
  stroke: #2d8cf0 !important;
}
.panel-title{
  font-weight: 600;
  font-size: 22px;
}

@media only screen and (max-width: 486px) {
  .panel-title{
    font-weight: 600;
    font-size: 15px;
  }
}
</style>

