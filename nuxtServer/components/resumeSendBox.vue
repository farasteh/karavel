<template>
  <div>
    <div class="box-show-page mt-2 resume-send-box-res">
      <div>
        <div class="box-form-header box-form-header-back mBox"  v-if="!loading">
          <img  v-if="image != undefined" :src="appurl+'/images/company/'+ image">
          <img  v-if="image == null" src="~/assets/images/company/no-photo.jpg" >
        </div>
        <Vcl-list rtl v-if="loading"></Vcl-list>
        <Form ref="formValidate" v-if="!loading">
          <div class="d-flex justify-content-between" v-if="memberRole == 'Member'">
            <p class="my-2">
              {{$store.getters['User/User/Fullname']}}
            </p>
            <p class="my-2 karavel-rank">
              نمره کاراولی {{ Member.member.rank }}%
            </p>
          </div>
          <FormItem prop="money" v-if="memberRole == 'Member'" class="mb-2">
            <Input  v-if="$store.getters['Site/Advertising/moneyGet'](id)" :value="$store.getters['Site/Advertising/moneyGet'](id)" disabled/>
            <Select v-else :class="{ 'ivu-form-item-error': $v.money.$error,'is-valid': !$v.money.$invalid }"
                    size="large" placeholder="حقوق درخواستی"
                    :disabled="$store.getters['Site/Advertising/HasSent'](id)"
                    v-model.trim="$v.money.$model">
              <Option v-for="(item,index) in moneys" :value="item.id"
                      :key="index">{{ item.title }}</Option>
            </Select>
            <span class="text-danger"
                  v-if="$v.money.$error"> لطفا حقوق درخواستی را انتخاب کنید </span>
          </FormItem>
          <FormItem v-if="!$store.getters['Site/Advertising/HasSent' ] (id) && memberRole == 'Member'" class="mb-0">
            <div class="alert alert-karavel mt-2 text-center" v-if="!uploading">
              به صورت اتوماتیک رزومه کاراولی شما ارسال میشود
              <br/>
              یا
              <span class="text-danger cursor-poiner" @click="uploading = true">رزومه دیگری آپلود کنید</span>
            </div>
            <div v-if="form.file && uploading" class="resume-uploaded-box">
              <div>{{form.file}}</div>
              <div class="position-absolute cursor-poiner font-20" style="left: 10px;">
                <Icon type="ios-eye" class="cursor-poiner" @click="download"/>
                <Icon type="md-trash" class="cursor-poiner"  @click="removePdf" />
              </div>

            </div>
            <file-upload id="pdf"  v-if="uploading && !form.file "
                         url="https://api.karavel.ir/api/v1/Upload"
                         accept=".pdf"
                         btnLabel="رزومه خود را انتخاب کنید"
                         btnUploadingLabel="در حال آپلود"
                         @change="onFileChange"
                         class="mt-2 mb-3"
            >
            </file-upload>
            <span class="text-danger" v-if="error">{{error}}</span>
          </FormItem>
          <Button v-if="memberRole == 'Member' && !$store.getters['Site/Advertising/HasSent'](id) "
                  @click="sendResume"  type="primary" size="large" long
                  :loading="modal_loading"  class="karavel-btn"
                  :disabled="$store.getters['Site/Advertising/HasSent'] (id)">
ارسال رزومه
          </Button>
          <div class="alert text-center mt-2" :class="messageType"
               v-if="$store.getters['Site/Advertising/HasSent'](id)  && message">{{ message }}
          </div>
          <div v-if="memberRole != 'Member'">
            <div v-if="memberRole == 'Company'" class="alert alert-danger text-center mt-2">
              <a @click="Gologin">
                <span class="text-dark">شما با پروفایل کارفرما وارد شده اید برای ارسال رزومه با پروفایل کارجو وارد شوید</span>
              </a>
            </div>
            <div v-else-if="memberRole == 'Admin'" class="alert alert-danger text-center mt-2">
              <span class="text-dark">شما با پروفایل ادمین وارد شده اید</span>
            </div>
            <div  v-else class="text-center  alert alert-danger text-dark text-center  mt-2" style="background: #e8e8e8; border-color: #e8e8e8">
              <a @click="Gologin" class="text-dark">
                برای ارسال رزومه لطفا وارد شوید
              </a>
            </div>
          </div>
        </Form>
      </div>
    </div>
  </div>
</template>
<script>

import {required} from "vuelidate/lib/validators";
import { VclList } from 'vue-content-loading';
export default {
  name : 'resumeSendBox' ,
  components : { VclList },
  props : ['loading'  , 'memberRole' , 'Member' , 'adId' , 'moneys'],
  validations: {
    money: {
      required
    }
  },
  data() {
    return {
      form: {
        advertising: '',
        file: ''
      },
      uploading: false,
      error: '',
      message: 'شما قبلا به این آگهی رزومه ارسال کرده اید',
      money: '' ,
      modal_loading: false,
      messageType: 'alert-primary',
    }
  },
  computed : {
    appurl() {
      return this.$store.state.globalFunctions.APP_URL
    },
    image() {
      if(this.memberRole == 'Member')
        if(this.Member)
          return this.Member.member.image
    },
    id() {
      if(this.memberRole == 'Member')
        if(this.Member)
          return this.Member.member.id
    },
    pdf() {
      // if(this.memberRole == 'Member')
      //     if(this.Member)
      //     {
      //         this.form.file = this.Member.member.file
      //         return this.Member.member.file
      //     }
      if(this.form.file) {
        return this.form.file
      }
    },
  },
  methods  :{
    removePdf() {
      this.form.file = ''
      this.uploading = true
    },
    onFileChange(res, file) {
      if(res.data.error)
      {
        this.error = 'فرمت فایل انتخابی نادرست است'
      }
      else
      {
        this.error  = ''
        this.form.file = res.data.data
        //this.uploading = false
        //this.$store.commit('SET_PDF', res.data.data)
      }
    },

    download() {
      window.open(`${this.appurl}/pdfs/resume/${this.pdf}`, "_blank");
    },
    async sendResume() {
      if (this.$v.$invalid) {
        this.$v.$touch()
        this.$store.dispatch('globalFunctions/ErrorNotify')
      } else {
        this.modal_loading = true
        this.form.advertising = this.adId
        this.form.money = this.money
        this.$store.dispatch('Site/Advertising/sendResume', {form: this.form, id: this.Member.member.id})
          .then(response => {
            this.$store.dispatch('globalFunctions/SuccessNotify' , 'رزومه شما با موفقیت به این آگهی ارسال شد')

            this.message = 'رزومه شما ارسال شد'
            this.messageType = 'alert-success'
          })
          .catch(error => console.log(error))
          .finally(() => this.modal_loading = false)
      }

    } ,
    Gologin() {
      if ( this.memberRole == '') {
        this.$store.commit('Auth/redirect/SET_ROUTE' , {
          route : {name : this.$route.fullPath }
        })
        this.$router.push({path : '/users/login-register/Member'})
      }
      else if(this.memberRole == 'NOTMember')
        this.$router.push({path : '/register/member'})
      else if(this.memberRole == 'NOTCompany')
        this.$router.push({path : '/register/company'})
    },
  },
  watch: {
    $route() {
      this.form.file = ''
      this.uploading = false
    }
  }
}
</script>

<style>

</style>
