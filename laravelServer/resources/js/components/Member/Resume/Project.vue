<template>
    <div>
        <div>
            <Checkbox size="large" v-model="single">
                <span class="font-weight-bold" style="font-size: 16px">
                      پروژه‌ ندارم
                </span>   
            </Checkbox>
        </div>
        <span>تحقیقات و مقالات</span>
        <Form ref="UpdateProject" :model="UpdateArticles" style="position:relative;" >
            <div class="card box-user-resume mt-2 p-4"  v-if="effectLoading">
                <resumeLoading rtl></resumeLoading>
            </div>
            <draggable v-else tag="transition-group"
                       :componentData="componentData"
                       :list="UpdateArticles.items"
                       class="list-group"
                       :animation="100"
                       @start="dragging = true"
                       @end="dragging = false"
            >
                <div v-for="(item, index) in $v.UpdateArticles.items.$each.$iter" :key="index">
                    <div class="card box-user-resume mt-2">
                        <div class="row ">
                            <div style="z-index: 99" class="btn-delet-form" @click="handleRemoveEffect(item.id.$model, index)"><Icon type="md-close" /></div>
                            <FormItem
                                label="نوع اثر"
                                class="col-3">
                                <v-select
                                    :class="{vSelectRequired  :item.effect.$error, vselectHide  : showEffect }"
                                    class="vselect-style"
                                    placeholder="انتخاب کنید "
                                    label="title" :options="Effect"
                                    v-model.trim="item.effect.$model"
                                    :reduce="d => d.id" taggable></v-select>
                            </FormItem>
                            <FormItem
                                label="عنوان"
                                class="col-3">
                                <Input :class="{ 'ivu-form-item-error animation-error': item.title.$error,'is-valid': !item.title.$invalid }"
                                    size="large"  v-model.trim="item.title.$model" placeholder="کتاب دا"></Input>
                            </FormItem>
                            <FormItem
                                label="ناشر"
                                class="col-2">
                                <Input size="large" v-model.trim="item.publisher.$model"  placeholder="انتشارات نور"></Input>
                            </FormItem>
                            <FormItem
                                label="لینک مرتبط"
                                class="col-2">
                                <Input style="direction:ltr ; text-align :left;"  size="large" v-model.trim="item.link.$model"  placeholder="http://da.ir"></Input>
                            </FormItem>
                             <FormItem
                                label="تاریخ"
                                class="col-2">
                                <Input :class="{ 'ivu-form-item-error animation-error': item.date.$error,'is-valid': !item.date.$invalid }"
                                    size="large"  v-model.trim="item.date.$model"  placeholder="1388"></Input>
                                 <div class="text-sm text-red" v-if="item.date.$error" style="position:absolute">
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
                    <Icon type="md-add btn-icon-add-item" style="cursor: pointer" @click="handleAddArtiles"  />
                    <div style="padding: 18px;"> سابقه تحصیلی دیگری را اضافه کنید</div>
                </div>
            </FormItem>
        </Form>
        <div class="mt-5">
            <span>پروژه‌ها</span>
            <div>
                <Form ref="UpdateLanguge" :model="UpdateProject"  style="position:relative;">
                    <div class="card box-user-resume mt-2 p-4"  v-if="projectLoading">
                        <resumeLoading rtl></resumeLoading>
                    </div>
                    <draggable v-else tag="transition-group"
                               :componentData="componentData"
                               :list="UpdateProject.items"
                               class="list-group"
                               :animation="100"
                               @start="dragging = true"
                               @end="dragging = false"
                    >
                        <div v-for="(item, index) in $v.UpdateProject.items.$each.$iter" :key="index">
                            <div class="card box-user-resume mt-2">
                                <div class="row ">
                                    <div style="z-index: 99" class="btn-delet-form" @click="handleRemoveProject(item.id.$model , index)"><Icon type="md-close" /></div>
                                    <FormItem
                                        label="عنوان"
                                        class="col-3">
                                        <Input  :class="{ 'ivu-form-item-error animation-error': item.title.$error,'is-valid': !item.title.$invalid }"
                                            size="large"  v-model.trim="item.title.$model"  placeholder="ایران تکنولوژی"></Input>
                                    </FormItem>
                                    <FormItem
                                        label="کارفرما / درخواست کننده"
                                        class="col-3">
                                        <Input  :class="{ 'ivu-form-item-error animation-error': item.company.$error,'is-valid': !item.company.$invalid }"
                                            size="large"  v-model.trim="item.company.$model"  placeholder="ایران"></Input>
                                    </FormItem>
                                    <FormItem
                                        label="لینک مرتبط"
                                        class="col-3">
                                        <Input style="direction:ltr ; text-align :left;" size="large"  v-model.trim="item.link.$model"  placeholder="http://iran-tech.com"></Input>
                                    </FormItem>
                                    <FormItem
                                        label="تاریخ"
                                        class="col-3">
                                        <Input :class="{ 'ivu-form-item-error animation-error': item.date.$error,'is-valid': !item.date.$invalid }"
                                            size="large"  v-model.trim="item.date.$model"  placeholder="1399"></Input>
                                        <div class="text-sm text-red" v-if="item.date.$error" style="position:absolute">
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
                        <div type="dashed" class="box-add-item"  >
                            <Icon type="md-add btn-icon-add-item" style="cursor: pointer" @click="handleAdd" />
                            <div style="padding: 18px;"> سابقه تحصیلی دیگری را اضافه کنید</div>
                        </div>
                    </FormItem>
                </Form>
                    <div class="box-btn-resume">
                        <button @click="RecordProject()" class="btn custom-btn btn-15" >ذخیره و ادامه</button>
                    </div>
                <DialogLoading :show="modal2"></DialogLoading>
            </div>
        </div>
    </div>
</template>
<script>
import draggable from "vuedraggable";
import DialogLoading from '../../Loading/DialogLoading.vue'
import {helpers, requiredIf, url} from 'vuelidate/lib/validators';
import resumeLoading from "../../Loading/resumeLoading";
import vSelect from 'vue-select'
import 'vue-select/dist/vue-select.css';
const year = helpers.regex('year', /^1[3,4]\d{2}$/)
export default {
    components: {
        draggable,
        DialogLoading  ,
        resumeLoading ,
        vSelect
    },
    props: ['Base'],
    data () {
        return {
            single : false ,
            showEffect  : true ,
            effectLoading : false ,
            projectLoading : false ,
            index: 1,
            experimentalCreateIndex: 1,
            CertificatesCreateIndex: 1,
            HonorsCreateAddIndex: 1,
            yearelect:'13',
            years:'',
            mount:'',
            Score:[
                {
                    title: 1,
                    id: 1,
                },
                {
                    title: 2,
                    id: 2,
                },
                {
                    title: 3,
                    id: 3,
                },
                {
                    title: 4,
                    id: 4,
                },
                {
                    title: 5,
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
        this.effectLoading = true
        this.projectLoading = true
        this.$store.dispatch('LoadProjectResume').then(res => {this.effectLoading = false});
        this.$store.dispatch('LoadArticlesResume').then(res => {this.projectLoading = false});
        this.$store.dispatch('LoadEffect').then(res => {this.showEffect = false});

    },
    computed:{
        Effect(){return this.$store.state.Effect.Effect},
        UpdateProject(){return this.$store.getters.Project},
        UpdateArticles(){return this.$store.getters.Articles},
        CountProject() {return this.$store.getters.CountProject},
        CountEffect() {return this.$store.getters.CountArticles},
    },
    watch:{

    },
    methods: {
        Daasate(id) {
            this.UpdateArticles.items[id].date = this.yearelect+this.years+'-'+this.mount
        },
        RecordProject(){
             if (this.single) {
                    this.$store.commit('NumberStep', 6);
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
                    this.$store.dispatch('ProjectResumeInsert', {
                        'Project': this.$store.state.ProjectResume.Project,
                        'Articles': this.$store.state.ArticlesResume.Articles,
                    })
                        .then(success => {
                            this.$store.commit('NumberStep', 6)
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
                            setTimeout(() => {
                                this.modal2 = false;
                            }, 300);
                        });
                }
            }
         
        },
        ProjectAdd(count) {
            if (count == 0) {
                this.handleAdd();
            }
        },
        ArticlesAdd(count){
            if (count == 0) {
                this.handleAddArtiles();
            }
        },
        CreatRecordCountRecordJobs(count){
            if(count == 0){
                this.CertificatesCreateAdd();
            }
        },
        CreatRecordCountHonors(count){
            if(count == 0){
                this.HonorsCreateAdd();
            }
        },
        handleAddArtiles(){
            this.HonorsCreateAddIndex++;
            this.UpdateArticles.items.push({
                base_resume: this.$store.state.BaseRezome.Base.id,
                effect: '',
                title: '',
                publisher: '',
                link: '',
                comment: '',
                date: '',
                type :'create',
            });
        },
        handleAdd () {
            this.index++;
            this.UpdateProject.items.push({
                base_resume: this.$store.state.BaseRezome.Base.id,
                title: '',
                company: '',
                link: '',
                comment: '',
                date: '',
                type :'create',
            });
        },
        CertificatesCreateAdd(){
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
                this.$store.dispatch('deleteArticleResume',
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
                this.$store.dispatch('deleteProjectResume',
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
                        if(this.CountProject == 0)
                            this.handleAdd()
                })

            }

        }

    }

}
</script>
<style>
.box-add-item {
    cursor: initial !important;
}
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
