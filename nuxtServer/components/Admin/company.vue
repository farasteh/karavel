<template>
  <div class="w-100">
    <div class="box-box-list-jobs-admin karavel-box col-12" >
      <div class="row">

        <div class="col-6 col-md-2 center-Object">
          <img class="company-logo"
               :src="!company.logo ? '/images/company/no-photo.jpg': baseUrl+ '/images/company/' + company.logo "
               :alt="company.name_fa">
        </div>
        <div class="col-6 col-md-3 center-Object text-center">
          {{company.name_fa}}
          |
          {{company.name_en}}
          <br/>
          {{company.date}}
          <br/>
          ( {{company.views}}
          بازدید
          )

        </div>
        <div v-if="company.province" class="col-6 col-md-1 center-Object">
          {{ company.province.title }}
        </div>
        <div class="col-6 col-md-2 center-Object">
          <Button  type="primary" @click="careateModel()" >مشاهده آگهی ها</Button>
        </div>
        <div class="col-6 col-md-2 center-Object">
          <nuxt-link :to="`/admin/Companies/show/${company.id}`" class="btn btn-link">
            <Button  type="primary">
              مشاهده جزییات
            </Button>
          </nuxt-link>
        </div>
        <div class="col-6 col-md-2 center-Object">
          <Button  id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true"
                   aria-expanded="false" type="primary"> تبلیغات </Button>
          <div  style="border-radius: .5rem;" class="dropdown-menu" aria-labelledby="navbarDropdown1">
            <div v-if="company.notice" @click="deleteNotice" class="dropdown-item cursor-poiner">
              <Icon class="box-icon" type="ios-share" />
              <span>  غیرفعال کردن</span>
            </div>
            <div v-if="company.notice && company.expire_time != null"  @click="adModel = true" class="dropdown-item cursor-poiner">
              <Icon class="box-icon" type="ios-share" />
              <span> ویرایش تاریخ</span>
            </div>
            <div v-if="!company.notice"  @click="adModel = true" class="dropdown-item cursor-poiner">
              <Icon class="box-icon" type="ios-share" />
              <span>  فعال کردن</span>
            </div>
          </div>
        </div>
        <div class="col-12 d-flex justify-content-center align-items-center text-primary border-top pt-2"
             v-if="company.notice && company.expire_time != null" >
          <p>
            این شرکت تا تاریخ      <span dir="ltr">{{ (company.expire_time.split(' '))[0]}}</span>  در لیست تبلیغات قرار دارد
          </p>
        </div>
      </div>
    </div>

    <Modal v-model="modal11" width="900" footer-hide>
      <div class="row">
        <div v-if="company.advertisings.length == 0" class="text-center text-danger m-auto">هیچ آگهی برای این شرکت ثبت نشده</div>
        <AdminBox v-for="advertising in company.advertisings" :key="advertising.id"
                      :contact="advertising" :place="'company'"></AdminBox>
      </div>
    </Modal>
    <Modal v-model="adModel" class-name="vertical-center-modal" >
      <Form>
        <div class="row">
          <FormItem class="col-12 mb-0" prop="name" label="تاریخ انقضا">
          </FormItem>
          <FormItem class="col-lg-4 col-sm-4" prop="name">
            <v-select
              :class="{vSelectRequired  : $v.Day.$error  }"
              :searchable="false"
              class="vselect-style"
              placeholder="انتخاب روز "
              label="title" :options="days"
              v-model.trim="$v.Day.$model"
              :reduce="d => d.id" taggable>
              <div slot="no-options">موردی یافت نشد !</div>
            </v-select>
          </FormItem>
          <FormItem class="col-lg-4 col-sm-4" prop="name">
            <v-select
              :class="{vSelectRequired  : $v.mount.$error  }"
              :searchable="false"
              class="vselect-style"
              placeholder="انتخاب ماه "
              label="title" :options="montshs"
              v-model.trim="$v.mount.$model"
              :reduce="d => d.id" taggable>
              <div slot="no-options">موردی یافت نشد !</div>
            </v-select>
          </FormItem>
          <FormItem class="col-lg-4 col-sm-4" prop="name" style="direction : ltr">
            <Input
              :class="{ 'ivu-form-item-error ': $v.years.$error,'is-valid': !$v.years.$invalid }" size="large" v-model.trim="$v.years.$model"
              placeholder="78">
              <Select  v-model="yearelect" slot="prepend"
                       style="width: 50px">
                <Option value="13">13</Option>
                <Option value="14">14</Option>
              </Select>
            </Input>
          </FormItem>
        </div>
      </Form>

      <div slot="footer">
        <Button v-if="!company.notice" type="primary" size="large"  long :loading="modal_loading" @click="Notice">ثبت تغییرات</Button>
        <Button v-else type="primary" size="large"  long :loading="modal_loading" @click="editNotice">ثبت تغییرات</Button>
      </div>
    </Modal>
  </div>
</template>
<script>

import vSelect from 'vue-select'
import 'vue-select/dist/vue-select.css';
import {email, maxLength, minLength, numeric, required, requiredIf} from "vuelidate/lib/validators";

export default {
  props:['company'] ,
  components: {
    vSelect
  },
  data() {
    return {
      modal11  : false ,
      adModel : false ,
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

      modal_loading : false ,
      yearelect: '14',
      years: '',
      mount: '',
      Day: '',
    }
  },
  validations: {

    Day: {
      required
    },
    mount: {
      required
    },
    years: {
      numeric ,
      minLength: minLength(2) ,
      maxLength: maxLength(2) ,
      required
    }
  },
  computed :{
    baseUrl() {
      return this.$store.state.globalFunctions.APP_URL
    }
  },
  methods : {
    careateModel (resume) {
      this.modal11 = true
    },
    Daasate() {
      this.company.expire_time = this.yearelect + this.years + '-' + this.mount + '-' + this.Day;
    },
    ArrayDate() {
      if(this.company.expire_time != null) {
        this.Array1 = this.company.expire_time.split("-");
        this.DayArray = this.Array1[2].split(" ");
        this.mount = this.Array1[1];
        this.Day = this.DayArray[0];
        this.yearelect = this.Array1[0].substr(0, 2)
        this.years = this.Array1[0].substr(2, 2)
      }
    },
    Notice () {
      if (this.$v.$invalid) {
        this.$v.$touch()
        this.$store.dispatch('globalFunctions/ErrorNotify')
      } else {
        this.Daasate ()
        this.modal_loading = true

        this.$store.dispatch('Company/companyNotice/setCompanyNotice' ,  {
          'form' : {
            company_id   : this.company.id ,
            expire_time  : this.company.expire_time
          }})
          .then(res => {
            this.modal_loading = false
            this.$store.dispatch('globalFunctions/SuccessNotify' , 'با موفقیت به لیست تبلیغات اضافه شد.')
            this.adModel = false
            this.company.notice = true
          })
      }
    } ,
    deleteNotice()  {
      this.modal_loading = true
      this.$store.dispatch('Company/companyNotice/DeleteCompanyNotice', {'id': this.company.id})
        .then(res => {
          this.modal_loading = false
          this.company.notice = false
          this.company.expire_time = null
          this.years = ''
          this.mount = ''
          this.Day = ''
          this.$store.dispatch('globalFunctions/SuccessNotify' , `شرکت ${this.company.name_fa} با موفقبت از لیست تبلیغات حذف شد. `)
        })
    },
    editNotice() {
      if (this.$v.$invalid) {
        this.$v.$touch()
        this.$store.dispatch('globalFunctions/ErrorNotify')
      } else {
        this.Daasate ()
        this.modal_loading = true
        this.$store.dispatch('Company/companyNotice/UpdateCompanyNotice', {
          'id': this.company.id,
          'form': {
            expire_time: this.company.expire_time
          }
        })
          .then(res => {
            this.modal_loading = false
            this.$store.dispatch('globalFunctions/SuccessNotify' , `شرکت ${this.company.name_fa} با موفقبت ویرایش شد. `)
            this.adModel = false
          })
      }
    } ,
    checkExpireTime () {
      if(this.company.today_time > this.company.expire_time){
        this.$store.dispatch('Company/companyNotice/UpdateCompanyNotice', {'id': this.company.id})
        this.company.notice = false
        this.company.expire_time = null
      }

    }
  } ,
  created() {
    this.ArrayDate()
  } ,
  mounted() {
    this.checkExpireTime()
  }
}
</script>
<style scoped>
.ivu-modal-close .ivu-icon-ios-close{
  font-size: 40px !important;
}
.company-logo {
  width: 60px ;
  height: 60px;
  border-radius: 50%;
  display: flex;
  justify-content: center;
  align-items: center;
}
.center-Object {
  display: flex;
  justify-content: center;
  align-items: center;
}
.ivu-modal {
  width: 580px !important;
}
.ivu-modal-body{
  padding: 25px !important;
}


</style>
