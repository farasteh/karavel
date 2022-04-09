<template>
    <div>
        <Form ref="formValidate">
            <span class="text-box">اطلاعات پایه</span>

            <div class="card box-user-resume mt-3">
                <div class="p-3" v-if="loading">
                    <resume-loading></resume-loading>
                </div>
                <div v-else class="row">
                    <div class="col-md-2">
                        <div style="margin-top: 27px;">
                            <span></span>
                            <div class="center-image-upload">
                                <img class="img-preview"
                                     :src="Base.image == '' || Base.image == null ? '/images/company/no-photo.jpg' : '/images/company/' + Base.image">
                                <my-upload field="img"
                                           @crop-success="cropSuccess"
                                           @crop-upload-success="cropUploadSuccess"
                                           @crop-upload-fail="cropUploadFail"
                                           v-model="show"
                                           langType=fa
                                           url="api/v1/Upload"
                                           :params="params"
                                           :headers="headers"
                                           :width="200"
                                           :height="200"
                                           noSquare
                                           :langExt="langExt"
                                           img-format="png">
                                </my-upload>
                                <Button class="mt-3" size="large" @click="toggleShow" icon="ios-download-outline"
                                        type="primary" shape="circle"></Button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="row ">
                            <FormItem class="col-lg-3 col-md-6" label="نام" prop="name">
                                <span class="required-star">*</span>
                                <Input
                                    :class="{ 'ivu-form-item-error animation-error': $v.Base.name.$error,'is-valid': !$v.Base.name.$invalid }"
                                    size="large" v-model.trim="$v.Base.name.$model" placeholder="نام"></Input>
                                <div class="text-sm text-red" v-if="$v.Base.name.$error">
                                    <span class="text-danger" v-if="!$v.Base.name.required">فیلد نام اجباری است </span>
                                </div>
                            </FormItem>
                            <FormItem class="col-lg-3 col-md-6" label="نام خانوادگی" prop="name">
                                <span class="required-star">*</span>
                                <Input
                                    :class="{ 'ivu-form-item-error animation-error': $v.Base.last_name.$error,'is-valid': !$v.Base.last_name.$invalid }"
                                    size="large" v-model.trim="$v.Base.last_name.$model"
                                    placeholder="نام خانوادگی"></Input>
                                <div class="text-sm text-red" v-if="$v.Base.last_name.$error">
                                    <span class="text-danger" v-if="!$v.Base.last_name.required">فیلد نام خانوادگی اجباری است </span>
                                </div>
                            </FormItem>
                            <FormItem class="col-lg-3 col-md-6" label="جنسیت" prop="name">
                                <v-select
                                    :class="{ vselectHide  : showGender }"
                                    class="vselect-style"
                                    placeholder="انتخاب کنید "
                                    label="title" :options="Gender"
                                    v-model.trim="$v.Base.gender.$model"
                                    :reduce="d => d.id" taggable></v-select>
                            </FormItem>
                            <FormItem class="col-lg-3 col-md-6" label="وضعیت تاهل" prop="name">
                                <v-select
                                    class="vselect-style"
                                    placeholder="انتخاب کنید "
                                    label="title" :options="material"
                                    v-model.trim="$v.Base.marital_status.$model"
                                    :reduce="d => d.id" taggable></v-select>
                            </FormItem>
                        </div>
                        <div class="row ">
                            <FormItem class="col-lg-3 col-md-6" label="دسته بندی شغلی" prop="name">
                                <span class="required-star">*</span>
                                <v-select
                                    :class="{vSelectRequired  : $v.Base.job.$error , vselectHide  : showJob }"
                                    class="vselect-style"
                                    placeholder="انتخاب کنید "
                                    label="title" :options="Jobs"
                                    v-model.trim="$v.Base.job.$model"
                                    @input="CategoryJob()"
                                    :reduce="d => d.id" taggable></v-select>
                                <div class="text-sm text-red" v-if=" $v.Base.job.$error">
                                    <span class="text-danger" v-if="! $v.Base.job.required">فیلد  عنوان شغلی اجباری است </span>
                                </div>
                            </FormItem>
                            <FormItem class="col-lg-3 col-md-6" label="زیرمجموعه شغلی" prop="name">
                                <span class="required-star">*</span>
                                <v-select
                                    :class="{vSelectRequired  : $v.Base.category_job.$error ,  vselectHide  : showJob }"
                                    class="vselect-style"
                                    placeholder="انتخاب کنید "
                                    label="title" :options="CategoryJobs"
                                    v-model.trim="$v.Base.category_job.$model"
                                    :reduce="d => d.id" taggable></v-select>
                                <div class="text-sm text-red" v-if=" $v.Base.category_job.$error">
                                    <span class="text-danger" v-if="! $v.Base.category_job.required">فیلد عنوان شغلی اجباری است </span>
                                </div>
                            </FormItem>
                            <FormItem class="col-lg-3 col-md-6" label="وضعیت سربازی" prop="name">
                                <v-select
                                    :class="{ vselectHide  : showSoldier }"
                                    class="vselect-style"
                                    placeholder="انتخاب کنید "
                                    label="title" :options="Soldier"
                                    v-model.trim="$v.Base.soldier.$model"
                                    :reduce="d => d.id" taggable></v-select>
                            </FormItem>
                        </div>
                        <div class="row ">
                            <FormItem class="col-md-12 " label="تاریخ تولد" prop="name">

                                <div class="row col-md-8">
                                    <v-select
                                        style="padding-left: 5px;padding-right: 5px;"
                                        class="col-4 vselect-style"
                                        placeholder="انتخاب کنید "
                                        label="title" :options="days"
                                        v-model.trim="$v.Day.$model"
                                        @change="Daasate()"
                                        :reduce="d => d.id" taggable></v-select>
                                    <v-select
                                        style="padding-left: 5px;padding-right: 5px;"
                                        class="col-4 vselect-style"
                                        placeholder="انتخاب کنید "
                                        label="title" :options="montshs"
                                        v-model.trim="$v.mount.$model"
                                        @change="Daasate()"
                                        :reduce="d => d.id" taggable></v-select>
                                    <div style="padding-left: 5px;padding-right: 5px;direction: ltr;"
                                         class="col-md-4 col-5">
                                        <Input
                                            :class="{ 'ivu-form-item-error ': $v.years.$error,'is-valid': !$v.years.$invalid }"
                                            @on-keyup="Daasate()" size="large" v-model.trim="$v.years.$model"
                                            placeholder="78">
                                            <Select @on-change="Daasate()" v-model="yearelect" slot="prepend"
                                                    style="width: 50px">
                                                <Option value="13">13</Option>
                                                <Option value="14">14</Option>
                                            </Select>
                                        </Input>
                                    </div>
                                </div>
                            </FormItem>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-5">
                <span class="text-box">اطلاعات تماس</span>
                <div class="card box-user-resume mt-3">
                    <div class="p-3" v-if="loading">
                        <resume-loading></resume-loading>
                    </div>
                    <div v-else class="row">
                        <FormItem class="col-lg-3 col-md-6" label=" ایمیل" size="large" prop="name">
                            <Input
                                :class="{ 'ivu-form-item-error animation-error': $v.Base.email.$error,'is-valid': !$v.Base.email.$invalid }"
                                size="large" style="direction:ltr" v-model.trim="$v.Base.email.$model"
                                placeholder="user@example.com"></Input>

                            <div class="text-sm text-red" v-if="$v.Base.email.$error">
                                <span class="text-danger" v-if="!$v.Base.email.email">  فرمت ایمیل نادرست است   </span>
                            </div>
                        </FormItem>
                        <FormItem class="col-lg-3 col-md-6" label="موبایل" prop="name">
                            <span class="required-star">*</span>
                            <Input
                                :class="{ 'ivu-form-item-error animation-error': $v.Base.mobile.$error,'is-valid': !$v.Base.mobile.$invalid }"
                                size="large" style="direction:ltr" v-model.trim="$v.Base.mobile.$model"
                                placeholder="09xxxxxxxxx"></Input>
                            <div class="text-sm text-red" v-if="$v.Base.mobile.$error">
                                <span class="text-danger"
                                      v-if="!$v.Base.mobile.mobile">  فرمت موبایل نادرست است   </span>
                                <span class="text-danger"
                                      v-if="!$v.Base.mobile.required">  فیلد موبایل اجباری است   </span>
                            </div>
                        </FormItem>
                        <FormItem class="col-lg-3 col-md-6" label="تلفن" prop="name">
                            <Input
                                :class="{ 'ivu-form-item-error animation-error': $v.Base.phone.$error,'is-valid': !$v.Base.phone.$invalid }"
                                size="large" style="direction:ltr" v-model.trim="$v.Base.phone.$model"
                                placeholder="xxxxxxxx"></Input>
                            <div class="text-sm text-red" v-if="$v.Base.phone.$error">
                                <span class="text-danger" v-if="!$v.Base.phone.numeric">تلفن باید عدد باشد</span>
                                <span class="text-danger" v-if="!$v.Base.phone.maxLength">تلفن باید 8 رقم باشد</span>
                            </div>
                        </FormItem>
                        <FormItem class="col-lg-3 col-md-6" label=" وب سایت " prop="name">
                            <Input
                                :class="{ 'ivu-form-item-error animation-error': $v.Base.site.$error,'is-valid': !$v.Base.site.$invalid }"
                                size="large" style="direction:ltr" v-model.trim="$v.Base.site.$model"
                                placeholder="http://example.com"></Input>
                        </FormItem>
                        <FormItem class="col-lg-3 col-md-6" label="  استان" prop="name">
                            <v-select
                                :class="{ vselectHide  : showCity }"
                                class="vselect-style"
                                placeholder="انتخاب کنید "
                                label="title" :options="Provinces"
                                v-model="Base.province"
                                @input="City()"
                                :reduce="d => d.id" taggable></v-select>
                        </FormItem>
                        <FormItem class="col-lg-3 col-md-6" label="شهر" prop="name">
                            <v-select
                                :class="{ vselectHide  : showCity }"
                                class="vselect-style"
                                placeholder="انتخاب کنید "
                                label="title" :options="Citys"
                                v-model="Base.city"
                                :reduce="d => d.id" taggable></v-select>
                        </FormItem>
                        <FormItem class="col-lg-6" label="آدرس" prop="name">
                            <Input size="large" v-model="Base.address" placeholder="آدرس"></Input>
                        </FormItem>
                    </div>
                </div>
            </div>
            <div class="mt-5">
                <span>شبکه های اجتماعی</span>
                <div>
                    <Form ref="socialNetworkCreate" :model="socailNetworkResumes" >
                        <div class="row" v-if="Socialloading">
                            <div class="col-lg-6">
                                <div class="card box-user-resume mt-2 p-3">
                                    <resume-loading></resume-loading>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card box-user-resume mt-2 p-3">
                                    <resume-loading></resume-loading>
                                </div>
                            </div>
                        </div>
                        <draggable v-else tag="transition-group"
                                   :componentData="componentData"
                                   :list="socailNetworkResumes.items"
                                   class=" row"
                                   :animation="100"
                                   @start="dragging = true"
                                   @end="dragging = false">
                                <div v-for=" ( item , index ) in $v.socailNetworkResumes.items.$each.$iter" :key="index"
                                     class="col-lg-6">
                                    <div class="card box-user-resume mt-2">
                                        <div  class="row">
                                            <div style="z-index: 99" class="btn-delet-form"
                                                 @click="removeSocial(item.id.$model , index)">
                                                <Icon type="md-close"/>
                                            </div>
                                            <FormItem
                                                label="شبکه اجتماعی"
                                                class="col-md-6">
                                                <v-select
                                                    :class="{vSelectRequired  :  item.social_network.$error , vselectHide  : showSocial }"
                                                    class="vselect-style"
                                                    placeholder="انتخاب کنید "
                                                    label="title" :options="socialNetwork"
                                                    v-model.trim="item.social_network.$model"
                                                    :reduce="d => d.id" taggable></v-select>
                                            </FormItem>
                                            <FormItem
                                                label="آدرس شبکه اجتماعی"
                                                class="col-md-6">
                                                <Input type="text" style="direction:ltr ; text-align :left;"
                                                       v-model.trim="item.link.$model" placeholder="@username"></Input>
                                            </FormItem>
                                        </div>
                                    </div>
                                </div>
                        </draggable>
                        <FormItem class="mt-2">
                            <div type="dashed" class="box-add-item" >
                                <Icon type="md-add btn-icon-add-item" style="cursor: pointer" @click="addNewSocial"/>
                                <div style="padding: 18px;"> شبکه اجتماعی دیگری را اضافه کنید</div>
                            </div>
                        </FormItem>
                    </Form>
                </div>
            </div>
        </Form>
        <div class="box-btn-resume">
            <button @click="BaseResume()" type="submit" class="btn custom-btn btn-15 ">ذخیره و ادامه</button>
        </div>
        <DialogLoading :show="modal2"></DialogLoading>
    </div>
</template>
<script>
import {email, helpers, maxLength,minLength,between, numeric, required, requiredIf} from 'vuelidate/lib/validators';
import DialogLoading from '../../Loading/DialogLoading.vue'
import draggable from "vuedraggable";
import myUpload from 'vue-image-crop-upload';
import vSelect from 'vue-select'
import 'vue-select/dist/vue-select.css';
import resumeLoading from "../../Loading/resumeLoading";


const mobile = helpers.regex('mobile', /^(\+98|0098|98|0)?9\d{9}$/)
const year = helpers.regex('year', /^d{2}$/)
const instagram = helpers.regex('instagram', /^(?!.*\.\.)(?!.*\.$)[^\W][\w.]{0,29}$/)
const socilId = helpers.regex('socilId', /^@?(\w){1,15}$/)
const youtube = helpers.regex('youtube', /(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/)

export default {
    components: {
        draggable,
        DialogLoading,
        'my-upload': myUpload ,
        vSelect ,
        resumeLoading
    },

    data() {
        return {
            showJob :  true  ,
            showGender : true ,
            showSoldier : true ,
            showCity    : true ,
            showSocial : true ,
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
            show: false,
            params: {
                token: '123456798',
                name: 'avatar'
            },
            headers: {
                smail: '*_~'
            },
            imgDataUrl: '', // the datebase64 url of created image
            langExt: {
                hint: 'فایل خود را اینحا بکشید',
                loading: 'در حال آپلود ...',
                noSupported: 'Browser is not supported, please use IE10+ or other browsers',
                success: 'آپلود موفق',
                fail: 'آپلود ناموفق',
                preview: 'پیش نمایش',
                btn: {
                    off: 'کنسل',
                    close: 'بستن',
                    back: 'برگشت',
                    save: 'ذخیره'
                },
                error: {
                    onlyImg: 'فقط عکس ',
                    outOfSize: 'سایز عکس بزرگ است: ',
                    lowestPx: 'سایز عکس کوچک است'
                }
            },

            dragging: true,
            componentData: {
                props: {
                    type: "transition",
                    name: "flip-list"
                }
            },
            socailNetworkResumeIndex: 0,
            DayArray: '',
            Array1: '',
            yearelect: '13',
            years: '',
            mount: '',
            Day: '',
            edd: '',
            modal_loading: false,
            modal2: false ,
            loading : false ,
            Socialloading : false
        }
    },
    validations: {
        Base: {
            name: {
                required,
            },
            last_name: {
                required,
            },
            gender: {},
            marital_status: {},
            soldier: {},
            job: {
                required
            },
            category_job: {
                required
            },
            email: {
                email
            },
            phone: {
                numeric,
                maxLength: maxLength(11)
            },
            site: {

            },
            mobile: {
                mobile,
                required
            },
        },
        socailNetworkResumes : {
            items : {
                $each:  {
                    social_network : {
                        required: requiredIf(function (value) {
                            if(value.link)
                                return true
                            return  false
                        })
                    } ,
                    link :{},
                    id: {}
                }
            }
        } ,
        Day: {},
        mount: {},
        years: {numeric ,  minLength: minLength(2) ,  maxLength: maxLength(2)}
    },
    computed: {
        Base() {return this.$store.state.BaseRezome.Base},
        Jobs() {return this.$store.state.Job.Jobs;},
        CategoryJobs() {  return  this.$store.getters.getJobcategory(this.$v.Base.job.$model)},
        Gender() {return this.$store.state.Gender.Gender;},
        Soldier() {return this.$store.state.Soldier.Soldier;},
        Provinces() {return this.$store.state.Province.provinces;},
        Citys() { return this.$store.getters.getCities(this.Base.province)},
        socialNetwork() {return this.$store.state.socailNetwork.socailNetwork;},
        socailNetworkResumes() {return this.$store.getters.socialResume},
        countSocial() {return this.$store.getters.countSocialResume}
    },
    created() {
        this.loading = true
        this.Socialloading =true
        this.$store.dispatch('LoadBaseResume').then(response => {this.loading = false})
        this.$store.dispatch('LoadJobs').then(response =>  {this.showJob = false});
        this.$store.dispatch('LoadGender').then(response =>  {this.showGender = false});
        this.$store.dispatch('LoadSoldier').then(response =>  {this.showSoldier = false});
        this.$store.dispatch('LoadProvinces').then(response =>  {this.showCity = false});
        this.$store.dispatch('loadSocialNetwork').then(response =>  {this.showSocial = false});
        this.$store.dispatch('loadSocialResume').then(response => {this.Socialloading = false});
    },
    watch: {
        Base() {
            this.ArrayDate();
        } ,
    },
    methods: {
        toggleShow() {
            this.show = !this.show;
        },
        cropSuccess(imgDataUrl, field) {
            console.log('-------- crop success --------');
            this.imgDataUrl = imgDataUrl;
        },
        cropUploadSuccess(jsonData, field) {
            console.log('-------- upload success --------');
            console.log(jsonData);
            this.Base.image = jsonData.data.data
            console.log('field: ' + field);
        },
        cropUploadFail(status, field) {
            console.log('-------- upload fail --------');
            console.log(status);
            console.log('field: ' + field);
        },
        BaseResume() {
            if (this.$v.$invalid) {
                this.$v.$touch()
                this.$notify({
                    group: 'foo',
                    width: '400px',
                    title: 'فرم دارای خطاست',
                    text: 'لطفا قبل از ثبت اطلاعات خطاهای خود را بررسی کنید',
                    duration: 1000,
                    speed: 1000,
                    closeOnClick: true,
                    classes: 'vue-notification success'
                });
            } else {
                this.modal2 = true;
                this.$store.dispatch('UpdateBaseResume', {
                    'base': this.$store.state.BaseRezome.Base,
                    'socailNetworkResumes': this.$store.state.socialNetworkResume.socialResume
                })
                    .then(success => {
                        this.$store.commit('NumberStep', 2)
                        this.$notify({
                            group: 'success',
                            title: 'success',
                            text: success.data.data.message,
                        })
                        this.$store.commit('SET_BASE_IMAGE_PRO' , this.Base.image )
                    })
                    .catch(error => {
                        this.$notify({
                            group: 'foo',
                            title: 'Oops',
                            text: 'فرم شما با خطا مواجه شد لطفا دوباره تلاش کنید',
                        })
                    })
                    .finally(() => {
                        this.modal2 = false
                    });
            }
        },
        ArrayDate() {
            if(this.Base.birth_date) {
                this.Array1 = this.Base.birth_date.split("-");
                this.DayArray = this.Array1[2].split(" ");
                this.mount = this.Array1[1];
                this.Day = this.DayArray[0];
                this.yearelect = this.Array1[0].substr(0, 2)
                this.years = this.Array1[0].substr(2, 2)
            }

        },
        handleSuccess(res, file) {
            this.Base.image = res;
        },
        CategoryJob() {
            this.$v.Base.category_job.$model = ''
        },
        Daasate() {
            this.Base.birth_date = this.yearelect + this.years + '-' + this.mount + '-' + this.Day;
        },
        City() {
            this.Base.city = ''
        },
        addNewSocial() {
            this.socailNetworkResumeIndex++;
            this.socailNetworkResumes.items.push({
                base_resume: this.$store.state.BaseRezome.Base.id,
                link: '',
                social_network: '',
                type: 'create',
            })
        },
        addResumeBox(count) {
            if (count == 0) {
                this.addNewSocial();
                this.addNewSocial();
            }
        },
        removeSocial(id, index) {
            if (this.socailNetworkResumes.items[index].type && this.socailNetworkResumes.items[index].type == 'create') {
                if (this.countSocial > 1)
                    this.socailNetworkResumes.items.splice(index, 1);
                else if(this.countSocial == 1)  {
                    this.socailNetworkResumes.items[0].social_network = ''
                    this.socailNetworkResumes.items[0].link = ''
                }
            } else {
                this.$confirm("آیا اطمینان دارید؟").then(() => {
                    this.$store.dispatch('deleteSocialResume',
                        {
                            'id': id,
                            'index': index
                        });
                })
                    .then(() => {
                        this.$notify({
                            group: 'success',
                            title: 'success',
                            text: 'این آیتم با موفقیت حذف شد',
                        })
                    }).then(() => {
                    if (this.countSocial == 0)
                    {
                        this.addNewSocial()
                    }
                })

            }
        },
    },

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
.box-add-item {
    cursor: initial !important;
}
.box-user-resume {
    box-shadow: 0 15px 30px 0 rgba(0, 0, 0, 0.11), 0 5px 15px 0 rgba(0, 0, 0, 0.08);
    border-radius: 0.5rem;
    border: 0px;
    padding: 10px;
    border: 1px solid #1e88e5;
}

.ivu-form .ivu-form-item-label {
    color: #949494 !important;
}

.text-box {
    font-size: 16px;
    padding: 16px;
}

.center-form-base {
    display: flex;
    justify-content: center;
    justify-items: baseline;
    align-items: self-end;
    justify-content: center;
    flex-wrap: wrap;

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
.btn-delet-form {
    top: -5px;
}
</style>
