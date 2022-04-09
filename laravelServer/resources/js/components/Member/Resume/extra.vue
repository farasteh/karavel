<template>
    <div>
        <Form ref="formValidate">
            <div>
                <span class="text-box"> توضیحات تکمیلی </span>
                <div class="card box-user-resume mt-3 p-4"  v-if="loading">
                    <resumeLoading rtl></resumeLoading>
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
            <button @click="BaseResume()" type="submit" class="btn custom-btn btn-15 ">ذخیره و ادامه</button>
        </div>
        <DialogLoading :show="modal2"></DialogLoading>
    </div>
</template>
<script src="https://cdn.ckeditor.com/ckeditor5/[version.number]/[distribution]/translations/[lang].js"></script>
<script>
import DialogLoading from '../../Loading/DialogLoading.vue'

import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
import Loading from 'vue-loading-overlay';
// Import stylesheet
import 'vue-loading-overlay/dist/vue-loading.css';
import resumeLoading from "../../Loading/resumeLoading";
export default {
    components: {
        DialogLoading,
        Loading  ,
        resumeLoading
    },
    data() {
        return {
            modal2: false ,
            loading  : false,
            editor: ClassicEditor,
            editorData: '',
            editorConfig: {
                language: 'ar',
                toolbar: [   'bold', 'italic',  'bulletedList','numberedList','undo','redo' ],
            },
        }
    },
    computed: {
        Base() {
            return this.$store.state.BaseRezome.Base
        },
    },
    created() {
        this.loading = true
        this.$store.dispatch('LoadBaseResume')
        .then(res => {
            this.loading = false
        });
    },
    methods: {
        BaseResume() {
                this.modal2 = true;
                this.$store.dispatch('UpdateBase', {'base': this.$store.state.BaseRezome.Base})
                    .then(success => {
                        this.$store.commit('NumberStep', 7)
                        this.$notify({
                            group: 'success',
                            title: 'success',
                            text: success.data.data.message,
                        })
                    })
                    .catch(error => {
                        this.$notify({
                            group: 'foo',
                            title: 'Oops',
                            text: 'فرم شما با خطا مواجه شد لطفا دوباره تلاش کنید',
                        })
                    })
                    .finally(() => {
                        this.modal2 = false
                    });
        },
    },

}
</script>
<style>
.box-user-resume {
    box-shadow: 0 15px 30px 0 rgba(0, 0, 0, 0.11), 0 5px 15px 0 rgba(0, 0, 0, 0.08);
    border-radius: 0.5rem;
    border: 0px;
    padding: 10px;
    border: 1px solid #1e88e5;
}

.ivu-form .ivu-form-item-label {
    color: #949494 !important;
}

.text-box {
    font-size: 16px;
    padding: 16px;
}

.center-form-base {
    display: flex;
    justify-content: center;
    justify-items: baseline;
    align-items: self-end;
    justify-content: center;
    flex-wrap: wrap;
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
