<template>
    <div>
        <Search ></Search>
        <div class="col-lg-11 col-12 mt-5 container">
            <div class="row">
                <div class="col-md-8">
                    <ul class="nav filter-date">
                        <li class="nav-item" >
                            <span @click="TodayFilter" class="nav-link_list ml-2 "
                                  :class="{'active-list' : activeDate == 'today'}">
                                <v-icon-today height="15px" width="18px" />
                                <span style="margin-right: 5px;">امروز</span>
                            </span>
                        </li>
                        <li class="nav-item">
                            <span @click="YesterdayFilter" class="nav-link_list ml-2"
                                  :class="{'active-list' : activeDate == 'yesterday'}">
                                <v-icon-yesterday height="15px" width="18px" />
                                <span style="margin-right: 5px;">دیروز</span>
                            </span>
                        </li>
                        <li class="nav-item">
                            <span @click="weekFilter" class="nav-link_list ml-2"
                                  :class="{'active-list' : activeDate == 'week'}">
                                <v-icon-week height="15px" width="18px" />
                                <span style="margin-right: 5px;">هفته</span>
                            </span>
                        </li>
                        <li class="nav-item">
                            <span @click="monthFilter" class="nav-link_list ml-2"
                                  :class="{'active-list' : activeDate == 'month'}">
                                <v-icon-month height="15px" width="18px" />
                                <span style="margin-right: 5px;">ماه</span>
                            </span>
                        </li>
                    </ul>
                    <div class="jobs-home-box mb-2">
                      <homeDateBoxLoading v-if="loading"></homeDateBoxLoading>
                      <div v-else class="row">
                          <div v-if="advertisings.length == 0" class="col-12 text-center text-primary py-2">در این بازه زمانی هیج آگهی ثبت نشده.</div>
                          <v-box-date v-else v-for="(ad , index) in advertisings" :key="index" :advertising="ad"></v-box-date>
                      </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="nav">
                        <li class="nav-item"><span class="nav-link_list ml-2 active-list">آگهی های ویژه</span></li>
                    </ul>
                    <div class=" jobs-home-box">
                        <homeBoxLoading v-if="loading"></homeBoxLoading>
                        <v-box-new v-else v-for="(ad , index) in topAdvertisings" :key="index" :advertising="ad"></v-box-new>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-4 pattern-3 jobs-category">
            <div class="col-11  pt-4 pb-5 container">
                <div class="row match-my-cols">
                    <v-box-job-image v-for="(job , index) in jobs" :key="index" :job="job"></v-box-job-image>
                </div>
            </div>
        </div>
        <div class="mt-4">
            <div style="margin: auto;" class="row col-md-11 container">
                <div class="col-12 col-md-6 mt-2">
                    <div class="jobs-home-box">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="text-center img-karjo-karfarma m-auto">
                                    <img  src="../../../images/karfarma.jpg" alt="karfarma">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="text-justify mt-4" style="min-height: 175px;">
                                    <h5 class="pb-4"> کارمند مورد نظر خود را پیدا کنید:</h5>
                                    <p>
                                    کاراول بصورت کاملا هوشمند به شما این امکان را می دهد تا بتوانید کارمندان متخصص پیدا کنید. کاراول بصورت دقیق کارمندانی را براساس شغلی که آگهی کرده اید به شما معرفی می کند.
                                    </p>
                                    <div class="mt-3 btn btn-primary btn-lg">
                                        <router-link class="text-light" :to="{name :'companyPage' }">
                                            شروع کنید
                                        </router-link>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 mt-2">
                    <div class="jobs-home-box">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="text-center img-karjo-karfarma m-auto"><img style="width: 100%; height: 100%;" src="../../../images/karjo.jpg" alt="karjo"></div></div>
                            <div class="col-md-12">
                                <div class="text-justify mt-4" style="min-height: 175px;">
                                    <h5 class="pb-4"> شغل مورد نظر خود را پیدا کنید: </h5>
                                    <p>
                                        کاراول به شما کمک می کند تا یک شغل مناسب با توجه به توانایی خودتان در صنعت گردشگری پیدا کنید. این سامانه مجهز به جستجوگر هوشمند می باشد که به صورت هدفمند کارمند و کارفرما را به هم متصل کند.
                                    </p>
                                    <div class="mt-3 btn btn-primary btn-lg">
                                        <router-link class="text-light" :to="{name :'resume' }">
                                            شروع کنید
                                        </router-link>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-4 jobs-category">
            <div class="py-4 container">
                <v-counter-box :count="counts"></v-counter-box>
            </div>
        </div>

    </div>
</template>
<script>
import Search from "../includes/Home/HeaderSearch.vue";
import BoxDate from "./BoxListHome";
import BoxNewListHome from "./BoxNewListHome";
import BoxImageJobHome from "./BoxImageJobHome";
import today from "../icon/today";
import yesterday from "../icon/yesterday";
import month from "../icon/month";
import week from "../icon/week";
import homeBoxLoading from "../Loading/homeBoxLoading";
import homeDateBoxLoading from "../Loading/homeDateBoxLoading";
import moment from 'moment'
import  counterBox from  './counterBox'
import axios from "axios";

export default {
    name : 'Home',
    metaInfo() {
        return {
            title: '',
            titleTemplate: ' سامانه کاریابی در گردشگری - کاراول',
            meta: [{
                vmid: 'description',
                name: 'description',
                content: 'کارمند مورد نظر خود را پیدا کنید ، کاراول بصورت کاملا هوشمند به شما این امکان را می دهد تا بتوانید کارمندان متخصص پیدا کنید. کاراول بصورت دقیق کارمندانی را براساس شغلی که آگهی کرده اید به شما معرفی می کند . شغل مورد نظر خود را پیدا کنید، کاراول به شما کمک می کند تا یک شغل مناسب با توجه به توانایی خودتان در صنعت گردشگری پیدا کنید. این سامانه مجهز به جستجوگر هوشمند می باشد که به صورت هدفمند کارمند و کارفرما را به هم متصل کند.',
            }]
        }
    },
    data() {
        return {
            loading  : false ,
            date : '' ,
            date2 : '' ,
            activeDate :  'today' ,
            counts : ''
        }
    },
    components : {
        'Search'           : Search ,
        'v-icon-today'     : today ,
        'v-icon-yesterday' : yesterday ,
        'v-icon-week'      : week ,
        'v-icon-month'     : month ,
        'v-box-date'       : BoxDate ,
        'v-box-new'        : BoxNewListHome,
        'v-box-job-image'  : BoxImageJobHome,
        'v-counter-box'    : counterBox ,
        homeBoxLoading  , homeDateBoxLoading
    },
    created() {
        this.loading  = true
        //this.$store.dispatch('LoadAdJobs').then(response =>  { this.showJob = false})
        this.$store.dispatch('LoadAdvertisingList').then(response => { this.loading  = false})
        this.date = this.todayIs
        this.getCount()
    } ,
    computed : {
        advertisings() { return this.$store.getters.filterDate(this.date , this.date2)} ,
        jobs() {return  this.$store.state.Job.adJobs},
        topAdvertisings()  { return this.$store.getters.getSpecialAdvertising  },
        todayIs() {return  moment().format('YYYY-MM-DD');},
        yesterdayIs() {return moment().add(-1 ,'day').format('YYYY-MM-DD');},
        towdays() {return  moment().add(-2 ,'day').format('YYYY-MM-DD');},
        weeks() {return moment().add(-7 ,'day').format('YYYY-MM-DD');},
        oneWeek() {return moment().add(-8 ,'day').format('YYYY-MM-DD');},
        month() {return moment().add(-20 ,'day').format('YYYY-MM-DD');},
    } ,
    methods  : {
        getCount() {
            axios.get('api/v1/getCountData')
                .then(response => {
                    this.counts = response.data
                })
        },
        YesterdayFilter(){
            this.activeDate  = 'yesterday'
            this.date = this.yesterdayIs
            this.date2 = ''
        },
        TodayFilter(){
            this.activeDate  = 'today'
            this.date = this.todayIs
            this.date2 = ''
        },
        weekFilter()  {
            this.activeDate  = 'week'
            this.date = this.towdays
            this.date2 = this.weeks
        } ,
        monthFilter() {
            this.activeDate  = 'month'
            this.date = this.oneWeek
            this.date2 = this.month
        },

    }
}
</script>
<style>

.img-karjo-karfarma {
    max-width: 400px;
    height: 300px;
}
.img-karjo-karfarma img  {
    width: 100%; height: 100%; object-fit: contain;
}
.is-table-row {
    display: table;
}
.is-table-row [class*="col-"] {
    float: none;
    display: table-cell;
    vertical-align: top;
}
.row.match-my-cols {
    overflow: hidden;
}
.row.match-my-cols [class*="col-"]{
    margin-bottom: -99999px;
    padding-bottom: 99999px;
}
.row.is-flex {
    display: flex;
    flex-wrap: wrap;
}
.row.is-flex > [class*='col-'] {
    display: flex;
    flex-direction: column;
}

@media screen and (max-width:992px){
    .jobs-category{
        display: none;
    }
}
@media screen and  (min-width:769px) and (max-width:812px) {
    .filter-date .nav-item .nav-link_list{
        width: 90px;
    }
}
@media screen and (max-width: 542px){
    .filter-date .nav-item .nav-link_list{
        width: 110px;
    }
}
@media screen and (max-width: 501px){
    .filter-date .nav-item .nav-link_list{
        width:90px;
    }
}
@media screen and (max-width: 421px) {
    .filter-date .nav-item .nav-link_list {
        width: 65px;
        margin-left: 0 !important;
    }
}
</style>
