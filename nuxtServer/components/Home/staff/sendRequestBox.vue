<template>
  <div>
    <div class="box-show-page resume-send-box-res">
      <div>
        <div class="box-form-header box-form-header-back mBox">
          <img v-if="staff.image == null || !LoggedIN"  src="~/assets/images/company/no-photo.jpg" />
          <img v-else :src="appurl+'/images/company/'+ staff.image">

        </div>
        <Form ref="formValidate">
          <Button v-if="memberRole == 'Company' && !$store.getters['Site/Staff/singleCompanySendRequest'] (Member.Company.id )"
                  @click="sendRequestToResume"  type="primary" size="large" long
                  :loading="requestLoading"  class="karavel-btn"
                  :disabled="$store.getters['Site/Staff/singleCompanySendRequest'] (Member.Company.id )">
            ارسال پیشنهاد کار به ایشان
          </Button>
          <div class="alert text-center mt-2" :class="messageType"
               v-if="memberRole == 'Company' && $store.getters['Site/Staff/singleCompanySendRequest'] (Member.Company.id )
                && message ">{{ message }}
          </div>
          <div v-if="memberRole != 'Company'">
            <div v-if="memberRole == 'Member'" class="alert alert-danger text-center mt-2">
              <a @click="Gologin">
                <span class="text-dark">شما با پروفایل کارجو وارد شده اید برای ارسال رزومه با پروفایل کارفرما وارد شوید</span>
              </a>
            </div>
            <div v-else-if="memberRole == 'Admin'" class="alert alert-danger text-center mt-2">
              <span class="text-dark">شما با پروفایل ادمین وارد شده اید</span>
            </div>
            <div  v-else class="text-center  alert alert-danger text-dark text-center  mt-2"
                  style="background: #e8e8e8; border-color: #e8e8e8">
              <a @click="Gologin" class="text-dark">
                برای ارسال پیشنهاد لطفا وارد شوید
              </a>
            </div>
          </div>
        </Form>
      </div>
    </div>
  </div>
</template>
<script>
export default {
 name : 'send-request-box' ,
 props : ['memberRole' , 'Member' , 'staff'],
  data() {
    return {
      message: 'شما به ایشان پیشنهاد کار داده اید.',
      requestLoading: false,
      messageType: 'alert-primary',
    }
  },
  computed : {
    LoggedIN()  {
      if(this.memberRole != '') {
        if ( this.memberRole == 'Company' || this.memberRole == 'Admin'  )
          return true
      }
      else return  false
    },
    appurl() {
      return this.$store.state.globalFunctions.APP_URL
    },
    id() {
      if(this.memberRole == 'Company')
        if(this.company)
          return this.Member.company.id
    },
  },
  methods  :{
    sendRequestToResume(){
      if(this.memberRole == 'Company'){
        this.$confirm("آیا از ارسال پیشنهاد خود اطمینان دارید؟").then(() => {
          this.requestLoading = true
          this.$store.dispatch('Site/Staff/sendRequest', {
            resume: this.$route.params.id,
            company: this.Member.Company.id
          })
            .then(response => {
              this.$store.dispatch('globalFunctions/SuccessNotify', response.data.data.message)
              this.message = 'درخواست شما  ارسال شد.'
              this.messageType = 'alert-success'
            })
            .catch(error => console.log(error))
            .finally(() => this.requestLoading = false)
        })
      }
    },
    Gologin() {
      if ( this.memberRole == '' || this.memberRole == 'Member') {
        this.$store.commit('Auth/redirect/SET_ROUTE' , {
          route : {name : this.$route.fullPath }
        })
        this.$router.push({path : '/users/login-register/Company' })
      }
      else if(this.memberRole == 'NOTMember')
        this.$router.push({path : '/register/member'})
      else if(this.memberRole == 'NOTCompany')
        this.$router.push({path : '/register/company'})
    },
  }
}
</script>

<style scoped>
  .box-show-page {
    box-shadow: 0 0px 8px 5px rgb(0 0 0 / 5%);
    border : 1px solid #ccc ;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    padding: 15px;
    border-radius: .5rem
  }

  .box-form-header {
    margin: -15px;
    height:60px;
    margin-bottom: 20px;
    border-top-left-radius: .5rem;
    border-top-right-radius: .5rem;
    display: flex;
    justify-content: center;
    background: var(--var-webkit-box-header-send-resume-background);
    background: var(--var-box-header-send-resume-background);
    background-image: url("~/assets/images/people.png");
  }
  .mBox  {
    margin-bottom: 50px;
    height: 95px;

  }
  .box-form-header img{
    width: 100px;
    height: 100px;
    border-radius: 50%;
    margin-top: 30px;
    border: 1px solid #b3b3b3 ;
    background: #ececee;
  }
</style>
