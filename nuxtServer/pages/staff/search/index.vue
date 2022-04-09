<template>
  <div>
    <HomeStaffSearchBox/>
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
                  جنسیت
                  <p class="color-text-filter" slot="content">
                    <CheckboxGroup size="large" v-model="genderFilter"
                                   @on-change="filteredStaffs">
                      <Checkbox v-for="(gender,index) in GenderList"
                                :key="index" size="large" class="w-100"
                                :label="gender.id" border>
                        {{gender.title}}
                      </Checkbox>
                    </CheckboxGroup>
                  </p>
                </Panel>
              </Collapse>
              <Collapse class="p-2" v-model="mvalue1"  simple>
                <Panel name="1">
                  نمره کاراولی
                  <p class="color-text-filter pt-2" slot="content">
                    <Slider @on-change="filteredStaffs" v-model="rankFilter" :step="10" show-stops></Slider>
                    {{rankFilter}} %
                  </p>
                </Panel>
              </Collapse>
              <Collapse class="p-2" v-model="mvalue2" simple>
                <Panel name="2">
                  سن
                  <p class="color-text-filter pt-2" slot="content">
                    <Slider :min="18" :max="70"  @on-change="filteredStaffs" v-model="ageFilter"></Slider>
                    {{ageFilter}} سال
                  </p>
                </Panel>
              </Collapse>
<!--              <Collapse class="p-2" v-model="mvalue4" simple>-->
<!--                <Panel name="4">-->
<!--                  استان-->
<!--                  <p class="color-text-filter" slot="content">-->
<!--                    <CheckboxGroup size="large" v-model="provinceFilter"-->
<!--                                   @on-change="filteredStaffs">-->
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

          <div v-else-if="filteredData">
            <div class="box-list-jobs-info mb-4 mt-3" v-if="filteredData.length == 0 ">
              <p class="p-3 text-center ">
                هیچ فرصت کارمندی یافت نشد.
              </p>
            </div>
            <div v-else>
              <div class="row mt-3">
                <div class="col-md-12 mb-1">
                  <div class="karavel-box d-flex flex-row justify-content-center align-items-center" style="height: 50px">
                    <h2 class="font-14 mb-0 text-center">{{filteredData.length}}  فرصت شغلی در آژانس هواپیمایی و مسافرتی یافت شد .</h2>
                  </div>
                </div>
                <!--                <div class="col-md-8 mb-1">-->
                <!--                  <div class="karavel-box d-flex flex-row align-items-center" style="height: 50px">-->
                <!--                    <div class="text-center h-100 w-50 d-flex justify-content-center align-items-center border-left font-14 cursor-poiner"-->
                <!--                         :class="{ filterBtn: all }" @click="newlySort()">-->
                <!--                      <i class="fa fa-sort-amount-up-alt font-17 ml-2"></i>-->
                <!--                      <span>جدیدترین</span>-->
                <!--                    </div>-->
                <!--                    <div class="text-center h-100 w-50 d-flex justify-content-center align-items-center font-14 cursor-poiner"-->
                <!--                         :class="{ filterBtn: !all }" @click="moneySort()">-->
                <!--                      <i class="fa fa-sort-amount-up-alt font-17 ml-2"></i>-->
                <!--                      <span>بیشترین حقوق</span>-->
                <!--                    </div>-->
                <!--                  </div>-->
                <!--                </div>-->
              </div>
              <HomeStaffSingle  v-for="(staff,index) in  filteredData"
                                :key="index"
                                :staff="staff"
                                :index="index"
                                :User="User"
                                :memberRole="memberRole"
              ></HomeStaffSingle>
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
                  جنسیت
                  <p class="color-text-filter" slot="content">
                    <CheckboxGroup size="large" v-model="genderFilter"
                                   @on-change="filteredStaffs">
                      <Checkbox v-for="(gender,index) in GenderList"
                                :key="index" size="large" class="w-100"
                                :label="gender.id" border>
                        {{gender.title}}
                      </Checkbox>
                    </CheckboxGroup>
                  </p>
                </Panel>
              </Collapse>
              <Collapse class="p-2" v-model="value1"  simple>
                <Panel name="1">
                  نمره کاراولی
                  <p class="color-text-filter pt-2" slot="content">
                    <Slider @on-change="filteredStaffs" v-model="rankFilter" :step="10" show-stops></Slider>
                    {{rankFilter}} %
                  </p>
                </Panel>
              </Collapse>
              <Collapse class="p-2" v-model="value2" simple>
                <Panel name="2">
                  سن
                  <p class="color-text-filter pt-2" slot="content">
                    <Slider :min="18" :max="70"  @on-change="filteredStaffs" v-model="ageFilter"></Slider>
                    {{ageFilter}} سال
                  </p>
                </Panel>
              </Collapse>
<!--              <Collapse class="p-2" v-model="value4" simple>-->
<!--                <Panel class="font-14" name="4">-->
<!--                  استان-->
<!--                  <p class="color-text-filter" slot="content">-->
<!--                    <CheckboxGroup size="large" v-model="provinceFilter"-->
<!--                                   @on-change="filteredStaffs">-->
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


    <!--    <div>-->
    <!--      <div class="container row px-0 py-3 m-auto">-->

    <!--        <div class="col-12">-->
    <!--          <advertisingBoxLoading  v-if="staffLoading"></advertisingBoxLoading>-->
    <!--          <div v-else>-->
    <!--            <div class="box-list-jobs-info mb-4 mt-3" v-if="staffList.length == 0 ">-->
    <!--              <p class="p-3 text-center ">-->
    <!--               {{message}}-->
    <!--              </p>-->
    <!--            </div>-->
    <!--            <div v-else>-->
    <!--              <div class="row mt-3">-->
    <!--                <div class="col-md-12 mb-1">-->
    <!--                  <div class="karavel-box d-flex flex-row justify-content-center align-items-center" style="height: 50px">-->
    <!--                    <h2 class="font-14 mb-0 text-center">{{staffList.length}} کارمند در آژانس هواپیمایی و مسافرتی یافت شد .</h2>-->
    <!--                  </div>-->
    <!--                </div>-->
    <!--              </div>-->
    <!--              <HomeStaffSingle  v-for="(staff,index) in  staffList"-->
    <!--                               :key="index"-->
    <!--                               :staff="staff"-->
    <!--                               :index="index"-->
    <!--                                :User="User"-->
    <!--                                :memberRole="memberRole"-->
    <!--              ></HomeStaffSingle>-->
    <!--            </div>-->
    <!--          </div>-->

    <!--        </div>-->
    <!--      </div>-->
    <!--    </div>-->
  </div>
</template>
<script>

export default {
  name: 'staff-list' ,
  props : [ 'staffLoading'] ,
  middleware : 'staff',
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
      genderFilter : [] ,
      rankFilter  : 0,
      provinceFilter :  [] ,
      ageFilter : 18,
      filteredData :'' ,
      LoadingBox : false ,
      all : true ,
      message : 'برای پیدا کردن کارمند مورد نظر خود لطفا جستجو نمایید.'
    }
  },
  head() {
    return {
      title: ' رزومه کارمند آژانس هواپیمایی-کاراول' ,
      meta: [
        {
          hid: 'description',
          name: 'description',
          content: 'این صفحه رزومه ی کارمندان آژانس هواپیمایی است کاراول تلاش کرده است تا بستری فراهم کند که کارمندان آژانس مسافرتی بتوانند با ارائه یک رزومه ی کامل و تخصصی مسافرتی استخدام خوبی در آژانس های مسافرتی داشته باشند. رزومه کارمندان آژانس هواپیمایی براساس کامل بودن آن توسط کاراول ارزش گزاری شده است تا آژانس های مسافرتی بتوانند بصورت هدفمند کارمند آژانس هواپیمایی استخدام کنند. نتایج جستجوی رزومه کارمند آژانس هواپیمایی و مسافرتی - استخدام آژانس مسافرتی و هواپیمایی'
        }
      ]
    }
  },
  beforeEnter:((to,from,next)=>{
    console.log(to)
    if(Object.keys(to.query).length != 0)
    {
      if(to.query.province && to.query.Job1 && to.query.Job && to.query.province != ''
        && to.query.Job1 != '' && to.query.Job != '')
        next()
      else
        next( '/filterJobs' )
    }
    else
      next( '/filterJobs' )
  }),
  async fetch({store , route}) {
    this.LoadingBox = true
    let Job = null
    let Job1 = null
    let province = null
    if(Object.keys(route.query).length != 0 )
    {
      if(route.query.job1 != '')
      {
        Job = parseInt(route.query.job1)
      }
      if(route.query.job2 != '')
      {
        Job1 = parseInt(route.query.job2)
      }

      if (route.query.province != '')
      {
        province = parseInt(route.query.province)
      }
    }
    await store.dispatch('Site/Staff/LoadStaffList', {
      Job : Job ,Job1 : Job1 , province  : province
    })
  },
  computed:{
    staffList() {return this.$store.state.Site.Staff.StaffList},
    // filteredData() {return this.$store.state.Site.Staff.StaffList},
    User(){ return this.$store.state.User.User.User;},
    memberRole() {return this.$store.getters['User/User/userRole']},
    form() {return this.$store.state.Site.Staff.form},
    ProvincesList(){ return this.$store.state.Map.Province.provinces},
    GenderList () {return this.$store.state.Gender.Gender.Gender},
    filtered() {
      if( this.genderFilter.length > 0 || this.ageFilter !== 18 ||
        this.provinceFilter.length > 0 || this.rankFilter !==  0 )
        return true
      else
        return  false

    }
  },
  watch:{
    staffList() {
      this.filteredData = this.staffList
      if(this.form.Job != '' && this.staffList.length == 0 )
        this.message = 'هیچ کارمندی درنتایج سرچ شما یافت نشد. لطفا مورد دیگری سرچ کنید'
    },
  },
  methods: {
    deleteFilter() {
      this.ageFilter = 18
      this.rankFilter  = 0
      this.provinceFilter = []
      this.genderFilter =  []
      this.filteredStaffs()
    },
    filteredStaffs () {
      this.filteredData = this.staffList

      if(this.ageFilter !== '')
        this.filteredData = this.filterByAge()
      if(this.rankFilter !== 0 )
        this.filteredData = this.filterByRank()
      if(this.genderFilter.length > 0 )
        this.filteredData = this.filterByGender()
      if(this.provinceFilter.length > 0 )
        this.filteredData = this.filterByProvince()

    },
    filterByProvince: function(){
      return   this.filteredData.filter(item => {
        if(item.province == null) return false
        return this.provinceFilter.includes(item.province.id)
      })
    },
    filterByGender: function(){
      return   this.filteredData.filter(item => {
        if(item.gender == null) return false
        return this.genderFilter.includes(item.gender)
      })
    },
    filterByAge: function(){
      return   this.filteredData.filter(item => {
        if(item.birhdate == null) return false
        return item.birhdate >= this.ageFilter
      })
    },
    filterByRank: function(){
      return   this.filteredData.filter(item => {
        return item.rank >= this.rankFilter
      })
    },
  },
  mounted(){
    this.filteredData = this.staffList
    if(this.ProvincesList.length === 0 )
      this.$store.dispatch('Map/Province/LoadProvinces');
    this.$store.dispatch('Gender/Gender/LoadGender');
  },
}
</script>

<style>
.ivu-slider-wrap {
  direction: ltr;
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

.mobile-send-resume {
  position: fixed !important;
  display: flex !important;
  right: 0;
  bottom: 0;
  height: 50px;
  width: 117px !important;
  background: #1e88e5;
  align-items: center;
  z-index: 10000;
}
</style>
