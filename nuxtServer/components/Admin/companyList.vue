<template>
  <div>
    <div class="row">
      <div class=" col-6 mb-2">
        <h2 style="font-weight: 600;font-size: 22px;">لیست شرکت ها  </h2>
      </div>
      <div class="col-12">
        <Input size="large" v-model="search" search enter-button placeholder="جستجو در عنوان شرکت ها" />
      </div>
    </div>
    <lodingCompanyLoading v-if="loading"/>
    <div>
      <div v-if="companies.length == 0 && loading == false">
        <div class="box-A karavel-box text-center text-danger">
          نتیجه ای یافت نشد
        </div>
      </div>
      <AdminCompany  v-for="(company,index) in companies" :key="index" :company="company" ></AdminCompany>
    </div>
  </div>
</template>
<script>

export default {
  name : 'companyList' ,
  data () {
    return {
      loading : false ,
      search : ''
    }
  },
  created() {
    // if(this.companies.length == 0 ) {
    this.loading = true
    this.$store.dispatch('Admin/Company/LoadAdminCompanies').then(response => {this.loading = false});
    //}

  },
  computed : {
    companies () { return this.$store.getters['Admin/Company/searchedCompanies'](this.search)}
  },
}
</script>

