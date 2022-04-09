<template>
  <div class="w-100 text-center">
    <p class="text-center">
      {{getRanks}}%
      <span>رزومه شما کامل شده</span>
    </p>
    <Progress :percent="getRanks" :stroke-width="20" hide-info />

  </div>
</template>

<script>


export default {
  name: "ranks",
  data(){
    return{
      ranks : '20'
    }
  },
  created() {
      this.$store.dispatch('Member/Resume/BaseResume/LoadBaseResume')
    if(this.$store.state.Member.Resume.RecordJob.UpdateRecordJob.items.length == 0)
      this.$store.dispatch('Member/Resume/RecordJob/LoadRecordJob');
    if(this.$store.state.Member.Resume.RecordStudy.UpdateRecordStudy.items.length == 0 )
      this.$store.dispatch('Member/Resume/RecordStudy/LoadRecordStudy');
    if(this.$store.state.Member.Resume.Langauge.UpdateLanguge.items.length  == 0)
      this.$store.dispatch('Member/Resume/Langauge/LoadLangageRsume');
    if(this.$store.state.Member.Resume.Articles.Articles.items.length == 0 )
      this.$store.dispatch('Member/Resume/Articles/LoadArticlesResume');
    if(this.$store.state.Member.Resume.Project.Project.items.length == 0 )
      this.$store.dispatch('Member/Resume/Project/LoadProjectResume')
    if(this.$store.state.Member.Resume.Honors.HonorsResume.items.length == 0 )
      this.$store.dispatch('Member/Resume/Honors/LoadHonorsResume')
    if(this.$store.state.Member.Resume.CertificatesResume.UpdateCertificatesResume.items.length == 0 )
      this.$store.dispatch('Member/Resume/CertificatesResume/LoadCertificatesResume')

  },
  computed:{
    getRanks() {
      var ranks = 20
      if(this.$store.state.Member.Resume.BaseResume.Base.image)
          ranks  += 5
      if(this.$store.state.Member.Resume.BaseResume.Base.comment)
        ranks  += 15
      if (this.$store.state.Member.Resume.RecordStudy.UpdateRecordStudy.items.length !== 0 ) {
        if (this.$store.state.Member.Resume.RecordStudy.UpdateRecordStudy.items[0].document != '') {
          ranks += 5
        }
        if (this.$store.state.Member.Resume.RecordStudy.UpdateRecordStudy.items.length > 1){
          if (this.$store.state.Member.Resume.RecordStudy.UpdateRecordStudy.items[1].document != '') {
            ranks += 5
          }
      }
      }
      if (this.$store.state.Member.Resume.RecordJob.UpdateRecordJob.items.length !== 0 ) {
        if(this.$store.state.Member.Resume.RecordJob.UpdateRecordJob.items[0].job_side != '' ) {
          ranks += 2
        }
        if(this.$store.state.Member.Resume.RecordJob.UpdateRecordJob.items[0].title_center_job != '' ) {
          ranks += 2
        }
        if(this.$store.state.Member.Resume.RecordJob.UpdateRecordJob.items[0].group_levels != '' ) {
          ranks += 2
        }
        if(this.$store.state.Member.Resume.RecordJob.UpdateRecordJob.items[0].job != '' ) {
          ranks += 2
        }
        if(this.$store.state.Member.Resume.RecordJob.UpdateRecordJob.items[0].cooperation_type != '' ) {
          ranks += 2
        }
        if (this.$store.state.Member.Resume.RecordJob.UpdateRecordJob.items.length > 1  ) {
          if (this.$store.state.Member.Resume.RecordJob.UpdateRecordJob.items[1].job_side != '') {
            ranks += 2
          }
          if (this.$store.state.Member.Resume.RecordJob.UpdateRecordJob.items[1].group_levels != '') {
            ranks += 2
          }
          if (this.$store.state.Member.Resume.RecordJob.UpdateRecordJob.items[1].title_center_job != '') {
            ranks += 2
          }
          if (this.$store.state.Member.Resume.RecordJob.UpdateRecordJob.items[1].job != '') {
            ranks += 2
          }
          if (this.$store.state.Member.Resume.RecordJob.UpdateRecordJob.items[1].cooperation_type != '') {
            ranks += 2
          }
        }
      }
      if (this.$store.state.Member.Resume.Langauge.UpdateLanguge.items.length !== 0 ) {
        if(this.$store.state.Member.Resume.Langauge.UpdateLanguge.items[0].lang_id != '' ) {
          ranks += 10
        }
      }

      if (this.$store.state.Member.Resume.Articles.Articles.items.length !== 0 ) {
        if(this.$store.state.Member.Resume.Articles.Articles.items[0].effect != '' ) {
          ranks += 5
        }
      }
      if (this.$store.state.Member.Resume.Project.Project.items.length !== 0 ) {
        if(this.$store.state.Member.Resume.Project.Project.items[0].effect != '' ) {
          ranks += 5
        }
      }
      if (this.$store.state.Member.Resume.Honors.HonorsResume.items.length !== 0 ) {
        if(this.$store.state.Member.Resume.Honors.HonorsResume.items[0].effect != '' ) {
          ranks += 5
        }
      }
      if (this.$store.state.Member.Resume.CertificatesResume.UpdateCertificatesResume.items.length !== 0 ) {
        if(this.$store.state.Member.Resume.CertificatesResume.UpdateCertificatesResume.items[0].effect != '' ) {
          ranks += 5
        }
      }
      return ranks;
    }
  }
}
</script>
<style scoped>

</style>
