<template>
     <div v-if="job.id != null"  class="col-12  col-md-3 col-sm-6 mt-4">

             <div class="box-image-list flex-column"
                  :style="{ backgroundImage: 'url(../../../images/company/' + job.image + ')' }">
                 <router-link :to="{ name : 'SiteJobs' , query: {job1: job.id } }" style="z-index: 999;color: #fff;opacity: .7;">
                     {{job.title}}
                 </router-link>
                <div style="line-height: 20px;padding: 0 15px;">
                      <span v-for="(cat , index) in job.jobCategory" :key="cat.id"
                            style="padding: 2px;font-size: 12px;">
                          <router-link :to="{ name : 'SiteJobs' , query: {job1: job.id , job2 : cat.id } }" style="color: #fff;opacity: .7;z-index: 999; position:relative;">
                               [ {{cat.title}} ]
                         </router-link>
                     </span>
                </div>
             </div>
     </div>
</template>

<script>
export default {
    name: "BoxImageJobHome" ,
    props : ['job']
}
</script>

<style scoped>

</style>
