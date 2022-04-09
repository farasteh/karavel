<template>
    <div>
        <nav style="background-color: #1e88e5 !important;border-color: #1e88e5 !important;box-shadow: 0 2px 4px -1px rgba(0,0,0,.2),0 4px 5px 0 rgba(0,0,0,.14),0 1px 10px 0 rgba(0,0,0,.12);" class="navbar navbar-expand-lg navbar-light  bg-primary fixed-top box-maneu">
            <div class=" navbar-collapse">
                <span v-if="generatedToken()" class="navbar-brand user-box">
                    <span class="" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="nav-link" href="#" tabindex="-1" aria-disabled="true">{{ User.name }}</div>
                        </span>
                        <div v-if="User.role == 'Member' "
                             class="dropdown-menu home-menu" aria-labelledby="navbarDropdown">
                            <router-link :to="{ path: '/member'}"  class="dropdown-item">داشبورد</router-link>
                            <router-link :to=" { name : 'appliedResume' } "  class="dropdown-item"> درخواست های من</router-link>
                            <router-link :to="{ name : 'likedResume' } "  class="dropdown-item">   فرصت های شغلی نشان شده</router-link>
                             <router-link :to=" { name : 'memberResumesaz' } "  class="dropdown-item"> رزومه ساز</router-link>
                            <router-link to="/logout"  class="dropdown-item" style="border-bottom: none !important;">
                              <Icon style="float: left;font-size: 24px;" type="md-log-out" />
                              <span>خروج</span>
                            </router-link>
                        </div>
                        <div v-if="User.role == 'Company' "
                             class="dropdown-menu home-menu" aria-labelledby="navbarDropdown">
                            <router-link :to="{  name :'DashboardCompany'}"  class="dropdown-item">داشبورد</router-link>
                            <router-link :to=" { name : 'ContractTypes' } "  class="dropdown-item"> ایجاد آگهی  </router-link>
                            <router-link :to="{ name : 'DashboardCompany' } "  class="dropdown-item">  لیست آگهی ها</router-link>
                               <router-link :to="{path: '/posts/profile'}"  class="dropdown-item">پروفایل</router-link>
                            <router-link to="/logout"  class="dropdown-item" style="border-bottom: none !important;">
                              <Icon style="float: left;font-size: 24px;" type="md-log-out" />
                              <span>خروج</span>
                            </router-link>
                        </div>
                       <div v-if="User.role == 'Admin' "
                            class="dropdown-menu home-menu" aria-labelledby="navbarDropdown">
                            <router-link :to="{  path :'/admin'}"  class="dropdown-item">داشبورد</router-link>
                            <router-link to="/logout"  class="dropdown-item" style="border-bottom: none !important;">
                              <Icon style="float: left;font-size: 24px;" type="md-log-out" />
                              <span>خروج</span>
                            </router-link>
                        </div>
                   </span>
                <span class="navbar-brand" v-else >
                    <router-link  :to="{ name: 'Login'}" style="color: #fff !important;" class="nav-link" href="#" tabindex="-1" aria-disabled="true">ورود</router-link>
                </span>

                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">

                    </li>
                    <li class="nav-item dropdown">
                    </li>
                    <li class="nav-item">

                    </li>
                    <li class="nav-item">

                            <a v-if="Company" style="font-size: 23px;color: #fff;font-weight: bold;" class="nav-link" href="#" tabindex="-1" aria-disabled="true">
                                (
                                {{Company.name_en}}
                                )

                                {{Company.name_fa}}
                            </a>

                    </li>
                </ul>

            </div>
        </nav>
    </div>
</template>
<script>



export default {
    data() {
        return {
            logedIn : false
        }
    },
    created() {

        if(this.generatedToken() == null)
            this.logedIn = false
        else
        {
            this.$store.dispatch('LoadUser')
            this.logedIn = true
        }

    } ,
    computed  : {
        Company() { return this.$store.state.SiteCompany.siteCompanies },
        User(){ return this.$store.state.User.User;},
    } ,

    mounted() {
        let id = this.$route.params.name.split('-')
        this.$store.dispatch('LoadSiteCompany' , {id : id[0]});
    },
}
</script>
<style>
@import '~vue-simple-scrollbar/dist/vue-simple-scrollbar.css';
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
    color: #fff !important;
    border-bottom: 1px solid ;
}
.dropdown-menu.home-menu  .dropdown-item:hover{
    background: #080909;
    color: #fff !important;
}
.dropdown-menu.home-menu {
    color: #fff !important;
    background: #242628e8 !important;
    top: 60px !important
}
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
.navbar-brand {
    margin-left: 1rem !important;
    margin-right: 0 !important;
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
