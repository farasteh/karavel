<template>
  <div>
    <form v-if="$store.state.Auth.Auth.Auth.body" class="login100-form validate-form">
      <nuxt-link  :to="`/users/login-register/${$store.state.Auth.Auth.Auth.body.scope}` " class="box-back" style="left: 20px">
        <i class="fa fa-arrow-left" aria-hidden="true"></i>
      </nuxt-link>
      <span class="login100-form-title p-b-37">تایید کد ارسال شده</span>
      <div class="wrap-input100 validate-input m-b-20" :class="{ 'is-invalid animation-error': $v.code_sms.$error,'is-valid': !$v.code_sms.$invalid }"  data-validate="Enter username or email">
        <input  style="direction: ltr;letter-spacing: 27px;" class="input100 text-center" type="number" v-model.trim="$v.code_sms.$model" name="username"  maxlength="5">
        <span class="focus-input100"></span>
      </div>
      <div class="invalid-feedback text-center position-absolute" style="margin-top: -15px" v-if="!$v.code_sms.required">لطفا کد ارسال شده را وارد کنید.</div>
      <div>
        <vac :left-time="240000"  ref="vac1">
          <template v-slot:process="{ timeObj }">
            <span class="d-flex justify-content-center">{{ `${timeObj.m}:${timeObj.s}` }}</span>
            <div class="container-login100-form-btn">
              <v-btn :loading="loading" text="تایید" @click.native.prevent="LoginSMS()"></v-btn>
            </div>
          </template>
          <template v-slot:finish>
            <span @click="sendSMS"  class="btn btn-link d-flex justify-content-center">ارسال مجدد</span>
            <div class="container-login100-form-btn">
              <button  class="login100-form-btn error-btn">تایید</button>
            </div>
          </template>
        </vac>
      </div>
      <div style="margin-top: 13px;" class="text-center p-t-57 p-b-20">
        <span class="txt1 font-12">برای ادامه ثبت نام کد ارسال شده را وارد کنید.</span>
      </div>
      <div style="margin: 31px 0px 25px;;" class="flex-c p-b-112 text-center">
      </div>
    </form>
  </div>
</template>

<script>

import { required} from 'vuelidate/lib/validators';
export default {
  name: "forget_password",

  headd() {
    return {
      title: 'استخدام آژانس مسافرتی و هواپیمایی - کاراول ',
    }
  },
  data(){
    return{
      loading : false,
      code_sms : ''
    }
  },
  validations:{
    code_sms:{
      required
    }
  },
  mounted() {
    this.handler();
  },
  methods:{
    handler: function () {
      if(this.$store.state.Auth.Auth.Auth.length == 0 ){
        this.$router.push({path : '/'});
        return false;
      }
      if(this.$store.state.Auth.Auth.Auth.body.type != 'login'){
        this.$router.push({path : '/'});
        return false;
      }
    },
    LoginSMS : function (){
      if (this.$v.$invalid) {
        this.$v.$touch()
       this.$store.dispatch('globalFunctions/ErrorNotify')
        return false;
      }
      else {
        this.loading = true
        this.$store.dispatch('Auth/Auth/loginSMS', {'code_sms' : this.code_sms , 'token' : this.$store.state.Auth.Auth.Auth.body })
          .then( response => {
            this.$cookies.set('token', response.data.data.token.token , {
              path: '/',
              maxAge: 60 * 60 * 24 * 7
            })
            // localStorage.setItem('token', response.data.data.token.token);
            if (response.data.data.role == 'Company') {
              if (response.data.data.massage == 'incomplete') {
                this.$cookies.set('role', 'NotCompany' ,
                  {
                    path: '/',
                    maxAge: 60 * 60 * 24 * 7
                  })
                // localStorage.setItem('role', 'NotCompany');
                this.$router.push({path: '/register/company'})
              } else {
                this.$cookies.set('role', 'Company' , {
                  path: '/',
                  maxAge: 60 * 60 * 24 * 7
                })
                // localStorage.setItem('role', 'Company');
                this.$router.push({path: '/posts'})
              }
            }
            else if (response.data.data.role == 'Member') {
              if (response.data.data.massage == 'incomplete') {
                this.$cookies.set('role', 'NotMember' , {
                  path: '/',
                  maxAge: 60 * 60 * 24 * 7
                })
                // localStorage.setItem('role', 'NotMember');
                this.$router.push({path: '/register/member'})
              }
              else {
                this.$cookies.set('role', 'Member' ,{
                  path: '/',
                  maxAge: 60 * 60 * 24 * 7
                })
                // localStorage.setItem('role', 'Member');
                this.$router.push({path: '/member/applied'})
              }
            }})
          .catch( error => {
            this.$store.dispatch('globalFunctions/ErrorAlert' ,error.response.data.data.massage )
          })
          .finally( () => { this.loading = false })
      }

    }
  }
}
</script>

