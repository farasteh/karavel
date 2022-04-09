<template>
    <div >
        <div>
            <Checkbox size="large" v-model="single">
                <span class="font-weight-bold" style="font-size: 16px">
                      مهارت ندارم
                </span>
            </Checkbox>
        </div>
       <span> زبان </span>
        <Form ref="UpdateLanguge" :model="UpdateLanguge" style="position: relative">
            <div class="card box-user-resume mt-2 p-3"  v-if="Langloading">
                <skillLoading rtl></skillLoading>
            </div>
            <draggable v-else tag="transition-group"
                       :componentData="componentData"
                       :list="UpdateLanguge.items"
                       class="list-group"
                       :animation="100"
                       @start="dragging = true"
                       @end="dragging = false"
            >
                <div v-for="(item, index) in $v.UpdateLanguge.items.$each.$iter" :key="index">
                    <div class="card box-user-resume mt-2">
                        <div class="row ">
                            <div style="z-index: 99" class="btn-delet-form" @click="handleRemoveLang(item.id.$model , index)"><Icon type="md-close" /></div>
                            <FormItem
                                label="نام زبان"
                                class="col-md-3">
                                <v-select
                                    :class="{vSelectRequired  : item.lang_id.$error ,  vselectHide  : showLang }"
                                    class="vselect-style"
                                    placeholder="انتخاب کنید "
                                    label="title" :options="Langaugs"
                                    v-model.trim="item.lang_id.$model"
                                    :reduce="d => d.id" taggable></v-select>
                            </FormItem>
                            <FormItem
                                label="مهارت خواندن"
                                class="col-md-2">
                                <v-select
                                    class="vselect-style"
                                    placeholder="انتخاب کنید "
                                    label="title" :options="Score"
                                    v-model.trim="item.read.$model"
                                    :reduce="d => d.id" taggable></v-select>
                            </FormItem>
                            <FormItem
                                label="مهارت نوشتن"
                                class="col-md-2">
                                <v-select
                                    class="vselect-style"
                                    placeholder="انتخاب کنید "
                                    label="title" :options="Score"
                                    v-model.trim="item.write.$model"
                                    :reduce="d => d.id" taggable></v-select>
                            </FormItem>
                            <FormItem
                                label="مهارت شنیداری"
                                class="col-md-2">
                                <v-select
                                    class="vselect-style"
                                    placeholder="انتخاب کنید "
                                    label="title" :options="Score"
                                    v-model.trim="item.listen.$model"
                                    :reduce="d => d.id" taggable></v-select>
                            </FormItem>
                            <FormItem
                                label="مهارت گفتاری"
                                class="col-md-2">
                                <v-select
                                    class="vselect-style"
                                    placeholder="انتخاب کنید "
                                    label="title" :options="Score"
                                    v-model.trim="item.say.$model"
                                    :reduce="d => d.id" taggable></v-select>
                            </FormItem>
                        </div>
                    </div>
                </div>
            </draggable>
            <FormItem class="mt-2">
                <div type="dashed" class="box-add-item"  >
                    <Icon type="md-add btn-icon-add-item" style="cursor: pointer" @click="handleAdd"/>
                    <div style="padding: 18px;">  زبان خارجی دیگری را اضافه کنید</div>
                </div>
            </FormItem>
        </Form>
        <div class="mt-5">
            <span>مهارت های تجربی</span>
            <div>
                <Form  ref="experimentalCreate" :model="UpdateLoadExperimenta"  style="position: relative"  >
                    <div v-if="Experloading" class="row">
                        <div class="col-md-6">
                            <div class="card box-user-resume mt-2 p-3">
                            <resumeLoading rtl></resumeLoading>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card box-user-resume mt-2 p-3">
                            <resumeLoading rtl></resumeLoading>
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
                    >
                       <div v-for="(item, index) in $v.UpdateLoadExperimenta.items.$each.$iter" :key="index" class="col-md-6">

                        <div class="card box-user-resume mt-2 ">
                            <div class="row ">
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
                                    <v-select
                                        class="vselect-style"
                                        placeholder="انتخاب کنید "
                                        label="title" :options="Score"
                                        v-model.trim="item.level.$model"
                                        :reduce="d => d.id" taggable></v-select>
                                </FormItem>
                            </div>
                        </div>
                    </div>
                    </draggable>
                    <FormItem class="mt-2 ">
                        <div type="dashed" class="box-add-item" >
                            <Icon type="md-add btn-icon-add-item" style="cursor: pointer" @click="experimentalCreateAdd"  />
                            <div style="padding: 18px;">  مهارت تجربی دیگری را اضافه کنید</div>
                        </div>
                    </FormItem>
                </Form>
            </div>
        </div>
        <div class="mt-5">
            <span>دوره‌ها و گواهینامه‌ها</span>
            <div>

               <Form ref="UpdateLoadCertificates" :model="UpdateLoadCertificates" style="position: relative"  >
                   <div v-if="Certloading" class="card box-user-resume mt-2 p-3">
                       <skillLoading rtl></skillLoading>
                   </div>
                   <draggable v-else tag="transition-group"
                              :componentData="componentData"
                              :list="UpdateLoadCertificates.items"
                              class="list-group"
                              :animation="100"
                              @start="dragging = true"
                              @end="dragging = false"
                   >
                       <div v-for="(item, index) in $v.UpdateLoadCertificates.items.$each.$iter" :key="index" class="">
                        <div class="card box-user-resume mt-2 ">
                            <div class="row ">
                                <div style="z-index: 99" class="btn-delet-form" @click="handleRemoveCertificate(item.id.$model , index)"><Icon type="md-close" /></div>
                                <FormItem label="نوع گواهینامه" class="col-md-3">
                                    <Input :class="{ 'ivu-form-item-error animation-error': item.certificate.$error,'is-valid': !item.certificate.$invalid }"
                                           v-model="item.certificate.$model " size="large"  placeholder="مثال : زبان "></Input>
                                   </FormItem>
                                <FormItem label="عنوان" class="col-md-3">
                                    <Input v-model="item.title.$model " size="large"  placeholder="مثال : IELS "></Input>
                                </FormItem>
                                <FormItem label="موسسه" class="col-md-3">
                                    <Input v-model="item.Institute.$model " size="large"  placeholder="مثال : موسسه آفاق"></Input>
                                </FormItem>
                                <FormItem label="تاریخ" class="col-md-3">
                                    <Input :class="{ 'ivu-form-item-error animation-error': item.date.$error,'is-valid': !item.date.$invalid }"
                                        v-model="item.date.$model" size="large"  placeholder="مثال : 1325"></Input>
                                    <div class="text-sm text-red" v-if="item.date.$error" style="position:absolute">
                                        <span class="text-danger" v-if="!item.date.year">  فرمت تاریخ نادرست است </span>
                                    </div>
                                </FormItem>
                            </div>
                        </div>
                   </div>
                   </draggable>
                   <FormItem class="mt-2 ">
                       <div type="dashed" class="box-add-item">
                           <Icon type="md-add btn-icon-add-item" style="cursor: pointer" @click="CertificatesCreateAdd"  />
                           <div style="padding: 18px;">  دوره و گواهینامه دیگری را اضافه کنید</div>
                       </div>
                   </FormItem>
               </Form>
            </div>
        </div>
        <div class="mt-5">
            <span>افتخارات</span>
            <div>

               <Form ref="experimentalCreate" :model="UpdateLoadHonors" style="position: relative"  >
                   <div v-if="Honorloading" class="row">
                        <div class="col-md-6">
                            <div class="card box-user-resume mt-2 p-3">
                            <resumeLoading rtl></resumeLoading>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card box-user-resume mt-2 p-3">
                            <resumeLoading rtl></resumeLoading>
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
                   >
                    <div v-for="(item, index) in $v.UpdateLoadHonors.items.$each.$iter" :key="index" class="col-md-6">
                        <div class="card box-user-resume mt-2 ">
                            <div class="row ">
                                <div style="z-index: 99" class="btn-delet-form" @click="handleRemove(item.id.$model  , index)"><Icon type="md-close" /></div>
                                    <FormItem label="عنوان" class="col-md-6">
                                        <Input :class="{ 'ivu-form-item-error animation-error': item.title.$error,'is-valid': !item.title.$invalid }"
                                            size="large" v-model="item.title.$model"  placeholder="مثال : چاپ مقاله"></Input>
                                   </FormItem>
                                <FormItem label="تاریخ" class="col-md-6">
                                    <Input :class="{ 'ivu-form-item-error animation-error': item.date.$error,'is-valid': !item.date.$invalid }"
                                        size="large"  v-model="item.date.$model"  placeholder="مثال: 1378"></Input>
                                    <div class="text-sm text-red" v-if="item.date.$error" style="position:absolute">
                                        <span class="text-danger" v-if="!item.date.year">  فرمت تاریخ نادرست است </span>
                                    </div>
                                </FormItem>

                            </div>
                        </div>
                   </div>
                   </draggable>
                   <FormItem class="mt-2 ">
                       <div type="dashed" class="box-add-item"  >
                           <Icon type="md-add btn-icon-add-item" style="cursor: pointer" @click="HonorsCreateAdd" />
                           <div style="padding: 18px;">  افتخار دیگری را اضافه کنید</div>
                       </div>
                   </FormItem>
               </Form>
                   <div class="box-btn-resume">
                       <button @click="RecordSkill()" class="btn custom-btn btn-15" >ذخیره و ادامه</button>
                   </div>
                <DialogLoading :show="modal2"></DialogLoading>
            </div>
        </div>
    </div>
</template>
<script>
import draggable from "vuedraggable";
import DialogLoading from '../../Loading/DialogLoading.vue'
import CertificatesResume from "../../../stores/Modules/Member/Resume/CertificatesResume";
import Loading from 'vue-loading-overlay';
import {req, ref, withParams, required, requiredIf, helpers} from 'vuelidate/lib/validators';
// Import stylesheet
import 'vue-loading-overlay/dist/vue-loading.css';
import resumeLoading from "../../Loading/resumeLoading";
import skillLoading from "../../Loading/skillLoading";
import vSelect from 'vue-select'
import 'vue-select/dist/vue-select.css';

const year = helpers.regex('year', /^1[3,4]\d{2}$/)
export default {
    components: {
        draggable,
        DialogLoading ,
        Loading ,
        resumeLoading,
        vSelect ,
        skillLoading
    },
    props: ['Base'],
        data () {
            return {
                single: false,
                showLang  : true ,
                showCertificate  : true ,
                index: 1,
                experimentalCreateIndex: 1,
                CertificatesCreateIndex: 1,
                HonorsCreateAddIndex: 1,
                Langloading : false ,
                Experloading : false ,
                Certloading  :false,
                Honorloading : false,
                Score:[
                    {
                        title: '★☆☆☆☆',
                        id: 1,
                    },
                    {
                        title: '★★☆☆☆',
                        id: 2,
                    },
                    {
                        title: '★★★☆☆',
                        id: 3,
                    },
                    {
                        title: '★★★★☆',
                        id: 4,
                    },
                    {
                        title: '★★★★★',
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
            this.Experloading = true
            this.Certloading = true
            this.Honorloading = true
            this.$store.dispatch('LoadLangageRsume').then(res =>{this.Langloading = false})
            this.$store.dispatch('LoadCertificatesResume').then(res =>{this.Certloading = false})
            this.$store.dispatch('LoadHonorsResume').then(res =>{this.Honorloading = false})
            this.$store.dispatch('LoadExperimenta').then(res =>{this.Experloading = false})
            this.$store.dispatch('LoadLanguge').then(res =>{this.showLang = false})
        },
        computed:{
            Langaugs(){return this.$store.state.Languge.Languge},
            LangugeCreate(){return this.$store.state.LangaugeResume.LangugeCreate},
            experimentalCreate(){return this.$store.state.Experimental.experimentalCreate},
            UpdateLoadExperimenta(){return this.$store.getters.UpdateExperimental},
            UpdateLanguge(){return this.$store.getters.UpdateLanguge},
            UpdateLoadCertificates(){return this.$store.getters.UpdateCertificatesResume},
            UpdateLoadHonors(){return this.$store.getters.HonorsResume},
            CountRecordLanguge () {return this.$store.getters.CountRecordLanguge},
            CountCertificates () {return this.$store.getters.CountCertificates},
            countHonorResume() {return this.$store.getters.CountHonors},
            CountExperimental(){return this.$store.getters.CountExperimental}

        },
        watch:{
        },
        methods: {
            RecordSkill(){
                if (this.single) {
                    this.$store.commit('NumberStep', 5);
                }
                else  {
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
                        this.$store.dispatch('SkillInsert', {
                            'UpdateLanguge': this.$store.state.LangaugeResume.UpdateLanguge,
                            'UpdateLoadExperimenta': this.$store.state.Experimental.UpdateLoadExperimenta,
                            'CertificatesResume': this.$store.state.CertificatesResume.UpdateCertificatesResume,
                            'HonorsResume': this.$store.state.Honors.HonorsResume
                        })
                            .then(success => {
                                this.$store.commit('NumberStep', 5);
                                this.$notify({
                                    group: 'success',
                                    title: 'success',
                                    text: 'فرم شما با موفقیت ثبت گردید',
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
            CreatRecordLangauge(count) {
                if (count == 0) {
                    this.handleAdd();
                }
            },
            CreateCertificates(count){
                if(count == 0){
                    this.CertificatesCreateAdd();
                }
            },
            CreatRecordCountHonors(count){
                if(count == 0){
                    this.HonorsCreateAdd();
                    this.HonorsCreateAdd();
                }
            },
            CreateexperimentalCreate(count) {
                 if(count == 0){
                    this.experimentalCreateAdd();
                    this.experimentalCreateAdd();
                }
            },
            HonorsCreateAdd(){
                this.HonorsCreateAddIndex++;
                this.UpdateLoadHonors.items.push({
                    base_resume: this.$store.state.BaseRezome.Base.id,
                    title: '',
                    date: '',
                    type :'create',
                });
            },
            handleAdd () {
                this.index++;
                this.UpdateLanguge.items.push({
                    base_resume: this.$store.state.BaseRezome.Base.id,
                    read: '',
                    write: '',
                    say: '',
                    listen: '',
                    lang_id: '',
                    type :'create',
                });
            },
            CertificatesCreateAdd(){
                this.CertificatesCreateIndex ++ ;
                this.UpdateLoadCertificates.items.push({
                    base_resume: this.$store.state.BaseRezome.Base.id,
                    certificate: '',
                    title: '',
                    Institute: '',
                    date: '',
                    type :'create',
                });
            },
            experimentalCreateAdd(){
                this.experimentalCreateIndex++;
                this.UpdateLoadExperimenta.items.push({
                    base_resume: this.$store.state.BaseRezome.Base.id,
                    name: '',
                    level: '',
                    type :'create',
                });
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
                        this.$store.dispatch('deleteHonorResume',
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
                    this.$store.dispatch('deleteExperimental',
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
                    this.$store.dispatch('deleteLanguage',
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
                    this.$store.dispatch('deleteCertificateResume',
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
                          if(this.CountCertificates == 0)
                                this.CertificatesCreateAdd()
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
}
.btn-delet-form{
    position: absolute;
    width: 78px;
    left: 10px;
    color: red;
}
</style>
