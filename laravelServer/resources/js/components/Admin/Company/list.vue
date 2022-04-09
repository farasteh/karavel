<template>
    <div>
        <div class="row">
            <div class=" col-6 mb-2">
                <h2 style="font-weight: 600;font-size: 22px;">لیست شرکت ها  </h2>
            </div>
            <div class="col-12">
                <Input size="large" v-model="search" search enter-button placeholder="جستجو در عنوان شرکت ها" />
            </div>
        </div>
        <loading :active.sync="loading"
                 :is-full-page="fullPage"></loading>
        <div>
            <div v-if="companies.length == 0 && loading == false">
                <div class="box-A text-center text-danger" >
                    نتیجه ای یافت نشد
                </div>
            </div>
            <CompanyBox  v-for="(company,index) in companies" :key="index" :company="company" ></CompanyBox>
        </div>
    </div>
</template>
<script>
import CompanyBox from "./Box.vue"
import Loading from 'vue-loading-overlay';
// Import stylesheet
import 'vue-loading-overlay/dist/vue-loading.css';

export default {
    name : 'companyList' ,
    components: {
        'CompanyBox': CompanyBox,
        Loading
    },
    data () {
        return {
            loading : false ,
            fullPage: false  ,
            search : ''
        }
    },
    mounted() {
    },
    created() {
        this.loading = true
        this.$store.dispatch('LoadAdminCompanies')
        .then(response => {
            this.loading = false
        });
    },
    computed : {
            companies () { return this.$store.getters.searchedCompanies(this.search)}
    },
    methods: {
    }
}
</script>
<style>
.box-fillter-header-admin{
    margin: auto;
    margin-top: auto;
    background-color: rgb(255, 255, 255);
    background-clip: border-box;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,.12), 0 2px 4px 0 rgba(0,0,0,.08);
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid transparent;
    padding: 15px;
    margin-top: 16px !important;
    cursor: pointer;
    text-align: center;
    height: 60px;
}
.box-fillter-header-admin:hover{
    background: #f0faff;
}


</style>
