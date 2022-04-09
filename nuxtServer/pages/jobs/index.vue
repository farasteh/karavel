<template>
  <div>
    <HomeSearchComponent @setfilter="filteredAdvertisings" @cat="workCat"></HomeSearchComponent>
    <div>
      <div class="container row px-0 py-3 m-auto">
        <div class="mobile-filter">
          <div v-if="showFilter" class="fixed-filter-box instant-filter-box">
            <div class="box-header-fiter box-header-fiter-color text-center" :class="{textLeft : filtered }">
                             <span class="mr-2">
                                فیلترهای پیشرفته
                            </span>
              <Button v-if="filtered" @click="deleteFilter()" style="width: 40px" class="float-left p-0 ml-2" >
                لغو
                <Icon type="md-close" />
              </Button>
            </div>
            <div class="box-filter-job pt-0">
              <Collapse class="p-2" v-model="mvalue5"  simple>
                <Panel name="1">
                  تخصص نهایی
                  <p class="color-text-filter" slot="content">
                    <CheckboxGroup size="large" v-model="workJobsFilter"
                                   @on-change="filteredAdvertisings">
                      <Checkbox v-for="(History,index) in workJobs"
                                :key="index" size="large" class="w-100"
                                :label="History.id" border>
                        {{History.title}}
                      </Checkbox>
                    </CheckboxGroup>
                  </p>
                </Panel>
              </Collapse>
              <Collapse class="p-2" v-model="mvalue1"  simple>
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
<!--              <Collapse class="p-2" v-model="mvalue4" simple>-->
<!--                <Panel name="4">-->
<!--                  استان-->
<!--                  <p class="color-text-filter" slot="content">-->
<!--                    <CheckboxGroup size="large" v-model="provinceFilter"-->
<!--                                   @on-change="filteredAdvertisings">-->
<!--                      <Checkbox v-for="(province,index) in ProvincesList" :key="index"-->
<!--                                size="large" class="w-100" :label="province.id" border>-->
<!--                        {{province.title}}-->
<!--                      </Checkbox>-->
<!--                    </CheckboxGroup>-->
<!--                  </p>-->
<!--                </Panel>-->
<!--              </Collapse>-->
            </div>
          </div>

          <div class="mobile-send-resume mobile-send-resume-filter" @click="showFilter = !showFilter" >
            <button class="w-100 d-flex justify-content-center align-items-center text-light">
              <i class="fas fa-filter ml-2"></i>
              فیلتر
            </button>
          </div>
        </div>

        <div class="col-12 col-lg-9">
          <advertisingBoxLoading  v-if="!filteredData"></advertisingBoxLoading>
          <div v-else>
            <div class="box-list-jobs-info mb-4 mt-3" v-if="filteredData.length == 0 ">
              <p class="p-3 text-center ">
                هیچ فرصت شغلی یافت نشد.
              </p>
            </div>
            <div v-else>
              <div class="row mt-3">
                <div class="col-md-4 mb-1">
                  <div class="karavel-box d-flex flex-row justify-content-center align-items-center" style="height: 50px">

                    <h2 class="font-14 mb-0 text-center">{{filteredData.length}}  فرصت شغلی در آژانس هواپیمایی و مسافرتی یافت شد .</h2>

                  </div>
                </div>
                <div class="col-md-8 mb-1">
                  <div class="karavel-box d-flex flex-row align-items-center" style="height: 50px">
                    <div class="text-center h-100 w-50 d-flex justify-content-center align-items-center border-left font-14 cursor-poiner"
                         :class="{ filterBtn: all }" @click="newlySort()">
                      <i class="fa fa-sort-amount-up-alt font-17 ml-2"></i>
                      <span>جدیدترین</span>
                    </div>
                    <div class="text-center h-100 w-50 d-flex justify-content-center align-items-center font-14 cursor-poiner"
                         :class="{ filterBtn: !all }" @click="moneySort()">
                      <i class="fa fa-sort-amount-up-alt font-17 ml-2"></i>
                      <span>بیشترین حقوق</span>
                    </div>
                  </div>
                </div>
              </div>
              <AdvertisingBox  v-for="(List,index) in  filteredData"
                    :key="index"
                    :List="List"
                    :User="User"
                    :index="index"
                    :memberRole="memberRole"></AdvertisingBox>
            </div>
          </div>

        </div>

        <div class="col-12 col-lg-3 p-0 desk-filter">
          <div class="fixed-filter-box">
            <div class="box-header-fiter box-header-fiter-color text-center" :class="{textLeft : filtered }">
                             <span class="mr-2">
                                فیلترهای پیشرفته
                            </span>
              <Button v-if="filtered" @click="deleteFilter()" style="width: 40px" class="float-left p-0 ml-2" >
                لغو
                <Icon type="md-close" />
              </Button>
            </div>
            <div class="box-filter-job pt-0">
              <Collapse class="p-2" v-model="value5"  simple>
                <Panel name="1">
                  تخصص نهایی
                  <p class="color-text-filter" slot="content">
                    <CheckboxGroup size="large" v-model="workJobsFilter"
                                   @on-change="filteredAdvertisings">
                      <Checkbox v-for="(History,index) in workJobs"
                                :key="index" size="large" class="w-100"
                                :label="History.id" border>
                        {{History.title}}
                      </Checkbox>
                    </CheckboxGroup>
                  </p>
                </Panel>
              </Collapse>
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
<!--              <Collapse class="p-2" v-model="value4" simple>-->
<!--                <Panel class="font-14" name="4">-->
<!--                  استان-->
<!--                  <p class="color-text-filter" slot="content">-->
<!--                    <CheckboxGroup size="large" v-model="provinceFilter"-->
<!--                                   @on-change="filteredAdvertisings">-->
<!--                      <Checkbox v-for="(province,index) in ProvincesList" :key="index"-->
<!--                                size="large" class="w-100" :label="province.id" border>-->
<!--                        {{province.title}}-->
<!--                      </Checkbox>-->
<!--                    </CheckboxGroup>-->
<!--                  </p>-->
<!--                </Panel>-->
<!--              </Collapse>-->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>

export default {
 middleware : 'jobs',
  name : 'jobs' ,
  head() {
    return {
      title: 'کاریابی در استخدام آژانس مسافرتی و هواپیمایی - کاراول ',
      meta: [{
        hid: 'description',
        name: 'description',
        content: 'کارفرمایان عزیز، میتوانید با عضویت در کاراول، به سادگی یک آگهی کارمندیابی در آژانسهای مسافرتی ایجاد کنید. سامانه کاراول، تمام آگهی های استخدام در آژانسهای مسافرتی و هواپیمایی را در سایت، کانال تلگرام و صفحه اینستاگرام نمایش میدهد و این فرصت های شغلی در آژانسهای مسافرتی را در اختیار کارجویان قرار میدهد. ',
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
      value5: '' ,
      mvalue1 : '1',
      mvalue2 : '2',
      mvalue3 : '3',
      mvalue4 : '',
      mvalue5 : '4' ,
      historyFilter : [] ,
      CooperationFilter  : [],
      moneyFilter : [],
      provinceFilter :  [] ,
      workJobsFilter : []  ,
      filteredData :'' ,
      LoadingBox : false ,
      all : true ,
    }
  },
  beforeEnter:((to,from,next)=>{
    if(Object.keys(to.query).length != 0)
    {
      if(to.query.job1 && to.query.job2 && to.query.job1 != ''  && to.query.job2 != '')
        next()
      else
        next( '/filterJobs' )
    }
    else
      next( '/filterJobs' )
  }),
  created() {

  },
  async fetch({store}) {
    await store.dispatch('Site/Advertising/LoadAdvertisingList' , this.searchParam)
 //   await store.dispatch('noticedCompany/LoadNoticeCompany')
  },
  mounted(){
    this.LoadingBox = true
    this.$store.dispatch('Site/Advertising/LoadAdvertisingList' , this.searchParam)
      .then(response => {this.LoadingBox = false});

    if(this.MoneyList.length == 0)
      this.$store.dispatch('Money/LoadMoneyList');
    if(this.ProvincesList.length == 0 )
      this.$store.dispatch('Map/Province/LoadProvinces');
    if(this.CooperationType.length == 0)
      this.$store.dispatch('CooperationType/LoadCooperationTypeList');
    if ( this.HistoryList.length == 0)
      this.$store.dispatch('HistoryJob/LoadHistoryList');
  },
  computed:{
    User(){ return this.$store.state.User.User.User;},
    AdvetisingList(){ return this.$store.state.Site.Advertising.AdvetisingList},
    MoneyList(){ return this.$store.state.Money.MoneyList},
    ProvincesList(){ return this.$store.state.Map.Province.provinces},
    CooperationType(){ return this.$store.state.CooperationType.CooperationType},
    HistoryList(){ return this.$store.state.HistoryJob.HistoryList},
    searchParam() { return this.$store.state.Site.Advertising.form} ,
    workJobs() {return this.$store.getters['Jobs/AdworkCategories'](this.searchParam.Job , this.searchParam.Job1 )} ,
    memberRole() {return this.$store.getters['User/User/userRole']},
    filtered() {
      if( this.historyFilter.length>0 ||
        this.CooperationFilter.length>0 ||
        this.moneyFilter.length>0 ||
        this.provinceFilter.length>0 ||
        this.workJobsFilter.length>0 )
        return true
      else
        return  false

    }
  } ,
  watch : {
    AdvetisingList() {
      this.filteredData = this.AdvetisingList
    }
  },
  methods: {
    deleteFilter() {
      this.historyFilter = []
      this.CooperationFilter  = []
      this.moneyFilter = []
      this.provinceFilter =  []
      this.workJobsFilter = []
      this.filteredAdvertisings()
    },
    workCat() {
      this.workJobsFilter = []
    },
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
      this.filteredData = this.AdvetisingList

      if(this.workJobsFilter.length > 0 )
        this.filteredData = this.filterByWorkCat()
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
    },
    filterByWorkCat: function(){
      return   this.filteredData.filter(item => {
        var check ;
        for ( var i = 0 ; i < this.workJobsFilter.length ; i++){
          check = item.work_category.includes(this.workJobsFilter[i])
          if ( check == true  )
            break ;
        }
        return  check

      })
    },
  },
}
</script>

<style>
.ivu-collapse > .ivu-collapse-item > .ivu-collapse-header > i {
  transition: transform .2s ease-in-out;
  margin-right: 14px;
  left: 0;
  position: absolute;
  left: 10px;
  top: 12px;
}
.ivu-collapse > .ivu-collapse-item > .ivu-collapse-header > i {
  transition: transform .2s ease-in-out;
  margin-right: 14px;
  left: 0;
  position: absolute;
  left: 10px;
  top: 12px;
}
.ivu-collapse > .ivu-collapse-item > .ivu-collapse-header > i {
  transition: transform .2s ease-in-out;
  margin-right: 14px;
}
.ivu-collapse > .ivu-collapse-item.ivu-collapse-item-active > .ivu-collapse-header > i {
  transform: rotate(90deg);
  font-size: 15px !important;
}
</style>
