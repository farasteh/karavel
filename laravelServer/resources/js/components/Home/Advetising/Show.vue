<template>
    <div>
        <div>
            <div class="container pt-4">
                <div style="padding: 10px;margin: auto;padding-left: 0px;padding-right: 0px;" class="row ">
                    <div class="col-12 col-lg-9">
                        <div class="box-show-page mb-4">
                            <codeLoading v-if="contentLoading"></codeLoading>
                            <div v-if="!contentLoading" class="row">
                                <h1 class="title-advertising-show-page col-9">
                                    {{ Advertising.title }}
                                    <span style="font-size: 15px">
                                        ({{Advertising.created_at}})
                                    </span>
                                </h1>
                                <div class="col-3 d-flex justify-content-end">
                                    <div>
                                         <span class="box-icon-j ml-3" ref="shareBoxShow">
                                             <a @click=" boxShare  = !boxShare" class="d-flex">
                                                 <img src="../../../../images/share.png" alt="" width="25" height="27">
                                             </a>
                                        </span>
                                        <div class="d-flex flex-column share-icones" v-if="boxShare" >
                                            <ul style="display: flex; flex-direction: column; align-items: stretch">
                                                <li style="display: block ;  margin: 10px 0; cursor: pointer"
                                                @click="sharewhatsapp">
                                                    <div style="color: rgb(117, 117, 117);line-height: 20px;font-size: 14px;">
                                                        <div class="d-flex justify-content-between">
                                                            <span>واتس آپ</span>
                                                            <span style="margin-right: 16px ;">
                                                                  <Icon type="logo-whatsapp" style="font-size: 25px" />
                                                            </span>

                                                        </div>
                                                    </div>
                                                </li>
                                                <li style="display: block ; margin: 10px 0 ; cursor: pointer"
                                                @click="shareTelegram">
                                                    <div style="color: rgb(117, 117, 117);line-height: 20px;font-size: 14px;">
                                                        <div class="d-flex justify-content-between">
                                                            <span>تلگرام</span>
                                                            <span style="margin-right: 16px ;">
                                                                <i class="fab fa-telegram"  style="font-size: 25px"></i>
                                                            </span>

                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="arrow-box"></div>
                                        </div>
                                    </div>
                                    <Icon v-if="!like"  @click="liked" class="box-icon-j" type="ios-bookmark-outline" />
                                    <Icon v-if="like"  @click="disliked" class="box-icon-j" type="ios-bookmark" />
                                </div>
                                <div class="col-12" @click="openAd" style="font-size: 13px ; color: rgba(119, 119, 119, 0.84); cursor: pointer">
                                    آگهی استخدام در
                                    <span>{{Advertising.Company.name_fa}}</span>
                                </div>
                            </div>
                            <div v-if="!contentLoading">
                                <div style="margin-top: 20px;" class="row">
                                    <div style="margin-top: 15px;" class="col-md-4 col-6" v-if="Advertising.job">
                                        <div style=""><span style="font-weight: bold;">دسته‌بندی شغلی:</span></div>
                                        <div style="margin-top: 10px;"><span
                                            class="box-activity-advetising box-activity-advetising-box-shadow box-activity-advetising-color box-activity-advetising-background">{{ Advertising.job.title }}</span></div>
                                    </div>
                                    <div style="margin-top: 15px;" class="col-md-4 col-6" v-if="Advertising.category">
                                        <div style=""><span style="font-weight: bold;"> زیرمجموعه شغلی:</span></div>
                                        <div style="margin-top: 10px;"><span
                                            class="box-activity-advetising box-activity-advetising-box-shadow box-activity-advetising-color box-activity-advetising-background">{{ Advertising.category.title }}</span></div>
                                    </div>
                                    <div style="margin-top: 15px;" class="col-md-4 col-6" v-if="Advertising.work_category.length != 0">
                                        <div style=""><span style="font-weight: bold;"> تخصص نهایی: </span></div>
                                        <div style="margin-top: 10px;"><span v-for="wjob in Advertising.work_category" :key="wjob.id"
                                            class="box-activity-advetising box-activity-advetising-box-shadow box-activity-advetising-color box-activity-advetising-background mb-1">{{ wjob.title }}</span>
                                        </div>
                                    </div>
                                    <div style="margin-top: 15px;" class="col-md-4 col-6" v-if="Advertising.province || Advertising.city">
                                        <div style=""><span style="font-weight: bold;">موقعیت مکانی:</span></div>
                                        <div style="margin-top: 10px;"><span
                                            class="box-activity-advetising box-activity-advetising-box-shadow box-activity-advetising-color box-activity-advetising-background"> {{
                                                Advertising.province.title
                                            }} ، {{ Advertising.city.title }} </span>
                                        </div>
                                    </div>
                                    <div style="margin-top: 15px;" class="col-md-4 col-6" v-if="Advertising.CooperationType">
                                        <div><span style="font-weight: bold;"> نوع همکاری:</span></div>
                                        <div style="margin-top: 10px;"><span class="box-activity-advetising box-activity-advetising-box-shadow box-activity-advetising-color box-activity-advetising-background">
                                            {{Advertising.CooperationType.title }}
                                        </span>
                                        </div>
                                    </div>
                                    <div style="margin-top: 15px;" class="col-md-4 col-6"  v-if="Advertising.TimeUp ||  Advertising.TimeDown">
                                        <div><span style="font-weight: bold;">ساعت کار:</span></div>
                                        <div style="margin-top: 10px;"><span
                                            class="box-activity-advetising box-activity-advetising-box-shadow box-activity-advetising-color box-activity-advetising-background">
                                            {{ Advertising.TimeDown }}
                                            -
                                            {{ Advertising.TimeUp }}
                                        </span></div>
                                    </div>
                                    <div style="margin-top: 15px;" class="col-md-4 col-6" v-if="Advertising.HistoryJop">
                                        <div><span style="font-weight: bold;">سابقه کاری:</span></div>
                                        <div style="margin-top: 10px;"><span
                                            class="box-activity-advetising box-activity-advetising-box-shadow box-activity-advetising-color box-activity-advetising-background">{{ Advertising.HistoryJop.title }}</span></div>
                                    </div>
                                    <div style="margin-top: 15px;" class="col-md-4" v-if="Advertising.money">
                                        <div><span style="font-weight: bold;"> حقوق:</span></div>
                                        <div style="margin-top: 10px;"><span class="box-activity-advetising box-activity-advetising-box-shadow box-activity-advetising-color box-activity-advetising-background">
                                            {{Advertising.money.title}}
                                        </span>
                                        </div>
                                    </div>
                                    <div style="margin-top: 15px;" class="col-md-4 col-6" v-if="Advertising.Gender">
                                        <div style=""><span style="font-weight: bold;">جنسیت:</span></div>
                                        <div style="margin-top: 10px;"><span
                                            class="box-activity-advetising box-activity-advetising-box-shadow box-activity-advetising-color box-activity-advetising-background">{{ Advertising.Gender.title }}</span></div>
                                    </div>
                                    <div style="margin-top: 15px;" class="col-md-4 col-6" v-if="Advertising.document">
                                        <div><span style="font-weight: bold;">مدرک تحصیلی:</span></div>
                                        <div style="margin-top: 10px;"><span
                                            class="box-activity-advetising box-activity-advetising-box-shadow box-activity-advetising-color box-activity-advetising-background ">{{ Advertising.document.title }}</span></div>
                                    </div>
                                    <div style="margin-top: 15px;" class="col-md-4 col-6" v-if="Advertising.FildStudy">
                                        <div><span style="font-weight: bold;">رشته تحصیلی:</span></div>
                                        <div style="margin-top: 10px;"><span
                                            class="box-activity-advetising box-activity-advetising-box-shadow box-activity-advetising-color box-activity-advetising-background">{{ Advertising.FildStudy }}</span></div>
                                    </div>
                                    <div style="margin-top: 15px;" class="col-md-4 col-6" v-if="Advertising.Soldier">
                                        <div style=""><span style="font-weight: bold;">وضعیت سربازی: </span></div>
                                        <div style="margin-top: 10px;">
                                            <span
                                                class="box-activity-advetising  box-activity-advetising-box-shadow box-activity-advetising-color box-activity-advetising-background">
                                                {{ Advertising.Soldier.title }}
                                            </span>
                                        </div>
                                    </div>
                                    <div style="margin-top: 15px;" class="col-md-12"
                                         v-if="Advertising.posibilities && Advertising.posibilities.length != 0">
                                        <div><span style="font-weight: bold;">امکانات:</span></div>
                                        <div style="margin-top: 10px;">
                                            <span v-for="ad in Advertising.posibilities" :key="ad.id"
                                             class="box-activity-advetising box-activity-advetising-box-shadow box-activity-advetising-color box-activity-advetising-background">
                                            {{ad.title}}
                                            </span>
                                        </div>
                                    </div>
                                    <div style="margin-top: 15px;" class="col-md-12"
                                         v-if="Advertising.behavioralskills && Advertising.behavioralskills.length != 0">
                                        <div><span style="font-weight: bold;">مهارت های رفتاری:</span></div>
                                        <div style="margin-top: 10px;">
                                            <span v-for="ad in Advertising.behavioralskills" :key="ad.id"
                                                  class="box-activity-advetising box-activity-advetising-box-shadow box-activity-advetising-color box-activity-advetising-background">
                                                {{ad.title }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div style="margin-top: 20px;padding: 20px;" class="row">
                                    <h5 style="font-weight: bold;" class="mb-2 w-100">
                                        شرح شغل :</h5>
                                    <div class="mr-2 mt-2 advertsing-desc" style="font-size: 14px">
                                        <div v-html="Advertising.comment"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="similar-res mb-3">
                            <div class="mt-3 mb-2" v-if="AdvertisingSimilar.length != 0">
                                <h4>
                                    مشاغل مشابه
                                </h4>
                                <hr style="position: relative;width: 80%;right: 19%;color: #000; bottom: 15px">
                            </div>
                            <div class="row" >
                                <div  v-if="similarLoading" class="box-list-jobs p-3 col-6" style="padding: 15px !important;">
                                    <Vcl-facebook rtl ></Vcl-facebook>
                                </div>
                                <div  v-if="similarLoading" class="box-list-jobs p-3 col-6" style="padding: 15px !important;">
                                    <Vcl-facebook rtl ></Vcl-facebook>
                                </div>
                                <Box v-else  v-for="(List,index) in  AdvertisingSimilar " :key="index" :List="List" :User="Member" :index="index"></Box>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3 p-0 box-pad">
                        <div class="box-show-page" v-if="contentLoading">
                            <Vcl-list rtl></Vcl-list>
                        </div>
                        <div class="box-show-page-company" v-else>
                            <div>
                                <a v-if="!contentLoading" @click="openAd"
                                    class="box-form-header-company box-form-header-back-company mBox-company">
                                    <img v-if="ErrorImage"  src="/images/company/no-company.png" style="cursor: pointer"  :alt="Advertising.Company.name_fa">
                                    <img v-else :src="Advertising.Company.logo" style="cursor: pointer"  :alt="Advertising.Company.name_fa" @error="imageError">
                                    <div class="d-flex flex-column justify-content-center">
                                        <p class="my-1">
                                            {{Advertising.Company.name_fa}}
                                        </p>
                                        <p class="my-1">
                                            {{Advertising.Company.name_en}}
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="box-show-page mt-2" >
                            <div>
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
                                    <div v-if="memberRole == 'Member'" style="width: 90%;margin: auto;" class="mb-1"><vue-ranks></vue-ranks></div>
                                    <FormItem v-if="!$store.getters.HasSent(id) && memberRole == 'Member'">
                                        <div class="alert alert-primary mt-2 text-center" v-if="!uploading">
                                            کاربر گرامی، به صورت اتوماتیک رزومه ای که ساخته اید برای کارفرما ارسال میشود
                                            <br/>
                                            یا
                                            <span style="cursor: pointer" class="text-danger" @click="uploading = true">رزومه دیگری آپلود کنید</span>
                                        </div>
                                        <div v-if="form.file && uploading"
                                             style="display: flex; padding: 7px; border: 1px solid #f3f3f3;color: #505050 !important;-webkit-text-fill-color: #505050 !important;">
                                            <div>{{form.file}}</div>
                                            <div style="position: absolute;left: 10px;font-size: 20px ; cursor: pointer">
                                                <Icon type="ios-eye" style="cursor: pointer" @click="download"/>
                                                <Icon type="md-trash" style="cursor: pointer"  @click="removePdf" />
                                            </div>

                                        </div>
                                        <file-upload id="pdf"  v-if="uploading && !form.file " url="api/v1/Upload"
                                                     accept=".pdf"
                                                     btnLabel="رزومه خود را انتخاب کنید"
                                                     btnUploadingLabel="در حال آپلود"
                                                     @change="onFileChange"
                                                     ></file-upload>
                                        <span class="text-danger"
                                              v-if="error">{{error}}</span>

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
                                            <router-link :to="{name : 'RegisterLogin' ,  params : {type: 'Member'} , query : { advertising :Advertising.id }}">
                                                <span class="text-dark">شما با پروفایل کارفرما وارد شده اید برای ارسال رزومه با پروفایل کارجو وارد شوید</span>
                                            </router-link>
                                        </div>
                                        <div v-else-if="memberRole == 'Admin'" class="alert alert-danger mt-2">
                                           <span class="text-dark">شما با پروفایل ادمین وارد شده اید</span>
                                        </div>
                                        <div  v-else class="text-center  alert alert-danger text-dark mt-2">
                                            <router-link :to="{name : 'RegisterLogin' ,  params : {type: 'Member'} , query : { advertising :Advertising.id }}" class="text-dark">
                                                برای ارسال رزومه لطفا وارد شوید
                                            </router-link>
                                        </div>
                                    </div>
                                </Form>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 res-similar">
                        <div class="mt-3 mb-2" v-if="AdvertisingSimilar.length != 0">
                            <h6>
                                مشاغل مشابه
                            </h6>
                        </div>
                        <hr v-if="AdvertisingSimilar.length != 0" class="hr-title">
                        <div class="row" >
                            <div class="col-12" v-if="similarLoading" >
                                <div class="box-list-jobs p-3 col-12" style="padding: 15px !important;">
                                    <Vcl-facebook rtl ></Vcl-facebook>
                                </div>
                            </div>

                            <Box v-else  v-for="(List,index) in  AdvertisingSimilar " :key="index" :List="List" :User="Member" :index="index"></Box>
                        </div>
                    </div>
                    <div class="mobile-send-resume" >
                        <button @click="openAd"
                            class="w-50 d-flex justify-content-center align-items-center text-light bottom-section-right"> {{Advertising.Company.name_fa}} </button>
                        <button @click="modalMobile = true"
                                class="w-50 d-flex justify-content-center align-items-center text-light bottom-section-left">
                            ارسال رزومه
                        </button>
                    </div>

                </div>
            </div>
            <Modal v-model="modal" footer-hide>
                <Login></Login>
            </Modal>
            <Modal v-model="modalMobile" footer-hide>
                <div class="box-show-page" style="position: sticky; top:80px;margin: -25px;">
                    <div>
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
                            <div v-if="memberRole == 'Member'" style="width: 90%;margin: auto;" class="mb-1"><vue-ranks></vue-ranks></div>
                            <FormItem v-if="!$store.getters.HasSent(id) && memberRole == 'Member'">
                                <div class="alert alert-primary mt-2 text-center" v-if="!uploading">
                                    کاربر گرامی، به صورت اتوماتیک رزومه ای که ساخته اید برای کارفرما ارسال میشود
                                    <br/>
                                    یا
                                    <span style="cursor: pointer" class="text-danger" @click="uploading = true">رزومه دیگری آپلود کنید</span>
                                </div>
                                <div v-if="form.file && uploading"
                                     style="display: flex; padding: 7px; border: 1px solid #f3f3f3;color: #505050 !important;-webkit-text-fill-color: #505050 !important;">
                                    <div>{{form.file}}</div>
                                    <div style="position: absolute;left: 10px;font-size: 20px ; cursor: pointer">
                                        <Icon type="ios-eye" style="cursor: pointer" @click="download"/>
                                        <Icon type="md-trash" style="cursor: pointer"  @click="removePdf" />
                                    </div>

                                </div>
                                <file-upload id="pdf"  v-if="uploading && !form.file " url="api/v1/Upload"
                                             accept=".pdf"
                                             btnLabel="رزومه خود را انتخاب کنید"
                                             btnUploadingLabel="در حال آپلود"
                                             @change="onFileChange"
                                ></file-upload>
                                <span class="text-danger"
                                      v-if="error">{{error}}</span>

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
                                    <router-link :to="{name : 'RegisterLogin' ,  params : {type: 'Member'} , query : { advertising :Advertising.id }}">
                                        <span class="text-dark">شما با پروفایل کارفرما وارد شده اید برای ارسال رزومه با پروفایل کارجو وارد شوید</span>
                                    </router-link>
                                </div>
                                <div v-else-if="memberRole == 'Admin'" class="alert alert-danger mt-2">
                                    <span class="text-dark">شما با پروفایل ادمین وارد شده اید</span>
                                </div>
                                <div  v-else class="text-center  alert alert-danger text-dark mt-2">
                                    <router-link :to="{name : 'RegisterLogin' ,  params : {type: 'Member'} , query : { advertising :Advertising.id }}" class="text-dark">
                                        برای ارسال رزومه لطفا وارد شوید
                                    </router-link>
                                </div>
                            </div>
                        </Form>
                    </div>
                </div>
            </Modal>
        </div>
    </div>
</template>
<script>
import HeaderCompany from "../../includes/Home/HeaderShowPage.vue";
import Login from '../../Auth/advertising/login.vue'
import { required, helpers } from 'vuelidate/lib/validators';
import Box from './box'
import { VclFacebook, VclInstagram , VclCode , VclList , VueContentLoading } from 'vue-content-loading';
import codeLoading  from "../../Loading/codeLoading";
import rank from '../../includes/Member/ranks/ranks'

export default {
    components: {
        'HeaderCompany': HeaderCompany,
        Login,
        Box,
        VclList,
        VclFacebook,
        VclInstagram,
        VclCode,
        VueContentLoading ,
        codeLoading ,
        'vue-ranks' : rank
    },
    name: "SiteShowJob",
    metaInfo() {
        return {
            title: this.metaTitle,
            //     // all titles will be injected into this template
            titleTemplate: '%s - کاراول',
            meta: [{
                vmid: 'description',
                name: 'description',
                content: this.description,
            }]
        }
    },
    data() {
        return {
            metaTitle : undefined ,
            description : undefined,
            boxShare: false,
            modal: false,
            modal_loading: false,
            pdfUpload: '',
            ErrorImage : false ,
            form: {
                advertising: '',
                file: ''
            },
            modalMobile: false,
            messageType: 'alert-primary',
            uploading: false,
            contentLoading: false,
            similarLoading: false,
            list: [
                {
                    id: 1
                },
                {
                    id: 2
                },
                {
                    id: 3
                },
                {
                    id: 4
                },
                {
                    id: 5
                }
            ],
            error: '',
            options: {
                target: 'api/v1/fileupload',
                testChunks: false,
                singleFile: true,
                status: ''
            },
            attrs: {
                accept: 'image/*'
            },
            show: '',
            message: 'شما قبلا به این آگهی رزومه ارسال کرده اید',
            money: ''
        }
    },
    validations: {
        money: {
            required
        }
    },
    mounted() {
        this.contentLoading = true
        this.similarLoading = true
        this.$store.dispatch('LoadAdvertising', {id: this.$route.params.id})
            .then(response => {
                this.contentLoading = false
            });
        this.$store.dispatch('LoadAdvertisingSimilar', {id: this.$route.params.id})
            .then(response => {
                this.similarLoading = false
            })
        this.$store.dispatch('LoadMoneyList')

    },
    created() {
        document.addEventListener('click', this.documentClick)
    },
    destroyed() {
        document.removeEventListener('click', this.documentClick)
    },
    beforeRouteUpdate(to, from, next){
        this.$store.dispatch('LoadAdvertising', {id: to.params.id})
            .then(response => {
                this.contentLoading = false
            });
        this.$store.dispatch('LoadAdvertisingSimilar', {id: to.params.id})
            .then(response => {
                this.similarLoading = false
            })
        this.form.file = ''
        this.money = ''
        this.uploading = false
        next();
    },
    computed: {
        pathName() {
            var namee = this.Advertising.Company.name_en
            if(namee) {
                namee = namee.toLowerCase()
                namee = namee.replace(/\s/g, '-')
                return this.Advertising.Company.id + '-' + namee
            }
        },
        Member() {return this.$store.state.User.User},
        email() {
            if(this.memberRole == 'Member')
                if(this.Member)
                    return this.Member.member.email
        } ,
        image() {
            if(this.memberRole == 'Member')
                if(this.Member)
                    return this.Member.member.image
        },
        pdf() {
            // if(this.memberRole == 'Member')
            //     if(this.Member)
            //     {
            //         this.form.file = this.Member.member.file
            //         return this.Member.member.file
            //     }
            if(this.form.file) {
                return this.form.file
            }
        },
        mobile() {
            if(this.memberRole == 'Member')
                if(this.Member)
                    return this.Member.member.mobile
        },
        id() {
            if(this.memberRole == 'Member')
                if(this.Member)
                    return this.Member.member.id
        },
        Advertising() {return this.$store.state.AdvertisingSit.Advetising;},
        AdvertisingSimilar() {return this.$store.state.AdvertisingSit.AdvertisingSimilar;},
        memberRole() {return this.$store.getters.userRole},
        like() {
            if (this.memberRole == 'Member')
                return this.$store.getters.memberLikeAd(this.Member.member.id)
        },
        moneys () {
            return this.$store.state.Money.MoneyList
        }

    },
    methods: {
        openAd() {
            let routeUrl = this.$router.resolve({
                name: 'SiteShowCompany' ,
                params: {name: this.pathName}
            });
            window.open(routeUrl.href, '_blank');
        },
        imageError ()  {
            this.ErrorImage = true
        },
        documentClick(e){
            let el = this.$refs.shareBoxShow
            if(el){
                let target = e.target
                if ( el !== target && !el.contains(target))
                    this.boxShare = false
            }
        },
        shareTelegram() {
            let url = `https://telegram.me/share/url?url=${window.location.href}`
            window.open(url, "_blank");
        },
        sharewhatsapp(){
            let url = `https://api.whatsapp.com/send?text=${window.location.href}`
            window.open(url, "_blank");

        },
        download() {
            window.open(`pdfs/resume/${this.pdf}`, "_blank");
        },
        removePdf() {
          this.form.file = ''
          this.uploading = true
        },
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
        liked() {
            if (this.memberRole == 'Member') {
                this.$store.dispatch('LikeAdvertisings', {id: this.Advertising.id, member: this.Member.member.id})
                    .then(success => {
                        console.log(success)
                    }).catch(err => {
                    console.log(err)

                })
            } else if (this.memberRole == 'Company') {
                this.$notify({
                    group: 'foo',
                    width: '400px',
                    title: '  ',
                    text: 'شما با پروفایل کارفرما وارد شده اید',
                    duration: 1000,
                    speed: 1000,
                    closeOnClick: true,
                    classes: 'vue-notification success'
                });
            } else if (this.memberRole == 'Admin') {
                this.$notify({
                    group: 'foo',
                    width: '400px',
                    title: '  ',
                    text: 'شما با پروفایل ادمین وارد شده اید',
                    duration: 1000,
                    speed: 1000,
                    closeOnClick: true,
                    classes: 'vue-notification success'
                });
            } else {
                this.$notify({
                    group: 'foo',
                    width: '400px',
                    title: '  ',
                    text: 'لطفا ابتدا وارد شوید.',
                    duration: 1000,
                    speed: 1000,
                    closeOnClick: true,
                    classes: 'vue-notification success'
                });
            }

        },
        disliked() {
            this.$store.dispatch('dislikeAdvertisings', {id: this.Advertising.id, member: this.Member.member.id})
                .then(success => {
                    console.log(success)
                }).catch(err => {
                console.log(err)
            })
        },
        async sendResume() {
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
                this.modal_loading = true
                this.$confirm("آیا از ارسال رزومه خود اطمینان دارید؟").then(() => {
                    this.form.advertising = this.Advertising.id
                    this.form.money = this.money
                    this.$store.dispatch('sendResume', {form: this.form, id: this.Member.member.id})
                        .then(response => {
                            this.$fire({
                                title: '',
                                text: 'رزومه شما با موفقیت به این آگهی ارسال شد',
                                type: "success",
                                timer: 5000
                            }).then(r => {
                                console.log(r.value);
                            });
                            this.message = 'رزومه شما ارسال شد'
                            this.messageType = 'alert-success'
                        })
                        .catch(error => console.log(error))
                        .finally(() => this.modal_loading = false)
                }).catch(() => this.modal_loading = false)
        }

        }
    } ,
    watch  : {
        Advertising(){
            this.metaTitle = this.Advertising.title
            this.description = this.Advertising.comment
            this.$store.commit('SET_ROUTE' ,  { name : 'SiteShowJobIndex' , params: {id: this.Advertising.id}} )
        }
    }
}
</script>
<style>
.box-show-page-company  {
    min-width: 0;
    word-wrap: break-word;
    background-clip: border-box;
    padding: 15px;
    padding-right: 15px;
    padding-left: 15px;
    border-radius: .5rem
}

.box-show-page-company .mBox {
    margin-bottom: 40px;
    height: 80px;
     display : flex ;
    justify-content: flex-start;
}
.box-show-page-company .mBox-company {
    height: 100px;
    display : flex ;
    justify-content: flex-start;
}
.box-show-page-company .box-form-header-company img {
    height : 80px ;
    width : 80px ;
    margin : 10px ;
    border-radius : 50% ;
    background: #fff;
}
.box-show-page-company p {
    color : #fff ;
    margin-right : 10px
}
:root {
    --var-txt-color: #c1d32f;
    --var-advertising-feature-box-color: #2d8cf0;
    --var-box-header-send-resume-background : linear-gradient(to right, #2c3e50, #3498db);
    --var-webkit-box-header-send-resume-background : -webkit-linear-gradient(to right, #2c3e50, #3498db);
    --var-advertising-feature-background : rgba(147, 198, 243, 0.46) ;
    --var-title-send-resume : #1e88e5;
}

#test {
    color: var(--var-txt-color);
}

.ivu-icon {
    cursor: pointer;
}
.label-desc {
    background: lightcoral;
    text-align: center;
    color: #fff;
    margin: 5px auto;
    padding: 5px 0
}

.box-show-page {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, .12), 0 2px 4px 0 rgba(0, 0, 0, .08);
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid transparent;
    padding: 15px;
    padding-right: 15px;
    padding-left: 15px;
    border-radius: .5rem
}

.title-advertising-show-page {
    font-size: 18px;
}

.box-activity-advetising {

    display: inline-block;
    line-height: 1;
    vertical-align: baseline;
    margin: 0 .15384615em;
    background-image: none;
    padding: .5833em .833em;
    text-transform: none;
    font-weight: 700;
    border: 0 solid transparent;
    border-radius: .30769231rem;
    -webkit-transition: background .1s ease;
    transition: background .1s ease;

}
.box-activity-advetising-box-shadow{
    box-shadow: 0 -2px 1px var(--var-advertising-feature-box-color) inset;
}
.box-activity-advetising-color{
    color: var(--var-advertising-feature-box-color);
}
.box-activity-advetising-background{
    background-color: var(--var-advertising-feature-background) !important;
}
.uploader-example {

    padding: 15px;
    margin: 40px auto 0;
    font-size: 12px;
    box-shadow: 0 0 10px rgba(0, 0, 0, .4);
}

.uploader-example .uploader-btn {
    margin-right: 4px;
}

.uploader-example .uploader-list {

    overflow: auto;
    overflow-x: hidden;
    overflow-y: auto;
}

.ivu-btn.disabled, .ivu-btn.disabled.active, .ivu-btn.disabled:active, .ivu-btn.disabled:focus, .ivu-btn.disabled:hover, .ivu-btn[disabled], .ivu-btn[disabled].active, .ivu-btn[disabled]:active, .ivu-btn[disabled]:focus, .ivu-btn[disabled]:hover, fieldset[disabled] .ivu-btn, fieldset[disabled] .ivu-btn.active, fieldset[disabled] .ivu-btn:active, fieldset[disabled] .ivu-btn:focus, fieldset[disabled] .ivu-btn:hover {

    background-color: #cde5fa !important;
    border-color: #cde5fa !important;
    color: #fff !important;
}

.ivu-input[disabled], fieldset[disabled] .ivu-input {
    color: #505050 !important;
}
.ivu-input[disabled]::placeholder , .ivu-select-input[disabled]::placeholder{
    color: #505050 !important;
    -webkit-text-fill-color: #505050 !important;
}
.box-form-header {
    margin: -15px;
    height:60px;
    margin-bottom: 20px;
    border-top-left-radius: .5rem;
    border-top-right-radius: .5rem;
    display: flex;
    justify-content: center;
}
.box-form-header-company {
    margin: -15px;
    height: 100px;
    border-radius: .5rem;
    display: flex;
    justify-content: center;
}

.box-form-header-back {
    background: var(--var-webkit-box-header-send-resume-background);
    background: var(--var-box-header-send-resume-background);
}
.box-form-header-back-company {
    background: #1e88e5;
}
.box-form-header img{
    width: 100px;
    height: 100px;
    border-radius: 50%;
    margin-top: 30px;
    border: 1px solid #b3b3b3 ;
    background: #ececee;
}
.file-upload .input-wrapper {

    background-color: #fff !important;
    height: 62px !important;
    border: 1px dashed !important;
}
.file-upload .input-wrapper .file-upload-label .file-upload-icon {
    font-size: 30px !important;
}
.file-upload .input-wrapper .file-upload-label {
    color: #000 !important;
}
.mBox  {
    margin-bottom: 50px;
    height: 95px;

}
.res-similar  {
    display:  none;
}
.advertsing-desc{
    font-size: 14px;
}
.advertsing-desc li {
    margin-bottom: 5px;
}
.advertsing-desc p{
    line-height: 30px;
}
.advertsing-desc h4{
    padding: 10px 0;
}
.hr-title{
    position: relative;
    width: 77%;
    right: 23%;
    color: #000;
    bottom: 40px
}
.similar-box-title {
    border-radius: .5rem;
    background: #fff;
    padding: 10px;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,.12), 0 2px 4px 0 rgba(0,0,0,.08);
}
.box-list-jobs {
    margin-bottom: 10px;
}
.mobile-send-resume {
    display: none !important;

}
.box-icon-jo{
    font-size: 24px;
}
.box-icon-j{
    font-size: 27px;
    display: flex;
    justify-content: center;
}
.share-icones {
    padding: 15px;
    position: absolute;
    left: 15px;
    box-shadow: rgb(230, 230, 230) 0px 1px 4px;
    border: 1px solid rgb(230, 230, 230);
    background: rgb(255, 255, 255) none repeat scroll 0% 0%;
    border-radius: 4px;
    z-index: 700;
    top : 35px
}
.arrow-box {
    position: absolute;
    left: 0px;
    transform: translate(48px);
    clip: rect(0px, 18px, 14px, -4px);
    top: -14px;
}
.arrow-box::after {
    content: "";
    box-shadow: rgb(117, 117, 117) -1px -1px 1px -1px;
    width: 14px;
    height: 14px;
    transform: rotate(45deg) translate(6px, 6px);
    background: rgb(255, 255, 255) none repeat scroll 0% 0%;
    display: block;
}
@media screen and (max-width: 990px){
    .similar-res {
        display: none;
    }
    .res-similar {
        display: block;
    }
    .box-pad{
        padding: 0 15px !important;
    }
    .hr-title{
        position: relative;
        width: 83%;
        right: 15%;
        color: #000;
        bottom: 15px
    }
}


@media screen and (max-width: 768px){
    .mobile-send-resume {
        position: fixed !important;
        display: flex !important;
        right: 0;
        bottom: 0;
        height: 45px;
        width: 100%;
        background: #1e88e5;
        align-items: center;
        z-index: 999;
    }
    .bottom-section-right {
        border-left: 1px solid #eee;
        height: 100%;
    }
    .bottom-section-left {
        border-right: 1px solid #eee;
        height: 100%;
    }
    .mobile-send-button {
        width: 50px;
        height: 50px;
        border-radius: 50% !important;
        display: flex !important;
        justify-content: center;
        align-items: center;
        font-size: 25px;
        color: #fff;
    }
    .mobile-send-button:hover .ivu-icon.ivu-icon-ios-share-outline{
        display: none;
        transition: display 1s ease;
    }
    .mobile-send-button:hover .ivu-icon.ivu-icon-ios-share{
        display: block;
        -ms-transform: scale(1.4,1.4);
        transform: scale(1.4,1.4);
        transition: transform 1s ease;
    }
    .ivu-icon.ivu-icon-ios-share {
        display: none;
    }
    .send-mobile-title{

        color: #fff;
        padding: 5px;
        margin-bottom: 15px;
        margin-left: 10px;
        border-radius: 5px;
        animation: MoveUpDown 2s linear infinite;
    }
    .mobile-send-button-background {
        background: var(--var-title-send-resume);
    }
    @keyframes MoveUpDown {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-20px);
        }
    }
    .send-mobile-title::after
   {
        content: " ";
        position: absolute;
        border-top: 8px solid var(--var-title-send-resume);
        border-right: 8px solid transparent;
        border-left: 8px solid transparent;
        border-bottom: none;
        top: 32px;
        right: 20px;

    }
    .ivu-icon.ivu-icon-ios-share-outline {
        border: 1px solid #fff;
        padding: 8px;
        border-radius: 50%;
    }
    .box-icon-j .ivu-icon.ivu-icon-ios-share-outline  {
        padding: 0 !important
    }

    .box-pad {
        display: none;
    }
    .hr-title {
        display: none;

    }
    .ivu-modal-close .ivu-icon-ios-close {
        color: #000 !important;
    }
    .ivu-modal-body {
        padding: 0px !important;
    }
}
</style>
