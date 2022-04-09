<template>
    <div>
        <div>
            <Checkbox size="large"  v-model="single">
                <span class="font-weight-bold" style="font-size: 16px">
                    سوابق شغلی ندارم
                </span>
            </Checkbox>
        </div>
        <Form ref="UpdateRecordJob" :model="UpdateRecordJob"  style="position: relative">
            <div class="card box-user-resume mt-2 p-4"  v-if="loading">
                <resumeLoading rtl></resumeLoading>
            </div>
            <draggable v-else tag="transition-group"
                       :componentData="componentData"
                       :list="UpdateRecordJob.items"
                       class="list-group"
                       :animation="100"
                       @start="dragging = true"
                       @end="dragging = false"
            >
                <div v-for="(item, index) in  $v.UpdateRecordJob.items.$each.$iter" :key="index">
                <div class="card box-user-resume mt-2">
                    <div class="row">
                        <div style="z-index: 99" class="btn-delet-form" @click="handleRemove(item.id.$model , index)"><Icon type="md-close" /></div>
                        <FormItem label="سِمت شغلی مربوطه" size="large" class="col-lg-3 col-md-6">
                            <span class="required-star">*</span>
                            <Input  :class="{ 'ivu-form-item-error animation-error': item.job_side.$error,'is-valid': !item.job_side.$invalid }"
                                    size="large" type="text" v-model.trim="item.job_side.$model" placeholder="شغل"></Input>
                        </FormItem>
                        <FormItem  label="دسته بندی شغلی" class="col-lg-3 col-md-6">
                            <span class="required-star">*</span>
                            <v-select
                                :class="{vSelectRequired  : item.job.$error , vselectHide  : showJob }"
                                class="vselect-style"
                                placeholder="انتخاب کنید "
                                label="title" :options="Jobs"
                                v-model.trim="item.job.$model"
                                :reduce="d => d.id" taggable></v-select>
                        </FormItem>
                        <FormItem   label="مرکز اشتغال"  class="col-lg-3 col-md-6">
                            <v-select
                                :class="{ vselectHide  : showCenterJob }"
                                class="vselect-style"
                                placeholder="انتخاب کنید "
                                label="title" :options="CenterJobs"
                                v-model.trim="item.center_job.$model"
                                :reduce="d => d.id" taggable></v-select>
                        </FormItem>
                        <FormItem label="عنوان مرکز" class="col-lg-3 col-md-6">
                            <span class="required-star">*</span>
                            <Input :class="{ 'ivu-form-item-error ': item.title_center_job.$error,'is-valid': !item.title_center_job.$invalid }"
                                size="large" type="text" v-model.trim="item.title_center_job.$model" placeholder="نام مرکز"></Input>

                        </FormItem>
                        <FormItem label="نحوه همکاری" class="col-lg-3 col-md-6">
                            <span class="required-star">*</span>
                            <v-select
                                :class="{vSelectRequired  :  item.cooperation_type.$error, vselectHide  : showCooperationType }"
                                class="vselect-style"
                                placeholder="انتخاب کنید "
                                label="title" :options="CooperationType"
                                v-model.trim="item.cooperation_type.$model"
                                :reduce="d => d.id" taggable></v-select>

                        </FormItem>
                        <FormItem label="سطح ارشدیت" class="col-lg-3 col-md-6">
                            <span class="required-star">*</span>
                            <v-select
                                :class="{vSelectRequired  :  item.group_levels.$error , vselectHide  : showGroup }"
                                class="vselect-style"
                                placeholder="انتخاب کنید "
                                label="title" :options="GroupLevels"
                                v-model.trim="item.group_levels.$model"
                                :reduce="d => d.id" taggable></v-select>

                        </FormItem>
                        <FormItem label="استان" class="col-lg-3 col-md-6">
                            <v-select
                                :class="{ vselectHide  : showProvinces }"
                                class="vselect-style"
                                placeholder="انتخاب کنید "
                                label="title" :options="Provinces"
                                v-model.trim="item.province.$model"
                                @input="item.city.$model = '' "
                                :reduce="d => d.id" taggable></v-select>
                        </FormItem>
                        <FormItem label="شهر" class="col-lg-3 col-md-6">
                            <v-select
                                :class="{ vselectHide  : showCity}"
                                class="vselect-style"
                                placeholder="انتخاب کنید "
                                label="title" :options="$store.getters.getCityAll(item.province.$model)"
                                v-model.trim="item.city.$model"
                                :reduce="d => d.id" taggable></v-select>
                        </FormItem>
                        <FormItem label="شروع" class="col-lg-3 col-md-6">
                            <Input  :class="{ 'ivu-form-item-error animation-error': item.start.$error,'is-valid': !item.start.$invalid }"
                                    ize="large" type="text" v-model.trim="item.start.$model" placeholder="1378"></Input>
                            <div class="text-sm text-red" v-if="item.start.$error" style="position:absolute">
                                <span class="text-danger" v-if="!item.start.year">    فرمت سال شروع نادرست است </span>
                            </div>
                        </FormItem>
                        <FormItem  label="اتمام" class="col-lg-3 col-md-6">
                            <Input  :class="{ 'ivu-form-item-error animation-error': item.end.$error,'is-valid': !item.end.$invalid }"
                                   :disabled="item.working.$model" size="large" type="text" v-model.trim="item.end.$model" placeholder="1388"></Input>
                            <div class="text-sm text-red" v-if="item.end.$error" style="position:absolute">
                                <span class="text-danger" v-if="!item.end.year">    فرمت سال پایان نادرست است </span>
                            </div>
                        </FormItem>
                        <FormItem class="col-lg-3 col-md-6 d-flex align-items-center justify-content-center" style="top: 23px;">
                             <Checkbox v-model.trim="item.working.$model">
                                مشغول فعالیت در این مجموعه هستم
                            </Checkbox>
                        </FormItem>
                        <FormItem class="col-lg-3 col-md-6 d-flex align-items-center justify-content-center" style="top: 23px;">
                            <Checkbox v-model.trim="item.satisfying.$model">
                                از این مرکز رضایت نامه شغلی دارم
                            </Checkbox>
                        </FormItem>
                        <FormItem label="وظایف / دستاوردها" class="col-12">
                            <Input size="large" type="text" v-model.trim="item.comment.$model" placeholder="وظایف یا دستاورد های خود را وارد کنید"></Input>
                        </FormItem>
                    </div>
                </div>
            </div>
            </draggable>
            <FormItem class="mt-2">
                <div type="dashed" class="box-add-item" >
                    <Icon type="md-add btn-icon-add-item" style="cursor: pointer" @click="handleAdd" />
                    <div style="padding: 18px;"> سابقه شغلی دیگری را اضافه کنید</div>
                </div>
            </FormItem>
        </Form>
            <div class="box-btn-resume">
                <button @click="RecordJobs()" class="btn custom-btn btn-15" >ذخیره و ادامه</button>
            </div>
        <DialogLoading :show="modal2"></DialogLoading>
    </div>
</template>
<script>
import draggable from "vuedraggable";
import DialogLoading from '../../Loading/DialogLoading.vue'
import Loading from 'vue-loading-overlay';
// Import stylesheet
import 'vue-loading-overlay/dist/vue-loading.css';
import { required, helpers } from 'vuelidate/lib/validators';
import resumeLoading from "../../Loading/resumeLoading";
import vSelect from 'vue-select'
import 'vue-select/dist/vue-select.css';

const year = helpers.regex('year', /^1[3,4]\d{2}$/)

export default {
    name: "footerslot",
    display: "Footer slot",
    order: 12,
    components: {
        draggable,
        DialogLoading ,
        Loading ,
        resumeLoading ,
        vSelect
    },
    data() {
        return {
            showJob :  true  ,
            showCenterJob :  true  ,
            showCooperationType :  true  ,
            showGroup :  true  ,
            showProvinces :  true  ,
            showCity :  true  ,
            loading  : false ,
            modal2:false,
            dragging: true,
            componentData: {
                props: {
                    type: "transition",
                    name: "flip-list"
                },
            },
            single: false
        };
    },
    validations :{
        UpdateRecordJob : {
            items : {
                $each : {
                    job_side:  {required},
                    job: {required},
                    center_job: {},
                    title_center_job: {required},
                    cooperation_type: {required},
                    group_levels: {required},
                    province: {},
                    city: {},
                    start: {year},
                    end: {year},
                    working : {},
                    comment : {} ,
                    id : {},
                    satisfying : {}
                }
            }
        }

    },
    created(){
        this.loading = true
        this.$store.dispatch('LoadRecordJob').then(res => {this.loading = false});
        this.$store.dispatch('LoadCooperationTypeList').then(res => {this.showCooperationType = false});
        this.$store.dispatch('LoadGroupLevels').then(res => {this.showGroup = false});
        this.$store.dispatch('LoadProvinces').then(res => {this.showProvinces = false});

        this.$store.dispatch('LoadJobs').then(res => {this.showJob = false});
        this.$store.dispatch('LoadCenterJobs').then(res => {this.showCenterJob = false});
        this.$store.dispatch('LoadCityAll').then(res => {this.showCity = false});
    },
    computed:{
        Jobs(){return this.$store.state.Job.Jobs;},
        CountRecordJobs () {return this.$store.getters.CountRecordJobs},
        CenterJobs(){return this.$store.state.CenterJob.CenterJobs;},
        CooperationType(){return this.$store.state.CooperationType.CooperationType;},
        GroupLevels(){return this.$store.state.GroupLevels.group;},
        Provinces(){ return this.$store.state.Province.provinces;},
        UpdateRecordJob(){return this.$store.getters.UpdateRecordJob},
        cityIndex(){return this.$store.state.City.cityIndex;},
    },
    methods:{
        City(index){
             let pId = this.UpdateRecordJob.items[index].province
             this.$store.dispatch('LoadCityIndex',{'id': pId , 'index' : index });
             setTimeout(() => {
                 this.handleAdd();
                 let uu = parseInt(index) + 1;
                 this.UpdateRecordJob.items.splice(uu, 1);
             },2000);
        } ,
        RecordJobs(){
            if(this.single){
                this.$store.commit('NumberStep', 4);
            }else {
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
                    this.$store.dispatch('CreateUpdateRecordJobs',
                        { UpdateRecordJob: this.$store.state.RecordJob.UpdateRecordJob} )
                        .then(success => {
                            this.$store.commit('NumberStep', 4)
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
                            setTimeout(() => {
                                this.modal2 = false;
                            }, 300);
                        });
                }
            }
        },
        CreatRecordJobs(count) {
            if(count == 0) {
                this.handleAdd();
            }
        },
        handleAdd () {
            this.index++;
            this.UpdateRecordJob.items.push({
                id : this.index,
                base_resume: this.$store.state.BaseRezome.Base.id,
                job_side: '',
                job: '',
                center_job: '',
                title_center_job: '',
                cooperation_type: '',
                group_levels: '',
                province: '',
                city: '',
                start: '',
                end: '',
                working: false,
                comment: '',
                satisfying : '',
                type : 'create',
            });
        },
        handleRemove ( id , index) {
            if(this.UpdateRecordJob.items[index].type && this.UpdateRecordJob.items[index].type == 'create'){
                if(this.CountRecordJobs > 1)
                    this.UpdateRecordJob.items.splice(index, 1);
            }
            else  {
                this.$confirm("آیا اطمینان دارید؟").then(() => {
                this.$store.dispatch('deleteRecordJob',
                {
                    'id': id ,
                    'index' : index
                });
                })
                .then(() =>{
                    this.$notify({
                        group: 'success',
                        title: 'success',
                        text: 'این آیتم با موفقیت حذف شد',
                    })
                }).then( () => {
                    if(this.CountRecordJobs == 0)
                        this.handleAdd()
                })

            }
        }
    }

}
</script>
<style>
.box-user-resume{
    box-shadow: 0 15px 30px 0 rgba(0, 0, 0, 0.11), 0 5px 15px 0 rgba(0, 0, 0, 0.08);
    border-radius: 0.5rem;
    border: 0px;
    padding: 10px;
    margin-top: 10px;
    cursor: s-resize;

}
.btn-delet-form{
    position: absolute;
    width: 78px;
    left: 10px;
    color: red;
    z-index: 99;
    font-size: 27px;
    text-align: left;
    cursor: pointer;
}
.ivu-checkbox-wrapper {
    margin-right: 0px !important; ;

}
</style>
