<template>
  <div>
    <Form ref="formValidate">
      <span class="text-box">اطلاعات پایه</span>
      <div class="card box-user-resume mt-3">
        <div class="p-3" v-if="loading">
          <lodingResumeLoading></lodingResumeLoading>
        </div>
        <div v-else class="row">
          <div class="col-lg-2">
            <div style="margin-top: 27px;">
              <div class="center-image-upload">
                <img class="img-preview"
                     :src="Base.image == '' || Base.image == null ? '/images/company/no-photo.jpg' : `${appUrl}/images/company/` + Base.image">
                <my-upload field="img"
                           @crop-success="cropSuccess"
                           @crop-upload-success="cropUploadSuccess"
                           v-model="show" img-format="png"
                           langType=fa url="https://api.karavel.ir/api/v1/Upload"
                           :params="params" :headers="headers"
                           :width="200" :height="200"
                           noSquare :langExt="langExt">
                </my-upload>
                <Button class="mt-3 karavel-btn" size="large" @click="toggleShow"
                        icon="ios-download-outline" type="primary" shape="circle"></Button>
              </div>
            </div>
          </div>
          <div class="col-lg-10">
            <div class="row ">
              <FormItem class="col-lg-3 col-md-6" label="نام" prop="name">
                <span class="required-star">*</span>
                <Input :class="{ 'ivu-form-item-error animation-error': $v.Base.name.$error,'is-valid': !$v.Base.name.$invalid }"
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
                <Select2 placeholder="انتخاب کنید" v-model="$v.Base.gender.$model" :options="Gender"  :searchable="false"/>
              </FormItem>
              <FormItem class="col-lg-3 col-md-6" label="وضعیت تاهل" prop="name">
                <Select2 placeholder="انتخاب کنید" v-model="$v.Base.marital_status.$model" :options="material"  :searchable="false"/>
<!--                <v-select-->
<!--                  :searchable="false"-->
<!--                  class="vselect-style"-->
<!--                  placeholder="انتخاب کنید "-->
<!--                  label="title" :options="material"-->
<!--                  v-model.trim="$v.Base.marital_status.$model"-->
<!--                  :reduce="d => d.id">-->
<!--                  <div slot="no-options">موردی یافت نشد !</div>-->
<!--                </v-select>-->
              </FormItem>
            </div>
            <div class="row">
              <FormItem class="col-lg-3 col-md-6" label="تخصص نهایی" prop="name">
                <span class="required-star">*</span>
                <Select2 placeholder="انتخاب کنید"
                         :class="{vSelectRequired  : $v.Base.job.$error}"
                         v-model="$v.Base.job.$model" :options="Jobs"  :searchable="false"  @change="CategoryJob()"/>
<!--                <v-select-->
<!--                  :class="{vSelectRequired  : $v.Base.job.$error , vselectHide  : showJob }"-->
<!--                  class="vselect-style"-->
<!--                  placeholder="انتخاب کنید "-->
<!--                  label="title" :options="Jobs"-->
<!--                  v-model.trim="$v.Base.job.$model"-->
<!--                  @input="CategoryJob()"-->
<!--                  :reduce="d => d.id">-->
<!--                  <div slot="no-options">موردی یافت نشد !</div>-->
<!--                </v-select>-->
                <div class="text-sm text-red" v-if=" $v.Base.job.$error">
                  <span class="text-danger" v-if="! $v.Base.job.required">فیلد  عنوان شغلی اجباری است </span>
                </div>
              </FormItem>
              <FormItem class="col-lg-3 col-md-6" label="زیرمجموعه شغلی" prop="name">
                <span class="required-star">*</span>
                <Input  v-if="showText && showJob"
                        size="large"
                        placeholder="زیرمجموعه شغلی"></Input>
                <Input  v-else-if="showText && !showJob"
                        :class="{ 'ivu-form-item-error animation-error': $v.Base.category_job.$error,'is-valid': !$v.Base.category_job.$invalid }"
                        size="large" v-model.trim="$v.Base.category_job.$model"
                        placeholder="زیرمجموعه شغلی"></Input>
                <Select2 v-else v-model="$v.Base.category_job.$model" :options="CategoryJobs" placeholder="انتخاب کنید"
                         :searchable="false"  :class="{vSelectRequired  : $v.Base.category_job.$error  }"/>
<!--                <v-select v-else-->
<!--                          :class="{vSelectRequired  : $v.Base.category_job.$error ,  vselectHide  : showJob }"-->
<!--                          class="vselect-style"-->
<!--                          placeholder="انتخاب کنید "-->
<!--                          label="title" :options="CategoryJobs"-->
<!--                          v-model.trim="$v.Base.category_job.$model"-->
<!--                          :reduce="d => d.id">-->
<!--                  <div slot="no-options">موردی یافت نشد !</div>-->
<!--                </v-select>-->
                <div class="text-sm text-red" v-if=" $v.Base.category_job.$error">
                  <span class="text-danger" v-if="! $v.Base.category_job.required">فیلد عنوان شغلی اجباری است </span>
                </div>
              </FormItem>
              <FormItem class="col-lg-3 col-md-6" label="وضعیت سربازی" prop="name">
                <Select2  :options="Soldier" :searchable="false" v-model="$v.Base.soldier.$model" placeholder="انتخاب کنید"></Select2>
<!--                <v-select-->
<!--                  :searchable="false"-->
<!--                  :class="{vselectHide  : showSoldier}"-->
<!--                  class="vselect-style"-->
<!--                  placeholder="انتخاب کنید "-->
<!--                  label="title" :options="Soldier"-->
<!--                  v-model.trim="$v.Base.soldier.$model"-->
<!--                  :reduce="d => d.id">-->
<!--                  <div slot="no-options">موردی یافت نشد !</div>-->
<!--                </v-select>-->
              </FormItem>
            </div>
            <div class="row">
              <FormItem class="col-12 mb-0" prop="name" label="تاریخ تولد">
              </FormItem>
              <FormItem class="col-lg-3 col-sm-4" prop="name">
                <Select2  :options="days" :searchable="false"
                          v-model="$v.Day.$model" :class="{vSelectRequired  : $v.Day.$error  }"  placeholder="انتخاب روز "></Select2>
<!--                <v-select-->
<!--                  :class="{vSelectRequired  : $v.Day.$error  }"-->
<!--                  :searchable="false"-->
<!--                  class="vselect-style"-->
<!--                  placeholder="انتخاب روز "-->
<!--                  label="title" :options="days"-->
<!--                  v-model.trim="$v.Day.$model"-->
<!--                  :reduce="d => d.id">-->
<!--                  <div slot="no-options">موردی یافت نشد !</div>-->
<!--                </v-select>-->
              </FormItem>
              <FormItem class="col-lg-3 col-sm-4" prop="name">
                <Select2  :options="montshs" :searchable="false"
                          v-model="$v.mount.$model" placeholder="انتخاب ماه " :class="{vSelectRequired  : $v.mount.$error  }"></Select2>
<!--                <v-select-->
<!--                  :class="{vSelectRequired  : $v.mount.$error  }"-->
<!--                  :searchable="false"-->
<!--                  class="vselect-style"-->
<!--                  placeholder="انتخاب ماه "-->
<!--                  label="title" :options="montshs"-->
<!--                  v-model.trim="$v.mount.$model"-->
<!--                  :reduce="d => d.id">-->
<!--                  <div slot="no-options">موردی یافت نشد !</div>-->
<!--                </v-select>-->
              </FormItem>
              <FormItem class="col-lg-3 col-sm-4" prop="name" style="direction : ltr">
                <Input @input="convertYear2English()"
                       :class="{ 'ivu-form-item-error ': $v.years.$error,'is-valid': !$v.years.$invalid }"
                       size="large" v-model.trim="$v.years.$model"
                       placeholder="78">
                  <Select v-model="yearelect" slot="prepend"
                          style="width: 50px">
                    <Option value="13">13</Option>
                    <Option value="14">14</Option>
                  </Select>
                </Input>
              </FormItem>

            </div>
          </div>
        </div>
      </div>
      <div class="mt-5">
        <span class="text-box">اطلاعات تماس</span>
        <div class="card box-user-resume mt-3">
          <div class="p-3" v-if="loading">
            <lodingResumeLoading></lodingResumeLoading>
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
                disabled
                @input="convertMobile2English"
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
                @input="convertPhone2English"
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
              <span class="required-star">*</span>
              <Select2 placeholder="انتخاب کنید"
                       :class="{vSelectRequired  : $v.Base.province.$error}"
                       v-model="$v.Base.province.$model" :options="Provinces"
                       :searchable="false"  @change="City()"/>
<!--              <v-select-->
<!--                :class="{ vselectHide  : showCity }"-->
<!--                class="vselect-style"-->
<!--                placeholder="انتخاب کنید "-->
<!--                label="title" :options="Provinces"-->
<!--                v-model="Base.province"-->
<!--                @input="City()"-->
<!--                :reduce="d => d.id">-->
<!--                <div slot="no-options">موردی یافت نشد !</div>-->
<!--              </v-select>-->
            </FormItem>
            <FormItem class="col-lg-3 col-md-6" label="شهر" prop="name">
              <span class="required-star">*</span>
              <Select2 placeholder="انتخاب کنید"
                       :class="{vSelectRequired  : $v.Base.city.$error}"
                       v-model="$v.Base.city.$model" :options="Citys"  :searchable="false" />
<!--              <v-select-->
<!--                :class="{ vselectHide  : showCity }"-->
<!--                class="vselect-style"-->
<!--                placeholder="انتخاب کنید "-->
<!--                label="title" :options="Citys"-->
<!--                v-model="Base.city"-->
<!--                :reduce="d => d.id">-->
<!--                <div slot="no-options">موردی یافت نشد !</div>-->
<!--              </v-select>-->
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
                  <lodingResumeLoading></lodingResumeLoading>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="card box-user-resume mt-2 p-3">
                  <lodingResumeLoading></lodingResumeLoading>
                </div>
              </div>
            </div>
            <draggable v-else tag="transition-group"
                       :componentData="componentData"
                       :list="socailNetworkResumes.items"
                       class=" row"
                       :animation="100"
                       @start="dragging = true"
                       handle=".handle"
                       @end="dragging = false">
              <div v-for=" ( item , index ) in $v.socailNetworkResumes.items.$each.$iter" :key="index"
                   class="col-lg-6">
                <div class="card box-user-resume mt-2">
                  <i  class="fas fa-exchange-alt handle" style="font-size: 16px; cursor: pointer"></i>
                  <div  class="row">
                    <div style="z-index: 99" class="btn-delet-form"
                         @click="removeSocial(item.id.$model , index)">
                      <Icon type="md-close"/>
                    </div>
                    <FormItem
                      label="شبکه اجتماعی"
                      class="col-md-6">
                      <Select2 placeholder="انتخاب کنید" :class="{vSelectRequired  :  item.social_network.$error }"
                               v-model="item.social_network.$model" :options="socialNetwork"  :searchable="false" />
<!--                      <v-select-->
<!--                        :searchable="false"-->
<!--                        :class="{vSelectRequired  :  item.social_network.$error , vselectHide  : showSocial }"-->
<!--                        class="vselect-style"-->
<!--                        placeholder="انتخاب کنید "-->
<!--                        label="title" :options="socialNetwork"-->
<!--                        v-model.trim="item.social_network.$model"-->
<!--                        :reduce="d => d.id">-->
<!--                        <div slot="no-options">موردی یافت نشد !</div>-->
<!--                      </v-select>-->
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
              <div type="dashed" class="box-add-item  mobile-save-btn" >
                <Icon type="md-add btn-icon-add-item" @click="addNewSocial"/>
                <div style="padding: 18px;"> شبکه اجتماعی دیگری را اضافه کنید</div>
              </div>
            </FormItem>
          </Form>
        </div>
      </div>
    </Form>
    <div class="box-btn-resume">
      <button @click="BaseResume()" type="submit" class="btn custom-btn karavel-btn">ذخیره و ادامه</button>
    </div>
    <lodingDialogLoading :show="modal2"></lodingDialogLoading>
  </div>
</template>
<script>
import {email, helpers, maxLength , minLength, numeric, required, requiredIf} from 'vuelidate/lib/validators';

import vSelect from 'vue-select'
import 'vue-select/dist/vue-select.css';
import myUpload from 'vue-image-crop-upload';
const mobile = helpers.regex('mobile', /^(\+98|0098|98|0)?9\d{9}$/)
const year = helpers.regex('year', /^d{2}$/)

export default {
  components: {
    'my-upload': myUpload ,
    vSelect ,
  },
  data() {
    return {
      showJob :  false  ,
      showGender : false ,
      showSoldier : false ,
      showCity    : false ,
      showSocial : false ,
      showText  : false ,
      material : [
        {
          id  : 1  ,
          text  : 'متاهل'
        },
        {
          id  : 0  ,
          text  : 'مجرد'
        },
      ] ,
      days : [
        {
          id : '01' ,
          text : '01'
        } ,
        {
          id : '02' ,
          text : '02'
        } ,
        {
          id : '03' ,
          text : '03'
        } ,
        {
          id : '04' ,
          text : '04'
        } ,
        {
          id : '05' ,
          text : '05'
        } ,
        {
          id : '06' ,
          text : '06'
        } ,
        {
          id : '07' ,
          text : '07'
        } ,
        {
          id : '08' ,
          text : '08'
        } ,
        {
          id : '09' ,
          text : '09'
        } ,
        {
          id : '10' ,
          text : '10'
        } ,
        {
          id : '11' ,
          text : '11'
        } ,
        {
          id : '12' ,
          text : '12'
        } ,
        {
          id : '13' ,
          text : '13'
        } ,
        {
          id : '14' ,
          text : '14'
        } ,
        {
          id : '15' ,
          text : '15'
        } ,
        {
          id : '16' ,
          text : '16'
        } ,
        {
          id : '17' ,
          text : '17'
        } ,
        {
          id : '18' ,
          text : '18'
        } ,
        {
          id : '19' ,
          text : '19'
        } ,
        {
          id : '20' ,
          text : '20'
        } ,
        {
          id : '21' ,
          text : '21'
        } ,
        {
          id : '22' ,
          text : '22'
        } ,
        {
          id : '23' ,
          text : '23'
        } ,
        {
          id : '24' ,
          text : '24'
        } ,
        {
          id : '25' ,
          text : '25'
        } ,
        {
          id : '26' ,
          text : '26'
        } ,
        {
          id : '27' ,
          text : '27'
        } ,
        {
          id : '28' ,
          text : '28'
        } ,
        {
          id : '29' ,
          text : '29'
        } ,
        {
          id : '30' ,
          text : '30'
        } ,
        {
          id : '31' ,
          text : '31'
        } ,
      ] ,
      montshs : [
        {
          id : '01' ,
          text : 'فروردین'
        },
        {
          id : '02' ,
          text : 'اردیبهشت'
        },
        {
          id : '03' ,
          text : 'خرداد'
        },
        {
          id : '04' ,
          text : 'تیر'
        },
        {
          id : '05' ,
          text : 'مرداد'
        },
        {
          id : '06' ,
          text : 'شهریور'
        },
        {
          id : '07' ,
          text : 'مهر'
        },
        {
          id : '08' ,
          text : 'آبان'
        },
        {
          id : '09' ,
          text : 'آذر'
        },
        {
          id : '10' ,
          text : 'دی'
        },
        {
          id : '11' ,
          text : 'بهمن'
        },
        {
          id : '12' ,
          text : 'اسفند'
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
        hint: 'فایل خود را اینجا بکشید',
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
      name: {required},
      last_name: {required},
      gender: {},
      marital_status: {},
      soldier: {},
      job: {required},
      category_job: {required},
      email: {email},
      phone: {numeric, maxLength: maxLength(11)},
      site: {},
      mobile: {mobile, required},
      city : {required} ,
      province : {required}
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
    Day: {
      required: requiredIf(function (value) {
        if(value.years || value.mount)
          return true
        return  false
      })
    },
    mount: {
      required: requiredIf(function (value) {
        if(value.years || value.Day)
          return true
        return  false
      })
    },
    years: {
      numeric ,
      minLength: minLength(2) ,
      maxLength: maxLength(2) ,
      required: requiredIf(function (value) {
        if(value.mount || value.Day)
          return true
        return  false
      })
    }
  },
  computed: {
    Base() {return this.$store.state.Member.Resume.BaseResume.Base},
    Jobs() {return this.$store.state.Jobs.Jobs},
    CategoryJobs() {  return  this.$store.getters['Jobs/getJobcategory'](this.$v.Base.job.$model)},
    Gender() {return this.$store.state.Gender.Gender.Gender},
    Soldier() {return this.$store.state.Soldier.Soldier.Soldier},
    Provinces() {return this.$store.state.Map.Province.provinces},
    Citys() { return this.$store.getters['Map/Province/getCities'](this.$v.Base.province.$model)},
    socialNetwork() {return this.$store.state.SocialNetwork.socailNetwork},
    socailNetworkResumes() {return this.$store.getters['Member/Resume/socialNetworkResume/socialResume']},
    countSocial() {return this.$store.getters['Member/Resume/socialNetworkResume/countSocialResume']} ,
    appUrl(){return this.$store.state.globalFunctions.APP_URL }
  },
  created() {
    this.loading = true
    this.Socialloading =true
    this.showJob = true
    this.$store.dispatch('Member/Resume/BaseResume/LoadBaseResume').then(
      response => {
        this.loading = false
        this.$store.dispatch('Jobs/LoadJobs').then(response =>  {this.showJob = false});
      }
    )


    if( this.Gender.length == 0) {
      this.showGender = true
      this.$store.dispatch('Gender/Gender/LoadGender').then(response =>  {this.showGender = false});
    }
    if(this.Soldier.length == 0 ) {
      this.showSoldier = true
      this.$store.dispatch('Soldier/Soldier/LoadSoldier').then(response =>  {this.showSoldier = false});
    }
    if( this.Provinces.length  == 0 ) {
      this.showCity =true
      this.$store.dispatch('Map/Province/LoadProvinces').then(response =>  {this.showCity = false});
    }
    if ( this.socialNetwork.length == 0) {
      this.showSocial = true
      this.$store.dispatch('SocialNetwork/loadSocialNetwork').then(response =>  {this.showSocial = false});
    }
    this.$store.dispatch('Member/Resume/socialNetworkResume/loadSocialResume').then(response => {this.Socialloading = false});
  },
  watch: {
    Base() {
      this.ArrayDate();
      if(this.Base.job == 1)
        this.showText = true
    } ,
    Jobs() {
      if(this.Base.job == 1)
      {
        var cat = this.CategoryJobs.find(x => x.id == this.Base.category_job )
        if(cat)
          this.$v.Base.category_job.$model = cat.title
      }

    }
  },
  methods: {
    nameWithLang({id , title}){
        console.log(id , title)
    },
    toggleShow() {
      this.show = !this.show;
    },
    cropSuccess(imgDataUrl, field) {
      this.imgDataUrl = imgDataUrl;
    },
    cropUploadSuccess(jsonData, field) {
      this.Base.image = jsonData.data.data
    },
    BaseResume() {
      if (this.$v.$invalid) {
        this.$v.$touch()
        this.$store.dispatch('globalFunctions/ErrorNotify')
      } else {
        if(this.yearelect != '' && this.years != '' && this.Day != '' )
          this.Base.birth_date = this.yearelect + this.years + '-' + this.mount + '-' + this.Day;
        this.modal2 = true;
        this.$store.dispatch('Member/Resume/BaseResume/UpdateBaseResume', {
          'base': this.$store.state.Member.Resume.BaseResume.Base,
          'socailNetworkResumes': this.$store.state.Member.Resume.socialNetworkResume.socialResume
        })
          .then(success => {
            window.scrollTo(0, 0);
            this.$store.commit('Member/Form/StepFrom/NumberStep', 2)
            this.$store.dispatch('globalFunctions/SuccessNotify' , success.data.data.message)
            this.$store.commit('User/User/SET_BASE_IMAGE_PRO' , this.Base.image )
          })
          .catch(error => {
            this.$store.dispatch('globalFunctions/ErrorNotify')
          })
          .finally(() => {this.modal2 = false});
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
    handleSuccess(res) {
      this.Base.image = res;
    },
    CategoryJob() {
      if(this.$v.Base.job.$model == 1) {
        this.showText = true
      }
      else this.showText = false
      this.$v.Base.category_job.$model = ''
    },

    City() {
      this.$v.Base.city.$model = ''
    },
    addNewSocial() {
      this.$store.commit('Member/Resume/socialNetworkResume/ADD_CREATE_SOCIAL_RESUME')
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
          this.$store.dispatch('Member/Resume/socialNetworkResume/deleteSocialResume',
            {
              'id': id,
              'index': index
            });
        })
          .then(() => {
            this.$store.dispatch('globalFunctions/SuccessNotify' ,'این آیتم با موفقیت حذف شد' )
          }).then(() => {
          if (this.countSocial == 0)
          {
            this.addNewSocial()
          }
        })
      }
    },
    convertPhone2English: function () {
      this.$v.Base.phone.$model = this.convertNumber2English(this.$v.Base.phone.$model)
    },
    convertMobile2English: function () {
      this.$v.Base.mobile.$model = this.convertNumber2English(this.$v.Base.mobile.$model)
    },
    convertYear2English: function () {
      this.$v.years.$model = this.convertNumber2English(this.$v.years.$model)
    },
    convertNumber2English( num ) {
      return   num.replace(/[\u0660-\u0669]/g, function (c) {
        return c.charCodeAt(0) - 0x0660;
      }).replace(/[\u06f0-\u06f9]/g, function (c) {
        return c.charCodeAt(0) - 0x06f0;
      });
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
</style>
