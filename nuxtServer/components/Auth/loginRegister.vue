<template>
  <div>
    <form>
      <nuxt-link  to="/" class="box-back" style="left: 20px">
        <i class="fa fa-arrow-left" aria-hidden="true"></i>
      </nuxt-link>
      <span class="login100-form-title p-b-37">ورود / ثبت ‌نام</span>
      <div class="position-relative">
        <div class="wrap-input100 validate-input m-b-20 "
             :class="{ 'is-invalid animation-error': $v.user.mobile.$error,'is-valid': !$v.user.mobile.$invalid }"
             data-validate="Enter username or email">
          <input  @input="convertMobile2English"
                  style="direction: ltr;" class="input100 inputt100"
                  v-model.trim="$v.user.mobile.$model"
                  placeholder="برای ورود یا ثبت نام شماره موبایل خود را وارد کنید">
          <span class="focus-input100"></span>
        </div>
        <div class="invalid-feedback text-center auth-error" v-if="!$v.user.mobile.required && mobileError">لطفا شماره موبایل خود راوارد کنید.</div>
        <div class="invalid-feedback text-center auth-error" v-if="!$v.user.mobile.mobileList && mobileError">فرمت شماره موبایل شما اشتباه است</div>
      </div>

      <div class="container-login100-form-btn mt-5">
        <v-btn :loading="loading" text="ادامه" @click.prevent.native="next"></v-btn>
      </div>
      <div class="text-center my-4">
        <nuxt-link :to=" `/users/forget/${this.$route.params.slug}` " class="txt2 hov1" style="font-size: 12px">
          رمز عبور خود را فراموش کرده اید؟
        </nuxt-link>
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
      mobileError : false
    }
  },
  computed :{
    user(){ return this.$store.state.Auth.Auth.user },
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
    next : function (){
      if (this.$v.$invalid) {
        this.mobileError = true
        this.$v.$touch()
        this.$store.dispatch('globalFunctions/ErrorNotify')
        return false;
      }
      this.loading = true;
      this.$store.dispatch('Auth/Auth/CheckMobile',
        {'mobile' : this.$store.state.Auth.Auth.user.mobile , 'scope' : this.$route.params.slug})
        .then(success => {
          if( success.data.data.body.type == 'register' ){
            this.$router.push({path : '/users/verify-mobile'});
            return true;
          }

          if(success.data.data.body.type == 'login' ){
            this.$router.push({path : '/users/login' });
            return true;
          }
        })
        .catch(error => {
          this.$store.dispatch('globalFunctions/ErrorNotify2' ,error.response.data.data.massage )
        })
        .finally( () => {  this.loading = false;});
    } ,
    convertMobile2English: function (index) {
      this.$v.user.mobile.$model = this.convertNumber2English(this.$v.user.mobile.$model)
    },
    convertNumber2English( num ) {
      return   num.replace(/[\u0660-\u0669]/g, function (c) {
        return c.charCodeAt(0) - 0x0660;
      }).replace(/[\u06f0-\u06f9]/g, function (c) {
        return c.charCodeAt(0) - 0x06f0;
      });
    },


  }
}
</script>

<style >
input.inputt100::placeholder{
  text-align: center;
}
input {
  outline: none;
  border: none;
}

input::-webkit-input-placeholder { color: #4b2354;}
input:-moz-placeholder { color: #4b2354;}
input::-moz-placeholder { color: #4b2354;}
input:-ms-input-placeholder { color: #4b2354;}

textarea::-webkit-input-placeholder { color: #4b2354;}
textarea:-moz-placeholder { color: #4b2354;}
textarea::-moz-placeholder { color: #4b2354;}
textarea:-ms-input-placeholder { color: #4b2354;}

/*!*---------------------------------------------*!*/
button {
  outline: none !important;
  border: none;
  background: transparent;
}
input[type=number] {
  -moz-appearance: textfield;
}
button:hover {
  cursor: pointer;
}

iframe {
  border: none !important;
}



/*//////////////////////////////////////////////////////////////////
[ Utility ]*/
.txt1 {
  font-size: 16px;
  line-height: 1.4;
  color: #999999;
}

.txt2 {
  font-size: 16px;
  line-height: 1.4;
  color: #4b2354;
}

.hov1:hover {
  color: #4b2354;
  text-decoration: underline;
}


/*//////////////////////////////////////////////////////////////////
[ login ]*/

.container-login100 {
  width: 100%;
  min-height: 100vh;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
  padding: 15px;
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center;
  position: relative;
  z-index: 1;
}

.container-login100::before {
  content: "";
  display: block;
  position: absolute;
  z-index: -1;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;

  background: rgb(188,219,245);
  background: linear-gradient(90deg,#bcdbf5,#0765bd 0,#13caef 100%);
  background: -webkit-linear-gradient((90deg,#bcdbf5,#0765bd 0,#13caef 100%));
  background:-o-linear-gradient((90deg,#bcdbf5,#0765bd 0,#13caef 100%));
  background:-moz-linear-gradient((90deg,#bcdbf5,#0765bd 0,#13caef 100%));
  /*background: linear-gradient(left, rgba(0,168,255,0.5), rgba(185,0,255,0.5));*/
  pointer-events: none;
}

.wrap-login100 {
  width: 390px;
  background: #fff;
  border-radius: 10px;
  overflow: hidden;

  box-shadow: 0 3px 20px 0px rgba(0, 0, 0, 0.1);
  -moz-box-shadow: 0 3px 20px 0px rgba(0, 0, 0, 0.1);
  -webkit-box-shadow: 0 3px 20px 0px rgba(0, 0, 0, 0.1);
  -o-box-shadow: 0 3px 20px 0px rgba(0, 0, 0, 0.1);
  -ms-box-shadow: 0 3px 20px 0px rgba(0, 0, 0, 0.1);
}


/*==================================================================
[ Form ]*/

.login100-form {
  width: 100%;
  margin-top: 10px;
}

.login100-form-title {
  display: block;
  font-size: 25px;
  color: #4b2354;
  line-height: 1.2;
  text-align: center;
}

/*------------------------------------------------------------------
[ Input ]*/

.wrap-input100 {
  width: 85%;
  position: relative;
  background-color: #fff;
  border-radius: 20px;
  margin: auto;
  margin-top: 30px;
  margin-bottom: 30px;
}

.input100 {
  font-size: 16px;
  color: #4b2354;
  line-height: 1.2;

  display: block;
  width: 100%;
  height: 62px;
  background: transparent;
  padding: 0 20px 0 23px;
}


/*------------------------------------------------------------------
[ Focus Input ]*/

.focus-input100 {
  display: block;
  position: absolute;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  pointer-events: none;
  border-radius: 20px;
  box-shadow: 0 5px 30px 0px rgba(0, 0, 0, 0.18);
  -moz-box-shadow: 0 5px 30px 0px rgba(0, 0, 0, 0.18);
  -webkit-box-shadow: 0 5px 30px 0px rgba(0, 0, 0, 0.18);
  -o-box-shadow: 0 5px 30px 0px rgba(0, 0, 0, 0.18);
  -ms-box-shadow: 0 5px 30px 0px rgba(0, 0, 0, 0.18);
  -webkit-transition: all 0.4s;
  -o-transition: all 0.4s;
  -moz-transition: all 0.4s;
  transition: all 0.4s;
}

.input100:focus + .focus-input100 {
  box-shadow: 0 5px 30px 0px rgba(0, 0, 0, 0.2);
  -moz-box-shadow: 0 5px 30px 0px rgba(0, 0, 0, 0.2);
  -webkit-box-shadow: 0 5px 30px 0px rgba(0, 0, 0, 0.2);
  -o-box-shadow: 0 5px 30px 0px rgba(0, 0, 0, 0.2);
  -ms-box-shadow: 0 5px 30px 0px rgba(0, 0, 0, 0.2);
}

/*------------------------------------------------------------------
[ Button ]*/
.container-login100-form-btn {
  width: 100%;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
}

.login100-form-btn {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 0 20px;
  min-width: 160px;
  height: 50px;
  background-color: #2772f2;
  border-radius: 25px;
  font-size: 16px;
  color: #fff;
  line-height: 1.2;
  text-transform: uppercase;

  -webkit-transition: all 0.4s;
  -o-transition: all 0.4s;
  -moz-transition: all 0.4s;
  transition: all 0.4s;

  box-shadow: 0 10px 30px 0px rgba(131, 195, 253, 0.65);
  -moz-box-shadow: 0 10px 30px 0px rgba(131, 195, 253, 0.65);
  -webkit-box-shadow: 0 10px 30px 0px rgba(131, 195, 253, 0.65);
  -o-box-shadow: 0 10px 30px 0px rgba(131, 195, 253, 0.65);
  -ms-box-shadow: 0 10px 30px 0px rgba(131, 195, 253, 0.65);
}

.login100-form-btn:hover {
  background-color: #263a88;
  box-shadow: 0 10px 30px 0px rgba(158, 179, 242, 0.8);
  -moz-box-shadow: 0 10px 30px 0px rgba(158, 179, 242, 0.8);
  -webkit-box-shadow: 0 10px 30px 0px rgba(158, 179, 242, 0.8);
  -o-box-shadow: 0 10px 30px 0px rgba(158, 179, 242, 0.8);
  -ms-box-shadow: 0 10px 30px 0px rgba(158, 179, 242, 0.8);
}


/*------------------------------------------------------------------
[ Alert validate ]*/

.validate-input {
  position: relative;
}

.alert-validate .focus-input100 {
  box-shadow: 0 5px 30px 0px rgba(250, 66, 81, 0.1);
  -moz-box-shadow: 0 5px 30px 0px rgba(250, 66, 81, 0.1);
  -webkit-box-shadow: 0 5px 30px 0px rgba(250, 66, 81, 0.1);
  -o-box-shadow: 0 5px 30px 0px rgba(250, 66, 81, 0.1);
  -ms-box-shadow: 0 5px 30px 0px rgba(250, 66, 81, 0.1);
}

.alert-validate::before {
  content: attr(data-validate);
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  align-items: center;
  position: absolute;
  width: 100%;
  min-height: 62px;
  background-color: #fff;
  border-radius: 20px;
  top: 0px;
  left: 0px;
  padding: 0 45px 0 22px;
  pointer-events: none;

  font-family: SourceSansPro-Bold;
  font-size: 16px;
  color: #fa4251;
  line-height: 1.2;
}

.btn-hide-validate {
  font-family: Material-Design-Iconic-Font;
  font-size: 15px;
  color: #fa4251;
  cursor: pointer;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  align-items: center;
  justify-content: center;
  position: absolute;
  height: 62px;
  top: 0px;
  right: 23px;
}

.rs1-alert-validate.alert-validate::before {
  background-color: #fff;
}

.true-validate::after {
  content: "\f269";
  font-family: Material-Design-Iconic-Font;
  font-size: 15px;
  color: #57b846;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  align-items: center;
  justify-content: center;
  position: absolute;
  height: 62px;
  top: 0px;
  right: 23px;
}



/*//////////////////////////////////////////////////////////////////
[ Social item ]*/

.login100-social-item {
  font-size: 25px;
  color: #3b5998;

  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  justify-content: center;
  align-items: center;
  width: 50px;
  height: 50px;
  border-radius: 50%;
  background-color: #fff;
  margin: 5px;
  box-shadow: 0 5px 20px 0px rgba(0, 0, 0, 0.1);
  -moz-box-shadow: 0 5px 20px 0px rgba(0, 0, 0, 0.1);
  -webkit-box-shadow: 0 5px 20px 0px rgba(0, 0, 0, 0.1);
  -o-box-shadow: 0 5px 20px 0px rgba(0, 0, 0, 0.1);
  -ms-box-shadow: 0 5px 20px 0px rgba(0, 0, 0, 0.1);
}

.login100-social-item img {
  width: 26px;
}

.login100-social-item:hover {
  color: #3b5998;
  box-shadow: 0 5px 20px 0px rgba(0, 0, 0, 0.2);
  -moz-box-shadow: 0 5px 20px 0px rgba(0, 0, 0, 0.2);
  -webkit-box-shadow: 0 5px 20px 0px rgba(0, 0, 0, 0.2);
  -o-box-shadow: 0 5px 20px 0px rgba(0, 0, 0, 0.2);
  -ms-box-shadow: 0 5px 20px 0px rgba(0, 0, 0, 0.2);
}

/*//////////////////////////////////////////////////////////////////
[ Responsive ]*/

@media (max-width: 720px) {
  .container-login100{
    padding: 0;
    height: 100vh;
  }
  .login100-form {
    margin-top: 10px;
  }
  .box-back{
    position: absolute;
    top: 130px;
  }
  .wrap-login100{
    height: 100%;
    border-radius: 0;
  }
}

.box-back{
  width: 50px;
  height: 50px;
  background: #fff;
  border-radius: 50%;
  margin-right: 20px;
  margin-bottom: 20px;
  display: flex;
  justify-content: center;
  align-items: center !important;
  justify-content: center;
  flex-wrap: wrap;
  font-size: 20px;
  -webkit-box-shadow: 0 5px 30px 0px rgba(0, 0, 0, 0.18);
  box-shadow: 0 5px 30px 0px rgba(0, 0, 0, 0.18);
  cursor: pointer;
  position: absolute;
  top: 130px;
}
.box-back:hover{
  box-shadow: 0 5px 20px 0px rgba(0, 0, 0, 0.26);
  -moz-box-shadow: 0 5px 20px 0px rgba(0, 0, 0, 0.26);
  -webkit-box-shadow: 0 5px 20px 0px rgba(0, 0, 0, 0.26);
  -o-box-shadow: 0 5px 20px 0px rgba(0, 0, 0, 0.26);
  -ms-box-shadow: 0 5px 20px 0px rgba(0, 0, 0, 0.26);
}
input::placeholder {
  color: #4b2354;
  font-size: 13px;
  text-align: right;
}
.error-btn{
  background-color: #6e6e6f !important;
  box-shadow: 0 10px 30px 0px rgba(148, 150, 151, 0.65) !important;
  -moz-box-shadow: 0 10px 30px 0px rgba(148, 150, 151, 0.65) !important;
  -webkit-box-shadow: 0 10px 30px 0px rgba(148, 150, 151, 0.65) !important;
  -o-box-shadow: 0 10px 30px 0px rgba(148, 150, 151, 0.65) !important;
  -ms-box-shadow: 0 10px 30px 0px rgba(148, 150, 151, 0.65) !important;
  cursor: no-drop !important;
}

</style>
