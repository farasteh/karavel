<template>
  <div>
    <div class="box-list-jobs-info mb-4 text-center pt-2">
      <div style="font-size: 18px;" class="font-size-3xl font-weight-bold color-grey-dark-2">
        آپلود بنر
      </div>
      <p class="p-3">
        برای شرکت خود یک بنر آپلود نمایید، تا صفحه شما در کاراول زیباتر شود.
      </p>
    </div>
    <div class="card box-shadow-lg p-3">
      <div class="card-body">
        <Form ref="formValidate">
          <div class="row">
            <FormItem class="col-md-12">
              <Upload
                v-if="!uploaded"
                :on-success="handleBannerSuccess"
                type="drag"
                name="img"
                accept=".png,.jpg"
                :action="'https://api.karavel.ir/api/v1/Upload'">
                <div style="padding: 20px 0">
                  <Icon type="ios-cloud-upload" size="52" style="color: #3399ff"></Icon>
                  <p> بنر خود را در این قسمت بکشید یا کلیک کنید </p>
                </div>
              </Upload>
              <div v-if="errorMessage && !uploaded">
                <span v-for="m in errorMessage" class="text-danger">{{m}}</span>
              </div>
              <span>سایز پیشنهادی : 175px * 1400px</span>
              <div class="banner-preview">
                <img v-if="uploaded" :src="appurl+'/images/company/' + Company.banner"
                     :alt="Company.name_fa" >
              </div>
              <div class="delete-banner text-left" v-if="uploaded">
                <Icon type="md-trash" @click="deleteBanner" />
              </div>
            </FormItem>

            <FormItem class="col-md-6 m-auto">
              <Button :loading="modal_loading" @click="uploadBanner()"
                      type="primary" class="karavel-btn">ثبت تغییرات</Button>
            </FormItem>
          </div>
        </Form>
      </div>
    </div>
  </div>
</template>
<script>

export default {
  data(){
    return{
      modal_loading: false ,
      uploaded : false ,
      errorMessage :''
    }
  },
  mounted() {
    this.$store.dispatch('Company/Company/LoadCompanyUser')
  },
  computed:{
    appurl() {
      return this.$store.state.globalFunctions.APP_URL
    },
    user(){return this.$store.state.User.User.User},
    Company(){return this.$store.state.Company.Company.Company;},
  },
  watch:{
    Company() {
      if(this.Company.banner)  this.uploaded = true
    }
  },
  methods: {
    handleBannerSuccess (res , file) {
      if(res.data.error == true){
        this.errorMessage = res.data.message
      }
      else {
        this.Company.banner = res.data.data;
        this.errorMessage = ''
        this.uploaded = true
      }

    } ,
    deleteBanner() {
      this.Company.banner = '';
      this.uploaded = false
    },
    uploadBanner () {
      this.modal_loading=true;
      this.$store.dispatch('Company/Company/EditCompany',this.Company)
        .then(success =>{
          this.$store.dispatch('globalFunctions/SuccessNotify' , success.data.data.message)
        })
        .catch(error =>{
          this.$store.dispatch('globalFunctions/ErrorNotify' , success.data.data.message)
        })
        .finally(() =>{this.modal_loading=false;})
    },
  }
}

</script>
<style>
.ivu-btn {

  width: 100%;
}
.ivu-upload-select {
  width: 100%;
}
.ivu-col-span-12 {
  width: 100% !important;
}

.ivu-form .ivu-form-item-label {
  float: right !important;
  font-size: 15px !important;
}
.ivu-form-item-error-tip {
  left: inherit !important;
}

.banner-preview img{
  width : 100% ;
  height : 124px
}
.delete-banner {
  font-size :  27px;
}
</style>
