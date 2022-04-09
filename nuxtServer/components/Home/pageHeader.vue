<template>
  <div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top company-nav nav-back">
      <div class="user-response" style="visibility: hidden"></div>
      <nuxt-link to="/"  class="router-link-exact-active router-link-active navbar-brand text-white font-weight-bold position-absolute">
        <img style="height: 58px;" src="~/assets/images/karavel-logo.png" alt="karavel-logo">
      </nuxt-link>
      <button ref="showMenu" class="navbar-toggler" type="button" @click="mobileMenu = !mobileMenu">
        <span  class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse margin-box margin-box2 align-items-center position-relative justify-content-between" style=" margin-top: -2px" id="navbarSupportedContent">
        <ul class="navbar-nav" style="width: 100%;">
          <li class="nav-item font-12" style="width: 25%">
            <nuxt-link to="/" class="nav-link">
              <i  class="fas fa-gem font-12"></i>
              <span>فرصت&hairsp;های <span class="d-res-none">کاریابی</span></span>
            </nuxt-link>
          </li>
          <li class="nav-item font-12" style="width: 25%">
            <nuxt-link to="/staff" class="nav-link">
              <i class="fas fa-users font-12"></i>
              <span>
                کارمندان
                <span class="d-res-none">
                  مسافرتی
                </span>
                <span style="margin-right: 5px;font-size: 8px;margin-bottom: 4px;" class="badge badge-danger position-absolute">جدید</span>
              </span>
            </nuxt-link>
          </li>
          <li class="nav-item font-12" style="width: 25%">
            <nuxt-link to="/resume" class="nav-link">
              <i class="fas fa-file-alt font-12"></i>
              <span>رزومه ساز
                <span class="d-res-none">
                  مسافرتی
                </span>
              </span>
            </nuxt-link>
          </li>
          <li class="nav-item font-12" style="width: 25%">
            <nuxt-link to="/companies" class="nav-link" >
              <i class="fas fa-globe font-12" ></i>
              <span>آگهی
                <span class="d-res-none">
                  کارمندیابی
                </span>
              </span>
            </nuxt-link>
          </li>

        </ul>
        <div class="form-inline my-2 my-lg-0 position-relative">
            <AuthRole :role="memberRole" :user="User" :links="links" :logedIn="loggedIn"></AuthRole>
        </div>
      </div>
      <div class="menu-res" id="mySidenav" ref="showMenuss">
        <div class="w-100">
          <ul class="navbar-nav mr-auto" style="border-bottom: 1px dashed #fff">
            <li class="nav-item">
              <nuxt-link to="/" @click.native="mobileMenu = false" class="nav-link" style="line-height: 50px;padding-right: 10px;">
                <i class="fas fa-gem font-13"></i>
                <span class="mr-1"> فرصت های کاریابی</span>
              </nuxt-link>
            </li>
            <li class="nav-item" >
              <nuxt-link to="/staff" @click.native="mobileMenu = false" class="nav-link" style="line-height: 50px;padding-right: 10px;">
                <i class="fas fa-users font-13"></i>
                <span class="mr-1">کارمندان مسافرتی
                      <span style="margin-right: 8px;font-size: 8px;margin-bottom: 4px;" class="badge badge-danger position-absolute">جدید</span>
                </span>
              </nuxt-link>
            </li>
            <li class="nav-item">
              <nuxt-link to="/companies" @click.native="mobileMenu = false" class="nav-link" style="line-height: 50px;padding-right: 10px;">
                <i class="fas fa-file-alt font-13"></i>
                <span class="mr-1">آگهی کارمندیابی</span>
              </nuxt-link>
            </li>
            <li class="nav-item" >
              <nuxt-link to="/resume" @click.native="mobileMenu = false"  class="nav-link" style="line-height: 50px;padding-right: 10px;">
                <i class="fas fa-globe font-13" ></i>
                <span class="mr-1">رزومه ساز مسافرتی</span>
              </nuxt-link>
            </li>

          </ul>
          <div class="mt-2 text-center">
            <AuthRole :role="memberRole" :user="User" :links="links" :logedIn="loggedIn"></AuthRole>
          </div>
        </div>

      </div>
      <div @click="mobileMenu = false" v-if="mobileMenu" class="position-fixed w-100 h-100 "
           style="top: 65px ; right: 245px ; left: 0 ; right: 0 ; background: #777; opacity: .6"></div>
    </nav>
  </div>
</template>
<script>

export default {
  name  : 'pageHeader',
  data() {
    return {
      logedIn : false ,
      mobileMenu  : false,
    }
  },
  created() {
    //document.addEventListener('click', this.documentClick)
    this.$store.dispatch('User/User/LoadUser')
      .then( success => {this.logedIn = true} )
      .catch ( error  => { this.logedIn = false })

  } ,
  destroyed() {
   // document.removeEventListener('click', this.documentClick)
  },
  computed  : {
    User(){return this.$store.state.User.User.User},
    memberRole() { return this.$store.getters['User/User/userRole'] } ,
    links() {
      switch (this.memberRole) {
        case "Member":
          return [
            {
              name : '/member/applied',
              title : 'داشبورد'
            },
            {
              name : '/member/resume',
              title : 'رزومه کاراولی'
            },

          ]
          break;
        case "Admin":
          return [
            {
              name : '/admin',
              title : 'داشبورد'
            },
          ]
          break;
        case "Company":
          return [
            {
              name : '/posts',
              title : 'داشبورد'
            },
            {
              name : '/posts/profile',
              title : 'اطلاعات شرکت'
            },
          ]
          break;
        case "NOTMember":
          return [
            {
              name : '/register/member',
              title : 'داشبورد'
            },
            {
              name : '/register/member',
              title : 'رزومه کاراولی'
            },
          ]
          break;
        case "NOTCompany":
          return [
            {
              name : '/register/company',
              title : 'داشبورد'
            },
            {
              name : '/register/company',
              title : 'اطلاعات شرکت'
            },
          ]
          break;
        default:
          console.log("Try looking up for a hint.");
      }
    } ,
    loggedIn() {
      return this.$store.state.User.User.loggedIn
    }
  } ,
  watch : {
    mobileMenu() {
      if(this.mobileMenu)
        document.getElementById("mySidenav").style.right = "0px";
      else
        document.getElementById("mySidenav").style.right = "-245px";

    }
  },
  methods : {
    documentClick(e){
      // let el = this.$refs.showMenu
      // let elll = this.$refs.showMenuss
      // console.log(elll)
      // let target = e.target
      // if ( el !== target && !el.contains(target))
      //     this.mobileMenu = false
      // if( elll == target && elll.contains(target) )
      //     this.mobileMenu = true

    },
  }
}
</script>
<style scoped>

.navbar {
  padding : .9rem 1rem !important
}

.menu-res { display: none}
@media screen and (max-width: 990px) {
  .navbar {
    padding : .9rem 1rem !important
  }
  .margin-box2 {
    margin-left: 0rem !important;
    margin-right: .5rem !important;
  }
  .menu-res {
    display: inherit;
  }
  .menu-res {
    position: fixed !important;
    width: 245px;
    height: 100%;
    background:#fff;
    overflow-x: hidden;
    float: right;
    top: 67px;
    opacity: 1;
    padding: 0 10px;
    z-index: 99999;
    padding-top: 20px;
    right: -245px;
    transition: right .5s ;
    border-left: 1px solid var(--var-background-color);
  }
  @keyframes menuAnim {
    from   {right: -245px;}
    to    {right: 0;}
  }
}

@media screen and (max-width: 1200px) and (min-width: 991px){
  .d-res-none {
    display: none;
  }
}
</style>
