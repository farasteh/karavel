<template>
    <div>
        <div class="">
            <section :style="{'background-image': 'url(' + Company.banner + ')'}"
                class="box-header-home">
                <div style="height:70px"></div>
                <div class="box-search-header box-search-header-background box-search-header-color">
<!--                    <div class="col-10 row box-head-res">-->
<!--                        <vue-content-loading rtl :width="300" :height="100" v-if="loading" class="mt-3 desk-loading">-->
<!--                            <circle cx="20" cy="20" r="20" />-->
<!--                            <rect x="50" y="10" rx="5" ry="5" width="30" height="5" />-->
<!--                            <rect x="50" y="20" rx="5" ry="5" width="30" height="5" />-->
<!--                        </vue-content-loading>-->
<!--                        <vue-content-loading rtl :width="300" :height="100" v-if="loading" class="mt-3 mobile-loading">-->

<!--                            <circle cx="150" cy="28" r="28"  />-->
<!--                            <rect x="100" y="60" rx="3" ry="3" width="100" height="8" />-->
<!--                            <rect x="100" y="80" rx="3" ry="3" width="100" height="8" />-->

<!--                        </vue-content-loading>-->
<!--                        <div class="header-image-show-page" v-if="!loading">-->

<!--                            <img :src="Company.logo" :alt="Company.name_fa">-->
<!--                        </div>-->
<!--                        <div class="box-header-text" v-if="!loading">-->
<!--                            <router-link :to="{name : 'SiteShowCompany' , params : {name : pathName } }" >-->
<!--                                <div class="col-12"><span class="text-light"> {{Company.name_fa}} ( {{Company.name_en}} ) </span></div>-->
<!--                            </router-link>-->
<!--                            <div style="font-size: 13px;padding: 10px;" class="col-12">-->
<!--&lt;!&ndash;                                <span style="margin-left: 15px;">{{Company.Activity.title}}</span>&ndash;&gt;-->
<!--                                <span  style="margin-left: 15px;" v-if="Company.Employee_count">-->
<!--                                    {{Company.Employee_count}}-->
<!--                                    <span>نفر</span>-->
<!--                                </span>-->
<!--                                <span>{{Company.site}}</span>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
                </div>
            </section>
        </div>
    </div>
</template>
<script>
import { VueContentLoading } from 'vue-content-loading';
    export default {
        components : {VueContentLoading} ,
        props: ['Company' , 'loading'],
        computed : {
            pathName() {
                console.log(this.Company)
                var namee = this.Company.name_en
                if(namee) {
                    namee = namee.toLowerCase()
                    namee = namee.replace(/\s/g, '-')
                    return this.Company.id + '-' + namee
                }
            },
        }
    }
</script>
<style>
:root {
    --var-box-search-header-background: #00000078;
    --var-box-search-header-color: #fff;
}
.box-header-home{
        background-image: url("/images/header.jpg");
        background-size: cover;
        box-shadow: inset 0 0 90px -20px rgba(12, 13, 13, 0.9);
        background-position: center;
}
.box-search-header{
    height:  176px;
    font-size: 18px;
    display: flex !important;
    align-items: center !important;
    justify-content: center;
    flex-wrap: wrap
}
.box-search-header-background {
    background: var(--var-box-search-header-background);
}
.box-search-header-color{
    color: var(--var-box-search-header-color);
}
/*.ivu-select-large.ivu-select-single .ivu-select-selection {*/
/*    height: 47px !important;*/
/*}*/
/*.ivu-select-large .ivu-select-input {*/
/*    height: 45px !important;*/
/*}*/
.loadin-select-search{
    display: flex;
    position: absolute;
    z-index: 99;
    left: 0;
    left: 95px;
    top: 10px;
}
.header-image-show-page{
    width: 150px;
    height: 150px;
}
.header-image-show-page img{
    width: 100%;
    height: 100%;
    border-radius: 50%;
    box-shadow: 1px 1px 5px 1px #07010163;
}
.box-header-text{
    margin-top: 39px;
    margin-right: 13px;
}
.mobile-loading : {
    display: none;
}
@media only screen and (max-width: 600px) {
    .header-image-show-page {
        width: 100px;
        height: 100px;
    }
    .box-head-res {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 15px 0;
    }
    .box-search-header {
        height: auto;
    }
    .box-header-text {
        margin-top: 10px;
        margin-right: 0;
    }
    .desk-loading { display: none}
}
</style>
