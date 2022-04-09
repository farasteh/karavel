<template>
  <div class="col-12 col-lg-4 col-sm-6">
    <div class="box-A karavel-box">
<!--      <div v-if="advertising.status === ''" class="col-lg-2 mb-2 back-stuatus status-box">-->
<!--        <Tooltip content="در انتظار بررسی" placement="top-start">-->
<!--          <Button><Icon class="box-icon" type="md-eye" /></Button>-->
<!--        </Tooltip>-->
<!--      </div>-->

<!--      <div v-if="advertising.status === 'no'" class="col-lg-2 mb-2 back-stuatus-error status-box">تایید نشده</div>-->
      <!-- <div v-if="advertising.status == ''" class="box-stuatus"></div> -->
      <div class="row">
        <div class="col-8">
                <span class="font-weight-bold font-14">
                    <nuxt-link :to="`/posts/edit/${advertising.id}`">
                        <span style="color: #515a6e">
                            {{advertising.title}}
                        </span>
                    </nuxt-link>
                     <span class="font-12 d-inline-block w-100" style="word-spacing: -2px ;color: #515a6e;">
                        (
                        <span>
                           {{advertising.created_at}}
                        </span>
                        )
                    </span>
                </span>
        </div>
        <div class="col-4">
          <Tooltip v-if="advertising.status === ''"  content="در انتظار بررسی" placement="top-center">
            <Button  class="col-lg-6 mb-2 d-flex justify-content-center align-items-center float-left"
              style="border-color: yellow !important ; color: yellow !important;">
              <Icon type="ios-bulb-outline" />
            </Button>
          </Tooltip>
          <Tooltip v-if="advertising.status === 'no'"  content="رد شده" placement="top-center">
            <Button  style="border-color: red !important ; color: red !important;"  class="col-lg-6 mb-2 d-flex justify-content-center align-items-center float-left">
              <Icon type="md-close-circle" />
            </Button>
          </Tooltip>
          <Button id="navbarDropdown1"
                  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                  class="col-lg-6 d-flex justify-content-center align-items-center float-left" >
            <Icon type="ios-settings" />
          </Button>
          <div style="border-radius: 4px; min-width: 11rem !important;" class="box-A karavel-box dropdown-menu" aria-labelledby="navbarDropdown1">
            <nuxt-link :to="`/posts/edit/${advertising.id}`"
                         class="box-show">
              <Icon class="box-icon" type="md-create" />
              <span>ویرایش</span>
            </nuxt-link>
            <nuxt-link v-if="advertising.status === 'yes'" :to="`/jobs/${advertising.id}` "
                       class="box-show  cursor-poiner">
              <a href="" target="_blank" style="color : #000 !important">
                <Icon class="box-icon" type="md-eye" />
                <span>مشاهده درسایت</span>
              </a>
            </nuxt-link>
            <div @click="Deleteadvertising(advertising.id)" class="box-show cursor-poiner">
              <Icon class="box-icon" type="md-archive" />
              <span> آرشیو</span>
            </div>
          </div>

        </div>
      </div>
      <div class="text-center mt-2" v-if="advertising.status === 'yes'">
        <a @click="setfilter(status , status.id)" style="border-color: #ededed66 !important; color: #515a6e; padding: 12px 0" class="font-12 box-show row"
           :class="{'border-bottom' : index !== statusList.length - 1}"
           v-for="(status , index) in statusList" :key="status.id">

          <div class="cursor-poiner col-8 text-right">
             <span v-if="index !== statusList.length - 1">
              کارجوی
            </span>
            <span>{{status.title}}</span>
            <span v-if="index === statusList.length - 1">
              کارجو
            </span>
          </div>
          <p class="col-4 text-left">{{$store.getters['Company/advertizing/advertizingStatusCount'](status.id,advertising.id)}}</p>
        </a>

      </div>
    </div>

    <Modal
      v-model="modal11"
      width="900"
      footer-hide
      :title=" ' رزومه های ارسالی به آگهی ' + ad +  ' در وضعیت '   + stat" >
      <div class="text-center p-2" v-if="resumes.length == 0 ">نتایجی یافت نشد</div>
      <CompanyResumeLists v-else :resumes='resumes' :adId="advertising.id" @myEvent="setModel"></CompanyResumeLists>
    </Modal>
  </div>
</template>
<script>


export default {
  name : 'company-advertising-box',
  props:['advertising' , 'statusList'],

  data() {
    return {
      modal11 : false ,
      filterResume : [] ,
      adId : '' ,
      loading : false ,
      fullPage: false  ,
      ad  : '' ,
      stat : ''
    }
  },

  methods: {
    setModel() {
      this.modal11 = !this.modal11
    },
    setfilter( status , filter) {
      this.modal11 = true
      this.filterResume =  []
      this.filterResume.push(filter)
      this.ad = this.advertising.title
      this.stat = status.title

    },
    Deleteadvertising(id) {

      // this.$emit('loading' , this.loading)
      this.$confirm("آیا از آرشیو این آگهی اطمینان دارید؟").then(() => {
        this.loading = true
        this.$store.dispatch('Company/advertizing/deleteCompanyAdvertizing', {id: id})
          .then(success => {
            this.$store.dispatch('globalFunctions/SuccessNotify' , ' با موفقیت به لیست آرشیو ها اضافه شد.')
            this.loading = false
          })
          .catch(error => {
            this.$store.dispatch('globalFunctions/ErrorNotify')
          });
      })

    }
  } ,
  computed : {
    resumes () { return this.$store.getters['Company/advertizing/resumesCompany'](this.advertising.id , this.filterResume )}
  }
}
</script>

<style scoped>
.selected {
  background: #2d8cf0;
  color: #fff !important;
}
.btn-default-job{
  background: #fff linear-gradient(180deg,#fafbfc,#fff) repeat-x;
  color: #595f66;
  border-color: #c9d2dc;
  box-shadow: none;
  box-shadow: 0 0 3px 0 rgba(188,205,215,.2), 0 1px 5px 0 rgba(188,205,215,.2), 0 3px 1px -1px rgba(188,205,215,.2);
  background-image: linear-gradient(-180deg,#fff,#f5f8f9 99%)!important;
  float: left;
}
.box-stuatus{
  height: 100%;
  width: 6px;
  position: absolute;
  right: 0;
  top: 0;
  border-radius: 0px 24px 25px 0px;
}
.back-stuatus{
  background: yellow;
}
.back-stuatus-error{
  background: red;
}
.box-B {
  background: #ececec;
  background-clip: border-box;
  position: relative;
  display: none;
  flex-direction: column;
  min-width: 0;
  word-wrap: break-word;
  padding: 15px;
  margin-top: -5px !important;
  transition: opacity 1s ease-out;
  opacity: 0;
}
.box-B.active {
  display: flex;
  opacity: 1;
  color: #1b1e21 !important;
  /*transition: display 0s, opacity 0.5s linear;*/
}
.status-box {
  position: absolute;
  left: 20%;
  text-align: center;
}

@media screen and (max-width: 991px) {
  .status-box {
    position: relative;
    left: 0%;
    text-align: center;
  }
}
</style>
