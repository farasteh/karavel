<template>
  <div>
    <div @click="Toggle()" ref="backgroundMobile" class="background-model-box"></div>
    <nav class="navbar navbar-expand-lg navbar-light  bg-primary fixed-top nav-back" dir="ltr">
           <span class="navbar-brand" >
               <span id="navbarDropdown" class=" btn-icon" role="button" data-toggle="dropdown"
                      aria-haspopup="true" aria-expanded="false" style="var(--var-background-color) !important">
                    <i class="fas fa-ellipsis-v"></i>
               </span>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <nuxt-link to="/member/resume" class="dropdown-item">  ساخت رزومه کاراولی</nuxt-link>
                    <nuxt-link to="/member/applied" class="dropdown-item"> درخواست های من   </nuxt-link>
                    <div class="dropdown-divider"></div>
                    <nuxt-link to="/logout" class="dropdown-item">
                      <Icon class="float-left font-25" type="md-log-out"/>
                      <span>خروج</span>
                    </nuxt-link>
                </div>
           </span>
      <div>
        <span class="text-dark">
            {{ User.name }}
            خوش آمدید
        </span>
      </div>
      <span @click="Toggle()" class="btn-menu-re btn-icon" >
                <i class="fas fa-bars"></i>
            </span>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
          </li>
          <li class="nav-item mr-2">
            <div style="background: #fff;padding: 8px;border-radius: 3px;">
              <a rel=”nofollow” class="telegram-panel " target="_blank" href="https://t.me/karavel_ir_co" >
                <iconTelegram></iconTelegram>
              </a>
            </div>
          </li>
          <li class="nav-item mr-2">
            <div style="background: #fff;padding: 8px;border-radius: 3px;">
              <a rel=”nofollow” class="telegram-panel" target="_blank" href="https://www.instagram.com/karavel.ir/"  >
                <iconInstagram></iconInstagram>
              </a>
            </div>
          </li>
          <li class="nav-item">
            <nuxt-link to="/" class="router-link-exact-active router-link-active navbar-brand pt-0 pb-0" style="color: #fff;font-weight: bold;">
              <img src="~/assets/images/karavel-logo.png" alt="karavel-logo" height="58px">
            </nuxt-link>
          </li>
        </ul>
      </div>
    </nav>
    <div ref="input" class="v-navigation-drawer__content h-100">
       <vuescroll :ops="operation">
         <div>
           <div class="menu-header-fixed">
             <div class="top-menue d-flex flex-wrap">

               <div class="col-10 m-auto border d-flex" style="border-radius: 4px">
                 <div class="image-profile-menue">
                   <img :src="User.member.image == '' || User.member.image == null ? '/images/company/no-photo.jpg' : appurl +'/images/company/' + User.member.image"/>
                 </div>
                 <div class="v-list-item__content" >
                   <div class="v-list-item__title">{{ User.name }}</div>
                 </div>
               </div>
               <div class="col-10 mx-auto border mt-2 py-2" style="border-radius: 4px">
                 <MemberRank></MemberRank>
               </div>
             </div>
           </div>
           <div style="margin-top: 5px;" >

             <Menu active-name="1" style="width: 244px;">
               <MenuItem name="1" to="/">
                 <Icon type="md-home" />
                 صفحه اصلی سایت
               </MenuItem>
               <MenuItem name="2" to="/member/applied" @click.native="Toggle()">
                 <Icon type="md-document" />
                 داشبورد
               </MenuItem>
               <Submenu name="3">
                 <template slot="title">
                   <Icon type="md-clipboard" />
                   رزومه
                 </template>
                 <MenuItem name="2-1" to="/member/resume"  @click.native="Toggle()" style="margin-right: 22px; font-size: 13px; padding-left:10px">
                   ایجاد(یا ویرایش) رزرومه کاراولی
                 </MenuItem>
                 <MenuItem name="2-2" :to="{path: subj('2') }"   style="margin-right: 22px">
                   نمایش رزومه کاراولی
                 </MenuItem>
                 <MenuItem name="2-3" to="/member/extraResume"  @click.native="Toggle()"  style="margin-right: 22px">
                   رزومه متفرقه
                 </MenuItem>
               </Submenu>
               <MenuItem name="4" to="/member/liked"  @click.native="Toggle()">
                 <Icon type="md-bookmarks" />
                 آگهی های نشان شده
               </MenuItem>
               <MenuItem name="5" to="/member/applied"  @click.native="Toggle()">
                 <Icon type="logo-buffer" />
                 درخواست های من
               </MenuItem>
               <MenuItem name="6" to="/member/companyRequest"  @click.native="Toggle()">
                 <Icon type="logo-buffer" />
                 پیشنهادهای کاری شما
               </MenuItem>
               <Submenu name="7">
                 <template slot="title">
                   <Icon type="ios-cog"/>
                   تنضیمات
                 </template>
                 <MenuItem name="5-1" to="/member/password" style="margin-right: 22px"  @click.native="Toggle()">
                   تغییر رمز کاربری
                 </MenuItem>
                 <MenuItem name="5-2" to="/member/applied" style="margin-right: 22px;font-size: 13px; padding-left:10px"  @click.native="Toggle()">
                   وضعیت نمایش اطلاعات تماس
                 </MenuItem>
               </Submenu>
             </Menu>

             <div class="d-flex justify-content-center social-panel">
               <div style="background: #fff;padding: 8px;border-radius: 3px;">
                 <a class="telegram-panel " rel=”nofollow” target="_blank" href="https://t.me/karavel_ir_co" >
                   <iconTelegram></iconTelegram>
                 </a>
               </div>
               <div style="background: #fff;padding: 8px;border-radius: 3px;">
                 <a class="telegram-panel" rel=”nofollow” target="_blank" href="https://www.instagram.com/karavel.ir/"  >
                   <iconInstagram></iconInstagram>
                 </a>
               </div>
             </div>
           </div>
         </div>
        </vuescroll>
    </div>
  </div>
</template>
<script>
import vuescroll from 'vuescroll';

export default {
  components: {
    vuescroll
  },
  data () {
    return {
      operation: {
        mode: 'native',
        sizeStrategy: 'percent',
        detectResize: true,
        scrollPanel: {
          initialScrollY: false,
          initialScrollX: false,
          scrollingX: true,
          scrollingY: true,
          speed: 300,
          easing: undefined,
          verticalNativeBarPos: 'right'
        },
        bar : {
          disable : true
        },
        rail: {
          opacity: '0.2',
          background: '#000',
          border: '1px solid #cecece',
          size: '25px'
        }

      },
    }
  },
  computed: {
    appurl() {
      return this.$store.state.globalFunctions.APP_URL
    },
    User() {
      return this.$store.state.User.User.User;
    },
  },
  mounted() {
    this.$store.dispatch('User/User/LoadUser')
    //console.log(this.$auth.user)
  },

  methods: {
    subj ( number ) { return `/resumes/${number}/${this.User.member.id}`},
    Toggle: function () {
      const nav = this.$refs.input.classList;
      const backgroundMobile = this.$refs.backgroundMobile.classList;
      nav.contains('active') ? nav.remove('active') : nav.add('active');
      backgroundMobile.contains('activeBackgroundMobile') ? backgroundMobile.remove('activeBackgroundMobile') : backgroundMobile.add('activeBackgroundMobile');
    }
  }
}
</script>
<style>
.social-panel {
  display: none !important;
}
:root {
  --var-background-color: #0765bd;
  --var-border-color : #0765bd
}

.btn-menu-re {
  font-size: 20px;
  color: #fff;
  cursor: pointer;
  display: none !important;
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

.v-list-item__title {
  padding: 8px 0;
  font-size: .8125rem;
  font-weight: 500;
  line-height: 1rem;

}

.v-list-item__subtitle {
  font-size: .8125rem;
  font-weight: 500;
  line-height: 1rem;
}





.btn-icon:hover {
  background: #58a3e1;
}



.box-maneu {
  direction: ltr;
  box-shadow: 1px 0 20px rgba(0, 0, 0, .08);
  -webkit-box-shadow: 1px 0 20px rgba(0, 0, 0, .08);
}

.btn-maneu i {
  coller: #fff;
  font-sizr: 17px
}

.dropdown-item {
  padding: 8.25px 1.5rem !important;
}

.v-sheet {
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
  box-shadow: 0 2px 4px -1px rgba(0, 0, 0, .2), 0 4px 5px 0 rgba(0, 0, 0, .14), 0 1px 10px 0 rgba(0, 0, 0, .12);
}

.v-navigation-drawer__content {
  height: 100vh;
  top: 70px;
  max-height: calc(100% - 64px);
  transform: translateX(0%);
  width: 256px;
  border-color: #fff !important;
  position: fixed;
  box-shadow: 1px 0 20px rgba(0, 0, 0, .08);
  -webkit-box-shadow: 1px 0 20px rgba(0, 0, 0, .08);
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
  box-shadow: 0 5px 5px -3px rgba(0, 0, 0, .2), 0 8px 10px 1px rgba(0, 0, 0, .14), 0 3px 14px 2px rgba(0, 0, 0, .12) !important;
  top: 15px !important;
  left: 7px !important;
}

.active {
  right: 0px !important;

}

.ivu-menu-vertical .ivu-menu-submenu-title-icon {
  right: inherit !important;
  left: 20px !important;
}

.btn-icon {
  color: #fff;
  font-size: 18px;
  background: var(--var-background-color) !important;
}

.ss-container:active .ss-scroll, .ss-container:hover .ss-scroll {
  opacity: 1;
}

.ss-scroll {
  background: #9fc9f7 !important;
}
@media screen and (max-width: 992px) {
  .social-panel {
    display: flex !important;
  }
}
@media screen and (max-width: 759px) {
  .v-navigation-drawer__content {
    right: -264px;
  }

  .btn-menu-re {
    display: flex !important;
  }

  .background-model-box {
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

  .activeBackgroundMobile {
    display: block;
  }
  .body-content {
    padding: 0 !important;
  }
}

</style>
