<template>
  <div>
    <svg style="top: 2px" class="position-relative mobile-footer-box" xmlns="http://www.w3.org/2000/svg" viewBox="0 200 1440 120"><path fill="#E8E8E8" fill-opacity="1" d="M0,256L80,245.3C160,235,320,213,480,213.3C640,213,800,235,960,245.3C1120,256,1280,256,1360,256L1440,256L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"></path></svg>
    <div class="bk-footer">
      <div class="row col-11 container-box-footer mobile-footer-box">
        <div class="col-md-3">
          <div class="box-list-header-footer">
            <h3>کارمندان گردشگری</h3>
          </div>
          <div class="box-list-body-footer">
            <div class="mt-2">
              <NuxtLink to="/users/login-register/Member">ورود ثبت نام</NuxtLink>
            </div>
            <div class="mt-2">
              <NuxtLink to="/resume">رزومه ساز آنلاین</NuxtLink>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="box-list-header-footer">
            <h3>آژانس&zwnj;های مسافرتی و هتل&zwnj;ها</h3>
          </div>
          <div class="box-list-body-footer">
            <div class="mt-2">
              <NuxtLink to="/users/login-register/Company">ورود ثبت نام</NuxtLink>
            </div>
            <div class="mt-2"><NuxtLink to="/companies">   آگهی کارمندیابی</NuxtLink></div>
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
            <div class="col-4">
              <div><a rel=”nofollow” href="https://www.instagram.com/karavel.ir/" class="social_network social_network_instagram"></a></div>
            </div>
            <div class="col-4">
              <div><a rel=”nofollow” href="https://t.me/karavel_ir_co" class="social_network social_network_telegram" style="height:41px !important"></a></div>
            </div>
            <div class="col-4">
              <div><a rel=”nofollow” class="social_network social_network_linkedin"></a></div>
            </div>
          </div>
        </div>
      </div>
      <div class="box-footer-bottom mt-5" >© ۱۴۰۰ - تمامی حقوق برای کاراول محفوظ است.</div>
    </div>
  </div>
</template>

<script>
    export  default  {
       name : 'pageFooter'
    }
</script>
