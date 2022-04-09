<template>
    <div>
        <div>
            <HeaderCompany :Company="Company" :loading="laoding"></HeaderCompany>
            <div class="col-12 col-md-8 m-auto">
                <div class="box-list-job" v-if="laoding">
                    <contentLoading></contentLoading>
                </div>
                <div class="box-list-job" v-if="!laoding && Company.comment">
                    <h5 style="font-size: 16px">معرفی شرکت</h5>
                    <p class="text-right my-2">
                        {{ Company.comment }}
                    </p>

                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="box-list-job" v-if="laoding">
                           <contentLoading></contentLoading>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="box-list-job" v-if="laoding">
                            <contentLoading></contentLoading>
                        </div>
                    </div>
                    <div class="col-md-6" v-if="!laoding && Company.address_site">
                        <div class="box-list-job" >
                            <h5 style="font-size: 16px">آدرس سایت </h5>
                            <p class="text-left my-2">
                                <a :href="Company.address_site" target="_blank"> {{ Company.address_site }} </a>
                            </p>

                        </div>
                    </div>
                    <div class="col-md-6" v-if="!laoding && Company.Employee_count">
                        <div class="box-list-job semi-company"  style="flex-direction: inherit">
                            <div class="col-6">
                                <h5 style="font-size: 16px"> سال تاسیس</h5>
                                <p class="text-right my-2">
                                    {{ Company.year }}
                                </p>
                            </div>
                            <div class="col-6">
                                <h5> تعداد پرسنل </h5>
                                <p class="text-right my-2">
                                    {{ Company.Employee_count }}
                                    نفر
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
                <div>
                    <div class="my-4 mb-2">
                        <h4 >
                            فرصت های شغلی
                        </h4>
                        <hr class="hr-res" >
                    </div>
                    <loading-box v-if="laoding"></loading-box>
                    <show v-else v-for="(List,index) in  Company.advertisings "
                           :key="index" :List="List" :User="User" :index="index">
                    </show>
                </div>

            </div>

        </div>
    </div>
</template>
<script>
import HeaderCompany from "./header";
import Login from '../../Auth/Login'
import show from './show'
import loadingBox from "../../Loading/advertisingBoxLoading";
import { VueContentLoading } from 'vue-content-loading';
import { required, helpers } from 'vuelidate/lib/validators';
import contentLoading from '../../Loading/companyContentLoading'
export default {
    components: {'HeaderCompany': HeaderCompany, contentLoading ,  Login , show , loadingBox , VueContentLoading},
    name: "SiteShowJob",
    metaInfo() {
        return {
            title: this.metaTitle,
            //     // all titles will be injected into this template
            titleTemplate: '%s - سامانه کاریابی و گردشگری - کاراول ',
            meta: [{
                vmid: 'description',
                name: 'description',
                content: this.description,
            }]
        }
    },
    data() {
        return {
            laoding : false ,
            metaTitle : 'سامانه کاریابی و گردشگری' ,
            description : ''
        }
    },
    mounted() {
        this.laoding = true
        console.log(this.laoding)
        let id = this.$route.params.name.split('-')
        this.$store.dispatch('LoadSiteCompany' , {id : id[0]}).then(response => {this.laoding = false});
    },
    computed: {
        Company() { return this.$store.state.SiteCompany.siteCompanies },
        User(){ return this.$store.state.User.User;},
    },
    watch :{
        Company()  {
            this.metaTitle = this.Company.name_fa
            this.description = this.Company.comment
        }
    }
}
</script>
<style scoped>
.hr-res  {
    position: relative;width: 75%;right: 24%;color: #000; bottom: 15px
}
.semi-company div:first-child::before
    {
        content: "";
        position: absolute;
        left: 10px;
        z-index: 100;
        top: 15%;
        width: 1px;
        height: 70%;
        background: #c6c6c678;
    }
.box-list-job {
    box-shadow: 0 4px 8px 0 rgba(0,0,0,.12), 0 2px 4px 0 rgba(0,0,0,.08);
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid transparent;
    border-radius: .5rem;
    padding: 15px;
    margin-top: 25px !important;
    position: relative;
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
@media screen and (max-width: 992px) {

    .hr-res  {
        display: none;
    }
}
@media screen and (max-width: 759px) {
    .v-navigation-drawer__content {
        right: -264px;
    }

    .btn-menu-re {
        display: flex !important;
    }
    .hr-res  {
        display: none;
    }
}
</style>
