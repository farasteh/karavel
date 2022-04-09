<template>
    <div>
        <div>
            <Checkbox size="large" v-model="single">
                <span class="font-weight-bold" style="font-size: 16px">
                    سوابق تحصیلی ندارم
                </span>
            </Checkbox>
        </div>
        <Form ref="UpdateRecordStudy" :model="UpdateRecordStudy">
            <div class="card box-user-resume mt-2 p-4"  v-if="loading">
                <resumeLoading rtl></resumeLoading>
            </div>
            <draggable v-else tag="transition-group"
                       :componentData="componentData"
                       :list="UpdateRecordStudy.items"
                       class="list-group"
                       :animation="100"
                       @start="dragging = true"
                       @end="dragging = false">
                <div v-for="(item, index) in  $v.UpdateRecordStudy.items.$each.$iter" :key="index">
                    <div class="card box-user-resume mt-2">
                        <div class="row ">
                            <div style="z-index: 99" class="btn-delet-form"
                                 @click="handleRemove( item.id.$model , index)">
                                <Icon type="md-close"/>
                            </div>
                            <FormItem label="مقطع" class="col-lg-3 col-md-6">
                                <span class="required-star">*</span>
                                <v-select

                                    :class="{vSelectRequired  : item.document.$error ,  vselectHide  : showDocument }"
                                    class="vselect-style"
                                    placeholder="انتخاب کنید "
                                    label="title" :options="Documents"
                                    v-model.trim="item.document.$model"
                                    @change="InstituteList(item.document)"
                                    :reduce="d => d.id" taggable></v-select>
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
                                <v-select
                                    :class="{ vselectHide  : showInstitute }"
                                    class="vselect-style"
                                    placeholder="انتخاب کنید "
                                    label="title" :options="Institutes"
                                    v-model.trim="item.institutes.$model"
                                    :reduce="d => d.id" taggable></v-select>
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
                                <v-select
                                    :class="{ vselectHide  : showProvince }"
                                    class="vselect-style"
                                    placeholder="انتخاب کنید "
                                    label="title" :options="Provinces"
                                    v-model.trim="item.province.$model"
                                    @input="item.city.$model = '' "
                                    :reduce="d => d.id" taggable></v-select>
                            </FormItem>

                            <FormItem
                                label="شهر"
                                class="col-lg-3 col-md-6">
                                <v-select
                                    :class="{ vselectHide  : showCity }"
                                    class="vselect-style"
                                    placeholder="انتخاب کنید "
                                    label="title" :options="$store.getters.getCityAll(item.province.$model)"
                                    v-model.trim="item.city.$model"
                                    :reduce="d => d.id" taggable></v-select>
                            </FormItem>
                            <FormItem
                                label="سال ورود"
                                class="col-lg-3 col-md-6">
                                <Input
                                    :class="{ 'ivu-form-item-error animation-error': item.entering_year.$error,'is-valid': !item.entering_year.$invalid }"
                                    type="text" v-model.trim="item.entering_year.$model" placeholder="1398"></Input>
                                <div class="text-sm text-red" v-if="item.entering_year.$error"
                                     style="position:absolute">
                                    <span class="text-danger"
                                          v-if="!item.entering_year.year">  فرمت سال نادرست است   </span>
                                </div>
                            </FormItem>
                            <FormItem
                                label="فراغت از تحصیل"
                                class="col-lg-3 col-md-6col-lg-3 col-md-6">
                                <Input
                                    :class="{ 'ivu-form-item-error animation-error': item.year_departure.$error,'is-valid': !item.year_departure.$invalid }"
                                    size="large" :disabled="item.Studying.$model" type="text"
                                    v-model.trim="item.year_departure.$model" placeholder="1388"></Input>
                                <div class="text-sm text-red" v-if="item.year_departure.$error"
                                     style="position:absolute">
                                    <span class="text-danger"
                                          v-if="!item.year_departure.year">  فرمت سال  نادرست است   </span>
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
                <div type="dashed" class="box-add-item" >
                    <Icon type="md-add btn-icon-add-item" style="cursor: pointer" @click="handleAdd"/>
                    <div style="padding: 18px;"> سابقه تحصیلی دیگری را اضافه کنید</div>
                </div>
            </FormItem>
        </Form>
        <div class="box-btn-resume">
            <button @click="RecordStudy()" class="btn custom-btn btn-15">ذخیره و ادامه</button>
        </div>
        <DialogLoading :show="modal2"></DialogLoading>
    </div>
</template>
<script>
import draggable from "vuedraggable";
import DialogLoading from '../../Loading/DialogLoading.vue'
import {required, helpers} from 'vuelidate/lib/validators';
import {mapGetters} from 'vuex'
import resumeLoading from "../../Loading/resumeLoading";
import vSelect from 'vue-select'
import 'vue-select/dist/vue-select.css';

const decimal = helpers.regex('decimal', /^\d{2}([.,/]\d+)?$/);
const year = helpers.regex('year', /^1[3,4]\d{2}$/)
export default {
    name: "footerslot",
    display: "Footer slot",
    order: 12,
    components: {
        draggable,
        DialogLoading ,
        resumeLoading,
        vSelect
    },
    props: ['Base'],
    data() {
        return {
            showDocument : true ,
            showInstitute : true ,
            showProvince  :true ,
            showCity : true ,
            loading  : false,
            index: 1,
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
        this.$store.dispatch('LoadRecordStudy').then(response => {this.loading = false});
        this.$store.dispatch('LoadDocuments').then(response => {this.showDocument = false});
        this.$store.dispatch('LoadInstitutes').then(response => {this.showInstitute = false});
        this.$store.dispatch('LoadProvinces').then(response => {this.showProvince = false});
        this.$store.dispatch('LoadCityAll').then(response => {this.showCity = false});
    },
    computed: {
        UpdateRecordStudy() {return this.$store.getters.UpdateRecordStudy},
        doneTodosCount() {return this.$store.getters.doneTodosCountTest},
        Documents() {return this.$store.state.Document.Documents;},
        Institutes() {return this.$store.state.Institutes.Institutes;},
        Provinces() {return this.$store.state.Province.provinces;},
        cityIndex() {return this.$store.state.City.cityIndex;},
        getInstitutesDocumentId() {return this.$store.getters.getInstitutesDocumentId(2)},
        ...mapGetters(['doneTodosCountTest'])
    },
    methods: {
        RecordStudy() {
            if (this.single) {
                this.$store.commit('NumberStep', 3);
            } else {
                if (this.$v.$invalid) {
                    this.$v.$touch()
                    this.$notify({
                        group: 'foo',
                        width: '400px',
                        title: 'فرم دارای خطاست',
                        text: 'لطفا قبل از ثبت اطلاعات خطاهای خود را بررسی کنید',
                        duration: 1000,
                        speed: 1000,
                        closeOnClick: true,
                        classes: 'vue-notification success'
                    });
                } else {
                    this.modal2 = true;
                    this.$store.dispatch('CreateUpdateRecordStudy', {UpdateRecordStudy: this.$store.state.RecordStudy.UpdateRecordStudy})
                        .then(success => {
                            this.$store.commit('NumberStep', 3);
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
                            this.modal2 = false;
                        });
                }
            }
        },
        InstituteList(id) {
            this.getInstitutesDocumentId = id;
        },
        CreatRecordStudy(count) {
            if (count == 0) {
                this.handleAdd();
            }
        },
        City(index) {
            let pId = this.UpdateRecordStudy.items[index].province
            this.$store.dispatch('LoadCityIndex', {'id': pId, 'index': index});
            setTimeout(() => {
                this.handleAdd();
                let uu = parseInt(index) + 1;
                this.UpdateRecordStudy.items.splice(uu, 1);
            }, 2000);
        },
        handleAdd() {
            this.index++;
            this.UpdateRecordStudy.items.push({
                base_resume: this.$store.state.BaseRezome.Base.id,
                document: '',
                Field_Study: '',
                orientation: '',
                institutes: '',
                title_institutes: '',
                average: '',
                province: '',
                city: '',
                entering_year: '',
                year_departure: '',
                Studying: false,
                type: 'create',
            });
        },
        handleRemove(id, index) {
            if (this.UpdateRecordStudy.items[index].type && this.UpdateRecordStudy.items[index].type == 'create') {
                if (this.doneTodosCountTest > 1)
                    this.UpdateRecordStudy.items.splice(index, 1);
            } else {
                this.$confirm("آیا اطمینان دارید؟").then(() => {
                    this.$store.dispatch('deleteRecordStudy',
                        {
                            'id': id,
                            'index': index
                        });
                })
                    .then(() => {
                        this.$notify({
                            group: 'success',
                            title: 'success',
                            text: 'این آیتم با موفقیت حذف شد',
                        })
                    }).then(() => {
                    if (this.doneTodosCountTest == 0)
                        this.handleAdd()
                })

            }
        }
    }

}
</script>
<style>
.box-user-resume {
    box-shadow: 0 15px 30px 0 rgba(0, 0, 0, 0.11), 0 5px 15px 0 rgba(0, 0, 0, 0.08);
    border-radius: 0.5rem;
    padding: 10px;
    border: 1px solid #1e88e5 !important;
}

.btn-delet-form {
    position: absolute;
    width: 78px;
    left: 10px;
    color: red;
}
</style>
