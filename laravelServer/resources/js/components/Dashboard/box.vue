<template>
    <div  style="">
        <loading :active.sync="loading" :is-full-page="fullPage"></loading>
    <div class="box-A">
        <div v-if="Advertisings.status == ''" class="back-stuatus box-stuatus"> </div>
        <div v-if="Advertisings.status == 'no'" class="back-stuatus-error box-stuatus"> </div>
        <div v-if="Advertisings.status == ''" class="col-2 mb-2 back-stuatus status-box"> در انتظار بررسی</div>
        <div v-if="Advertisings.status == 'no'" class="col-2 mb-2 back-stuatus-error status-box">تایید نشده</div>
        <!-- <div v-if="Advertisings.status == ''" class="box-stuatus"></div> -->
        <div class="row">
            <div class=" col-8 ">
                <span style="font-weight: bold;font-size: 16px;">
                    <router-link :to="{name: 'AdvertisingEdit',params : {id:Advertisings.id}}">
                        <span style="color: #515a6e">
                            {{Advertisings.title}}
                        </span>
                    </router-link>
<!--                    <span style="font-size: 13px">-->
<!--                        (-->
<!--                        <span>-->
<!--                            123-->
<!--                        </span>-->
<!--                        بازدید-->
<!--                        )-->
<!--                    </span>-->
                     <span style="font-size: 13px">
                        (
                        <span>
                           {{Advertisings.created_at}}
                        </span>
                        )
                    </span>
                </span>
            </div>
            <div class=" col-4 ">
                <Button  id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"  class="col-md-4 col-12 btn-default-job" ><Icon type="ios-settings" />تنضیمات</Button>
                    <div style="border-radius: .5rem;" class="dropdown-menu" aria-labelledby="navbarDropdown1">
                            <router-link tag="div" style="cursor: pointer;"  :to="{name: 'AdvertisingEdit',params : {id:Advertisings.id}}"   class="dropdown-item">
                                <Icon class="box-icon" type="md-create" />
                                <span>ویرایش</span>
                           </router-link>
                        <router-link tag="div"  style="cursor: pointer;" :to="{name: 'SiteShowJobIndex',params : {id:Advertisings.id}} "   class="dropdown-item">
                            <a href="" target="_blank" style="color : #000 !important">
                                <Icon class="box-icon" type="md-eye" />
                                <span>مشاهده درسایت</span>
                            </a>

                        </router-link>
                        <router-link to="#"  class="dropdown-item">
                        <Icon class="box-icon" type="ios-clock" />
                        <span>تمدید </span>
                        </router-link>
                        <div style="cursor: pointer;" @click="DeleteAdvertisings(Advertisings.id)" to="#"  class="dropdown-item">
                            <Icon class="box-icon" type="md-archive" />
                            <span> آرشیو غیر فعال کردن</span>
                        </div>
                    </div>
                </div>
            </div>
            <div style="text-align: center;margin-top: 10px;" class="row" v-if="Advertisings.status == 'yes'">
                <a @click="setfilter(status , status.id)" class="col-md-2 col-6 box-show" v-for="(status , index) in statusList"
                     :key="index">
                    <p v-if="">{{$store.getters.advertizingStatusCount(status.id,Advertisings.id)}}</p>
                    <div  tag="div" style="cursor: pointer;" >
                        <span>{{status.title}}</span>
                    </div>
                </a>
            </div>
        </div>

        <Modal
            v-model="modal11"
            width="900"
            footer-hide
            :title=" ' رزومه های ارسالی به آگهی ' + ad +  ' در وضعیت '   + stat" >
            <div class="text-center p-2" v-if="resumes.length == 0 ">نتایجی یافت نشد</div>
            <resumeList v-else :resumes='resumes' :adId="Advertisings.id" @myEvent="setModel"></resumeList>
        </Modal>

<!--        <div class="box-B" :class="{active : show[indexAD]}">-->
<!--            <div class="text-center p-2" v-if="resumes.length == 0 ">نتایجی یافت نشد</div>-->
<!--            <resumeList v-else :resumes='resumes' :adId="Advertisings.id"></resumeList>-->
<!--        </div>-->

</div>
</template>
<script>
import resumeList from '../company/resumeList'
import Loading from 'vue-loading-overlay';
// Import stylesheet
import 'vue-loading-overlay/dist/vue-loading.css';
export default {
    props:['Advertisings'],
    components: { 'resumeList': resumeList , Loading},
    data() {
      return {
          modal11 : false ,
          filterResume : [] ,
          indexAD : '' ,
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
            this.ad = this.Advertisings.title
            this.stat = status.title

        },
        DeleteAdvertisings(id) {

           // this.$emit('loading' , this.loading)
            this.$confirm("آیا از آرشیو این آگهی اطمینان دارید؟").then(() => {
                this.loading = true
                this.$store.dispatch('deleteCompanyAdvertizing', {id: id})
                    .then(success => {
                        this.$notify({
                            group: 'success',
                            width: '400px',
                            title: 'success',
                            text:' با موفقیت به لیست آرشیو ها اضافه شد,' ,
                            timer: 3000
                        });
                        this.loading = false
                    })
                    .catch(error => {
                        this.$notify({
                            group: 'foo',
                            width: '400px',
                            title: 'خطا!',
                            text: 'با خطا مواجه شدید لطفا دوباره تلاش کنید.',
                            timer: 3000
                        });
                    });
            })

        }
    } ,
    created() {
      //  this.$store.dispatch('LoadResumeStatus' , {'id' : this.Advertisings.id})
    } ,
    computed : {
        statusList() { return this.$store.state.resumeStatus.statusList} ,
        // allResumes(){
        //     return this.$store.getters.resumeStatus(this.filterResume)
        // }
        resumes () { return this.$store.getters.resumesCompany(this.Advertisings.id , this.filterResume )}
    }
}
</script>

<style scoped>
.selected {
    background: #2d8cf0;
    color: #fff !important;
}
.box-show{
    margin-bottom: -10px;
    color: #000;
    font-size: 13px;
}
.box-show:hover {
    background: #2d8cf0;
    color: #fff;
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

</style>
