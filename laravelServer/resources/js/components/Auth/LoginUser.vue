<template>
    <div>
        <form >
            <router-link tag="div" :to="{ name : 'Home' }" class="box-back"><i class="fa fa-arrow-right" aria-hidden="true"></i></router-link>
            <span class="login100-form-title p-b-37">ورود</span>
            <div class="wrap-input100 validate-input m-b-20" :class="{ 'is-invalid animation-error': $v.user.password.$error,'is-valid': !$v.user.password.$invalid }"  data-validate="Enter username or email">
                <input style="direction: ltr;" class="input100"  type="password" v-model.trim="$v.user.password.$model"  placeholder="رمز عبور">
                <span class="focus-input100"></span>
            </div>
            <div style="text-align: center;margin-top: 15px;margin-bottom: 11px;" class="invalid-feedback" v-if="!$v.user.password.required">لطفا رمز عبور خود را وارد کنید.</div>
            <div class="container-login100-form-btn">
                <v-btn :loading="loading" text="ورود" @click.prevent.native="LoginUser"></v-btn>
            </div>
            <div style="margin-top: 13px;" class="text-center p-t-57 p-b-20">
                <span style="font-size: 11px;" class="txt1">برای ورود به اکانت خود لطفا رمز عبور خود را وارکنید</span>
            </div>
            <div style="text-align: center;margin: 31px 0px 25px;;" class="flex-c p-b-112">
                <button @click.prevent="senSMSLogin" class="btn btn-link">رمز عبور خود را فراموش کره اید؟</button>
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
    name: "LoginUser",
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
            password : {
                required,
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
        LoginUser: function (){
            if (this.$v.$invalid) {
                this.$v.$touch()
                this.$notify({group: 'foo', width: '400px', title: 'فرم دارای خطاست', text: 'لطفا قبل از ثبت اطلاعات خطاهای خود را بررسی کنید', duration: 1000, speed: 1000, closeOnClick: true, classes: 'vue-notification success'});
                return false;
            }
            this.loading = true;
            this.$store.dispatch('LoginUser', {'user' : this.$store.state.Auth.user , 'body' : this.$store.state.Auth.Auth.body })
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
                        if(this.$route.query.advertising) {
                            this.$router.push({name: 'SiteShowJobIndex', params: {id: this.$route.query.advertising}})
                        }
                        else
                            this.$router.push({name: 'appliedResume'}).catch(() => {});
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
        },
        handel: function (){
            if(this.$store.state.Auth.Auth.length == 0 ){
                this.$router.push({name : 'Home'});
                return false;
            }

            if(this.$store.state.Auth.Auth.body.type != 'login'){
                this.$router.push({name : 'Home'});
                return false;
            }
        },
        senSMSLogin : function (){
            this.loading = true;
            this.$store.dispatch('SendSMS', {'user' : this.$store.state.Auth.user , 'body' : this.$store.state.Auth.Auth.body })
                .then( success => {
                    this.$router.push({name : 'forget_password'});
                })
                .catch( error => {

                })
                .finally( () => { this.loading = false })
        }
    }
}
</script>

<style scoped>

</style>
