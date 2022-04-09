<template>
    <div>
        <div class="container my-5">
            <div class="row text-">
                <div class="col-lg-10 col-md-12 col-sm-12 m-auto">
                        <div class="text-center">
                            <div style="font-size: 18px;" class="font-size-3xl font-weight-bold color-grey-dark-2 mb-4">ایجاد شرکت</div>
                        </div>
                        <div class="box-list-jobs-info mb-4" style="background: #1e88e5 ; color: #fff">
                            <p class="pt-3 px-3 text-right ">
                                کارفرمای گرامی به پنل کاراولی خود خوش آمدید.
                            </p>
                            <p class="px-3 text-right ">
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
                                                    action="api/v1/Upload">
                                                    <Button icon="ios-cloud-upload-outline">انتخاب و آپلود فایل لوگو</Button>
                                                </Upload>
                                                <img v-if="form.logo" style="width: 68px;"  :src="'/images/company/' + form.logo"  >
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
                                                        :reduce="d => d.id" taggable></v-select>
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
                                                        :reduce="d => d.id" taggable></v-select>
                                                     <div class="ivu-form-item-error-tip" v-if="$v.form.city.$error">فیلد مورد نظر را پرکنید</div>
                                                </Col>
                                        </FormItem>
                                       <FormItem class="col-md-6" label="سال تاسیس">
                                           <Input :class="{ 'ivu-form-item-error animation-error': $v.form.year.$error,'is-valid': !$v.form.year.$invalid }"
                                                  v-model.trim="$v.form.year.$model" dir="ltr"></Input>
                                           <div class="text-sm text-red" v-if="$v.form.year.$error" style="position:absolute">
                                               <span class="text-danger" v-if="!$v.form.year.yaerForm">  فرمت تاریخ نادرست است </span>
                                           </div>
                                       </FormItem>
                                       <FormItem class="col-md-6" label="شماره تماس">
                                            <span class="required-star">*</span>
                                           <Input
                                               :class="{ 'ivu-form-item-error animation-error': $v.form.phone.$error,'is-valid': !$v.form.phone.$invalid }"
                                               v-model.trim="$v.form.phone.$model" dir="ltr"></Input>
                                           <div class="ivu-form-item-error-tip" v-if="$v.form.phone.$error">فیلد مورد نظر را پرکنید</div>
                                       </FormItem>
                                         <FormItem class="col-md-6" label="تعداد پرسنل">
                                            <span class="required-star">*</span>
                                              <Input :class="{ 'ivu-form-item-error animation-error': $v.form.count.$error,'is-valid': !$v.form.count.$invalid }"
                                                  v-model="$v.form.count.$model" dir="ltr"></Input>
                                             <div class="ivu-form-item-error-tip" v-if="$v.form.count.$error">لطفا یک عدد وارد کنید</div>
                                        </FormItem>
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

  export default {
        components: {
            vSelect ,
        },
      metaInfo() {
          return {
              title: '',
              //     // all titles will be injected into this template
              titleTemplate: ' سامانه کاریابی در گردشگری - کاراول ',
              meta: [{
                  vmid: 'description',
                  name: 'description',
                  content: '',
              }]
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
                    cocki: this.generatedToken(),
                    city : ''
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
                    phone  : {
                        required
                    } ,
                    site : {
                    },
                    count : {
                        required,
                        numeric
                    },
                    year : {yaerForm}
                },
            },
      computed : {
           Provinces() { return this.$store.state.Province.provinces;},
           Citys() { return this.$store.getters.getCities(this.$v.form.province.$model)},
            ActivityCompanyList () { return this.$store.state.Job.Jobs },
       },
       mounted() {
            this.$store.dispatch('LoadProvinces');
            this.$store.dispatch('LoadJobs');
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
                this.$notify({
                    group: 'foo',
                    title: 'فرم دارای خطاست',
                    text: 'لطفا قبل از ثبت خطاهای خود را بررسی کنید',
                    duration: 10000,
                    speed: 1000,
                    closeOnClick: true,
                    classes: 'vue-notification success'
                });
            }else{
                this.modal_loading=true;
                this.$store.dispatch('CREATE_ACTIVIY_COMPANY',{
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
                    this.$notify({
                        group: 'success',
                        title: 'success',
                        text: success.data.message,
                        duration: 10000,
                        speed: 1000,
                        closeOnClick: true,
                        classes: 'vue-notification success'
                    });
                    this.$router.push({ name: 'DashboardCompany' }).catch(() => {});

                })
                .catch(error =>{
                    this.$notify({
                        group: 'foo',
                        title: 'Oops',
                        text: 'با خطا مواجه شد لطفا دوباره تلاش کنید.',
                        duration: 10000,
                        speed: 1000,
                        closeOnClick: true,
                        classes: 'vue-notification success'
                    });
                })
                .finally(() => {setTimeout(() => {this.modal_loading=false;}, 300);});
            }
        },
        handleReset (name) {
            this.$refs[name].resetFields();
        },

    }
 }

</script>
<style>
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
    right: inherit !important;
    left: 8px !important;
}
.ivu-select-multiple .ivu-select-item-selected::after {
    right: inherit !important;
    left: 8px !important;
}
.ivu-form .ivu-form-item-label {
    float: right !important;
    font-size: 15px !important;
}
.ivu-form-item-error-tip {
    left: inherit !important;
}
</style>
