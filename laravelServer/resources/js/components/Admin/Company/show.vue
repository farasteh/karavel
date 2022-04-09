<template>
    <div>
        <div class="container">
            <div class="row text-">
                <div style="margin: auto;"  class="col-lg-10 col-md-12 col-sm-12 offset-lg-4 offset-md-3">
                    <div class="text-center">
                        <div style="font-size: 18px;" class="font-size-3xl font-weight-bold color-grey-dark-2 mb-4">مشاهده اطلاعات شرکت</div>
                    </div>
                    <div class="card box-shadow-lg p-3">
                        <div class="card-body">
                            <div>
                                <Form ref="formValidate">
                                    <div class="row">
                                        <FormItem class="col-md-6"  label="نام شرکت به فارسی">
                                            <Input :class="{ 'ivu-form-item-error animation-error': $v.Company.name_fa.$error,'is-valid': !$v.Company.name_fa.$invalid }"
                                                   v-model.trim="$v.Company.name_fa.$model" disabled></Input>
                                            <div class="ivu-form-item-error-tip" v-if="$v.Company.name_fa.$error">فیلد مورد نظر را پرکنید</div>
                                        </FormItem>
                                        <FormItem class="col-md-6" label="نام شرکت به انگلیسی">
                                            <Input :class="{ 'ivu-form-item-error animation-error': $v.Company.name_en.$error,'is-valid': !$v.Company.name_en.$invalid }"
                                                   dir="ltr"  v-model.trim="$v.Company.name_en.$model" disabled></Input>
                                            <div class="ivu-form-item-error-tip" v-if="$v.Company.name_en.$error">فیلد مورد نظر را پرکنید</div>
                                        </FormItem>
                                        <FormItem class="col-md-6" label="لوگوی شرکت">
                                            <Upload
                                                :on-success="handleSuccess"
                                                multiple
                                                action="api/v1/Upload">
                                                <Button icon="ios-cloud-upload-outline">انتخاب و آپلود فایل لوگو</Button>
                                            </Upload>
                                            <img v-if="Company.logo" style="width: 68px;"
                                                 :src="'/images/company/' + Company.logo"
                                                 :alt="$v.Company.name_fa.$model">
                                        </FormItem>
                                        <FormItem class="col-md-6" label="بنر شرکت">
                                            <Upload
                                                :on-success="handleBannerSuccess"
                                                multiple
                                                name="img"
                                                action="api/v1/Upload">
                                                <Button icon="ios-cloud-upload-outline">انتخاب و آپلود فایل بنر</Button>
                                            </Upload>
                                            <img v-if="Company.banner" style="width: 68px;"  :src="'/images/company/' + Company.banner"
                                                 :alt="$v.Company.name_fa.$model" >
                                        </FormItem>

                                        <FormItem class="col-md-6" label="استان">
                                            <Col span="12" >
                                                <v-select
                                                    :class="{ vSelectRequired  : $v.Company.province.$error ,  vselectHide  : showCity }"
                                                    class="vselect-style"
                                                    placeholder="انتخاب کنید "
                                                    label="title" :options="provinceList"
                                                    v-model="$v.Company.province.$model"
                                                    @input="takeCity()"
                                                    :reduce="d => d.id" taggable></v-select>
                                                <div class="ivu-form-item-error-tip" v-if="$v.Company.province.$error">فیلد مورد نظر را پرکنید</div>
                                            </Col>
                                        </FormItem>
                                        <FormItem class="col-md-6" label="شهر">
                                            <Col span="12" >
                                                <v-select
                                                    :class="{ vSelectRequired  : $v.Company.city.$error ,  vselectHide  : showCity }"
                                                    class="vselect-style"
                                                    placeholder="انتخاب کنید "
                                                    label="title" :options="Citys"
                                                    v-model="$v.Company.city.$model"
                                                    :reduce="d => d.id" taggable></v-select>
                                                <div class="ivu-form-item-error-tip" v-if="$v.Company.city.$error">فیلد مورد نظر را پرکنید</div>
                                            </Col>
                                        </FormItem>
                                        <FormItem class="col-md-6" label="سال تاسیس">
                                            <Input :class="{ 'ivu-form-item-error animation-error': $v.Company.year.$error,'is-valid': !$v.Company.year.$invalid }"
                                                   v-model.trim="$v.Company.year.$model" dir="ltr"></Input>
                                            <div class="text-sm text-red" v-if="$v.Company.year.$error" style="position:absolute">
                                                <span class="text-danger" v-if="!$v.Company.year.yaerForm">  فرمت تاریخ نادرست است </span>
                                            </div>
                                        </FormItem>
                                        <FormItem class="col-md-6" label="شماره تماس">
                                            <Input :class="{ 'ivu-form-item-error ': $v.Company.Phone.$error,'is-valid': !$v.Company.Phone.$invalid }"
                                                   v-model.trim="$v.Company.Phone.$model" dir="ltr"></Input>
                                            <div class="ivu-form-item-error-tip" v-if="$v.Company.Phone.$error">فیلد مورد نظر را پرکنید</div>
                                        </FormItem>
                                        <FormItem class="col-md-6" label="آدرس وب سایت شرکت"  >
                                            <Input v-model="$v.Company.address_site.$model" dir="ltr" ></Input>
                                        </FormItem>
                                        <FormItem class="col-md-6" label="تعداد پرسنل">
                                            <Input :class="{ 'ivu-form-item-error animation-error': $v.Company.Employee_count.$error,'is-valid': !$v.Company.Employee_count.$invalid }"
                                                   v-model.trim="$v.Company.Employee_count.$model" dir="ltr"></Input>
                                            <div class="text-sm text-red" v-if="$v.Company.Employee_count.$error">

                                                <span class="text-danger" v-if="!$v.Company.Employee_count.numeric"> لطفا یک عدد وارد کنید  </span>
                                            </div>

                                        </FormItem>
                                        <FormItem  class="col-12" label="حوزه فعالیت شرکت">

                                            <Select
                                                :class="{ 'ivu-form-item-error': $v.Company.Activity_id.$error,'is-valid': !$v.Company.Activity_id.$invalid }"
                                                size="large"
                                                v-model="$v.Company.Activity_id.$model"
                                                multiple
                                                filterable
                                                placeholder="حوزه فعالیت شرکت"

                                            >
                                                <Option v-for="(item, index) in ActivityCompanyList" :value="item.id" :key="index">{{item.title}}</Option>
                                            </Select>
                                            <div class="ivu-form-item-error-tip" v-if="$v.Company.Activity_id.$error">فیلد مورد نظر را پرکنید</div>
                                        </FormItem>
                                        <FormItem label="معرفی شرکت به کارجو" class="col-12">

                                                <Input type="textarea" :autosize="{minRows: 7,maxRows: 10}"  placeholder="شرکت خود را در چند جمله برای بازخورد بهتر کارجو معرفی کنید..."
                                                       :class="{ 'ivu-form-item-error animation-error': $v.Company.comment.$error,'is-valid': !$v.Company.comment.$invalid }"
                                                       v-model.trim="$v.Company.comment.$model"></Input>
                                                <div class="ivu-form-item-error-tip" v-if="$v.Company.comment.$error">فیلد مورد نظر را پرکنید</div>

                                        </FormItem>
                                        <FormItem style="margin: auto;"  class="col-md-6">
                                            <Button :loading="modal_loading" @click="handleSubmit()" type="primary">ثبت و تغییرات اطلاعات</Button>
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
import {required, minLength, url, numeric, helpers} from 'vuelidate/lib/validators'
import Loading from 'vue-loading-overlay';
import vSelect from 'vue-select'
import 'vue-select/dist/vue-select.css';
// Import stylesheet
import 'vue-loading-overlay/dist/vue-loading.css';

const nameEn = helpers.regex('nameEn', /^[A-Za-z][A-Za-z0-9]*$/)
const nameFa = helpers.regex('nameEn',  /^[\u0600-\u06FF\s]+$/)
const yaerForm = helpers.regex('yaerForm', /^1[3,4]\d{2}$/)

export default {
    components : { Loading , vSelect },
    data () {
        return {
            showCity : true,
            loading : false ,
            fullPage : false ,
            modal_loading : false
        }
    },
    validations: {
        Company: {
            name_fa:{
                required
            },
            name_en:{
                required
            } ,
            province : {
                required
            } ,
            city : {
                required
            } ,
            Phone  : {
                required
            } ,
            address_site : {
            } ,
            Employee_count : {
                required,
                numeric
            } ,
            comment  : {
            } ,
            Activity_id :{

            } ,
            logo : {
            } ,
            banner : {} ,
            year : {yaerForm}
        },
    },
    mounted() {
        this.loading = true
        this.$store.dispatch('LoadProvinces').then(response =>  {this.showCity = false});
        this.$store.dispatch('LoadAdminCompany' , {id : this.$route.params.id } )
            .then(response => {
                this.loading =false
        })
        this.$store.dispatch('LoadJobs');

    },
    computed : {
        provinceList(){return this.$store.state.Province.provinces;},
        Citys() { return this.$store.getters.getCities(this.$v.Company.province.$model)},
        Company() { return this.$store.state.AdminCompany.adminCompany},
        ActivityCompanyList () { return this.$store.state.Job.Jobs },
    },
    watch :{
    },
    methods: {
        takeCity () {
            this.$v.Company.city.$model = ''
        },
        handleSuccess (res, file) {
            this.$v.Company.logo.$model = res.data.data;
        },
        handleBannerSuccess (res , file) {
            this.$v.Company.banner.$model = res.data.data;
        } ,
        handleSubmit () {
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
                this.$store.dispatch('updateAdminCompany',{ id : this.Company.id , form  : this.$v.Company.$model })
                    .then(response =>{
                        this.$notify({
                            group: 'success',
                            title: 'success',
                            text: response.data.data.message,
                            duration: 10000,
                            speed: 1000,
                            closeOnClick: true,
                            classes: 'vue-notification success'
                        });
                        this.$router.push({name :'AdminCompaniesList' }).catch(() => {});
                        this.modal_loading= false;

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
                    });

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
