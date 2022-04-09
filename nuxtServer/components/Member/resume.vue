<template>
  <div>
    <div class="box-list-jobs-info mb-4">
      <p class="p-3 text-center">
        کاربر گرامی کامل بودن رزومه به شما کمک میکند تا شغل بهتری پیدا کرده و جستجوگر هوشمند کاراول شما را بیشتر نمایش میدهد.
      </p>
    </div>
    <div  class="m-box">
      <div class=" row box-header-form-stop-resume mr-0 ml-0">
        <div :class="{ active : this.$store.state.Member.Form.StepFrom.Step == '1' }"
             @click="stepForm(1)"
             class="btn-header-form-stop-resume step-option d-flex justify-content-center align-items-center">
          اطلاعات پایه
        </div>
        <div :class="{ active : this.$store.state.Member.Form.StepFrom.Step == '2' }"
             @click="stepForm(2)"
             class="btn-header-form-stop-resume step-option d-flex justify-content-center align-items-center">
          سوابق تحصیلی
        </div>
        <div  :class="{ active : this.$store.state.Member.Form.StepFrom.Step == '3' }"
              @click="stepForm(3)"
              class="btn-header-form-stop-resume step-option d-flex justify-content-center align-items-center" >
          سوابق شغلی
        </div>
        <div :class="{ active : this.$store.state.Member.Form.StepFrom.Step == '4' }"
             @click="stepForm(4)"
             class="btn-header-form-stop-resume step-option d-flex justify-content-center align-items-center">
          مهارت
          <span class="optional-step">اختیاری</span>
        </div>

        <div :class="{ active : this.$store.state.Member.Form.StepFrom.Step == '5' }"
             @click="stepForm(5)"
             class="btn-header-form-stop-resume step-option d-flex justify-content-center align-items-center"> پروژه
          <span class="optional-step">اختیاری</span>
        </div>

        <div :class="{ active : this.$store.state.Member.Form.StepFrom.Step == '6' }"
             @click="stepForm(6)"
             class="btn-header-form-stop-resume step-option d-flex justify-content-center align-items-center"> تکمیلی
        </div>

        <div :class="{ active : this.$store.state.Member.Form.StepFrom.Step == '7' }"
             @click="stepForm(7)"
             style="padding-left: 0;" class="col-2 btn-header-form-stop-resume step-option d-flex justify-content-center align-items-center" >
          دریافت pdf
        </div>
      </div>

      <div class="mobile-breadcrumb" >
        <ul class="p-0 m-0 par" ref="content">
          <li :class="{active : this.$store.state.Member.Form.StepFrom.Step == '1' }" id="etelat" v-scroll-to="{
                         el: '#etelat',container: '.mobile-breadcrumb',duration: 500,easing: 'linear',offset: -150,
                         force: true ,cancelable: true,x: true,y: false}" @click="stepForm(1)">
            <label > اطلاعات پایه</label>
          </li>
          <li :class="{active : this.$store.state.Member.Form.StepFrom.Step == '2' }" id="tahsil" v-scroll-to="{
                         el: '#tahsil',container: '.mobile-breadcrumb',duration: 500,easing: 'linear',offset: -150,
                         force: true ,cancelable: true,x: true,y: false}" @click="stepForm(2)">
            <label >سوابق تحصیلی</label>
          </li>
          <li :class="{active : this.$store.state.Member.Form.StepFrom.Step == '3' }" id="shoghl" v-scroll-to="{
                         el: '#shoghl',container: '.mobile-breadcrumb',duration: 500,easing: 'linear',offset: -150,
                         force: true ,cancelable: true,x: true,y: false}" @click="stepForm(3)">
            <label>سوابق شغلی</label>
          </li>
          <li :class="{active : this.$store.state.Member.Form.StepFrom.Step == '4' }" id="maharat" v-scroll-to="{
                         el: '#maharat',container: '.mobile-breadcrumb',duration: 500,easing: 'linear',offset: -150,
                         force: true ,cancelable: true,x: true,y: false}" @click="stepForm(4)">
            <label> مهارت </label>
            <span class="optional-step">اختیاری</span>
          </li>
          <li :class="{active : this.$store.state.Member.Form.StepFrom.Step == '5' }" id="project" v-scroll-to="{
                         el: '#project',container: '.mobile-breadcrumb',duration: 500,easing: 'linear',offset: -150,
                         force: true ,cancelable: true,x: true,y: false}" @click="stepForm(5)">
            <label> پروژه </label>
            <span class="optional-step">اختیاری</span>
          </li>
          <li :class="{active : this.$store.state.Member.Form.StepFrom.Step == '6' }" id="takmil" v-scroll-to="{
                         el: '#takmil',container: '.mobile-breadcrumb',duration: 500,easing: 'linear',offset: -150,
                         force: true ,cancelable: true,x: true,y: false}" @click="stepForm(6)">
            <label> تکمیلی </label>
          </li>
          <li :class="{active : this.$store.state.Member.Form.StepFrom.Step == '7' }" id="pdf" v-scroll-to="{
                         el: '#pdf',container: '.mobile-breadcrumb',duration: 500,easing: 'linear',offset: -150,
                         force: true ,cancelable: true,x: true,y: false}" @click="stepForm(7)">
            <label> دریافت pdf </label>
          </li>
        </ul>
      </div>
      <div class="mt-5" >
        <div v-if="this.$store.state.Member.Form.StepFrom.Step == 1"><MemberResumeBase/></div>
        <div v-if="this.$store.state.Member.Form.StepFrom.Step  == 2"><MemberResumeRecordStudy/></div>
        <div v-if="this.$store.state.Member.Form.StepFrom.Step  == 3"><MemberResumeRecordJob/></div>
        <div v-if="this.$store.state.Member.Form.StepFrom.Step  == 4"><MemberResumeSkill/></div>
        <div v-if="this.$store.state.Member.Form.StepFrom.Step  == 5"><MemberResumeProject></MemberResumeProject></div>
        <div v-if="this.$store.state.Member.Form.StepFrom.Step  == 6"> <MemberResumeExtra></MemberResumeExtra> </div>
        <div v-if="this.$store.state.Member.Form.StepFrom.Step  == 7"> <MemberResumePreview></MemberResumePreview> </div>
      </div>
    </div>
  </div>
</template>
<script>


export default {
  name : 'resume' ,
  data(){
    return{
      stepFrom: 1
    }
  },
  methods: {
    stepForm(number){
      this.$store.commit('Member/Form/StepFrom/NumberStep',number)
    },
  }
}
</script>

<style>
.mobile-breadcrumb{
  display: none;
}

.mobile-breadcrumb{
  padding-top: 10px;
  overflow: auto;
  white-space: nowrap;
  height: 65px;
  float: right;
  width: 100%;
  margin-bottom: 10px;
  position: relative;
  z-index: 5;
}
.mobile-breadcrumb ul li {
  display: inline-block;
  text-align: center;
  min-width: 165px;
  margin: 0 5px;
  padding: 8px 0 3px;
  background: #fff;
  border: 1px solid #dfdfdf;
  border-radius: 4px;
  position: relative;
}
.mobile-breadcrumb ul li.active {
  background: var(--var-background-color);
  border: none;
  position: relative;
}
.mobile-breadcrumb ul li.active::after {
  content: '';
  border-top: 10px solid var(--var-background-color);
  border-right: 10px solid transparent;
  border-left: 10px solid transparent;
  position: absolute;
  left: calc(50% - 10px);
  bottom: -8px;
}
.mobile-breadcrumb ul li label
{
  font-size: 14px;
  position: relative;
}

.step-option {
  position : relative ;
  width : 14.22%
}
.optional-step  {
  font-size : 9px ;
  position : absolute ;
  left : 1px ;
  top :  3px ;
  background : #ed4014;
  padding : 2px ;
  color : #FFF ;
  border-radius : 2px
}
.stepTitle{

  font-size: 14px;
  font-weight: bold;
  position: absolute;
  top: 15px;
  /* bottom: 0; */
  right: 0;
  left: 0;
}
.vue-form-wizard .wizard-icon-circle.tab_shape {
  width: 100%;
  min-width: 100px;
  height: 40px;
  border: none;
  background-color: #f3f2ee;
  border-radius: 0;
  background-color: #fff !important;
  padding: 0px;
  box-shadow: 0 0px 0px 0 rgba(0, 0, 0, 0.11), 0 5px 4px 0 rgba(0, 0, 0, 0.08)
}
.vue-form-wizard.md .wizard-icon-circle.tab_shape {
  height: 50px !important;
}
.box-header-form-stop-resume{
  box-shadow: 0 15px 30px 0 rgba(0, 0, 0, 0.11), 0 5px 15px 0 rgba(0, 0, 0, 0.08);
  text-align: center;
  background: #fff;
  flex-wrap: nowrap;
  overflow: auto;
}
.box-header-form-stop-resume div{
  padding: 13px;
  cursor: pointer;
}
.btn-header-form-stop-resume:hover{
  background: var(--var-background-color);
  color: #fff;
}
span.stepTitle.active {
  color: #fff!important;
}
span.stepTitle.active {
  color: #fff !important;
}
.vue-form-wizard .wizard-nav-pills {
  flex-wrap: unset !important;
  overflow-y: hidden;
}
.wizard-footer-right{
  position: fixed;
  left: 22px;
  bottom: 35px;
}
.wizard-footer-left{
  position: fixed;
  right: 266px;
  bottom: 35px;
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


.active{
  background: var(--var-background-color);
  color: #fff;
}
@media screen and (max-width: 576px) {
  .mobile-breadcrumb {
    display: block;
  }
  .box-header-form-stop-resume  {
    display: none;
  }
  .mobile-save-btn { margin-bottom: 50px}
}
</style>
