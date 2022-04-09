<template>
  <div>
    <div v-on:click="Toggle()" ref="backgroundMobile" class="background-model-box"></div>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top nav-back" dir="ltr">
           <span class="navbar-brand">
               <span id="navbarDropdown" class=" btn-icon" role="button" data-toggle="dropdown"
                     aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v"></i>
               </span>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <nuxt-link to="/posts/create" class="dropdown-item">ثبت آگهی </nuxt-link>
                    <nuxt-link to="/posts" class="dropdown-item">لیست آگهی ها </nuxt-link>
                    <div class="dropdown-divider"></div>
                    <nuxt-link to="/logout" class="dropdown-item">
                      <Icon style="float: left;font-size: 24px;" type="md-log-out"/>
                      <span>خروج</span>
                    </nuxt-link>
                </div>
           </span>
      <div>
        <span class="text-dark">{{ User.Company.name_fa }} خوش آمدید</span>
      </div>
      <span v-on:click="Toggle()" class="btn-menu-re btn-icon">
                <i class="fas fa-bars"></i>
            </span>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto align-items-center">
          <li class="nav-item active">
          </li>
          <li class="nav-item mr-2">
            <div style="background: #fff;padding: 8px;border-radius: 3px;">
              <a rel=”nofollow” class="telegram-panel" target="_blank" href="https://t.me/karavel_ir_co" >
                <iconTelegram></iconTelegram>
             </a>
            </div>
          </li>
          <li class="nav-item" >
                <div style="background: #fff;padding: 8px;border-radius: 3px;">
                  <a rel=”nofollow” class="telegram-panel" target="_blank" href="https://www.instagram.com/karavel.ir/"  >
                  <iconInstagram></iconInstagram>
                </a>
                </div>
          </li>
          <li class="nav-item">
            <nuxt-link to="/"
                         style="font-size: 23px;color: #fff;font-weight: bold;" class="nav-link pt-0 pb-0"
                         tabindex="-1" aria-disabled="true">
              <img src="~/assets/images/karavel-logo.png" alt="" height="58px">
            </nuxt-link>
          </li>
        </ul>
      </div>
    </nav>
    <div ref="input" style="height: 100%; " class="v-navigation-drawer__content">
      <vuescroll :ops="operation">
        <div>
          <div class="menu-header-fixed">
            <div class="top-menue" style="display:flex; padding-bottom: 40px" v-if="User.Company">
              <div class="col-9 m-auto border d-flex" style="border-radius : 4px">
                <div class="image-profile-menue " >
                  <img v-if="ErrorImage"  src="/images/company/no-company.png"  :alt=" User.Company.name_fa">
                  <img v-else
                       :src="User.Company.logo == '' || User.Company.logo == null ?  '/images/company/no-company.png' : base + '/images/company/'+User.Company.logo"
                       :alt=" User.Company.name_fa"
                       @error="imageError"
                  />
                </div>
                <div class="v-list-item__content">
                  <div class="v-list-item__subtitle caption">
                    {{ User.Company.name_fa }}
                  </div>
                </div>
              </div>
            </div>
            <Button class="d-flex justify-content-center mx-auto w-75" style="margin-top: -30px; position: relative; top: -5px"   @click="openPro">
              <Icon type="ios-home" style="font-size: 16px;margin-left: 2px;"/>
              صفحه من در کاراول
            </Button>
          </div>
          <div style="margin-top: 5px;" class="eee">

            <Menu active-name="1" style="width: 244px;">
              <MenuItem name="3" :to="{ path : '/' }">
                <Icon type="md-home" />
                صفحه اصلی سایت
              </MenuItem>
              <MenuItem name="1" :to="{ path : '/posts' }" @click.native="Toggle()">
                <Icon type="md-document"/>
                داشبورد
              </MenuItem>
              <MenuItem name="2" :to="{ path : '/posts/profile' }" @click.native="Toggle()">
                <Icon type="ios-create" />
                 اطلاعات شرکت من
              </MenuItem>
              <MenuItem name="3"  :to="{ path : '/posts/banner' }" @click.native="Toggle()">
                <Icon type="ios-cloud-upload" />
                آپلود بنر
              </MenuItem>
              <Submenu name="4">
                <template slot="title">
                  <Icon type="ios-copy" />
                  آگهی استخدام من
                </template>
                <MenuItem name="4-1" :to="{ path : '/posts/create' }" @click.native="Toggle()"  style="margin-right: 22px">
                  ثبت آگهی
                </MenuItem>
                <MenuItem name="4-2" :to="{ path : '/posts' }" @click.native="Toggle()" style="margin-right: 22px; ">
                  لیست آگهی ها
                </MenuItem>
                <MenuItem name="4-3" :to="{ path : '/posts/archieved' }" @click.native="Toggle()" style="margin-right: 22px;">
                  آرشیو آگهی ها
                </MenuItem>
              </Submenu>
              <MenuItem name="5" :to="{ path : '/posts/staff/request' }" @click.native="Toggle()">
                <Icon type="ios-create" />
                پیشنهادهای کاری به کارجو
              </MenuItem>
              <Submenu name="6">
                <template slot="title">
                  <Icon type="ios-cog"/>
                  تنضیمات
                </template>
                <MenuItem name="6-1" :to="{ path : '/posts/password' }" @click.native="Toggle()" style="margin-right: 22px">
                  تغییر رمز کاربری
                </MenuItem>
              </Submenu>
            </Menu>
            <div class="d-flex justify-content-center social-panel">
              <div style="background: #fff;padding: 8px;border-radius: 3px;">
                <a class="telegram-panel " target="_blank" href="https://t.me/karavel_ir_co" rel=”nofollow”>
                  <iconTelegram></iconTelegram>
                </a>
              </div>
              <div style="background: #fff;padding: 8px;border-radius: 3px;">
                <a class="telegram-panel" target="_blank" href="https://www.instagram.com/karavel.ir/" rel=”nofollow” >
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
  data(){
    return {
      ErrorImage : false ,
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
    base() {
      return this.$store.state.globalFunctions.APP_URL
    },
    User() {
      return this.$store.state.User.User.User;
    },
    CompanyUser() {
      return this.$store.state.User.CompanyUser;
    },
    pathName() {
      var namee = this.User.Company.name_en
      if(namee) {
        namee = namee.toLowerCase()
        namee = namee.replace(/\s/g, '-')
        return this.User.Company.id + '-' + namee
      }
    },
  },
  mounted() {

    this.$store.dispatch('User/User/LoadUser')
  },
  components: {
    vuescroll
  },
  methods: {
    gotoPro() {
      this.$router.push("/posts/profile").catch(()=>{});
    },
    openPro() {
      let routeUrl = this.$router.resolve({
        path : `/company/${this.pathName}`
      });
      window.open(routeUrl.href, '_blank');
    },
    imageError() {
      this.ErrorImage = true
    },
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
.social-panel{
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
.telegram-panel:hover {
    color: blue;
}
</style>
