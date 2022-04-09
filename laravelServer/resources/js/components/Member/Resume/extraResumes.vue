<template>
    <div class="container-fluid">
        <span class="text-box">رزومه های آپلودی شما</span>

        <loadings class="box-A" v-if="loading"></loadings>
        <div class="row" v-else>
            <div class="box-list-jobs-info" v-if="memberAdvertizing.length == 0">
                <p class="p-3 text-center">
                    شما هیچ رزومه متفرقه ای ندارید.
                </p>
            </div>
            <div   class="box-A col-12" v-for="(advertizing , index ) in memberAdvertizing" :key="index" v-if="advertizing.file">
                <div style="display: flex !important;align-items: center !important;justify-content: center;flex-wrap: wrap;" class="row text-center">
                    <div class="col-md-4">
                            <a @click="openResume(advertizing.file)">
                                {{ advertizing.file }}
                            </a>
                    </div>
                    <div class="col-md-4">
                        <p class="py-2">
                            ارسال شده برای آگهی
                            <span>{{ advertizing.title }}</span>
                        </p>
                    </div>
                    <div class="col-md-4">
                        <p class="py-2">
                            <span>{{ advertizing.craeted }}</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>
<script>
import loadings from '../../Loading/skillLoading'
export default {
    components : {
        loadings
    },
    data() {
        return {
            loading : false
        }
    },
    created() {
        this.loading = true
        this.$store.dispatch('LoadMemberAdvertizing')
            .then(res => {
                this.loading = false
            })
    },
    computed: {
        memberAdvertizing() {
            return this.$store.state.MemberAds.memberAdvertizingList
        }
    },

    methods: {
        openResume(file) {
            window.open(`pdfs/resume/${file}`, "_blank");
        }
    }
}
</script>
<style scoped>
.box-stuatus{
    height: 100%;
    width: 6px !important;
    position: absolute;
    right: 0;
    top: 0;
    border-radius: 0px 24px 25px 0px !important;
    padding: 0 !important;
}
.badge {
    display: inline-block;
    padding: .35em .65em;
    font-size: .75em;
    font-weight: 700;
    line-height: 1;
    color: #fff;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: .25rem;
}
.label-badge {
    padding: 3px 7px;
    color: #fff;
    font-size: 13px;
    text-align: center;
    width: 130px;
}

.background-1 {
    background: #c7e9ff !important;
}

.background-2 {
    background: #f8f5d3 !important;
}

.background-3 {
    background: #e3faec !important;
}

.background-5 {
    background: #fbe7e7 !important;
}

.background-4 {
    background: #e3faec !important;
}

.background-6 {
    background: #f7f8fa !important;
}
.ivu-checkbox-wrapper.ivu-checkbox-group-item {
    margin: 10px 0 !important;
}
</style>
