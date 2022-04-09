<template>
  <div>
    <div>

      <div class="container" >
        <div class="col-12 col-md-6 box-contain d-flex flex-wrap m-0" >
          <p class="my-2">قالب پیشفرض</p>
          <div class="preview">
            <img src="~/assets/images/pdfs/theme2.png" >
          </div>
          <nuxt-link :to="source(2)" class="btn btn-success col-12"> مشاهده pdf </nuxt-link>
        </div>
      </div>
    </div>
  </div>


</template>

<script>
export default {
  data(){
    return{
      loading  :false
    }
  },
  computed:{
    pdfs () { return this.$store.state.Member.Resume.pdf.pdfThemes} ,
    Base() { return this.$store.state.Member.Resume.BaseResume.Base},
  },
  created(){
    if (this.pdfs.length == 0 ) {
      this.loading = true
      this.$store.dispatch('Member/Resume/pdf/LoadPdfThemes')
        .then(res => {
          this.loading = false
        })
    }

  },
  methods : {
    source ( number) { return `/resumes/${number}/${this.Base.id}`} ,
    subj ( number ) { return `theme${number}`}
  }
}

</script>
<style scoped>
.box-contain  {
  max-width : 400px ;
  height : 400px ;
  margin : 20px ;
  display: flex;
  justify-content: center;
  align-content: center;
  flex-direction: column;
  flex-basis: -moz-min-content;
  flex-flow: inherit;
  background: #fff;
  box-shadow: 1px 1px 1px 1px #cccc;
}
.box-contain  iframe{
  width : 350px ;
  height : 350px ;

}
.row {
  justify-content : center
}
.box-contain iframe .vue-swatches , .box-contain iframe .btn-position {
  display  : none
}
.preview{
  width: 320px;
  height: 252px;
  overflow: hidden;
  display: inline-block;
  position: relative;
  direction: ltr;
  text-align : center
}
.preview img{
  width: 240px;
}
.box-contain .btn {
  text-align: center;
  display: flex;
  align-content: center;
  justify-content: center;
  margin: 20px auto;
  background: linear-gradient(to left,#0765bd,#8fcdeb);
  color: white !important;
  border-radius: 500px;
  border-color : #8fcdeb
}
.box-contain iframe #content  {
  background : #fff
}
</style>
