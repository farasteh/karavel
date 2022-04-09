<template>
    <div>
        <form v-if="$store.state.Auth.Auth.body" class="login100-form validate-form">
            <router-link  tag="div" :to="{ name : 'RegisterLogin' , params : {'type' : $store.state.Auth.Auth.body.scope} }" class="box-back"><i class="fa fa-arrow-right" aria-hidden="true"></i></router-link>
            <span class="login100-form-title p-b-37">تایید کد ارسال شده</span>
            <div class="wrap-input100 validate-input m-b-20" :class="{ 'is-invalid animation-error': $v.code_sms.$error,'is-valid': !$v.code_sms.$invalid }"  data-validate="Enter username or email">
                <input  style="direction: ltr;letter-spacing: 27px;text-align: center" class="input100" type="number" v-model.trim="$v.code_sms.$model" name="username"  maxlength="5">
                <span class="focus-input100"></span>
            </div>
            <div style="text-align: center;margin-top: 15px;margin-bottom: 11px;" class="invalid-feedback" v-if="!$v.code_sms.required">لطفا کد ارسال شده را وارد کنید.</div>
            <div style="">
                <vac style="" :left-time="240000"  ref="vac1">
                    <template
                        v-slot:process="{ timeObj }">
                        <span style="display: flex;justify-content: center;">{{ `${timeObj.m}:${timeObj.s}` }}</span>
                        <div class="container-login100-form-btn">
                            <v-bnt :loading="loading" text="تایید" @click.prevent.native="LoginSMS"></v-bnt>
                        </div>
                    </template>
                    <template
                        v-slot:finish>
                        <span style="display: flex;justify-content: center;"  @click="sendSMS"  class="btn btn-link">ارسال مجدد</span>
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
            <div style="margin-bottom: 15px;" class="text-center">
                <a href="#" class="txt2 hov1">صفحه اصلی</a>
            </div>
        </form>
    </div>
</template>

<script>
import Button from './ButtonAuth'
import { required} from 'vuelidate/lib/validators';
export default {
    name: "forget_password",
    components : {'v-bnt' : Button},
    metaInfo() {
        return {
            title: '',
            //     // all titles will be injected into this template
            titleTemplate: ' سامانه کاریابی در گردشگری - کاراول ',
            meta: [{
                vmid: 'description',
                name: 'description',
                content: '',
            }]
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
            if(this.$store.state.Auth.Auth.length == 0 ){
                this.$router.push({name : 'Home'});
                return false;
            }
            if(this.$store.state.Auth.Auth.body.type != 'login'){
                this.$router.push({name : 'Home'});
                return false;
            }
        },
        LoginSMS : function (){
            if (this.$v.$invalid) {
                this.$v.$touch()
                this.$notify({group: 'foo', width: '400px', title: 'فرم دارای خطاست', text: 'لطفا قبل از ثبت اطلاعات خطاهای خود را بررسی کنید', duration: 1000, speed: 1000, closeOnClick: true, classes: 'vue-notification success'});
                return false;
            }
            this.loading = true
            this.$store.dispatch('loginSMS', {'code_sms' : this.code_sms , 'token' : this.$store.state.Auth.Auth.body })
                .then( response => {
                    localStorage.setItem('token', response.data.data.token.token);
                    if (response.data.data.role == 'Company') {
                        if (this.adId) {
                            window.location.reload()
                        } else {
                            if (response.data.data.massage == 'incomplete') {
                                this.$router.push({name: 'RegisterCompany'}).catch(() => {
                                });
                            } else {
                                this.$router.push({name: 'DashboardCompany'}).catch(() => {
                                });
                            }
                        }
                    } else if (response.data.data.role == 'Member') {
                        if (this.adId) {
                            window.location.reload()
                        } else {
                            if (response.data.data.massage == 'incomplete') {
                                this.$router.push({name: 'RegisterMember'}).catch(() => {
                                });
                            } else {
                                this.$router.push({name: 'MemberResume'}).catch(() => {
                                });
                            }
                        }
                    }
                })
                .catch( error => {
                    this.$fire({
                        title: '',
                        text: error.response.data.data.massage,
                        type: "error",
                        timer: 3000
                    }).then(r => {
                        console.log(r.value);
                    });
                })
                .finally( () => { this.loading = false })
        }
    }
}
</script>

<style scoped>
</style>
