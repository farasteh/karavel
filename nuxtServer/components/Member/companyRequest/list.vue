<template>
  <div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-6">
          <h2 class="panel-title font-15">پیشنهاد های کاری شما</h2>
        </div>
        <div class="col-12" v-if="loading">
          <lodingSkillLoading class="box-A karavel-box p-2"></lodingSkillLoading>
        </div>
        <div class="col-12" v-else>
          <div class="box-list-jobs-info mt-2" v-if="companies.length == 0">
            <p class="p-3 text-center">
              هیچ کارفرمایی برای شما پیشنهاد کاری ارسال نکرده است.
            </p>
          </div>
          <div v-else  class="box-A karavel-box my-2" v-for="(company , index ) in companies" :key="index">
            <div class="d-flex align-items-center justify-content-center flex-wrap row text-center">
              <div class="col-md-3 col-sm-6">
                  <h5>
                    {{ company.user}}
                  </h5>
              </div>
              <div class="col-md-3 col-sm-6">
                <p class="py-2">
                  توسط شرکت
                  <span>{{ company.name}}</span>
                  در تاریخ
                  <span>{{ company.craeted }}</span>
                </p>
              </div>
              <div class="col-md-3 col-sm-6">
                <p class="py-2">
                  تلفن :
                  <span class="mr-1">{{ company.phone }}</span>
                </p>
              </div>
              <div class="col-md-3 col-sm-6">
                <nuxt-link :to="`/company/${company.id}`" target="_blank" type="button" class="btn btn-link">صفحه آژانس</nuxt-link>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>


  export default {
    name :'company-request-list',
    data() {
      return {
        loading : false ,
      }
    },
    created() {
      this.loading = true
      this.$store.dispatch('Member/Requests/company/LoadMemberCompanylist')
        .then(res => {
          this.loading = false
        })
    },
    computed: {
      companies () {
        return this.$store.state.Member.Requests.company.memberCompanyList
      }
    }
  }
</script>
