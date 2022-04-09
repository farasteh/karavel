<template>
    <div class="w-75 m-auto">
        <p style="text-align: center;">
          {{getRanks}}%
        <span>رزومه شما کامل شده</span>
        </p>
        <div class="progress">
            <div class="progress-bar bg-success" role="progressbar" :style="'width : ' + getRanks + '%'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
    </div>
</template>

<script>
import Languge from "../../../../stores/Modules/Languge/Languge";
import ArticlesResume from "../../../../stores/Modules/Member/Resume/Articles";

export default {
   name: "ranks",
    data(){
       return{
           ranks : '40'
       }
    },
    created() {
        this.$store.dispatch('LoadBaseResume');
        this.$store.dispatch('LoadRecordJob');
        this.$store.dispatch('LoadRecordStudy');
        this.$store.dispatch('LoadLangageRsume');
        this.$store.dispatch('LoadArticlesResume');
    },
    computed:{
       getRanks() {
           var ranks = 0
           if (this.$store.state.BaseRezome.Base.name != '') {
               ranks += 5
           }
           if (this.$store.state.BaseRezome.Base.comment != '') {
               ranks += 15
           }
           if (this.$store.state.BaseRezome.Base.last_name != '') {
               ranks += 5
           }
           if (this.$store.state.BaseRezome.Base.job != '') {
               ranks += 2.5
           }
           if (this.$store.state.BaseRezome.Base.category_job != '') {
               ranks += 2.5
           }
           if (this.$store.state.BaseRezome.Base.mobile != '') {
               ranks += 5
           }
           if (this.$store.state.RecordStudy.UpdateRecordStudy.items.length !== 0 ) {
               if(this.$store.state.RecordStudy.UpdateRecordStudy.items[0].document != '' ) {
                   ranks += 15
               }
           }
           if (this.$store.state.RecordJob.UpdateRecordJob.items.length !== 0 ) {
               if(this.$store.state.RecordJob.UpdateRecordJob.items[0].job_side != '' ) {
                   ranks += 5
               }
               if(this.$store.state.RecordJob.UpdateRecordJob.items[0].job != '' ) {
                   ranks += 5
               }
               if(this.$store.state.RecordJob.UpdateRecordJob.items[0].cooperation_type != '' ) {
                   ranks += 5
               }
           }
           if (this.$store.state.LangaugeResume.UpdateLanguge.items.length !== 0 ) {
               if(this.$store.state.LangaugeResume.UpdateLanguge.items[0].lang_id != '' ) {
                   ranks += 15
               }
           }

           if (this.$store.state.ArticlesResume.Articles.items.length !== 0 ) {
               if(this.$store.state.ArticlesResume.Articles.items[0].effect != '' ) {
                   ranks += 20
               }
           }
           return ranks;
       }
    }
}
</script>
<style scoped>

</style>
