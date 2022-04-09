<template>
    <div  class="">
        <svg style="position: relative;top: 2px" class="mobile-footer-box" xmlns="http://www.w3.org/2000/svg" viewBox="0 200 1440 120"><path fill="#1e88e5" fill-opacity="1" d="M0,256L80,245.3C160,235,320,213,480,213.3C640,213,800,235,960,245.3C1120,256,1280,256,1360,256L1440,256L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"></path></svg>
        <div class="bk-footer">
            <div class="row col-11 container-box-footer mobile-footer-box">
                <div class="col-md-3">
                    <div class="box-list-header-footer">
                        <h3>کارمندان گردشگری</h3>
                    </div>
                    <div class="box-list-body-footer">
                        <div class="mt-2">
                            <router-link tag="a" :to="{name : 'RegisterLogin' ,  params : {type: 'Member'}}">ورود ثبت نام</router-link>
                        </div>
                        <div class="mt-2">
                            <router-link tag="a"  :to="{name  : 'resume' }">رزومه ساز آنلاین</router-link>
                        </div>
                        <div class="mt-2"><router-link tag="a"  :to="{ name : 'SiteJobs' }">آگهی های استخدام</router-link></div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="box-list-header-footer">
                        <h3>آژانس های مسافرتی و هتل ها</h3>
                    </div>
                    <div class="box-list-body-footer">
                        <div class="mt-2">
                            <router-link tag="a" :to="{name : 'RegisterLogin' ,  params : {type: 'Company'}}">ورود ثبت نام</router-link>
                        </div>
                        <div class="mt-2"><router-link tag="a"  :to="{name  : 'companyPage' }">   سامانه کاریابی گردشگری</router-link ></div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="box-list-header-footer">
                        <h3>کاراول</h3>
                    </div>
                    <div class="box-list-body-footer">
                        <div class="mt-2"><a>تماس با کاراول</a></div>
                        <div class="mt-2"><a>درباره کاراول</a></div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="box-list-header-footer">
                        <h3> کاراول در شبکه‌های اجتماعی </h3>
                    </div>
                    <div class="row mt-4">
                        <div class="col-3">
                            <div><a class="social_network social_network_instagram"></a></div>
                        </div>
                        <div class="col-3">
                            <div><a class="social_network social_network_telegram"></a></div>
                        </div>
                        <div class="col-3">
                            <div><a class="social_network social_network_twitter"></a></div>
                        </div>
                        <div class="col-3">
                            <div><a class="social_network social_network_linkedin"></a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-footer-bottom mt-5" >© ۱۴۰۰ - تمامی حقوق برای کاراول محفوظ است.</div>
        </div>
    </div>
</template>

<script>
export default {
    name: "footer"
}
</script>

<style scoped>

</style>
