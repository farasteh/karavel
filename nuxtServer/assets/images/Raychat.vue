<template>
  <div>
    <a class="whatsapp_main_button"
         ref="whatsappShow" @click="whatsappShow = !whatsappShow"></a>

    <div v-if="whatsappShow" class="whtsappInfo">
      <div>
        ارتباط با واتس آپ ادمین:
        <br/>
        <a href="https://wa.me/+989123493154" target="_blank">
          09123493154
        </a>
      </div>
      <div class="arrow-box-bottom"></div>
    </div>
  </div>


</template>

<script>
    export  default  {
      name : 'whatsapp' ,
      data () {
        return {
          whatsappShow  : false
        }
      },
      created() {
        document.addEventListener('click', this.documentClick)
      },
      destroyed() {
        document.removeEventListener('click', this.documentClick)
      },
      methods : {
        documentClick(e) {
          let el = this.$refs.whatsappShow
          if (el) {
            let target = e.target
            if (el !== target && !el.contains(target))
              this.whatsappShow = false
          }
        },
      }


      //raychat
      //   name : 'raychat' ,
      //   data() {
      //     return {
      //       raychatToken : '',
      //       o  : "256c3cda-1376-4253-9f41-62cc9794bc81",
      //       rayCode  : "256c3cda-1376-4253-9f41-62cc9794bc81"
      //     }
      //   },
      //   created() {
      //     this.raychatSetup()
      //   },
      // methods : {
      //   raychatSetup() {
      //     var e=document,a=window;
      //     e.readyState?this.t():a.attachEvent?a.attachEvent("onload",this.t):a.addEventListener("load",this.t,!1)
      //   },
      //   // deleteRaychat() {
      //   //   document.head.removeChild(document.getElementById("raychatKaravel"));
      //   //   document.getElementById("raychat_automessage_preview_container").remove()
      //   //   document.getElementById("raychatBtn").remove()
      //   //   document.getElementById("raychatFrame").remove()
      //   //
      //   //   var x = document.body.getElementsByTagName("style");
      //   //   if (x.length)
      //   //     x[0].parentElement.removeChild(x[0]);
      //   //   var y = document.body.getElementsByTagName("link");
      //   //   for (var i = y.length - 1; i >= 0; i--)
      //   //   {
      //   //     if( y[i].href == 'https://cdn.fontcdn.ir/Font/Persian/Shabnam/Shabnam.css')
      //   //       y[i].parentElement.removeChild(y[i]);
      //   //     break;
      //   //   }
      //   // },
      //   t (){
      //     var t=document.createElement("script");
      //     t.type="text/javascript"
      //     t.async=!0
      //     t.setAttribute("id", "raychatKaravel");
      //     localStorage.getItem("rayToken")?t.src="https://app.raychat.io/scripts/js/"+this.o+"?rid="+localStorage.getItem("rayToken")+"&href="+window.location.href:t.src="https://app.raychat.io/scripts/js/"+this.o+"?href="+window.location.href;
      //     document.head.appendChild(t)
      //   },
      // } ,
      //
      // destroyed() {
      //     //this.deleteRaychat()
      // },

    }
</script>
<style>
.whatsapp_main_button {
  height: 60px ;
  width: 60px ;
  position: fixed ;
  bottom:  0 ;
  right : 0  ;
  color : #fff ;
  margin: 20px ;
  border-radius: 50px;
  z-index: 999999999;
  transition: box-shadow .2s ease-in-out !important;
  box-shadow: 0 1px 6px rgba(0, 0, 0, .06), 0 2px 32px rgba(0, 0, 0, .16) !important;
  -webkit-animation-iteration-count: 1;
  -moz-animation-iteration-count: 1;
  -o-animation-iteration-count: 1;
  animation-iteration-count: 1;
  cursor: pointer;
  background-image: url("~/assets/images/whatsapp.png");
  background-size: 73% 73%;
  background-repeat: no-repeat;
  background-position: center center;
}
.whatsapp_main_button:hover {
  box-shadow: 0 2px 8px rgba(0, 0, 0, .09), 0 4px 40px rgba(0, 0, 0, .24) !important;
  transition: all 0.2s !important;
}
.whtsappInfo {
    background: #fff;
    color: inherit;
    position: fixed;
    bottom: 80px ;
  padding: 10px ;
  right: 0 ;
  margin: 10px 20px;
  user-select: none;
  box-shadow: 0 1px 4px #e6e6e6;
  border: 1px solid #e6e6e6;
  background: #fff none repeat scroll 0 0;
  border-radius: 4px;
  z-index: 999999999;
}
.arrow-box-bottom {
  position: absolute;
  left: 90px;
  transform: translate(48px);
  clip: rect(0,18px,14px,-4px);
  top: 65px;

}
.arrow-box-bottom::after {
  content: "";
  box-shadow: -1px -1px 1px -1px #757575;
  width: 14px;
  height: 14px;
  transform: rotate(225deg) translate(6px,6px);
  background: #fff none repeat scroll 0 0;
  display: block;
}
</style>
