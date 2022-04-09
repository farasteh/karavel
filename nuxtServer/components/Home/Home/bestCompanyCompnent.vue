<template>
  <div class="mt-3">
    <div class="container">
      <div class="col-12 jobs-home-box position-relative" style="padding: 10px !important;">
         <h2 class="place-search dPlay">
               فرصت های بهتر استخدام آژانس مسافرتی و هواپیمایی
         </h2>

        <div class="row" v-if="noticeLoading">
          <div class="col-6 col-md-2" v-for="index in 6">
            <notice-loading/>
          </div>
        </div>
        <div class="row" v-else>
          <HomeHomeCompany-ad class="col-6 col-md-2 my-2" v-for="(company , index) in companies"
                      :key="index" :company="company" :loading="noticeLoading"/>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default  {
    name : 'bestCompanyCompnent'  ,
    props : ['noticeLoading' , 'companies']
  }
</script>
