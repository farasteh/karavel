<template>
    <div>
        <loaidngBox v-if="Loading"></loaidngBox>
        <div v-else>
            <div class="box-list-jobs-info" v-if="AdvetisingList.length == 0">
                <p class="p-3 text-center">
                شما فرصت‌‌های شغلی مناسب خود را نشان‌نکرده‌اید با نشان کردن فرصت‌های شغلی می‌توانید آن‌ها را از طریق این صفحه بررسی‌کرده و سپس رزومه‌ی خود را برای فرصت‌های ارائه‌شده ارسال نمایید  .
                </p>
            </div>
            <Box v-else v-for="(List,index) in AdvetisingList" :key="index"
            :List="List" :index="index" :User="User"></Box>
        </div>


    </div>
</template>
<script>

import Box from "./box";
import  loaidngBox from '../../Loading/advertisingBoxLoading'

export default {
    name : 'liked' ,
    components: {
        loaidngBox ,
        Box
    },
    data(){
        return{
            Loading : false
        }
    },
    computed:{
        User() { return this.$store.state.User.User; },
        AdvetisingList() {return this.$store.state.Favorites.likedAds} ,
    },
    created(){

    },
    mounted(){
        this.Loading = true
        this.$store.dispatch('loadLikedAds').then(res => { this.Loading = false});
    },
    watch: {
    },
    methods: {
    },

}
</script>
<style>

.box-user-resume{
    box-shadow: 0 15px 30px 0 rgba(0, 0, 0, 0.11), 0 5px 15px 0 rgba(0, 0, 0, 0.08);
    border-radius: 0.5rem;
    border: 0px;
    padding: 10px;
}
.ivu-form .ivu-form-item-label{
    color: #949494 !important;
}
.text-box{
    font-size: 16px;
    padding: 16px;
}
.center-form-base{
    display: flex;
    justify-content: center;
    justify-items: baseline;
    align-items: self-end;
    justify-content: center;
    flex-wrap: wrap;
    }
    .ivu-select-single .ivu-select-selection .ivu-select-placeholder, .ivu-select-single .ivu-select-selection .ivu-select-selected-value{
        padding-right: 0 !important;
    }
    .ivu-select-input{
        padding: 0 5px 0 8px !important;
    }
</style>
