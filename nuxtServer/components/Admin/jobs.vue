<template>
  <div>
    <div class="row mb-3">
      <div  class="col-12 col-md-6">شغل های سفربانک</div>
      <div class="col-12 col-md-6">
        <Button  @click="CreateJob()" class="col-md-12 float-left" type="primary">
          <Icon class="font-weight-bold font-18" type="md-add" />ثبت دسته بندی شغلی جدید
        </Button>
      </div>
    </div>
    <div>
      <Collapse   accordion  class="box-shadow-lg">
        <Panel v-for="ListJob in ListJobs" :data="ListJob" :key="ListJob.id"
               :name="'1'+ListJob.id">
          {{ListJob.title}}
          <div slot="content">
            <div class="row pb-3">
              <div class="col-6">زیرمجموعه شغل های  {{ListJob.title}}</div>
              <div class="col-6">
                <Button @click="CreateJob1(ListJob.title,ListJob.id)"
                        class="col-md-1 col-4 btn-admin" >
                  <Icon class="font-18 font-weight-bold d-flex justify-content-center" type="md-add" />
                </Button>
                <Button @click="EditJob(ListJob,ListJob.id)"
                        class="col-md-1 col-4 btn-admin" >
                  <Icon class="font-18 font-weight-bold d-flex justify-content-center" type="ios-create" />
                </Button>
                <Button @click="DeleteJob(ListJob.title,ListJob.id)"
                        class="col-md-1 col-4 btn-admin" >
                  <Icon class="font-18 font-weight-bold d-flex justify-content-center" type="ios-trash" />
                </Button>
              </div>
            </div>
            <Collapse accordion>
              <Panel v-for="CategoryJob in ListJob.CategoryJob" :data="CategoryJob"
                     :key="CategoryJob.id" :name="ListJob.id+'-'+CategoryJob.id">
                {{CategoryJob.title}}
                <div slot="content">
                  <div class="row pb-3">
                    <div class="col-6"> تخصص های نهایی  {{CategoryJob.title}}</div>
                    <div class="col-6">
                      <Button @click="CreateJob2(CategoryJob.title,CategoryJob.id)"
                              class="col-md-1 col-4 btn-admin" >
                        <Icon class="font-18 font-weight-bold d-flex justify-content-center" type="md-add" />
                      </Button>
                      <Button @click="EditJob1(CategoryJob.title,CategoryJob.id)"
                              class="col-md-1 col-4 btn-admin" >
                        <Icon class="font-18 font-weight-bold d-flex justify-content-center" type="ios-create" />
                      </Button>
                      <Button @click="DeleteJob1(CategoryJob.title,CategoryJob.id)"
                              class="col-md-1 col-4 btn-admin" >
                        <Icon class="font-18 font-weight-bold d-flex justify-content-center" type="ios-trash" />
                      </Button>
                    </div>
                  </div>
                  <div v-for="CategoryWork in CategoryJob.CategoryWork" class="jobs row">
                    <div class="col-6">{{CategoryWork.title}}</div>
                    <div class="col-6">
                      <Button @click="EditJob2(CategoryWork.title,CategoryWork.id)"
                              class="col-md-1 col-4 btn-admin" >
                        <Icon class="font-18 font-weight-bold d-flex justify-content-center" type="ios-create" />
                      </Button>
                      <Button @click="DeleteJob2(CategoryWork.title,CategoryWork.id)"
                              class="col-md-1 col-4 btn-admin" >
                        <Icon class="font-18 font-weight-bold d-flex justify-content-center" type="ios-trash" />
                      </Button>
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
      <p slot="header" class="text-center">
        <span>{{TitleModel}}</span>
      </p>
      <div class="text-center">
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
            <img v-if="logo" style="width: 68px;"  :src="appurl+'/images/company/' + logo"  >
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
      <div class="text-center">
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
  computed :{
    appurl() {
      return this.$store.state.globalFunctions.APP_URL
    },
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
      this.$axios.delete('api/v1/category-works/'+this.id)
        .then(response => {
          this.$store.dispatch('globalFunctions/SuccessNotify' ,response.data.data.message )
          this.modal_loading = false;
          this.modal3 = false;
          this.getListJobs();
        })
        .catch(error => {
          this.modal_loading = false;
          this.$store.dispatch('globalFunctions/SuccessNotify' ,response.data.data.message )
          this.$store.dispatch('globalFunctions/ErrorNotify2' ,'با خطا مواجه شدید لطفا دوباره تلاش کنید.' )
        });
    },
    DeleteCategoryJobData(){
      this.modal_loading = true;
      this.$axios.delete('api/v1/category-jobs/'+this.id)
        .then(response => {
          this.$store.dispatch('globalFunctions/SuccessNotify' ,response.data.data.message )
          this.modal_loading = false;
          this.modal3 = false;
          this.getListJobs();
        })
        .catch(error => {
          this.modal_loading = false;
          this.$store.dispatch('globalFunctions/ErrorNotify2' ,'با خطا مواجه شدید لطفا دوباره تلاش کنید.' )
        });
    },
    DeleteJobData(){
      this.modal_loading = true;
      this.$axios.delete('api/v1/jobs/'+this.id)
        .then(response => {
          this.$store.dispatch('globalFunctions/SuccessNotify' ,response.data.data.message )
          this.modal_loading = false;
          this.modal3 = false;
          this.getListJobs();
        })
        .catch(error => {
          this.modal_loading = false;
          this.$store.dispatch('globalFunctions/ErrorNotify2' ,'با خطا مواجه شدید لطفا دوباره تلاش کنید.' )
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
        this.$store.dispatch('globalFunctions/ErrorNotify2' ,'با خطا مواجه شدید لطفا دوباره تلاش کنید.' )
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
      this.$axios.put('api/v1/category-works/'+this.id, {jobs: this.jobs})
        .then(response => {
          this.$store.dispatch('globalFunctions/SuccessNotify' ,response.data.data.message )
          this.modal_loading = false;
          this.modal2 = false;
          this.getListJobs();
        })
        .catch(error => {
          this.modal_loading = false;
          this.$store.dispatch('globalFunctions/ErrorNotify2' ,'با خطا مواجه شدید لطفا دوباره تلاش کنید.' )
        });
    },
    CategoryJobsEdit(){
      this.modal_loading = true;
      this.$axios.put('api/v1/category-jobs/'+this.id, {jobs: this.jobs})
        .then(response => {
          this.$store.dispatch('globalFunctions/SuccessNotify' ,response.data.data.message )
          this.modal_loading = false;
          this.modal2 = false;
          this.getListJobs();
        })
        .catch(error => {
          this.modal_loading = false;
          this.$store.dispatch('globalFunctions/ErrorNotify2' ,'با خطا مواجه شدید لطفا دوباره تلاش کنید.' )
        });
    },
    CategoryWorkCreat(){
      this.modal_loading = true;
      this.$axios.post('api/v1/category-works', {jobs: this.jobs,id_job: this.id})
        .then(response => {
          this.$store.dispatch('globalFunctions/SuccessNotify' ,response.data.data.message )
          this.modal_loading = false;
          this.modal2 = false;
          this.getListJobs();
        })
        .catch(error => {
          this.modal_loading = false;
          this.$store.dispatch('globalFunctions/ErrorNotify2' ,'با خطا مواجه شدید لطفا دوباره تلاش کنید.' )
        });
    },
    CategoryJobsCreat(){
      this.modal_loading = true;
      this.$axios.post('api/v1/category-jobs', {jobs: this.jobs,id_job: this.id})
        .then(response => {
          this.$store.dispatch('globalFunctions/SuccessNotify' ,response.data.data.message )
          this.modal_loading = false;
          this.modal2 = false;
          this.getListJobs();
        })
        .catch(error => {
          this.modal_loading = false;
          this.$store.dispatch('globalFunctions/ErrorNotify2' ,'با خطا مواجه شدید لطفا دوباره تلاش کنید.' )
        });

    },
    EditJobData(){
      // alert('sds');
      this.modal_loading = true;
      this.$axios.put('api/v1/jobs/'+this.id, {'job' :this.jobs , 'logo' : this.logo})
        .then(response => {
          this.$store.dispatch('globalFunctions/SuccessNotify' ,response.data.data.message )
          this.modal_loading = false;
          this.modal2 = false;
          this.getListJobs();
        })
        .catch(error => {
          this.modal_loading = false;
          this.$store.dispatch('globalFunctions/ErrorNotify2' ,'با خطا مواجه شدید لطفا دوباره تلاش کنید.' )
        });
    },
    CreateJobData(){
      this.modal_loading = true;
      this.$axios.post('api/v1/jobs', {'job' :this.jobs , 'logo' : this.logo})
        .then(response => {
          this.$store.dispatch('globalFunctions/SuccessNotify' ,response.data.data.message )
          this.modal_loading = false;
          this.modal2 = false;
          this.getListJobs();
        })
        .catch(error => {
          this.modal_loading = false;
          this.$store.dispatch('globalFunctions/ErrorNotify2' ,'با خطا مواجه شدید لطفا دوباره تلاش کنید.' )
        });
    },
    getListJobs(){
      this.$axios.get('api/v1/jobs')
        .then(response => {
          var jobs = response.data.data;
          let job = jobs.find( x => x.id == 1)
          if(job) {
            let index = jobs.indexOf(job)
            jobs.splice(index  , 1)
          }
          this.ListJobs = jobs

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
