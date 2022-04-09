<template>
  <div >
    <div>
      <Checkbox size="large" v-model="single">
                <span class="font-weight-bold font-16">
                      مهارت ندارم
                </span>
      </Checkbox>
    </div>
    <span> زبان </span>
    <Form ref="UpdateLanguge" :model="UpdateLanguge" >
      <div class="card box-user-resume mt-2 p-3"  v-if="Langloading">
        <lodingSkillLoading rtl></lodingSkillLoading>
      </div>
      <draggable v-else tag="transition-group"
                 :componentData="componentData"
                 :list="UpdateLanguge.items"
                 class="list-group"
                 :animation="100"
                 @start="dragging = true"
                 @end="dragging = false"
                 handle=".handle">
        <div v-for="(item, index) in $v.UpdateLanguge.items.$each.$iter" :key="index">

          <div class="card box-user-resume mt-2">
            <i class="fas fa-exchange-alt handle font-16 cursor-poiner"></i>
            <div class="row ">
              <div style="z-index: 99" class="btn-delet-form" @click="handleRemoveLang(item.id.$model , index)"><Icon type="md-close" /></div>
              <FormItem
                label="نام زبان"
                class="col-lg-3">
                <Select2 placeholder="انتخاب کنید" v-model="item.lang_id.$model"
                         :class="{vSelectRequired  : item.lang_id.$error }"
                         :options="Langaugs"  :searchable="false"/>
<!--                <v-select-->
<!--                  :searchable="false"-->
<!--                  :class="{vSelectRequired  : item.lang_id.$error ,  vselectHide  : showLang }"-->
<!--                  class="vselect-style"-->
<!--                  placeholder="انتخاب کنید "-->
<!--                  label="title" :options="Langaugs"-->
<!--                  v-model.trim="item.lang_id.$model"-->
<!--                  :reduce="d => d.id" taggable>-->
<!--                  <div slot="no-options">موردی یافت نشد !</div>-->
<!--                </v-select>-->
              </FormItem>
              <FormItem
                label="مهارت خواندن"
                class="col-lg-2 col-md-6">
                <Select2 placeholder="انتخاب کنید" v-model="item.read.$model"
                         :options="Score"  :searchable="false"/>
<!--                <v-select-->
<!--                  :searchable="false"-->
<!--                  class="vselect-style"-->
<!--                  placeholder="انتخاب کنید "-->
<!--                  label="title" :options="Score"-->
<!--                  v-model.trim="item.read.$model"-->
<!--                  :reduce="d => d.id" taggable>-->
<!--                  <div slot="no-options">موردی یافت نشد !</div>-->
<!--                </v-select>-->
              </FormItem>
              <FormItem
                label="مهارت نوشتن"
                class="col-lg-2 col-md-6">
                <Select2 placeholder="انتخاب کنید" v-model="item.write.$model"
                         :options="Score"  :searchable="false"/>
<!--                <v-select-->
<!--                  :searchable="false"-->
<!--                  class="vselect-style"-->
<!--                  placeholder="انتخاب کنید "-->
<!--                  label="title" :options="Score"-->
<!--                  v-model.trim="item.write.$model"-->
<!--                  :reduce="d => d.id" taggable>-->
<!--                  <div slot="no-options">موردی یافت نشد !</div>-->
<!--                </v-select>-->
              </FormItem>
              <FormItem
                label="مهارت شنیداری"
                class="col-lg-2 col-md-6">
                <Select2 placeholder="انتخاب کنید" v-model="item.listen.$model"
                         :options="Score"  :searchable="false"/>
<!--                <v-select-->
<!--                  :searchable="false"-->
<!--                  class="vselect-style"-->
<!--                  placeholder="انتخاب کنید "-->
<!--                  label="title" :options="Score"-->
<!--                  v-model.trim="item.listen.$model"-->
<!--                  :reduce="d => d.id" taggable>-->
<!--                  <div slot="no-options">موردی یافت نشد !</div>-->
<!--                </v-select>-->
              </FormItem>
              <FormItem
                label="مهارت گفتاری"
                class="col-lg-2 col-md-6">
                <Select2 placeholder="انتخاب کنید" v-model="item.say.$model"
                         :options="Score"  :searchable="false"/>
<!--                <v-select-->
<!--                  :searchable="false"-->
<!--                  class="vselect-style"-->
<!--                  placeholder="انتخاب کنید "-->
<!--                  label="title" :options="Score"-->
<!--                  v-model.trim="item.say.$model"-->
<!--                  :reduce="d => d.id" taggable>-->
<!--                  <div slot="no-options">موردی یافت نشد !</div>-->
<!--                </v-select>-->
              </FormItem>
            </div>
          </div>
        </div>
      </draggable>
      <FormItem class="mt-2">
        <div type="dashed" class="box-add-item">
          <Icon type="md-add btn-icon-add-item cursor-pointer" @click="handleAdd"/>
          <div style="padding: 18px;">  زبان خارجی دیگری را اضافه کنید</div>
        </div>
      </FormItem>
    </Form>
    <div class="mt-5">
      <span>مهارت های تجربی</span>
      <div>
        <Form  ref="experimentalCreate" :model="UpdateLoadExperimenta" >
          <div v-if="Experloading" class="row">
            <div class="col-md-6">
              <div class="card box-user-resume mt-2 p-3">
                <lodingResumeLoading rtl></lodingResumeLoading>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card box-user-resume mt-2 p-3">
                <lodingResumeLoading rtl></lodingResumeLoading>
              </div>
            </div>
          </div>
          <draggable v-else tag="transition-group"
                     :componentData="componentData"
                     :list="UpdateLoadExperimenta.items"
                     class=" row"
                     :animation="100"
                     @start="dragging = true"
                     @end="dragging = false"
                     handle=".handle">
            <div v-for="(item, index) in $v.UpdateLoadExperimenta.items.$each.$iter" :key="index" class="col-lg-6">
              <div class="card box-user-resume mt-2 ">
                <i class="fas fa-exchange-alt handle font-16 cursor-poiner"></i>
                <div class="row">
                  <div style="z-index: 99" class="btn-delet-form" @click="handleRemoveExperimental( item.id.$model , index)"><Icon type="md-close" /></div>
                  <FormItem
                    label="نام مهارت"
                    class="col-md-6">
                    <Input :class="{ 'ivu-form-item-error animation-error': item.name.$error,'is-valid': !item.name.$invalid }"
                           type="text" v-model.trim="item.name.$model" placeholder="مثال : برنامه نویسی"></Input>
                  </FormItem>

                  <FormItem
                    label="سطح"
                    class="col-md-6">
                    <Select2 placeholder="انتخاب کنید" v-model="item.level.$model"
                             :options="Score"  :searchable="false"/>
<!--                    <v-select-->
<!--                      :searchable="false"-->
<!--                      class="vselect-style"-->
<!--                      placeholder="انتخاب کنید "-->
<!--                      label="title" :options="Score"-->
<!--                      v-model.trim="item.level.$model"-->
<!--                      :reduce="d => d.id" taggable>-->
<!--                      <div slot="no-options">موردی یافت نشد !</div>-->
<!--                    </v-select>-->
                  </FormItem>
                </div>
              </div>
            </div>
          </draggable>
          <FormItem class="mt-2 ">
            <div type="dashed" class="box-add-item">
              <Icon type="md-add btn-icon-add-item cursor-pointer" @click="experimentalCreateAdd"  />
              <div  style="padding: 18px;">  مهارت تجربی دیگری را اضافه کنید</div>
            </div>
          </FormItem>
        </Form>
      </div>
    </div>
    <div class="mt-5">
      <span>دوره‌ها و گواهینامه‌ها</span>
      <div>

        <Form ref="UpdateLoadCertificates" :model="UpdateLoadCertificates">
          <div v-if="Certloading" class="card box-user-resume mt-2 p-3">
            <lodingSkillLoading rtl></lodingSkillLoading>
          </div>
          <draggable v-else tag="transition-group"
                     :componentData="componentData"
                     :list="UpdateLoadCertificates.items"
                     class="list-group"
                     :animation="100"
                     @start="dragging = true"
                     @end="dragging = false"
                     handle=".handle"
          >
            <div v-for="(item, index) in $v.UpdateLoadCertificates.items.$each.$iter" :key="index" class="">
              <div class="card box-user-resume mt-2 ">
                <i class="fas fa-exchange-alt handle font-18 cursor-poiner"></i>
                <div class="row ">
                  <div style="z-index: 99" class="btn-delet-form" @click="handleRemoveCertificate(item.id.$model , index)"><Icon type="md-close" /></div>
                  <FormItem label="نوع گواهینامه" class="col-lg-3 col-md-6">
                    <Input :class="{ 'ivu-form-item-error animation-error': item.certificate.$error,'is-valid': !item.certificate.$invalid }"
                           v-model="item.certificate.$model " size="large"  placeholder="مثال : زبان "></Input>
                  </FormItem>
                  <FormItem label="عنوان" class="col-lg-3 col-md-6">
                    <Input v-model="item.title.$model " size="large"  placeholder="مثال : IELS "></Input>
                  </FormItem>
                  <FormItem label="موسسه" class="col-lg-3 col-md-6">
                    <Input v-model="item.Institute.$model " size="large"  placeholder="مثال : موسسه آفاق"></Input>
                  </FormItem>
                  <FormItem label="تاریخ" class="col-lg-3 col-md-6">
                    <Input  @input="convertCer2English(index)" :class="{ 'ivu-form-item-error animation-error': item.date.$error,'is-valid': !item.date.$invalid }"
                            v-model="item.date.$model" size="large"  placeholder="مثال : 1325"></Input>
                    <div class="text-sm text-red position-absolute" v-if="item.date.$error" >
                      <span class="text-danger" v-if="!item.date.year">  فرمت تاریخ نادرست است </span>
                    </div>
                  </FormItem>
                </div>
              </div>
            </div>
          </draggable>
          <FormItem class="mt-2 ">
            <div type="dashed" class="box-add-item">
              <Icon type="md-add btn-icon-add-item cursor-pointer" @click="CertificatesCreateAdd"  />
              <div style="padding: 18px;">  دوره و گواهینامه دیگری را اضافه کنید</div>
            </div>
          </FormItem>
        </Form>
      </div>
    </div>
    <div class="mt-5">
      <span>افتخارات</span>
      <div>

        <Form ref="experimentalCreate" :model="UpdateLoadHonors" >
          <div v-if="Honorloading" class="row">
            <div class="col-md-6">
              <div class="card box-user-resume mt-2 p-3">
                <lodingResumeLoading rtl></lodingResumeLoading>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card box-user-resume mt-2 p-3">
                <lodingResumeLoading rtl></lodingResumeLoading>
              </div>
            </div>
          </div>
          <draggable v-else tag="transition-group"
                     :componentData="componentData"
                     :list="UpdateLoadHonors.items"
                     class="row"
                     :animation="100"
                     @start="dragging = true"
                     @end="dragging = false"
                     handle=".handle"
          >
            <div v-for="(item, index) in $v.UpdateLoadHonors.items.$each.$iter" :key="index" class="col-lg-6">
              <div class="card box-user-resume mt-2 ">
                <i class="fas fa-exchange-alt handle font-18 cursor-poiner"></i>
                <div class="row ">
                  <div style="z-index: 99" class="btn-delet-form" @click="handleRemove(item.id.$model  , index)"><Icon type="md-close" /></div>
                  <FormItem label="عنوان" class="col-md-6">
                    <Input :class="{ 'ivu-form-item-error animation-error': item.title.$error,'is-valid': !item.title.$invalid }"
                           size="large" v-model="item.title.$model"  placeholder="مثال : چاپ مقاله"></Input>
                  </FormItem>
                  <FormItem label="تاریخ" class="col-md-6">
                    <Input @input="convertHonor2English(index)" :class="{ 'ivu-form-item-error animation-error': item.date.$error,'is-valid': !item.date.$invalid }"
                           size="large"  v-model="item.date.$model"  placeholder="مثال: 1378"></Input>
                    <div class="text-sm text-red position-absolute" v-if="item.date.$error">
                      <span class="text-danger" v-if="!item.date.year">  فرمت تاریخ نادرست است </span>
                    </div>
                  </FormItem>

                </div>
              </div>
            </div>
          </draggable>
          <FormItem class="mt-2 ">
            <div type="dashed" class="box-add-item  mobile-save-btn">
              <Icon type="md-add btn-icon-add-item cursor-pointer" @click="HonorsCreateAdd" />
              <div style="padding: 18px;">  افتخار دیگری را اضافه کنید</div>
            </div>
          </FormItem>
        </Form>
        <div class="box-btn-resume">
          <button @click="RecordSkill()" class="btn custom-btn karavel-btn" v-scroll-to="{
                         el: '#project',container: '.mobile-breadcrumb',duration: 500,easing: 'linear',offset: -150,
                         force: true ,cancelable: true,x: true,y: false}">ذخیره و ادامه</button>
        </div>
        <lodingDialogLoading :show="modal2"></lodingDialogLoading>
      </div>
    </div>
  </div>
</template>
<script>


import { requiredIf, helpers} from 'vuelidate/lib/validators';


import vSelect from 'vue-select'
import 'vue-select/dist/vue-select.css';

const year = helpers.regex('year', /^1[3,4]\d{2}$/)

export default {
  components: {
    vSelect ,
  },
  data () {
    return {
      single: false,
      showLang  : false ,
      showCertificate  : false ,
      Langloading : false ,
      Experloading : false ,
      Certloading  :false,
      Honorloading : false,
      Score:[
        {
          text: '★☆☆☆☆',
          id: 1,
        },
        {
          text: '★★☆☆☆',
          id: 2,
        },
        {
          text: '★★★☆☆',
          id: 3,
        },
        {
          text: '★★★★☆',
          id: 4,
        },
        {
          text: '★★★★★',
          id: 5,
        },
      ],
      dragging: true,
      componentData: {
        props: {
          type: "transition",
          name: "flip-list"
        }
      },
      modal2:false
    }
  },

  validations: {
    UpdateLanguge : {
      items : {
        $each:  {
          lang_id : {
            required: requiredIf(function (value) {
              if(value.read || value.listen || value.say || value.write)
                return true
              return  false
            })
          } ,
          read :{},
          write : {} ,
          listen :{ } ,
          say : {} ,
          id : {}
        }
      }
    } ,
    UpdateLoadExperimenta : {
      items : {
        $each:  {
          name : {
            required: requiredIf(function (value) {
              if(value.level)
                return true
              return  false
            })
          } ,
          level :{},
          id :{}
        }
      }
    } ,
    UpdateLoadCertificates : {
      items : {
        $each:  {
          certificate : {
            required: requiredIf(function (value) {
              if(value.title || value.Institute || value.date)
                return true
              return  false
            })
          } ,
          title: {} ,
          Institute : {} ,
          date : {year} ,
          id :{ }
        }
      }

    } ,
    UpdateLoadHonors : {
      items : {
        $each:  {
          title : {
            required: requiredIf(function (value) {
              if(value.date)
                return true
              return  false
            })
          } ,
          date : {year} ,
          id :{ }
        }
      }

    } ,
  },
  created(){
    this.Langloading = true
    this.$store.dispatch('Member/Resume/Langauge/LoadLangageRsume').then(res =>{this.Langloading = false})

    this.Certloading = true
    this.$store.dispatch('Member/Resume/CertificatesResume/LoadCertificatesResume').then(res =>{this.Certloading = false})

    this.Honorloading = true
    this.$store.dispatch('Member/Resume/Honors/LoadHonorsResume').then(res =>{this.Honorloading = false})

    this.Experloading = true
    this.$store.dispatch('Member/Resume/Experimental/LoadExperimenta').then(res =>{this.Experloading = false})

    if( this.Langaugs.length == 0){
      this.showLang = true
      this.$store.dispatch('Languge/Languge/LoadLanguge').then(res =>{this.showLang = false})
    }

  },
  computed:{
    UpdateLoadExperimenta(){return this.$store.getters['Member/Resume/Experimental/UpdateExperimental']},
    UpdateLoadCertificates(){return this.$store.getters['Member/Resume/CertificatesResume/UpdateCertificatesResume']},
    UpdateLoadHonors(){return this.$store.getters['Member/Resume/Honors/HonorsResume']},
    UpdateLanguge(){return this.$store.getters['Member/Resume/Langauge/UpdateLanguge']},
    Langaugs(){return this.$store.state.Languge.Languge.Languge},
    CountRecordLanguge () {return this.$store.getters['Member/Resume/Langauge/CountRecordLanguge']},
    CountCertificates () {return this.$store.getters['Member/Resume/CertificatesResume/CountCertificates']},
    countHonorResume() {return this.$store.getters['Member/Resume/Honors/CountHonors']},
    CountExperimental(){return this.$store.getters['Member/Resume/Experimental/CountExperimental']}

  },
  methods: {
    RecordSkill(){
      if (this.single) {
        this.$store.commit('Member/Form/StepFrom/NumberStep', 5);
      }
      else  {
        if (this.$v.$invalid) {
          this.$v.$touch()
          this.$store.dispatch('globalFunctions/ErrorNotify')
        } else {
          this.modal2 = true;
          this.$store.dispatch('Member/Resume/Experimental/SkillInsert', {
            'UpdateLanguge': this.$store.state.Member.Resume.Langauge.UpdateLanguge,
            'UpdateLoadExperimenta': this.$store.state.Member.Resume.Experimental.UpdateLoadExperimenta,
            'CertificatesResume': this.$store.state.Member.Resume.CertificatesResume.UpdateCertificatesResume,
            'HonorsResume': this.$store.state.Member.Resume.Honors.HonorsResume
          })
            .then(success => {
              window.scrollTo(0, 0);
              this.$store.commit('Member/Form/StepFrom/NumberStep', 5);
              this.$store.dispatch('globalFunctions/SuccessNotify' , success.data.data.message)
            })
            .catch(error => {
              this.$store.dispatch('globalFunctions/ErrorNotify' )
            })
            .finally(() => {
              this.modal2 = false;
            });
        }
      }


    },
    HonorsCreateAdd(){
      this.$store.commit('Member/Resume/Honors/ADD_CREATE_HONOR')
    },
    handleAdd () {
      this.$store.commit('Member/Resume/Langauge/ADD_CREATE_LANGUAGE')
    },
    CertificatesCreateAdd(){
      this.$store.commit('Member/Resume/CertificatesResume/ADD_CREATE_CERTIFICATE_RESUME')
    },
    experimentalCreateAdd(){
      this.$store.commit('Member/Resume/Experimental/ADD_CREATE_EXPERIMENTAL')
    },
    handleRemove (id , index) {
      if(this.UpdateLoadHonors.items[index].type && this.UpdateLoadHonors.items[index].type == 'create'){
        if(this.countHonorResume > 1)
          this.UpdateLoadHonors.items.splice(index, 1);
        else if(this.countHonorResume == 1)  {
          this.UpdateLoadHonors.items[0].title = ''
          this.UpdateLoadHonors.items[0].date = ''
        }
      }
      else  {
        this.$confirm("آیا اطمینان دارید؟").then(() => {
          this.$store.dispatch('Member/Resume/Honors/deleteHonorResume',
            {
              'id': id ,
              'index' : index
            });
        })
          .then(() =>{
            this.$store.dispatch('globalFunctions/SuccessNotify' , 'این آیتم با موفقیت حذف شد')
          }).then( () => {
          if(this.countHonorResume == 0)
            this.HonorsCreateAdd()
        })

      }
    },
    handleRemoveExperimental ( id , index) {
      if(this.UpdateLoadExperimenta.items[index].type && this.UpdateLoadExperimenta.items[index].type == 'create'){
        if(this.CountExperimental > 1)
          this.UpdateLoadExperimenta.items.splice(index, 1);
        else if(this.CountExperimental == 1)  {
          this.UpdateLoadExperimenta.items[0].name = ''
          this.UpdateLoadExperimenta.items[0].level = ''
        }
      }
      else  {
        this.$confirm("آیا اطمینان دارید؟").then(() => {
          this.$store.dispatch('Member/Resume/Experimental/deleteExperimental',
            {
              'id': id ,
              'index' : index
            });
        })
          .then(() =>{
            this.$store.dispatch('globalFunctions/SuccessNotify' ,'این آیتم با موفقیت حذف شد' )
          }).then( () => {
          if(this.CountExperimental == 0)
            this.experimentalCreateAdd()
        })
      }


    } ,
    handleRemoveLang( id , index) {
      if(this.UpdateLanguge.items[index].type && this.UpdateLanguge.items[index].type == 'create'){
        if(this.CountRecordLanguge > 1)
          this.UpdateLanguge.items.splice(index, 1);
        else if(this.CountRecordLanguge == 1)  {
          this.UpdateLanguge.items[0].lang_id = ''
          this.UpdateLanguge.items[0].read = ''
          this.UpdateLanguge.items[0].write = ''
          this.UpdateLanguge.items[0].listen = ''
          this.UpdateLanguge.items[0].say = ''
        }
      }
      else  {
        this.$confirm("آیا اطمینان دارید؟").then(() => {
          this.$store.dispatch('Member/Resume/Langauge/deleteLanguage',
            {
              'id': id ,
              'index' : index
            });
        })
          .then(() =>{
            this.$store.dispatch('globalFunctions/SuccessNotify' ,'این آیتم با موفقیت حذف شد' )
          }).then( () => {
          if(this.CountRecordLanguge == 0)
            this.handleAdd()
        })

      }
    } ,
    handleRemoveCertificate ( id , index) {

      if(this.UpdateLoadCertificates.items[index].type && this.UpdateLoadCertificates.items[index].type == 'create'){
        if(this.CountCertificates > 1)
          this.UpdateLoadCertificates.items.splice(index, 1);
        else if(this.CountCertificates == 1)  {
          this.UpdateLoadCertificates.items[0].certificate = ''
          this.UpdateLoadCertificates.items[0].title = ''
          this.UpdateLoadCertificates.items[0].Institute = ''
          this.UpdateLoadCertificates.items[0].date = ''
        }
      }
      else  {
        this.$confirm("آیا اطمینان دارید؟").then(() => {
          this.$store.dispatch('Member/Resume/CertificatesResume/deleteCertificateResume',
            {
              'id': id ,
              'index' : index
            });
        })
          .then(() =>{
            this.$store.dispatch('globalFunctions/SuccessNotify' ,'این آیتم با موفقیت حذف شد' )
          }).then( () => {
          if(this.CountCertificates == 0)
            this.CertificatesCreateAdd()
        })

      }
    } ,

    convertCer2English: function (index) {
      this.$v.UpdateLoadCertificates.items.$model[index].date = this.convertNumber2English(this.$v.UpdateLoadCertificates.items.$model[index].date)
    },
    convertHonor2English: function (index) {
      this.$v.UpdateLoadHonors.items.$model[index].date = this.convertNumber2English(this.$v.UpdateLoadHonors.items.$model[index].date)
    },
    convertNumber2English( num ) {
      return   num.replace(/[\u0660-\u0669]/g, function (c) {
        return c.charCodeAt(0) - 0x0660;
      }).replace(/[\u06f0-\u06f9]/g, function (c) {
        return c.charCodeAt(0) - 0x06f0;
      });
    },

  }

}
</script>
<style>
</style>
