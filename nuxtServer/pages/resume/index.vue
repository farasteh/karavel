<template>
  <div style="margin-top: 7rem !important;" class="col-md-10 container ">
    <div class="jobs-home-box box-resume">
      <div class="row mt-5">
        <div class="col-md-7 box-body">
          <div>
            <h1 class="mb-4 text-center font-25">آسان و رایگان رزومه استخدام در آژانس هواپیمایی و مسافرتی  بسازید</h1>
            <p>دوست عزیز، کاراول یک سامانه کاریابی در آژانس مسافرتی و هواپیمایی است. کاراول با شعار "بینهایت کار مسافرتی" راه اندازی شده است. هدف ما ارتباط دادن کارفرما به کارجوبرای کاریابی آژانس هواپیمایی می باشد. پیشنهاد می دهیم برای پیدا کردن یک کار در آژانس مسافرتی و هواپیمایی، یک رزومه ی کامل تهیه کنید. به هر میزانی که رزومه ی شما برای کار در آژانس مسافرتی و هواپیمایی  کامل تر باشد، خیلی بهتر و ساده تر میتوانید یک فرصت شغلی در آژانس هواپیمایی  پیدا کنید.
            </p>
            <h5 class="mt-4 mb-2 btn btn-primary btn-lg karavel-btn" >
              <nuxt-link v-if="memberRole == 'Member'" to="/Member/resume" class="text-light">
                ساخت رزومه
              </nuxt-link>
              <nuxt-link v-else  to="/users/login-register/member" class="text-light">
                ساخت رزومه
              </nuxt-link>
            </h5>
            <p>پس از ثبت نام در سایت می توانید وارد بخش ساخت رزومه شده و یک رزومه حرفه ای در آژانس مسافرتی و هواپیمایی  شامل اطلاعات پایه، سوابق تحصیلی، سوابق شغلی در آژانس مسافرتی، مهارت ها و پروژه ها ایجاد کرده و فایل آن را به صورت پی دی اف دریافت نمائید.
            </p>
            <h5  class="mt-4 mb-2 btn btn-primary btn-lg karavel-btn">
              <nuxt-link v-if="memberRole == 'Member'" to="/Member/resume" class="text-light">
                ارتباط با آژانس
              </nuxt-link>
              <nuxt-link v-else to="/users/login-register/member" class="text-light">
                ارتباط با آژانس
              </nuxt-link>
            </h5>
            <p>تمام کارجوهای آژانس مسافرتی و هواپیمایی  می توانند بر اساس شغل های آژانس مسافرتی و هواپیمایی  که در سامانه ثبت شده است، جستجوی شغل نموده و رزومه ای که ساخته اند را برای کارفرما ارسال کنند.
            </p>
            <h5 class="mt-4 mb-2 btn btn-primary btn-lg karavel-btn">
              <nuxt-link v-if="memberRole == 'Member'" to="/member/resume" class="text-light">
                گزارش
              </nuxt-link>
              <nuxt-link v-else to="/users/login-register/Member" class="text-light">
                گزارش
              </nuxt-link>
            </h5>
            <p>سامانه کاراول، به تفکیک درخواست کار در آژانس مسافرتی و هواپیمایی  که ارسال نموده اید به شما گزارش های کاربردی را نمایش می دهد. این گزارش ها به شما کمک می کند تا شغل مناسب تری در آژانس هواپیمایی  پیدا کنید.
            </p>
          </div>
        </div>
        <div class="col-md-5">
          <div><img src="~/assets/images/karjo.jpg" class="w-100 mb-3 karjo-karfarma-img" alt="resume"></div>
          <div style="text-align: center;">
            <nuxt-link v-if="memberRole == 'Member'" to="/member/resume"
                         class="btn btn-primary btn-lg col-lg-8 karavel-btn">
              <h2 class="font-14 mb-0">
                رزومه استخدام
                <br>
                در آژانس هواپیمایی و مسافرتی
                <br>
                بساز
                <Icon type="md-arrow-round-back" class="font-20"/>
              </h2>

            </nuxt-link>
            <nuxt-link v-else  class="btn btn-primary col-lg-8 karavel-btn"
                       to="/users/login-register/Member">
              <h2 class="font-14 mb-0">
                رزومه استخدام
                <br>
                در آژانس هواپیمایی و مسافرتی
                <br>
                بساز
                <Icon type="md-arrow-round-back" class="font-20"/>
              </h2>

            </nuxt-link>
          </div>
          <div class="box-wave"></div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "resume" ,
  head() {
    return {
      title: 'آسان و رایگان رزومه استخدام در آژانس هواپیمایی و مسافرتی  بسازید- کاراول ' ,
      meta: [
        // hid is used as unique identifier. Do not use `vmid` for it as it will not work
        {
          hid: 'description',
          name: 'description',
          content: 'آسان و رایگان رزومه استخدام در آژانس هواپیمایی و مسافرتی  بسازید،دوست عزیز، کاراول یک سامانه کاریابی در آژانس مسافرتی و هواپیمایی است. کاراول با شعار بینهایت کار مسافرتی راه اندازی شده است. هدف ما ارتباط دادن کارفرما به کارجوبرای کاریابی آژانس هواپیمایی می باشد. پیشنهاد می دهیم برای پیدا کردن یک کار در آژانس مسافرتی و هواپیمایی، یک رزومه ی کامل تهیه کنید. به هر میزانی که رزومه ی شما برای کار در آژانس مسافرتی و هواپیمایی  کامل تر باشد، خیلی بهتر و ساده تر میتوانید یک فرصت شغلی در آژانس هواپیمایی  پیدا کنید. ساخت رزومه،پس از ثبت نام در سایت می توانید وارد بخش ساخت رزومه شده و یک رزومه حرفه ای در آژانس مسافرتی و هواپیمایی  شامل اطلاعات پایه، سوابق تحصیلی، سوابق شغلی در آژانس مسافرتی، مهارت ها و پروژه ها ایجاد کرده و فایل آن را به صورت پی دی اف دریافت نمائید. ارسال رزومه، تمام کارجوهای آژانس مسافرتی و هواپیمایی  می توانند بر اساس شغل های آژانس مسافرتی و هواپیمایی  که در سامانه ثبت شده است، جستجوی شغل نموده و رزومه ای که ساخته اند را برای کارفرما ارسال کنند. گزارش، سامانه کاراول، به تفکیک درخواست کار در آژانس مسافرتی و هواپیمایی  که ارسال نموده اید به شما گزارش های کاربردی را نمایش می دهد. این گزارش ها به شما کمک می کند تا شغل مناسب تری در آژانس هواپیمایی  پیدا کنید. -استخدام آژانس مسافرتی و هواپیمایی'
        }
      ]
    }
  },
  computed : {
    memberRole() { return this.$store.getters['User/User/userRole'] },
  }
}
</script>

<style scoped>
.karjo-karfarma-img {
  position: relative; z-index: 99
}
</style>
