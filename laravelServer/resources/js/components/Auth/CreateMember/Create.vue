<template>
    <div class="pt-5 col-md-10 m-auto">
        <div class="box-list-jobs-info mb-4" style="background: #1e88e5 ; color: #fff">
            <p class="pt-3 px-3 text-right ">
                کارجوی گرامی به پنل کاراول خوش آمدید.
            </p>
            <p class="px-3 text-right ">
                 برای شروع، اطلاعات اولیه خود را کامل و سپس یک رزومه کاری خوب بسازید.
            </p>
            <p class="px-3 pb-3 text-right">
                  پیشنهاد می کنیم که رزومه خود را بسیار کامل بسازید، این کار به موتور جستجوی کاراول کمک می کند تا شما را بهتر نمایش دهد و در نتیجه شغل بهتری براساس نیاز کارفرمایان پیدا کنید، ضمنا برای شما این مزیت را دارد که شغل مناسب تری پیدا کنید.
            </p>
        </div>
        <div class="card box-user-resume">

            <Form ref="formValidate"  >
                <div class="row">
                    <div class="col-md-12">
                        <div class="row col-12">
                            <FormItem  class="col-md-3" label="نام" prop="name">
                                <span class="required-star">*</span>
                                <Input :class="{ 'ivu-form-item-error animation-error': $v.Base.name.$error,'is-valid': !$v.Base.name.$invalid }"
                                       placeholder="نام"    v-model.trim="$v.Base.name.$model"></Input>
                                <div class="text-sm text-red" v-if="$v.Base.name.$error">
                                    <span class="text-danger" v-if="!$v.Base.name.required">فیلد نام اجباری است </span>
                                </div>
                            </FormItem>
                            <FormItem class="col-md-3" label="نام خانوادگی" prop="name">
                                <span class="required-star">*</span>
                                <Input  placeholder="نام خانوادگی"
                                        :class="{ 'ivu-form-item-error animation-error': $v.Base.last_name.$error,'is-valid': !$v.Base.last_name.$invalid }"
                                        v-model.trim="$v.Base.last_name.$model" ></Input>
                                <div class="text-sm text-red" v-if="$v.Base.last_name.$error">
                                    <span class="text-danger" v-if="!$v.Base.last_name.required">فیلد نام خانوادگی اجباری است </span>
                                </div>
                            </FormItem>
                            <FormItem  class="col-md-3" label="موبایل" prop="name">
                                <span class="required-star">*</span>
                                <Input placeholder="09xxxxxxxxx" :class="{ 'ivu-form-item-error animation-error': $v.Base.mobile.$error,'is-valid': !$v.Base.mobile.$invalid }"
                                       v-model.trim="$v.Base.mobile.$model"></Input>
                                <div class="text-sm text-red" v-if="$v.Base.mobile.$error">
                                    <span class="text-danger" v-if="!$v.Base.mobile.required">فیلد موبایل اجباری است </span>
                                    <span class="text-danger" v-if="!$v.Base.mobile.mobile">  فرمت موبایل نادرست است   </span>
                                </div>
                            </FormItem>
                            <FormItem  class="col-md-3" label="ایمیل" prop="name">
                                <Input   placeholder="email@mail.com"  :class="{ 'ivu-form-item-error animation-error': $v.Base.email.$error,'is-valid': !$v.Base.email.$invalid }"
                                         v-model.trim="$v.Base.email.$model"></Input>
                                <div class="text-sm text-red" v-if="$v.Base.email.$error">
                                    <span class="text-danger" v-if="!$v.Base.email.email">فرمت ایمیل نادرست است </span>
                                </div>
                            </FormItem>
                            <FormItem class="col-md-3" label="دسته یندی شغلی" prop="name">
                                <span class="required-star">*</span>
                                <v-select
                                    :class="{vSelectRequired  :  $v.Base.job.$error }"
                                    class="vselect-style"
                                    placeholder="انتخاب کنید "
                                    label="title" :options="Jobs"
                                    v-model="$v.Base.job.$model"
                                    @input="CategoryJob()"
                                    :reduce="d => d.id" taggable></v-select>
                                <div class="text-sm text-red" v-if="$v.Base.job.$error">
                                    <span class="text-danger" v-if="!$v.Base.job.required">فیلد عنوان شغلی اجباری است </span>
                                </div>
                            </FormItem>
                            <FormItem class="col-md-3" label="زیرمجموعه شغلی" prop="name">
                                <span class="required-star">*</span>
                                <v-select
                                    :class="{vSelectRequired  : $v.Base.category_job.$error}"
                                    class="vselect-style"
                                    placeholder="انتخاب کنید "
                                    label="title" :options="CategoryJobs"
                                    v-model.trim="$v.Base.category_job.$model"
                                    :reduce="d => d.id" taggable></v-select>
                                <div class="text-sm text-red" v-if="$v.Base.category_job.$error">
                                    <span class="text-danger" v-if="!$v.Base.category_job.required">فیلد دسته بندی شغلی اجباری است </span>
                                </div>
                            </FormItem>
                            <FormItem class="col-md-3" label="وضعیت سربازی" prop="name">
                                <v-select
                                    class="vselect-style"
                                    placeholder="انتخاب کنید "
                                    label="title" :options="Soldier"
                                    v-model.trim="$v.Base.soldier.$model"
                                    :reduce="d => d.id" taggable></v-select>
                            </FormItem>
                            <FormItem class="col-md-3" label="جنسیت" prop="name">
                                <v-select
                                    class="vselect-style"
                                    placeholder="انتخاب کنید "
                                    label="title" :options="Gender"
                                    v-model.trim="$v.Base.gender.$model"
                                    :reduce="d => d.id" taggable></v-select>
                            </FormItem>
                            <FormItem class="col-md-3" label="وضعیت تاهل" prop="name">
                                <v-select
                                    class="vselect-style"
                                    placeholder="انتخاب کنید "
                                    label="title" :options="material"
                                    v-model.trim="$v.Base.marital_status.$model"
                                    :reduce="d => d.id" taggable></v-select>
                            </FormItem>
                            <FormItem class="col-md-3 " label="تاریخ تولد" prop="name">
                                <v-select
                                    class="vselect-style"
                                    placeholder="انتخاب کنید "
                                    label="title" :options="days"
                                    v-model.trim="$v.Day.$model"
                                    @change="Daasate()"
                                    :reduce="d => d.id" taggable></v-select>
                            </FormItem>
                            <FormItem class=" col-md-3 ">
                                <label style="opacity: 0;">ssdsd</label>
                                <v-select
                                    :class="{vSelectRequired  : $v.mount.$error}"
                                    class="vselect-style"
                                    placeholder="انتخاب کنید "
                                    label="title" :options="montshs"
                                    v-model.trim="$v.mount.$model"
                                    @change="Daasate()"
                                    :reduce="d => d.id" taggable></v-select>
                            </FormItem>
                            <FormItem class="col-3">
                                <label style="opacity: 0;">ssdsd</label>
                                <Input style="padding-left: 5px;padding-right: 5px;direction: ltr;"   :class="{ 'ivu-form-item-error ': $v.years.$error,'is-valid': !$v.years.$invalid }" @on-keyup="Daasate()" v-model.trim="$v.years.$model" placeholder="">

                                    <Select @on-change="Daasate()" v-model="yearelect" slot="prepend" style="width: 50px">
                                        <Option  value="13">13</Option>
                                        <Option value="14">14</Option>
                                    </Select>
                                </Input>
                            </FormItem>
                        </div>
                        <div style="margin: auto;" class="row col-8">
                            <FormItem style="width: 100%;">
                                <Button :loading="modal_loading" style="width: 100%;" @click="creatResume()" type="primary" >ثبت اطلاعات</Button>
                            </FormItem>
                        </div>
                    </div>
                </div>
            </Form>
        </div>
    </div>
</template>
<script>
import {required, minLength, email, helpers , numeric , maxLength} from 'vuelidate/lib/validators';
import vSelect from 'vue-select'
import 'vue-select/dist/vue-select.css';
const mobile = helpers.regex('mobile', /^(\+98|0098|98|0)?9\d{9}$/);
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
    data(){
        return{
            yearelect:'13',
            years:'',
            mount:'',
            Day:'',
            modal_loading:false,
            material : [
                {
                    id  : 1  ,
                    title  : 'متاهل'
                },
                {
                    id  : 0  ,
                    title  : 'مجرد'
                },
            ] ,
            days : [
                {
                    id : '01' ,
                    title : '01'
                } ,
                {
                    id : '02' ,
                    title : '02'
                } ,
                {
                    id : '03' ,
                    title : '03'
                } ,
                {
                    id : '04' ,
                    title : '04'
                } ,
                {
                    id : '05' ,
                    title : '05'
                } ,
                {
                    id : '06' ,
                    title : '06'
                } ,
                {
                    id : '07' ,
                    title : '07'
                } ,
                {
                    id : '08' ,
                    title : '08'
                } ,
                {
                    id : '09' ,
                    title : '09'
                } ,
                {
                    id : '10' ,
                    title : '10'
                } ,
                {
                    id : '11' ,
                    title : '11'
                } ,
                {
                    id : '12' ,
                    title : '12'
                } ,
                {
                    id : '13' ,
                    title : '13'
                } ,
                {
                    id : '14' ,
                    title : '14'
                } ,
                {
                    id : '15' ,
                    title : '15'
                } ,
                {
                    id : '16' ,
                    title : '16'
                } ,
                {
                    id : '17' ,
                    title : '17'
                } ,
                {
                    id : '18' ,
                    title : '18'
                } ,
                {
                    id : '19' ,
                    title : '19'
                } ,
                {
                    id : '20' ,
                    title : '20'
                } ,
                {
                    id : '21' ,
                    title : '21'
                } ,
                {
                    id : '22' ,
                    title : '22'
                } ,
                {
                    id : '23' ,
                    title : '23'
                } ,
                {
                    id : '24' ,
                    title : '24'
                } ,
                {
                    id : '25' ,
                    title : '25'
                } ,
                {
                    id : '26' ,
                    title : '26'
                } ,
                {
                    id : '27' ,
                    title : '27'
                } ,
                {
                    id : '28' ,
                    title : '28'
                } ,
                {
                    id : '29' ,
                    title : '29'
                } ,
                {
                    id : '30' ,
                    title : '30'
                } ,
                {
                    id : '31' ,
                    title : '31'
                } ,
            ] ,
            montshs : [
                {
                    id : '01' ,
                    title : 'فروردین'
                },
                {
                    id : '02' ,
                    title : 'اردیبهشت'
                },
                {
                    id : '03' ,
                    title : 'خرداد'
                },
                {
                    id : '04' ,
                    title : 'تیر'
                },
                {
                    id : '05' ,
                    title : 'مرداد'
                },
                {
                    id : '06' ,
                    title : 'شهریور'
                },
                {
                    id : '07' ,
                    title : 'مهر'
                },
                {
                    id : '08' ,
                    title : 'آبان'
                },
                {
                    id : '09' ,
                    title : 'آذر'
                },
                {
                    id : '10' ,
                    title : 'دی'
                },
                {
                    id : '11' ,
                    title : 'بهمن'
                },
                {
                    id : '12' ,
                    title : 'اسفند'
                },
            ] ,
            yearsx  : [
                {
                    id : 13 ,
                    title : 13
                } ,
                {
                    id : 14  ,
                    title:  14
                }
            ],
        }

    },
     validations: {
        Base:{
            name:{
               required,
            },
            last_name:{
                required,
            },
            gender:{
            },
            marital_status:{
            },
            soldier:{
            },
            job:{
               required,
            },
            category_job:{
                required,
            },

            email : {
                email
            } ,
            mobile : {
                required ,
                mobile
            }
        },
        Day:{

        },
        mount:{

        },

        years: {numeric ,  minLength: minLength(2) ,  maxLength: maxLength(2)}

     },
    mounted(){
        this.$store.dispatch('LoadJobs');
        this.$store.dispatch('LoadGender');
        this.$store.dispatch('LoadSoldier');
    },
    computed:{

        Base(){ return this.$store.state.BaseRezome.Base},
        Jobs(){return this.$store.state.Job.Jobs;},
        CategoryJobs() {  return  this.$store.getters.getJobcategory(this.$v.Base.job.$model)},
        //CategoryJobs(){return this.$store.state.CategoryJob.CategoryJobs;},
        Gender(){return this.$store.state.Gender.Gender;},
        Soldier(){return this.$store.state.Soldier.Soldier;},
    },
    methods: {
        handleSuccess (res, file) {
            this.Base.image = res;
        },
        CategoryJob(){
            this.$v.Base.category_job.$model = ''
          // this.$store.dispatch('LoadCategoryJobs',{'id': this.Base.job });
        },
        Daasate(){
            this.Base.birth_date =this.yearelect+this.years+'-'+this.mount+'-'+this.Day;
        },

        creatResume(){
            if (this.$v.$invalid) {
                this.$v.$touch()
                this.$notify({
                    group: 'foo',
                    width : '400px',
                    title: 'فرم دارای خطاست',
                    text: 'لطفا قبل از ثبت اطلاعات خطاهای خود را بررسی کنید',
                    duration: 1000,
                    speed: 1000,
                    closeOnClick: true,
                    classes: 'vue-notification success'
                });
            }else{
                this.modal_loading=true;
                this.$store.dispatch('CreateBaseResume',this.Base)
                .then(success =>{
                    this.$notify({
                        group: 'success',
                        title: 'success',
                        text: success.data.data.message,
                    });
                    this.$router.push({ name: 'appliedResume' }).catch(() => {});
                })
                .catch(error =>{
                    this.$notify({
                        group: 'foo',
                        title: 'Oops',
                        text:'فرم شما با خطا مواجه شد لطفا دوباره تلاش کنید',
                    });
                })
                .finally(() =>{this.modal_loading=false;})
            }
        }
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
.ivu-select-single .ivu-select-selection .ivu-select-selected-value {
    line-height: 35px !important;
    margin-left: 5px !important;
}
/* width: 120px;
height: 120px;
border-radius: 50%;
border: 5px solid #ccc; */
</style>
