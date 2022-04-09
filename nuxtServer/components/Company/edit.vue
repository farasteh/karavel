<template>
  <div>
    <div class="text-center">
      <div style="font-size: 18px;" class="font-size-3xl font-weight-bold color-grey-dark-2 mb-4">ویرایش آگهی استخدام</div>
    </div>
    <div class="card box-shadow-lg p-3">
      <div class="card-body">
        <Form ref="formValidate">
          <div class="row">
            <Alert v-if="form.status == 'no'" type="error">
              <div> علت عدم تایید :</div>
              {{form.is_show_comment}}
            </Alert>
            <FormItem  class="col-md-12" label="عنوان آگهی">
              <Tooltip trigger="hover" style="top: -122px;" placement="top">
                <Input
                  :class="{ 'ivu-form-item-error animation-error': $v.form.title.$error,'is-valid': !$v.form.title.$invalid }"
                  v-model.trim="$v.form.title.$model"></Input>
                <div style="line-height: 2.25;" slot="content">
                  <p class="font-weight-bold"><Icon class="lump-icon" type="ios-bulb" />عنوان های شغلی قابل قبول</p>
                  <p><Icon class="tooltip-icon" type="ios-radio-button-on" /><i>شناخته شده و پرتکرار باشد</i></p>
                  <p><Icon class="tooltip-icon"  type="ios-radio-button-on" /><i>غیر واقعی و چند منظوره نباشد</i></p>
                  <p><Icon class="tooltip-icon"  type="ios-radio-button-on" /><i>تنها مربوط به ادبیات مجموعه شما نباشد</i></p>
                  <p><Icon class="tooltip-icon"  type="ios-radio-button-on" /><i>بدون هم پوشانی با صنایع دیگر باشد</i></p>
                </div>
              </Tooltip>
              <div class="ivu-form-item-error-tip" v-if="$v.form.title.$error">فیلد مورد نظر را پرکنید</div>
            </FormItem>
            <FormItem  class="col-lg-4 col-md-6" label="دسته‌بندی شغلی">
              <Col span="12" >
                <Select2 placeholder="انتخاب کنید" v-model.trim="$v.form.job.$model"
                         :class="{ vSelectRequired  : $v.form.job.$error }" @change="JobCategoryLists()"
                         :options="jobs"  :searchable="false"/>
<!--                <v-select-->
<!--                  :class="{ vSelectRequired  : $v.form.job.$error , vselectHide  : showJob }"-->
<!--                  class="style-chooser"-->
<!--                  placeholder="انتخاب کنید "-->
<!--                  label="title" :options="jobs" @input="JobCategoryLists()"-->
<!--                  v-model.trim="$v.form.job.$model"-->
<!--                  :reduce="d => d.id" taggable>-->
<!--                  <div slot="no-options">موردی یافت نشد !</div>-->
<!--                </v-select>-->
                <div class="ivu-form-item-error-tip" v-if="$v.form.job.$error">فیلد مورد نظر را پرکنید</div>
              </Col>
            </FormItem>
            <FormItem  class="col-lg-4 col-md-6" label="زیرمجموعه شغلی">
              <Col span="12">
                <Select2 placeholder="انتخاب کنید" v-model.trim="$v.form.category_id.$model"
                         :class="{ vSelectRequired  : $v.form.category_id.$error }" @change="WorkCategoryLists()"
                         :options="categories"  :searchable="false"/>
<!--                <v-select-->
<!--                  :class="{ vSelectRequired  : $v.form.category_id.$error, vselectHide  : showJob }"-->
<!--                  class="style-chooser"-->
<!--                  placeholder="انتخاب کنید "-->
<!--                  label="title" :options="categories" @input="WorkCategoryLists()"-->
<!--                  v-model.trim="$v.form.category_id.$model"-->
<!--                  :reduce="d => d.id" taggable>-->
<!--                  <div slot="no-options">موردی یافت نشد !</div>-->
<!--                </v-select>-->
                <div class="ivu-form-item-error-tip" v-if="$v.form.category_id.$error">فیلد مورد نظر را پرکنید</div>
              </Col>
            </FormItem>
            <FormItem  class="col-lg-4 col-md-6" label="تخصص نهایی">
              <Col span="12" >
                <Select
                  class="job-end"
                  :class="{ 'ivu-form-item-error': $v.form.work_category_id.$error,'is-valid': !$v.form.work_category_id.$invalid }"
                  size="large"
                  v-model="$v.form.work_category_id.$model"
                  multiple
                  @on-change="disabledMax()"
                  placeholder="تخصص نهایی">
                  <Option v-for="(skill, index) in workCategories" :disabled="multiLimit" :value="skill.id" :key="index">{{skill.title}}</Option>
                </Select>
                <div class="ivu-form-item-error-tip" v-if="$v.form.work_category_id.$error">حداکثر 5 تخصص نهایی انتخاب کنید</div>
              </Col>
            </FormItem>
            <FormItem  class="col-lg-4 col-md-6" label="سابقه کار مرتبط">
              <Col span="12">
                <Select2 placeholder="انتخاب کنید" v-model.trim="$v.form.HistoryJop.$model"
                         :class="{ vSelectRequired  : $v.form.HistoryJop.$error }"
                         :options="JobList"  :searchable="false"/>
<!--                <v-select-->
<!--                  :class="{ vSelectRequired  : $v.form.HistoryJop.$error , vselectHide  : showHistory  }"-->
<!--                  class="style-chooser"-->
<!--                  :searchable="false"-->
<!--                  placeholder="انتخاب کنید "-->
<!--                  label="title" :options="JobList"-->
<!--                  v-model.trim="$v.form.HistoryJop.$model"-->
<!--                  :reduce="d => d.id" taggable>-->
<!--                  <div slot="no-options">موردی یافت نشد !</div>-->
<!--                </v-select>-->
                <div class="ivu-form-item-error-tip" v-if="$v.form.HistoryJop.$error">فیلد مورد نظر را پرکنید</div>
              </Col>
            </FormItem>
            <FormItem class="col-lg-4 col-md-6" label="حداقل مدرک تحصیل ">
              <Col span="12">
                <Select2 placeholder="انتخاب کنید" v-model.trim="$v.form.Document.$model"
                         :class="{ vSelectRequired  : $v.form.Document.$error }"
                         :options="DocumentList"  :searchable="false"/>
<!--                <v-select-->
<!--                  :searchable="false"-->
<!--                  :class="{ vSelectRequired  : $v.form.Document.$error , vselectHide  : showDoc }"-->
<!--                  class="style-chooser"-->
<!--                  placeholder="انتخاب کنید "-->
<!--                  label="title" :options="DocumentList"-->
<!--                  v-model.trim="$v.form.Document.$model"-->
<!--                  :reduce="d => d.id" taggable>-->
<!--                  <div slot="no-options">موردی یافت نشد !</div>-->
<!--                </v-select>-->
                <div class="ivu-form-item-error-tip" v-if="$v.form.Document.$error">فیلد مورد نظر را پرکنید</div>
              </Col>
            </FormItem>
            <FormItem class="col-lg-4 col-md-6" label="رشته تحصیلی">
              <Col span="12" >
                <Input class="major-input"
                       :class="{ 'ivu-form-item-error animation-error': $v.form.fild_study.$error,'is-valid': !$v.form.fild_study.$invalid }"
                       v-model.trim="$v.form.fild_study.$model"></Input>
                <div class="ivu-form-item-error-tip" v-if="$v.form.fild_study.$error">فیلد مورد نظر را پرکنید</div>
              </Col>
            </FormItem>
            <FormItem class="col-lg-4 col-md-6" label="استان">
              <Col span="12">
                <Select2 placeholder="انتخاب کنید" v-model.trim="$v.form.province.$model"
                         :class="{ vSelectRequired  : $v.form.province.$error }" @change="Citys()"
                         :options="ProvinceList"  :searchable="false"/>
<!--                <v-select-->
<!--                  :class="{ vSelectRequired  : $v.form.province.$error,vselectHide  : showCity}"-->
<!--                  class="style-chooser"-->
<!--                  placeholder="انتخاب کنید "-->
<!--                  label="title" :options="ProvinceList"-->
<!--                  @input="Citys()"-->
<!--                  v-model.trim="$v.form.province.$model"-->
<!--                  :reduce="d => d.id" taggable>-->
<!--                  <div slot="no-options">موردی یافت نشد !</div>-->
<!--                </v-select>-->
                <div class="ivu-form-item-error-tip" v-if="$v.form.province.$error">فیلد مورد نظر را پرکنید</div>
              </Col>
            </FormItem>
            <FormItem  class="col-lg-4 col-md-6" label="شهر">
              <Col span="12">
                <Select2 placeholder="انتخاب کنید" v-model.trim="$v.form.city.$model"
                         :class="{ vSelectRequired  : $v.form.city.$error }"
                         :options="cityList"  :searchable="false"/>
<!--                <v-select-->
<!--                  :class="{ vSelectRequired  : $v.form.city.$error , vselectHide  : showCity}"-->
<!--                  class="style-chooser"-->
<!--                  placeholder="انتخاب کنید "-->
<!--                  label="title" :options="cityList"-->
<!--                  v-model.trim="$v.form.city.$model"-->
<!--                  :reduce="d => d.id" taggable>-->
<!--                  <div slot="no-options">موردی یافت نشد !</div>-->
<!--                </v-select>-->
                <div class="ivu-form-item-error-tip" v-if="$v.form.city.$error">فیلد مورد نظر را پرکنید</div>
              </Col>
            </FormItem>
            <FormItem class="col-lg-4 col-md-6" label="محدوده محل کار">
              <Col span="12">
                <Input class="major-input"  :class="{ 'ivu-form-item-error animation-error': $v.form.location.$error,'is-valid': !$v.form.location.$invalid }"
                       v-model.trim="$v.form.location.$model"></Input>
                <div class="ivu-form-item-error-tip" v-if="$v.form.location.$error">فیلد مورد نظر را پرکنید</div>
              </Col>
            </FormItem>
            <FormItem  class="col-lg-4 col-md-6" label="نوع همکاری">
              <Col span="12">
                <Select2 placeholder="انتخاب کنید" v-model.trim="$v.form.Cooperation_type.$model"
                         :class="{ vSelectRequired  : $v.form.Cooperation_type.$error }"
                         :options="Cooperation_typeList"  :searchable="false"/>
<!--                <v-select-->
<!--                  :searchable="false"-->
<!--                  :class="{ vSelectRequired  : $v.form.Cooperation_type.$error , vselectHide  : showCoo  }"-->
<!--                  class="style-chooser"-->
<!--                  placeholder="انتخاب کنید "-->
<!--                  label="title" :options="Cooperation_typeList"-->
<!--                  v-model.trim="$v.form.Cooperation_type.$model"-->
<!--                  :reduce="d => d.id" taggable>-->
<!--                  <div slot="no-options">موردی یافت نشد !</div>-->
<!--                </v-select>-->
                <div class="ivu-form-item-error-tip" v-if="$v.form.Cooperation_type.$error">فیلد مورد نظر را پرکنید</div>
              </Col>
            </FormItem>
            <FormItem  class="col-lg-4 col-md-6" label="میزان حقوق">
              <Col span="12" >
                <Select2 placeholder="انتخاب کنید" v-model.trim="$v.form.money.$model"
                         :class="{ vSelectRequired  :$v.form.money.$error }"
                         :options="moneyList"  :searchable="false"/>
<!--                <v-select-->
<!--                  :searchable="false"-->
<!--                  :class="{ vSelectRequired  : $v.form.money.$error , vselectHide  : showMoney  }"-->
<!--                  class="style-chooser"-->
<!--                  placeholder="انتخاب کنید "-->
<!--                  label="title" :options="moneyList"-->
<!--                  v-model.trim="$v.form.money.$model"-->
<!--                  :reduce="d => d.id" taggable>-->
<!--                  <div slot="no-options">موردی یافت نشد !</div>-->
<!--                </v-select>-->
                <div class="ivu-form-item-error-tip" v-if="$v.form.money.$error">فیلد مورد نظر را پرکنید</div>
              </Col>
            </FormItem>
            <FormItem class="col-lg-4 col-md-6" label="جنسیت">
              <Col  span="12" >
                <Select2 placeholder="انتخاب کنید" v-model.trim="$v.form.Gender.$model"
                         :class="{ vSelectRequired  :$v.form.Gender.$error }"
                         :options="GenderList"  :searchable="false"/>
<!--                <v-select-->
<!--                  :searchable="false"-->
<!--                  :class="{ vSelectRequired  : $v.form.Gender.$error , vselectHide  : showGen }"-->
<!--                  class="style-chooser"-->
<!--                  placeholder="انتخاب کنید "-->
<!--                  label="title" :options="GenderList"-->
<!--                  v-model.trim="$v.form.Gender.$model"-->
<!--                  :reduce="d => d.id" taggable>-->
<!--                  <div slot="no-options">موردی یافت نشد !</div>-->
<!--                </v-select>-->
                <div class="ivu-form-item-error-tip" v-if="$v.form.Gender.$error">فیلد مورد نظر را پرکنید</div>
              </Col>
            </FormItem>
            <FormItem  class="col-lg-4 col-md-6" label="وضعیت خدمت سربازی">
              <Col span="12">
                <Select2 placeholder="انتخاب کنید" v-model.trim="$v.form.Soldier.$model"
                         :class="{ vSelectRequired  :$v.form.Soldier.$error }"
                         :options="SoliderList"  :searchable="false"/>
<!--                <v-select-->
<!--                  :searchable="false"-->
<!--                  :class="{ vSelectRequired  : $v.form.Soldier.$error , vselectHide  : showSoldier  }"-->
<!--                  class="style-chooser"-->
<!--                  placeholder="انتخاب کنید "-->
<!--                  label="title" :options="SoliderList"-->
<!--                  v-model.trim="$v.form.Soldier.$model"-->
<!--                  :reduce="d => d.id" taggable>-->
<!--                  <div slot="no-options">موردی یافت نشد !</div>-->
<!--                </v-select>-->
                <div class="ivu-form-item-error-tip" v-if="$v.form.Soldier.$error">فیلد مورد نظر را پرکنید</div>
              </Col>
            </FormItem>
            <FormItem style="direction: ltr;font-size: 17px"  class="col-lg-4 col-md-6" label="ساعت شروع کار">
              <date-time-picker
                :class="{timeerror : $v.form.TimeUp.$error}"
                v-model="$v.form.TimeUp.$model"
                format="HH:mm"
                :hour-time="24"
                :only-time-picker="true"
                value-format="HH:mm"
              > <template class="text-right" slot="choose-date">انتخاب ساعت شروع </template></date-time-picker>
              <div class="ivu-form-item-error-tip" style="right: 0" v-if="$v.form.TimeUp.$error">فیلد مورد نظر را پرکنید</div>
            </FormItem>
            <FormItem style="direction: ltr; font-size: 17px" class="col-lg-4 col-md-6" label="ساعت پایان کار">
              <date-time-picker
                :class="{timeerror : $v.form.TimeUp.$error}"
                v-model="$v.form.TimeDown.$model"
                format="HH:mm"
                :hour-time="24"
                :only-time-picker="true"
                value-format="HH:mm"
              > <template class="text-right" slot="choose-date">انتخاب ساعت پایان </template></date-time-picker>
              <div class="ivu-form-item-error-tip" style="right: 0" v-if="$v.form.TimeDown.$error">فیلد مورد نظر را پرکنید</div>
            </FormItem>
            <FormItem class="col-lg-4 col-md-6" label= "محدوده سنی">
              <Col span="12">
                <Select2 placeholder="انتخاب کنید" v-model.trim="$v.form.age.$model"
                         :class="{ vSelectRequired  :$v.form.age.$error }"
                         :options="ageList"  :searchable="false"/>
<!--                <v-select-->
<!--                  class="style-chooser"-->
<!--                  :class="{ vSelectRequired  : $v.form.age.$error , vselectHide  : showAge  }"-->
<!--                  :searchable="false"-->
<!--                  placeholder="انتخاب کنید "-->
<!--                  label="title" :options="ageList"-->
<!--                  v-model.trim="$v.form.age.$model"-->
<!--                  :reduce="d => d.id" taggable>-->
<!--                  <div slot="no-options">موردی یافت نشد !</div>-->
<!--                </v-select>-->
                <div class="ivu-form-item-error-tip" v-if="$v.form.age.$error">فیلد مورد نظر را پرکنید</div>
              </Col>
            </FormItem>
            <FormItem class="col-lg-8" label="زبان خارجی">
              <Select
                size="large"
                v-model="$v.form.lang_id.$model"
                multiple
                filterable
                placeholder="زبان خارجی">
                <Option v-for="(lang, index) in Langaugs" :value="lang.id" :key="index">{{lang.title}}</Option>
              </Select>
              <div class="ivu-form-item-error-tip" v-if="$v.form.lang_id.$error">فیلد مورد نظر را پرکنید</div>
            </FormItem>
            <FormItem  class="col-md-12" :class="{ 'ivu-form-item-error': $v.form.behavioralSkill.$error,'is-valid': !$v.form.behavioralSkill.$invalid }" label=" مهارت های رفتاری">
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
            <FormItem class="col-12 res-poss ress-benefits" label="مزایای شرکت :">
              <CheckboxGroup v-model="form.social">
                <Checkbox v-for="(posibility , index) in Posibilities"
                          :key="index" :label="posibility.id"
                          :value="posibility.id">{{posibility.title}}</Checkbox>
              </CheckboxGroup>
            </FormItem>
            <FormItem label="شرح شغل / مسئولیت ها"  class="col-12 m-auto">
              <ckeditor      :class="{ 'ivu-form-item-error': $v.form.comment.$error,'is-valid': !$v.form.comment.$invalid }" :editor="editor" v-model.trim="$v.form.comment.$model"  :config="editorConfig"></ckeditor>
              <div class="ivu-form-item-error-tip" v-if="$v.form.comment.$error">فیلد مورد نظر را پرکنید</div>
            </FormItem>
            <FormItem  class="col-md-6 mx-auto mt-5">
              <Button :loading="modal_loading" @click="EditAdvertising('formValidate')" type="primary" :disabled="archieved" class="karavel-btn">ویرایش آگهی جدید</Button>
            </FormItem>
          </div>
        </Form>
      </div>
    </div>
  </div>
</template>
<script src="https://cdn.ckeditor.com/ckeditor5/[version.number]/[distribution]/translations/[lang].js"></script>
<script>
import { required } from 'vuelidate/lib/validators';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
import vSelect from 'vue-select'
import 'vue-select/dist/vue-select.css';


export default {
  components : {vSelect},
  data () {
    return {
      max : 5 ,
      multiLimit : false ,
      archieved  :false ,
      showCity : false ,
      showJob : false,
      showLang : false ,
      showDoc : false ,
      showHistory : false,
      showField : false ,
      showMoney : false ,
      showCoo : false ,
      showGen : false ,
      showSoldier  :false ,
      showAge    : false ,
      modal_loading:false,
      modal2:false,
      editor: ClassicEditor,
      editorData: '',
      editorConfig: {
        language: 'ar',
        toolbar: [   'bold', 'italic',  'bulletedList','numberedList','undo','redo' ],
      },
    }
  },
  validations: {
    form:{
      title           : {required},
      job             : {required},
      category_id     : {required},
      work_category_id: {required},
      city            : {required},
      Cooperation_type: {required},
      money           : {required},
      HistoryJop      : {required},
      Document        : {required},
      comment         : {required},
      Gender          : {required},
      Soldier         : {required},
      fild_study      : {required},
      TimeUp          : {required},
      TimeDown        : {required},
      province        : {required} ,
      behavioralSkill : {required} ,
      lang_id         : {required} ,
      location        : {required} ,
      age             : {required}
    },
  },
  computed: {
    form() { return this.$store.state.Company.advertizing.CompanyAdvertising}  ,
    JobList() { return this.$store.state.HistoryJob.HistoryList} ,
    DocumentList() { return this.$store.state.Study.Document.Documents},
    Cooperation_typeList() { return this.$store.state.CooperationType.CooperationType},
    GenderList() { return this.$store.state.Gender.Gender.Gender},
    SoliderList() { return this.$store.state.Soldier.Soldier.Soldier},
    moneyList() { return this.$store.state.Money.MoneyList},
    cityList() { return this.$store.getters['Map/Province/getCities'](this.$v.form.province.$model)} ,
    ProvinceList() {return this.$store.state.Map.Province.provinces;},
    behavioralSkills(){return this.$store.state.Company.behavioralSkill.behavioralSkills},
    Langaugs(){return this.$store.state.Languge.Languge.Languge},
    Posibilities(){return this.$store.state.Company.Posibility.posibilities},
    jobs () {
      var jobs  = this.$store.state.Jobs.Jobs
      let job = jobs.find( x => x.id == 1)
      if(job)  {
        let index = jobs.indexOf(job)
        jobs.splice(index  , 1)
      }
      return jobs;
    },
    categories () { return this.$store.getters['Jobs/getJobcategory'](this.$v.form.job.$model)},
    workCategories () { return this.$store.getters['Jobs/workCategories'](this.$v.form.job.$model , this.$v.form.category_id.$model)},
    ageList () { return this.$store.state.age.ageList}
  },
  mounted() {
    //this.Authorized();
    this.$store.dispatch('Company/advertizing/LoadCompanySingleAdvertising' , {id :  this.$route.params.id});
    if( this.DocumentList.length == 0 )
    {
      this.showDoc = true
      this.$store.dispatch('Study/Document/LoadDocuments').then(response =>  {this.showDoc = false});
    }
    if ( this.JobList.length == 0)
    {
      this.showHistory = true
      this.$store.dispatch('HistoryJob/LoadHistoryList').then(response =>  {this.showHistory = false});
    }
    if(this.Cooperation_typeList.length == 0)
    {
      this.showCoo = true
      this.$store.dispatch('CooperationType/LoadCooperationTypeList').then(response =>  {this.showCoo = false});
    }
    if( this.GenderList.length == 0 ) {
      this.showGen = true
      this.$store.dispatch('Gender/Gender/LoadGender').then(response =>  {this.showGen = false});
    }
    if( this.SoliderList.length == 0 ) {
      this.showSoldier = true
      this.$store.dispatch('Soldier/Soldier/LoadSoldier').then(response =>  {this.showSoldier = false});
    }
    if( this.moneyList.length == 0) {
      this.showMoney = true
      this.$store.dispatch('Money/LoadMoneyList').then(response =>  {this.showMoney = false});
    }
    if( this.ProvinceList.length == 0)
    {
      this.showCity = true
      this.$store.dispatch('Map/Province/LoadProvinces').then(response =>  {this.showCity = false});
    }
    if(this.jobs.length == 0)
    {
      this.showJob = true
      this.$store.dispatch('Jobs/LoadJobs').then(response =>  {this.showJob = false});
    }
    if( this.behavioralSkills.length == 0 )
      this.$store.dispatch('Company/behavioralSkill/LoadCompanyBehavioralSkills');
    if(this.Langaugs.length == 0)
    {
      this.showLang = true
      this.$store.dispatch('Languge/Languge/LoadLanguge').then(response =>  {this.showLang = false});

    }
    if(this.ageList.length == 0)
    {
      this.showAge = true
      this.$store.dispatch('age/LoadAgeList').then(response =>  {this.showAge = false});
    }
    if(this.Posibilities.length == 0)
      this.$store.dispatch('Company/Posibility/LoadCompanyPosibilities');
  },
  methods: {
    disabledMax() {
      if (this.$v.form.work_category_id.$model.length >= this.max) this.multiLimit=true
      else this.multiLimit=false
    },
    EditAdvertising (name) {
      this.$v.$touch()
      if (this.$v.$invalid) {
        this.$store.dispatch('globalFunctions/ErrorNotify')
      }
      else{
        this.modal_loading = true;
        this.$store.dispatch('Company/advertizing/UpdateCompanyAdvertising' , { ad  : this.$store.state.Company.advertizing.CompanyAdvertising})

          .then(response => {
            this.$store.dispatch('globalFunctions/SuccessNotify' , response.data.message)
            this.$router.push({ path: '/posts' })
          })
          .catch(error => {
            this.$store.dispatch('globalFunctions/ErrorNotify')
          })
          .finally(()  =>  this.modal_loading=false );
      }
    },
    Citys(){
      this.$v.form.city.$model = ''
    },
    WorkCategoryLists(){
      this.$v.form.work_category_id.$model = ''
    },
    JobCategoryLists(){
      this.$v.form.category_id.$model = ''
      this.$v.form.work_category_id.$model = ''
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

.vselectHide .vs__selected {
  visibility: hidden;
}
.ivu-alert  {
  width : 100%  !important;
  padding: 8px 16px 8px 16px !important;
}

.select2-container {
  height: 50px !important;
}
.select2-container--default .select2-selection--single{
  height: 50px !important;
  border-color: #dcdee2 !important;
}
.select2-container--default .select2-selection--single .select2-selection__rendered {
  line-height: 50px !important;
}
.select2-container--default .select2-selection--single .select2-selection__arrow {
  height: 50px !important;
  left: 1px !important;
}
.select2-container .select2-selection--single .select2-selection__rendered {
  padding-right: 8px !important;
  padding-left: 20px !important;
}
.vSelectRequired .select2-container--default .select2-selection--single{
  border-color: #ed4014 !important;
}
</style>

