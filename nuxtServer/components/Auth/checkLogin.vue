<template>
  <div>
    <form>
      <nuxt-link to="/" class="box-back" style="left: 20px">
        <i class="fa fa-arrow-left" aria-hidden="true"></i>
      </nuxt-link>
      <span class="login100-form-title p-b-37">ورود</span>
      <div class="position-relative">
        <div class="wrap-input100 validate-input m-b-20"
             :class="{ 'is-invalid animation-error': $v.user.password.$error,'is-valid': !$v.user.password.$invalid }"
             data-validate="Enter username or email">
          <input style="direction: ltr;" class="input100"  type="password" v-model.trim="$v.user.password.$model"  placeholder="رمز عبور">
          <span class="focus-input100"></span>
        </div>
        <div class="invalid-feedback text-center auth-error" v-if="!$v.user.password.required">
          لطفا رمز عبور خود را وارد کنید.
        </div>
      </div>

      <div class="container-login100-form-btn  mt-5">
        <v-btn :loading="loading" text="ورود" @click.prevent.native="LoginUser"></v-btn>
      </div>
      <div class="text-center my-4">
        <button  @click.prevent="senSMSLogin" style="font-size: 12px" class="txt2 hov1">رمز عبور خود را فراموش کرده اید؟</button>
      </div>
    </form>
  </div>
</template>

<script>

import { required , minLength , sameAs } from 'vuelidate/lib/validators';

export default {
  name: "LoginUser",

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
      password : {
        required,
      },
    }
  },
  computed: {
    redirect () { return this.$store.state.Auth.redirect.route},
    user(){ return this.$store.state.Auth.Auth.user }
  },
  mounted() {
    this.handel();
  },
  methods:{
    LoginUser: function (){
      if (this.$v.$invalid) {
        this.$v.$touch()
        this.$store.dispatch('globalFunctions/ErrorNotify')
        return false;
      }
      this.loading = true;
      this.$store.dispatch('Auth/Auth/LoginUser',
        {'user' : this.$store.state.Auth.Auth.user , 'body' : this.$store.state.Auth.Auth.Auth.body })
        .then( response => {
          this.$cookies.set('token', response.data.data.token.token , {
            path: '/',
            maxAge: 60 * 60 * 24 * 7
          })
          //localStorage.setItem('token', response.data.data.token.token);
          if (response.data.data.role == 'Company') {
            if (response.data.data.massage == 'incomplete') {
              //localStorage.setItem('role', 'NotCompany');
              this.$cookies.set('role', 'NotCompany' , {
                path: '/',
                maxAge: 60 * 60 * 24 * 7
              })
              this.$router.push({path: '/register/company'})
            }
            else {
              this.$cookies.set('role', 'Company' ,{
                path: '/',
                maxAge: 60 * 60 * 24 * 7
              } )
              if(this.redirect && this.redirect != 0) {
                if(this.redirect.route )
                  if(this.redirect.route.name) {
                    this.$router.push({path: this.redirect.route.name})
                    this.$store.commit('Auth/redirect/DELETE_ROUTE')
                  }

              }
              else
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


              if(this.redirect && this.redirect != 0) {
                if(this.redirect.route )
                  if(this.redirect.route.name) {
                    this.$router.push({path: this.redirect.route.name})
                    this.$store.commit('Auth/redirect/DELETE_ROUTE')
                  }

              }
              else
                this.$router.push({path: '/member/applied'})
            }
          }})
        .catch( error => {
          this.$store.dispatch('globalFunctions/ErrorNotify2' ,error.response.data.data.massage )
        })
        .finally( () => { this.loading = false })
    },
    handel: function (){
      if(this.$store.state.Auth.Auth.Auth.length == 0 ){
        this.$router.push({path : '/'});
        return false;
      }

      if(this.$store.state.Auth.Auth.Auth.body.type != 'login'){
        this.$router.push({path : '/'});
        return false;
      }
    },
    senSMSLogin : function (){
      this.loading = true;
      this.$store.dispatch('Auth/Auth/SendSMS', {'user' : this.$store.state.Auth.Auth.user , 'body' : this.$store.state.Auth.Auth.Auth.body })
        .then( success => {
          this.$router.push( {path: '/users/forget_password'});
        })
        .catch( error => {})
        .finally( () => { this.loading = false })
    }
  }
}
</script>

<style scoped>

</style>
