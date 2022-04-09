<template>
  <div>
    <div class="box-A karavel-box d-md-block d-none" v-for="(resume , index ) in resumes" :key="'J' + resume.id">
      <div class="row ">
        <div class="col-12 col-md-2  center-Object">
          <img class="company-logo" :src="!resume.image ? '/images/company/no-photo.jpg' : appurl+'/images/company/' + resume.image "/>
        </div>
        <div class="col-12 col-md-2 center-Object">
          {{resume.name}} {{resume.last_name}}
          <span class="text-center">( %{{resume.rank}} )</span>
        </div>
        <div class="col-12 col-md-3 center-Object">

          <div v-for="(status , index) in statusList" :key="index"
               v-if="resume.status == status.id"  class="label-badge" :class="setColor(status.id)">
            {{status.title}}
          </div>
        </div>
        <div class="col-12 col-md-2 center-Object">
          {{resume.sendDate}}
        </div>
        <div class="col-12 col-md-3 center-Object">
          <Button @click="careateModel(resume);"  type="primary" class="karavel-btn">مشاهده جزییات</Button>
        </div>

      </div>
    </div>
    <div class="box-A karavel-box d-md-none" v-for="(resume , index ) in resumes" :key="index">
      <div class="row">
        <div class="col-3 col-sm-2  center-Object">
          <img class="company-logo" :src="!resume.image ? '/images/company/no-photo.jpg' : appurl+'/images/company/' + resume.image "/>
        </div>
        <div class=" col-9 col-sm-6 d-flex justify-content-center pr-0 flex-column">
          <p>
            {{resume.name}} {{resume.last_name}}
          </p>
          <p>
            {{resume.sendDate}}
          </p>
        </div>
        <div class="col-6 col-sm-4 center-Object mx-auto my-2">
          <div v-for="(status , index) in statusList" :key="index"
               v-if="resume.status == status.id"  class="label-badge w-100" :class="setColor(status.id)">
            {{status.title}}
          </div>
        </div>
        <div class="col-12 col-md-3 center-Object">
          <Button @click="careateModel(resume);"  type="primary" class="karavel-btn">مشاهده جزییات</Button>
        </div>

      </div>
    </div>
  </div>
</template>
<script>


export default {

  props : ['resumes' , 'adId'],
  data() {
    return {
      resume : '',
      id : '',
      all : false ,
      form : {
        status  : '' ,
        comment : '' ,
        resume : '',
        Companycomment : ''
      } ,
      arch : ''
    }
  },
  computed : {
    appurl() {
      return this.$store.state.globalFunctions.APP_URL
    },
    statusList() { return this.$store.state.Company.resumeStatus.statusList}
  },

  methods : {

    setColor(id) {
      return `background-${id}`
    },
    careateModel (resume) {
      this.$emit('myEvent')
      this.$router.push({path : `/posts/resume/${this.adId}/${resume.id}` })
    },
    saveChanges () {
      this.form.resume = this.id
      this.$store.dispatch('Company/advertizing/updateResumeStatus' , {'id' : this.adId  , 'form' : this.form})
        .then( response => {

          this.$notify({
            group: 'success',
            width : '400px',
            title: 'success',
            text: response.data.message,
            timer: 3000
          });
          this.modal11 = false
        })
        .catch(error => {
          console.log(error)
          this.modal_loading = false;
          this.$notify({
            group: 'foo',
            width : '400px',
            title: 'خطا!',
            text: 'با خطا مواجه شدید لطفا دوباره تلاش کنید.',
            timer: 3000
          });
        });
    }
  }
}
</script>
<style>
.ivu-modal-header p, .ivu-modal-header-inner  , .ivu-modal-header{
  text-align: center !important;
}
.company-logo {
  width: 50px ;
  height: 50px;
  border-radius: 50%;
}
.center-Object {
  display: flex;
  justify-content: center;
  align-items: center;
}
</style>
