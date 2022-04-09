<template>
  <div>
    <div>
      <Checkbox size="large"  v-model="single">
                <span class="font-weight-bold" style="font-size: 16px">
                    سوابق شغلی ندارم
                </span>
      </Checkbox>
    </div>
    <Form ref="UpdateRecordJob" :model="UpdateRecordJob">
      <div class="card box-user-resume mt-2 p-4"  v-if="loading">
        <lodingResumeLoading rtl></lodingResumeLoading>
      </div>
      <draggable v-else tag="transition-group"
                 :componentData="componentData"
                 :list="UpdateRecordJob.items"
                 class="list-group"
                 :animation="100"
                 @start="dragging = true"
                 @end="dragging = false"
                 handle=".handle"
      >
        <div v-for="(item, index) in  $v.UpdateRecordJob.items.$each.$iter" :key="index">
          <div class="card box-user-resume mt-2">
            <i class="fas fa-exchange-alt handle" style="font-size: 16px; cursor: pointer"></i>
            <div class="row">
              <div style="z-index: 99" class="btn-delet-form" @click="handleRemove(item.id.$model , index)"><Icon type="md-close" /></div>
              <FormItem label="سِمت شغلی مربوطه" size="large" class="col-lg-3 col-md-6">
                <span class="required-star">*</span>
                <Input  :class="{ 'ivu-form-item-error animation-error': item.job_side.$error,'is-valid': !item.job_side.$invalid }"
                        size="large" type="text" v-model.trim="item.job_side.$model" placeholder="شغل"></Input>
              </FormItem>
              <FormItem  label="دسته بندی شغلی" class="col-lg-3 col-md-6">
                <span class="required-star">*</span>
                <Select2 placeholder="انتخاب کنید" v-model="item.job.$model"
                         :class="{vSelectRequired  : item.job.$error }"
                         :options="Jobs"  :searchable="false"/>
<!--                <v-select-->
<!--                  :class="{vSelectRequired  : item.job.$error , vselectHide  : showJob }"-->
<!--                  class="vselect-style"-->
<!--                  placeholder="انتخاب کنید "-->
<!--                  label="title" :options="Jobs"-->
<!--                  v-model.trim="item.job.$model"-->
<!--                  :reduce="d => d.id" taggable>-->
<!--                  <div slot="no-options">موردی یافت نشد !</div>-->
<!--                </v-select>-->
              </FormItem>
              <FormItem   label="مرکز اشتغال"  class="col-lg-3 col-md-6">
                <Select2 placeholder="انتخاب کنید" v-model="item.center_job.$model"
                         :options="CenterJobs"  :searchable="false"/>
<!--                <v-select-->
<!--                  :searchable="false"-->
<!--                  :class="{ vselectHide  : showCenterJob }"-->
<!--                  class="vselect-style"-->
<!--                  placeholder="انتخاب کنید "-->
<!--                  label="title" :options="CenterJobs"-->
<!--                  v-model.trim="item.center_job.$model"-->
<!--                  :reduce="d => d.id" taggable>-->
<!--                  <div slot="no-options">موردی یافت نشد !</div>-->
<!--                </v-select>-->
              </FormItem>
              <FormItem label="عنوان مرکز" class="col-lg-3 col-md-6">
                <span class="required-star">*</span>
                <Input :class="{ 'ivu-form-item-error ': item.title_center_job.$error,'is-valid': !item.title_center_job.$invalid }"
                       size="large" type="text" v-model.trim="item.title_center_job.$model" placeholder="نام مرکز"></Input>

              </FormItem>
              <FormItem label="نحوه همکاری" class="col-lg-3 col-md-6">
                <span class="required-star">*</span>
                <Select2 placeholder="انتخاب کنید" v-model="item.cooperation_type.$model"
                         :class="{vSelectRequired  :  item.cooperation_type.$error }"
                         :options="CooperationType"  :searchable="false"/>
<!--                <v-select-->
<!--                  :searchable="false"-->
<!--                  :class="{vSelectRequired  :  item.cooperation_type.$error, vselectHide  : showCooperationType }"-->
<!--                  class="vselect-style"-->
<!--                  placeholder="انتخاب کنید "-->
<!--                  label="title" :options="CooperationType"-->
<!--                  v-model.trim="item.cooperation_type.$model"-->
<!--                  :reduce="d => d.id" taggable>-->
<!--                  <div slot="no-options">موردی یافت نشد !</div>-->
<!--                </v-select>-->

              </FormItem>
              <FormItem label="سطح ارشدیت" class="col-lg-3 col-md-6">
                <span class="required-star">*</span>
                <Select2 placeholder="انتخاب کنید" v-model="item.group_levels.$model"
                         :class="{vSelectRequired  :  item.group_levels.$error }"
                         :options="GroupLevels"  :searchable="false"/>
<!--                <v-select-->
<!--                  :searchable="false"-->
<!--                  :class="{vSelectRequired  :  item.group_levels.$error , vselectHide  : showGroup }"-->
<!--                  class="vselect-style"-->
<!--                  placeholder="انتخاب کنید "-->
<!--                  label="title" :options="GroupLevels"-->
<!--                  v-model.trim="item.group_levels.$model"-->
<!--                  :reduce="d => d.id" taggable>-->
<!--                  <div slot="no-options">موردی یافت نشد !</div>-->
<!--                </v-select>-->

              </FormItem>
              <FormItem label="استان" class="col-lg-3 col-md-6">
                <Select2 placeholder="انتخاب کنید" v-model="item.province.$model" @change="item.city.$model = '' "
                         :options="Provinces"  :searchable="false"  />
<!--                <v-select-->
<!--                  :class="{ vselectHide  : showProvinces }"-->
<!--                  class="vselect-style"-->
<!--                  placeholder="انتخاب کنید "-->
<!--                  label="title" :options="Provinces"-->
<!--                  v-model.trim="item.province.$model"-->
<!--                  @input="item.city.$model = '' "-->
<!--                  :reduce="d => d.id" taggable>-->
<!--                  <div slot="no-options">موردی یافت نشد !</div>-->
<!--                </v-select>-->
              </FormItem>
              <FormItem label="شهر" class="col-lg-3 col-md-6">
                <Select2 placeholder="انتخاب کنید"   v-model.trim="item.city.$model"
                         :options="$store.getters['Map/City/getCityAll'](item.province.$model)" />
<!--                <v-select-->
<!--                  :class="{ vselectHide  : showCity}"-->
<!--                  class="vselect-style"-->
<!--                  placeholder="انتخاب کنید "-->
<!--                  label="title" :options="$store.getters['Map/City/getCityAll'](item.province.$model)"-->
<!--                  v-model.trim="item.city.$model"-->
<!--                  :reduce="d => d.id" taggable>-->
<!--                  <div slot="no-options">موردی یافت نشد !</div>-->
<!--                </v-select>-->
              </FormItem>
              <FormItem label="شروع" class="col-lg-3 col-md-6">
                <Input @input="convertEnter2English(index)"
                       :class="{ 'ivu-form-item-error animation-error': item.start.$error,'is-valid': !item.start.$invalid }"
                       size="large" type="text" v-model.trim="item.start.$model" placeholder="1378"></Input>
                <div class="text-sm text-red" v-if="item.start.$error" style="position:absolute">
                  <span class="text-danger" v-if="!item.start.year">    فرمت سال شروع نادرست است </span>
                </div>
              </FormItem>
              <FormItem  label="اتمام" class="col-lg-3 col-md-6">
                <Input   @input="convertEnd2English(index)"
                         :class="{ 'ivu-form-item-error animation-error': item.end.$error,'is-valid': !item.end.$invalid }"
                         :disabled="item.working.$model" size="large" type="text" v-model.trim="item.end.$model" placeholder="1388"></Input>
                <div class="text-sm text-red" v-if="item.end.$error" style="position:absolute">
                  <span class="text-danger" v-if="!item.end.year">    فرمت سال پایان نادرست است </span>
                </div>
              </FormItem>
              <FormItem class="col-lg-3 col-md-6 d-flex align-items-center justify-content-center" style="top: 23px;">
                <Checkbox v-model.trim="item.working.$model">
                  مشغول فعالیت در این مجموعه هستم
                </Checkbox>
              </FormItem>
              <FormItem class="col-lg-3 col-md-6 d-flex align-items-center justify-content-center" style="top: 23px;">
                <Checkbox v-model.trim="item.satisfying.$model">
                  از این مرکز رضایت نامه شغلی دارم
                </Checkbox>
              </FormItem>
              <FormItem label="وظایف / دستاوردها" class="col-12">
                <Input size="large" type="text" v-model.trim="item.comment.$model" placeholder="وظایف یا دستاورد های خود را وارد کنید"></Input>
              </FormItem>
            </div>
          </div>
        </div>
      </draggable>
      <FormItem class="mt-2">
        <div type="dashed" class="box-add-item  mobile-save-btn" >
          <Icon type="md-add btn-icon-add-item" @click="handleAdd" />
          <div style="padding: 18px;"> سابقه شغلی دیگری را اضافه کنید</div>
        </div>
      </FormItem>
    </Form>
    <div class="box-btn-resume">
      <button @click="RecordJobs()" class="btn custom-btn karavel-btn" v-scroll-to="{
                         el: '#maharat',container: '.mobile-breadcrumb',duration: 500,easing: 'linear',offset: -150,
                         force: true ,cancelable: true,x: true,y: false}" >ذخیره و ادامه</button>
    </div>
    <lodingDialogLoading :show="modal2"></lodingDialogLoading>
  </div>
</template>
<script>


import { required, helpers } from 'vuelidate/lib/validators';
import vSelect from 'vue-select'
import 'vue-select/dist/vue-select.css';
import Select3 from "../../select3";

const year = helpers.regex('year', /^1[3,4]\d{2}$/)

export default {
  name: "recordJob",
  order: 12,
  components: {
    Select3,
    vSelect
  },
  data() {
    return {
      showJob :  false  ,
      showCenterJob :  false  ,
      showCooperationType :  false  ,
      showGroup :  false  ,
      showProvinces :  false  ,
      showCity :  false ,
      loading  : false ,
      modal2:false,
      dragging: true,
      componentData: {
        props: {
          type: "transition",
          name: "flip-list"
        },
      },
      single: false
    };
  },
  validations :{
    UpdateRecordJob : {
      items : {
        $each : {
          job_side:  {required},
          job: {required},
          center_job: {},
          title_center_job: {required},
          cooperation_type: {required},
          group_levels: {required},
          province: {},
          city: {},
          start: {year},
          end: {year},
          working : {},
          comment : {} ,
          id : {},
          satisfying : {}
        }
      }
    }

  },
  created(){
    this.loading = true
    this.$store.dispatch('Member/Resume/RecordJob/LoadRecordJob').then(res => {this.loading = false});
    if( this.Jobs.length == 0 ) {
      this.showJob = true
      this.$store.dispatch('Jobs/LoadJobs').then(res => {this.showJob = false});
    }
    if( this.CooperationType.length == 0 ){
      this.showCooperationType = true
      this.$store.dispatch('CooperationType/LoadCooperationTypeList').then(res => {this.showCooperationType = false});
    }
    if(this.GroupLevels.length == 0){
      this.showGroup = true
      this.$store.dispatch('Job/GroupLevels/LoadGroupLevels').then(res => {this.showGroup = false});
    }
    if (this.Provinces.length == 0 ) {
      this.showProvinces = true
      this.$store.dispatch('Map/Province/LoadProvinces').then(res => {this.showProvinces = false});
    }
    if( this.CenterJobs.length == 0) {
      this.showCenterJob = true
      this.$store.dispatch('Job/CenterJobs/LoadCenterJobs').then(res => {this.showCenterJob = false});
    }
    if(this.cityIndex.length == 0 ){
      this.showCity = true
      this.$store.dispatch('Map/City/LoadCityAll').then(res => {this.showCity = false});
    }

  },
  computed:{
    Jobs(){return this.$store.state.Jobs.Jobs},
    CountRecordJobs () {return this.$store.getters['Member/Resume/RecordJob/CountRecordJobs']},
    CenterJobs(){return this.$store.state.Job.CenterJobs.CenterJobs},
    CooperationType(){return this.$store.state.CooperationType.CooperationType},
    GroupLevels(){return this.$store.state.Job.GroupLevels.group},
    Provinces(){ return this.$store.state.Map.Province.provinces},
    UpdateRecordJob(){return this.$store.getters['Member/Resume/RecordJob/UpdateRecordJob']},
    cityIndex(){return this.$store.state.Map.City.cityIndex},
  },
  methods:{
    City(index){
      let pId = this.UpdateRecordJob.items[index].province
      this.$store.dispatch('Map/City/LoadCityIndex',{'id': pId , 'index' : index });
      setTimeout(() => {
        this.handleAdd();
        let uu = parseInt(index) + 1;
        this.UpdateRecordJob.items.splice(uu, 1);
      },2000);
    } ,
    RecordJobs(){
      if(this.single){
        this.$store.commit('Member/Form/StepFrom/NumberStep', 4);
      }else {
        if (this.$v.$invalid) {
          this.$v.$touch()
          this.$store.dispatch('globalFunctions/ErrorNotify')
        } else {
          this.modal2 = true;
          this.$store.dispatch('Member/Resume/RecordJob/CreateUpdateRecordJobs',
            { UpdateRecordJob: this.$store.state.Member.Resume.RecordJob.UpdateRecordJob} )
            .then(success => {
              window.scrollTo(0, 0);
              this.$store.commit('Member/Form/StepFrom/NumberStep', 4)
              this.$store.dispatch('globalFunctions/SuccessNotify' , success.data.data.message)
            })
            .catch(error => {
              this.$store.dispatch('globalFunctions/ErrorNotify')
              this.ErrorNotify()
            })
            .finally(() => this.modal2 = false);
        }
      }
    },
    handleAdd () {
      console.log('fff')
      this.$store.commit( 'Member/Resume/RecordJob/ADD_CREATE_RECORDE_JOB')
    },
    handleRemove ( id , index) {

       if(this.UpdateRecordJob.items[index].type && this.UpdateRecordJob.items[index].type == 'create'){
        if(this.CountRecordJobs > 1)
          this.UpdateRecordJob.items.splice(index, 1);
      }

       else  {

         this.$confirm("آیا اطمینان دارید؟").then(() => {
            this.$store.dispatch('Member/Resume/RecordJob/deleteRecordJob',
             {
                'id': id ,
                'index' : index
             });

         })
      //     .then(() =>{
      //      this.$store.dispatch('globalFunctions/SuccessNotify' , 'این آیتم با موفقیت حذف شد')
      //     }).then( () => {
      //      console.log(this.CountRecordJobs)
      //      if(this.CountRecordJobs == 0)
      //        this.handleAdd()
      //   })
      //
       }
    },
    convertEnter2English: function (index) {
      this.$v.UpdateRecordJob.items.$model[index].start = this.convertNumber2English(this.$v.UpdateRecordJob.items.$model[index].start)
    },
    convertEnd2English: function (index) {
      this.$v.UpdateRecordJob.items.$model[index].end = this.convertNumber2English(this.$v.UpdateRecordJob.items.$model[index].end)
    },
    convertNumber2English( num ) {
      return   num.replace(/[\u0660-\u0669]/g, function (c) {
        return c.charCodeAt(0) - 0x0660;
      }).replace(/[\u06f0-\u06f9]/g, function (c) {
        return c.charCodeAt(0) - 0x06f0;
      });
    },

  }

}
</script>
<style>

.ivu-checkbox-wrapper {
  margin-right: 0px !important; ;

}
</style>
