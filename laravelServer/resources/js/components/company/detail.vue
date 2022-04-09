<template>
    <div>
        <div>
            <div>
                <div class="col-12" style="margin-top : 40px">
                    <Card title="وضعیت متقاضی" shadow class="fixed-modal">
                        <div  class="box-block-user"> <Button v-on:click="modal3 = true"   role="button" class=" btn-default-job" ><Block/> گزارش تخلف کاربر</button> </div>
                        <div class="row">
                            <div class="col-sm-6 ">
                                <p class="my-2">  حقوق درخواستی :<span class="font-weight-bolder">{{money}}</span></p>
                            </div>
                            <div class="col-sm-6 ">
                                <p class="my-2"> آخرین وضعیت :
                                    <span  v-for="(status , index) in statusList" :key="index" class="font-weight-bolder"
                                            v-if="resume.status == status.id" >
                                            {{status.title}}
                                    </span>
                                </p>
                            </div>
                            <div class="col-6 mt-2" v-if="file">
                                <p class="my-2"> رزومه آپلودی  :
                                    <a class="font-weight-bolder text-decoration-underline" @click="download">
                                        {{file}}
                                    </a>
                                </p>
                            </div>
                        </div>

                        <Form class="row">
                            <FormItem  label=" تعیین وضعیت متقاضی" class="col-12">
                               <v-select
                                    :class="{ vSelectRequired  : $v.form.status.$error }"
                                    class="vselect-style"
                                    placeholder="انتخاب کنید "
                                    label="title" :options="formStatus"
                                    v-model="$v.form.status.$model"
                                    :reduce="d => d.id" taggable></v-select>
                            </FormItem>
                            <FormItem label="کامنت برای متقاضی" class="col-md-6">
                                <textarea class="form-control" v-model="$v.form.comment.$model" type="textarea"  placeholder="پیغام خود را برای متقاضی بنویسید (اختیاری) ..." />
                            </FormItem>
                            <FormItem label="کامنت برای کارفرما" class="col-md-6">
                                <textarea class="form-control" v-model="$v.form.Companycomment.$model" type="textarea"  placeholder="پیغام خود را برای متقاضی بنویسید (اختیاری) ..." />
                            </FormItem>
                            <FormItem  class="col-12">
                                <Button  @click="saveChanges()" :loading="loading_model" type="primary">ثبت تغییرات</Button>
                            </FormItem>
                        </Form>
                    </Card>
                </div>

                <div class="col-12">
                    <selectedPdf :theme="2" :id="id"></selectedPdf>
                </div>
                <div class="col-12">
                    <Card v-if="arch" shadow title=" آرشیو وضعیت ها">
                        <ul class="timeline">
                            <li v-for=" ar in  arch" :key="ar.id"
                                class="timeline-milestone is-completed" >
                                <div class="box-date">{{ar.created_at}}</div>
                                <div class="timeline-action">
                                    <div v-if="statusList">
                                        <div  v-for="(status , index) in statusList" :key="index" v-if="ar.status == status.id"  class="label-badge col-3 "  :class="setColor(status.id)">
                                            {{status.title}}
                                        </div>
                                    </div>
                                    <div v-if="ar.comment" class="mt-2">
                                        <h4 class="title " style="font-weight: bold">پیامی برای متقاضی </h4>
                                        <p class="mt-2" style="background-color: #e9e9e9;border-color: #d0d0d0; display: block;padding: 10px;margin-bottom: 20px;-webkit-border-radius: 3px;border-radius: 3px;">{{ar.comment}}</p>
                                    </div>
                                    <div v-if="ar.Companycomment" class="mt-2">
                                        <h2 class="title " style="font-weight: bold">پیامی  برای کارفرما</h2>
                                        <p class="mt-2" style="background-color: #e9e9e9;border-color: #d0d0d0; display: block;padding: 10px;margin-bottom: 20px;-webkit-border-radius: 3px;border-radius: 3px;">{{ar.Companycomment}}</p>
                                    </div>
                            </div>
                            </li>
                        </ul>
                    </Card>
                </div>
            </div>
        </div>
        <Modal v-model="modal3" width="360">
            <p slot="header" style="color:#f60;text-align:center">
                <Icon type="ios-information-circle"></Icon>
                <span>گزارش تخلف </span>
            </p>
            <div style="text-align:center">
                <p>آیا مطمعن هستید؟</p>
            </div>
            <div slot="footer">
                <Button v-on:click="ReportUser()" type="error" size="large" long :loading="modal_loading" >حذف</Button>
            </div>
        </Modal>
    </div>
</template>
<script>

import selectedPdf from './pdf/selectedPdf'
import axios from 'axios'
import Block from '../icon/block'
import vSelect from 'vue-select'
import 'vue-select/dist/vue-select.css';
import {required} from 'vuelidate/lib/validators'

export default {
    components: {selectedPdf  , Block , vSelect},
    name : 'resumeAdvertising'  ,
    data() {
        return {
            arch : '' ,
            id : '' ,
            adId : '' ,
            modal_loading : false,
            loading_model : false ,
            modal3 : false,
            form : {
                status  : '' ,
                comment : '' ,
                resume : '',
                Companycomment : '' ,
            } ,
            resume : '' ,
            money : '' ,
            formStatus : []  ,
            file : ''
        }
    },
     validations: {
            form: {
                status:{
                    required,
                },
                comment:{} ,
                resume : {} ,
                Companycomment : {} ,
            },
        },
    computed : {
        statusList() { return this.$store.state.resumeStatus.statusList }
    },
    mounted () {
        this.modal3 = false
        this.$store.dispatch('LoadStatus');
    },
    beforeCreated() {

    },
    created() {
        this.modal3 = true

        this.id = this.$route.params.resumeId
        this.adId = this.$route.params.adId
        axios.get(`api/v1/resAd/${this.adId}/${this.id}`)
            .then( res => {
                this.arch = res.data.data.statusLists
                this.resume = this.arch[this.arch.length - 1]
                this.arch = this.arch.slice().reverse();
                this.money = res.data.data.money.title
                this.file = res.data.data.file
            })
    },
    watch : {
        resume() {
            this.modal3 = true
            this.modal3 = false
            if(this.resume.status == 1 ) {
                this.$store.dispatch('updateResumeStatus' ,
                {
                    'id' : this.adId  ,
                    'form' : {
                    'resume' : this.id ,
                    'status' : 2 ,
                    'comment' :  '' ,
                    'Companycomment' :  '' ,
                }})
            }
        } ,
        statusList ()  {
             this.formStatus = this.statusList.slice(2)
        }
    },
    methods : {
        download() {
            window.open(`pdfs/resume/${this.file}`, "_blank");
        },
        applyLeftCSS() {
            let nodeId = "headsr";
            let style = document.getElementById(nodeId);
            if (!style) {
                style = document.createElement("style");
                style.id = nodeId;
                style.type = "text/css";
                this.$el.appendChild(style);
            }
            let cssRule = `body { overflow: initial !important}`;
            style.innerHTML = cssRule;
        },
        setColor(id) {
            return `background-${id}`
        },
        ReportUser(){
            this.modal_loading = true;
            this.$store.dispatch('ReportUser', {'resumeId' : this.$route.params.resumeId})
                .then(success => {
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
            .finally(() => {this.modal_loading = true;this.modal3 = false})
        },
        saveChanges () {
            this.$v.$touch()
            if (this.$v.$invalid) {
                this.$notify({
                    group: 'foo',
                    title: 'فرم دارای خطاست',
                    text: 'لطفا قبل از ثبت خطاهای خود را بررسی کنید',
                    duration: 10000,
                    speed: 1000,
                    closeOnClick: true,
                    classes: 'vue-notification success'
                });
            }
            else {
                 this.loading_model=true;
                this.form.resume = this.id
                this.$store.dispatch('updateResumeStatus' , {'id' : this.adId  , 'form' : this.form})
                .then( response => {
                    this.$notify({
                        group: 'success',
                        width : '400px',
                        title: 'success',
                        text: response.data.message,
                        timer: 3000
                    });
                    this.loading_model = false
                    this.$router.push({name : 'DashboardCompany'})
                })
                .catch(error => {
                    this.loading_model = false;
                    this.$notify({
                        group: 'foo',
                        width : '400px',
                        title: 'خطا!',
                        text: 'با خطا مواجه شدید لطفا دوباره تلاش کنید.',
                        timer: 3000
                    });
                })

            }
        }
    }
}
</script>
<style>

.box-date{
    border: 1px solid #1e88e5;
    border-radius: 50%;
    position: absolute;
    right: -32px;
    width: 60px;
    height: 60px;
    display: flex !important;
    align-items: center !important;
    justify-content: center;
    font-size: 11px;
    background: #1e88e5;
    color: #fff;
    text-align: center;
}
.timeline {
    list-style: none;
    margin: 25px 0 22px; padding: 0;
    position: relative;


}
.box-block-user{
    position: absolute;
    left: 25px;
    top: 10px;
}

.timeline-horizontal::after {
    border-top-width: 6px;
    border-left-width: 13px;
    border-color: transparent transparent transparent #00637d;
    top: 15px; right: 0; bottom: auto; left: auto;
}
.timeline-horizontal .timeline-milestone{
    border-top: 2px solid #00637d;
    display: inline;
    float: left;
    margin: 20px 0 0 0;
    padding: 40px 0 0 0;
}
.timeline-horizontal .timeline-milestone::before{
    top: -17px;
    left: auto;
}
.timeline-horizontal .timeline-milestone.is-completed::after {
    top: -17px;
    left: 0;
}

.timeline-milestone {
    border-right: 2px solid #1e88e5;
    margin: 0 20px 0 0px;
    padding: 0 35px 15px 0;
    position: relative;

}
.timeline-milestone::before {
    border: 7px solid #1e88e5;
    border-radius: 50%;
    content: "";
    display: block;
    position: absolute;
    right: -17px;
    width: 32px;
    height: 32px;

}
.timeline-milestone.is-completed::before {
    background-color: #1e88e5;
}

.timeline-milestone.is-current::before {
    background-color: #EEE;
}

.timeline-milestone.is-future::before {
    background-color: #9fc9f7 ;
    border: 0;
}
.timeline-milestone .timeline-action .title {

}
.timeline-action {
    background-color: #FFF;
    padding: 12px 20px;
    position: relative; top: -15px;
    border-radius: 5px;
}
.timeline-action ul {
    list-style: none !important;
}

.timeline-action.is-expandable .title {
    cursor: pointer;
    position: relative;
}
.timeline-action.is-expandable .title:focus{
    outline: 0;
    text-decoration: underline;
}
.timeline-action.is-expandable .title::after {
    border: 6px solid #666;
    border-color: transparent transparent transparent #666;
    content: "";
    display: block;
    position: absolute; top: 6px; right: 0;
}

.timeline-action.is-expandable .title:after {
    border-color: #666 transparent transparent transparent;
    top: 10px; right: 5px;
}

.timeline-action.is-expandable .content { display: block; }


.timeline-action .title, .content {
    word-wrap: break-word;
}


.timeline-action .title {

    font-size: 18px;
    margin: 0;
}


.timeline-action  .date {
    display: block;
    font-size: 14px;
    margin-bottom: 5px;
}

.timeline-action  .content {
    font-size: 14px;
}


.fixed-modal {
    border-top: 1px solid rgba(0,0,0,.1);
    position: sticky !important;
    top: 0;
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
.label-badge {
    padding : 7px ;
    color: #fff;
    font-size: 13px;
    text-align: center;
}
.background-1 {
    background : #89caf5 !important;
}
.background-2 {
    background :#e3dd98 !important;
}
.background-3 {
    background : #8dd6aa !important;
}
.background-5 {
    background : #db9797 !important;
}
.background-4 {
    background : #8adbaa !important;
}
.background-6 {
    background : #87a7e6 !important;
}
.ivu-modal-close .ivu-icon-ios-close {
    font-size: 50px !important;
}
.company-logo {
    width: 50px ;
    height: 50px;
    border-radius: 50%;
}
.center-Object {
    display: flex;
    justify-content: center;
    align-items: center;
}
.ivu-select-selection {
    padding-right: 10px !important;
}
</style>
