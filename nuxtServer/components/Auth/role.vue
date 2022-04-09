`<template>
  <div>
    <div class="user-desk d-flex align-items-center justify-content-center">
      <div class="navbar-brand">
          <div class="box-login" tabindex="-1" aria-disabled="true">
            واتس اپ
            <a href="https://api.whatsapp.com/send/?phone=989123493154&text" target="_blank" style="color: #fff">09123493154</a>
          </div>
      </div>
      <div v-if="logedIn && role" class="navbar-brand user-desk">
        <div  id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="box-login" tabindex="-1" aria-disabled="true">
               <i class="fa fa-flower-tulip"></i>
                {{ user.name }}
              </span>
          </div>
        <div class="dropdown-menu home-menu " aria-labelledby="navbarDropdown">
              <nuxt-link v-for="(link , index) in links" :key="index"
                           :to="link.name"  class="dropdown-item">{{ link.title }}</nuxt-link>
              <nuxt-link to="/logout"  class="dropdown-item" style="border-bottom: none !important;">
                <Icon class="font-25 float-left" type="md-log-out" />
                <span>خروج</span>
              </nuxt-link>
          </div>
      </div>
      <div class="navbar-brand d-flex align-items-center " v-else>
        <div class="dropdown user-desk">
              <div class="box-login"  id="dropdownMenuButton4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                ورود / ثبت نام
              </div>
              <div style=" top: 45px !important;left: -20px !important;width: 250px;" class="dropdown-menu" aria-labelledby="dropdownMenuButton4">
              <div class="user-role-wrapper row  py-4 px-3">
                  <div class="col-6 text-center login-box ">
                      <nuxt-link tag="div" to="/users/login-register/Company" class="user-role-card rounded ">
                          <i style="font-size: 40px" class="fas fa-building"></i>
                          <div class="mt-2">
                            <p>کارفرما</p>
                            <span class="font-10" style="word-spacing: -2px">آگهی کارمندیابی
                             <br>
                              بسازید
                            </span>
                          </div>
                      </nuxt-link>
                  </div>
                  <div class="col-6 text-center login-box">
                      <nuxt-link  tag="div" to="/users/login-register/Member" class="user-role-card rounded ">
                          <i style="font-size: 40px"  class="fas fa-user"></i>
                          <div class="mt-2">
                            <p>کارجو</p>
                            <span class="font-10" style="word-spacing: -2px">رزومه شغلی
                             <br>
                              بسازید
                            </span>
                          </div>
                      </nuxt-link>
                  </div>
              </div>
          </div>
      </div>
    </div>
    </div>
    <div class="user-response mt-2">
       <div v-if="logedIn && role" class="navbar-brand mr-0 show position-relative w-100">
           <div id="navbarDropdown1" aria-expanded="true">
              <div class="box-login" tabindex="-1" aria-disabled="true">
                {{ user.name }}
              </div>
          </div>
          <div class="dropdown-menu home-menu show" aria-labelledby="navbarDropdown1">
              <nuxt-link v-for="(link , index) in links" :key="index"
                           :to="link.name"  class="dropdown-item">{{ link.title }}</nuxt-link>
              <nuxt-link to="/logout"  class="dropdown-item" style="border-bottom: none !important;">
                <Icon class="font-25 float-left" type="md-log-out" />
                <span>خروج</span>
              </nuxt-link>
          </div>
      </div>
       <span class=" mr-0" v-else>
         <div class="dropdown">
            <span class="box-login mt-2" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              ورود / ثبت نام
            </span>
              <div style=" top: 37px !important;left: 0px !important;" class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton">
                  <div class="user-role-wrapper row  py-1 px-3">
                      <div class="col-6 text-center login-box ">
                          <nuxt-link tag="div" to="/users/login-register/Company" class="user-role-card rounded " style="padding  :5px">
                              <i class="fas fa-building font-25"></i>
                              <div class="mt-2">
                                <p>کارفرما</p>
                              </div>

                          </nuxt-link>
                      </div>
                      <div class="col-6 text-center login-box">
                          <nuxt-link  tag="div" to="/users/login-register/Member"  class="user-role-card rounded "style="padding  :5px">
                              <i class="fas fa-user font-25"></i>
                              <div class="mt-2"><p>کارجو</p></div>
                          </nuxt-link>
                      </div>
                  </div>
              </div>
          </div>
      </span>
    </div>
  </div>

</template>
<script>


export default {
  props : ['user' , 'role' , 'links' ,'logedIn'],
  data() {
    return {
    }
  },
  created() {
  } ,
  computed  : {

  } ,
  mounted() {
  }
}
</script>
<style>

.deskDis { margin-right: 2rem }
.margin-box{
  margin-right: 15rem !important;
}
.user-box {
  border: 1px solid #232425;
  background: #414141;
  color: #fff !important;
  font-size: 13px;
  word-spacing: -.5px;
  box-shadow: inset 0 -3px 0 0 #212121;
  border-radius: 3px;
}
.dropdown-menu.home-menu  .dropdown-item {
  color: #000 !important;
  border-bottom: 1px solid ;
}
.dropdown-menu.home-menu  .dropdown-item:hover{
  background: #f7f7f7;
  color: #5aabf2d9 !important;
}
.dropdown-menu.home-menu {
  color: #000 !important;
  background: #f7f7f7 !important;
  top: 60px !important
}
.btn-menu-re{
  font-size: 20px;
  color: #fff;
  cursor: pointer;
  display:none !important;
}

.ivu-badge-count {
  transform: translateX(50%);
  top: -7px !important;
  right: 7px !important;
}
.v-list-item__content {
  padding: 8px 0;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  -ms-flex-item-align: center;
  align-self: center;
  display: -webkit-box;
  display: -ms-flexbox;
  -ms-flex-wrap: wrap;
  flex-wrap: wrap;
  -webkit-box-flex: 1;
  -ms-flex: 1 1;
  flex: 1 1;
  overflow: hidden;
}
.v-list-item__title{
  padding: 8px 0;
  font-size: .8125rem;
  font-weight: 500;
  line-height: 1rem;

}
.v-list-item__subtitle{
  font-size: .8125rem;
  font-weight: 500;
  line-height: 1rem;
}




.box-maneu{
  direction: rtl !important;
  box-shadow: 1px 0 20px rgba(0,0,0,.08);
  -webkit-box-shadow: 1px 0 20px rgba(0,0,0,.08);
}
.btn-maneu i{
  coller:#fff;
  font-sizr:17px
}
.dropdown-item {
  padding: 8.25px 1.5rem !important;
}
.v-sheet{
  height: 64px;
  margin-top: 0px;
  transform: translateY(0px);
  left: 0px;
  right: 0px;
  background-color: #1e88e5 !important;
  border-color: #1e88e5 !important;
  position: fixed;
  top: 0;
  z-index: 5;
  color: #fff;
  box-shadow: 0 2px 4px -1px rgba(0,0,0,.2),0 4px 5px 0 rgba(0,0,0,.14),0 1px 10px 0 rgba(0,0,0,.12);
}
.v-navigation-drawer__content{
  height: 100vh;
  top: 70px;
  max-height: calc(100% - 64px);
  transform: translateX(0%);
  width: 256px;
  border-color: #fff !important;
  position: fixed;
  box-shadow: 1px 0 20px rgba(0,0,0,.08);
  -webkit-box-shadow: 1px 0 20px rgba(0,0,0,.08);
  background: #fff !important;
  right: 0px;
  transition: 300ms ease all;
  z-index: 9;
}
.ivu-menu-light.ivu-menu-vertical .ivu-menu-item-active:not(.ivu-menu-submenu)::after {
  right: inherit !important;
  left: 0 !important;
}
.dropdown-menu {
  color: #212529;
  text-align: right !important;
  border: 0px !important;
  box-shadow: 0 5px 5px -3px rgba(0,0,0,.2),0 8px 10px 1px rgba(0,0,0,.14),0 3px 14px 2px rgba(0,0,0,.12) !important;
  top: 0px !important;
  left: 0px !important;
}
.active{
  right: 0px !important;

}
.ivu-menu-vertical .ivu-menu-submenu-title-icon {
  right: inherit !important;
  left: 20px !important;
}
.btn-icon{
  color: #fff;
  font-size: 18px;
}
.ss-container:active .ss-scroll, .ss-container:hover .ss-scroll {
  opacity: 1;
}
.ss-scroll {
  background: #9fc9f7 !important;
}
.user-response  {
  display: none;
}

/*.navbar-brand {*/
/*    margin-left: 11rem !important;*/
/*    margin-right: 0 !important;*/
/*}*/
/*.navbar {*/
/*  padding: .9rem 1rem !important;*/
/*}*/
.user-res {
  display: none;
  margin-left:0rem !important
}
.user-logo-menu-mobile {
  display: none;
}
@media screen and (max-width: 759px){
  .v-navigation-drawer__content{
    right: -264px ;
  }
  .btn-menu-re{
    display:flex !important;
  }

  .margin-box{
    margin-left: 1rem !important;
    margin-right: 1rem !important;
  }


  .background-model-box{
    position: fixed;
    top: 0;
    right: 0;
    float: left;
    width: 100%;
    height: 100%;
    background-color: #0605059e;
    opacity: .6;
    z-index: 8;
    display: none;
    color: red;
    padding-top: 25px;
    padding-left: 25px;
  }
  .activeBackgroundMobile{
    display: block;
  }
}
@media screen and (max-width: 990px){
  .user-response  {
    display: block;
  }
  .user-desk { display: none}
  .user-response .dropdown-menu.home-menu  {
    top: 50px !important;
    right: 0 !important;
    left: 0 !important;
    transition: dispay .5s;
  }
  .user-res {
    display: block;
    margin-left:11rem !important
  }

  .box-maneu {
    direction: ltr !important;
  }
  .margin-box{
    margin-left: 0rem !important;
    margin-right: .5rem !important;
  }
  #navbarSupportedContent .user-box {
    display: none;
  }
}
.box-center{
  height: 100px;
  align-content: center;
  display: flex;
  text-align: center;
  align-items: center;
  justify-content: center;
}
.user-role-card{
  padding: 13px;
  background: #cccccc2b;
  cursor: pointer;
}
</style>
