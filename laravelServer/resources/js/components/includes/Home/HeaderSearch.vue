<template>
    <div>
        <section class="box-header-home">
                <div ></div>
                <div class="box-search-header">
                    <div class="col-10 col-md-10 col-lg-10 row m-auto d-flex justify-content-center">

                        <div class="col-12 col-lg-2 col-sm-6 py-0 px-1 mt-1">
                            <v-select
                                :class="{ vselectHide  : showJob }"
                                class="style-chooser"
                                placeholder="دسته بندی شغلی"
                                label="title" :options="jobs"
                                @input="JobCategoryList()"
                                v-model="form.Job"
                                :reduce="d => d.id" taggable></v-select>
                        </div>
                        <div class="col-12 col-lg-2 col-sm-6 py-0 px-1 mt-1">
                            <v-select
                                :class="{ vselectHide  : showJob }"
                                class="style-chooser"
                                placeholder="زیرمجموعه شغلی"
                                label="title" :options="jobCategories"
                                @input="WorkCategoryList()"
                                v-model="form.Job1"
                                :reduce="d => d.id" taggable></v-select>
                        </div>
                        <div class="col-12 col-lg-3 col-sm-6 py-0 px-1 mt-1">
                            <v-select
                                :class="{ vselectHide  : showJob }"
                                class="style-chooser multi-style-chooser"
                                placeholder="تخصص نهایی"
                                label="title" :options="workJobs"
                                v-model="form.model14"
                                :reduce="d => d.id"
                                multiple
                                taggable>
                            </v-select>
                        </div>
                        <div class="col-12 col-lg-2 col-sm-6 py-0 px-1 mt-1">
                            <v-select
                                :class="{ vselectHide  : showProvince }"
                                class="style-chooser"
                                placeholder="استان"
                                label="title" :options="ProvincesList"
                                v-model="form.province"
                                :reduce="d => d.id"
                                taggable></v-select>
                        </div>
                         <Button class="col-12 col-lg-2 py-0 px-1 mt-1" @click="SearchJob" style="height: 50px;" size="large" type="primary">
                                <span v-if="!loadingB">جستجو</span>
                                <span v-else>
                                    <Loadingbutton  :loading="loadingB" />
                                </span>
                        </Button>
                    </div>
                </div>
            </section>
    </div>
</template>

<script>

import vSelect from 'vue-select'
import 'vue-select/dist/vue-select.css';

    export default {
        components : { vSelect } ,
        data () {
            return {
                showJob  : true ,
                showProvince :  true ,
                loadingB: false,
                form : {
                    Job : '',
                    Job1: '' ,
                    model14 : [] ,
                    province : ''
                }
            }
        },
        created() {
            if(Object.keys(this.$route.query).length != 0 )
            {
                if(this.$route.query.job1 != '')
                    this.form.Job = parseInt(this.$route.query.job1)
                if(this.form.Job)
                {
                    if(this.$route.query.job2 != '')
                        this.form.Job1 = parseInt(this.$route.query.job2)
                }
                if( this.form.Job && this.form.Job1  )
                {
                    if(this.$route.query.job3 != undefined )
                    {
                        if( Array.isArray(this.$route.query.job3))
                        {
                            this.form.model14 = this.$route.query.job3.map(x => {return parseInt(x)});
                        }
                        else
                            this.form.model14.push(parseInt(this.$route.query.job3))
                    }
                }
                if (this.$route.query.province != '')
                    this.form.province = parseInt(this.$route.query.province)
                this.$store.commit('SET_SEARCH_FORM' , this.form )
            }
            else {
                let nullForm =  {
                        Job : '',
                        Job1: '' ,
                        model14 : [] ,
                        province : ''
                }
                this.$store.commit('SET_SEARCH_FORM' , nullForm )
            }
        },
        mounted() {
            this.$store.dispatch('LoadAdJobs').then(response =>  { this.showJob = false})
            this.$store.dispatch('LoadProvinces').then(response => { this.showProvince = false})
        },
        computed :{
            jobs() {
                var jobs = this.$store.state.Job.adJobs
                if(jobs)
                {
                    let ad = jobs.find(ad => ad.title == 'همه')
                    if(ad == undefined)
                        jobs.unshift({id : null , title  : 'همه'})
                }
                return jobs
            },
            jobCategories()
            {
                var categories = this.$store.getters.getAdJobcategory(this.form.Job)
                if(categories)
                {
                    let ad = categories.find(ad => ad.title == 'همه')
                   if(ad == undefined)
                        categories.unshift({id : null , title  : 'همه'})
                }
                return categories
            } ,
            workJobs() {
                var workjobs = this.$store.getters.AdworkCategories(this.form.Job , this.form.Job1 )
                if(workjobs)
                {
                    let ad = workjobs.find(ad => ad.title == 'همه')
                   if(ad == undefined)
                        workjobs.unshift({id : null , title  : 'همه'})
                }
                return  workjobs
            } ,
            ProvincesList()
            {
                var provinces  = this.$store.state.Province.provinces
                if(provinces )
                {
                    let ad = provinces.find(ad => ad.title == 'همه')
                    if(ad == undefined)
                        provinces.unshift({id : null , title  : 'همه'})
                }
                return provinces
            },
            searchParam() { return this.$store.state.AdvertisingSit.form} ,
        },
        methods: {
            JobCategoryList() {
                this.form.Job1 = ''
                this.form.model14 = []
            },
            WorkCategoryList() {
                this.form.model14 = []
            },
            SearchJob(){
                if(this.searchParam.model14)
                    if(this.searchParam.model14.length != 0 )
                        if(this.searchParam.model14.includes(null))
                        {
                            this.searchParam.model14 = []
                            this.searchParam.model14.push(null)
                        }
                this.$store.commit('SET_SEARCH_FORM' , this.form )
                this.loadingB = true;
                this.$store.dispatch('LoadAdvertisingList'  , this.searchParam ).then(response => {this.loadingB = false;   this.$emit('setfilter')});
                this.$router.replace({
                    name:"SiteJobs",
                    query: {job1: this.searchParam.Job , job2 : this.searchParam.Job1 , job3 : this.searchParam.model14 , province : this.searchParam.province  } })
                    .catch(() => {});

            },
        }
    }
</script>
<style scoped>

.vselectHide .vs__selected {
    visibility: hidden;
}

.box-header-home{
    background-image: url("/images/header.jpg");
    background-size: cover;
    box-shadow: inset 0 0 90px -20px rgba(12, 13, 13, 0.9);
    background-position: center;
}
.box-search-header{
    height: 180px;
    color: #fff;
    font-size: 18px;
    display: flex !important;
    align-items: center !important;
    justify-content: center;
    flex-wrap: wrap
}
.v-select.style-chooser {
    background: #fff;
    border-radius: 4px;
    height: 50px;
    line-height: 50px;
    font-size: 14px;
}
.vs__dropdown-menu  {
    direction: rtl !important;
}
#vs3__combobox.vs__dropdown-toggle {
    border: none !important;
}
.v-select.style-chooser .vs__dropdown-toggle {
    height: 50px !important;
}
.style-chooser .vs__selected-options  {
    visibility: hidden !important;
}
.vs__dropdown-toggle {
    min-height: 50px !important;
    background: #fff;
}
@media screen and (max-width: 990px) {
    .box-search-header  {
        height: 210px;
    }
}
@media screen and (max-width: 576px){
    .box-search-header {
        height: 340px;
    }
}

</style>
