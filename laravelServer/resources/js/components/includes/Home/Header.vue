<template>
    <div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top company-nav" style="background-color: #1e88e5 !important;border-color: #1e88e5 !important;box-shadow: 0 2px 4px -1px rgba(0,0,0,.2),0 4px 5px 0 rgba(0,0,0,.14),0 1px 10px 0 rgba(0,0,0,.12);">
            <div class="user-response" style="visibility: hidden"></div>
            <router-link :to="{name  : 'Home' }"  class="router-link-exact-active router-link-active navbar-brand" style="color: #fff;font-weight: bold;position: absolute;">
                <img style="height: 53px;" src="../../../../images/site/karavel-logo.png" alt="" height="40px">
            </router-link>
            <button ref="showMenu" class="navbar-toggler" type="button" @click="mobileMenu = !mobileMenu">
                <span  class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse margin-box margin-box2" style="flex: 0 0 70%;"id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto" style="width: 66%;">
<!--                    <li class="nav-item" style="flex-grow: 0.75;">-->
<!--                        <router-link :to="{name  : 'Home' }" class="nav-link" > <i style="font-size: 24px;" class="fas fa-home"></i> <span class="ml-1"></span> </router-link>-->
<!--                    </li>-->

                    <li class="nav-item" style="flex-grow: 0.2;">
                        <router-link :to="{ name : 'SiteJobs' }" class="nav-link" ><i style="font-size: 13px;" class="fas fa-search"></i><span class="mr-1">کاریابی</span> <p style="position: absolute;font-size: 10px;">استخدام در گردشگری</p></router-link>
                    </li>
                    <li class="nav-item" style="flex-grow: 0.1;">
                        <router-link :to="{name  : 'resume' }" class="nav-link"><i style="font-size: 13px;" class="fas fa-gem"></i><span class="mr-1">رزومه ساز</span><p style="position: absolute;font-size: 10px;margin-right: 5px">رزومه کاراولی بساز</p></router-link>
                    </li>
                    <li class="nav-item" style="flex-grow: 0.2;">
                        <router-link :to="{name  : 'companyPage' }"   class="nav-link" >
                            <i style="font-size: 13px;"  class="fas fa-building" ></i><span class="mr-1">کارفرما</span><p style="position: absolute;font-size: 10px;">آگهی کارمندیابی بساز</p> </router-link>
                    </li>
                    <li class="nav-item" style="flex-grow: 0.2;">
                        <a class="nav-link" > <i style="font-size: 13px;"  class="fas fa-users"></i><span class="mr-1">کارمندان<span style="margin-right: 8px;font-size: 8px;margin-bottom: 4px;position: absolute" class="badge badge-danger">به زودی</span></span><p style="position: absolute;font-size: 10px;">لیست کارمندان گردشگری</p> </a>
                    </li>
                </ul>
                <div class="form-inline my-2 my-lg-0" style="position: relative">
                    <role :role="memberRole" :user="User" :links="links" :logedIn="logedIn"></role>
                </div>
            </div>
            <div class="menu-res" id="mySidenav" ref="showMenuss">
                <div class="w-100">
                    <ul class="navbar-nav mr-auto" style="border-bottom: 1px dashed #fff"  >
                        <li class="nav-item" >
                            <router-link :to="{ name : 'SiteJobs' }" @click.native="mobileMenu = false" class="nav-link" style="line-height: 50px;padding-right: 10px;" >
                                <i style="font-size: 13px;" class="fas fa-search"></i>
                                <span class="mr-1">کاریابی</span>
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link :to="{name  : 'resume' }" @click.native="mobileMenu = false" class="nav-link" style="line-height: 50px;padding-right: 10px;">
                                <i style="font-size: 13px;" class="fas fa-gem"></i>
                                <span class="mr-1">رزومه ساز</span>
                            </router-link>
                        </li>
                        <li class="nav-item" >
                            <router-link :to="{name  : 'companyPage' }" @click.native="mobileMenu = false"  class="nav-link" style="line-height: 50px;padding-right: 10px;">
                                <i style="font-size: 13px;"  class="fas fa-building" ></i>
                                <span class="mr-1">کارفرما</span>
                            </router-link>
                        </li>
                        <li class="nav-item" >
                            <a class="nav-link" style="line-height: 50px;padding-right: 10px;">
                                <i style="font-size: 13px;"  class="fas fa-users"></i>
                                <span class="mr-1">کارمندان<span style="margin-right: 8px;font-size: 8px;margin-bottom: 4px;position: absolute" class="badge badge-danger">به زودی</span></span>
                            </a>
                        </li>
                    </ul>
                    <div class="mt-4 text-center">
                        <role :role="memberRole" :user="User" :links="links" :logedIn="logedIn"></role>
                    </div>
                </div>

            </div>
            <div @click="mobileMenu = false" v-if="mobileMenu" style="position: fixed; width : 100% ; height: 100% ;top: 60px ; right: 245px ; left: 0 ; right: 0 ; background: #777; opacity: .6"></div>
        </nav>
    </div>
</template>
<script>

import role from './roleDropMenu'
export default {
    components : { role },
    data() {
        return {
            logedIn : false ,
            mobileMenu  : false,
        }
    },
    created() {
        document.addEventListener('click', this.documentClick)
        this.$store.dispatch('LoadUser')
            .then( success => {this.logedIn = true} )
            .catch ( error  => { this.logedIn = false })

    } ,
    destroyed() {
        document.removeEventListener('click', this.documentClick)
    },
    computed  : {
        User(){return this.$store.state.User.User;},
        memberRole() { return this.$store.getters.userRole } ,
        links() {
            switch (this.memberRole) {
                case "Member":
                    return [
                        {
                            name : 'appliedResume',
                            title : 'داشبورد'
                        },
                        {
                            name : 'memberResumesaz',
                            title : 'رزومه کاراولی'
                        },

                    ]
                    break;
                case "Admin":
                    return [
                        {
                            name : 'DashboardAdmin',
                            title : 'داشبورد'
                        },
                    ]
                    break;
                case "Company":
                    return [
                        {
                            name : 'DashboardCompany',
                            title : 'داشبورد'
                        },
                        {
                            name : 'ProfileCompany',
                            title : 'اطلاعات شرکت'
                        },
                    ]
                    break;
                default:
                    console.log("Try looking up for a hint.");
            }
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
<style>

@import '~vue-simple-scrollbar/dist/vue-simple-scrollbar.css';
.menu-res { display: none}
@media screen and (max-width: 990px) {

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
        background: #1e88e5;
        overflow-x: hidden;
        float: right;
        top: 60px;
        opacity: 1;
        padding: 0 10px;
        z-index: 99999;
        padding-top: 20px;
        /*animation-duration: .5s;*/
        /*animation-name: menuAnim;*/
        right: -245px;
        transition: right .5s ;
    }
    @keyframes menuAnim {
        from   {right: -245px;}
        to    {right: 0;}
    }
}
</style>
