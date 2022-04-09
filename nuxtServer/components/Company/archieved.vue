<template>
  <div>
    <div class="row">
      <div class="col-6">
        <h2 class="panel-title">لیست آگهی های غیر فعال </h2>
      </div>
      <div class="col-6">
        <Button class="col-md-6 col-8 karavel-btn" style="float: left;" type="primary"><nuxt-link to="/posts/create" style="color: #fff;" ><Icon style="font-size: 19px;font-weight: bold;" type="md-add" />ثبت آگهی</nuxt-link></Button>
      </div>
      <div class="col-md-2 mt-3">
        <Button @click="emptySelected()" :class="{ allBtnColored: all }" style="height: 50px">همه </Button>
      </div>
      <div class="col-12 col-md-5 mt-3" >
        <v-select
          class="style-chooser multi-style-chooser"
          placeholder="فیلتر بر اساس دسته بندی شغلی"
          label="title" :options="jobs"
          v-model="jobSelected"
          :searchable="false"
          :reduce="d => d.id"
          multiple
          taggable>
          <div slot="no-options">موردی یافت نشد !</div>
        </v-select>
      </div>
      <div class="col-12 col-md-5 mt-3" >
        <Input size="large" v-model="search" search enter-button placeholder="جستجو در عنوان آگهی" />
      </div>
    </div>
    <lodingCompanyLoading v-if="loading"/>
    <div>
      <div v-if="AdvertisingsBoxList.length == 0 && !loading">
        <div class="box-A karavel-box text-center text-danger" >
          نتیجه ای یافت نشد
        </div>

      </div>
      <CompanyArchieveBox v-for="(Advertisings,index) in AdvertisingsBoxList"
                        :key="index" :Advertisings="Advertisings">
      </CompanyArchieveBox>
    </div>
  </div>
</template>
<script>

import vSelect from 'vue-select'
import 'vue-select/dist/vue-select.css';

export default {
  components: { vSelect },
  data(){
    return {
      loading : false ,
      jobSelected :  [],
      fullPage: false  ,
      search : ''  ,
      all : true
    }
  },
  mounted() {
    //this.Authorized();
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
    this.$store.dispatch('Company/advertizing/LoadArchieveAdvertizing').then(res => {this.loading = false})
  } ,
  computed : {
    User(){ return this.$store.state.User.User.User;},
    jobs ()  {
      return this.$store.state.Company.Company.CompanyJobs;
    },
    AdvertisingsBoxList() { return  this.$store.getters['Company/advertizing/archieveSelectedJobsAds'](this.jobSelected , this.search)},

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
<style scoped>

.ivu-input-group-large .ivu-input  {
  height : 50px !important
}
.ivu-input-group-large  {
  height : 50px !important
}
.ivu-input-group-large .ivu-input, .ivu-input-group-large > .ivu-input-group-append, .ivu-input-group-large > .ivu-input-group-prepend{
  height : 50px !important
}

</style>

