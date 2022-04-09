<template>
  <div>
    <form>
      <span class="login100-form-title p-b-37">ثبت اطلاعات</span>
      <div class="wrap-input100 validate-input m-b-20" :class="{ 'is-invalid animation-error': $v.user.name.$error,'is-valid': !$v.user.name.$invalid }"  data-validate="Enter username or email">
        <input class="input100"  type="text" v-model.trim="$v.user.name.$model"  placeholder="نام">
        <span class="focus-input100"></span>
      </div>
      <div style="margin-top: -25px;" class="invalid-feedback text-center position-absolute" v-if="!$v.user.name.required">لطفا نام خود را وارد کنید.</div>
      <div class="wrap-input100 validate-input m-b-20" :class="{ 'is-invalid animation-error': $v.user.password.$error,'is-valid': !$v.user.password.$invalid }"  data-validate="Enter username or email">
        <input style="direction: ltr;" class="input100"  type="password" v-model.trim="$v.user.password.$model"  placeholder="رمز عبور">
        <span class="focus-input100"></span>
      </div>
      <div style="margin-top: -25px;" class="invalid-feedback text-center position-absolute" v-if="!$v.user.password.required">لطفا رمز عبور خود را وارد کنید.</div>
      <div style="margin-top: -25px;" class="invalid-feedback text-center position-absolute" v-if="!$v.user.password.minLength">رمز عبور نباید کمتر از 6 کارکتر باشد.</div>
      <div class="container-login100-form-btn">
        <v-btn :loading="loading" text="ثبت" @click.prevent.native="registerUser"></v-btn>
      </div>
      <div style="margin-top: 13px;" class="text-center p-t-57 p-b-20">
        <span style="font-size: 11px;" class="txt1">برای تکمیل ثبت نام تمام اطلاعات را پر کنید.</span>
      </div>
      <div style="text-align: center;margin: 31px 0px 25px;;" class="flex-c p-b-112">
      </div>
    </form>
  </div>
</template>
<script>

import { required , minLength , sameAs } from 'vuelidate/lib/validators';
export default {
  name : 'Register',

  head() {
    return {
      title: 'استخدام آژانس مسافرتی و هواپیمایی - کاراول ',
    }
  },
  data(){
    return{
      loading : false,
    }
  },
  validations:{
    user: {
      name : {
        required
      },
      password : {
        required,
        minLength: minLength(6)
      },
    }
  },
  computed: {
    user(){ return this.$store.state.Auth.Auth.user }
  },
  mounted() {
    this.handel();
  },
  methods:{
    handel : function (){
      if(!this.$store.state.Auth.Auth.send_sms){
        this.$router.push({path : '/'});
        return false
      }
    },
    registerUser : function (){
      if (this.$v.$invalid) {
        this.$v.$touch()
        this.$store.dispatch('globalFunctions/ErrorNotify')
        return false;
      }
      this.loading = true;
      this.$store.dispatch('Auth/Auth/Register', {'user' : this.$store.state.Auth.Auth.user , 'body' : this.$store.state.Auth.Auth.Auth.body })
        .then( success => {
          this.$cookies.set('token', success.data.data.access_token.token , {
            path: '/',
            maxAge: 60 * 60 * 24 * 7
          })
         // localStorage.setItem('token', success.data.data.access_token.token);
          if(this.$store.state.Auth.Auth.Auth.body.scope == 'Company'){
            this.$cookies.set('role', 'NotCompany' , {
              path: '/',
              maxAge: 60 * 60 * 24 * 7
            })
        //    localStorage.setItem('role', 'NotCompany');
            this.$router.push({path: '/register/company'})
            return true
          }
          if(this.$store.state.Auth.Auth.Auth.body.scope == 'Member'){
            this.$cookies.set('role', 'NotMember' , {
              path: '/',
              maxAge: 60 * 60 * 24 * 7
            })
           // localStorage.setItem('role', 'NotMember');
            this.$router.push({path: '/register/member'})
            return true
          }
        })
        .catch( error => {
          this.$store.dispatch('globalFunctions/ErrorAlert' , error.response.data.data.massage)
        })
        .finally( () => { this.loading = false })

    }
  }
}

</script>

