<template>
    <div class="col-12 col-xl-6" >
        <div class="box-list-jobs">
            <div v-if="">
                <Icon v-if="!like"  @click="liked" class="box-icon-jobs" type="ios-bookmark-outline" />
                <Icon v-if="like"  @click="disliked" class="box-icon-jobs" type="ios-bookmark" />
             </div>
            <div class="advertizing-half-box">
                <div class="advertizing-half-box-image">
                    <img v-if="ErrorImage"  src="/images/company/no-company.png" style="cursor: pointer"  :alt="List.title">
                    <img v-else :src="List.Company.logo" style="cursor: pointer"  :alt="List.title" @error="imageError">
                </div>
                <div class="center-box">
                    <div class="mr-2">
                        <h3 class="my-3 px-0" style="word-spacing: -1px">
                            <a @click="openAd" >
                                {{List.title}}
                            </a>
                        </h3>
                        <div class="d-flex flex-column">
                            <div class="mb-2 px-0">
                                <i class="fas fa-building"></i>
                                <span  v-if="List.Company" class="pr-1">
                                    {{List.Company.name_fa }}
                                </span>
                            </div>
                            <div class="mb-2 px-0">
                                <i class="fas fa-map-marker-alt"></i>
                                <span v-if="List.province" class="pr-1">
                                    {{List.province.title}} ، {{List.city.title}}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="my-2 px-3 d-flex justify-content-between" style="line-height: 32px;">
                     <div>
                       {{List.created_at}}
                    </div>
                    <div v-if="memberRole == 'Member' && $store.getters.SimilarHasSent(List.id , User.member.id)">
                        <p>
                            رزومه ارسال شده
                            <span><Icon type="md-checkmark" class="sent-title-icon"/></span>
                        </p>
                    </div>
                    <router-link v-else tag="a" :to="{name: 'SiteShowJobIndex', params: {id: this.List.id}}"  class="color-link">
                        <p>
                             ارسال رزومه
                            <span><Icon type="ios-return-left" class="sent-title-icon color-link" /></span>
                        </p>
                    </router-link>
            </div>
        </div>
    </div>
</template>
<script>

import axios from 'axios'
import HeaderCompany from "../../includes/Home/HeaderShowPage";
export default {
    name:"Box",
    props: ['List' , 'User' , 'index'],
    data() {
        return {
            ErrorImage : false ,
        }
    },
    methods : {
        imageError ()  {
            this.ErrorImage = true
        },
        openAd() {
            this.$router.replace({name: 'SiteShowJobIndex', params: {id: this.List.id}}).catch(() => {});
             // window.location.reload()
        } ,
        liked() {
            if(this.memberRole == 'Member')
            {
                this.$store.dispatch('LikeAdvertising' ,
                    {id : this.List.id , member : this.User.member.id})
                    .then(success => {
                        console.log(success)
                    }).catch(err => {
                    console.log(err)
                })
            }
            else if(this.memberRole == 'Company')
            {
                this.$notify({
                    group: 'foo',
                    width : '400px',
                    title: '  ',
                    text: ' شما با پروفایل کارفرما وارد شده اید',
                    duration: 1000,
                    speed: 1000,
                    closeOnClick: true,
                    classes: 'vue-notification success'
                });
            }
            else if(this.memberRole == 'Admin')
            {
                this.$notify({
                    group: 'foo',
                    width : '400px',
                    title: '  ',
                    text: ' شما با پروفایل ادمین وارد شده اید',
                    duration: 1000,
                    speed: 1000,
                    closeOnClick: true,
                    classes: 'vue-notification success'
                });
            }
            else {
                this.$notify({
                    group: 'foo',
                    width : '400px',
                    title: '  ',
                    text: 'لطفا ابتدا لاگین کنید',
                    duration: 1000,
                    speed: 1000,
                    closeOnClick: true,
                    classes: 'vue-notification success'
                });
            }

        } ,

        disliked () {
            this.$store.dispatch('dislikeAdvertising' ,
                {id : this.List.id , member : this.User.member.id})
                .then(success => {
                    console.log(success)
                }).catch(err => {
                console.log(err)

            })
        }  ,
    } ,

    computed :  {
        id() {
            if(this.memberRole == 'Member')
                if(this.User)
                    return this.User.member.id
        },
        memberRole() {
            return this.$store.getters.userRole
        },
        like() {
            if(this.User && this.List)
                if(this.memberRole == 'Member')
                    return this.$store.getters.LikedSimilarUsersList(this.List.id , this.User.member.id)
        },
        pathName() {
            var namee = this.List.Company.name_en
            namee = namee.toLowerCase()
            namee = namee.replace(/\s/g, '-')
            return this.List.Company.id + '-' + namee
        },
    },

    watch :  {
    },
    mounted() {

    }
}
</script>
<style scoped>
.color-link {
    color:  var(--var-advertising-feature-box-color) !important;
}
.vld-overlay .vld-icon {
    position: absolute !important;
    top: 100px !important;
}
.box-list-jobs{
    box-shadow: 0 4px 8px 0 rgba(0,0,0,.12), 0 2px 4px 0 rgba(0,0,0,.08);
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid transparent;
    border-radius: .5rem;
    padding: 15px 0 !important;
    margin-top: 16px !important;
    cursor: initial !important;
    position: relative;
}
.box-list-jobs:hover{
    box-shadow: 0 0 40px rgba(24,23,24,.2) !important;
}
.box-img {
    width: 80px;
    height: 80px;
}
.box-img img{
    width: 100%;
    height: 100%;
    border-radius: 50%;
}
.center-box{
    display: flex !important;
    align-items: center !important;
    padding-right: 15px;
    width: calc(100% - 110px);
}
.center-box h3{
    font-size: 18px;
}
.box-icon-jobs{
    position: absolute;
    left: 20px !important;
    top: -2px !important;
    font-size: 28px !important;
}
.padding-box-list{
    padding-right: 40px;
    padding-top: 5px;
}
.date-box {
    position: absolute;
    left: 0;
    bottom: 30px;
}
 .center-box h3 {
     font-size: 15px !important;
 }
 .box-list-jobs {
     padding: 0 !important;
     border-radius: 5px !important ;
 }
 .pr0 {
     padding-right: 0 !important;
 }
 .pl0 { padding-left: 0 !important}

 .advertizing-half-box {
     font-size: 13px;
     color: #888;
     border-bottom: 1px dashed #ddd;
     display: inline-flex;
     padding: 5px 0;
 }
@media screen and (max-width: 759px){
    .center-box h3{
        font-size: 15px !important;
    }
    .padding-box-list{
        padding-right: 0 !important;
    }
}
.box-list-activity{
    font-size: 13px;
    color: #717275;
}
.box-icon-jobs {
 position: absolute;
 left: 10px !important;
 top: 10px !important;
 font-size: 27px !important;
}
.advertizing-half-box-image {
    display: inline-block;
    text-align: center;
    width: 80px;
    height: 80px;
    position: relative;
    right: 10px;
}
.advertizing-half-box-image img{
    width: 100%;
    height: 100%;
    border-radius: 50%;
    border: 2px solid #62a6eea3;
    display: block;
}
.sent-title{
    height: 32px;
    line-height: 32px;
    text-align: center;
}
 .sent-title-icon {
     color: #61c9b0;
     font-size:25px
 }



</style>
