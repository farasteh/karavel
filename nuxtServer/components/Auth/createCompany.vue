<template>
  <div>
    <div class="container my-5">
      <div class="row">
        <div class="col-lg-10 col-md-12 col-sm-12 m-auto">
          <div class="text-center">
            <div style="font-size: 18px;" class="font-size-3xl font-weight-bold color-grey-dark-2 mb-4">ایجاد شرکت</div>
          </div>
          <div class="box-list-jobs-info mb-4">
            <p class="pt-3 px-3 text-right ">
              کارفرمای گرامی به پنل کاراولی خود خوش آمدید.
            </p>
            <p class="px-3 text-right">
              برای شروع لطفا اطلاعات زیر را تکمیل بفرمائید.
            </p>
            <p class="px-3 pb-3 text-right">
              تکمیل بودن این اطلاعات به کارمندان کمک می کند که راحت تر شغل های پیشنهادی شما را انتخاب کنند و شما به هدف خودتان نزدیک تر می شوید.
            </p>
          </div>
          <div class="card box-shadow-lg p-3">
            <div class="card-body">
              <div>
                <Form ref="formValidate">
                  <div class="row">
                    <FormItem class="col-md-6"  label="نام شرکت به فارسی">
                      <span class="required-star">*</span>
                      <Input :class="{ 'ivu-form-item-error animation-error': $v.form.name_fa.$error,'is-valid': !$v.form.name_fa.$invalid }"  v-model.trim="$v.form.name_fa.$model"></Input>
                      <div class="text-sm text-red" v-if="$v.form.name_fa.$error">

                                                <span class="text-danger"
                                                      v-if="!$v.form.name_fa.required">  فیلد مورد نظر را پرکنید   </span>
                      </div>
                    </FormItem>
                    <FormItem class="col-md-6" label="نام شرکت به انگلیسی">
                      <span class="required-star">*</span>
                      <Input
                        :class="{ 'ivu-form-item-error animation-error': $v.form.name_en.$error,'is-valid': !$v.form.name_en.$invalid }"
                        v-model.trim="$v.form.name_en.$model" dir="ltr"></Input>
                      <div class="text-sm text-red" v-if="$v.form.name_en.$error">
                                                <span class="text-danger"
                                                      v-if="!$v.form.name_en.required">  فیلد مورد نظر را پرکنید   </span>
                      </div>
                    </FormItem>
                    <FormItem class="col-md-6" label="لوگوی شرکت">
                      <Upload
                        :on-success="handleSuccess"
                        name="img"
                        multiple
                        action="https://api.karavel.ir/api/v1/Upload">
                        <Button icon="ios-cloud-upload-outline">انتخاب و آپلود فایل لوگو</Button>
                      </Upload>
                      <img v-if="form.logo" style="width: 68px;"  :src="appurl+'/images/company/' + form.logo"  >
                    </FormItem>
                    <FormItem class="col-md-6" label="آدرس وب سایت شرکت">
                      <Input v-model="$v.form.site.$model" dir="ltr" ></Input>
                    </FormItem>

                    <FormItem class="col-md-6" label="استان">
                      <span class="required-star">*</span>
                      <Col span="12" >
                        <v-select
                          :class="{ vSelectRequired  : $v.form.province.$error }"
                          class="vselect-style"
                          placeholder="انتخاب کنید "
                          label="title" :options="Provinces"
                          v-model="$v.form.province.$model"
                          @input="City()"
                          :reduce="d => d.id" taggable>
                          <div slot="no-options">موردی یافت نشد !</div>
                        </v-select>
                        <div class="ivu-form-item-error-tip" v-if="$v.form.province.$error">فیلد مورد نظر را پرکنید</div>
                      </Col>
                    </FormItem>
                    <FormItem class="col-md-6" label="شهر">
                      <span class="required-star">*</span>
                      <Col span="12" >
                        <v-select
                          :class="{ vSelectRequired  : $v.form.city.$error }"
                          class="vselect-style"
                          placeholder="انتخاب کنید "
                          label="title" :options="Citys"
                          v-model="$v.form.city.$model"
                          :reduce="d => d.id" taggable>
                          <div slot="no-options">موردی یافت نشد !</div>
                        </v-select>
                        <div class="ivu-form-item-error-tip" v-if="$v.form.city.$error">فیلد مورد نظر را پرکنید</div>
                      </Col>
                    </FormItem>
                    <FormItem class="col-md-6" label="سال تاسیس">
                      <Input :class="{ 'ivu-form-item-error animation-error': $v.form.year.$error,'is-valid': !$v.form.year.$invalid }"
                             @input="convertPhone2English"  v-model.trim="$v.form.year.$model" dir="ltr"></Input>
                      <div class="text-sm text-red position-absolute" v-if="$v.form.year.$error">
                        <span class="text-danger" v-if="!$v.form.year.yaerForm">  فرمت تاریخ نادرست است </span>
                      </div>
                    </FormItem>
                    <FormItem class="col-md-6" label="تعداد پرسنل">
                      <span class="required-star">*</span>
                      <Input :class="{ 'ivu-form-item-error animation-error': $v.form.count.$error,'is-valid': !$v.form.count.$invalid }"
                             @input="convertCount2English"  v-model="$v.form.count.$model" dir="ltr"></Input>
                      <div class="ivu-form-item-error-tip" v-if="$v.form.count.$error">لطفا یک عدد وارد کنید</div>
                    </FormItem>
                    <FormItem class="col-md-6" label="تلفن (نمایش برای کارجو)">
                      <span class="required-star">*</span>
                      <Input :class="{ 'ivu-form-item-error animation-error': $v.form.phone.$error,'is-valid': !$v.form.phone.$invalid }"
                             v-model.trim="$v.form.phone.$model" dir="ltr"></Input>
                      <div class="ivu-form-item-error-tip" v-if="$v.form.phone.$error">فیلد مورد نظر را پرکنید</div>
                    </FormItem>
                    <!--                                       <FormItem class="col-md-6" label="تلفن همراه">-->
                    <!--                                           <span class="required-star">*</span>-->
                    <!--                                           <Input-->
                    <!--                                               :class="{ 'ivu-form-item-error animation-error': $v.form.mobile.$error,'is-valid': !$v.form.mobile.$invalid }"-->
                    <!--                                               v-model.trim="$v.form.mobile.$model" dir="ltr"></Input>-->
                    <!--                                           <div class="text-sm text-red position-absolute" v-if="$v.form.mobile.$error">-->
                    <!--                                               <span class="text-danger" v-if="!$v.form.mobile.mobile"> فرمت تلفن همراه نادرست است. </span>-->
                    <!--                                               <span class="text-danger" v-if="!$v.form.mobile.required">  فیلد مورد نظر را پرکنید. </span>-->
                    <!--                                           </div>-->
                    <!--                                       </FormItem>-->

                    <FormItem  class="col-12" label="حوزه فعالیت شرکت">
                      <Select
                        size="large"
                        v-model="form.ActivityCompany"
                        multiple
                        filterable
                        placeholder="حوزه فعالیت شرکت"
                      >
                        <Option v-for="(item, index) in ActivityCompanyList" :value="item.id" :key="index">{{item.title}}</Option>
                      </Select>
                    </FormItem>
                    <FormItem label="معرفی شرکت به کارجو" class="col-12">
                      <Input type="textarea" v-model="form.comment" :autosize="{minRows: 7,maxRows: 10}"  placeholder="شرکت خود را در چند جمله برای بازخورد بهتر کارجو معرفی کنید..."></Input>
                    </FormItem>
                    <FormItem  class="col-md-6 m-auto">
                      <Button :loading="modal_loading" @click="handleSubmit('formValidate')" type="primary">ثبت و تغییرات اطلاعات</Button>
                    </FormItem>
                  </div>
                </Form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import {required, numeric, helpers } from 'vuelidate/lib/validators'
import vSelect from 'vue-select'
import 'vue-select/dist/vue-select.css';

const yaerForm = helpers.regex('yaerForm', /^1[3,4]\d{2}$/)
const mobile = helpers.regex('mobile', /^(\+98|0098|98|0)?9\d{9}$/)

export default {
  components: {
    vSelect ,
  },
   head() {
    return {
      title: 'استخدام آژانس مسافرتی و هواپیمایی - کاراول ',
    }
  },
  data () {
    return {
      form:{
        logo: '',
        name_fa :'',
        name_en:'',
        ActivityCompany:'',
        comment:'',
        phone:'',
        site:'',
        province:'',
        count:'',
        cocki: this.$store.dispatch('globalFunctions/generatedToken'),
        city : '' ,
        year :''

      },
      provinceList:[],
      modal_loading : false
    }
  },
  validations: {
    form: {
      name_fa:{
        required,
      },
      name_en:{
        required,
      } ,
      province : {
        required
      } ,
      city : {
        required
      } ,
      phone  : {required} ,
      site : {},
      count : {
        required,
        numeric
      },
      year : {yaerForm } ,
    },
  },
  computed : {
    appurl() {
      return this.$store.state.globalFunctions.APP_URL
    },
    Provinces() { return this.$store.state.Map.Province.provinces},
    Citys() { return this.$store.getters['Map/Province/getCities'](this.$v.form.province.$model)},
    ActivityCompanyList () {
      var jobs = this.$store.state.Jobs.Jobs ;
      let job = jobs.find( x => x.id == 1)
      let index = jobs.indexOf(job)
      jobs.splice(index  , 1)
      return jobs
    },
  },
  mounted() {
    this.$store.dispatch('Map/Province/LoadProvinces');
    this.$store.dispatch('Jobs/LoadJobs');
  },
  methods: {
    City(){
      this.$v.form.city.$model = ''
    } ,
    handleSuccess (res, file) {
      this.form.logo = res.data.data;
    },
    handleSubmit (name) {
      this.$v.$touch()
      if (this.$v.$invalid) {
        this.$store.dispatch('globalFunctions/ErrorNotify')
      }else{
        this.modal_loading=true;
        this.$store.dispatch('Company/Company/CREATE_ACTIVIY_COMPANY',{
          name_fa: this.form.name_fa,
          name_en: this.form.name_en,
          ActivityCompany: this.form.ActivityCompany,
          comment: this.form.comment,
          phone: this.form.phone,
          site: this.form.site,
          province: this.form.province,
          count: this.form.count,
          logo: this.form.logo,
          cocki: this.form.cocki,
          city: this.form.city,
          year: this.form.year,
        })
          .then(success =>{
            this.$cookies.set('role' , 'Company' , {
                path: '/',
                maxAge: 60 * 60 * 24 * 7
            })
         //   localStorage.setItem('role', 'Company');
            this.$alert('ثبت نام شما با موفقیت انجام شد. شما به صفحه ساخت آگهی هدایت میشوید.').then(() => {
              this.$router.push({ path: '/posts/create' })
            });
          })
          .catch(error =>{
            this.$store.dispatch('globalFunctions/ErrorNotify')
          })
          .finally(() => {setTimeout(() => {this.modal_loading=false;}, 300);});
      }
    },
    handleReset (name) {
      this.$refs[name].resetFields();
    },
    convertPhone2English: function () {
      this.$v.form.year.$model = this.convertNumber2English(this.$v.form.year.$model)
    },
    convertCount2English: function () {
     this.$v.form.count.$model = this.convertNumber2English(this.$v.form.count.$model)
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
.ivu-btn {

  width: 100%;
}
.ivu-upload-select {
  width: 100%;
}
.ivu-col-span-12 {
  width: 100% !important;
}
.ivu-select-arrow {
  left: inherit !important;
  right: 4px !important;
}
.ivu-select-multiple .ivu-select-item-selected::after {
  right: inherit !important;
  left: 4px !important;
}
.ivu-form .ivu-form-item-label {
  float: right !important;
  font-size: 15px !important;
}
.ivu-form-item-error-tip {
  left: inherit !important;
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
.vs__clear {
  display: none;
}
.ivu-select-arrow {
  right: inherit !important;
  left: 8px !important;
}
</style>
