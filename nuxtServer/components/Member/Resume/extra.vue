<template>
  <div>
    <Form ref="formValidate">
      <div>
        <span class="text-box"> توضیحات تکمیلی </span>
        <div class="card box-user-resume mt-3 p-4"  v-if="loading">
          <lodingResumeLoading rtl></lodingResumeLoading>
        </div>
        <div v-else class="card box-user-resume mt-3">
          <div class="row ">
            <FormItem class="col-md-12" label="درباره من" prop="name">
              <ckeditor  :editor="editor" v-model="Base.comment"  :config="editorConfig"></ckeditor>
            </FormItem>
          </div>
        </div>
      </div>
    </Form>
    <div class="box-btn-resume">
      <button @click="BaseResume()" type="submit" class="btn custom-btn karavel-btn">ذخیره و ادامه</button>
    </div>
    <lodingDialogLoading :show="modal2"></lodingDialogLoading>
  </div>
</template>
<script src="https://cdn.ckeditor.com/ckeditor5/[version.number]/[distribution]/translations/[lang].js"></script>
<script>

import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
export default {
  data() {
    return {
      modal2: false ,
      loading  : false,
      editor: ClassicEditor,
      editorData: '',
      editorConfig: {
        language: 'ar',
        toolbar: [ 'bold', 'italic','undo','redo' ],
      },
    }
  },
  computed: {
    Base() {
      return this.$store.state.Member.Resume.BaseResume.Base
    },
  },
  created() {
    if( this.Base.length == 0 ) {
      this.loading = true
      this.$store.dispatch('Member/Resume/BaseResume/LoadBaseResume').then(res => {this.loading = false});
    }
  },
  methods: {
    BaseResume() {
      this.modal2 = true;
      this.$store.dispatch('Member/Resume/BaseResume/UpdateBase', {'base': this.$store.state.Member.Resume.BaseResume.Base})
        .then(success => {
          window.scrollTo(0, 0);
          this.$store.commit('Member/Form/StepFrom/NumberStep', 7)
          this.$store.dispatch('globalFunctions/SuccessNotify' , success.data.data.message)
        })
        .catch(error => {
          this.$store.dispatch('globalFunctions/ErrorNotify')
        })
        .finally(() => {
          this.modal2 = false
        });
    },
  },

}
</script>
<style>
.ivu-form .ivu-form-item-label {
  color: #949494 !important;
}


.ivu-select-single .ivu-select-selection .ivu-select-placeholder, .ivu-select-single .ivu-select-selection .ivu-select-selected-value {
  padding-right: 0 !important;
}

.ivu-select-input {
  padding: 0 5px 0 8px !important;
}

.vue-image-crop-upload .vicp-wrap .vicp-step2 .vicp-crop .vicp-crop-right {
  float: none !important;
}

.vue-image-crop-upload .vicp-wrap .vicp-step2 .vicp-crop .vicp-crop-right .vicp-preview {
  height: 150px;
  overflow: hidden;
  display: flex !important;
  align-items: center !important;
  justify-content: center;
  flex-wrap: wrap;
}

.vue-image-crop-upload .vicp-wrap .vicp-step2 .vicp-crop .vicp-crop-right .vicp-preview .vicp-preview-item {
  position: relative;
  padding: 5px;
  width: 150px !important;
  height: 150px !important;
}

.vue-image-crop-upload .vicp-wrap .vicp-step2 .vicp-crop .vicp-crop-right .vicp-preview .vicp-preview-item.vicp-preview-item-circle img {
  width: 150px !important;
  height: 150px !important;
}
</style>
