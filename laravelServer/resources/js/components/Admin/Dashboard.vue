<template>
    <div>
    <div style="color:#fff" class="row m-t-25">
        <div class="col-sm-6 col-lg-3">
            <div class="overview-item overview-item--c1">
                <div class="overview__inner">
                    <div class="overview-box text-center clearfix">
                        <div class="icon">
                            <i class="zmdi zmdi-account-o"></i>
                        </div>
                        <div class="text">
                            <h2>{{ companyCount }}</h2>
                            <span>تعداد کارفرما</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="overview-item overview-item--c2">
                <div class="overview__inner">
                    <div class="overview-box text-center clearfix">
                        <div class="icon">
                            <i class="zmdi zmdi-shopping-cart"></i>
                        </div>
                        <div class="text">
                            <h2>{{ MemberCount }}</h2>
                            <span>تعداد کارجو</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="overview-item overview-item--c3">
                <div class="overview__inner">
                    <div class="overview-box text-center clearfix">
                        <div class="icon">
                            <i class="zmdi zmdi-money"></i>
                        </div>
                        <div class="text">
                            <h2>{{ resumesCount }}</h2>
                            <span>تعداد رزومه های ارسالی</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="overview-item overview-item--c4">
                <div class="overview__inner">
                    <div class="overview-box text-center clearfix">
                        <div class="icon">
                            <i class="zmdi zmdi-money"></i>
                        </div>
                        <div class="text">
                            <h2> {{ ActiveAdvertising }}</h2>
                            <span>لیست آگهی های فعال</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="overview-item overview-item--c5">
                <div class="overview__inner">
                    <div class="overview-box text-center clearfix">
                        <div class="icon">
                            <i class="zmdi zmdi-money"></i>
                        </div>
                        <div class="text">
                            <h2> {{ notSeenAds }}  </h2>
                            <span>   لیست آگهی های بررسی نشده</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="overview-item overview-item--c6">
                <div class="overview__inner">
                    <div class="overview-box text-center clearfix">
                        <div class="icon">
                            <i class="zmdi zmdi-money"></i>
                        </div>
                        <div class="text">
                            <h2> {{noAds}} </h2>
                            <span>   لیست آگهی های رد شده</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
    </div>
</template>
<script>
import axios from "axios";
export default {
    data() {
        return {
            companyCount : 0  ,
            MemberCount : 0 ,
            resumesCount : 0 ,
            ActiveAdvertising : 0 ,
            notSeenAds : 0 ,
            noAds : 0 ,
         }
    },
    created() {
        axios.get('api/v1/getCountDetailedData')
            .then(response => {
                let counts = response.data
                this.companyCount = counts.company
                this.MemberCount = counts.base
                this.ActiveAdvertising = counts.activeAds
                this.resumesCount  = counts.resumes
                this.notSeenAds = counts.notSeenAds
                this.noAds = counts.noAds
            })
    }
}
</script>
<style >
.overview-item {
    -webkit-border-radius: 10px;
    -moz-border-radius: 10px;
    border-radius: 10px;
    padding: 30px;
    padding-bottom: 0;
    -webkit-box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.1);
    -moz-box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.1);
    box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.1);
    margin-bottom: 40px;
}
@media (min-width: 992px) and (max-width: 1519px) {
    .overview-item {
        padding-left: 15px;
        padding-right: 15px;
    }
}

.overview-item--c1 {
    background-image: -webkit-linear-gradient(90deg, #3f5efb 0%, #fc466b 100%);
    height: 160px;
}

.overview-item--c5 {
    background-image: -webkit-linear-gradient(90deg, #3f5efb 20%, #fc466b 80%);
    height: 160px;
}
.overview-item--c2 {

    background-image: -webkit-linear-gradient(90deg, #11998e 0%, #38ef7d 100%);
    height: 160px;
}

.overview-item--c6 {

    background-image: -webkit-linear-gradient(20deg, #ee0979 20%, #dce35b 80%);
    height: 160px;
}
.overview-item--c3 {
    background-image: -webkit-linear-gradient(90deg, #ee0979 0%, #ff6a00 100%);
    height: 160px;
}

.overview-item--c4 {
    background-image: -webkit-linear-gradient(90deg, #45b649 0%, #dce35b 100%);
    height: 160px;
}

.overview-box .icon {
    display: inline-block;
    vertical-align: top;
    margin-right: 15px;
}

.overview-box .icon {
    display: inline-block;
    vertical-align: top;
    margin-right: 15px;
}
.overview-item--c1 {
    background-image: -moz-linear-gradient(90deg, #3f5efb 0%, #fc466b 100%);
    background-image: -webkit-linear-gradient(90deg, #3f5efb 0%, #fc466b 100%);
    background-image: -ms-linear-gradient(90deg, #3f5efb 0%, #fc466b 100%);
}

</style>
