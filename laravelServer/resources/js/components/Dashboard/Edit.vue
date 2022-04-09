<template>
    <div>
       <div>
            <div>
               <div class="row text-">
                   <div style="margin: auto;"  class="col-lg-10 col-md-12 col-sm-12 offset-lg-4 offset-md-3">
                       <div class="text-center">
                          <div style="font-size: 18px;" class="font-size-3xl font-weight-bold color-grey-dark-2 mb-4">ویرایش آگهی استخدام</div>
                          </div>
                          <div class="card box-shadow-lg p-3">
                              <div class="card-body">
                                  <div>
                                    <Form ref="formValidate">
                                            <div class="row">
                                                <Alert v-if="form.status == 'no'" type="error">
                                                    <div> علت عدم تایید :</div>
                                                    {{form.is_show_comment}}
                                                </Alert>
                                                <FormItem  class="col-md-12" label="عنوان آگهی">
                                                    <span class="required-star">*</span>
                                                    <Tooltip trigger="hover" style="top: -122px;" placement="top">

                                                        <Input
                                                            :class="{ 'ivu-form-item-error animation-error': $v.form.title.$error,'is-valid': !$v.form.title.$invalid }"
                                                            v-model.trim="$v.form.title.$model"></Input>
                                                            <div style="line-height: 2.25;" slot="content">
                                                                <p style="font-weight: bold;"><Icon style="color: #e3e320;font-size: 16px;font-weight: bold;margin-left: 5px;" type="ios-bulb" />عنوان های شغلی قابل قبول</p>
                                                                <p><Icon style="margin-left: 8px;font-size: 10px;margin-right: 3px;color: #eee;" type="ios-radio-button-on" /><i>شناخته شده و پرتکرار باشد</i></p>
                                                                <p><Icon style="margin-left: 8px;font-size: 10px;margin-right: 3px;color: #eee;"  type="ios-radio-button-on" /><i>غیر واقعی و چند منظوره نباشد</i></p>
                                                                <p><Icon style="margin-left: 8px;font-size: 10px;margin-right: 3px;color: #eee;"  type="ios-radio-button-on" /><i>تنها مربوط به ادبیات مجموعه شما نباشد</i></p>
                                                                <p><Icon style="margin-left: 8px;font-size: 10px;margin-right: 3px;color: #eee;"  type="ios-radio-button-on" /><i>بدون هم پوشانی با صنایع دیگر باشد</i></p>
                                                            </div>
                                                        </Tooltip>
                                                    <div class="ivu-form-item-error-tip" v-if="$v.form.title.$error">فیلد مورد نظر را پرکنید</div>
                                                </FormItem>
                                                <FormItem  class="col-md-4" label="دسته‌بندی شغلی">
                                                    <span class="required-star">*</span>
                                                    <Col span="12" >
                                                        <v-select
                                                            :class="{ vSelectRequired  : $v.form.Job.$error , vselectHide  : showJob }"
                                                            class="style-chooser"
                                                            placeholder="انتخاب کنید "
                                                            label="title" :options="jobs" @input="JobCategoryLists()"
                                                            v-model.trim="$v.form.Job.$model"
                                                            :reduce="d => d.id" taggable></v-select>

                                                        <div class="ivu-form-item-error-tip" v-if="$v.form.Job.$error">فیلد مورد نظر را پرکنید</div>
                                                    </Col>
                                            </FormItem>
                                                <FormItem  class="col-md-4" label="زیرمجموعه شغلی">
                                                    <span class="required-star">*</span>
                                                    <Col span="12">
                                                        <v-select
                                                            :class="{ vSelectRequired  : $v.form.Job1.$error, vselectHide  : showJob }"
                                                            class="style-chooser"
                                                            placeholder="انتخاب کنید "
                                                            label="title" :options="categories" @input="WorkCategoryLists()"
                                                            v-model.trim="$v.form.Job1.$model"
                                                            :reduce="d => d.id" taggable></v-select>
                                                        <div class="ivu-form-item-error-tip" v-if="$v.form.Job1.$error">فیلد مورد نظر را پرکنید</div>
                                                    </Col>
                                            </FormItem>
                                                <FormItem  class="col-md-4" label="تخصص نهایی">
                                                    <span class="required-star">*</span>
                                                        <Col span="12" >
                                                            <v-select
                                                                :class="{ vSelectRequired  : $v.form.Job2.$error , vselectHide  : showJob}"
                                                                class="style-chooser"
                                                                placeholder="انتخاب کنید "
                                                                multiple
                                                                label="title" :options="workCategories"
                                                                v-model.trim="$v.form.Job2.$model"
                                                                :reduce="d => d.id" taggable></v-select>
                                                            <div class="ivu-form-item-error-tip" v-if="$v.form.Job2.$error">فیلد مورد نظر را پرکنید</div>
                                                        </Col>
                                                </FormItem>
                                                <FormItem  class="col-md-4" label="سابقه کار مرتبط">
                                                    <span class="required-star">*</span>
                                                        <Col span="12">
                                                            <v-select
                                                                :class="{ vSelectRequired  : $v.form.HistoryJop.$error , vselectHide  : showHistory  }"
                                                                class="style-chooser"
                                                                placeholder="انتخاب کنید "
                                                                label="title" :options="JobList"
                                                                v-model.trim="$v.form.HistoryJop.$model"
                                                                :reduce="d => d.id" taggable></v-select>
                                                            <div class="ivu-form-item-error-tip" v-if="$v.form.HistoryJop.$error">فیلد مورد نظر را پرکنید</div>
                                                        </Col>
                                                </FormItem>
                                                 <FormItem class="col-md-4" label="حداقل مدرک تحصیل ">
                                                    <span class="required-star">*</span>
                                                        <Col span="12">
                                                            <v-select
                                                                :class="{ vSelectRequired  : $v.form.Document.$error , vselectHide  : showDoc }"
                                                                class="style-chooser"
                                                                placeholder="انتخاب کنید "
                                                                label="title" :options="DocumentList"
                                                                v-model.trim="$v.form.Document.$model"
                                                                :reduce="d => d.id" taggable></v-select>
                                                            <div class="ivu-form-item-error-tip" v-if="$v.form.Document.$error">فیلد مورد نظر را پرکنید</div>
                                                        </Col>
                                                </FormItem>
                                                <FormItem class="col-md-4" label="رشته تحصیلی">
                                                <span class="required-star">*</span>
                                                        <Col span="12" >
                                                            <Input class="major-input"
                                                                :class="{ 'ivu-form-item-error animation-error': $v.form.fild_study.$error,'is-valid': !$v.form.fild_study.$invalid }"
                                                                v-model.trim="$v.form.fild_study.$model"></Input>
                                                            <div class="ivu-form-item-error-tip" v-if="$v.form.fild_study.$error">فیلد مورد نظر را پرکنید</div>
                                                        </Col>
                                                </FormItem>
                                                <FormItem class="col-md-4" label="استان">
                                                <span class="required-star">*</span>
                                                        <Col span="12">
                                                            <v-select
                                                                :class="{ vSelectRequired  : $v.form.province.$error,vselectHide  : showCity}"
                                                                class="style-chooser"
                                                                placeholder="انتخاب کنید "
                                                                label="title" :options="ProvinceList"
                                                                @input="Citys()"
                                                                v-model.trim="$v.form.province.$model"
                                                                :reduce="d => d.id" taggable></v-select>
                                                            <div class="ivu-form-item-error-tip" v-if="$v.form.province.$error">فیلد مورد نظر را پرکنید</div>
                                                        </Col>
                                                </FormItem>
                                                <FormItem  class="col-md-4" label="شهر">
                                                <span class="required-star">*</span>
                                                        <Col span="12">
                                                            <v-select
                                                                :class="{ vSelectRequired  : $v.form.city.$error , vselectHide  : showCity}"
                                                                class="style-chooser"
                                                                placeholder="انتخاب کنید "
                                                                label="title" :options="cityList"
                                                                v-model.trim="$v.form.city.$model"
                                                                :reduce="d => d.id" taggable></v-select>
                                                            <div class="ivu-form-item-error-tip" v-if="$v.form.city.$error">فیلد مورد نظر را پرکنید</div>
                                                        </Col>
                                                </FormItem>
                                                <FormItem  class="col-md-4" label="نوع همکاری">
                                                <span class="required-star">*</span>
                                                        <Col span="12">
                                                            <v-select
                                                                :class="{ vSelectRequired  : $v.form.Cooperation_type.$error , vselectHide  : showCoo  }"
                                                                class="style-chooser"
                                                                placeholder="انتخاب کنید "
                                                                label="title" :options="Cooperation_typeList"
                                                                v-model.trim="$v.form.Cooperation_type.$model"
                                                                :reduce="d => d.id" taggable></v-select>
                                                            <div class="ivu-form-item-error-tip" v-if="$v.form.Cooperation_type.$error">فیلد مورد نظر را پرکنید</div>
                                                        </Col>
                                                </FormItem>
                                                <FormItem  class="col-md-4" label="میزان حقوق">
                                                <span class="required-star">*</span>
                                                        <Col span="12" >
                                                            <v-select
                                                                :class="{ vSelectRequired  : $v.form.money.$error , vselectHide  : showMoney  }"
                                                                class="style-chooser"
                                                                placeholder="انتخاب کنید "
                                                                label="title" :options="moneyList"
                                                                v-model.trim="$v.form.money.$model"
                                                                :reduce="d => d.id" taggable></v-select>
                                                            <div class="ivu-form-item-error-tip" v-if="$v.form.money.$error">فیلد مورد نظر را پرکنید</div>
                                                        </Col>
                                                </FormItem>
                                                <FormItem class="col-md-4" label="جنسیت">
                                                <span class="required-star">*</span>
                                                        <Col  span="12" >
                                                            <v-select
                                                                :class="{ vSelectRequired  : $v.form.Gender.$error , vselectHide  : showGen }"
                                                                class="style-chooser"
                                                                placeholder="انتخاب کنید "
                                                                label="title" :options="GenderList"
                                                                v-model.trim="$v.form.Gender.$model"
                                                                :reduce="d => d.id" taggable></v-select>
                                                            <div class="ivu-form-item-error-tip" v-if="$v.form.Gender.$error">فیلد مورد نظر را پرکنید</div>
                                                        </Col>
                                                </FormItem>
                                                <FormItem  class="col-md-4" label="وضعیت خدمت سربازی">
                                                <span class="required-star">*</span>
                                                        <Col span="12">
                                                            <v-select
                                                                :class="{ vSelectRequired  : $v.form.Soldier.$error , vselectHide  : showSoldier  }"
                                                                class="style-chooser"
                                                                placeholder="انتخاب کنید "
                                                                label="title" :options="SoliderList"
                                                                v-model.trim="$v.form.Soldier.$model"
                                                                :reduce="d => d.id" taggable></v-select>
                                                            <div class="ivu-form-item-error-tip" v-if="$v.form.Soldier.$error">فیلد مورد نظر را پرکنید</div>
                                                        </Col>
                                                </FormItem>
                                                <FormItem class="col-md-4" label="زبان خارجی">
                                                <span class="required-star">*</span>
                                                    <Col span="12">
                                                        <v-select
                                                            :class="{ vSelectRequired  : $v.form.language.$error , vselectHide  : showLang  }"
                                                            class="style-chooser"
                                                            placeholder="انتخاب کنید "
                                                            label="title" :options="Langaugs"
                                                            v-model.trim="$v.form.language.$model"
                                                            :reduce="d => d.id" taggable></v-select>
                                                        <div class="ivu-form-item-error-tip" v-if="$v.form.language.$error">فیلد مورد نظر را پرکنید</div>
                                                    </Col>
                                                </FormItem>
                                                <FormItem style="direction: ltr;" :class="{ 'ivu-form-item-error': $v.form.TimeUp.$error,'is-valid': !$v.form.TimeUp.$invalid }"  class="col-md-4" label="ساعت شروع کار">
                                                            <span class="required-star">*</span>
                                                            <TimePicker  format="HH:mm" type="time" placeholder="Select time" v-model.trim="$v.form.TimeUp.$model"></TimePicker>
                                                    <div class="ivu-form-item-error-tip" v-if="$v.form.TimeUp.$error">فیلد مورد نظر را پرکنید</div>
                                                </FormItem>
                                                <FormItem style="direction: ltr;"  :class="{ 'ivu-form-item-error': $v.form.TimeDown.$error,'is-valid': !$v.form.TimeDown.$invalid }" class="col-md-4" label="ساعت پایان کار">
                                                        <span class="required-star">*</span>
                                                        <TimePicker format="HH:mm" type="time" placeholder="Select time" v-model.trim="$v.form.TimeDown.$model"></TimePicker>
                                                        <div class="ivu-form-item-error-tip" v-if="$v.form.TimeDown.$error">فیلد مورد نظر را پرکنید</div>
                                                </FormItem>
                                                <FormItem  class="col-md-12" :class="{ 'ivu-form-item-error': $v.form.behavioralSkill.$error,'is-valid': !$v.form.behavioralSkill.$invalid }" label=" مهارت های رفتاری">
                                                    <span class="required-star">*</span>
                                                    <Select
                                                        size="large"
                                                        v-model="$v.form.behavioralSkill.$model"
                                                        multiple
                                                        filterable
                                                        placeholder="مهارت رفتاری">
                                                        <Option v-for="(skill, index) in behavioralSkills" :value="skill.id" :key="index">{{skill.title}}</Option>
                                                    </Select>
                                                    <div class="ivu-form-item-error-tip" v-if="$v.form.behavioralSkill.$error">فیلد مورد نظر را پرکنید</div>
                                                </FormItem>
                                                <FormItem class="col-12 res-poss" label="مزایای شرکت :">

                                                     <CheckboxGroup v-model="form.social">
                                                        <Checkbox v-for="(posibility , index) in Posibilities"
                                                            :key="index" :label="posibility.id"
                                                            :value="posibility.id">{{posibility.title}}</Checkbox>
                                                    </CheckboxGroup>
                                                </FormItem>
                                                <FormItem  style="margin: auto;" label="شرح شغل / مسئولیت ها"  class="col-12">
                                                    <span class="required-star">*</span>
                                                    <ckeditor      :class="{ 'ivu-form-item-error': $v.form.comment.$error,'is-valid': !$v.form.comment.$invalid }" :editor="editor" v-model.trim="$v.form.comment.$model"  :config="editorConfig"></ckeditor>
                                                    <div class="ivu-form-item-error-tip" v-if="$v.form.comment.$error">فیلد مورد نظر را پرکنید</div>
                                                </FormItem>
                                                <FormItem style="margin: auto;"  class="col-md-6 mt-5">
                                                    <Button :loading="modal_loading" @click="EditAdvertising('formValidate')" type="primary" :disabled="archieved">ویرایش آگهی جدید</Button>
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
<script src="https://cdn.ckeditor.com/ckeditor5/[version.number]/[distribution]/translations/[lang].js"></script>
<script>
import { required, minLength } from 'vuelidate/lib/validators';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
import vSelect from 'vue-select'
import 'vue-select/dist/vue-select.css';


  export default {
      components : {vSelect},
        data () {
            return {
                archieved  :false ,
                showCity : true ,
                showJob : true,
                showLang : true ,
                showDoc : true ,
                showHistory : true,
                showField : true ,
                showMoney : true ,
                showCoo : true ,
                showGen : true ,
                showSoldier  :true ,
                form:{
                    title:'',
                    social: [],
                    Job:'',
                    Job1:'',
                    Job2:'',
                    city:'',
                    money:'',
                    HistoryJop:'',
                    Document:'',
                    Gender:'',
                    Soldier:'',
                    TimeDown:'',
                    TimeUp:'',
                    Cooperation_type:'',
                    fild_study:'',
                    comment:'',
                    province:'',
                    behavioralSkill : '' ,
                    language : ''
                },
                modal_loading:false,
                modal2:false,
                editor: ClassicEditor,
                editorData: '',
                editorConfig: {
                    language: 'ar',
                    toolbar: [   'bold', 'italic',  'bulletedList','numberedList','undo','redo' ],
                },
                JobLost: [],
                JobLost1: [],
                JobLost2: [],
                GenderList: [],
                SoliderList: [],
                Cooperation_typeList: [],
                moneyList: [],
            }
        },
        validations: {
            form:{
                title:{
                    required,
                },
                Job:{
                  required,
                },
                Job1:{
                    required,
                },
                Job2:{
                    required,
                },
                city:{
                    required,
                },
                Cooperation_type:{
                    required,
                },
                money:{
                required,
                },
                HistoryJop:{
                required,
                },
                Document:{
                    required,
                },
                comment:{
                required,
                },
                Gender:{
                    required,
                },
                Soldier:{
                    required,
                },
                fild_study:{
                    required,
                },
                TimeUp:{
                    required,
                },
                TimeDown:{
                    required,
                },
                province:{
                    required,
                } ,
                behavioralSkill :{required} ,
                language : {required}
            },
        },
        computed: {
            cityList() { return this.$store.getters.getCities(this.$v.form.province.$model)} ,
            ProvinceList() {return this.$store.state.Province.provinces;},
            behavioralSkills(){return this.$store.state.CompanyBehavioralSkills.behavioralSkills},
            Langaugs(){return this.$store.state.Languge.Languge},
            Posibilities(){return this.$store.state.CompanyPosibility.posibilities},
            jobs () { return this.$store.state.Job.Jobs },
            categories () { return this.$store.getters.getJobcategory(this.$v.form.Job.$model)},
            workCategories () { return this.$store.getters.workCategories(this.$v.form.Job.$model , this.$v.form.Job1.$model)},
            JobList() { return this.$store.state.HistoryJob.HistoryList} ,
            DocumentList() { return this.$store.state.Document.Documents}
        },
         mounted() {
            this.Authorized();
            this.getJobLost();
            this.$store.dispatch('LoadDocuments').then(response =>  {this.showDoc = false});
            this.$store.dispatch('LoadHistoryList').then(response =>  {this.showHistory = false});
            this.CooperationType();
            this.Gender();
            this.Solider();
            this.money();
            this.getShowAdvertisings();
             this.$store.dispatch('LoadProvinces').then(response =>  {this.showCity = false});
             this.$store.dispatch('LoadJobs').then(response =>  {this.showJob = false});
            this.$store.dispatch('LoadCompanyBehavioralSkills');
            this.$store.dispatch('LoadLanguge').then(response =>  {this.showLang = false});
            this.$store.dispatch('LoadCompanyPosibilities');
        },
        methods: {
            EditAdvertising (name) {
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
            }else{
                this.modal_loading = true;
                axios.put(`api/v1/Advertising/${this.$route.params.id}`, this.form,{ headers: { Authorization: `Bearer ${this.generatedToken()}` } })
                .then(response => {
                    this.$fire({
                        title: '',
                        text: response.data.message,
                        type: "success",
                        timer: 3000
                        }).then(r => {console.log(r.value);});
                        this.$router.push({ name: 'DashboardCompany' }).catch(() => {});
                })
                .catch(error => {
                        this.$fire({
                            title: 'با خطا مواجه شد ',
                            text: 'برای ویرایش اطلاعات با خطا مواجه شده اید لطفا دوباره تلاش کنید.',
                            type: "error",
                            timer: 3000
                        }).then(r => {console.log(r.value); });
                })
                .finally(() => {setTimeout(() => {this.modal_loading=false;}, 300);});

                }
            },
            Citys(){
                this.$v.form.city.$model = ''
            },
            money(){
                axios.get('api/v1/money')
                .then(response => {
                    this.moneyList = response.data.data;
                    this.showMoney = false
                })
                .catch(error=>console.log(error))
            },
            Solider(){
                axios.get('api/v1/soldier')
                .then(response => {
                    this.SoliderList = response.data.data;
                    this.showSoldier = false
                })
                .catch(error=>console.log(error))
            },
            Gender(){
                axios.get('api/v1/gender')
                .then(response => {
                    this.GenderList = response.data.data;
                    this.showGen = false
                })
                .catch(error=>console.log(error))
            },
            CooperationType(){
                axios.get('api/v1/cooperation_type')
                .then(response => {
                    this.Cooperation_typeList = response.data.data;
                    this.showCoo = false
                })
                .catch(error=>console.log(error))
            },
            WorkCategoryList(){
                axios.get('api/v1/list-work-category/'+this.form.Job1,{ headers: { Authorization: `Bearer ${this.generatedToken()}` } })
                .then(response => {

                    this.JobLost2 = response.data.data;
                })
                .catch(error=>console.log(error))
            },
            WorkCategoryLists(){
                this.$v.form.Job2.$model = ''
            },
            JobCategoryList(){

                axios.get('api/v1/list-jobs-category/'+this.form.Job,{ headers: { Authorization: `Bearer ${this.generatedToken()}` } })
                .then(response => {
                    this.JobLost1 = response.data.data;
                })
                .catch(error=>console.log(error))
            },
            JobCategoryLists(){
                this.$v.form.Job1.$model = ''
                this.$v.form.Job2.$model = ''
            },
            getJobLost(){
                axios.get('api/v1/list-jobs',{ headers: { Authorization: `Bearer ${this.generatedToken()}` } })
                .then(response => {
                    this.JobLost = response.data.data;
                })
                .catch(error=>console.log(error))
            },

            getShowAdvertisings(){
                axios.get(`api/v1/Advertising/${this.$route.params.id}`,{ headers: { Authorization: `Bearer ${this.generatedToken()}` } })
                .then(response => {
                   this.form.title = response.data.data.title;
                   this.form.money = response.data.data.money;
                   this.form.HistoryJop = response.data.data.HistoryJop;
                   this.form.Document = response.data.data.Document;
                   this.form.Gender = response.data.data.Gender;
                   this.form.Soldier = response.data.data.Soldier;
                   this.form.TimeDown = response.data.data.TimeDown;
                   this.form.TimeUp = response.data.data.TimeUp;
                   this.form.Cooperation_type = response.data.data.Cooperation_type;
                   this.form.fild_study = response.data.data.fild_study;
                   this.form.comment = response.data.data.comment;
                   this.form.city = response.data.data.city;
                   this.form.Job = response.data.data.job;
                   this.form.Job1 = response.data.data.category_id;
                   this.form.Job2 = response.data.data.work_category_id;
                   this.JobCategoryList();
                   this.WorkCategoryList();
                   this.form.province = response.data.data.province;
                   this.form.status = response.data.data.status;
                   this.form.is_show_comment = response.data.data.is_show_comment;
                   this.form.language = response.data.data.lang_id;
                   this.form.social = response.data.data.social.map(item => { return item.id })
                   this.form.behavioralSkill = response.data.data.behavioralSkill.map(item => { return item.id })

                })
                .catch(error=>console.log(error))
            },
        CreateAdvertising (name) {
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
      }else{
          this.modal_loading = true;
        axios.post('api/v1/Advertising', this.form,{ headers: { Authorization: `Bearer ${this.generatedToken()}` } })
         .then(response => {
              this.$fire({
                  title: '',
                  text: response.data.message,
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
     },

    } ,
      created() {
          if(Object.keys(this.$route.query).length != 0) {
              if(this.$route.query.type == 'archieved')
                 this.archieved = true
          }
      }
  }
 </script>
<style>
.vSelectRequired .vs__dropdown-toggle {
    border-color: red;
}
.vselectHide .vs__selected {
    visibility: hidden;
}
.ivu-tooltip {
    width: 100%;
}
.ivu-tooltip-inner {

    color: #fff;
    text-align: right !important;
}
.ivu-tooltip input:focus + .ivu-tooltip-popper {
  background-color: yellow;
}
.ck.ck-editor {
    width: 100%;
}
.ck-editor__editable {
    min-height: 200px;
    min-width: 100%;
}
.ck-rounded-corners .ck.ck-editor__top .ck-sticky-panel .ck-toolbar, .ck.ck-editor__top .ck-sticky-panel .ck-toolbar.ck-rounded-corners {
    width: 100%;
}
.ivu-alert  {
    width : 100%  !important;
    padding: 8px 16px 8px 16px !important;
}
@media only screen and (max-width: 768px) {
    .res-poss .ivu-form .ivu-form-item-label {
        width: 100% !important;
    }
    .ivu-date-picker{
        display: block !important;
    }
}

</style>

