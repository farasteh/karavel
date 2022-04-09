<template>
  <div>
    <div class="container mt-5">
      <div class="row">
        <div class="col-lg-10 col-md-12 col-sm-12 m-auto">
          <div class="text-center">
            <div class="font-size-3xl font-weight-bold color-grey-dark-2 mb-4 font-18">
              تغییر رمز ورود
            </div>
          </div>
          <div class="card box-shadow-lg p-3">
            <div class="card-body">
              <Form ref="formValidate">
                <div class="row">
                  <FormItem class="col-md-6">
                    <Input  :class="{ 'ivu-form-item-error animation-error': $v.form.password.$error,'is-valid': !$v.form.password.$invalid }"  v-model.trim="$v.form.password.$model"></Input>
                    <div class="ivu-form-item-error-tip" v-if="$v.form.password.$error">فیلد مورد نظر را پرکنید</div>
                  </FormItem>
                  <FormItem class="col-md-6">
                    <Input  :class="{ 'ivu-form-item-error animation-error': $v.form.config_password.$error,'is-valid': !$v.form.config_password.$invalid }"  v-model.trim="$v.form.config_password.$model"></Input>
                    <div class="ivu-form-item-error-tip" v-if="$v.form.config_password.$error">فیلد مورد نظر را پرکنید</div>
                  </FormItem>
                  <FormItem class="col-md-6 m-auto">
                    <Button :loading="modal_loading" @click="updatePassword()"
                            type="primary" class="karavel-btn w-100">ثبت تغییرات</Button>
                  </FormItem>
                </div>
              </Form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { required, sameAs } from 'vuelidate/lib/validators';
export default {
  name: "updatePassword",
  head() {
    return {
      title: 'استخدام آژانس مسافرتی و هواپیمایی - کاراول ',
    }
  },
  data (){
    return{
      form :{
        password        : '',
        config_password : ''
      },
      modal_loading : false
    }
  },
  validations: {
    form:{
      password:{
        required,
      },
      config_password:{
        required,
        sameAsPassword: sameAs('password')
      },
    },
  },
  methods:{
    updatePassword : function (){
      this.$v.$touch()
      if (this.$v.$invalid) {
        this.$store.dispatch('globalFunctions/ErrorNotify')
        return false;
      }
      this.modal_loading = true;
      this.$store.dispatch('Auth/Auth/updatePassword', this.form)
        .then(response => {
          this.$store.dispatch('globalFunctions/SuccessNotify' , response.data.data.message)
        })
        .catch(error => {
          this.$store.dispatch('globalFunctions/ErrorNotify')
        })
        .finally(() => this.modal_loading=false);
    }
  }
}
</script>

<style scoped>

</style>
