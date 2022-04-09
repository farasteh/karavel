<template>
    <div>
        <div>
            <div class="container mt-5">
                <div class="row text-">
                    <div style="margin: auto;"  class="col-lg-10 col-md-12 col-sm-12 offset-lg-4 offset-md-3">
                        <div class="text-center">
                            <div style="font-size: 18px;" class="font-size-3xl font-weight-bold color-grey-dark-2 mb-4">
                                 تغییر رمز ورود
                            </div>
                        </div>
                        <div class="card box-shadow-lg p-3">
                            <div class="card-body">
                                <div>
                                    <Form ref="formValidate">
                                        <div class="row">
                                            <FormItem class="col-md-6">
                                                <Input  :class="{ 'ivu-form-item-error animation-error': $v.form.password.$error,'is-valid': !$v.form.password.$invalid }"  v-model.trim="$v.form.password.$model"></Input>
                                                <div class="ivu-form-item-error-tip" v-if="$v.form.password.$error">فیلد مورد نظر را پرکنید</div>
                                            </FormItem>
                                            <FormItem class="col-md-6">
                                                <Input  :class="{ 'ivu-form-item-error animation-error': $v.form.config_password.$error,'is-valid': !$v.form.config_password.$invalid }"  v-model.trim="$v.form.config_password.$model"></Input>
                                                <div class="ivu-form-item-error-tip" v-if="$v.form.config_password.$error">فیلد مورد نظر را پرکنید</div>
<!--                                                <div class="ivu-form-item-error-tip" v-if="$v.form.config_password.$error">wewe</div>-->
                                            </FormItem>
                                            <FormItem style="margin: auto;"  class="col-md-6">
                                                <Button :loading="modal_loading" @click="updatePassword()"
                                                        type="primary">ثبت تغییرات</Button>
                                            </FormItem>
                                        </div>
                                    </Form>
                                </div>
                            </div>
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
                this.$notify({
                    group: 'foo',
                    width : '400px',
                    title: 'فرم دارای خطاست',
                    text: 'لطفا قبل از ثبت اطلاعات خطاهای خود را بررسی کنید',
                    duration: 1000,
                    speed: 1000,
                    closeOnClick: true,
                    classes: 'vue-notification success'
                });
                return false;
            }
            this.modal_loading = true;
            this.$store.dispatch('updatePassword', this.form)
                .then(response => {
                    this.$fire({
                        title: '',
                        text: response.data.data.message,
                        type: "success",
                        timer: 3000
                    }).then(r => {console.log(r.value);});

                })
                .catch(error => {
                    this.$fire({
                        title: 'با خطا مواجه شد ',
                        text: 'برای ثبت اطلاعات با خطا مواجه شده اید لطفا دوباره تلاش کنید.',
                        type: "error",
                        timer: 3000
                    }).then(r => {console.log(r.value); });
                })
                .finally(() => {setTimeout(() => {this.modal_loading=false;}, 300);});
        }
    }
}
</script>

<style scoped>

</style>
