<template>
    <div>
        <div class="container ">
            <div class="row text-">
                <div style="margin: auto;" class="col-lg-4 col-md-6 col-sm-12 offset-lg-4 offset-md-3 model-offset">
                    <div class="text-center">
                        <div v-if="adId " class="font-size-3xl font-weight-bold color-grey-dark-2 mb-4"></div>
                        <div v-else class="font-size-3xl font-weight-bold color-grey-dark-2 mb-4"> خوش آمدید!</div>
                    </div>
                    <div class="p-3">
                        <div class="card-body">
                            <div>
                                <form>
                                    <div class="form-group">
                                        <label>ایمیل یا شماره موبایل</label>
                                        <input style="direction: ltr;" type="text" class="form-control fully-ltr"
                                               :class="{ 'is-invalid animation-error': $v.email.$error,'is-valid': !$v.email.$invalid }"
                                               v-model.trim="$v.email.$model"/>
                                        <div class="invalid-feedback" v-if="!$v.email.required">فیلد مورد نظر را
                                            پرکنید
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>رمز عبور</label>
                                        <input style="direction: ltr;" type="password" class="form-control fully-ltr"
                                               :class="{ 'is-invalid animation-error': $v.password.$error,'is-valid': !$v.password.$invalid }"
                                               v-model.trim="$v.password.$model"/>
                                        <div class="invalid-feedback" v-if="!$v.password.required">فیلد مورد نظر را
                                            پرکنید
                                        </div>
                                        <div class="invalid-feedback" v-if="!$v.password.minLength"> تعداد کارکتر پسورد
                                            {{ $v.password.$params.minLength.min }} باشد.
                                        </div>
                                    </div>
                                    <div class="col-12">

                                        <Icon type="md-checkmark-circle-outline"  style="color: limegreen;font-size: 20px;"/>
                                        <span>کارجو</span>
                                    </div>
                                    <Button size="large" name="login" data-target="action.disableable" type="primary"
                                            :loading="loading" @click.prevent="do_login"
                                            class="btn btn-primary btn-block btn-lg mt-4 font-weight-bold letter-spacing-wide text-uppercase">
                                        ورود
                                    </Button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>


import {minLength, required} from 'vuelidate/lib/validators'

export default {
    props: ['adId'],
    data() {
        return {
            email: '',
            password: '',
            submitStatus: null,
            loading: false,
            scope: 'Member'
        }
    },
    validations: {
        email: {
            required,
            minLength: minLength(4)
        },
        password: {
            required,
            minLength: minLength(6)
        }
    },

    methods: {

        do_login() {
            this.loading = true
            console.log('submit!')
            this.$v.$touch()
            if (this.$v.$invalid) {
                this.$notify({
                    group: 'foo',
                    width: '400px',
                    title: 'فرم دارای خطاست',
                    text: 'لطفا قبل از ثبت اطلاعات خطاهای خود را بررسی کنید',
                    duration: 10000,
                    speed: 1000,
                    closeOnClick: true,
                    classes: 'vue-notification success'
                });
                this.loading = false
            } else {

                axios.post('api/v1/login', {
                        email:       this.email,
                        password:    this.password,
                        scope:      'Member',
                    }
                )
                    .then(response => {
                        localStorage.setItem('token', response.data.data.token.token);
                        this.firstLoggin = true;
                        if (response.data.data.massage == 'incomplete') {

                            this.$router.push({name: 'RegisterMember'}).catch(() => {
                            });
                        } else {
                            window.location.reload()
                        }
                        this.loading = false
                    })
                    .catch(error => {
                        this.$fire({
                            title: '',
                            text: error.response.data.data.massage,
                            type: "error",
                            timer: 3000
                        }).then(r => {
                            console.log(r.value);
                        });
                        this.loading = false
                    }).finally(() => {
                    this.loading = false
                });
            }
        },
        checkRole(token) {
            axios.get('api/current-role', {headers: {Authorization: `Bearer ${token}`}})
                .then(response => {
                    localStorage.setItem('role', response.data);
                    if (this.firstLoggin) {
                        this.firstLoggin = false;
                        this.do_redirect();
                    }
                })
                .catch(error => {
                    console.log(error);
                    localStorage.removeItem('role');
                });
        },
        AxiosLogin() {
            localStorage.setItem('token', response.data.success.token);

            this.$fire({
                title: "ورود شما با موفقیت انجام شد",
                text: "",
                type: "success",
                timer: 3000
            }).then(r => {
                console.log(r.value);
            });
            setTimeout(() => {
                this.$notify({
                    group: 'success',
                    width: '400px',
                    title: '',
                    text: 'تغییرات شما با موفقیت ثبت شده است.',
                    duration: 10000,
                    speed: 1000,
                    closeOnClick: true,
                    classes: 'vue-notification success'
                });
            }, 500)
        }
    }

}
</script>
<style>
.ivu-modal-body .model-offset {
    flex: 0 0 90% !important;
    max-width: 90% !important;
}

.body-content {
    padding: 64px 256px 60px 0px;
}

@media screen and (max-width: 759px) {
    .body-content {
        padding: 0px 0px 0px 0px;
    }
}
</style>
