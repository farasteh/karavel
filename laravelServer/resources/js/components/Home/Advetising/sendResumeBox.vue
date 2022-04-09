<template>
    <div class="box-show-page ">
        <div class="box-form-header box-form-header-back mBox"  v-if="!contentLoading">
            <img  v-if="image != undefined" :src="'images/company/'+ image" alt="">
            <img  v-if="image == null" src="images/company/no-photo.jpg" alt="">
        </div>
        <Vcl-list rtl v-if="contentLoading"></Vcl-list>
        <Form ref="formValidate" v-if="!contentLoading">
            <div class="d-flex justify-content-between">
                <p class="my-2">
                    {{$store.getters.Fullname}}
                </p>
                <p class="my-2">
                    {{mobile}}
                </p>
            </div>
            <p class="my-2">
                {{email}}
            </p>
            <FormItem prop="money" v-if="memberRole == 'Member'">
                <Input  v-if="$store.getters.moneyGet(id)" :value="$store.getters.moneyGet(id)" disabled/>
                <Select v-else :class="{ 'ivu-form-item-error': $v.money.$error,'is-valid': !$v.money.$invalid }"
                        size="large" placeholder="حقوق درخواستی" filterable  allow-create
                        :disabled="$store.getters.HasSent(id)"
                        v-model.trim="$v.money.$model">
                    <Option v-for="(item,index) in moneys" :value="item.id"
                            :key="index">{{ item.title }}</Option>
                </Select>
                <span class="text-danger"
                      v-if="$v.money.$error"> لطفا حقوق درخواستی را انتخاب کنید </span>
            </FormItem>
            <div v-if="memberRole == 'Member'" style="width: 90%;" class="m-auto mb-1"><vue-ranks></vue-ranks></div>
            <FormItem v-if="!$store.getters.HasSent(id) && memberRole == 'Member'">
                <div class="alert alert-primary mt-2 text-center" v-if="!uploading">
                    کاربر گرامی، به صورت اتوماتیک رزومه ای که ساخته اید برای کارفرما ارسال میشود
                    <br/>
                    یا
                    <span class="text-danger cursor-poiner" @click="uploading = true">رزومه دیگری آپلود کنید</span>
                </div>
                <div v-if="form.file && uploading"
                     style="display: flex; padding: 7px; border: 1px solid #f3f3f3;color: #505050 !important;-webkit-text-fill-color: #505050 !important;">
                    <div>{{form.file}}</div>
                    <div style="position: absolute;left: 10px;font-size: 20px ; cursor: pointer">
                        <Icon type="ios-eye" class="cursor-poiner" @click="download"/>
                        <Icon type="md-trash" class="cursor-poiner"  @click="removePdf" />
                    </div>

                </div>
                <file-upload id="pdf"  v-if="uploading && !form.file " url="api/v1/Upload"
                             accept=".pdf"
                             btnLabel="رزومه خود را انتخاب کنید"
                             btnUploadingLabel="در حال آپلود"
                             @change="onFileChange"
                >
                </file-upload>
                <span class="text-danger" v-if="error">{{error}}</span>

            </FormItem>
            <Button v-if="memberRole == 'Member' && !$store.getters.HasSent(id)"
                    @click="sendResume"  type="primary" size="large" long
                    :loading="modal_loading"
                    :disabled="$store.getters.HasSent(id)">
                ارسال رزومه
            </Button>
            <div class="alert  mt-2" :class="messageType"
                 v-if="$store.getters.HasSent(id) && message">{{ message }}
            </div>
            <div v-if="memberRole != 'Member'">
                <div v-if="memberRole == 'Company'" class="alert alert-danger mt-2">
                    <a @click="Gologin">
                        <span class="text-dark">شما با پروفایل کارفرما وارد شده اید برای ارسال رزومه با پروفایل کارجو وارد شوید</span>
                    </a>
                </div>
                <div v-else-if="memberRole == 'Admin'" class="alert alert-danger mt-2">
                    <span class="text-dark">شما با پروفایل ادمین وارد شده اید</span>
                </div>
                <div  v-else class="text-center  alert alert-danger text-dark mt-2">
                    <a @click="Gologin" class="text-dark">
                        برای ارسال رزومه لطفا وارد شوید
                    </a>
                </div>
            </div>
        </Form>
    </div>
</template>
<script>

import {required} from "vuelidate/lib/validators";
import { VclFacebook, VclList } from 'vue-content-loading';
import rank from '../../includes/Member/ranks/ranks'

export default {
    name:"sendResumeBox",
    props: ['contentLoading' , 'memberRole' , 'Member'],
    components: {
        VclList ,
        'vue-ranks' : rank ,
    },
    data() {
        return {
            form: {
                advertising: '',
                file: ''
            },
            uploading: false,
            error: '',
            modal_loading: false,
            message: 'شما قبلا به این آگهی رزومه ارسال کرده اید',
            messageType: 'alert-primary',
            options: {
                target: 'api/v1/fileupload',
                testChunks: false,
                singleFile: true,
                status: ''
            },
            attrs: {
                accept: 'image/*'
            },
            money: ''
        }
    },
    validations: {
        money: {
            required
        } ,
    },
    methods : {
        Gologin() {
            if ( this.memberRole == '') {
                this.$store.commit('SET_ROUTE' , {
                    route : {name : this.$route.name , query  : this.$route.query , params: this.$route.params }
                })
                this.$router.push({name : 'RegisterLogin' ,  params : {type: 'Member'}})
            }
            else if(this.memberRole == 'NOTMember')
                this.$router.push({name : 'RegisterMember'})
            else if(this.memberRole == 'NOTCompany')
                this.$router.push({name : 'RegisterCompany'})
        },
        async sendResume() {
            if (this.$v.$invalid) {
                this.$v.$touch()
                this.ErrorNotify()
            } else {
                this.modal_loading = true
                this.$confirm("آیا از ارسال رزومه خود اطمینان دارید؟").then(() => {
                    this.form.advertising = this.Advertising.id
                    this.form.money = this.money
                    this.$store.dispatch('sendResume', {form: this.form, id: this.Member.member.id})
                        .then(response => {
                            this.SuccessNotify('رزومه شما با موفقیت به این آگهی ارسال شد')
                            this.message = 'رزومه شما ارسال شد'
                            this.messageType = 'alert-success'
                        })
                        .catch(error => console.log(error))
                        .finally(() => this.modal_loading = false)
                }).catch(() => this.modal_loading = false)
            }

        } ,
        onFileChange(res, file) {
            if(res.data.error)
            {
                this.error = 'فرمت فایل انتخابی نادرست است'
            }
            else
            {
                this.error  = ''
                this.form.file = res.data.data
                //this.uploading = false
                //this.$store.commit('SET_PDF', res.data.data)
            }
        },
    } ,
    computed :  {
        image() {
            if(this.memberRole == 'Member')
                if(this.Member)
                    return this.Member.member.image
        },
        mobile() {
            if(this.memberRole == 'Member')
                if(this.Member)
                    return this.Member.member.mobile
        },
        email() {
            if(this.memberRole == 'Member')
                if(this.Member)
                    return this.Member.member.email
        } ,
        id() {
            if(this.memberRole == 'Member')
                if(this.Member)
                    return this.Member.member.id
        },
        moneys () {
            return this.$store.state.Money.MoneyList
        } ,
        download() {
            window.open(`pdfs/resume/${this.pdf}`, "_blank");
        },
        removePdf() {
            this.form.file = ''
            this.uploading = true
        },
    },
}
</script>
<style>

</style>
