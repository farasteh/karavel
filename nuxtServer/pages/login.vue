<template>
  <div>
    <div class="container mt-5">
      <div class="row text-">
        <div class="col-lg-4 col-md-6 col-sm-12 m-auto model-offset">
          <div class="text-center">
            <div class="font-size-3xl font-weight-bold color-grey-dark-2 mb-4"> خوش آمدید!</div>
          </div>
          <div class="p-3 card box-shadow-lg">
            <div class="card-body">
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
                  <div class="invalid-feedback" v-if="!$v.password.required">فیلد مورد نظر را پرکنید</div>
                  <div class="invalid-feedback" v-if="!$v.password.minLength"> تعداد کارکتر پسورد
                    {{ $v.password.$params.minLength.min }} باشد.
                  </div>
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
</template>
<script>


import {minLength, required} from 'vuelidate/lib/validators'

export default {
  layout : 'no-default',
  data() {
    return {
      email: '',
      password: '',
      submitStatus: null,
      loading: false,
      scope: 'Admin'
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
      this.$v.$touch()
      if (this.$v.$invalid) {
        this.$store.dispatch('globalFunctions/ErrorNotify2' ,'با خطا مواجه شدید لطفا دوباره تلاش کنید.' )
        this.loading = false
      } else {
        this.$axios.post('api/v1/login', {
          email:       this.email,
          password:    this.password,
          scope:       this.scope,
        })
          .then(response => {
            //console.log(response)
            this.$cookies.set('token' ,response.data.data.token.token ,{
              path: '/',
              maxAge: 60 * 60 * 24 * 7
            })
           // localStorage.setItem('token', response.data.data.token.token);
            this.firstLoggin = true;
            if (response.data.data.role == 'Admin') {
              this.$cookies.set('role' , 'Admin' ,{
                path: '/',
                maxAge: 60 * 60 * 24 * 7
              })
              //localStorage.setItem('role', 'Admin');
              this.$router.push({path: '/admin'})

            } else if (response.data.data.role == 'Company') {
              if (response.data.data.massage == 'incomplete') {
                this.$router.push({path: '/register/company'})
              } else {
                this.$router.push({path: '/posts'})
              }
            } else if (response.data.data.role == 'Member') {

              if (response.data.data.massage == 'incomplete') {
                this.$router.push({path: '/register/member'})
              } else {
                this.$router.push({path: '/member/resume'})
              }
            }
            this.loading = false
          })
          .catch(error => {
            this.$store.dispatch('globalFunctions/ErrorNotify2' ,error.response.data.data.massage )
            this.loading = false
          }).finally(() => {
          this.loading = false
        });
      }
    },
    checkRole(token) {
      this.$axios.get('api/v1/current-role')
        .then(response => {
          this.$cookies.set('role' , response.data , {
            path: '/',
            maxAge: 60 * 60 * 24 * 7
          })
          //localStorage.setItem('role', response.data);
          if (this.firstLoggin) {
            this.firstLoggin = false;
            this.do_redirect();
          }
        })
        .catch(error => {
          console.log(error);
          this.$cookies.remove('token')
       //   localStorage.removeItem('role');
        });
    },
    AxiosLogin() {
      this.$cookies.set('token' , response.data.success.token , {
        path: '/',
        maxAge: 60 * 60 * 24 * 7
      })
      //localStorage.setItem('token', response.data.success.token);
      this.SuccessAlert("ورود شما با موفقیت انجام شد")
      setTimeout(() => {this.SuccessNotify('تغییرات شما با موفقیت ثبت شده است.')}, 500)
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
