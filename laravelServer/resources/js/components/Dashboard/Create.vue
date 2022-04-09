<template>
    <div>
        <div>
            <div>
                            <div class="row text-">
                <div class="col-lg-10 col-md-12 col-sm-12 m-auto">
                        <div class="text-center">
                            <div style="font-size: 18px;" class="font-size-3xl font-weight-bold color-grey-dark-2 mb-4">ایجاد آگهی استخدام</div>
                        </div>
                        <div class="card box-shadow-lg p-3">
                            <div class="card-body">
                            <div>
                              <Form ref="formValidate">
                                   <div class="row">
                                        <FormItem  class="col-md-12" label="عنوان آگهی">
                                            <span class="required-star">*</span>
                                            <Tooltip trigger="hover" style="top: -122px;" placement="top">
                                               <Input  :class="{ 'ivu-form-item-error animation-error': $v.form.title.$error,'is-valid': !$v.form.title.$invalid }"  v-model.trim="$v.form.title.$model"></Input>
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
                                         <FormItem class="col-md-4" label="دسته‌بندی شغلی">
                                            <span class="required-star">*</span>
                                                <Col span="12" >
                                                    <v-select
                                                        :class="{ vSelectRequired  : $v.form.Job.$error }"
                                                        class="style-chooser"
                                                        placeholder="انتخاب کنید "
                                                        label="title" :options="jobs"
                                                        @input="JobCategoryLists()"
                                                              v-model.trim="$v.form.Job.$model"
                                                              :reduce="d => d.id" taggable></v-select>
                                                    <div class="ivu-form-item-error-tip" v-if="$v.form.Job.$error">فیلد مورد نظر را پرکنید</div>
                                                </Col>
                                        </FormItem>
                                         <FormItem class="col-md-4" label="زیرمجموعه شغلی">
                                            <span class="required-star">*</span>
                                                <Col span="12" >
                                                    <v-select
                                                        :class="{ vSelectRequired  : $v.form.Job1.$error }"
                                                        class="style-chooser"
                                                        placeholder="انتخاب کنید "
                                                        label="title" :options="categories"
                                                        @input="WorkCategoryLists()"
                                                              v-model.trim="$v.form.Job1.$model"
                                                              :reduce="d => d.id" taggable></v-select>
                                                    <div class="ivu-form-item-error-tip" v-if="$v.form.Job1.$error">فیلد مورد نظر را پرکنید</div>
                                                </Col>
                                        </FormItem>
                                        <FormItem class="col-md-4" label="تخصص نهایی">
                                            <span class="required-star">*</span>
                                                <Col span="12" >
                                                    <v-select
                                                        :class="{ vSelectRequired  : $v.form.Job2.$error }"
                                                        class="style-chooser"
                                                        multiple
                                                        placeholder="انتخاب کنید "
                                                        label="title" :options="workCategories"
                                                              v-model.trim="$v.form.Job2.$model"
                                                              :reduce="d => d.id" taggable></v-select>

                                                    <div class="ivu-form-item-error-tip" v-if="$v.form.Job2.$error">فیلد مورد نظر را پرکنید</div>
                                                </Col>
                                        </FormItem>
                                        <FormItem class="col-md-4" label="سابقه کار مرتبط">
                                            <span class="required-star">*</span>
                                                <Col span="12" >
                                                    <v-select
                                                        :class="{ vSelectRequired  : $v.form.HistoryJop.$error }"
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
                                                <Col span="12" >
                                                    <v-select
                                                        :class="{ vSelectRequired  : $v.form.Document.$error }"
                                                        class="style-chooser"
                                                        placeholder="انتخاب کنید "
                                                        label="title" :options="DocumentList"
                                                              v-model.trim="$v.form.Document.$model"
                                                              :reduce="d => d.id" ></v-select>
                                                    <div class="ivu-form-item-error-tip" v-if="$v.form.Document.$error">فیلد مورد نظر را پرکنید</div>
                                                </Col>
                                        </FormItem>
                                        <FormItem class="col-md-4" label="رشته تحصیلی">
                                            <span class="required-star">*</span>
                                                <Col span="12">
                                                    <Input class="major-input"  :class="{ 'ivu-form-item-error animation-error': $v.form.fild_study.$error,'is-valid': !$v.form.fild_study.$invalid }"
                                                            v-model.trim="$v.form.fild_study.$model"></Input>
                                                    <div class="ivu-form-item-error-tip" v-if="$v.form.fild_study.$error">فیلد مورد نظر را پرکنید</div>
                                                </Col>
                                        </FormItem>
                                        <FormItem  class="col-md-4" label="استان">
                                            <span class="required-star">*</span>
                                                <Col span="12" >
                                                    <v-select
                                                        :class="{ vSelectRequired  : $v.form.province.$error}"
                                                        class="style-chooser"
                                                        placeholder="انتخاب کنید "
                                                        label="title" :options="ProvinceList" @input="Citys()"
                                                              v-model.trim="$v.form.province.$model"
                                                              :reduce="d => d.id" taggable></v-select>
                                                    <div class="ivu-form-item-error-tip" v-if="$v.form.province.$error">فیلد مورد نظر را پرکنید</div>
                                                </Col>
                                        </FormItem>
                                        <FormItem  class="col-md-4" label="شهر">
                                            <span class="required-star">*</span>
                                                <Col span="12" >
                                                    <v-select
                                                        :class="{ vSelectRequired  : $v.form.city.$error}"
                                                        class="style-chooser"
                                                        placeholder="انتخاب کنید "
                                                        label="title" :options="cityList"
                                                              v-model.trim="$v.form.city.$model"
                                                              :reduce="d => d.id" taggable></v-select>
                                                    <div class="ivu-form-item-error-tip" v-if="$v.form.city.$error">فیلد مورد نظر را پرکنید</div>
                                                </Col>
                                        </FormItem>
                                        <FormItem class="col-md-4" label="نوع همکاری">
                                            <span class="required-star">*</span>
                                                <Col span="12" >
                                                    <v-select
                                                        :class="{ vSelectRequired  : $v.form.Cooperation_type.$error}"
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
                                                        :class="{ vSelectRequired  : $v.form.money.$error}"
                                                        class="style-chooser"
                                                        placeholder="انتخاب کنید "
                                                        label="title" :options="moneyList"
                                                              v-model.trim="$v.form.money.$model"
                                                              :reduce="d => d.id" taggable></v-select>
                                                    <div class="ivu-form-item-error-tip" v-if="$v.form.money.$error">فیلد مورد نظر را پرکنید</div>
                                                </Col>
                                        </FormItem>
                                        <FormItem  class="col-md-4" label="جنسیت">
                                            <span class="required-star">*</span>
                                                <Col  span="12" >
                                                    <v-select
                                                        :class="{ vSelectRequired  : $v.form.Soldier.$error}"
                                                        class="style-chooser"
                                                        placeholder="انتخاب کنید "
                                                        label="title" :options="GenderList"
                                                              v-model.trim="$v.form.Gender.$model"
                                                              :reduce="d => d.id" taggable></v-select>
                                                    <div class="ivu-form-item-error-tip" v-if="$v.form.Gender.$error">فیلد مورد نظر را پرکنید</div>
                                                </Col>
                                        </FormItem>
                                        <FormItem class="col-md-4" label="وضعیت خدمت سربازی">
                                            <span class="required-star">*</span>
                                                <Col span="12" >
                                                    <v-select
                                                        :class="{ vSelectRequired  : $v.form.Soldier.$error}"
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
                                                <Col span="12" >
                                                    <v-select
                                                        :class="{ vSelectRequired  : $v.form.language.$error}"
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
                                                 <TimePicker format="HH:mm" type="time" placeholder="Select time" v-model.trim="$v.form.TimeUp.$model"></TimePicker>
                                            <div class="ivu-form-item-error-tip" v-if="$v.form.TimeUp.$error">فیلد مورد نظر را پرکنید</div>
                                        </FormItem>
                                        <FormItem style="direction: ltr;"  :class="{ 'ivu-form-item-error': $v.form.TimeDown.$error,'is-valid': !$v.form.TimeDown.$invalid }" class="col-md-4" label="ساعت پایان کار">
                                             <span class="required-star">*</span>
                                             <TimePicker type="time" format="HH:mm" placeholder="Select time" v-model.trim="$v.form.TimeDown.$model"></TimePicker>
                                             <div class="ivu-form-item-error-tip" v-if="$v.form.TimeDown.$error">فیلد مورد نظر را پرکنید</div>
                                        </FormItem>
                                        <FormItem  class="col-md-12" :class="{ 'ivu-form-item-error': $v.form.behavioralSkill.$error,'is-valid': !$v.form.behavioralSkill.$invalid }" label=" مهارت های رفتاری">
                                            <span class="required-star">*</span>
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
                                        <FormItem class="col-12  res-poss" label="مزایای شرکت :">
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
                                            <Button :loading="modal_loading" @click="CreateAdvertising('formValidate')" type="primary">ثبت آگهی جدید</Button>
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

import { required } from 'vuelidate/lib/validators';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
import vSelect from 'vue-select'
import 'vue-select/dist/vue-select.css';

  export default {
    components: {vSelect},
        data () {
            return {
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
                JobList: [],
                DocumentList: [],
                Cooperation_typeList: [],
                moneyList: [],
                FildStudyList: [],
                tag: '',
                tags: [],
                icons:
                [
                    {
                         text: 'done',},
                    {
                        text: 'fingerprint',
                    },
                    {
                        text: 'label',
                    },
                    {
                        text: 'ladfbel',
                    },
                    {
                        text: 'touch_app',
                    },
                    {
                       text: 'group_work',
                    },
                    {
                       text: 'pets',
                    }
                ],
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
                behavioralSkill : {
                    required
                }  ,
                language  : {
                    required
                }
            },
        },
         mounted() {
            this.Authorized();
            this.getJobLost();
            this.HistoryJop();
            this.Document();
            this.CooperationType();
            this.Gender();
            this.Solider();
            this.money();
            this.$store.dispatch('LoadProvinces');
            this.$store.dispatch('LoadJobs');
            this.$store.dispatch('LoadCompanyBehavioralSkills');
            this.$store.dispatch('LoadLanguge');
            this.$store.dispatch('LoadCompanyPosibilities');
        },
        computed: {
            items() {
                return this.icons.filter(i => {
                return i.text.toLowerCase().indexOf(this.tag.toLowerCase()) !== -1;
                });
            },
            cityList() { return this.$store.getters.getCities(this.$v.form.province.$model)} ,
            ProvinceList() {return this.$store.state.Province.provinces;},
            behavioralSkills(){return this.$store.state.CompanyBehavioralSkills.behavioralSkills},
            Langaugs(){return this.$store.state.Languge.Languge},
            Posibilities(){return this.$store.state.CompanyPosibility.posibilities},
            jobs () { return this.$store.state.Job.Jobs },
            categories () { return this.$store.getters.getJobcategory(this.$v.form.Job.$model)},
            workCategories () { return this.$store.getters.workCategories(this.$v.form.Job.$model , this.$v.form.Job1.$model)}
        },
        methods: {
            Citys() {
              this.$v.form.city.$model = ''
            },
            Province(){
                axios.get('api/v1/province')
                .then(response => {
                    this.ProvinceList = response.data.data;
                })
                .catch(error=>console.log(error))
            },
            money(){
                axios.get('api/v1/money')
                .then(response => {
                    this.moneyList = response.data.data;
                })
                .catch(error=>console.log(error))
            },
            Solider(){
                axios.get('api/v1/soldier')
                .then(response => {
                    this.SoliderList = response.data.data;
                })
                .catch(error=>console.log(error))
            },
            Gender(){
                axios.get('api/v1/gender')
                .then(response => {
                    this.GenderList = response.data.data;
                })
                .catch(error=>console.log(error))
            },
            CooperationType(){
                axios.get('api/v1/cooperation_type')
                .then(response => {
                    this.Cooperation_typeList = response.data.data;
                })
                .catch(error=>console.log(error))
            },
            Document(){
                axios.get('api/v1/document')
                .then(response => {
                    this.DocumentList = response.data.data;
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
            HistoryJop(){
                axios.get('api/v1/history_job/')
                .then(response => {
                    this.JobList = response.data.data;
                })
                .catch(error=>console.log(error))
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
            handleCreate1 (val) {
                this.cityList.push({
                    value: val,
                    label: val
                });
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

                    this.$router.push({ name: 'DashboardCompany' }).catch(() => {});

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

    }
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
@media only screen and (max-width: 768px) {
    .res-poss .ivu-form .ivu-form-item-label {
        width: 100% !important;
    }
    .ivu-date-picker{
        display: block !important;
    }
}
</style>

