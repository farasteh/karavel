<template>
  <div class="rtl">
    <div>
      <client-only>
        <CompanyHeader></CompanyHeader>
      </client-only>

    </div>
    <div  class="body-content body-content-marg">
      <div class="col-md-10  m-auto">
        <client-only>
          <Nuxt/>
        </client-only>
      </div>
    </div>
  </div>
</template>

<script>

export default {

  head() {
    return {
      title: 'استخدام آژانس مسافرتی و هواپیمایی  - کاراول ',
    }
  },
  middleware: 'company' ,
}
</script>
<style>
.disable-contact .ivu-card-head p i.ivu-icon-md-information-circle {
  color: #e3342f !important;
}
.disable-contact .ivu-switch {
  width: 70px !important;
}
.disable-contact .ivu-switch-large.ivu-switch-checked::after {
  left: 45px;
}
.ivu-btn {

  width: 100%;
}
.ivu-upload-select {
  width: 100%;
}
.ivu-col-span-12 {
  width: 100% !important;
}

.ivu-form .ivu-form-item-label {
  float: right !important;
  font-size: 15px !important;
}
.ivu-form-item-error-tip {
  left: inherit !important;
}

.banner-preview img{
  width : 100% ;
  height : 124px
}
.delete-banner {
  font-size :  27px;
}
element {

}
.ivu-form .ivu-form-item-label {

  text-align: right;
  vertical-align: middle;
  float: left;
  font-size: 12px;
  color: #515a6e;
  line-height: 1;
  padding: 10px 12px 10px 0;
  box-sizing: border-box;

}
.ivu-form .ivu-form-item-label {

  color: #949494 !important;

}
.ivu-select-arrow {
  right: inherit !important;
  left: 8px !important;
}
button {
  outline: none !important;
  border: none;
  background: transparent;
}
.ivu-select-multiple .ivu-select-item-selected::after {
  left: inherit !important;
  right: 4px !important;
}

.vSelectRequired .vs__dropdown-toggle {
  border-color: red;
}
.vselectHide .vs__selected {
  visibility: hidden;
}
.Vue-Toastification__container {
  width: auto !important;
}
.select2-container {
  height: 50px !important;
}
.select2-container--default .select2-selection--single{
  height: 50px !important;
  border-color: #dcdee2 !important;
}
.select2-container--default .select2-selection--single .select2-selection__rendered {
  line-height: 50px !important;
}
.select2-container--default .select2-selection--single .select2-selection__arrow {
  height: 50px !important;
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
.ivu-select-arrow {
  right: inherit !important;
  left: 8px !important;
}
@media only screen and (max-width: 466px) {
  .ress-benefits .ivu-checkbox-wrapper.ivu-checkbox-group-item{
    width: 50%;
    margin :  0 !important;
  }
}
</style>
