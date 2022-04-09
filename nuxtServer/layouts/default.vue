<template>

  <div>
    <div>
      <HomePageHeader/>
    </div>
    <div style="margin-top: 59px;"  class="">
      <div style="margin: auto;" class="">
        <Nuxt />
      </div>
    </div>
    <div class="mt-4">
      <HomePageFooter/>
    </div>
  </div>
</template>

<script>
  export  default  {
    name : 'default' ,

  }
</script>

<style>
html {
  font-family:
    'Source Sans Pro',
    -apple-system,
    BlinkMacSystemFont,
    'Segoe UI',
    Roboto,
    'Helvetica Neue',
    Arial,
    sans-serif;
  font-size: 16px;
  word-spacing: 1px;
  -ms-text-size-adjust: 100%;
  -webkit-text-size-adjust: 100%;
  -moz-osx-font-smoothing: grayscale;
  -webkit-font-smoothing: antialiased;
  box-sizing: border-box;
}

*,
*::before,
*::after {
  box-sizing: border-box;
  margin: 0;
}

.button--green {
  display: inline-block;
  border-radius: 4px;
  border: 1px solid #3b8070;
  color: #3b8070;
  text-decoration: none;
  padding: 10px 30px;
}

.button--green:hover {
  color: #fff;
  background-color: #3b8070;
}

.button--grey {
  display: inline-block;
  border-radius: 4px;
  border: 1px solid #35495e;
  color: #35495e;
  text-decoration: none;
  padding: 10px 30px;
  margin-left: 15px;
}

.button--grey:hover {
  color: #fff;
  background-color: #35495e;
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
.img-karjo-karfarma {
  max-width: 400px;
  height: 300px;
}
.img-karjo-karfarma img  {
  width: 100%;
  height: 100%;
  object-fit: contain;
}
.karjo-karfarma-desc-box {
  min-height: 220px;
}
.job-banner-top {


  background: #ee0920;

}

.jobs-home-box-ad {
  background: #fff;
  box-shadow: 0 0px 8px 5px rgba(0, 0, 0, 0.05);
  border-radius: 5px;
  border: 1px solid #ccc;
}
@media screen and (max-width: 992px) {
  .job-banner-top img {
    height:60px;
  }
}
@media screen and (max-width: 817px) and (min-width: 768px){
  .karjo-karfarma-desc-box {
    min-height: 240px;
  }
}


.vSelectRequired .vs__dropdown-toggle {
  border-color: red;
}
.ivu-tooltip {
  width: 100%;
}
.ivu-tooltip-inner {

  color: #fff;
  text-align: right !important;
}
.ivu-tooltip input:focus + .ivu-tooltip-popper {
  background-color: yellow;
}
.ck.ck-editor {
  width: 100%;
}
.ck-editor__editable {
  min-height: 200px;
  min-width: 100%;
}
.ck-rounded-corners .ck.ck-editor__top .ck-sticky-panel .ck-toolbar, .ck.ck-editor__top .ck-sticky-panel .ck-toolbar.ck-rounded-corners {
  width: 100%;
}
.vue-tags-input[data-v-61d92e31] {
  max-width: 100%  !important;
}
input[data-v-61d92e31] {
  width: 100%  !important;

}
.ti-input[data-v-61d92e31]{
  width: 100%  !important;

}
.vue-tags-input .ti-tag.custom-class {
  background: transparent;
  border: 1px solid #ebde6e;
  color: #ebde6e;
  margin-right: 4px;
  border-radius: 0px;
  font-size: 13px;
}
/* style the background and the text color of the input ... */
.vue-tags-input {
  background: #324652;
}

.vue-tags-input .ti-new-tag-input {
  background: transparent;
  color: #515a6e;
}

.vue-tags-input .ti-input {
  padding: 4px 10px;
  transition: border-bottom 200ms ease;
}

/* we cange the border color if the user focuses the input */
.vue-tags-input.ti-focus .ti-input {
  border: 1px solid #cacdd1;
}

/* some stylings for the autocomplete layer */
.vue-tags-input .ti-autocomplete {
  background: #fff;
  border: 1px solid #8b9396;
  border-top: none;
  border: 0;
  box-shadow: 2px 2px 1px 0px #ccc;
}

/* the selected item in the autocomplete layer, should be highlighted */
.vue-tags-input .ti-item.ti-selected-item {
  background: #f0faff;
  color: #2d8cf0;
}

/* style the placeholders color across all browser */
.vue-tags-input ::-webkit-input-placeholder {
  color: #a4b1b6;
}

.vue-tags-input ::-moz-placeholder {
  color: #a4b1b6;
}

.vue-tags-input :-ms-input-placeholder {
  color: #a4b1b6;
}

.vue-tags-input :-moz-placeholder {
  color: #a4b1b6;
}

/* default styles for all the tags */
.vue-tags-input .ti-tag {
  position: relative;
  background: #1e88e5;
  color: #fff;
  font-size: 14px;
}

/* we defined a custom css class in the data model, now we are using it to style the tag */
.vue-tags-input .ti-tag.custom-class {
  background: transparent;
  border: 1px solid #ebde6e;
  color: #ebde6e;
  margin-right: 4px;
  border-radius: 0px;
  font-size: 13px;
}

/* the styles if a tag is invalid */
.vue-tags-input .ti-tag.ti-invalid {
  background-color: #e88a74;
}

/* if the user input is invalid, the input color should be red */
.vue-tags-input .ti-new-tag-input.ti-invalid {
  color: #e88a74;
}

/* if a tag or the user input is a duplicate, it should be crossed out */
.vue-tags-input .ti-duplicate span,
.vue-tags-input .ti-new-tag-input.ti-duplicate {
  text-decoration: line-through;
}

/* if the user presses backspace, the complete tag should be crossed out, to mark it for deletion */
.vue-tags-input .ti-tag:after {
  transition: transform .2s;
  position: absolute;
  content: '';
  height: 2px;
  width: 108%;
  left: -4%;
  top: calc(50% - 1px);
  background-color: #000;
  transform: scaleX(0);
}

.vue-tags-input .ti-deletion-mark:after {
  transform: scaleX(1);
}

.ivu-select-multiple .ivu-select-selection {
  padding: 0 4px 0 4px !important;
}
.v-select {
  direction: rtl;
}
#vs1__listbox{
  direction: rtl !important;
  text-align : right !important;
}
.vs__dropdown-toggle{
  height: 50px !important;
}
.vs__dropdown-option--highlight {
  background: #f3f3f3 !important;
  color  :#2d8cf0 !important
}
.style-chooser .vs__search::placeholder,
.style-chooser .vs__dropdown-toggle,
.style-chooser .vs__dropdown-menu {

  direction: rtl !important;
  text-align : right !important;
}
.ivu-checkbox-input {
  position: absolute !important;
}
.vs__clear {
  display: none;
}

.style-chooser .vs__open-indicator  {
  transform: scale(.7) ;
}
.style-chooser.vs--open .vs__open-indicator  {
  transform: rotate(180deg) scale(.7) !important;
}
.style-chooser .vs__actions {
  padding: 4px 7px 0px 7px !important;
}
.v-select.multi-style-chooser .vs__dropdown-toggle {
  min-height: 50px !important;
  background: #fff;
  height: auto !important;
}
.vs--searchable .vs__dropdown-toggle {
  cursor: pointer !important;
}
.ivu-input-group-large .ivu-input, .ivu-input-group-large > .ivu-input-group-append, .ivu-input-group-large > .ivu-input-group-prepend{
  height : 50px !important
}
.ivu-input-with-suffix {
  height : 50px !important
}
.ivu-input-suffix {
  line-height : 40px !important
}
.ivu-checkbox-wrapper.ivu-checkbox-group-item {
  margin: 0 10px !important;
}

.vselect-style ul{
  max-width:100% !important;
}
.major-input .ivu-input {
  height: 50px !important;
}
.search-ads .ivu-input-search  {
  background: var(--var-background-color) !important;
  border-color: var(--var-background-color) !important;
}
.ivu-select-large .ivu-select-item {
  padding: 7px 25px  16px 8px !important;
}
.lump-icon  {
  color: #e3e320;
  font-size: 16px;
  font-weight: bold;
  margin-left: 5px;
}
.tooltip-icon {
  margin-left: 8px;
  font-size: 10px;
  margin-right: 3px;
  color: #eee;
}
.date-picker{-webkit-box-orient:vertical;-ms-flex-direction:column;flex-direction:column}.date-picker,.date-picker__row,.weekday__row{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-direction:normal}.date-picker__row,.weekday__row{-webkit-box-orient:horizontal;-ms-flex-direction:row;flex-direction:row}.weekday__row{margin-bottom:10px}.date-picker__cell,.weekday__cell{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-orient:horizontal;-webkit-box-direction:normal;-ms-flex-direction:row;flex-direction:row;-webkit-box-flex:1;-ms-flex:1;flex:1;-webkit-box-align:center;-ms-flex-align:center;align-items:center;-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center}.date-picker__header{display:-webkit-box;display:-ms-flexbox;display:flex;margin-bottom:10px}.date-picker__month-header,.date-picker__year-header{-webkit-box-flex:1;-ms-flex:1;flex:1}.date-picker__day{cursor:default;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none}.date-picker__day--next,.date-picker__day--previous{opacity:.4}.date-picker__day--disabled{opacity:.1}.date-picker__cell--selected{background:#eee}.date-picker__days,.date-picker__months,.date-picker__years{margin-bottom:10px}.date-picker__month-button,.date-picker__year-button{width:100%;margin-bottom:3px}.text-slider__value{text-align:center}.time-picker{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-orient:horizontal;-webkit-box-direction:normal;-ms-flex-direction:row;flex-direction:row;-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center;-webkit-box-sizing:border-box;box-sizing:border-box}.datetime-picker{position:relative}.datetime-picker-main{position:absolute;z-index:1}.datetime-picker-inline,.datetime-picker-main{width:320px;background:#fff;-webkit-box-sizing:border-box;box-sizing:border-box;padding:10px;border:1px solid grey}.datetime-picker-inline{position:relative}.datetime-picker-inline--disabled{opacity:.7}.datetime-picker-inline--disabled:before{content:"";display:block;position:absolute;top:0;right:0;left:0;bottom:0}.time-picker__button{width:100%}.date-picker__button{width:100%;margin-bottom:10px}.clear__button,.close__button,.today__button{width:100%;margin-top:10px}

.datetime-picker {
  width: 100%;
  display: flex;
  border: 1px solid #ccc;
  height: 50px;
  border-radius: 3px;
  padding: 0 15px;
  font-size: 14px;
}
.timeerror.datetime-picker{
  border: 1px solid #ed4014;
}
.datetime-picker__button {
  width: 100%;
  text-align: left;
  color  :#515a6e
}
.datetime-picker-main {
  width: 150px;
  top: 50px;
  left: 0;
  user-select: none;
  box-shadow: 0 0 0 1px rgba(14,41,57,.12),0 2px 5px rgba(14,41,57,.44),inset 0 -1px 2px rgba(14,41,57,.15);
  background: #fefefe;
  margin: 0 auto;
  border-radius: .1px;
  font-size: 14px;
}
.text-slider {
  width: 45px;
  text-align: center;
}
.text-slider__button-next  , .text-slider__button-previous{
  position: relative;
}
.text-slider__button-previous::before {
  content: "\F124";
  font-family: Ionicons;
  color: #34495e;
  position: absolute;
  font-size: 20px;
  cursor: pointer;
  left: -6px;
  background: #fefefe;
  bottom: -6px;
}
.text-slider__button-next::after{
  content: "\F116";
  font-family: Ionicons;
  color: #34495e;
  position: absolute;
  font-size: 20px;
  cursor: pointer;
  left: -6px;
  background: #fefefe;
  bottom: 10px;
}
.text-slider__value {
  margin: 5px 0;
}
.datetime-picker__button {
  text-align: right;
}
.clear__button::before {
  content: "\F177";
  font-family: Ionicons;
  color: #34495e;
  position: absolute;
  font-size: 20px;
  cursor: pointer;
  background: #fefefe;
  width: 26%;
}
.clear__button {
  margin-top: 0 !important;
}
.vs__search::placeholder {
  color: #c5c8ce;
  opacity: 1;
}
.selectTimePlaceholder .datetime-picker__button{
  color: #c5c8ce;
  opacity: 1;
}
.vSelectRequired .vs__dropdown-toggle {
  border-color: red;
}
.vselectHide .vs__selected {
  visibility: hidden;
}
@media only screen and (max-width: 768px) {
  .res-poss .ivu-form .ivu-form-item-label {
    width: 100% !important;
  }
  .ivu-date-picker{
    display: block !important;
  }
}
</style>

