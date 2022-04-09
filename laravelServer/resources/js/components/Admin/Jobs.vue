<template>
    <div>
        <div style="padding-bottom: 10px;" class="row">
           <div  class="col-12 col-md-6">شغل های سفربانک</div>
           <div class="col-12 col-md-6">
                <Button  @click="CreateJob()" class="col-md-12 " style="float: left;" type="primary"><Icon style="font-size: 19px;font-weight: bold;" type="md-add" />ثبت دسته بندی شغلی جدید</Button>
           </div>
        </div>
        <div  >
        <Collapse   accordion  class="box-shadow-lg">
            <Panel v-for="ListJob in ListJobs" v-bind:data="ListJob" v-bind:key="ListJob.id"  :name="'1'+ListJob.id">
                 {{ListJob.title}}
                <div slot="content">
                   <div style="padding-bottom: 10px;" class="row">
                        <div class="col-6">زیرمجموعه شغل های  {{ListJob.title}}</div>
                        <div class="col-6">
                            <Button @click="CreateJob1(ListJob.title,ListJob.id)" style=""   class="col-md-1 col-4 btn-admin" ><Icon style="font-size: 19px;font-weight: bold;display: flex;justify-content: center;" type="md-add" /></Button>
                            <Button @click="EditJob(ListJob,ListJob.id)" style=""   class="col-md-1 col-4 btn-admin" ><Icon style="font-size: 19px;font-weight: bold;display: flex;justify-content: center;" type="ios-create" /></Button>
                            <Button @click="DeleteJob(ListJob.title,ListJob.id)" style=""   class="col-md-1 col-4 btn-admin" ><Icon style="font-size: 19px;font-weight: bold;display: flex;justify-content: center;" type="ios-trash" /></Button>
                        </div>
                    </div>
                    <Collapse accordion >
                        <Panel v-for="CategoryJob in ListJob.CategoryJob" v-bind:data="CategoryJob" v-bind:key="CategoryJob.id" :name="ListJob.id+'-'+CategoryJob.id">
                            {{CategoryJob.title}}
                            <div slot="content">
                                <div  style="padding-bottom: 10px;" class="row">
                                    <div class="col-6"> تخصص های نهایی  {{CategoryJob.title}}</div>
                                    <div class="col-6">
                                       <Button @click="CreateJob2(CategoryJob.title,CategoryJob.id)" style=""   class="col-md-1 col-4 btn-admin" ><Icon style="font-size: 19px;font-weight: bold;display: flex;justify-content: center;" type="md-add" /></Button>
                                       <Button @click="EditJob1(CategoryJob.title,CategoryJob.id)" style=""  class="col-md-1 col-4 btn-admin" ><Icon style="font-size: 19px;font-weight: bold;display: flex;justify-content: center;" type="ios-create" /></Button>
                                       <Button @click="DeleteJob1(CategoryJob.title,CategoryJob.id)" style=""   class="col-md-1 col-4 btn-admin" ><Icon style="font-size: 19px;font-weight: bold;display: flex;justify-content: center;" type="ios-trash" /></Button>
                                    </div>
                                </div>
                                <div v-for="CategoryWork in CategoryJob.CategoryWork" class="jobs row">
                                    <div class="col-6">{{CategoryWork.title}}</div>
                                    <div class="col-6">
                                       <Button @click="EditJob2(CategoryWork.title,CategoryWork.id)" style=""   class="col-md-1 col-4 btn-admin" ><Icon style="font-size: 19px;font-weight: bold;display: flex;justify-content: center;" type="ios-create" /></Button>
                                       <Button @click="DeleteJob2(CategoryWork.title,CategoryWork.id)" style=""   class="col-md-1 col-4 btn-admin" ><Icon style="font-size: 19px;font-weight: bold;display: flex;justify-content: center;" type="ios-trash" /></Button>
                                    </div>
                                </div>
                            </div>
                        </Panel>
                    </Collapse>
                </div>
            </Panel>

        </Collapse>
        </div>

    <Modal v-model="modal2" class-name="vertical-center-modal" >
            <p slot="header" style="text-align:center">
                <span>{{TitleModel}}</span>
            </p>
            <div style="text-align:center">
                   <input type="hidden" v-model="id">
                    <input type="hidden" v-model="type">
                   <Form ref="formValidate">
                    <FormItem  :class="{ 'ivu-form-item-error': $v.jobs.$error,'is-valid': !$v.jobs.$invalid }" class="" label="">
                        <Input size="large" :class="{ 'ivu-form-item-error animation-error': $v.jobs.$error,'is-valid': !$v.jobs.$invalid }"  v-model.trim="$v.jobs.$model"></Input>
                        <div class="ivu-form-item-error-tip" v-if="$v.jobs.$error">فیلد مورد نظر را پرکنید</div>
                    </FormItem>
                   <FormItem v-if="type == '' || type == 'edit'" label="تصویر شغل">
                       <Upload
                           :on-success="handleSuccess"
                           name="img"
                           multiple
                           action="api/v1/Upload">
                           <Button icon="ios-cloud-upload-outline">انتخاب و آپلود فایل لوگو</Button>
                       </Upload>
                       <img v-if="logo" style="width: 68px;"  :src="'/images/company/' + logo"  >
                   </FormItem>
                </Form>
            </div>
            <div slot="footer">
                    <Button type="primary" size="large"  long :loading="modal_loading" v-on:click="CreateModal()">ثبت شغل</Button>
            </div>
    </Modal>
     <!-- modal Delete -->
    <Modal v-model="modal3" width="360">
        <input type="hidden" v-model="id">
        <input type="hidden" v-model="type">
        <p slot="header" style="color:#f60;text-align:center">
            <Icon type="ios-information-circle"></Icon>
            <span>حذف  {{TitleDelet}}</span>
        </p>
        <div style="text-align:center">
            <p> با حذف  {{TitleDelet}} تمام زیر شاخه های آن نیز حذف می شود</p>
            <p>آیا مطمعن هستید؟</p>
        </div>
        <div slot="footer">
            <Button type="error" size="large" long :loading="modal_loading" @click="del">حذف</Button>
        </div>
    </Modal>
     <!-- end modal Delete -->
    </div>
</template>
<script>
import { required, minLength } from 'vuelidate/lib/validators'

export default {
        data () {
            return {
                modal2: false,
                modal3: false,
                modal_loading: false,
                TitleModel: '',
                TitleDelet: '',
                jobs:'',
                id:'',
                type:'',
                ListJobs:[],
                logo  : ''
            }
        },
         validations: {
            jobs:{
              required,
            },
        },
        mounted() {
            this.getListJobs();
        },
        methods: {
            handleSuccess (res, file) {
                this.logo = res.data.data;
            },
            del () {
                this.$Message.success('Successfully delete');
                if(this.type == 'jobs'){
                    this.DeleteJobData();
                }else if(this.type == 'jobs1'){
                   this.DeleteCategoryJobData();
                }else if(this.type == 'jobs2'){
                    this.DeleteCategoryWorkData();
                }

            },
            DeleteCategoryWorkData(){
                this.modal_loading = true;
               axios.delete('api/v1/category-works/'+this.id, { headers: { Authorization: `Bearer ${this.generatedToken()}` } })
                .then(response => {
                    this.$notify({
                        group: 'success',
                        width : '400px',
                        title: 'success',
                        text: response.data.data.message,
                        timer: 3000
                    });
                    this.modal_loading = false;
                    this.modal3 = false;
                    this.getListJobs();
                })
                .catch(error => {
                    this.modal_loading = false;
                    this.$notify({
                        group: 'foo',
                        width : '400px',
                        title: 'خطا!',
                        text: 'با خطا مواجه شدید لطفا دوباره تلاش کنید.',
                        timer: 3000
                    });
                });
            },
            DeleteCategoryJobData(){
                this.modal_loading = true;
               axios.delete('api/v1/category-jobs/'+this.id, { headers: { Authorization: `Bearer ${this.generatedToken()}` } })
                .then(response => {
                    this.$notify({
                        group: 'success',
                        width : '400px',
                        title: 'success',
                        text: response.data.data.message,
                        timer: 3000
                    });
                    this.modal_loading = false;
                    this.modal3 = false;
                    this.getListJobs();
                })
                .catch(error => {
                    this.modal_loading = false;
                    this.$notify({
                        group: 'foo',
                        width : '400px',
                        title: 'خطا!',
                        text: 'با خطا مواجه شدید لطفا دوباره تلاش کنید.',
                        timer: 3000
                    });
                });
            },
            DeleteJobData(){
               this.modal_loading = true;
               axios.delete('api/v1/jobs/'+this.id, { headers: { Authorization: `Bearer ${this.generatedToken()}` } })
                .then(response => {
                    this.$notify({
                        group: 'success',
                        width : '400px',
                        title: 'success',
                        text: response.data.data.message,
                        timer: 3000
                    });
                    this.modal_loading = false;
                    this.modal3 = false;
                    this.getListJobs();
                })
                .catch(error => {
                    this.modal_loading = false;
                    this.$notify({
                        group: 'foo',
                        width : '400px',
                        title: 'خطا!',
                        text: 'با خطا مواجه شدید لطفا دوباره تلاش کنید.',
                        timer: 3000
                    });
                });

            },
            CreateJob(){
                this.modal2 = true;
                this.TitleModel = 'ثبت دسته بندی شغلی جدید';
                this.jobs = '';
                this.logo = ''
                this.id = '';
                this.type = '';
            },
            CreateJob1(text,id){
                this.modal2 = true;
                this.TitleModel = 'ثبت زیرمجموعه شغلی جدید برای '+text;
                this.jobs = '';
                this.logo = '' ;
                this.id = id;
                this.type = 'jobs';

            },
            CreateJob2(text,id){
                this.modal2 = true;
                this.TitleModel = 'ثبت تخصص نهایی جدید برای  '+text;
                this.jobs = '';
                this.id = id;
                this.type = 'jobs1';
            },
            EditJob(text,id){
                this.modal2 = true;
                this.TitleModel = 'ویرایش دسته بندی شغلی '+ text.title;
                this.jobs = text.title;
                this.logo = text.image
                this.id = id;
                this.type = 'edit';
            },
            EditJob1(text,id){
                this.modal2 = true;
                this.TitleModel = 'ویرایش زیرمجموعه شغلی '+text;
                this.jobs = text;
                this.id = id;
                this.type = 'edit1';
            },
            EditJob2(text,id){
                this.modal2 = true;
                this.TitleModel = 'ویرایش تخصص نهایی '+text;
                this.jobs = text;
                this.id = id;
                this.type = 'edit2';
            },
            DeleteJob(text,id){
               this.modal3 = true;
               this.TitleDelet = text;
                this.id = id;
                this.type = 'jobs';
            },
            DeleteJob1(text,id){
               this.modal3 = true;
               this.TitleDelet = text;
                this.id = id;
                this.type = 'jobs1';
            },
            DeleteJob2(text,id){
               this.modal3 = true;
               this.TitleDelet = text;
               this.id = id;
               this.type = 'jobs2';
            },
            CreateModal(){
            this.$v.$touch()
            if (this.$v.$invalid) {
                this.$notify({
                    group: 'foo',
                    width : '400px',
                    title: 'فرم دارای خطاست',
                    text: 'لطفا قبل از ثبت خطاهای خود را بررسی کنید',
                    timer: 3000
                });
            }else{
                if(this.type == 'edit'){
                    this.EditJobData();
                }else if(this.type == 'edit1'){
                    this.CategoryJobsEdit()

                }else if(this.type == 'jobs1'){
                        this.CategoryWorkCreat()

                }else if(this.type == 'jobs') {
                    this.CategoryJobsCreat()

                }else if(this.type == 'edit2'){
                    this.CategoryWorkEdit()

                }else{
                   this.CreateJobData();
                }
            }
            },
            CategoryWorkEdit(){
                this.modal_loading = true;
                axios.put('api/v1/category-works/'+this.id, {jobs: this.jobs},{ headers: { Authorization: `Bearer ${this.generatedToken()}` } })
                .then(response => {
                    this.$notify({
                        group: 'success',
                        width : '400px',
                        title: 'success',
                        text: response.data.data.message,
                        timer: 3000
                    });
                    this.modal_loading = false;
                    this.modal2 = false;
                    this.getListJobs();
                })
                .catch(error => {
                    this.modal_loading = false;
                    this.$notify({
                        group: 'error',
                        width : '400px',
                        title: 'خطا!',
                        text: 'با خطا مواجه شدید لطفا دوباره تلاش کنید.',
                        timer: 3000
                    });
                });
            },
            CategoryJobsEdit(){
                this.modal_loading = true;
                axios.put('api/v1/category-jobs/'+this.id, {jobs: this.jobs},{ headers: { Authorization: `Bearer ${this.generatedToken()}` } })
                .then(response => {
                    this.$notify({
                        group: 'success',
                        width : '400px',
                        title: 'success',
                        text: response.data.data.message,
                        timer: 3000
                    });
                    this.modal_loading = false;
                    this.modal2 = false;
                    this.getListJobs();
                })
                .catch(error => {
                    this.modal_loading = false;
                    this.$notify({
                        group: 'error',
                        width : '400px',
                        title: 'خطا!',
                        text: 'با خطا مواجه شدید لطفا دوباره تلاش کنید.',
                        timer: 3000
                    });
                });
            },
            CategoryWorkCreat(){
                this.modal_loading = true;
                axios.post('api/v1/category-works', {jobs: this.jobs,id_job: this.id},{ headers: { Authorization: `Bearer ${this.generatedToken()}` } })
                .then(response => {
                    this.$notify({
                        group: 'success',
                        width : '400px',
                        title: 'success',
                        text: response.data.data.message,
                        timer: 3000
                    });
                    this.modal_loading = false;
                    this.modal2 = false;
                    this.getListJobs();
                })
                .catch(error => {
                    this.modal_loading = false;
                    this.$notify({
                        group: 'error',
                        width : '400px',
                        title: 'خطا!',
                        text: 'با خطا مواجه شدید لطفا دوباره تلاش کنید.',
                        timer: 3000
                    });
                });
            },
            CategoryJobsCreat(){
                this.modal_loading = true;
                axios.post('api/v1/category-jobs', {jobs: this.jobs,id_job: this.id},{ headers: { Authorization: `Bearer ${this.generatedToken()}` } })
                .then(response => {
                    this.$notify({
                        group: 'success',
                        width : '400px',
                        title: 'success',
                        text: response.data.data.message,
                        timer: 3000
                    });
                    this.modal_loading = false;
                    this.modal2 = false;
                    this.getListJobs();
                })
                .catch(error => {
                    this.modal_loading = false;
                    this.$notify({
                        group: 'error',
                        width : '400px',
                        title: 'خطا!',
                        text: 'با خطا مواجه شدید لطفا دوباره تلاش کنید.',
                        timer: 3000
                    });
                });

            },
            EditJobData(){
                // alert('sds');
                 this.modal_loading = true;
                axios.put('api/v1/jobs/'+this.id, {'job' :this.jobs , 'logo' : this.logo},{ headers: { Authorization: `Bearer ${this.generatedToken()}` } })
                .then(response => {
                    this.$notify({
                        group: 'success',
                        width : '400px',
                        title: 'success',
                        text: response.data.data.message,
                        timer: 3000
                    });
                    this.modal_loading = false;
                    this.modal2 = false;
                    this.getListJobs();
                })
                .catch(error => {
                    this.modal_loading = false;
                    this.$notify({
                        group: 'error',
                        width : '400px',
                        title: 'خطا!',
                        text: 'با خطا مواجه شدید لطفا دوباره تلاش کنید.',
                        timer: 3000
                    });
                });
            },
            CreateJobData(){
                this.modal_loading = true;
                axios.post('api/v1/jobs', {'job' :this.jobs , 'logo' : this.logo},{ headers: { Authorization: `Bearer ${this.generatedToken()}` } })
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
                    this.getListJobs();
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
            getListJobs(){
                axios.get('api/v1/jobs',{ headers: { Authorization: `Bearer ${this.generatedToken()}` } })
                .then(response => {
                    this.ListJobs = response.data.data;
                })
                .catch(error=>console.log(error))
            }
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
</style>
