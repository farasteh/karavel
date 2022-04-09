<template>
    <div>
        <form >
            <span class="login100-form-title p-b-37">ثبت اطلاعات</span>
            <div class="wrap-input100 validate-input m-b-20" :class="{ 'is-invalid animation-error': $v.user.name.$error,'is-valid': !$v.user.name.$invalid }"  data-validate="Enter username or email">
                <input class="input100"  type="text" v-model.trim="$v.user.name.$model"  placeholder="نام">
                <span class="focus-input100"></span>
            </div>
            <div style="text-align: center;margin-top: 15px;margin-bottom: 11px;" class="invalid-feedback" v-if="!$v.user.name.required">لطفا نام خود را وارد کنید.</div>
            <div class="wrap-input100 validate-input m-b-20" :class="{ 'is-invalid animation-error': $v.user.password.$error,'is-valid': !$v.user.password.$invalid }"  data-validate="Enter username or email">
                <input style="direction: ltr;" class="input100"  type="password" v-model.trim="$v.user.password.$model"  placeholder="رمز عبور">
                <span class="focus-input100"></span>
            </div>
            <div style="text-align: center;margin-top: 15px;margin-bottom: 11px;" class="invalid-feedback" v-if="!$v.user.password.required">لطفا رمز عبور خود را وارد کنید.</div>
            <div style="text-align: center;margin-top: 15px;margin-bottom: 11px;" class="invalid-feedback" v-if="!$v.user.password.minLength">رمز عبور نباید کمتر از 6 کارکتر باشد.</div>
            <div class="container-login100-form-btn">
                <v-btn :loading="loading" text="ثبت" @click.prevent.native="registerUser"></v-btn>
            </div>
            <div style="margin-top: 13px;" class="text-center p-t-57 p-b-20">
                <span style="font-size: 11px;" class="txt1">برای تکمیل ثبت نام تمام اطلاعات را پر کنید.</span>
            </div>
            <div style="text-align: center;margin: 31px 0px 25px;;" class="flex-c p-b-112">
            </div>
            <div style="margin-bottom: 15px;" class="text-center">
                <router-link tag="a" :to="{ name : 'Home' }" class="txt2 hov1">صفحه اصلی</router-link>
            </div>
        </form>
    </div>
</template>
<script>
import Button from './ButtonAuth'
import { required , minLength , sameAs } from 'vuelidate/lib/validators';
export default {
    name : 'Register',
    components:{ 'v-btn' : Button},
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
        user(){ return this.$store.state.Auth.user }
    },
    mounted() {
        this.handel();
    },
    methods:{
        handel : function (){
            if(!this.$store.state.Auth.send_sms){
                this.$router.push({name : 'Home'});
                return false
            }
        },
        registerUser : function (){
            if (this.$v.$invalid) {
                this.$v.$touch()
                this.$notify({group: 'foo', width: '400px', title: 'فرم دارای خطاست', text: 'لطفا قبل از ثبت اطلاعات خطاهای خود را بررسی کنید', duration: 1000, speed: 1000, closeOnClick: true, classes: 'vue-notification success'});
                return false;
            }
            this.loading = true;
            this.$store.dispatch('Register', {'user' : this.$store.state.Auth.user , 'body' : this.$store.state.Auth.Auth.body })
            .then( success => {
                localStorage.setItem('token', success.data.data.access_token.token);
                if(this.$store.state.Auth.Auth.body.scope == 'Company'){

                    this.$router.push({name: 'RegisterCompany'}).catch(() => {});
                    return true
                }
                if(this.$store.state.Auth.Auth.body.scope == 'Member'){

                    this.$router.push({name: 'RegisterMember'}).catch(() => {});
                    return true
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
