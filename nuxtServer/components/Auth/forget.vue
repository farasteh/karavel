<template>
  <div>
    <form>
      <nuxt-link to="/" class="box-back" style="left: 20px">
        <i class="fa fa-arrow-left" aria-hidden="true"></i>
      </nuxt-link>
      <span class="login100-form-title p-b-37">فراموشی رمز عبور</span>
      <div class="wrap-input100 validate-input m-b-20" :class="{ 'is-invalid animation-error': $v.user.mobile.$error,'is-valid': !$v.user.mobile.$invalid }"  data-validate="Enter username or email">
        <input style="direction: ltr;" class="input100"  type="number" v-model.trim="$v.user.mobile.$model"  placeholder="شماره موبایل خود را وارد کنید">
        <span class="focus-input100"></span>
      </div>
      <div class="invalid-feedback text-center position-absolute" style="margin-top: -15px" v-if="!$v.user.mobile.required">لطفا شماره موبایل خود راوارد کنید.</div>
      <div class="invalid-feedback text-center position-absolute" style="margin-top: -15px" v-if="!$v.user.mobile.mobileList">فرمت شماره موبایل شما اشتباه است</div>
      <div class="container-login100-form-btn my-5">
        <v-btn :loading="loading" text="ورود" @click.prevent.native="next"></v-btn>
      </div>
    </form>
  </div>
</template>

<script>
import {helpers, required} from 'vuelidate/lib/validators';
const mobileList = helpers.regex('mobileList', /^(\+98|0098|98|0)?9\d{9}$/)
export default {
  name: "RegisterLogin",
  head() {
    return {
      title: 'استخدام آژانس مسافرتی و هواپیمایی - کاراول ',
    }
  },

  data(){
    return{
      loading: false,
    }
  },
  computed :{
    user(){ return this.$store.state.Auth.Auth.user }
  },
  validations:{
    user: {
      mobile: {
        mobileList,
        required
      }
    }
  },
  methods:{
    senSMSLogin : function (){
      this.loading = true;
      this.$store.dispatch('Auth/Auth/SendSMS', {'user' : this.$store.state.Auth.Auth.user , 'body' : this.$store.state.Auth.Auth.Auth.body })
        .then( success => {
          this.$router.push({path : '/users/forget_password'});
        })
        .catch( error => {})
        .finally( () => { this.loading = false })
    },
    next : function (){
      if (this.$v.$invalid) {
        this.$v.$touch()
       this.$store.dispatch('globalFunctions/ErrorNotify')
        return false;
      }
      this.loading = true;
      this.$store.dispatch('Auth/Auth/CheckMobile', {'mobile' : this.$store.state.Auth.Auth.user.mobile , 'scope' : this.$route.params.type})
        .then(success => {
          if( success.data.data.body.type == 'register' ){
            this.$router.push({path : '/users/verify-mobile'});
            return true;
          }

          if(success.data.data.body.type == 'login' ){
            this.senSMSLogin();
            return true;
          }
        })
        .catch(error => {
          this.$store.dispatch('globalFunctions/ErrorAlert' , error.response.data.data.massage)
        })
        .finally( () => {  this.loading = false;});
    }
  }
}
</script>
