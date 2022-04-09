<template>
  <div>
    <div @click="Toggle()" ref="backgroundMobile"  class="background-model-box" ></div>
    <nav   class="navbar navbar-expand-lg navbar-light  bg-primary fixed-top nav-back" dir="ltr">
           <span class="navbar-brand">
               <span id="navbarDropdown" class=" btn-icon" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v"></i>
                </span>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <nuxt-link to="/admin/jobs "  class="dropdown-item">لیست شغل ها</nuxt-link>
                    <nuxt-link to="/admin/advertising/list"  class="dropdown-item">لیست آگهی</nuxt-link>
                    <div class="dropdown-divider"></div>
                    <nuxt-link to="/logout"  class="dropdown-item">
                      <Icon class="float-left font-25" type="md-log-out" />
                      <span>خروج</span>
                    </nuxt-link>
                </div>
           </span>
      <div>
        <span class="text-light">به پنل ادمین خوش آمدید</span>
      </div>
      <span @click="Toggle()" class="btn-menu-re btn-icon">
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
            <nuxt-link to="/" class="nav-link pt-0 pb-0" tabindex="-1" aria-disabled="true">
              <img src="~/assets/images/karavel-logo.png" alt="" height="53px">
            </nuxt-link>
          </li>
        </ul>
      </div>
    </nav>
    <div ref="input" class="v-navigation-drawer__content h-100">
      <vuescroll :ops="operation">
        <div class="menu-header-fixed">
          <div class="top-menue d-flex">
            <div class="v-list-item__content">
              <div class="v-list-item__title">ادمین سفربانک</div>
            </div>
          </div>
        </div>

        <div style="margin-top: 5px;" class="eee">
          <Menu  active-name="1" style="width: 244px;">
            <MenuItem name="3" to="/">
              <Icon type="md-home" />
              صفحه اصلی سایت
            </MenuItem>
            <MenuItem name="1" to="/admin" @click.native="Toggle()">
              <Icon type="md-document" />
              <span>داشبورد</span>
            </MenuItem>
            <MenuItem name="2" to="/admin/jobs" @click.native="Toggle()">
              <Icon type="ios-create" />
              <span >ایجاد شغل</span>
            </MenuItem>
            <Submenu name="3">
              <template slot="title">
                <Icon type="ios-paper" />

                لیست آگهی ها
              </template>
              <MenuItem name="3-1" to="/admin/Companies/list" @click.native="Toggle()"  style="margin-right: 22px">
                لیست شرکت ها
              </MenuItem>
              <MenuItem name="3-2" to="/admin/advertising/list" @click.native="Toggle()" style="margin-right: 22px">
                لیست همه آگهی ها
              </MenuItem>
            </Submenu>
            <MenuItem name="4" to="/admin/behvioralSkill" @click.native="Toggle()">
              <Icon type="md-list-box" />
              مهارت های رفتاری
            </MenuItem>
            <MenuItem name="5" to="/admin/telegram" @click.native="Toggle()">
              <Icon type="md-list-box" />
              نمایش در تلگرام
            </MenuItem>
            <Submenu name="6">
              <template slot="title"><Icon type="ios-cog" /> کاربران</template>
              <MenuItem name="6-1" to="/admin/user/list" @click.native="Toggle()" style="margin-right: 22px">
                لیست
              </MenuItem>
              <MenuItem name="6-2" to="/admin/user/resumes" @click.native="Toggle()" style="margin-right: 22px">
                رزومه های ارسالی
              </MenuItem>
              <MenuItem name="6-3" to="/admin/user_report" @click.native="Toggle()" style="margin-right: 22px">
                گزارشگر  تخلف
              </MenuItem>
            </Submenu>
          </Menu>
        </div>
      </vuescroll>
    </div>
  </div>
</template>
<script>

import vuescroll from 'vuescroll';

export default {
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

  components: {
    vuescroll
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
