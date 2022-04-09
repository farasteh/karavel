<template>
  <div>
    <form v-if="$store.state.Auth.Auth.Auth.body" class="login100-form validate-form">
      <nuxt-link  :to="`/users/login-register/${$store.state.Auth.Auth.Auth.body.scope}`  " class="box-back" style="left: 20px">
        <i class="fa fa-arrow-left" aria-hidden="true"></i>
      </nuxt-link>
      <span class="login100-form-title p-b-37">ثبت نام با کد ارسال شده</span>
      <div class="wrap-input100 validate-input m-b-20" :class="{ 'is-invalid animation-error': $v.code_sms.$error,'is-valid': !$v.code_sms.$invalid }"  data-validate="Enter username or email">
        <input  style="direction: ltr;letter-spacing: 27px;text-align: center" class="input100" v-model.trim="$v.code_sms.$model" name="username"  maxlength="5">
        <span class="focus-input100"></span>
      </div>
      <div style="text-align: center;margin-top: 15px;margin-bottom: 11px;" class="invalid-feedback" v-if="!$v.code_sms.required">لطفا کد ارسال شده را وارد کنید.</div>
      <div>
        <vac  :left-time="240000"  ref="vac1">
          <template v-slot:process="{ timeObj }">
            <span class="d-flex justify-content-center">{{ `${timeObj.m}:${timeObj.s}` }}</span>
            <div class="container-login100-form-btn">
              <v-btn :loading="loading" text="ثبت نام" @click.prevent.native="verifyMobile"></v-btn>
            </div>
          </template>
          <template v-slot:finish>
            <span @click="sendSMS()"  class="btn btn-link d-flex justify-content-center">ارسال مجدد</span>
            <div class="container-login100-form-btn">
              <button  class="login100-form-btn error-btn">تایید</button>
            </div>
          </template>
        </vac>
      </div>
      <div style="margin-top: 13px;" class="text-center p-t-57 p-b-20">
        <span style="font-size: 11px;" class="txt1">برای ادامه ثبت نام کد ارسال شده را وارد کنید.</span>
      </div>
      <div style="text-align: center;margin: 31px 0px 25px;;" class="flex-c p-b-112">
      </div>
    </form>
  </div>
</template>
<script>
import { required} from 'vuelidate/lib/validators';

export default {
  name: "verifyMobile",

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
  created() {
  },
  methods:{
    sendSMS : function (){
      this.$store.dispatch('Auth/Auth/CheckMobile', {'mobile' : this.$store.state.Auth.Auth.user.mobile , 'scope' : this.$store.state.Auth.Auth.Auth.body.scope})
        .then(success => {
          this.$refs.vac1.startCountdown(true);
        })
        .catch(error => {})
        .finally( () => {  this.loading = false;});
    },
    verifyMobile : function (){
      if (this.$v.$invalid) {
        this.$v.$touch()
        this.$store.dispatch('globalFunctions/ErrorNotify')
        return false;
      }
      this.loading = true;
      this.$store.dispatch('Auth/Auth/CheckCodeSMS', {'code_sms' : this.code_sms , 'token' : this.$store.state.Auth.Auth.Auth.body.token })
        .then( success => {
          this.$router.push({path : '/users/register'});
        })
        .catch( error => {
          this.$store.dispatch('globalFunctions/ErrorAlert' ,error.response.data.data.massage )
        })
        .finally( () => { this.loading = false })
    },
    handler: function (event) {

      if(this.$store.state.Auth.Auth.Auth.length == 0 ){
        this.$router.push({path : '/'});
        return false;
      }

      if(this.$store.state.Auth.Auth.Auth.body.type != 'register'){
        this.$router.push({path : '/'});
        return false;
      }

    }
  },
  mounted() {
    this.handler();
  }
}
</script>

<style scoped>

</style>
