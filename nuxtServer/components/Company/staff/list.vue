<template>
  <div class="container-fluid">
    <div class="row">
      <div class="col-12" v-if="loading">
        <lodingSkillLoading class="box-A karavel-box p-2"></lodingSkillLoading>
      </div>
      <div class="col-12" v-else>
        <div class="box-list-jobs-info mt-2" v-if="staffs.length === 0">
          <p class="p-3 text-center" >
            شما تا به حال برای هیچ کارجویی پیشنهاد ارسال نکرده اید.
            <br>
            برای اینکار
            <nuxt-link to="/staff">
              اینجا را کلیک کرده
            </nuxt-link>
            و پیشنهاد خود را ارسال کنید.
          </p>
        </div>
        <div v-else  class="box-A karavel-box my-2" v-for="(staff , index ) in staffs" :key="index">
          <div class="d-flex align-items-center justify-content-center flex-wrap row text-center">
            <div class="col-md-3 col-sm-6">
                <h5>
                  {{ staff.name}}-{{ staff.last_name}}
                </h5>
           </div>
            <div class="col-md-2 col-sm-6">
              <p class="py-2">
                <span v-if="staff.province">{{staff.province.title}}</span>
                <span v-if="staff.city">,{{staff.city.title}}</span>
              </p>
            </div>
            <div class="col-md-2 col-sm-6">
              <p class="py-2">
                ارسال شده در تاریخ
                {{staff.craeted}}
              </p>
            </div>
            <div class="col-md-3 col-sm-6">
              <p class="py-2">
                <span class="mr-1" v-if="staff.job">{{ staff.job.title }} </span><span v-if="staff.category">,{{staff.category.title}}</span>
              </p>
            </div>
            <div class="col-md-2 col-sm-6">
              <nuxt-link :to="`/resume/pdf/${staff.id}`" target="_blank" class="btn btn-link">صفحه رزومه </nuxt-link>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default  {
    name : 'company-staff-list',
    data(){
      return{
        loading : false ,
      }
    },
    created() {
      this.loading = true
      this.$store.dispatch('Company/staff/LoadCompanyStaff')
        .then(response=> {
          this.loading = false
        })
    } ,
    computed :{
      staffs () {
        return this.$store.state.Company.staff.staffList
      }
    }

  }
</script>
