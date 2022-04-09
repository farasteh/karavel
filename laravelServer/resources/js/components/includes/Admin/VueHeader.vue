<template>
    <div>
       <div v-on:click="Toggle()" ref="backgroundMobile"  class="background-model-box" ></div>
        <nav style="background-color: #1e88e5 !important;border-color: #1e88e5 !important;box-shadow: 0 2px 4px -1px rgba(0,0,0,.2),0 4px 5px 0 rgba(0,0,0,.14),0 1px 10px 0 rgba(0,0,0,.12);" class="navbar navbar-expand-lg navbar-light  bg-primary fixed-top" dir="ltr">
           <span class="navbar-brand">
               <span id="navbarDropdown" class=" btn-icon" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v"></i>
                </span>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <router-link :to="{ name : 'Jobs'} "  class="dropdown-item">لیست شغل ها</router-link>
                    <router-link :to="{ name : 'AdvertisingListAdmin'} "  class="dropdown-item">لیست آگهی</router-link>
                    <div class="dropdown-divider"></div>
                    <router-link :to="{ name : 'Logout'}"  class="dropdown-item">
                      <Icon style="float: left;font-size: 24px;" type="md-log-out" />
                      <span>خروج</span>
                    </router-link>
                </div>
           </span>
            <div>
                <span class="text-light">به پنل ادمین خوش آمدید</span>
            </div>
<!--               <div style="cursor: pointer;" class="demo-avatar-badge btn-icon">-->
<!--                    <Badge :count="3">-->
<!--                        <Icon style="font-size: 28px;color: #fff;" type="ios-notifications-outline" />-->
<!--                    </Badge>-->
<!--                </div>-->
            <span v-on:click="Toggle()" class="btn-menu-re btn-icon">
                <i class="fas fa-bars"></i>
            </span>
            <div class="collapse navbar-collapse">
               <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                    </li>
                    <li class="nav-item">
                    </li>
                    <li class="nav-item dropdown">
                    </li>
                    <li class="nav-item">
                        <router-link :to="{name : 'Home'}" class="nav-link pt-0 pb-0" tabindex="-1" aria-disabled="true">
                            <img src="../../../../images/site/karavel-logo.png" alt="" height="53px">
                        </router-link>
                    </li>
                </ul>
            </div>
       </nav>
      <div ref="input"  style="height: 100%; "  class="v-navigation-drawer__content">
        <vue-simple-scrollbar>
           <div class="menu-header-fixed">
              <div class="top-menue" style="display:flex">
                    <div class="v-list-item__content">
                        <div class="v-list-item__title">ادمین سفربانک</div>
                    </div>
              </div>
           </div>

           <div style="margin-top: 5px;" class="eee">
               <Menu  active-name="1" style="width: 244px;">
                       <MenuItem name="3" :to="{ name : 'Home' }">
                           <Icon type="md-home" />
                           صفحه اصلی سایت
                       </MenuItem>
                        <MenuItem name="1" :to="{ name : 'DashboardAdmin'}">
                            <Icon type="md-document" />
                            <router-link to="/admin" tag="span"  class="">داشبورد</router-link>
                        </MenuItem>
                        <MenuItem name="2" :to="{ name : 'Jobs'}">
                            <Icon type="ios-create" />
                            <span >ایجاد شغل</span>
                        </MenuItem>
                       <Submenu name="3">
                           <template slot="title">
                               <Icon type="ios-paper" />

                                 لیست آگهی ها
                           </template>
                           <MenuItem name="3-1" :to="{ name : 'AdminCompaniesList'}"  style="margin-right: 22px">
                               لیست شرکت ها
                           </MenuItem>
                           <MenuItem name="3-2" :to="{ name : 'AdvertisingListAdmin'}"  style="margin-right: 22px">
                               لیست همه آگهی ها
                           </MenuItem>
                       </Submenu>
                        <MenuItem name="4" :to="{ name : 'behavioralSkillAdmin'}">
                            <Icon type="md-list-box" />
                            مهارت های رفتاری
                        </MenuItem>
<!--                         <MenuItem name="5"  :to="{ name : 'activityCompanyAdmin'}">-->
<!--                            <Icon type="md-chatbubbles" />-->
<!--                            حوزه فعالیت های شرکت-->
<!--                        </MenuItem>-->
                       <Submenu name="6">
                           <template slot="title"><Icon type="ios-cog" />لیست کاربران</template>
                           <MenuItem name="6-1" :to="{name : 'UserBlockList'}" style="margin-right: 22px">
                               گزارشگر  تخلف
                           </MenuItem>
<!--                           <MenuItem name="6-2">-->
<!--                               <router-link to="/admin/advertising/list"  tag="span"  class="">لیست همه آگهی ها</router-link>-->
<!--                           </MenuItem>-->
                       </Submenu>
                </Menu>
           </div>
           </vue-simple-scrollbar>
      </div>
    </div>
</template>
<script>

import VueSimpleScrollbar from 'vue-simple-scrollbar'


export default {
       data () {
            return {
                userProfile :[],
            }
        },
        mounted() {
            this.Authorized();
        },
    components: {
    VueSimpleScrollbar
  },
   methods: {
      Toggle: function(){

          const nav = this.$refs.input.classList;
          const backgroundMobile = this.$refs.backgroundMobile.classList;
          nav.contains('active') ? nav.remove('active') : nav.add('active');
          backgroundMobile.contains('activeBackgroundMobile') ? backgroundMobile.remove('activeBackgroundMobile') : backgroundMobile.add('activeBackgroundMobile');

      }
    }



}
</script>
<style>
@import '~vue-simple-scrollbar/dist/vue-simple-scrollbar.css';

.btn-menu-re{
    font-size: 20px;
    color: #fff;
    cursor: pointer;
    display:none !important;
}
.top-menue{
    display: flex;
    margin-top: 0px;
    margin-bottom: -11px;
    padding-bottom: 15px;
    border-bottom: 1px solid #d5d1d196;
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
.image-profile-menue{
    height: 70px;
    min-width: 70px;
    width: 70px;
    margin-bottom: 16px;
    margin-top: 16px;
    margin-left: 16px;
    margin-right: 16px;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    border-radius: 50%;
    display: -webkit-inline-box;
    display: -ms-inline-flexbox;
    display: inline-flex;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    line-height: normal;
    position: relative;
    text-align: center;
    vertical-align: middle;
    overflow: hidden;
}
.image-profile-menue img{
    border-radius: inherit;
    display: -webkit-inline-box;
    display: -ms-inline-flexbox;
    display: inline-flex;
    height: inherit;
    width: inherit;
}
.menu-header-fixed{
    padding: 8px 15px;
    background: inherit;
    color: rgba(0,0,0,.87);
    border-radius: 3px;
    display: block;
    padding: 8px 0;
    position: static;
    -webkit-transition: -webkit-box-shadow .28s cubic-bezier(.4,0,.2,1);
    transition: -webkit-box-shadow .28s cubic-bezier(.4,0,.2,1);
    transition: box-shadow .28s cubic-bezier(.4,0,.2,1);
    transition: box-shadow .28s cubic-bezier(.4,0,.2,1),-webkit-box-shadow .28s cubic-bezier(.4,0,.2,1);
    will-change: box-shadow;
}
.btn-icon{
    width: 43px;
    height: 43px;
    text-align: center;
    display: flex;
    align-items: center !important;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
}
.ivu-menu-vertical.ivu-menu-light::after{
    background: #fff !important;
}
.btn-icon:hover {
        background: #58a3e1;
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
.box-maneu{
    direction: ltr;
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
    top: 15px !important;
    left: 7px !important;
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
@media screen and (max-width: 759px){
  .v-navigation-drawer__content{
       right: -264px ;
  }
  .btn-menu-re{
      display:flex !important;
  }
}

</style>
