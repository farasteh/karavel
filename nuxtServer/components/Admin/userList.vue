<template>
  <div>
    <div class="row">
      <div class=" col-6 mb-2">
        <h2 style="font-weight: 600;font-size: 22px;">لیست کاربران</h2>
      </div>
      <div class="col-6"></div>

      <div class=" col-md-2 my-3">
        <Button @click="emptySelected()" :class="{ allBtnColored: all }" style="height: 42px">همه </Button>
      </div>
      <div class="col-12 col-md-5 my-3" >
        <v-select
          class="style-chooser multi-style-chooser"
          placeholder="فیلتر بر اساس دسته بندی شغلی"
          label="title" :options="jobs"
          v-model="jobSelected"
          :reduce="d => d.id"
          :searchable="false"
          @input="JobCategoryList()"
          taggable>
          <div slot="no-options">موردی یافت نشد !</div>
        </v-select>
      </div>
      <div class="col-12 col-md-5 my-3" >
        <v-select
          class="style-chooser multi-style-chooser"
          placeholder="فیلتر بر اساس دسته بندی شغلی"
          label="title" :options="jobCategories"
          v-model="jobCatSelected"
          @input="filteredAdvertisings()"
          :reduce="d => d.id"
          :searchable="false"
          taggable>
          <div slot="no-options">موردی یافت نشد !</div>
        </v-select>
      </div>

      <div class="bottom-message"></div>
      <div class="col-12  table-responsive">
        <table class="table text-center table-striped ">
          <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">نام کاربر</th>
            <th scope="col"> تخصص </th>
            <th scope="col"> تاریخ عضویت</th>
            <th scope="col"> استان </th>
            <th scope="col">جزییات</th>
          </tr>
          </thead>
          <tbody style="background: #fff;">
          <AdminUser v-for="(user , index) in filteredData" :key="index" :user="user" :index="index"> </AdminUser>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>
<script>

import user from "./user";
import vSelect from 'vue-select'


export default {
  name : 'usersLists',
  components:{ user  ,  vSelect},
  data(){
    return {
      jobSelected : '' ,
      jobCatSelected : '' ,
      filteredData : '',
      all : true
    };
  },
  created() {
    if(this.Users.length == 0 )
      this.$store.dispatch('Admin/user/baseResumes/LoadBaseresumeUsers')
    if(this.jobs.length == 0) {
      this.showJob = true
      this.$store.dispatch('Jobs/LoadAdJobs').then(response =>  { this.showJob = false})
    }
  },
  computed:{
    Users(){return  this.$store.state.Admin.user.baseResumes.baseResumesUsers} ,
    jobs() {
      return this.$store.state.Jobs.adJobs
    },
    jobCategories() { return  this.$store.getters['Jobs/getAdJobcategory'](this.jobSelected) } ,
  },
  watch : {
    Users() {
      this.filteredData  = this.Users
    }
  },
  methods:{
    JobCategoryList() {
      this.jobCatSelected = ''
      this.filteredAdvertisings()
    },

    filteredAdvertisings () {
      this.all = false
      this.filteredData = this.Users

      if(this.jobSelected)
        this.filteredData = this.filteredData.filter(user => user.job.id == this.jobSelected)
      if(this.jobCatSelected) {
        this.filteredData = this.filteredData.filter(user => user.category_job.id == this.jobCatSelected)
      }
    },
    emptySelected() {
      this.jobCatSelected = ''
      this.jobSelected = ''
      this.all = true
      this.filteredData = this.Users
    }
  }
}
</script>
<style>
</style>
