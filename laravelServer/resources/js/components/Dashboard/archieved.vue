<template>
    <div>
        <div>
            <div>
                <div class="row">
                    <div class=" col-6 ">
                        <h2 class="panel-title">لیست آگهی های غیر فعال </h2>
                    </div>
                    <div class=" col-6 ">
                        <Button class="col-md-3 col-8 " style="float: left;" type="primary"><router-link to="/posts/create" style="color: #fff;" ><Icon style="font-size: 19px;font-weight: bold;" type="md-add" />ثبت آگهی</router-link></Button>
                    </div>
                    <div class="col-md-2 mt-3">
                        <Button @click="emptySelected()" :class="{ allBtnColored: all }"
                                style="height: 50px">همه </Button>
                    </div>
                    <div class="col-12 col-md-5 mt-3" >
                        <v-select
                            class="style-chooser multi-style-chooser"
                            placeholder="فیلتر بر اساس دسته بندی شغلی"
                            label="title" :options="jobs"
                            v-model="jobSelected"
                            :reduce="d => d.id"
                            multiple
                            @input="getselected"
                            taggable>
                        </v-select>
                    </div>
                    <div class="col-12 col-md-5 mt-3" >
                        <Input size="large" v-model="search" search enter-button placeholder="جستجو در عنوان آگهی" />
                    </div>
                </div>
                <loading :active.sync="loading"
                         :is-full-page="fullPage"></loading>
                <loading :active.sync="isLoading"
                         :is-full-page="fullPage"></loading>
                <div >
                    <div v-if="AdvertisingsBoxList.length == 0 && !loading && !isLoading">
                        <div class="box-A text-center text-danger" >
                            نتیجه ای یافت نشد
                        </div>

                    </div>
                    <advertisings-box v-for="(Advertisings,index) in AdvertisingsBoxList" :key="index" :Advertisings="Advertisings" ></advertisings-box>
                </div>
            </div>
        </div>
    </div>
</template>
<script>

import AdvertisingsBox from './archieveBox'
import Loading from 'vue-loading-overlay';
// Import stylesheet
import 'vue-loading-overlay/dist/vue-loading.css';
import vSelect from 'vue-select'
import 'vue-select/dist/vue-select.css';

export default {
    components: {'AdvertisingsBox': AdvertisingsBox , Loading , vSelect},
    data(){
        return {
            loading : false ,
            isLoading : false,
            jobSelected :  [],
            fullPage: false  ,
            search : ''  ,
            all : true
        }
    },
    mounted() {
        this.Authorized();
    },
    methods: {

        getselected() {
            this.isLoading = true
            setTimeout(() => {
                this.isLoading = false
            },1000)
        },
        emptySelected () {
            this.jobSelected = []
            this.search = ''
            this.all = true
        }

    },
    created() {
        this.loading = true
        this.$store.dispatch('LoadStatus');
        this.$store.dispatch('LoadArchieveAdvertizing')
            .then(res => {
                this.loading = false
            })
    } ,
    computed : {
        User(){ return this.$store.state.User.User;},
        jobs ()  { return this.$store.state.Company.CompanyJobs },
        AdvertisingsBoxList() { return  this.$store.getters.archieveSelectedJobsAds(this.jobSelected , this.search)},

    } ,
    watch :{
        User () {
            this.$store.dispatch('loadCompanyJobs' , {id : this.User.Company.id})
        } ,
        jobSelected () {
            if(this.jobSelected.length != 0 )
                this.all = false
            if(this.jobSelected.length == 0 && this.search == '' )
                this.all = true

        } ,
        search() {
            if(this.search != '')
                this.all = false
            if(this.jobSelected.length == 0 && this.search == '' )
                this.all = true
        }
    }

}
</script>
<style scoped>
.allBtnColored {
    background: #2d8cf0 !important;
    border-color: #2d8cf0 !important;
    color: #fff !important;
}
.ivu-input {

    border-radius: 0px 4px 4px 0px !important;
}
.ivu-input-group-append, .ivu-input-group > .ivu-input:last-child {
    border-bottom-left-radius: 4px !important;
    border-top-left-radius: 4px !important;
}
.ivu-input-search::before {

    right: -1px !important;
    background: inherit;
}
.ivu-input-group-append, .ivu-input-group-prepend {

    border-radius: 4px 0px 0px 4px !important;
}
.box-A{
    background: #fff;
    background-color: rgb(255, 255, 255);
    background-clip: border-box;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,.12), 0 2px 4px 0 rgba(0,0,0,.08);
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid transparent;
    border-radius: .5rem;
    padding: 15px;
    margin-top: 16px!important;
}

.box-icon{
    font-size: 18px;
    margin-left: 10px;
    color: #908d8d;
}
.box-show{
    padding: 10px;
    cursor: pointer;
}

.vld-icon svg {
    stroke: #2d8cf0 !important;
}
.ivu-input-group-large .ivu-input  {
     height : 50px !important
}
.ivu-input-group-large  {
    height : 50px !important
}
.ivu-input-group-large .ivu-input, .ivu-input-group-large > .ivu-input-group-append, .ivu-input-group-large > .ivu-input-group-prepend{
     height : 50px !important
}
</style>

