<template>
    <div>
        <Search @setfilter="filteredAdvertisings"></Search>
        <div>
            <div class="container row px-0 py-3 m-auto">
                <div   class="mobile-filter">

                    <div v-if="showFilter" class="fixed-filter-box instant-filter-box" >
                        <div class="box-header-fiter box-header-fiter-color text-center">
                            <span v-if="filteredData">{{filteredData.length}}</span>
                            فرصت شغلی یافت شد .
                        </div>
                        <div class="box-filter-job">
                            <div class="filter-buttons">
                                <Button @click="newlySort()"
                                        :class="{ allBtnColored: all }">
                                    جدیدترین
                                </Button>
                                <Button @click="moneySort()"
                                        :class="{ allBtnColored: !all }"
                                        style="height: 42px; margin: 0 10px;">  بیشترین حقوق

                                </Button>
                            </div>
                            <Collapse class="p-2" v-model="mvalue1"  simple>
                                <Panel name="1">
                                    سابقه کار
                                    <p class="color-text-filter" slot="content">
                                        <CheckboxGroup size="large" v-model="historyFilter"
                                                       @on-change="filteredAdvertisings">
                                            <Checkbox v-for="(History,index) in HistoryList"
                                                      :key="index" size="large" style="width: 100%;"
                                                      :label="History.id" border>
                                                {{History.title}}
                                            </Checkbox>
                                        </CheckboxGroup>
                                    </p>
                                </Panel>
                            </Collapse>
                            <Collapse class="p-2" v-model="mvalue2" simple>
                                <Panel name="2">
                                    نوع قرارداد
                                    <p class="color-text-filter" slot="content">
                                        <CheckboxGroup size="large" v-model="CooperationFilter"
                                                       @on-change="filteredAdvertisings">
                                            <Checkbox v-for="(CooperationType,index) in CooperationType"
                                                      :key="index" size="large" class="w-100"
                                                      :label="CooperationType.id" border>
                                                {{CooperationType.title}}
                                            </Checkbox>
                                        </CheckboxGroup>
                                    </p>
                                </Panel>
                            </Collapse>
                            <Collapse class="p-2" v-model="mvalue3" simple>
                                <Panel name="3">
                                    میزان حقوق
                                    <p class="color-text-filter" slot="content">
                                        <CheckboxGroup size="large" v-model="moneyFilter"
                                                       @on-change="filteredAdvertisings">
                                            <Checkbox v-for="(money,index) in MoneyList" :key="index"
                                                      size="large" class="w-100" :label="money.id" border>
                                                {{money.title}}
                                            </Checkbox>
                                        </CheckboxGroup>
                                    </p>
                                </Panel>
                            </Collapse>
                            <Collapse class="p-2" v-model="mvalue4" simple>
                                <Panel name="4">
                                    استان
                                    <p class="color-text-filter" slot="content">
                                        <CheckboxGroup size="large" v-model="provinceFilter"
                                                       @on-change="filteredAdvertisings">
                                            <Checkbox v-for="(province,index) in ProvincesList" :key="index"
                                                      size="large" class="w-100" :label="province.id" border>
                                                {{province.title}}
                                            </Checkbox>
                                        </CheckboxGroup>
                                    </p>
                                </Panel>
                            </Collapse>
                        </div>
                    </div>

                    <div class="mobile-send-resume" @click="showFilter = !showFilter" >
                        <button v-if="!showFilter"
                                class="w-100 d-flex justify-content-center align-items-center text-light">
                            جستجوی پیشرفته
                        </button>
                        <button v-if="showFilter"
                                class="w-100 d-flex justify-content-center align-items-center text-light">
                            اعمال جستجو
                        </button>
                    </div>
                </div>

                <div class="col-12 col-lg-9">
                    <loaidngBox  v-if="LoadingBox"></loaidngBox>
                    <div v-else>
                        <div class="box-list-jobs-info mb-4 mt-3" v-if="filteredData.length == 0 ">
                            <p class="p-3 text-center ">
                               هیچ فرصت شغلی یافت نشد.
                            </p>
                        </div>
                        <Box v-else  v-for="(List,index) in  filteredData"
                             :key="index"
                             :List="List"
                             :User="User"
                             :index="index"></Box>
                    </div>

                </div>

                <div class="col-12 col-lg-3 p-0 desk-filter">
                    <div class="fixed-filter-box">
                        <div class="box-header-fiter box-header-fiter-color text-center">
                            <span v-if="filteredData">{{filteredData.length}}</span>
                            فرصت شغلی یافت شد .
                        </div>
                        <div class="box-filter-job">
                            <div class="filter-buttons">
                                <Button @click="newlySort()"
                                        :class="{ allBtnColored: all }">  جدیدترین
                                </Button>
                                <Button @click="moneySort()"
                                        :class="{ allBtnColored: !all }">  بیشترین حقوق
                                </Button>
                            </div>
                            <Collapse class="p-2" v-model="value1"  simple>
                                <Panel name="1">
                                    سابقه کار
                                    <p class="color-text-filter" slot="content">
                                        <CheckboxGroup size="large" v-model="historyFilter"
                                                       @on-change="filteredAdvertisings">
                                            <Checkbox v-for="(History,index) in HistoryList"
                                                      :key="index" size="large" class="w-100"
                                                      :label="History.id" border>
                                                {{History.title}}
                                            </Checkbox>
                                        </CheckboxGroup>
                                    </p>
                                </Panel>
                            </Collapse>
                            <Collapse class="p-2" v-model="value2" simple>
                                <Panel name="2">
                                    نوع قرارداد
                                    <p class="color-text-filter" slot="content">
                                        <CheckboxGroup size="large" v-model="CooperationFilter"
                                                       @on-change="filteredAdvertisings">
                                            <Checkbox v-for="(CooperationType,index) in CooperationType"
                                                      :key="index" size="large" class="w-100"
                                                      :label="CooperationType.id" border>
                                                {{CooperationType.title}}
                                            </Checkbox>
                                        </CheckboxGroup>
                                    </p>
                                </Panel>
                            </Collapse>
                            <Collapse class="p-2" v-model="value3" simple>
                                <Panel name="3">
                                    میزان حقوق
                                    <p class="color-text-filter" slot="content">
                                        <CheckboxGroup size="large" v-model="moneyFilter"
                                                       @on-change="filteredAdvertisings">
                                            <Checkbox v-for="(money,index) in MoneyList" :key="index"
                                                      size="large" class="w-100" :label="money.id" border>
                                                {{money.title}}
                                            </Checkbox>
                                        </CheckboxGroup>
                                    </p>
                                </Panel>
                            </Collapse>
                            <Collapse class="p-2" v-model="value4" simple>
                                <Panel style="font-size: 14px;" name="4">
                                    استان
                                    <p class="color-text-filter" slot="content">
                                        <CheckboxGroup size="large" v-model="provinceFilter"
                                                       @on-change="filteredAdvertisings">
                                            <Checkbox v-for="(province,index) in ProvincesList" :key="index"
                                                      size="large" class="w-100" :label="province.id" border>
                                                {{province.title}}
                                            </Checkbox>
                                        </CheckboxGroup>
                                    </p>
                                </Panel>
                            </Collapse>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import Search from "../includes/Home/HeaderSearch.vue";
import Box from "./List/box.vue";
import  loaidngBox from '../Loading/advertisingBoxLoading'
export default {
    name : 'jobs' ,
    components:{
        'Search':Search,
        'Box':Box ,
        loaidngBox
    },
    metaInfo() {
        return {
            title: '',
            //     // all titles will be injected into this template
            titleTemplate: 'کاریابی در سامانه کاریابی در گردشگری - کاراول ',
            meta: [{
                vmid: 'description',
                name: 'description',
                content: '',
            }]
        }
    },

    data(){
        return {
            showFilter  : false,
            value1 : '' ,
            value2 : '' ,
            value3 : '' ,
            value4 : '',
            mvalue1 : '1',
            mvalue2 : '2',
            mvalue3 : '3',
            mvalue4 : '',
            historyFilter : [] ,
            CooperationFilter  : [],
            moneyFilter : [],
            provinceFilter :  [] ,
            filteredData :'' ,
            LoadingBox : false ,
            all : true ,
        }
    },
    created() {

    },
    mounted(){
        this.LoadingBox = true
        this.$store.dispatch('LoadAdvertisingList' , this.searchParam)
            .then(response => {this.LoadingBox = false});
        this.$store.dispatch('LoadMoneyList');
        this.$store.dispatch('LoadProvinces');
        this.$store.dispatch('LoadCooperationTypeList');
        this.$store.dispatch('LoadHistoryList');
    },
    computed:{
        User(){ return this.$store.state.User.User;},
        AdvetisingList(){ return this.$store.state.AdvertisingSit.AdvetisingList},
        MoneyList(){ return this.$store.state.Money.MoneyList},
        ProvincesList(){ return this.$store.state.Province.provinces},
        CooperationType(){ return this.$store.state.CooperationType.CooperationType},
        HistoryList(){ return this.$store.state.HistoryJob.HistoryList},
        searchParam() { return this.$store.state.AdvertisingSit.form} ,

    } ,
    watch : {
        AdvetisingList() {
            this.filteredData = this.AdvetisingList
        }
    },
    methods: {
        moneySort() {
            this.all = false
            this.filteredData  = this.filteredData.slice().sort(function(b , a) {
                return a.money.id - b.money.id;
            });
        },
        newlySort( ) {
            this.all = true
            this.filteredData  = this.filteredData.slice().sort(function(b , a) {
                return new Date(a.created)  - new Date(b.created);
            });
        },
        filteredAdvertisings () {
            this.loading = true;
            setTimeout(() => {
                this.loading = false;
            }, 1000);
            this.filteredData = this.AdvetisingList

            if(this.historyFilter.length > 0)
                this.filteredData = this.filterByHistory()
            if(this.CooperationFilter.length > 0 )
                this.filteredData = this.filterByCooperation()
            if(this.moneyFilter.length > 0 )
                this.filteredData = this.filterByMoney()
            if(this.provinceFilter.length > 0 )
                this.filteredData = this.filterByProvince()

        },
        filterByCooperation: function(){
            return  this.filteredData.filter(item => {
                return this.CooperationFilter.includes(item.CooperationType.id)
            })
        },
        filterByMoney: function() {
            return  this.filteredData.filter(item => {
                return this.moneyFilter.includes(item.money.id)
            })
        },
        filterByHistory: function() {
            return   this.filteredData.filter(item => {
                return this.historyFilter.includes(item.HistoryJop.id)
            })
        },
        filterByProvince: function(){
            return   this.filteredData.filter(item => {
                return this.provinceFilter.includes(item.province.id)
            })
        }
    },
}
</script>
<style scoped>
.fixed-filter-box {
    position: sticky;
    top: 83px;
}
.filter-buttons {
    padding: 10px;
    display: flex ;
    justify-content: space-between;
}
.filter-buttons button {
    height: 42px; margin: 0 10px;
}
.color-text-filter{
   color:  rgb(124, 129, 135) ;
    font-size: 14px;
}
.box-filter-job{
    box-shadow: 0 4px 8px 0 rgba(0,0,0,.12), 0 2px 4px 0 rgba(0,0,0,.08);
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid transparent;
    padding: 15px 0;
    border-radius: 0 0 .5rem .5rem;
}

.box-header-fiter{
    margin-top: 16px;
    padding: 15px;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,.12), 0 2px 4px 0 rgba(0,0,0,.08);
    color: #fff;
    border-radius: .5rem .5rem 0px 0px;
}
.box-header-fiter-color{
    background: #1e88e5;
}
.ivu-collapse > .ivu-collapse-item.ivu-collapse-item-active > .ivu-collapse-header > i {
    transform: rotate(90deg);
    font-size: 22px;
    color: #7c8187
}
.ivu-collapse > .ivu-collapse-item > .ivu-collapse-header > i {
    transition: transform .2s ease-in-out;
    margin-right: 14px;
    font-size: 22px;
    color: #7c8187;
}
.ivu-select-large.ivu-select-multiple .ivu-select-selection{
    min-height: 46px !important;
}
.ivu-select-multiple .ivu-select-selection {
    padding: 4px 4px 0 4px !important;
}
.ivu-select-large.ivu-select-single .ivu-select-selection {
    height: 46px !important;
    padding: 0 4px !important;
}
.ivu-select-large.ivu-select-multiple .ivu-select-selection .ivu-select-placeholder, .ivu-select-large.ivu-select-multiple .ivu-select-selection .ivu-select-selected-value {

    line-height: 46px !important;
}
.ivu-select-large.ivu-select-single .ivu-select-selection .ivu-select-placeholder, .ivu-select-large.ivu-select-single .ivu-select-selection .ivu-select-selected-value {
    line-height: 46px !important;
}
.ivu-switch-checked::after  {
    left: 40px;
}
.ivu-switch {
    width: 60px;
}
.ivu-collapse {
    border-bottom:  none;
}
.ivu-collapse-simple:last-child {
    padding-bottom: 0 !important;
}
.v-select.style-chooser .vs__dropdown-toggle {
    height: 46px !important;
}
.mobile-filter {
    display: none;
}
@media screen and (max-width: 990px){
    .mobile-filter {
        display: block;
    }
    .desk-filter { display: none}
    .instant-filter-box  {
        padding : 0 15px;
        position: fixed ;
        bottom: 45px;
        right: 0;
        left: 0;
        z-index: 999;
        overflow-y: scroll;
        overflow-x: hidden;
        background-color: #f5f5f5;
        margin-top: 0;
        border: 0 !important;
        margin-top : -30px
    }

}

</style>
