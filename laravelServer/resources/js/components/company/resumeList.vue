<template>
   <div>
        <div class="box-A" v-for="(resume , index ) in resumes" :key="index">
            <div class="row">
                <div class="col-12 col-md-2  center-Object">
                   <img class="company-logo" :src="!resume.image ? '/images/company/no-photo.jpg' :'/images/company/' + resume.image "/>
                </div>
                <div class="col-12 col-md-2 center-Object">
                    {{resume.name}} {{resume.last_name}}
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
                    <Button @click="careateModel(resume);"  type="primary">مشاهده جزییات</Button>
                </div>

            </div>
        </div>
   </div>
</template>
<script>

import pdf from './pdf/pdf'
import axios from 'axios'
import resumeList from './resumeList'
import Detail from "./detail";
export default {
    components: {Detail, 'pdf': pdf},
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
        statusList() { return this.$store.state.resumeStatus.statusList}
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
            this.$store.dispatch('updateResumeStatus' , {'id' : this.adId  , 'form' : this.form})
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
<style >
.fixed-modal {
    border-top: 1px solid rgba(0,0,0,.1);
    position: sticky !important;
    top: 0;
}
.box-user-resume{
    box-shadow: 0 15px 30px 0 rgba(0, 0, 0, 0.11), 0 5px 15px 0 rgba(0, 0, 0, 0.08);
    border-radius: 0.5rem;
    border: 0px;
    padding: 10px;
}
.btn-delet-form{
    position: absolute;
    width: 78px;
    left: 10px;
    color: red;
}
.label-badge {
    padding : 7px ;
    color: #fff;
    font-size: 13px;
    text-align: center;
}
.background-1 {
    background : #89caf5 !important;
}
.background-2 {
    background :#e3dd98 !important;
}
.background-3 {
    background : #8dd6aa !important;
}
.background-5 {
    background : #db9797 !important;
}
.background-4 {
    background : #8adbaa !important;
}
.background-6 {
    background : #87a7e6 !important;
}
.ivu-modal-close .ivu-icon-ios-close {
    font-size: 50px !important;
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
.ivu-modal-header p, .ivu-modal-header-inner  , .ivu-modal-header{
    text-align: center !important;
}
</style>
