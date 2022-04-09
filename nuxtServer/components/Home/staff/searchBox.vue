<template>

  <section class="box-header-home">
    <div class="box-search-header">
      <h1 class="home-title w-100 text-center">لیست کارمندان آژانس هواپیمایی و مسافرتی</h1>
      <div class="container row m-auto d-flex justify-content-center">
        <div class="col-lg-10 row">
          <div class="col-12 col-lg-4 col-md-4 col-sm-6 py-0 px-1 mt-1">
            <v-select
              :class="{ vselectHide  : showJob , vSelectRequired  :  $v.form.Job.$error }"
              class="style-chooser"
              placeholder="دسته بندی شغلی کارمند"
              label="title" :options="jobs"
              @input="JobCategoryList()"
              v-model="form.Job"
              :reduce="d => d.id" taggable>
              <div slot="no-options">موردی یافت نشد !</div>
            </v-select>
            <span class="place-search" :class="{ dPlay: job }">دسته بندی شغلی</span>
          </div>
          <div class="col-12 col-lg-4 col-md-4 col-sm-6 py-0 px-1 mt-1">
            <v-select
              :class="{ vselectHide  : showJob , vSelectRequired  :  $v.form.Job1.$error }"
              class="style-chooser"
              placeholder="زیرمجموعه شغلی کارمند"
              label="title" :options="jobCategories"
              @input="WorkCategoryList()"
              v-model="form.Job1"
              :reduce="d => d.id" taggable>
              <div slot="no-options">موردی یافت نشد !</div>
            </v-select>
            <span class="place-search" :class="{ dPlay: job2 }"> زیرمجموعه شغلی</span>
          </div>
          <div class="col-12 col-lg-4 col-md-4 col-sm-6 py-0 px-1 mt-1 mx-auto">
            <v-select
              :class="{ vselectHide  : showProvince  , vSelectRequired  :  $v.form.province.$error}"
              class="style-chooser"
              placeholder="محل اقامت کارمند"
              label="title" :options="ProvincesList"
              v-model="form.province"
              :reduce="d => d.id"
              @input="province = true"
              taggable>
              <div slot="no-options">موردی یافت نشد !</div>
            </v-select>
            <span class="place-search" :class="{ dPlay: province }">استان</span>
          </div>
        </div>
        <div class="col-lg-2 mt-1 p-lg-0">
          <Button class="w-100 karavel-btn" @click="SearchJob" style="height: 50px;" size="large" type="primary">
            <span v-if="!loadingB">جستجوی شغل</span>
            <span v-else>
                <LoadingButton  :loading="loadingB" />
            </span>
          </Button>
        </div>
      </div>
    </div>
  </section>

</template>

<script>

import vSelect from 'vue-select'
import 'vue-select/dist/vue-select.css';
import {required} from 'vuelidate/lib/validators';

export default {
  components : { vSelect } ,
  data () {
    return {
      showJob  : false ,
      showProvince :  false ,
      loadingB: false,
      job : false,
      job2 : false,
      province : false,
      form :  {
        Job : '',
        Job1: '' ,
        province : null
      }
    }
  },
  validations: {
    form :  {
      Job : {required},
      Job1: {required} ,
      province : {required}
    }
  },
  created() {
    if(Object.keys(this.$route.query).length != 0 )
    {
      if(this.$route.query.job1 != '')
      {
        this.form.Job = parseInt(this.$route.query.job1)
        this.job = true
      }
      if(this.form.Job)
      {
        if(this.$route.query.job2 != '')
        {
          this.form.Job1 = parseInt(this.$route.query.job2)
          this.job2 = true
        }
      }
      if (this.$route.query.province != '')
      {
        this.form.province = parseInt(this.$route.query.province)
        this.province = true
      }

      this.$store.commit('Site/Staff/SET_STAFF_SEARCH_FORM' , this.form )
    }
    else {
      let nullForm =  {
        Job : '',
        Job1: '' ,
        province : ''
      }
      this.$store.commit('Site/Staff/SET_STAFF_SEARCH_FORM' , nullForm )
    }
  },
  mounted() {
    if(this.jobs.length == 0) {
      this.showJob = true
      this.$store.dispatch('Jobs/LoadAdJobs').then(response =>  { this.showJob = false})
    }
    if(this.ProvincesList.length < 2){
      this.showProvince = true
      this.$store.dispatch('Map/Province/LoadProvinces').then(response => { this.showProvince = false})
    }
  },
  computed :{
    jobs() {
      var jobs  = this.$store.state.Jobs.adJobs
      let job = jobs.find( x => x.id == 1)
      if(job) {
        let index = jobs.indexOf(job)
        jobs.splice(index  , 1)
      }
      return jobs;
    },
    jobCategories() { return  this.$store.getters['Jobs/getAdJobcategory'](this.form.Job) } ,
    ProvincesList() {return   this.$store.state.Map.Province.provinces},
    searchParam() { return this.$store.state.Site.Staff.form} ,
  },
  methods: {
    JobCategoryList() {
      this.form.Job1 = ''
      this.job2 = false
      this.job = true
    },
    WorkCategoryList() {
      this.$emit('cat')
      this.job2 = true
    },
    SearchJob(){
      if (this.$v.$invalid) {
        this.$v.$touch()
      }
      else {
        this.loadingB = true;
        this.$store.commit('Site/Staff/SET_STAFF_SEARCH_FORM' , this.form )
        this.$store.dispatch('Site/Staff/LoadStaffList'  , this.searchParam ).then(response => {this.loadingB = false;});
        this.$router.replace(`/staff/search?job1=${this.searchParam.Job}&job2=${this.searchParam.Job1}&province=${this.searchParam.province}`).catch(() => {});
      }
    },
  }
}
</script>
<style scoped>
.dPlay {
  display:  block !important;
}
.place-search{
  display: none;
  position: absolute;
  top: -10px;
  right: 10px;
  color: #909195;
  font-size: 10px;
  background: #fff;
  border-radius: 3px;
  padding: 0 5px;
}
.vSelectRequired .vs__dropdown-toggle {
  border-color: red;
}
.vselectHide .vs__selected {
  visibility: hidden;
}

.box-header-home{
  background-image: url("~/assets/images/Header.jpg");
  background-size: cover;
  box-shadow: inset 0 0 90px -20px rgba(12, 13, 13, 0.9);
  background-position: center;
}
.box-search-header{
  height: 145px;
  color: #fff;
  font-size: 18px;
  display: flex !important;
  align-items: center !important;
  justify-content: center;
  flex-wrap: wrap
}
.v-select.style-chooser {
  background: #fff;
  border-radius: 4px;
  height: 50px;
  line-height: 50px;
  font-size: 14px;
}
.vs__dropdown-menu  {
  direction: rtl !important;
}
#vs3__combobox.vs__dropdown-toggle {
  border: none !important;
}
.v-select.style-chooser .vs__dropdown-toggle {
  height: 50px !important;
}
.style-chooser .vs__selected-options  {
  visibility: hidden !important;
}
.vs__dropdown-toggle {
  min-height: 50px !important;
  background: #fff;
}
@media screen and (max-width: 990px) {
  .box-search-header  {
    height: 210px;
  }
}
@media screen and (max-width: 576px){
  .box-search-header {
    height: 340px;
  }
}
.home-title {
  font-size: 18px;
  position: relative;
  top: 15px;
}
</style>
