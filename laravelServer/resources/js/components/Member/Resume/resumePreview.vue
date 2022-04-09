<template>
    <div>
        <div>

            <div class="container" >

                <div class="row">
                    <div class="col-12 col-md-6 box-contain">
                        <p class="my-2">قالب پیشفرض</p>
                        <div class="preview">
                            <img :src="'/images/pdfs/theme2.png'" >
                        </div>
                        <router-link :to="{name: subj('2') ,params : {id:6}}" class="btn btn-success col-12"> مشاهده pdf </router-link>
                    </div>
                </div>
            </div>
<!--            <div class="container" > -->
<!--                <div class="row">-->
<!--                    <div class="col-12 col-md-6 box-contain" v-for="(pdf , index) in pdfs" :key="index">-->
<!--                        <div class="preview">-->
<!--                            <img :src="'/images/pdfs/'+pdf.name+'.png'" :alt="pdf.name">-->
<!--                        </div>-->
<!--                        <p class="mt-2">{{pdf.name}}</p>-->
<!--                        <router-link :to="{name: subj(pdf.number)  ,params : {id:Base.id}}" class="btn btn-success col-12">   انتخاب رزومه  </router-link>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
        </div>
    </div>


</template>

<script>

// Import the styles too, typically in App.vue or main.js
import 'vue-swatches/dist/vue-swatches.css'

import Loading from 'vue-loading-overlay';
// Import stylesheet
import 'vue-loading-overlay/dist/vue-loading.css';

export default {



    data(){
      return{
          loading  :false
      }
    },
    computed:{
        pdfs () { return this.$store.state.pdfThemes.pdfThemes} ,
        Base() { return this.$store.state.BaseRezome.Base},
    },
    created(){
       this.loading = true
        this.$store.dispatch('LoadPdfThemes')
        .then(res => {
            this.loading = false
        })
    },

    watch: {
    },
   methods : {
              createPDF () {
                axios.post('api/v1/member/resume-result', this.result)
                    .then(success => {
                        resolve(success)
                    })
                    .catch(({ error, status }) => {
                        reject(error)
                    });

            //  var element = document.getElementById('content');
            //  var width= element.style.width;
            //  var heighwidtht = element.style.height;
            // var pdf = new jsPDF();
            // console.log(width , heighwidtht)


            //  html2canvas(element , {backgroundColor: "#ffffff",
            //      height: 2200, width: 1000 , x: 50 , y : 50 ,
            //      allowTaint : false
            //      , logging: true, letterRendering: 1, useCORS: true}).then(canvas => {
            //      var image = canvas.toDataURL('image/jpeg');
            //      //window.location.href = canvas.toDataURL('image/jpeg');
            //     pdf.addImage(image, 'JPEG', 15, 40 , 2200 , 1000);
            //     pdf.save('facture.pdf');
            //  });
        } ,
        source ( number) { return `/#/resumes/${number}/${this.Base.id}`} ,
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
        background: linear-gradient(to left,#8fcdeb,#039be5);
        color: white !important;
        border-radius: 500px;
        border-color : #8fcdeb
    }
    .box-contain iframe #content  {
        background : #fff
    }
</style>
