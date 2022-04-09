<template>

    <jobsIndex :Advertising="Advertising" :AdvertisingSimilar="AdvertisingSimilar"></jobsIndex>


</template>
<script>

export default {
  layout : 'default',

  data() {
    return {
      contentLoading: true,
      similarLoading  :true
    }
  },
  head() {
    return {
      title: `${this.Advertising.title} -  استخدام آژانس هواپیمایی و مسافرتی  - کاراول `,
      meta: [
        // hid is used as unique identifier. Do not use `vmid` for it as it will not work
        {
          hid: 'description',
          name: 'description',
          content: `${this.descReg}-استخدام آژانس هواپیمایی و مسافرتی`
        },
        { hid: 'robots', name: 'robots', content: 'noindex' }
      ]
    }
  },

  async fetch({store , route }) {
    await store.dispatch('Site/Advertising/LoadAdvertising', {id: route.params.id}).then(response => {
       this.contentLoading = false
     });
    await store.dispatch('Site/Advertising/LoadAdvertisingSimilar', {id: route.params.id})
      .then(response => {
        this.similarLoading = false
      })

  },
  computed: {
    Advertising() {return this.$store.state.Site.Advertising.Advetising},
    AdvertisingSimilar() {return this.$store.state.Site.Advertising.AdvertisingSimilar},
    descReg() {
      var comment =  this.Advertising.comment
      console.log(comment)
      var comment2 =  comment.replace(/(<([^>]+)>)/ig, "");
      console.log(comment2)
      var comment3 = comment2.replace(/\&nbsp;/g, "");
      console.log(comment3)
      console.log(comment3.replace('"' , ''))
      return comment3.replace('"' , '');
    }
  },

}
</script>
<style>

.box-show-page-company .lock-company-image {
  top: -85px;
  right: 18px;
  font-size: 30px;
}
.box-show-page-company .ivu-tooltip-popper[x-placement="top"] .ivu-tooltip-arrow{
  display: none;
}
.box-show-page-company  {
  min-width: 0;
  word-wrap: break-word;
  background-clip: border-box;
  padding: 15px;
  padding-right: 15px;
  padding-left: 15px;
  border-radius: .5rem;
  background: #1e88e5;
  background-image: url('~/assets/images/karjoo.png');
}

.box-show-page-company .mBox {
  margin-bottom: 40px;
  height: 80px;
  display : flex ;
  justify-content: flex-start;
}
.box-show-page-company .mBox-company {
  height: auto !important;
  display : flex ;
  justify-content: flex-start;
}
.box-show-page-company .box-form-header-company img  ,.box-show-page-company .box-form-header-company .company-box-img {
  height : 80px ;
  width : 80px ;
  margin : 10px ;
  border-radius : 50% ;
}
.company-box-img{
  background-size: cover;
}
.box-show-page-company p {
  color : inherit ;
  margin-right : 10px
}
:root {
  --var-txt-color: #c1d32f;
  --var-advertising-feature-box-color: #2d8cf0;
  --var-box-header-send-resume-background : linear-gradient(to right, #2c3e50, #3498db);
  --var-webkit-box-header-send-resume-background : -webkit-linear-gradient(to right, #2c3e50, #3498db);
  --var-advertising-feature-background : rgba(147, 198, 243, 0.46) ;
  --var-title-send-resume : #1e88e5;
}

#test {
  color: var(--var-txt-color);
}

.ivu-icon {
  cursor: pointer;
}
.label-desc {
  background: lightcoral;
  text-align: center;
  color: #fff;
  margin: 5px auto;
  padding: 5px 0
}

.box-show-page {
  box-shadow: 0 0px 8px 5px rgb(0 0 0 / 5%);
  border : 1px solid #ccc ;
  display: flex;
  flex-direction: column;
  min-width: 0;
  word-wrap: break-word;
  background-color: #fff;
  background-clip: border-box;
  padding: 15px;
  border-radius: .5rem
}

.title-advertising-show-page {
  font-size: 18px;
}

.box-activity-advetising {

  display: inline-block;
  line-height: 1;
  vertical-align: baseline;
  margin: 0 .15384615em;
  background-image: none;
  padding: .5833em .833em;
  text-transform: none;
  font-weight: 700;
  border: 0 solid transparent;
  border-radius: .30769231rem;
  -webkit-transition: background .1s ease;
  transition: background .1s ease;

}
.box-activity-advetising-box-shadow{
  border-bottom: 2px solid var(--var-background-color);
}
.box-activity-advetising-color{
  color: inherit;
}
.box-activity-advetising-background{
  background-color: #e8e8e8 !important;
}
.uploader-example {

  padding: 15px;
  margin: 40px auto 0;
  font-size: 12px;
  box-shadow: 0 0 10px rgba(0, 0, 0, .4);
}

.uploader-example .uploader-btn {
  margin-right: 4px;
}

.uploader-example .uploader-list {

  overflow: auto;
  overflow-x: hidden;
  overflow-y: auto;
}

.ivu-btn.disabled, .ivu-btn.disabled.active, .ivu-btn.disabled:active, .ivu-btn.disabled:focus, .ivu-btn.disabled:hover, .ivu-btn[disabled], .ivu-btn[disabled].active, .ivu-btn[disabled]:active, .ivu-btn[disabled]:focus, .ivu-btn[disabled]:hover, fieldset[disabled] .ivu-btn, fieldset[disabled] .ivu-btn.active, fieldset[disabled] .ivu-btn:active, fieldset[disabled] .ivu-btn:focus, fieldset[disabled] .ivu-btn:hover {

  background-color: #cde5fa !important;
  border-color: #cde5fa !important;
  color: #fff !important;
}

.box-form-header {
  margin: -15px;
  height:60px;
  margin-bottom: 20px;
  border-top-left-radius: .5rem;
  border-top-right-radius: .5rem;
  display: flex;
  justify-content: center;
  background: var(--var-webkit-box-header-send-resume-background);
  background: var(--var-box-header-send-resume-background);
  background-image: url("~/assets/images/people.png");
}
.box-form-header-company {
  margin: -15px;
  height: 100px;
  border-radius: .5rem;
  display: flex;
  justify-content: center;

}


.box-form-header img{
  width: 100px;
  height: 100px;
  border-radius: 50%;
  margin-top: 30px;
  border: 1px solid #b3b3b3 ;
  background: #ececee;
}
.file-upload .input-wrapper {

  background-color: #fff !important;
  height: 62px !important;
  border: 1px dashed !important;
}
.file-upload .input-wrapper .file-upload-label .file-upload-icon {
  font-size: 30px !important;
}
.file-upload .input-wrapper .file-upload-label {
  color: #000 !important;
}
.mBox  {
  margin-bottom: 50px;
  height: 95px;

}
.res-similar  {
  display:  none;
}
.advertsing-desc{
  font-size: 14px;
}
.advertsing-desc li {
  margin-bottom: 5px;
}
.advertsing-desc p{
  line-height: 30px;
}
.advertsing-desc h4{
  padding: 10px 0;
}
.hr-title{
  position: relative;
  width: 77%;
  right: 23%;
  color: #000;
  bottom: 41px
}
.similar-box-title {
  border-radius: .5rem;
  background: #fff;
  padding: 10px;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,.12), 0 2px 4px 0 rgba(0,0,0,.08);
}
.box-list-jobs {
  margin-bottom: 10px;
}
.mobile-send-resume {
  display: none !important;

}
.box-icon-jo{
  font-size: 24px;
}
.box-icon-j{
  font-size: 27px;
  display: flex;
  justify-content: center;
}
.share-icones {
  padding: 15px;
  position: absolute;
  left: 15px;
  box-shadow: rgb(230, 230, 230) 0px 1px 4px;
  border: 1px solid rgb(230, 230, 230);
  background: rgb(255, 255, 255) none repeat scroll 0% 0%;
  border-radius: 4px;
  z-index: 700;
  top : 35px
}
.share-icones li {
  display: block ;
  margin: 10px 0;
  cursor: pointer
}
.share-icones .share-items {
  color: rgb(117, 117, 117);
  line-height: 20px;
  font-size: 14px;
}
.share-icones .share-icone {
  margin-right: 16px ;
}
.arrow-box {
  position: absolute;
  left: 0px;
  transform: translate(48px);
  clip: rect(0px, 18px, 14px, -4px);
  top: -14px;
}
.arrow-box::after {
  content: "";
  box-shadow: rgb(117, 117, 117) -1px -1px 1px -1px;
  width: 14px;
  height: 14px;
  transform: rotate(45deg) translate(6px, 6px);
  background: rgb(255, 255, 255) none repeat scroll 0% 0%;
  display: block;
}
.icon-box.ivu-icon.ivu-icon-ios-bookmark-outline{
  color: #000 !important;
}
.icon-box.ivu-icon.ivu-icon-ios-bookmark{
  color: #000 !important;
}
.hr-style {
  position: relative;
  width: 52%;
  right: 46%;
  color: #000;
  bottom: 20px
}
.alert-karavel {
  line-height: 20px;
  background: #e8e8e8;
  color: inherit;
  border: 1px solid #b5acaced;
}
.karavel-rank {
  background: var(--var-background-color);
  color: #fff;
  padding: 3px 5px;
  border-radius: 5px;
}
.resume-uploaded-box {
  display: flex;
  padding: 7px;
  border: 1px solid #f3f3f3;
  color: #505050 !important;
  -webkit-text-fill-color: #505050 !important;
  margin-bottom: 10px;
}
@media screen and (max-width: 992px) {
  .mobile-send-resume {
    position: fixed !important;
    display: flex !important;
    right: 5px;
    bottom: 30px;
    height: 50px;
    width: 97%;
    background: #1e88e5;
    align-items: center;
    z-index: 10000;
    border-radius: 3px;
  }
  .mobile-send-resume-filter {
    bottom: 30px;
    left : 0 ;
    margin : 0 auto;
    border-radius: 5px;
    width: 115px;
  }
  .mobile-send-resume .lock-company {
    position: absolute;
    font-size: 22px;
  }
  .box-pad {
    display: none;
  }
  .bottom-section-left {
    border-right: 1px solid #eee;
    height: 100%;
  }
  .raychat_main_button {
    margin-bottom: 30px !important;
  }
  .res-dist { margin-bottom: 50px !important}
  /*.resume-send-box-res {*/
  /*  position: sticky;*/
  /*  top:80px;*/
  /*  margin: -25px !important;*/
  /*}*/

}
@media screen and (max-width: 990px){
  .similar-res {
    display: none;
  }
  .res-similar {
    display: block;
  }
  .box-pad{
    padding: 0 15px !important;
  }
  .hr-title{
    position: relative;
    width: 50%;
    right: 49%;
    color: #000;
    bottom: 21px
  }
}


@media screen and (max-width: 768px){
  .bottom-section-right {
    border-left: 1px solid #eee;
    height: 100%;
  }

  .mobile-send-button {
    width: 50px;
    height: 50px;
    border-radius: 50% !important;
    display: flex !important;
    justify-content: center;
    align-items: center;
    font-size: 25px;
    color: #fff;
  }
  .mobile-send-button:hover .ivu-icon.ivu-icon-ios-share-outline{
    display: none;
    transition: display 1s ease;
  }
  .mobile-send-button:hover .ivu-icon.ivu-icon-ios-share{
    display: block;
    -ms-transform: scale(1.4,1.4);
    transform: scale(1.4,1.4);
    transition: transform 1s ease;
  }
  .ivu-icon.ivu-icon-ios-share {
    display: none;
  }
  .send-mobile-title{

    color: #fff;
    padding: 5px;
    margin-bottom: 15px;
    margin-left: 10px;
    border-radius: 5px;
    animation: MoveUpDown 2s linear infinite;
  }
  .mobile-send-button-background {
    background: var(--var-title-send-resume);
  }
  @keyframes MoveUpDown {
    0%, 100% {
      transform: translateY(0);
    }
    50% {
      transform: translateY(-20px);
    }
  }
  .send-mobile-title::after
  {
    content: " ";
    position: absolute;
    border-top: 8px solid var(--var-title-send-resume);
    border-right: 8px solid transparent;
    border-left: 8px solid transparent;
    border-bottom: none;
    top: 32px;
    right: 20px;

  }
  .ivu-icon.ivu-icon-ios-share-outline {
    border: 1px solid #fff;
    padding: 8px;
    border-radius: 50%;
  }
  .box-icon-j .ivu-icon.ivu-icon-ios-share-outline  {
    padding: 0 !important
  }


  .hr-title {
    display: none;

  }
  .ivu-modal-close .ivu-icon-ios-close {
    color: #000 !important;
  }
  .ivu-modal-body {
    padding: 0px !important;
  }

  .share-icones .share-title {
    display: none;
  }
  .share-icones  {
    left: 40px;
  }
  .share-icones .share-icone {
    margin-right: 0 ;
  }
  .arrow-box {
    left: -27px;
  }
  .mobile-send-resume .lock-company {
    position: absolute;
    font-size: 22px;
  }
}
</style>
