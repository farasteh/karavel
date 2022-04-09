<template>
    <div>
        <div class="box-list-jobs-info mb-4">
            <p class="p-3 text-center">
                کاربر گرامی کامل بودن رزومه به شما کمک میکند تا شغل بهتری پیدا کرده و جستجوگر هوشمند کاراول شما را بیشتر نمایش میدهد.
            </p>
        </div>
        <div  class="m-box">
             <div class=" row box-header-form-stop-resume">
                <div v-if="this.$store.state.StepForm.Step == '1'"
                     @click="stepForm(1)"
                     class="btn-header-form-stop-resume active step-option d-flex justify-content-center align-items-center">
                      اطلاعات پایه
                </div>
                <div v-else=""
                     @click="stepForm(1)"
                     class="btn-header-form-stop-resume step-option d-flex justify-content-center align-items-center">
                      اطلاعات پایه
                </div>
                <div v-if="this.$store.state.StepForm.Step == '2'"
                     @click="stepForm(2)"
                     class="btn-header-form-stop-resume active step-option d-flex justify-content-center align-items-center">
                    سوابق تحصیلی
                </div>
                <div v-else
                     @click="stepForm(2)"
                     class="btn-header-form-stop-resume step-option d-flex justify-content-center align-items-center">
                    سوابق تحصیل
                </div>
                <div  v-if="this.$store.state.StepForm.Step == '3'"
                      @click="stepForm(3)"
                      class="btn-header-form-stop-resume active step-option d-flex justify-content-center align-items-center" >
                    سوابق شغلی
                </div>
                <div  v-else  @click="stepForm(3)"
                      class="btn-header-form-stop-resume step-option d-flex justify-content-center align-items-center">
                    سوابق شغلی
                </div>
                <div  v-if="this.$store.state.StepForm.Step == '4'"
                      @click="stepForm(4)"
                      class="btn-header-form-stop-resume active step-option d-flex justify-content-center align-items-center">
                    مهارت
                    <span class="optional-step">اختیاری</span>
                </div>
                <div  v-else
                      @click="stepForm(4)"
                      class="btn-header-form-stop-resume step-option d-flex justify-content-center align-items-center">
                    مهارت
                    <span class="optional-step">اختیاری</span>
                </div>
                <div  v-if="this.$store.state.StepForm.Step == '5'"
                      @click="stepForm(5)"
                      class="btn-header-form-stop-resume active step-option d-flex justify-content-center align-items-center"> پروژه
                    <span class="optional-step">اختیاری</span>
                </div>
                <div  v-else
                      @click="stepForm(5)"
                      class="btn-header-form-stop-resume step-option d-flex justify-content-center align-items-center"> پروژه
                    <span class="optional-step">اختیاری</span>
                </div>
                 <div  v-if="this.$store.state.StepForm.Step == '6'"
                       @click="stepForm(6)"
                       class="btn-header-form-stop-resume active step-option d-flex justify-content-center align-items-center"> تکمیلی
                 </div>
                 <div  v-else
                       @click="stepForm(6)"
                       class="btn-header-form-stop-resume step-option d-flex justify-content-center align-items-center"> تکمیلی
                 </div>
                <div  v-if="this.$store.state.StepForm.Step == '7'"
                      @click="stepForm(7)"
                      style="padding-left: 0;" class="col-2 btn-header-form-stop-resume active step-option d-flex justify-content-center align-items-center" >
                    دریافت pdf
                </div>
                <div  v-else
                      @click="stepForm(7)" style="padding-left: 0;"
                      class="col-2 btn-header-form-stop-resume step-option d-flex justify-content-center align-items-center" >
                    دریافت pdf
                </div>

            </div>
            <div class="mt-5" >
                <div v-if="this.$store.state.StepForm.Step == 1"><Base/></div>
                <div v-if="this.$store.state.StepForm.Step  == 2"><RecordStudy/></div>
                <div v-if="this.$store.state.StepForm.Step  == 3"><RecordJob/></div>
                <div v-if="this.$store.state.StepForm.Step  == 4"><Skill/></div>
                <div v-if="this.$store.state.StepForm.Step  == 5"><Project></Project></div>
                <div v-if="this.$store.state.StepForm.Step  == 6"> <extra></extra> </div>
                <div v-if="this.$store.state.StepForm.Step  == 7"> <resumePreview></resumePreview> </div>
            </div>
        </div>
    </div>
</template>
<script>
import {FormWizard, TabContent} from 'vue-form-wizard'
import 'vue-form-wizard/dist/vue-form-wizard.min.css'
import Base from './Base.vue'
import RecordStudy from './RecordStudy.vue'
import RecordJob from './RecordJob.vue'
import Skill from './Skill.vue'
import Project from './Project.vue'
import resumePreview from './resumePreview.vue'
import extra from './extra'
export default {

    components: {
        FormWizard,
        TabContent,
        Base,
        RecordStudy,
        RecordJob,
        Skill,
        Project ,
        resumePreview,
        extra
    },
    data(){
      return{
          stepFrom: 1
      }
    },
    methods: {
        stepForm(number){
            this.$store.commit('NumberStep',number)
        },
        onComplete: function(){
            alert('Yay. Done!');
        },
    }
}
</script>

<style>
.box-list-jobs-info {
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid transparent;
    border-radius: .3rem;
    position: relative;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.12), 0 2px 4px 0 rgba(0, 0, 0, 0.08);
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
        background: #1e88e5;
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


.active{
    background: #1e88e5;
    color: #fff;
}

</style>
