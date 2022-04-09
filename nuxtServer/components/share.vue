<template>
  <div>
     <span class="box-icon-j ml-3" ref="shareBoxShow">
         <a @click=" boxShare  = !boxShare" class="d-flex">
             <img src="~/assets/images/share.png" alt="" width="25" height="27">
         </a>
    </span>
    <div class="d-flex flex-column share-icones" v-if="boxShare">
      <ul class="d-flex flex-column align-items-stretch">
        <li @click="sharewhatsapp">
          <div class="share-items" >
            <div class="d-flex justify-content-between">
              <span class="share-title">واتس آپ</span>
              <span class="share-icone" >
                                              <Icon type="logo-whatsapp font-25" />
                                        </span>
            </div>
          </div>
        </li>
        <li @click="shareTelegram">
          <div class="share-items" >
            <div class="d-flex justify-content-between">
              <span class="share-title">تلگرام</span>
              <span class="share-icone" >
                          <i class="fab fa-telegram font-25"></i>
                      </span>
            </div>
          </div>
        </li>
      </ul>
      <div class="arrow-box"></div>
    </div>
  </div>
</template>

<script>
  export default  {
    data() {
      return {
        boxShare: false,
        shareText : 'دوست من این لینک رو ببین، یک فرصت شغلی است. شاید دوسش داشته باشی'
      }
    },
    methods :{
      documentClick(e){
        let el = this.$refs.shareBoxShow
        if(el){
          let target = e.target
          if ( el !== target && !el.contains(target))
            this.boxShare = false
        }
      },
      shareTelegram() {
        let url = `https://telegram.me/share/url?text=${this.shareText}&url=${window.location.href}`
        window.open(url, "_blank");
      },
      sharewhatsapp(){
        let url = `https://api.whatsapp.com/send?text=${this.shareText}%20%20%20%20%20%20%20${window.location.href}`
        window.open(url, "_blank");

      },
    } ,
    created() {
      document.addEventListener('click', this.documentClick)
    },
    destroyed() {
      document.removeEventListener('click', this.documentClick)
    },
  }
</script>

<style>
ul {
  margin-bottom: 0 !important;
}
</style>
