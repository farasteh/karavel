<template>
    <div>
        <nav  class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top box-maneu company-nav" style="background-color: #1e88e5 !important;border-color: #1e88e5 !important;box-shadow: 0 2px 4px -1px rgba(0,0,0,.2),0 4px 5px 0 rgba(0,0,0,.14),0 1px 10px 0 rgba(0,0,0,.12); height: 44px">
            <role :role="memberRole" :user="User" :links="links" class="user-res"></role>
            <router-link :to="{name  : 'Home' }"
                         class="router-link-exact-active router-link-active navbar-brand"
                         style="color: #fff;font-weight: bold;">سفربانک<span class="sr-only">(current)</span>
            </router-link>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span  class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse margin-box" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <router-link :to="{name  : 'Home' }" class="nav-link" > <i class="fas fa-home"></i> <span class="ml-1">خانه</span> </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link :to="{ name : 'SiteJobs' }" class="nav-link" href="#" ><i style="font-size: 13px;" class="fas fa-search"></i><span class="mr-1">آگهی های استخدام</span> </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link :to="{name  : 'resume' }" class="nav-link" href="#" ><i style="font-size: 13px;" class="fas fa-gem"></i><span class="mr-1">رزومه ساز</span></router-link>
                    </li>
                    <li class="nav-item">
                        <router-link :to="{name  : 'companyPage' }" class="nav-link" href="#" > <i style="font-size: 13px;"  class="fas fa-building"></i><span class="mr-1">بخش کارفرمایان</span> </router-link>
                    </li>
                </ul>
                <div class="form-inline my-2 my-lg-0" style="position: relative">
                    <role :role="memberRole" :user="User" :links="links" :logedIn="logedIn"></role>
                </div>
            </div>
        </nav>
    </div>
</template>
<script>

import role from '../../includes/Home/roleDropMenu'
export default {
    components : { role },
    data() {
        return {
            logedIn : false
        }
    },
    created() {

        this.$store.dispatch('LoadUser')
            .then( success => {this.logedIn = true} )
            .catch ( error  => { this.logedIn = false })

    } ,
    computed  : {
        User(){return this.$store.state.User.User;},
        memberRole() { return this.$store.getters.userRole } ,
        links() {
            switch (this.memberRole) {
                case "Member":
                    return [
                        {
                            name : 'MemberResume',
                            title : 'داشبورد'
                        },
                        {
                            name : 'appliedResume',
                            title : 'درخواست های من'
                        },
                        {
                            name : 'likedResume',
                            title : 'فرصت های شغلی نشان شده'
                        },
                        {
                            name : 'memberResumesaz',
                            title : 'رزومه ساز'
                        },

                    ]
                    break;
                case "Admin":
                    return [
                        {
                            name : 'adminDashboard',
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
                            name : 'ContractTypes',
                            title : 'ایجاد آگهی'
                        },
                        {
                            name : 'DashboardCompany',
                            title : 'لیست آگهی ها'
                        },
                        {
                            name : 'ProfileCompany',
                            title : 'پروفایل'
                        },
                    ]
                    break;
                default:
                    console.log("Try looking up for a hint.");
            }
        }
    } ,
    mounted() {
    }
}
</script>
<style>
@import '~vue-simple-scrollbar/dist/vue-simple-scrollbar.css';
</style>
