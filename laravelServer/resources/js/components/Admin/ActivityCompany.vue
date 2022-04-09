<template>
    <div>

        <div style="padding-bottom: 10px;" class="row">
           <div  class="col-6">  حوزه فعالیت شرکت‌ها</div>
           <div class="col-6">
                <Button  @click="CreateActivity()" class="col-8 " style="float: left;" type="primary"><Icon style="font-size: 19px;font-weight: bold;" type="md-add" />ثبت حوزه فعالیت جدید</Button>
           </div>
        </div>


        <div>
        
            <div slot="content" class="content" v-for="(activity , index) in activityCompanies" :key="index">
                <div class="row">
                    <div class="col-6">  {{activity.title}}</div>
                    <div class="col-6">
                        <Button  @click="EditActivity(activity.title , activity.id , index)" class="col-md-1 col-4 btn-admin" ><Icon style="font-size: 19px;font-weight: bold;display: flex;justify-content: center;" type="ios-create" /></Button>
                        <Button  @click="DeleteActivity(activity.title , activity.id , index)"   class="col-md-1 col-4 btn-admin" ><Icon style="font-size: 19px;font-weight: bold;display: flex;justify-content: center;" type="ios-trash" /></Button>
                    </div>
                </div>
            </div>
             
        </div>

        <Modal v-model="modal2" class-name="vertical-center-modal" >
            <p slot="header" style="text-align:center">
                <span>{{TitleModel}}</span>
            </p>
            <div style="text-align:center">
                   <input type="hidden" v-model="id">
                   <input type="hidden" v-model="type">
                   <Form ref="formValidate">
                    <FormItem :class="{ 'ivu-form-item-error': $v.title.$error,'is-valid': !$v.title.$invalid }">
                        <Input size="large" 
                        :class="{ 'ivu-form-item-error animation-error': $v.title.$error,'is-valid': !$v.title.$invalid }"  
                        v-model.trim="$v.title.$model"></Input>
                        <div class="ivu-form-item-error-tip" v-if="$v.title.$error">فیلد مورد نظر را پرکنید</div>
                    </FormItem>                
                </Form>
            </div>
            <div slot="footer">
                <Button type="primary" size="large"  long :loading="modal_loading" @click="putActivity()">ثبت مهارت رفتاری</Button>
            </div>
        </Modal>

        <Modal v-model="modal3" width="360">
            <input type="hidden" v-model="id">
            <p slot="header" style="color:#f60;text-align:center">
                <Icon type="ios-information-circle"></Icon>
                <span>حذف مهارت {{TitleDelet}}</span>
            </p>
            <div style="text-align:center">
                <p>آیا از حذف مهارت {{TitleDelet}} مطمعن هستید؟</p>
            </div>
            <div slot="footer">
                <Button type="error" size="large" long :loading="modal_loading" @click="deleteS">حذف</Button>
            </div>
        </Modal>

    </div>
</template>
<script>
import { required, minLength , email } from 'vuelidate/lib/validators'
import { mapState } from 'vuex'
export default {


        data () {
            return {
                modal2 : false  , 
                modal_loading: false,
                TitleModel: '',
                TitleDelet: '',
                id : '' , 
                modal3 : false ,
                index : '' , 
                type : '' , 
                title : ''
            }
        },
        validations: {
            title:{
                required
            },     
        },
        mounted() {
            this.$store.dispatch('LoadActivityCompanies');
        },
        methods: {
            CreateActivity() {
                this.modal2 = true;
                this.TitleModel = 'ثبت مهارت رفتاری جدید';
                this.title = '';
                this.id = '';
                this.type = 'create'
            } , 
            DeleteActivity( title , id , index ){
                this.modal3 = true;
                this.TitleDelet = title;
                this.id = id;
                this.index = index
            },
            EditActivity( title , id , index ){
                this.modal2 = true;
                this.TitleModel = 'ویرایش مهارت '+ title;
                this.title = title;
                this.id = id;
                this.type = 'edit';
                this.index = index
            },
            putActivity(){
                this.$v.$touch()
                if (this.$v.$invalid) {
                    this.$notify({
                        group: 'foo',
                        width : '400px',
                        title: 'فرم دارای خطاست',
                        text: 'لطفا قبل از ثبت خطاهای خود را بررسی کنید',
                        timer: 3000
                    });
                }
                else{
                    if(this.type == 'create') 
                        this.newActivity()
                    else if( this.type == 'edit' )
                        this.updateActivity()
                }
            },

            newActivity() {
                this.modal_loading = true;
                this.$store.dispatch('storeActivityCompany', { 'title': this.title })
                .then(response => {
                    this.$notify({
                        group: 'success',
                        width : '400px',
                        title: 'success',
                        text: `مهارت ${response.data.data.activity.title} با موفقیت ثبت شد`,
                        duration: 10000,
                        speed: 1000,
                        closeOnClick: true,
                        classes: 'vue-notification success'
                    });
                    this.modal_loading = false;
                    this.modal2 = false;
                })
                .catch(error => {
                    this.modal_loading = false;
                    this.$notify({
                        group: 'error',
                        width : '400px',
                        title: 'خطا!',
                        text: 'با خطا مواجه شدید لطفا دوباره تلاش کنید.',
                        type: "error",
                        timer: 3000
                    });
                });
            }  , 
            updateActivity() {
                this.modal_loading = true;
                this.$store.dispatch('updateActivityCompany', { 'id': this.id  , 'title' : this.title})
                .then(response => {
                    this.$notify({
                        group: 'success',
                        width : '400px',
                        title: 'success',
                        text: response.data.data.message,
                        duration: 10000,
                        speed: 1000,
                        closeOnClick: true,
                        classes: 'vue-notification success'
                    });
                    this.modal_loading = false;
                    this.modal2 = false;
                })
                .catch(error => {
                    this.modal_loading = false;
                    this.$notify({
                        group: 'error',
                        width : '400px',
                        title: 'خطا!',
                        text: 'با خطا مواجه شدید لطفا دوباره تلاش کنید.',
                        type: "error",
                        timer: 3000
                    });
                });
            },

            deleteS ( id , index) {
                
                this.modal_loading = true;
                this.$store.dispatch('deleteActivityCompany', { 'id': this.id  , 'index' : this.index})
                .then( response => {
                    this.$notify({
                        group: 'success',
                        width : '400px',
                        title: 'success',
                        text: response.data.data.message,
                        timer: 3000
                    });
                    this.modal_loading = false;
                    this.modal3 = false;
                })
                .catch(error => {
                    console.log(error)
                    this.modal_loading = false;
                    this.$notify({
                        group: 'foo',
                        width : '400px',
                        title: 'خطا!',
                        text: 'با خطا مواجه شدید لطفا دوباره تلاش کنید.',
                        timer: 3000
                    });
                });

        
            }
        }, 
        computed : {
            activityCompanies(){return this.$store.state.AdminActivityCompany.activityCompanies},
        }
    }
</script>
<style>
.ivu-collapse > .ivu-collapse-item > .ivu-collapse-header > i {
    transition: transform .2s ease-in-out;
    margin-right: 14px;
    left: 0;
    position: absolute;
    left: 10px;
    top: 12px;
}
.ivu-collapse > .ivu-collapse-item > .ivu-collapse-header {
    margin-right: 14px;
}
.jobs{
    padding: 5px;
    background: #f7f7f7;
    margin-top: 7px;
    border: 1px solid #dcdee2;
    border-radius: 4px;
    margin-right: 0px;
    margin-left: 0px;

}
.btn-admin{
    background: #fff linear-gradient(180deg,#fafbfc,#fff) repeat-x;
    color: #595f66;
    border-color: #c9d2dc;
    box-shadow: none;
    box-shadow: 0 0 3px 0 rgba(188,205,215,.2), 0 1px 5px 0 rgba(188,205,215,.2), 0 3px 1px -1px rgba(188,205,215,.2);
    background-image: linear-gradient(-180deg,#fff,#f5f8f9 99%)!important;
    float: left;
}
.content {
    color: #515a6e;
    padding: 10px 16px;
    background-color: #fff;
    margin-top: 10px;
    box-shadow: 0 15px 30px 0 rgba(0, 0, 0, 0.11), 0 5px 15px 0 rgba(0, 0, 0, 0.08);
}
</style>