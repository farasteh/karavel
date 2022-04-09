<template>
  <div class="rtl">
    <client-only>
      <AdminHeader></AdminHeader>
    </client-only>

    <div class="body-content body-content-marg">
      <div class="col-md-10 m-auto">
        <client-only>
          <Nuxt/>
        </client-only>

      </div>
    </div>
  </div>
</template>

<script>

export default {
  middleware: 'admin' ,
  head() {
    return {
      title: 'استخدام آژانس هواپیمایی و مسافرتی  - کاراول ',
    }
  },

}
</script>

<style>
.Vue-Toastification__container {
  width: auto !important;
}
.select2-container {
  height: 40px !important;
}
.select2-container--default .select2-selection--single{
  height: 40px !important;
  border-color: #dcdee2 !important;
}
.select2-container--default .select2-selection--single .select2-selection__rendered {
  line-height: 40px !important;
}
.select2-container--default .select2-selection--single .select2-selection__arrow {
  height: 40px !important;
  left: 1px !important;
}
.select2-container .select2-selection--single .select2-selection__rendered {
  padding-right: 8px !important;
  padding-left: 20px !important;
}
.vSelectRequired .select2-container--default .select2-selection--single{
  border-color: #ed4014 !important;
}
.select2-search {
  display: none !important;
}
.select2-results__option {
  direction: rtl;
}

@media only screen and (max-width: 466px) {
  .ress-benefits .ivu-checkbox-wrapper.ivu-checkbox-group-item{
    width: 50%;
    margin :  0 !important;
  }
}
</style>
