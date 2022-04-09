import VueRouter from 'vue-router'
const originalPush = VueRouter.prototype.push

VueRouter.prototype.push = function push(location) {

    return originalPush.call(this, location).catch(err => err)

}
let routes = [
    {
        path: '',
        name: 'home',
        component: require('./components/Index.vue').default,
        children: [{
                path: '',
                name: 'Home',
                component: require('./components/Home/Home.vue').default
            },
            {
                //karfarma
                path: '/company/:name',
                name: 'SiteShowCompany',
                component: require('./components/Home/Company/box.vue').default,
            },
            {
                path: 'resume',
                name: 'resume',
                component: require('./components/Home/resume/resume').default
            },
            {
                path: 'companies',
                name: 'companyPage',
                component: require('./components/Home/Company/companyPage').default
            },
            {
                path: 'jobs',
                name: 'SiteJobs',
                component: require('./components/Home/Jobs').default,
                children: [{
                    path: ':id-page',
                    name: 'SiteShowJob',
                    component: require('./components/Home/Advetising/Show.vue').default,
                }]
            },
            {
                path: 'jobs/:id',
                name: 'SiteShowJobIndex',
                component: require('./components/Home/Advetising/Show.vue').default,
            },
        ],
    },
    {
        path: '/register',
        component: require('./components/Auth/Register.vue').default
    },
    {
        path: '/register/company',
        name: 'RegisterCompany',
        component: require('./components/Auth/CreateCompany/Create.vue').default
    },
    {
        path: '/register/member',
        name: 'RegisterMember',
        component: require('./components/Auth/CreateMember/Create.vue').default
    },
    {
        path: '/login',
        name: 'Login',
        component: require('./components/Auth/Login.vue').default
    },
    {
        path: '/login-token-company/:token',
        name: 'loginTokenCompany',
        component: require('./components/Auth/LoginToken.vue').default
    },
    {
        path: '/users',
        name: 'users',
        component: require('./components/Auth/users.vue').default,
        children: [
            {
                path: 'login-register/:type',
                name: 'RegisterLogin',
                component: require('./components/Auth/RegisterLogin.vue').default,
            },
            {
                path: 'verify-mobile',
                name: 'verifyMobile',
                component: require('./components/Auth/CheckMobile.vue').default,
            },
            {
                path: 'register',
                name: 'Register',
                component: require('./components/Auth/Register.vue').default,
            },
            {
                path: 'login',
                name: 'LoginUser',
                component: require('./components/Auth/LoginUser.vue').default,
            },
            {
                path: 'forget-password',
                name: 'forget_password',
                component: require('./components/Auth/forget_password.vue').default,
            },
            {
                path: 'forget/:type',
                name: 'forget',
                component: require('./components/Auth/forget.vue').default,
            },
        ]
    },
    {
        path: '/logout',
        name: 'Logout',
        component: require('./components/Auth/Logout.vue').default
    },
    {
        path: '/posts',
        name: 'karfarmaDashboard',
        component: require('./components/IndexCompany.vue').default,
        children: [{
                path: '',
                name: 'DashboardCompany',
                component: require('./components/Dashboard/Dashboard.vue').default
            },
            {
                path: 'password',
                name: 'updatePassword',
                component: require('./components/Auth/sitting/updatePassword').default,

            },
            {
                path: 'archieved',
                name: 'archievedAd',
                component: require('./components/Dashboard/archieved.vue').default
            },
            {
                path: 'resume/:adId/:resumeId',
                name: 'resumeAdvertising',
                component: require('./components/company/detail.vue').default
            },
            {
                path: 'create',
                name: 'ContractTypes',
                component: require('./components/Dashboard/Create.vue').default
            },
            {
                path: 'profile',
                name: 'ProfileCompany',
                component: require('./components/Auth/Profile.vue').default
            },
            {
                path: 'banner',
                name: 'uploadBanner',
                component: require('./components/Dashboard/Banner.vue').default
            },
            {
                path: 'status/:id',
                name: 'postStatus',
                component: require('./components/company/status.vue').default
            },
            {

                path: 'edit',
                component: {
                    template: '<router-view></router-view>'
                },
                children: [{
                    path: ':id',
                    name: 'AdvertisingEdit',
                    component: require('./components/Dashboard/Edit.vue').default
            },

            ]
            },
        ] ,

    },

    {
        //karfarma
        path: '/admin',
        name: 'adminDashboard',
        component: require('./components/IndexAdmin.vue').default,
        children: [{
                path: 'jobs',
                name: 'Jobs',
                component: require('./components/Admin/Jobs.vue').default
            },
            {
                path: '',
                name: 'DashboardAdmin',
                component: require('./components/Admin/Dashboard.vue').default
            },
            {
                path: 'behvioralSkill',
                name: 'behavioralSkillAdmin',
                component: require('./components/Admin/Advertisings/behavioralSkill.vue').default
            },
            {
                path: 'user_report',
                name: 'UserBlockList',
                component: require('./components/Admin/user/report/list.vue').default
            },
            {
                path: 'activityCompany',
                name: 'activityCompanyAdmin',
                component: require('./components/Admin/ActivityCompany.vue').default
            },
            {
                path: 'advertising',
                component: {
                    template: '<router-view></router-view>'
                },
                children: [{
                    path: 'list',
                    name: 'AdvertisingListAdmin',
                    component: require('./components/Admin/Advertisings/List.vue').default
                },
                    {
                        path: 'show',
                        component: {
                            template: '<router-view></router-view>'
                        },
                        children: [{
                            path: ':id',
                            name: 'AdvertisingAdminShow',
                            component: require('./components/Admin/Advertisings/Show.vue').default
                        }, ]
                    },
                ]
            },
            {
                path: 'Companies',
                component: {
                    template: '<router-view></router-view>'
                },
                children: [{
                        path: 'list',
                        name: 'AdminCompaniesList',
                        component: require('./components/Admin/Company/list.vue').default
                    },
                    {
                        path: 'show',
                        component: {
                            template: '<router-view></router-view>'
                        },
                        children: [{
                            path: ':id',
                            name: 'AdminCompaniesShow',
                            component: require('./components/Admin/Company/Show.vue').default
                        }, ]
                    },
                ]
            },
            {
                path: 'profile',
                name: 'Profile',
                component: require('./components/Auth/Profile.vue').default
            },
            {
                path: 'AdvertisingsShow',
                name: 'Profile',
                component: {
                    template: '<router-view></router-view>'
                },
            },
        ]
    },
    //member
    {
        path: '/member',
        name: 'MemberResume',
        component: require('./components/MemberIndex.vue').default,
        children: [{
            path: 'resume',
            name : 'memberResumesaz' ,
            component: require('./components/Member/Resume/Resume.vue').default,
            } ,
            {
                path: 'password',
                name: 'updatePasswordMember',
                component: require('./components/Auth/sitting/updatePassword').default,

            },
            {
                path: 'extraResume',
                name: 'extraResume',
                component: require('./components/Member/Resume/extraResumes.vue').default,

            },
            {
                path: 'liked',
                name : 'likedResume' ,
                component: require('./components/Member/favorites/liked.vue').default,
            } ,
            {
                path: 'applied' ,
                name : 'appliedResume' ,
                component: require('./components/Member/advertizing/advertizing.vue').default,

            } ,
          {
                path: 'applied/:id',
                name: 'memberAdvertizingSingle',
                component: require('./components/Member/advertizing/single.vue').default
            }
        ]
    },
    {
        //karfarma
        path: '/resumes',
        component: {
            template: '<router-view></router-view>' ,
        },
        children: [{
                path: '1/:id',
                name: 'theme1',
                component: require('./components/Member/Resume/pdfTemplates/theme.vue').default
            },
            {
                path: '2/:id',
                name: 'theme2',
                component: require('./components/Member/Resume/pdfTemplates/theme2.vue').default
            },
            {
                path: '3/:id',
                name: 'theme3',
                component: require('./components/Member/Resume/pdfTemplates/theme3.vue').default
            },
            {
                path: '4/:id',
                name: 'theme4',
                component: require('./components/Member/Resume/pdfTemplates/theme4.vue').default
            },

        ]
    },

    // not found
    { path: "*", component: require('./components/Error/NotFound.vue').default }

];

export default new VueRouter({
    routes ,
    mode: 'history',
    scrollBehavior (to, from, savedPosition) {
        return { x: 0, y: 0 }
    }
});

