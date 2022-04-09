<template>
  <div>
    <div>
      <Checkbox size="large" v-model="single">
                <span class="font-weight-bold font-16">
                    سوابق تحصیلی ندارم
                </span>
      </Checkbox>
    </div>
    <Form ref="UpdateRecordStudy" :model="UpdateRecordStudy">
      <div class="card box-user-resume mt-2 p-4"  v-if="loading">
        <lodingResumeLoading rtl></lodingResumeLoading>
      </div>
      <draggable v-else tag="transition-group"
                 :componentData="componentData"
                 :list="UpdateRecordStudy.items"
                 class="list-group"
                 :animation="100"
                 @start="dragging = true"
                 @end="dragging = false"
                 handle=".handle">
        <div v-for="(item, index) in  $v.UpdateRecordStudy.items.$each.$iter" :key="index">
          <div class="card box-user-resume mt-2">
            <i class="fas fa-exchange-alt handle font-16 cursor-poiner" ></i>
            <div class="row ">
              <div style="z-index: 99" class="btn-delet-form"
                   @click="handleRemove( item.id.$model , index)">
                <Icon type="md-close"/>
              </div>
              <FormItem label="مقطع" class="col-lg-3 col-md-6">
                <span class="required-star">*</span>
                <Select2 placeholder="انتخاب کنید" v-model="item.document.$model"
                         :class="{vSelectRequired  : item.document.$error }"
                         :options="Documents"  :searchable="false"/>
<!--                <v-select-->
<!--                  :searchable="false"-->
<!--                  :class="{vSelectRequired  : item.document.$error ,  vselectHide  : showDocument }"-->
<!--                  class="vselect-style"-->
<!--                  placeholder="انتخاب کنید "-->
<!--                  label="title" :options="Documents"-->
<!--                  v-model.trim="item.document.$model"-->
<!--                  :reduce="d => d.id" taggable>-->
<!--                  <div slot="no-options">موردی یافت نشد !</div>-->
<!--                </v-select>-->
              </FormItem>
              <FormItem
                label="رشته تحصیلی"
                class="col-lg-3 col-md-6">
                <Input
                  :class="{ 'ivu-form-item-error animation-error': item.Field_Study.$error,'is-valid': !item.Field_Study.$invalid }"
                  size="large" type="text" v-model.trim="item.Field_Study.$model"
                  placeholder="کامپیوتر"></Input>
              </FormItem>
              <FormItem
                label="گرایش تخصص"
                class="col-lg-3 col-md-6">
                <Input
                  :class="{ 'ivu-form-item-error animation-error': item.orientation.$error,'is-valid': !item.orientation.$invalid }"
                  size="large" type="text" v-model.trim="item.orientation.$model"
                  placeholder="نرم افزار"></Input>
              </FormItem>
              <FormItem label="نوع موسسه" class="col-lg-3 col-md-6">
                <Select2 placeholder="انتخاب کنید" v-model="item.institutes.$model"
                         :options="Institutes"  :searchable="false"/>
<!--                <v-select-->
<!--                  :searchable="false"-->
<!--                  :class="{ vselectHide  : showInstitute }"-->
<!--                  class="vselect-style"-->
<!--                  placeholder="انتخاب کنید "-->
<!--                  label="title" :options="Institutes"-->
<!--                  v-model.trim="item.institutes.$model"-->
<!--                  :reduce="d => d.id" taggable>-->
<!--                  <div slot="no-options">موردی یافت نشد !</div>-->
<!--                </v-select>-->
              </FormItem>
              <FormItem
                label=" موسسه آموزشی"
                class="col-lg-3 col-md-6">
                <Input
                  :class="{ 'ivu-form-item-error animation-error': item.title_institutes.$error,'is-valid': !item.title_institutes.$invalid }"
                  size="large" type="text" v-model.trim="item.title_institutes.$model"
                  placeholder="دانشگاه..."></Input>
              </FormItem>
              <FormItem
                label="معدل"
                class="col-lg-3 col-md-6">
                <Input
                  @input="convertAverage2English(index)"
                  :class="{ 'ivu-form-item-error animation-error': item.average.$error,'is-valid': !item.average.$invalid }"
                  size="large" type="text" v-model.trim="item.average.$model"
                  placeholder="20"></Input>
                <div class="text-sm text-red" v-if="item.average.$error">
                                    <span class="text-danger"
                                          v-if="!item.average.decimal">   فرمت معدل نادرست است  </span>
                </div>
              </FormItem>
              <FormItem
                label="استان"
                class="col-lg-3 col-md-6">
                <Select2 placeholder="انتخاب کنید" v-model="item.province.$model"
                         :options="Provinces"  :searchable="false"  @change="item.city.$model = '' " />
<!--                <v-select-->
<!--                  :class="{ vselectHide  : showProvince }"-->
<!--                  class="vselect-style"-->
<!--                  placeholder="انتخاب کنید "-->
<!--                  label="title" :options="Provinces"-->
<!--                  v-model.trim="item.province.$model"-->
<!--                  @input="item.city.$model = '' "-->
<!--                  :reduce="d => d.id" taggable>-->
<!--                  <div slot="no-options">موردی یافت نشد !</div>-->
<!--                </v-select>-->
              </FormItem>
              <FormItem
                label="شهر"
                class="col-lg-3 col-md-6">
                <Select2 placeholder="انتخاب کنید" v-model="item.city.$model"
                         :options="$store.getters['Map/City/getCityAll'](item.province.$model)" />
<!--                <v-select-->
<!--                  :class="{ vselectHide  : showCity }"-->
<!--                  class="vselect-style"-->
<!--                  placeholder="انتخاب کنید "-->
<!--                  label="title" :options="$store.getters['Map/City/getCityAll'](item.province.$model)"-->
<!--                  v-model.trim="item.city.$model"-->
<!--                  :reduce="d => d.id" taggable>-->
<!--                  <div slot="no-options">موردی یافت نشد !</div>-->
<!--                </v-select>-->
              </FormItem>
              <FormItem
                label="سال ورود"
                class="col-lg-3 col-md-6">
                <Input
                  @input="convertEnter2English(index)"
                  :class="{ 'ivu-form-item-error animation-error': item.entering_year.$error,'is-valid': !item.entering_year.$invalid }"
                  type="text" v-model.trim="item.entering_year.$model" placeholder="1398"></Input>
                <div class="text-sm text-red position-absolute" v-if="item.entering_year.$error">
                  <span class="text-danger" v-if="!item.entering_year.year">  فرمت سال نادرست است   </span>
                </div>
              </FormItem>
              <FormItem
                label="فراغت از تحصیل"
                class="col-lg-3 col-md-6col-lg-3 col-md-6">
                <Input
                  @input="convertEnd2English(index)"
                  :class="{ 'ivu-form-item-error animation-error': item.year_departure.$error,'is-valid': !item.year_departure.$invalid }"
                  size="large" :disabled="item.Studying.$model" type="text"
                  v-model.trim="item.year_departure.$model" placeholder="1388"></Input>
                <div class="text-sm text-red position-absolute" v-if="item.year_departure.$error">
                  <span class="text-danger" v-if="!item.year_departure.year">  فرمت سال  نادرست است   </span>
                </div>
              </FormItem>
              <FormItem class="col-lg-3 col-md-6 d-flex align-items-center justify-content-center">
                <Checkbox v-model.trim="item.Studying.$model">
                  در حال تحصیل
                </Checkbox>
              </FormItem>
            </div>
          </div>
        </div>
      </draggable>
      <FormItem class="mt-2">
        <div type="dashed" class="box-add-item mobile-save-btn" >
          <Icon type="md-add btn-icon-add-item cursor-pointer"  @click="handleAdd"/>
          <div style="padding: 18px;"> سابقه تحصیلی دیگری را اضافه کنید</div>
        </div>
      </FormItem>
    </Form>
    <div class="box-btn-resume">
      <button @click="RecordStudy()" class="btn custom-btn karavel-btn" v-scroll-to="{
                         el: '#shoghl',container: '.mobile-breadcrumb',duration: 500,easing: 'linear',offset: -150,
                         force: true ,cancelable: true,x: true,y: false}">ذخیره و ادامه</button>
    </div>
    <lodingDialogLoading :show="modal2"></lodingDialogLoading>
  </div>
</template>
<script>
import {required, helpers} from 'vuelidate/lib/validators';
import {mapGetters} from 'vuex'

import vSelect from 'vue-select'
import 'vue-select/dist/vue-select.css';

const decimal = helpers.regex('decimal', /^\d{2}([.,/]\d+)?$/);
const year = helpers.regex('year', /^1[3,4]\d{2}$/)
export default {
  name: "RecordStudy",
  order: 12,
  components: {
    vSelect
  },
  data() {
    return {
      showDocument : false ,
      showInstitute : false ,
      showProvince  : false ,
      showCity : false,
      loading  : false,
      dragging: true,
      componentData: {
        props: {
          type: "transition",
          name: "flip-list"
        }
      },
      modal2: false,
      single: false
    }
  },
  validations() {
    return {
      UpdateRecordStudy: {
        items: {
          $each: {
            document: {required},
            Field_Study: {},
            orientation: {},
            institutes: {},
            average: { decimal},
            province: {},
            city: {},
            entering_year: { year},
            year_departure: { year},
            title_institutes: {},
            id: {},
            Studying: {}
          }
        }
      }
    }
  },
  created() {
    this.loading = true
    this.$store.dispatch('Member/Resume/RecordStudy/LoadRecordStudy').then(response => {this.loading = false});
    if( this.Documents.length == 0){
      this.showDocument = true
      this.$store.dispatch('Study/Document/LoadDocuments').then(response => {this.showDocument = false});
    }
    if ( this.Institutes.length == 0 ) {
      this.showInstitute = true
      this.$store.dispatch('Study/Institute/LoadInstitutes').then(response => {this.showInstitute = false});
    }
    if( this.Provinces.length == 0 ) {
      this.showProvince = true
      this.$store.dispatch('Map/Province/LoadProvinces').then(response => {this.showProvince = false});
    }
    if( this.cityIndex.length == 0 ) {
      this.showCity = true
      this.$store.dispatch('Map/City/LoadCityAll').then(response => {this.showCity = false});
    }
  },
  computed: {
    UpdateRecordStudy() {return this.$store.getters['Member/Resume/RecordStudy/UpdateRecordStudy']},
    Documents() {return this.$store.state.Study.Document.Documents},
    Institutes() {return this.$store.state.Study.Institute.Institutes},
    Provinces() {return this.$store.state.Map.Province.provinces},
    cityIndex() {return this.$store.state.Map.City.cityIndex},
    ...mapGetters(['Member/Resume/RecordStudy/doneTodosCountTest'])
  },
  methods: {
    RecordStudy() {
      if (this.single) {
        this.$store.commit('Member/Form/StepFrom/NumberStep', 3);
      } else {
        if (this.$v.$invalid) {
          this.$v.$touch()
          this.$store.dispatch('globalFunctions/ErrorNotify')
        } else {
          this.modal2 = true;
          this.$store.dispatch('Member/Resume/RecordStudy/CreateUpdateRecordStudy',
            {UpdateRecordStudy: this.$store.state.Member.Resume.RecordStudy.UpdateRecordStudy})
            .then(success => {
              window.scrollTo(0, 0);
              this.$store.commit('Member/Form/StepFrom/NumberStep', 3);
              this.$store.dispatch('globalFunctions/SuccessNotify' , success.data.data.message)
            })
            .catch(error => {
              this.$store.dispatch('globalFunctions/ErrorNotify' )
            })
            .finally(() => {this.modal2 = false;});
        }
      }
    },
    City(index) {
      let pId = this.UpdateRecordStudy.items[index].province
      this.$store.dispatch('Map/City/LoadCityIndex', {'id': pId, 'index': index});
      setTimeout(() => {
        this.handleAdd();
        let uu = parseInt(index) + 1;
        this.UpdateRecordStudy.items.splice(uu, 1);
      }, 2000);
    },
    handleAdd() {
      this.$store.commit('Member/Resume/RecordStudy/ADD_CREATE_RECORD_STUDY')
    },
    handleRemove(id, index) {
      if (this.UpdateRecordStudy.items[index].type && this.UpdateRecordStudy.items[index].type == 'create') {
        if (this.doneTodosCountTest > 1)
          this.UpdateRecordStudy.items.splice(index, 1);
      } else {
        this.$confirm("آیا اطمینان دارید؟").then(() => {
          this.$store.dispatch('Member/Resume/RecordStudy/deleteRecordStudy',
            {
              'id': id,
              'index': index
            });
        })
          .then(() => {
            this.$store.dispatch('globalFunctions/SuccessNotify' , 'این آیتم با موفقیت حذف شد')
          }).then(() => {
          if (this.doneTodosCountTest == 0)
            this.handleAdd()
        })

      }
    } ,

    convertAverage2English: function (index){
      this.$v.UpdateRecordStudy.items.$model[index].average = this.convertNumber2English(this.$v.UpdateRecordStudy.items.$model[index].average)
    },
    convertEnter2English: function (index) {
      this.$v.UpdateRecordStudy.items.$model[index].entering_year = this.convertNumber2English(this.$v.UpdateRecordStudy.items.$model[index].entering_year)
    },
    convertEnd2English: function (index) {
      this.$v.UpdateRecordStudy.items.$model[index].year_departure = this.convertNumber2English(this.$v.UpdateRecordStudy.items.$model[index].year_departure)
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
