<template>
  <div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="disable-contact">
            <Card  :padding="0" shadow class="mb-2" >
               <Form class="p-2">
                 <FormItem class="mb-0">
                   <Icon class="font-20" type="md-information-circle"/>
                   <span class="p-2 font-14">شاغل شده ام به این دلیل اطلاعات تماس من برای کارفرمایان دیگر نشان داده نشود.</span>
                   <i-switch :disabled="!Base" size="large" class="mr-3" v-model="Base.contact_status"  @on-change="changeStatus">
                     <span slot="open">فعال</span>
                     <span slot="close">غیرفعال</span>
                   </i-switch>
                 </FormItem>
               </Form>
            </Card>
            <Card  :padding="0" shadow class="mb-2" >
              <Form class="p-2">
                <FormItem class="mb-0">
                  <Icon class="font-20" type="md-information-circle"/>
                  <span class="p-2 font-14">تمایلی ندارم که پیامک های پیشنهاد شغلی برای من ارسال شود.</span>
                  <i-switch :disabled="!Base" size="large" class="mr-3" v-model="Base.sms_status"  @on-change="changeSMSStatus">
                    <span slot="open">فعال</span>
                    <span slot="close">غیرفعال</span>
                  </i-switch>
                </FormItem>
              </Form>
            </Card>
            <Card title="وضعیت متقاضی" icon="ios-options" :padding="0" shadow >
              <CheckboxGroup  v-model="filterResume">
                <Checkbox v-for="(status , index)  in statusList" :key="index" :label="status.id" class="my-2 col-12 col-sm-6 col-md-4">
                  {{ status.title }}
                  <span :class="setColor(status.id)">{{ $store.getters['Member/Requests/advertizing/resumeadvertizingStatusCount'](status.id) }}</span>
                </Checkbox>
              </CheckboxGroup>
            </Card>
          </div>
        </div>
        <div class="col-12" v-if="loading">
          <lodingSkillLoading class="box-A karavel-box"></lodingSkillLoading>
        </div>
        <div class="col-12" v-else>
          <div class="box-list-jobs-info mt-2" v-if="memberAdvertizing.length == 0">
            <p class="p-3 text-center">
              شما هنوز به هیچ آگهی رزومه ارسال نکرده اید.
            </p>
          </div>
          <div v-else  class="box-A karavel-box" v-for="(advertizing , index ) in memberAdvertizing" :key="index">
            <div class="back-stuatus box-stuatus" :class="setColor(advertizing.status.id)"> </div>

            <div style="display: flex !important;align-items: center !important;justify-content: center;flex-wrap: wrap;" class="row text-center">
              <div class="col-md-4 col-sm-6">
                <nuxt-link :to="`/member/applied/${advertizing.id}`">
                  <h5>
                    {{ advertizing.title }}
                  </h5>
                </nuxt-link>
              </div>
              <div class="col-md-3 col-sm-6">
                <p class="py-2">
                  ارسال شده برای شرکت
                  <span>{{ advertizing.company.name_fa }}</span> <br/>
                  <span>{{ advertizing.craeted }}</span>
                </p>
              </div>
              <div class="col-md-3 col-sm-6">
                <nuxt-link :to="`/member/applied/${advertizing.id}`" class="btn-link">نمایش وضعیت ارسال رزومه</nuxt-link>
              </div>
              <div class="col-md-2 col-sm-6">
                <div :class="setColor(advertizing.status.id)">
                  <span style="white-space: break-spaces">{{$store.getters['Company/resumeStatus/getStatusTitle'](advertizing.status.id)}}</span>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</template>
<script>

export default {
  data() {
    return {
      filterResume: [],
      all: false,
      filters: [],
      loading: false,
      statsLoading: false
    }
  },
  created() {
    this.loading = true
    this.statsLoading = true
    this.$store.dispatch('Member/Requests/advertizing/LoadMemberAdvertizing')
      .then(res => {
        this.loading = false
      })
    this.$store.dispatch('Company/resumeStatus/LoadStatus')
      .then(res => {
        this.statsLoading = false
      })
  },
  computed: {
    memberAdvertizing() {
      return this.$store.getters['Member/Requests/advertizing/resumeStatusAd'](this.filterResume)
    },
    statusList() {
      return this.$store.state.Company.resumeStatus.statusList
    },
    Base() {return this.$store.state.Member.Resume.BaseResume.Base},
  },
  watch: {
    statusList() {
      this.all = true
      this.filter()
    },
    filterResume() {
      if (this.filterResume.length == this.statusList.length) {
        this.all = true
      } else {
        this.all = false
      }
      this.$router.replace({path: "/member/applied", query: {status: this.filterResume}}).catch(()=>{})
    }
  },
  methods: {
    changeStatus(){
      this.$store.dispatch('Member/Resume/BaseResume/changeContactStatus')
      .then(response => {
         this.$store.dispatch('globalFunctions/SuccessNotify' , response.data.data.message)
      }).catch(error => console.log(error))
    },
    changeSMSStatus(){
      this.$store.dispatch('Member/Resume/BaseResume/changeSMSStatus')
        .then(response => {
          this.$store.dispatch('globalFunctions/SuccessNotify' , response.data.data.message)
        }).catch(error => console.log(error))
    },
    setColor(id) {
      switch (id){
        case 1:
          return `badge bg-secondary`;
        case 2:
          return 'badge bg-warning';
        case 3:
          return 'badge bg-success';
        case 4:
          return 'badge bg-success';
        case 5:
          return 'badge bg-danger';
        case 6:
          return 'badge bg-primary';
      }
    },

    filter() {
      //console.log(this.$route.query.status)
      if (this.$route.query.status) {
        const filters = this.$route.query.status.map(filter => {
          return parseInt(filter)
        })
        this.filterResume = filters

      } else {
        const filters = this.statusList.map(filter => {
          return filter.id
        })
        this.filterResume = filters
      }
    },
    filterAll() {
      if (this.all) {
        this.filterResume = []
        const filters = this.statusList.map(filter => {
          return filter.id
        })
        this.filterResume = filters
      } else {
        this.filterResume = []

      }
    },
  }
}
</script>
<style scoped>
.ivu-icon.ivu-icon-md-information-circle{
  color: #e3342f !important;
}
.box-stuatus{
  height: 100%;
  width: 6px !important;
  position: absolute;
  right: 0;
  top: 0;
  border-radius: 0px 24px 25px 0px !important;
  padding: 0 !important;
}
.badge {
  display: inline-block;
  padding: .35em .65em;
  font-size: .75em;
  font-weight: 700;
  line-height: 1;
  color: #fff;
  text-align: center;
  white-space: nowrap;
  vertical-align: baseline;
  border-radius: .25rem;
}
.label-badge {
  padding: 3px 7px;
  color: #fff;
  font-size: 13px;
  text-align: center;
  width: 130px;
}

.background-1 {
  background: #c7e9ff !important;
}

.background-2 {
  background: #f8f5d3 !important;
}

.background-3 {
  background: #e3faec !important;
}

.background-5 {
  background: #fbe7e7 !important;
}

.background-4 {
  background: #e3faec !important;
}

.background-6 {
  background: #f7f8fa !important;
}
.ivu-checkbox-wrapper.ivu-checkbox-group-item {
  margin: 10px 0 !important;
}
.box-A{
  padding: 15px;
  margin-top: 16px!important;
}
</style>
