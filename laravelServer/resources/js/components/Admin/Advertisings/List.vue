<template>
    <div>
        <loading :active.sync="loading"
                 :is-full-page="fullPage"></loading>
        <div class="row">
            <div @click="search = 'Pending' "
                style="margin: auto;" class="col-4 box-fillter-header-admin"
                 :class="{active : search == 'Pending'  }">
                <span>در انتظار بررسی</span>
            </div>
            <div @click="search = 'no' "
                style="margin: auto;" class="col-4 box-fillter-header-admin"
                 :class="{active : search == 'no'  }">
                عدم تایید
            </div>
            <div @click="search = 'yes' "

                 style="margin: auto;" class="col-4 box-fillter-header-admin"
                 :class="{active : search == 'yes'  }">
                تایید شده
            </div>
        </div>
        <div class="row">
            <div v-if="List.length == 0 && loading == false" class="box-box-list-jobs-admin col-12 text-center text-primary">
                در این دسته آگهی وجود ندارد
            </div>
            <BoxListAdmin v-for="advertising in List" v-bind:key="advertising.id" :contact="advertising" :place="'advertising'"></BoxListAdmin>
        </div>
    </div>
</template>
<script>
import BoxListAdmin from "./Box.vue"
import Loading from 'vue-loading-overlay';
// Import stylesheet
import 'vue-loading-overlay/dist/vue-loading.css';
export default {
    components: {
        'BoxListAdmin':BoxListAdmin,
        Loading
    },
    data () {
        return {
            search : 'Pending' ,
            loading : false ,
            fullPage : false
        }
    },
    mounted() {
        this.loading = true
        this.$store.dispatch('LoadAdminAdvertisings')
            .then( response => {
                this.loading  = false
            })
    },
    computed: {
        List() { return this.$store.getters.searchedCompanyAds(this.search)}
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
.box-fillter-header-admin.active {
    background: #f0faff;
    color: #000;
}
.ivu-modal-close .ivu-icon-ios-close {
    font-size: 36px !important;
}
</style>
