<template>
  <div>
    <div class="text-center">
      <div style="font-size: 18px;" class="font-size-3xl font-weight-bold color-grey-dark-2 mb-4">ویرایش شرکت</div>
    </div>
    <div class="card box-shadow-lg p-3">
      <div class="card-body">
        <Form ref="formValidate">
          <div class="row">
            <FormItem class="col-md-6" label="نام شرکت به فارسی">
              <Input disabled
                     :class="{ 'ivu-form-item-error animation-error': $v.Company.name_fa.$error,'is-valid': !$v.Company.name_fa.$invalid }"
                     v-model.trim="$v.Company.name_fa.$model"></Input>
              <div class="text-sm text-red" v-if="$v.Company.name_fa.$error">
                                <span class="text-danger"
                                      v-if="!$v.Company.name_fa.required">  فیلد مورد نظر را پرکنید   </span>
              </div>
            </FormItem>
            <FormItem class="col-md-6" label="نام شرکت به انگلیسی">
              <Input disabled
                     :class="{ 'ivu-form-item-error animation-error': $v.Company.name_en.$error,'is-valid': !$v.Company.name_en.$invalid }"
                     v-model.trim="$v.Company.name_en.$model" dir="ltr"></Input>
              <div class="text-sm text-red" v-if="$v.Company.name_en.$error">

                                <span class="text-danger"
                                      v-if="!$v.Company.name_en.required">  فیلد مورد نظر را پرکنید </span>
              </div>
            </FormItem>
            <FormItem class="col-md-6" label="لوگوی شرکت">
              <Upload
                :on-success="handleSuccess"
                multiple
                name="img"
                action="https://api.karavel.ir/api/v1/Upload">
                <Button icon="ios-cloud-upload-outline">انتخاب و آپلود فایل لوگو</Button>
              </Upload>
              <div v-if="errorMessage">
                <span v-for="m in errorMessage" class="text-danger">{{m}}</span>
              </div>
              <img v-if="Company.logo" style="width: 68px;"  :src="appUrl+'/images/company/' + Company.logo"
                   :alt="$v.Company.name_fa.$model" >
            </FormItem>
            <FormItem class="col-md-6" label="آدرس وب سایت شرکت">
              <Input v-model="$v.Company.address_site.$model" dir="ltr"></Input>
            </FormItem>
            <FormItem class="col-md-6" label="استان">
              <span class="required-star">*</span>
              <Col span="12">
                <Select2 placeholder="انتخاب کنید" v-model="$v.Company.province.$model"
                         :class="{ vSelectRequired  : $v.Company.province.$error }"  @change="City()"
                         :options="provinces"  :searchable="false"/>
<!--                <v-select-->
<!--                  :class="{ vSelectRequired  : $v.Company.province.$error ,  vselectHide  : showCity }"-->
<!--                  class="vselect-style"-->
<!--                  placeholder="انتخاب کنید "-->
<!--                  label="title" :options="provinces"-->
<!--                  v-model="$v.Company.province.$model"-->
<!--                  @input="City()"-->
<!--                  :reduce="d => d.id" taggable>-->
<!--                  <div slot="no-options">موردی یافت نشد !</div>-->
<!--                </v-select>-->
                <div class="ivu-form-item-error-tip" v-if="$v.Company.province.$error">فیلد مورد نظر را پرکنید</div>
              </Col>
            </FormItem>
            <FormItem class="col-md-6" label="شهر">
              <span class="required-star">*</span>
              <Col span="12">
                <Select2 placeholder="انتخاب کنید"   v-model="$v.Company.city.$model"
                         :class="{ vSelectRequired  : $v.Company.city.$error  }"
                         :options="Citys"  :searchable="false"/>
<!--                <v-select-->
<!--                  :class="{ vSelectRequired  : $v.Company.city.$error ,  vselectHide  : showCity }"-->
<!--                  class="vselect-style"-->
<!--                  placeholder="انتخاب کنید "-->
<!--                  label="title" :options="Citys"-->
<!--                  v-model="$v.Company.city.$model"-->
<!--                  :reduce="d => d.id" taggable>-->
<!--                  <div slot="no-options">موردی یافت نشد !</div>-->
<!--                </v-select>-->
                <div class="ivu-form-item-error-tip" v-if="$v.Company.city.$error">فیلد مورد نظر را پرکنید</div>
              </Col>
            </FormItem>
            <FormItem class="col-md-6" label="سال تاسیس">
              <Input :class="{ 'ivu-form-item-error animation-error': $v.Company.year.$error,'is-valid': !$v.Company.year.$invalid }"
                     @input="convertPhone2English"  v-model.trim="$v.Company.year.$model" dir="ltr"></Input>
              <div class="text-sm text-red" v-if="$v.Company.year.$error" style="position:absolute">
                <span class="text-danger" v-if="!$v.Company.year.yaerForm">  فرمت تاریخ نادرست است </span>
              </div>
            </FormItem>
            <FormItem class="col-md-6" label="تعداد پرسنل">
              <span class="required-star">*</span>
              <Input :class="{ 'ivu-form-item-error animation-error': $v.Company.Employee_count.$error,'is-valid': !$v.Company.Employee_count.$invalid }"
                     @input="convertCount2English"  v-model="$v.Company.Employee_count.$model" dir="ltr"></Input>
              <div class="text-sm text-red" v-if="$v.Company.Employee_count.$error">
                <span class="text-danger" v-if="!$v.Company.Employee_count.numeric"> لطفا یک عدد وارد کنید </span>
              </div>
            </FormItem>
            <FormItem class="col-md-6" label="تلفن (نمایش برای کارجو)">
              <span class="required-star">*</span>
              <Input  :class="{ 'ivu-form-item-error animation-error': $v.Company.Phone.$error,'is-valid': !$v.Company.Phone.$invalid }"
                      v-model.trim="$v.Company.Phone.$model" dir="ltr"></Input>
              <div class="ivu-form-item-error-tip" v-if="$v.Company.Phone.$error">فیلد مورد نظر را پرکنید</div>
            </FormItem>
            <FormItem class="col-md-6" label=" تلفن همراه">
              <span class="required-star">*</span>
              <Input disabled :class="{ 'ivu-form-item-error animation-error': $v.Company.mobile.$error,'is-valid': !$v.Company.mobile.$invalid }"
                     v-model.trim="$v.Company.mobile.$model" dir="ltr"></Input>
              <div class="text-sm text-red" v-if="$v.Company.mobile.$error">
                <span class="text-danger" v-if="!$v.Company.mobile.required"> فیلد مورد نظر را پرکنید. </span>
                <span class="text-danger" v-if="!$v.Company.mobile.mobile"> فرمت تلفن همراه نادرست است. </span>
              </div>
            </FormItem>
            <FormItem  class="col-12" label="حوزه فعالیت شرکت">
              <Select :class="{ 'ivu-form-item-error': $v.Company.Activity_id.$error,'is-valid': !$v.Company.Activity_id.$invalid }"
                      size="large"
                      v-model="$v.Company.Activity_id.$model"
                      multiple
                      filterable
                      placeholder="حوزه فعالیت شرکت">
                <Option v-for="(item, index) in ActivityCompany" :value="item.id" :key="index">{{item.title}}</Option>
              </Select>
              <div class="ivu-form-item-error-tip" v-if="$v.Company.Activity_id.$error">فیلد مورد نظر را پرکنید</div>
            </FormItem>
            <FormItem label="معرفی شرکت به کارجو" class="col-12">
              <Input :class="{ 'ivu-form-item-error': $v.Company.comment.$error,'is-valid': !$v.Company.comment.$invalid }"
                     type="textarea" :autosize="{minRows: 7,maxRows: 10}" v-model="$v.Company.comment.$model"   placeholder="شرکت خود را در چند جمله برای بازخورد بهتر کارجو معرفی کنید..."></Input>
            </FormItem>
            <FormItem  class="col-md-6 m-auto">
              <Button :loading="modal_loading" @click="EditSubmit()" type="primary" class="karavel-btn"> ویرایش اطلاعات</Button>
            </FormItem>
          </div>
        </Form>
      </div>
    </div>
  </div>
</template>
<script>
import {required , numeric, helpers} from 'vuelidate/lib/validators'
import vSelect from 'vue-select'
import 'vue-select/dist/vue-select.css';

const mobile = helpers.regex('mobile', /^(\+98|0098|98|0)?9\d{9}$/)
const nameEn = helpers.regex('nameEn', /^[A-Za-z][A-Za-z0-9]*$/)
const nameFa = helpers.regex('nameEn',  /^[\u0600-\u06FF\s]+$/)
const yaerForm = helpers.regex('yaerForm', /^1[3,4]\d{2}$/)

export default {
  components: {
    vSelect ,
  },
  data(){
    return{
      modal_loading: false,
      showCity    : false ,
      errorMessage : ''
    }
  },
  validations: {
    Company:{
      name_fa         :{required,},
      name_en         :{required,} ,
      province        : {required} ,
      city            : {required} ,
      Phone           : {required} ,
      address_site    : {} ,
      Employee_count  : {required, numeric} ,
      Activity_id     : {} ,
      comment         : {} ,
      year            :  { yaerForm } ,
      mobile          : {required , mobile}
    },
  },
  mounted() {
    this.$store.dispatch('Company/Company/LoadCompanyUser')
    if(this.provinces.length == 0 ) {
      this.showCity = true
      this.$store.dispatch('Map/Province/LoadProvinces').then(response =>  {this.showCity = false});
    }
    if(this.ActivityCompany.length == 0 )
      this.$store.dispatch('Jobs/LoadJobs');
  },
  computed:{
    appUrl() {
      return this.$store.state.globalFunctions.APP_URL
    },
    user(){return this.$store.state.User.User.User},
    provinces(){return this.$store.state.Map.Province.provinces},
    ActivityCompany () {
      var jobs = this.$store.state.Jobs.Jobs ;
      let job = jobs.find( x => x.id == 1)
      let index = jobs.indexOf(job)
      jobs.splice(index  , 1)
      return jobs
    },
    Company(){return this.$store.state.Company.Company.Company},
    Citys() { return this.$store.getters['Map/Province/getCities'](this.$v.Company.province.$model)},
  },
  methods: {
    City(){
      this.$v.Company.city.$model = ''
    } ,
    handleSuccess (res, file) {
      if(res.data.error == true){
        this.errorMessage = res.data.message
      }
      else {
        this.Company.logo = res.data.data;
        this.errorMessage = ''
      }

    },
    EditSubmit () {
      this.$v.$touch()
      if (this.$v.$invalid) {
        this.$store.dispatch('globalFunctions/ErrorNotify')
      }
      else{
        this.modal_loading=true;
        this.$store.dispatch('Company/Company/EditCompany',this.Company)
          .then(success =>{
            this.$store.dispatch('globalFunctions/SuccessNotify' , success.data.data.message)
            this.$store.commit('User/User/SET_COMPANY_LOGO' , this.Company.logo)
          })
          .catch(error =>{
            this.$store.dispatch('globalFunctions/ErrorNotify')
          })
          .finally(() =>{this.modal_loading=false;})
      }
    },

    convertPhone2English: function () {
      this.$v.Company.year.$model = this.convertNumber2English(this.$v.Company.year.$model)
    },
    convertCount2English: function () {
      this.$v.Company.Employee_count.$model = this.convertNumber2English(this.$v.Company.Employee_count.$model)
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

.ivu-input-group-large .ivu-input, .ivu-input-group-large > .ivu-input-group-append, .ivu-input-group-large > .ivu-input-group-prepend{
  height : 40px !important
}
.ivu-input-group-large .ivu-input[placeholder="جستجو در عنوان آگهی"], .ivu-input-group-large[placeholder="جستجو در عنوان آگهی"] > .ivu-input-group-append, .ivu-input-group-large[placeholder="جستجو در عنوان آگهی"] > .ivu-input-group-prepend{
  height: 50px !important;
}
.vSelectRequired .vs__dropdown-toggle {
  border-color: red;
}
.vselectHide .vs__selected {
  visibility: hidden;
}
.vselect-style .vs__dropdown-toggle {
  direction: rtl;
}
.vselect-style  .vs__dropdown-toggle  {
  height: 40px !important;
}
.vselect-style .vs__search::placeholder,
.vselect-style .vs__dropdown-toggle,
.vselect-style .vs__dropdown-menu {

  direction: rtl !important;
  text-align : right !important;
}
.vselect-style .vs__actions {
  padding: 4px 7px 0px 7px !important;
}
.vselect-style .vs__open-indicator  {
  transform: scale(.7) ;
}
.vselect-style.vs--open .vs__open-indicator  {
  transform: rotate(180deg) scale(.7) !important;
}
.required-star {
  font-size: 20px;
  position: relative;
  top: 6px;
  margin-right: 5px;
  color: red;
}
.vselect-style {
  width: 100%;
  display: inline-block;
}
.ivu-form .ivu-form-item-label {
  color: #949494 !important;
  float: right;
}
.ivu-select-large.ivu-select-single .ivu-select-selection {
  padding-right: 10px;
}


.ivu-select-input {
  padding: 0 5px 0 8px !important;
}

.vue-image-crop-upload .vicp-wrap .vicp-step2 .vicp-crop .vicp-crop-right {
  float: none !important;
}

.vue-image-crop-upload .vicp-wrap .vicp-step2 .vicp-crop .vicp-crop-right .vicp-preview {
  height: 150px;
  overflow: hidden;
  display: flex !important;
  align-items: center !important;
  justify-content: center;
  flex-wrap: wrap;
}

.vue-image-crop-upload .vicp-wrap .vicp-step2 .vicp-crop .vicp-crop-right .vicp-preview .vicp-preview-item {
  position: relative;
  padding: 5px;
  width: 150px !important;
  height: 150px !important;
}

.vue-image-crop-upload .vicp-wrap .vicp-step2 .vicp-crop .vicp-crop-right .vicp-preview .vicp-preview-item.vicp-preview-item-circle img {
  width: 150px !important;
  height: 150px !important;
}
.text-sm.text-red {
  position: absolute;
}
#fileInput {
  display: none;
}
.img-preview{
  width: 120px;
  height: 120px;
  border-radius: 50%;
  border: 5px solid #ccc;
}
.center-image-upload{
  display: flex !important;
  align-items: center !important;
  justify-content: center;
  flex-wrap: wrap;
}

#fileInput {
  display: none;
}
.img-preview{
  width: 120px;
  height: 120px;
  border-radius: 50%;
  border: 5px solid #ccc;
}
.center-image-upload{
  display: flex !important;
  align-items: center !important;
  justify-content: center;
  flex-wrap: wrap;
}
.ivu-upload-list-file-finish{
  display: none !important;
}
.ivu-select-single .ivu-select-selection .ivu-select-selected-value {
  line-height: 35px !important;
  margin-left: 5px !important;
}
/* width: 120px;
height: 120px;
border-radius: 50%;
border: 5px solid #ccc; */

.ivu-input-group-large .ivu-input, .ivu-input-group-large > .ivu-input-group-append, .ivu-input-group-large > .ivu-input-group-prepend{
  height : 40px !important
}
.ivu-input-group-large .ivu-input[placeholder="جستجو در عنوان آگهی"], .ivu-input-group-large[placeholder="جستجو در عنوان آگهی"] > .ivu-input-group-append, .ivu-input-group-large[placeholder="جستجو در عنوان آگهی"] > .ivu-input-group-prepend{
  height: 50px !important;
}
.vSelectRequired .vs__dropdown-toggle {
  border-color: red;
}
.vselectHide .vs__selected {
  visibility: hidden;
}
.vselect-style .vs__dropdown-toggle {
  direction: rtl;
}
.vselect-style  .vs__dropdown-toggle  {
  height: 40px !important;
}
.vselect-style .vs__search::placeholder,
.vselect-style .vs__dropdown-toggle,
.vselect-style .vs__dropdown-menu {

  direction: rtl !important;
  text-align : right !important;
}
.vselect-style .vs__actions {
  padding: 4px 7px 0px 7px !important;
}
.vselect-style .vs__open-indicator  {
  transform: scale(.7) ;
}
.vselect-style.vs--open .vs__open-indicator  {
  transform: rotate(180deg) scale(.7) !important;
}
.required-star {
  font-size: 20px;
  position: relative;
  top: 6px;
  margin-right: 5px;
  color: red;
}
.vselect-style {
  width: 100%;
  display: inline-block;
}
.ivu-form .ivu-form-item-label {
  color: #949494 !important;
  float: right;
}
.ivu-select-large.ivu-select-single .ivu-select-selection {
  padding-right: 10px;
}


.ivu-select-input {
  padding: 0 5px 0 8px !important;
}

</style>
