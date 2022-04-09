<template>
  <div>
    <div class="text-center">
      <div style="font-size: 18px;" class="font-size-3xl font-weight-bold color-grey-dark-2 mb-4">ایجاد آگهی استخدام</div>
    </div>
    <div class="card box-shadow-lg p-3">
      <div class="card-body">
        <Form ref="formValidate">
          <div class="row">
            <FormItem  class="col-md-12" label="عنوان آگهی">
              <Tooltip trigger="hover" style="top: -122px;" placement="top">
                <Input  :class="{ 'ivu-form-item-error animation-error': $v.form.title.$error,'is-valid': !$v.form.title.$invalid }"  v-model.trim="$v.form.title.$model"></Input>
                <div style="line-height: 2.25;" slot="content">
                  <p class="font-weight-bold" ><Icon class="lump-icon" type="ios-bulb" />عنوان های شغلی قابل قبول</p>
                  <p><Icon class="tooltip-icon" type="ios-radio-button-on" /><i>شناخته شده و پرتکرار باشد</i></p>
                  <p><Icon class="tooltip-icon" type="ios-radio-button-on" /><i>غیر واقعی و چند منظوره نباشد</i></p>
                  <p><Icon class="tooltip-icon" type="ios-radio-button-on" /><i>تنها مربوط به ادبیات مجموعه شما نباشد</i></p>
                  <p><Icon class="tooltip-icon" type="ios-radio-button-on" /><i>بدون هم پوشانی با صنایع دیگر باشد</i></p>
                </div>
              </Tooltip>
              <div class="ivu-form-item-error-tip" v-if="$v.form.title.$error">فیلد مورد نظر را پرکنید</div>
            </FormItem>
            <FormItem class="col-lg-4 col-md-6" label="دسته‌بندی شغلی">
              <Col span="12" >
                <Select2 placeholder="انتخاب کنید" v-model="$v.form.job.$model"
                         :class="{ vSelectRequired  : $v.form.job.$error }" @change="JobCategoryLists()"
                         :options="jobs"  :searchable="false"/>
<!--                <v-select-->
<!--                  :class="{ vSelectRequired  : $v.form.job.$error }"-->
<!--                  class="style-chooser"-->
<!--                  placeholder="انتخاب کنید "-->
<!--                  label="title" :options="jobs"-->
<!--                  @input="JobCategoryLists()"-->
<!--                  v-model.trim="$v.form.job.$model"-->
<!--                  :reduce="d => d.id" taggable>-->
<!--                  <div slot="no-options">موردی یافت نشد !</div>-->
<!--                </v-select>-->
                <div class="ivu-form-item-error-tip" v-if="$v.form.job.$error">فیلد مورد نظر را پرکنید</div>
              </Col>
            </FormItem>
            <FormItem class="col-lg-4 col-md-6" label="زیرمجموعه شغلی">
              <Col span="12" >
                <Select2 placeholder="انتخاب کنید" v-model="$v.form.category_id.$model"
                         :class="{ vSelectRequired  : $v.form.category_id.$error }" @change="WorkCategoryLists()"
                         :options="categories"  :searchable="false"/>
<!--                <v-select-->
<!--                  :class="{ vSelectRequired  : $v.form.category_id.$error }"-->
<!--                  class="style-chooser"-->
<!--                  placeholder="انتخاب کنید "-->
<!--                  label="title" :options="categories"-->
<!--                  @input="WorkCategoryLists()"-->
<!--                  v-model.trim="$v.form.category_id.$model"-->
<!--                  :reduce="d => d.id" taggable>-->
<!--                  <div slot="no-options">موردی یافت نشد !</div>-->
<!--                </v-select>-->
                <div class="ivu-form-item-error-tip" v-if="$v.form.category_id.$error">فیلد مورد نظر را پرکنید</div>
              </Col>
            </FormItem>
            <FormItem class="col-lg-4 col-md-6" label="تخصص نهایی">
              <Col span="12" >
                <Select
                  class="job-end"
                  :class="{ 'ivu-form-item-error': $v.form.work_category_id.$error,'is-valid': !$v.form.work_category_id.$invalid }"
                  size="large"
                  v-model="$v.form.work_category_id.$model"
                  multiple
                  @on-change="disabledMax()"
                  placeholder="تخصص نهایی">
                  <Option v-for="(skill, index) in workCategories"  :disabled="multiLimit" :value="skill.id" :key="index">{{skill.title}}</Option>
                </Select>
                <div class="ivu-form-item-error-tip" v-if="$v.form.work_category_id.$error">حداکثر 5 تخصص نهایی انتخاب کنید.</div>
              </Col>
            </FormItem>
            <FormItem class="col-lg-4 col-md-6" label="سابقه کار مرتبط">
              <Col span="12" >
                <Select2 placeholder="انتخاب کنید" v-model="$v.form.HistoryJop.$model"
                         :class="{ vSelectRequired  : $v.form.HistoryJop.$error }"
                         :options="JobList"  :searchable="false"/>
<!--                <v-select-->
<!--                  :class="{ vSelectRequired  : $v.form.HistoryJop.$error }"-->
<!--                  :searchable="false"-->
<!--                  class="style-chooser"-->
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
              <Col span="12" >
                <Select2 placeholder="انتخاب کنید" v-model="$v.form.Document.$model"
                         :class="{ vSelectRequired  : $v.form.Document.$error }"
                         :options="DocumentList"  :searchable="false"/>
<!--                <v-select-->
<!--                  :class="{ vSelectRequired  : $v.form.Document.$error }"-->
<!--                  class="style-chooser"-->
<!--                  :searchable="false"-->
<!--                  placeholder="انتخاب کنید "-->
<!--                  label="title" :options="DocumentList"-->
<!--                  v-model.trim="$v.form.Document.$model"-->
<!--                  :reduce="d => d.id" >-->
<!--                  <div slot="no-options">موردی یافت نشد !</div>-->
<!--                </v-select>-->
                <div class="ivu-form-item-error-tip" v-if="$v.form.Document.$error">فیلد مورد نظر را پرکنید</div>
              </Col>
            </FormItem>
            <FormItem class="col-lg-4 col-md-6" label="رشته تحصیلی">
              <Col span="12">
                <Input class="major-input"  :class="{ 'ivu-form-item-error animation-error': $v.form.fild_study.$error,'is-valid': !$v.form.fild_study.$invalid }"
                       v-model.trim="$v.form.fild_study.$model"></Input>
                <div class="ivu-form-item-error-tip" v-if="$v.form.fild_study.$error">فیلد مورد نظر را پرکنید</div>
              </Col>
            </FormItem>
            <FormItem  class="col-lg-4 col-md-6" label="استان">
              <Col span="12" >
                <Select2 placeholder="انتخاب کنید" v-model="$v.form.province.$model"
                         :class="{ vSelectRequired  : $v.form.province.$error}" @change="Citys()"
                         :options="ProvinceList"  :searchable="false"/>
<!--                <v-select-->
<!--                  :class="{ vSelectRequired  : $v.form.province.$error}"-->
<!--                  class="style-chooser"-->
<!--                  placeholder="انتخاب کنید "-->
<!--                  label="title" :options="ProvinceList" @input="Citys()"-->
<!--                  v-model.trim="$v.form.province.$model"-->
<!--                  :reduce="d => d.id" taggable>-->
<!--                  <div slot="no-options">موردی یافت نشد !</div>-->
<!--                </v-select>-->
                <div class="ivu-form-item-error-tip" v-if="$v.form.province.$error">فیلد مورد نظر را پرکنید</div>
              </Col>
            </FormItem>
            <FormItem  class="col-lg-4 col-md-6" label="شهر">
              <Col span="12" >
                <Select2 placeholder="انتخاب کنید" v-model="$v.form.city.$model"
                         :class="{ vSelectRequired  : $v.form.city.$error}"
                         :options="cityList"  :searchable="false"/>
<!--                <v-select-->
<!--                  :class="{ vSelectRequired  : $v.form.city.$error}"-->
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
            <FormItem class="col-lg-4 col-md-6" label="نوع همکاری">
              <Col span="12" >
                <Select2 placeholder="انتخاب کنید" v-model="$v.form.Cooperation_type.$model"
                         :class="{ vSelectRequired  : $v.form.Cooperation_type.$error}"
                         :options="Cooperation_typeList"  :searchable="false"/>
<!--                <v-select-->
<!--                  :class="{ vSelectRequired  : $v.form.Cooperation_type.$error}"-->
<!--                  class="style-chooser"-->
<!--                  :searchable="false"-->
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
                <Select2 placeholder="انتخاب کنید" v-model="$v.form.money.$model"
                         :class="{ vSelectRequired  : $v.form.money.$error}"
                         :options="moneyList"  :searchable="false"/>
<!--                <v-select-->
<!--                  :class="{ vSelectRequired  : $v.form.money.$error}"-->
<!--                  class="style-chooser"-->
<!--                  :searchable="false"-->
<!--                  placeholder="انتخاب کنید "-->
<!--                  label="title" :options="moneyList"-->
<!--                  v-model.trim="$v.form.money.$model"-->
<!--                  :reduce="d => d.id" taggable>-->
<!--                  <div slot="no-options">موردی یافت نشد !</div>-->
<!--                </v-select>-->
                <div class="ivu-form-item-error-tip" v-if="$v.form.money.$error">فیلد مورد نظر را پرکنید</div>
              </Col>
            </FormItem>
            <FormItem  class="col-lg-4 col-md-6" label="جنسیت">
              <Col  span="12" >
                <Select2 placeholder="انتخاب کنید" v-model="$v.form.Gender.$model"
                         :class="{ vSelectRequired  : $v.form.Gender.$error}"
                         :options="GenderList"  :searchable="false"/>
<!--                <v-select-->
<!--                  :class="{ vSelectRequired  : $v.form.Soldier.$error}"-->
<!--                  class="style-chooser"-->
<!--                  :searchable="false"-->
<!--                  placeholder="انتخاب کنید "-->
<!--                  label="title" :options="GenderList"-->
<!--                  v-model.trim="$v.form.Gender.$model"-->
<!--                  :reduce="d => d.id" taggable>-->
<!--                  <div slot="no-options">موردی یافت نشد !</div>-->
<!--                </v-select>-->
                <div class="ivu-form-item-error-tip" v-if="$v.form.Gender.$error">فیلد مورد نظر را پرکنید</div>
              </Col>
            </FormItem>
            <FormItem class="col-lg-4 col-md-6" label="وضعیت خدمت سربازی">
              <Col span="12" >
                <Select2 placeholder="انتخاب کنید" v-model="$v.form.Soldier.$model"
                         :class="{ vSelectRequired  : $v.form.Soldier.$error}"
                         :options="SoliderList"  :searchable="false"/>
<!--                <v-select-->
<!--                  :class="{ vSelectRequired  : $v.form.Soldier.$error}"-->
<!--                  class="style-chooser"-->
<!--                  :searchable="false"-->
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
                :class="{timeerror : $v.form.TimeUp.$error , selectTimePlaceholder : form.TimeUp == ''}"
                v-model="$v.form.TimeUp.$model"
                format="HH:mm"
                value-format="HH:mm"
                :hour-time="24"
                :only-time-picker="true"
              > <template class="text-right" slot="choose-date">انتخاب ساعت شروع </template></date-time-picker>
              <div class="ivu-form-item-error-tip" v-if="$v.form.TimeUp.$error">فیلد مورد نظر را پرکنید</div>
            </FormItem>
            <FormItem style="direction: ltr;font-size: 17px"  class="col-lg-4 col-md-6" label="ساعت پایان کار">
              <date-time-picker
                :class="{timeerror : $v.form.TimeDown.$error , selectTimePlaceholder : form.TimeDown == ''}"
                v-model="$v.form.TimeDown.$model"
                format="HH:mm"
                value-format="HH:mm"
                :hour-time="24"
                :only-time-picker="true"
              ><template class="text-right" slot="choose-date">انتخاب ساعت پایان</template></date-time-picker>
              <div class="ivu-form-item-error-tip" v-if="$v.form.TimeDown.$error">فیلد مورد نظر را پرکنید</div>
            </FormItem>
            <FormItem class="col-lg-4 col-md-6" label= "محدوده سنی">
              <Col span="12" >
                <Select2 placeholder="انتخاب کنید" v-model.trim="$v.form.age.$model"
                         :class="{ vSelectRequired  : $v.form.age.$error}"
                         :options="ageList"  :searchable="false"/>
<!--                <v-select-->
<!--                  :class="{ vSelectRequired  : $v.form.age.$error}"-->
<!--                  class="style-chooser"-->
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
                placeholder="مهارت رفتاری"
              >
                <Option v-for="(skill, index) in behavioralSkills" :value="skill.id" :key="index">{{skill.title}}</Option>
              </Select>
              <div class="ivu-form-item-error-tip" v-if="$v.form.behavioralSkill.$error">فیلد مورد نظر را پرکنید</div>
            </FormItem>
            <FormItem class="col-12  res-poss ress-benefits" label="مزایای شرکت :">
              <CheckboxGroup v-model="$v.form.social.$model">
                <Checkbox v-for="(posibility , index) in Posibilities"
                          :key="index" :label="posibility.id"
                          :value="posibility.id">{{posibility.title}}</Checkbox>
              </CheckboxGroup>
            </FormItem>
            <FormItem  label="شرح شغل / مسئولیت ها"  class="col-12 m-auto">
              <ckeditor  :class="{ 'ivu-form-item-error': $v.form.comment.$error,'is-valid': !$v.form.comment.$invalid }" :editor="editor" v-model.trim="$v.form.comment.$model"  :config="editorConfig"></ckeditor>
              <div class="ivu-form-item-error-tip" v-if="$v.form.comment.$error">فیلد مورد نظر را پرکنید</div>
            </FormItem>
            <FormItem  class="col-md-6 mx-auto mt-5">
              <Button :loading="modal_loading" @click="CreateAdvertising('formValidate')" type="primary" class="karavel-btn">ثبت آگهی جدید</Button>
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

import vSelect from 'vue-select'
import 'vue-select/dist/vue-select.css';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

export default {
  components: { vSelect },
  data () {
    return {
      max : 5 ,
      multiLimit : false ,
      form:{
        title:'',
        social: [],
        job:'',
        category_id:'',
        work_category_id:'',
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
        lang_id : '' ,
        location : '' ,
        age    : ''
      },
      modal_loading:false,
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
      title           :{required},
      job             :{required},
      category_id     :{required},
      work_category_id:{required},
      city            :{required},
      Cooperation_type:{required},
      money           :{required},
      HistoryJop      :{required},
      Document        :{required},
      comment         :{required},
      Gender          :{required},
      Soldier         :{required},
      social          :{},
      fild_study      :{required},
      TimeUp          :{required},
      TimeDown        :{required},
      province        :{required} ,
      behavioralSkill : {required}  ,
      lang_id         : {required} ,
      location        : { required} ,
      age             : {required}
    },
  },
  mounted() {
    //this.Authorized();
    if ( this.moneyList.length == 0)
      this.$store.dispatch('Money/LoadMoneyList');
    if ( this.GenderList.length == 0)
      this.$store.dispatch('Gender/Gender/LoadGender');
    if ( this.SoliderList.length == 0)
      this.$store.dispatch('Soldier/Soldier/LoadSoldier');
    if ( this.Cooperation_typeList.length == 0)
      this.$store.dispatch('CooperationType/LoadCooperationTypeList');
    if ( this.DocumentList.length == 0)
      this.$store.dispatch('Study/Document/LoadDocuments');
    if ( this.JobList.length == 0)
      this.$store.dispatch('HistoryJob/LoadHistoryList');
    if ( this.ProvinceList.length == 0)
      this.$store.dispatch('Map/Province/LoadProvinces');
    if ( this.jobs.length == 0)
      this.$store.dispatch('Jobs/LoadJobs');
    if ( this.behavioralSkills.length == 0)
      this.$store.dispatch('Company/behavioralSkill/LoadCompanyBehavioralSkills');
    if ( this.Langaugs.length == 0)
      this.$store.dispatch('Languge/Languge/LoadLanguge');
    if ( this.Posibilities.length == 0)
      this.$store.dispatch('Company/Posibility/LoadCompanyPosibilities');
    if ( this.ageList.length == 0)
      this.$store.dispatch('age/LoadAgeList');
  },
  computed: {
    JobList() { return this.$store.state.HistoryJob.HistoryList},
    DocumentList()  { return this.$store.state.Study.Document.Documents},
    Cooperation_typeList() { return this.$store.state.CooperationType.CooperationType},
    GenderList() { return this.$store.state.Gender.Gender.Gender},
    SoliderList() { return this.$store.state.Soldier.Soldier.Soldier},
    moneyList() { return this.$store.state.Money.MoneyList},
    cityList() { return this.$store.getters['Map/Province/getCities'](this.$v.form.province.$model)} ,
    ProvinceList() {return this.$store.state.Map.Province.provinces},
    behavioralSkills(){return this.$store.state.Company.behavioralSkill.behavioralSkills},
    Langaugs(){return this.$store.state.Languge.Languge.Languge},
    Posibilities(){return this.$store.state.Company.Posibility.posibilities},
    jobs () {
      var jobs  = this.$store.state.Jobs.Jobs
      let job = jobs.find( x => x.id == 1)
      if(job) {
        let index = jobs.indexOf(job)
        jobs.splice(index  , 1)
      }
      return jobs;
    },
    categories () { return this.$store.getters['Jobs/getJobcategory'](this.$v.form.job.$model)},
    workCategories () { return this.$store.getters['Jobs/workCategories'](this.$v.form.job.$model , this.$v.form.category_id.$model)},
    ageList() { return this.$store.state.age.ageList}
  },
  methods: {
    Citys() {
      this.$v.form.city.$model = ''
    },
    WorkCategoryLists(){
      this.$v.form.work_category_id.$model = ''
    },
    JobCategoryLists(){
      this.$v.form.category_id.$model = ''
      this.$v.form.work_category_id.$model = ''
    },
    CreateAdvertising () {
      this.$v.$touch()
      if (this.$v.$invalid)
      {
        this.$store.dispatch('globalFunctions/ErrorNotify')
      }
      else
      {
        this.modal_loading = true;
        this.$store.dispatch('Company/advertizing/CreateCompanyAdvertising' , { ad : this.form})
          .then(response => {
            this.$store.dispatch('globalFunctions/SuccessNotify' , response.data.data.message)
            this.$router.push({path: '/posts'})
          })
          .catch(error => {
            this.$store.dispatch('globalFunctions/ErrorNotify')
          })
          .finally(() => {this.modal_loading = false;});
      }
    },
    disabledMax() {
      if (this.$v.form.work_category_id.$model.length >= this.max) this.multiLimit=true
      else this.multiLimit=false
    }
  } ,

}
</script>
<style>

.vSelectRequired .vs__dropdown-toggle {
  border-color: red;
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
.vue-tags-input[data-v-61d92e31] {
  max-width: 100%  !important;
}
input[data-v-61d92e31] {
  width: 100%  !important;

}
.ti-input[data-v-61d92e31]{
  width: 100%  !important;

}
.vue-tags-input .ti-tag.custom-class {
  background: transparent;
  border: 1px solid #ebde6e;
  color: #ebde6e;
  margin-right: 4px;
  border-radius: 0px;
  font-size: 13px;
}
/* style the background and the text color of the input ... */
.vue-tags-input {
  background: #324652;
}

.vue-tags-input .ti-new-tag-input {
  background: transparent;
  color: #515a6e;
}

.vue-tags-input .ti-input {
  padding: 4px 10px;
  transition: border-bottom 200ms ease;
}

/* we cange the border color if the user focuses the input */
.vue-tags-input.ti-focus .ti-input {
  border: 1px solid #cacdd1;
}

/* some stylings for the autocomplete layer */
.vue-tags-input .ti-autocomplete {
  background: #fff;
  border: 1px solid #8b9396;
  border-top: none;
  border: 0;
  box-shadow: 2px 2px 1px 0px #ccc;
}

/* the selected item in the autocomplete layer, should be highlighted */
.vue-tags-input .ti-item.ti-selected-item {
  background: #f0faff;
  color: #2d8cf0;
}

/* style the placeholders color across all browser */
.vue-tags-input ::-webkit-input-placeholder {
  color: #a4b1b6;
}

.vue-tags-input ::-moz-placeholder {
  color: #a4b1b6;
}

.vue-tags-input :-ms-input-placeholder {
  color: #a4b1b6;
}

.vue-tags-input :-moz-placeholder {
  color: #a4b1b6;
}

/* default styles for all the tags */
.vue-tags-input .ti-tag {
  position: relative;
  background: #1e88e5;
  color: #fff;
  font-size: 14px;
}

/* we defined a custom css class in the data model, now we are using it to style the tag */
.vue-tags-input .ti-tag.custom-class {
  background: transparent;
  border: 1px solid #ebde6e;
  color: #ebde6e;
  margin-right: 4px;
  border-radius: 0px;
  font-size: 13px;
}

/* the styles if a tag is invalid */
.vue-tags-input .ti-tag.ti-invalid {
  background-color: #e88a74;
}

/* if the user input is invalid, the input color should be red */
.vue-tags-input .ti-new-tag-input.ti-invalid {
  color: #e88a74;
}

/* if a tag or the user input is a duplicate, it should be crossed out */
.vue-tags-input .ti-duplicate span,
.vue-tags-input .ti-new-tag-input.ti-duplicate {
  text-decoration: line-through;
}

/* if the user presses backspace, the complete tag should be crossed out, to mark it for deletion */
.vue-tags-input .ti-tag:after {
  transition: transform .2s;
  position: absolute;
  content: '';
  height: 2px;
  width: 108%;
  left: -4%;
  top: calc(50% - 1px);
  background-color: #000;
  transform: scaleX(0);
}

.vue-tags-input .ti-deletion-mark:after {
  transform: scaleX(1);
}

.ivu-select-multiple .ivu-select-selection {
  padding: 0 4px 0 4px !important;
}
.v-select {
  direction: rtl;
}
#vs1__listbox{
  direction: rtl !important;
  text-align : right !important;
}
.vs__dropdown-toggle{
  height: 50px !important;
}
.vs__dropdown-option--highlight {
  background: #f3f3f3 !important;
  color  :#2d8cf0 !important
}
.style-chooser .vs__search::placeholder,
.style-chooser .vs__dropdown-toggle,
.style-chooser .vs__dropdown-menu {

  direction: rtl !important;
  text-align : right !important;
}
.ivu-checkbox-input {
  position: absolute !important;
}
.vs__clear {
  display: none;
}

.style-chooser .vs__open-indicator  {
  transform: scale(.7) ;
}
.style-chooser.vs--open .vs__open-indicator  {
  transform: rotate(180deg) scale(.7) !important;
}
.style-chooser .vs__actions {
  padding: 4px 7px 0px 7px !important;
}
.v-select.multi-style-chooser .vs__dropdown-toggle {
  min-height: 50px !important;
  background: #fff;
  height: auto !important;
}
.vs--searchable .vs__dropdown-toggle {
  cursor: pointer !important;
}
.ivu-input-group-large .ivu-input, .ivu-input-group-large > .ivu-input-group-append, .ivu-input-group-large > .ivu-input-group-prepend{
  height : 50px !important
}
.ivu-input-with-suffix {
  height : 50px !important
}
.ivu-input-suffix {
  line-height : 40px !important
}
.ivu-checkbox-wrapper.ivu-checkbox-group-item {
  margin: 0 10px !important;
}

.vselect-style ul{
  max-width:100% !important;
}
.major-input .ivu-input {
  height: 50px !important;
}
.search-ads .ivu-input-search  {
  background: var(--var-background-color) !important;
  border-color: var(--var-background-color) !important;
}
.ivu-select-large .ivu-select-item {
  padding: 7px 25px  16px 8px !important;
}
.lump-icon  {
  color: #e3e320;
  font-size: 16px;
  font-weight: bold;
  margin-left: 5px;
}
.tooltip-icon {
  margin-left: 8px;
  font-size: 10px;
  margin-right: 3px;
  color: #eee;
}
.date-picker{-webkit-box-orient:vertical;-ms-flex-direction:column;flex-direction:column}.date-picker,.date-picker__row,.weekday__row{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-direction:normal}.date-picker__row,.weekday__row{-webkit-box-orient:horizontal;-ms-flex-direction:row;flex-direction:row}.weekday__row{margin-bottom:10px}.date-picker__cell,.weekday__cell{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-orient:horizontal;-webkit-box-direction:normal;-ms-flex-direction:row;flex-direction:row;-webkit-box-flex:1;-ms-flex:1;flex:1;-webkit-box-align:center;-ms-flex-align:center;align-items:center;-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center}.date-picker__header{display:-webkit-box;display:-ms-flexbox;display:flex;margin-bottom:10px}.date-picker__month-header,.date-picker__year-header{-webkit-box-flex:1;-ms-flex:1;flex:1}.date-picker__day{cursor:default;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none}.date-picker__day--next,.date-picker__day--previous{opacity:.4}.date-picker__day--disabled{opacity:.1}.date-picker__cell--selected{background:#eee}.date-picker__days,.date-picker__months,.date-picker__years{margin-bottom:10px}.date-picker__month-button,.date-picker__year-button{width:100%;margin-bottom:3px}.text-slider__value{text-align:center}.time-picker{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-orient:horizontal;-webkit-box-direction:normal;-ms-flex-direction:row;flex-direction:row;-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center;-webkit-box-sizing:border-box;box-sizing:border-box}.datetime-picker{position:relative}.datetime-picker-main{position:absolute;z-index:1}.datetime-picker-inline,.datetime-picker-main{width:320px;background:#fff;-webkit-box-sizing:border-box;box-sizing:border-box;padding:10px;border:1px solid grey}.datetime-picker-inline{position:relative}.datetime-picker-inline--disabled{opacity:.7}.datetime-picker-inline--disabled:before{content:"";display:block;position:absolute;top:0;right:0;left:0;bottom:0}.time-picker__button{width:100%}.date-picker__button{width:100%;margin-bottom:10px}.clear__button,.close__button,.today__button{width:100%;margin-top:10px}

.datetime-picker {
  width: 100%;
  display: flex;
  border: 1px solid #ccc;
  height: 50px;
  border-radius: 3px;
  padding: 0 15px;
  font-size: 14px;
}
.timeerror.datetime-picker{
  border: 1px solid #ed4014;
}
.datetime-picker__button {
  width: 100%;
  text-align: left;
  color  :#515a6e
}
.datetime-picker-main {
  width: 150px;
  top: 50px;
  left: 0;
  user-select: none;
  box-shadow: 0 0 0 1px rgba(14,41,57,.12),0 2px 5px rgba(14,41,57,.44),inset 0 -1px 2px rgba(14,41,57,.15);
  background: #fefefe;
  margin: 0 auto;
  border-radius: .1px;
  font-size: 14px;
}
.text-slider {
  width: 45px;
  text-align: center;
}
.text-slider__button-next  , .text-slider__button-previous{
  position: relative;
}
.text-slider__button-previous::before {
  content: "\F124";
  font-family: Ionicons;
  color: #34495e;
  position: absolute;
  font-size: 20px;
  cursor: pointer;
  left: -6px;
  background: #fefefe;
  bottom: -6px;
}
.text-slider__button-next::after{
  content: "\F116";
  font-family: Ionicons;
  color: #34495e;
  position: absolute;
  font-size: 20px;
  cursor: pointer;
  left: -6px;
  background: #fefefe;
  bottom: 10px;
}
.text-slider__value {
  margin: 5px 0;
}
.datetime-picker__button {
  text-align: right;
}
.clear__button::before {
  content: "\F177";
  font-family: Ionicons;
  color: #34495e;
  position: absolute;
  font-size: 20px;
  cursor: pointer;
  background: #fefefe;
  width: 26%;
}
.clear__button {
  margin-top: 0 !important;
}
.vs__search::placeholder {
  color: #c5c8ce;
  opacity: 1;
}
.selectTimePlaceholder .datetime-picker__button{
  color: #c5c8ce;
  opacity: 1;
}
@media only screen and (max-width: 768px) {
  .res-poss .ivu-form .ivu-form-item-label {
    width: 100% !important;
  }
  .ivu-date-picker{
    display: block !important;
  }
}
.date-picker{-webkit-box-orient:vertical;-ms-flex-direction:column;flex-direction:column}.date-picker,.date-picker__row,.weekday__row{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-direction:normal}.date-picker__row,.weekday__row{-webkit-box-orient:horizontal;-ms-flex-direction:row;flex-direction:row}.weekday__row{margin-bottom:10px}.date-picker__cell,.weekday__cell{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-orient:horizontal;-webkit-box-direction:normal;-ms-flex-direction:row;flex-direction:row;-webkit-box-flex:1;-ms-flex:1;flex:1;-webkit-box-align:center;-ms-flex-align:center;align-items:center;-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center}.date-picker__header{display:-webkit-box;display:-ms-flexbox;display:flex;margin-bottom:10px}.date-picker__month-header,.date-picker__year-header{-webkit-box-flex:1;-ms-flex:1;flex:1}.date-picker__day{cursor:default;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none}.date-picker__day--next,.date-picker__day--previous{opacity:.4}.date-picker__day--disabled{opacity:.1}.date-picker__cell--selected{background:#eee}.date-picker__days,.date-picker__months,.date-picker__years{margin-bottom:10px}.date-picker__month-button,.date-picker__year-button{width:100%;margin-bottom:3px}.text-slider__value{text-align:center}.time-picker{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-orient:horizontal;-webkit-box-direction:normal;-ms-flex-direction:row;flex-direction:row;-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center;-webkit-box-sizing:border-box;box-sizing:border-box}.datetime-picker{position:relative}.datetime-picker-main{position:absolute;z-index:1}.datetime-picker-inline,.datetime-picker-main{width:320px;background:#fff;-webkit-box-sizing:border-box;box-sizing:border-box;padding:10px;border:1px solid grey}.datetime-picker-inline{position:relative}.datetime-picker-inline--disabled{opacity:.7}.datetime-picker-inline--disabled:before{content:"";display:block;position:absolute;top:0;right:0;left:0;bottom:0}.time-picker__button{width:100%}.date-picker__button{width:100%;margin-bottom:10px}.clear__button,.close__button,.today__button{width:100%;margin-top:10px}

.datetime-picker {
  width: 100%;
  display: flex;
  border: 1px solid #ccc;
  height: 50px;
  border-radius: 3px;
  padding: 0 15px;
  font-size: 14px;
}
.timeerror.datetime-picker{
  border: 1px solid #ed4014;
}
.datetime-picker__button {
  width: 100%;
  text-align: left;
  color  :#515a6e
}
.datetime-picker-main {
  width: 150px;
  top: 50px;
  left: 0;
  user-select: none;
  box-shadow: 0 0 0 1px rgba(14,41,57,.12),0 2px 5px rgba(14,41,57,.44),inset 0 -1px 2px rgba(14,41,57,.15);
  background: #fefefe;
  margin: 0 auto;
  border-radius: .1px;
  font-size: 14px;
}
.text-slider {
  width: 45px;
  text-align: center;
}
.text-slider__button-next  , .text-slider__button-previous{
  position: relative;
}
.text-slider__button-previous::before {
  content: "\F124";
  font-family: Ionicons;
  color: #34495e;
  position: absolute;
  font-size: 20px;
  cursor: pointer;
  left: -6px;
  background: #fefefe;
  bottom: -6px;
}
.text-slider__button-next::after{
  content: "\F116";
  font-family: Ionicons;
  color: #34495e;
  position: absolute;
  font-size: 20px;
  cursor: pointer;
  left: -6px;
  background: #fefefe;
  bottom: 10px;
}
.text-slider__value {
  margin: 5px 0;
}
.datetime-picker__button {
  text-align: right;
}
.clear__button::before {
  content: "\F177";
  font-family: Ionicons;
  color: #34495e;
  position: absolute;
  font-size: 20px;
  cursor: pointer;
  background: #fefefe;
  width: 26%;
}
.clear__button {
  margin-top: 0 !important;
}
.vs__search::placeholder {
  color: #c5c8ce;
  opacity: 1;
}
.selectTimePlaceholder .datetime-picker__button{
  color: #c5c8ce;
  opacity: 1;
}
@media only screen and (max-width: 768px) {
  .res-poss .ivu-form .ivu-form-item-label {
    width: 100% !important;
  }
  .ivu-date-picker{
    display: block !important;
  }
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

