<template>
  <div>
    <div>
      <Checkbox size="large" v-model="single">
                <span class="font-weight-bold font-16">
                      پروژه‌ ندارم
                </span>
      </Checkbox>
    </div>
    <span>تحقیقات و مقالات</span>
    <Form ref="UpdateProject" :model="UpdateArticles">
      <div class="card box-user-resume mt-2 p-4"  v-if="effectLoading">
        <lodingResumeLoading rtl></lodingResumeLoading>
      </div>
      <draggable v-else tag="transition-group"
                 :componentData="componentData"
                 :list="UpdateArticles.items"
                 class="list-group"
                 :animation="100"
                 @start="dragging = true"
                 @end="dragging = false"
                 handle=".handle">
        <div v-for="(item, index) in $v.UpdateArticles.items.$each.$iter" :key="index">
          <div class="card box-user-resume mt-2">
            <i class="fas fa-exchange-alt handle font-16 cursor-poiner"></i>
            <div class="row">
              <div style="z-index: 99" class="btn-delet-form" @click="handleRemoveEffect(item.id.$model, index)"><Icon type="md-close" /></div>
              <FormItem
                label="نوع اثر"
                class="col-lg-3 col-md-6">
                <Select2 placeholder="انتخاب کنید" v-model="item.effect.$model"
                         :class="{vSelectRequired  : item.effect.$error }"
                         :options="Effect"  :searchable="false"/>
<!--                <v-select-->
<!--                  :searchable="false"-->
<!--                  :class="{vSelectRequired  :item.effect.$error, vselectHide  : showEffect }"-->
<!--                  class="vselect-style"-->
<!--                  placeholder="انتخاب کنید "-->
<!--                  label="title" :options="Effect"-->
<!--                  v-model.trim="item.effect.$model"-->
<!--                  :reduce="d => d.id" taggable>-->
<!--                  <div slot="no-options">موردی یافت نشد !</div>-->
<!--                </v-select>-->
              </FormItem>
              <FormItem
                label="عنوان"
                class="col-lg-3 col-md-6">
                <Input :class="{ 'ivu-form-item-error animation-error': item.title.$error,'is-valid': !item.title.$invalid }"
                       size="large"  v-model.trim="item.title.$model" placeholder="کتاب دا"></Input>
              </FormItem>
              <FormItem
                label="ناشر"
                class="col-lg-2 col-md-4">
                <Input size="large" v-model.trim="item.publisher.$model"  placeholder="انتشارات نور"></Input>
              </FormItem>
              <FormItem
                label="لینک مرتبط"
                class="col-lg-2 col-md-4">
                <Input style="direction:ltr ; text-align :left;"  size="large" v-model.trim="item.link.$model"  placeholder="http://da.ir"></Input>
              </FormItem>
              <FormItem
                label="تاریخ"
                class="col-lg-2 col-md-4">
                <Input @input="converteffect2English(index)" :class="{ 'ivu-form-item-error animation-error': item.date.$error,'is-valid': !item.date.$invalid }"
                       size="large"  v-model.trim="item.date.$model"  placeholder="1388"></Input>
                <div class="text-sm text-red position-absolute" v-if="item.date.$error">
                  <span class="text-danger" v-if="!item.date.year">  فرمت تاریخ نادرست است </span>
                </div>
              </FormItem>
              <FormItem
                label="توضیحات"
                class="col-12">
                <Input size="large" v-model.trim="item.comment.$model"  placeholder="توضیحات ..."></Input>
              </FormItem>
            </div>
          </div>
        </div>
      </draggable>
      <FormItem class="mt-2">
        <div type="dashed" class="box-add-item" >
          <Icon type="md-add btn-icon-add-item cursor-pointer" @click="handleAddArtiles"  />
          <div style="padding: 18px;"> سابقه تحصیلی دیگری را اضافه کنید</div>
        </div>
      </FormItem>
    </Form>
    <div class="mt-5">
      <span>پروژه‌ها</span>
      <div>
        <Form ref="UpdateLanguge" :model="UpdateProject">
          <div class="card box-user-resume mt-2 p-4"  v-if="projectLoading">
            <lodingResumeLoading rtl></lodingResumeLoading>
          </div>
          <draggable v-else tag="transition-group"
                     :componentData="componentData"
                     :list="UpdateProject.items"
                     class="list-group"
                     :animation="100"
                     @start="dragging = true"
                     @end="dragging = false"
                     handle=".handle"
          >
            <div v-for="(item, index) in $v.UpdateProject.items.$each.$iter" :key="index">
              <div class="card box-user-resume mt-2">
                <i class="fas fa-exchange-alt handle font-16 cursor-poiner"></i>
                <div class="row">
                  <div style="z-index: 99" class="btn-delet-form" @click="handleRemoveProject(item.id.$model , index)"><Icon type="md-close" /></div>
                  <FormItem
                    label="عنوان"
                    class="col-lg-3 col-md-6">
                    <Input  :class="{ 'ivu-form-item-error animation-error': item.title.$error,'is-valid': !item.title.$invalid }"
                            size="large"  v-model.trim="item.title.$model"  placeholder="کاراول "></Input>
                  </FormItem>
                  <FormItem
                    label="کارفرما / درخواست کننده"
                    class="col-lg-3 col-md-6">
                    <Input  :class="{ 'ivu-form-item-error animation-error': item.company.$error,'is-valid': !item.company.$invalid }"
                            size="large"  v-model.trim="item.company.$model"  placeholder="کاراول"></Input>
                  </FormItem>
                  <FormItem
                    label="لینک مرتبط"
                    class="col-lg-3 col-md-6">
                    <Input style="direction:ltr ; text-align :left;" size="large"  v-model.trim="item.link.$model"  placeholder="http://iran-tech.com"></Input>
                  </FormItem>
                  <FormItem
                    label="تاریخ"
                    class="col-lg-3 col-md-6">
                    <Input @input="convertProjectEnglish(index)" :class="{ 'ivu-form-item-error animation-error': item.date.$error,'is-valid': !item.date.$invalid }"
                           size="large"  v-model.trim="item.date.$model"  placeholder="1399"></Input>
                    <div class="text-sm text-red position-absolute" v-if="item.date.$error">
                      <span class="text-danger" v-if="!item.date.year">  فرمت تاریخ نادرست است </span>
                    </div>
                  </FormItem>
                  <FormItem
                    label="توضیحات"
                    class="col-12">
                    <Input size="large"  v-model.trim="item.comment.$model"  placeholder="توضیحات ...."></Input>
                  </FormItem>
                </div>
              </div>
            </div>
          </draggable>
          <FormItem class="mt-2">
            <div type="dashed" class="box-add-item  mobile-save-btn">
              <Icon type="md-add btn-icon-add-item cursor-pointer" @click="handleAdd" />
              <div style="padding: 18px;"> سابقه تحصیلی دیگری را اضافه کنید</div>
            </div>
          </FormItem>
        </Form>
        <div class="box-btn-resume">
          <button @click="RecordProject()" class="btn custom-btn karavel-btn" v-scroll-to="{
                         el: '#takmil',container: '.mobile-breadcrumb',duration: 500,easing: 'linear',offset: -150,
                         force: true ,cancelable: true,x: true,y: false}" >ذخیره و ادامه</button>
        </div>
        <lodingDialogLoading :show="modal2"></lodingDialogLoading>
      </div>
    </div>
  </div>
</template>
<script>


import {helpers, requiredIf} from 'vuelidate/lib/validators';
import vSelect from 'vue-select'
import 'vue-select/dist/vue-select.css';
const year = helpers.regex('year', /^1[3,4]\d{2}$/)

export default {
  components: {
    vSelect
  },
  data () {
    return {
      single : false ,
      showEffect  : false ,
      effectLoading : false ,
      projectLoading : false ,
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
    UpdateArticles : {
      items : {
        $each:  {
          effect : {
            required: requiredIf(function (value) {
              if(value.link || value.date || value.comment || value.publisher || value.title)
                return true
              return  false
            })
          } ,
          title :{
            required: requiredIf(function (value) {
              if(value.link || value.date || value.comment || value.publisher || value.effect)
                return true
              return  false
            })
          },
          link : {} ,
          date :{ year } ,
          comment : {} ,
          id : {} ,
          publisher:{},
        }
      }
    } ,
    UpdateProject : {
      items : {
        $each:  {
          title : {
            required: requiredIf(function (value) {
              if(value.link || value.date || value.comment || value.company )
                return true
              return  false
            })
          } ,
          company :{
            required: requiredIf(function (value) {
              if(value.link || value.date || value.comment || value.title)
                return true
              return  false
            })
          },
          link : {} ,
          date :{ year } ,
          comment : {} ,
          id: {}
        }
      }
    }
  },
  created(){
    this.projectLoading = true
    this.$store.dispatch('Member/Resume/Project/LoadProjectResume').then(res => {this.effectLoading = false});
    this.effectLoading = true
    this.$store.dispatch('Member/Resume/Articles/LoadArticlesResume').then(res => {this.projectLoading = false});
    if( this.Effect.length == 0 ){
      this.showEffect = true
      this.$store.dispatch('Effect/Effect/LoadEffect').then(res => {this.showEffect = false});
    }
  },
  computed:{
    Effect(){return this.$store.state.Effect.Effect.Effect},
    UpdateProject(){return this.$store.getters['Member/Resume/Project/Project']},
    UpdateArticles(){return this.$store.getters['Member/Resume/Articles/Articles']},
    CountProject() {return this.$store.getters['Member/Resume/Project/CountProject']},
    CountEffect() {return this.$store.getters['Member/Resume/Articles/CountArticles']},
  },
  methods: {
    RecordProject(){
      if (this.single) {
        this.$store.commit('Member/Form/StepFrom/NumberStep', 6);
      }
      else  {
        if (this.$v.$invalid) {
          this.$v.$touch()
          this.$store.dispatch('globalFunctions/ErrorNotify')
        } else {
          this.modal2 = true;
          this.$store.dispatch('Member/Resume/Project/ProjectResumeInsert', {
            'Project': this.$store.state.Member.Resume.Project.Project,
            'Articles': this.$store.state.Member.Resume.Articles.Articles,
          })
            .then(success => {
              window.scrollTo(0, 0);
              this.$store.commit('Member/Form/StepFrom/NumberStep', 6)
              this.$store.dispatch('globalFunctions/SuccessNotify' , success.data.data.message)
            })
            .catch(error => {
              this.$store.dispatch('globalFunctions/ErrorNotify')
            })
            .finally(() => this.modal2 = false);
        }
      }

    },
    handleAddArtiles(){
      this.$store.commit('Member/Resume/Articles/ADD_CREATE_EFFECT')
    },
    handleAdd () {
      this.$store.commit('Member/Resume/Project/ADD_CREATE_PROJECT')
    },
    handleRemoveEffect(id , index) {
      if(this.UpdateArticles.items[index].type && this.UpdateArticles.items[index].type == 'create'){
        if(this.CountEffect > 1)
          this.UpdateArticles.items.splice(index, 1);
        else if(this.CountEffect == 1)
        {
          this.UpdateArticles.items[0].effect = ''
          this.UpdateArticles.items[0].title = ''
          this.UpdateArticles.items[0].link = ''
          this.UpdateArticles.items[0].date = ''
          this.UpdateArticles.items[0].comment = ''
          this.UpdateArticles.items[0].publisher = ''
        }
      }
      else  {
        this.$confirm("آیا اطمینان دارید؟").then(() => {
          this.$store.dispatch('Member/Resume/Articles/deleteArticleResume',
            {
              'id': id ,
              'index' : index
            });
        })
          .then(() =>{
            this.$store.dispatch('globalFunctions/SuccessNotify' ,  'این آیتم با موفقیت حذف شد')
          }).then( () => {

          if(this.CountEffect == 0)
            this.handleAddArtiles()
        })

      }
    },
    handleRemoveProject(id , index) {
      if(this.UpdateProject.items[index].type && this.UpdateProject.items[index].type == 'create'){
        if(this.CountProject > 1)
          this.UpdateProject.items.splice(index, 1);
        else if(this.CountProject == 1)
        {
          this.UpdateProject.items[0].title = ''
          this.UpdateProject.items[0].company = ''
          this.UpdateProject.items[0].link = ''
          this.UpdateProject.items[0].date = ''
          this.UpdateProject.items[0].comment = ''
        }
      }
      else  {
        this.$confirm("آیا اطمینان دارید؟").then(() => {
          this.$store.dispatch('Member/Resume/Project/deleteProjectResume',
            {
              'id': id ,
              'index' : index
            });
        })
          .then(() =>{
            this.$store.dispatch('globalFunctions/SuccessNotify' ,  'این آیتم با موفقیت حذف شد')
          }).then( () => {
          if(this.CountProject == 0)
            this.handleAdd()
        })

      }

    } ,
    converteffect2English: function (index) {
      this.$v.UpdateArticles.items.$model[index].date = this.convertNumber2English(this.$v.UpdateArticles.items.$model[index].date)
    },
    convertProjectEnglish: function (index) {
      this.$v.UpdateProject.items.$model[index].date = this.convertNumber2English(this.$v.UpdateProject.items.$model[index].date)
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
