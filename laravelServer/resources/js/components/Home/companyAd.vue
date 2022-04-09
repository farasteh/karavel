<template>
    <div v-if="loading"><notice-loading/></div>
    <a v-else @click="openAd">
        <div class="jobs-home-box-ad-singgle d-flex justify-content-center align-items-center flex-column">
            <img :src="CompanyImage" width="90px" height="90px" :alt="company.company.name_fa" @error="imageError">
            <p class="mt-1 mx-1 text-center text-dark">{{company.company.name_fa}}</p>
        </div>
    </a>
</template>

<script>
import noticeLoading from "../Loading/noticeLoading";

export default {
    name: "companyAds" ,
    props :  ['company' , 'loading'] ,
    components : {noticeLoading},
    data() {
        return {
            ErrorImage : false ,

        }
    },
    methods :  {
        imageError ()  {
            this.ErrorImage = true
        },
        openAd() {
            let routeUrl = this.$router.resolve({
                name: 'SiteShowCompany' ,
                params: {name: this.pathName} ,
                query : { notice : true }
            });
            window.open(routeUrl.href, '_blank');
        },
    },
    computed : {
        pathName() {
            var namee = this.company.company.name_en
            if(namee) {
                namee = namee.toLowerCase()
                namee = namee.replace(/\s/g, '-')
                return this.company.company.id + '-' + namee
            }
        },
        CompanyImage() {
            if(this.ErrorImage)
                return  '/images/company/no-company.png'
            return this.company.company.logo
        },
    }
}
</script>

<style scoped>
.jobs-home-box-ad-singgle {
    background: #fff;
    padding: 10px 0;
    border : 1px solid #eee;
    border-radius: 5px;
}
</style>
