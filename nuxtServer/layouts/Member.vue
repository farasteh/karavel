<template>
  <div class="rtl">
    <div>
      <client-only>
        <MemberHeaderMember></MemberHeaderMember>
      </client-only>

    </div>
    <div class="body-content body-content-marg">
      <div class="col-md-11 m-auto">
        <client-only>
          <Nuxt />
        </client-only>

      </div>
    </div>
  </div>
</template>

<script>

export default {
  name : 'member',
  middleware: 'member' ,
  head() {
    return {
      title: 'استخدام آژانس مسافرتی و هواپیمایی - کاراول ',
      meta: [
        { name: 'viewport', content: "width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" }]
    }
  },

}
</script>

<style>
.Vue-Toastification__container {
  width: auto !important;
}
.vSelectRequired .vs__dropdown-toggle {
  border-color: red;
}
.vselectHide .vs__selected {
  visibility: hidden;
}
.body-content-marg {
  margin-top: 69px;
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
@media only screen and (max-width: 760px) {
  .body-content-marg {
    margin-top: 90px;
  }
}
</style>
