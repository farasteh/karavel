<template>
  <div style="margin-top: 7rem !important;" class="col-md-10 container ">
    <div class="jobs-home-box box-resume">
      <div class="row mt-5 mb-4">
        <div class="col-md-7 box-body">
          <div>
            <h1 class="mb-4 text-center font-25">آسان و سریع آگهی کارمندیابی در آژانس مسافرتی و هواپیمایی  بسازید
            </h1>
            <p>همکار گرامی، سامانه ی کاراول به کارفرمایان در آژانس مسافرتی و هواپیمایی  کمک می کند تا به صورت هوشمند و هدفمند کارمند متخصص در آژانس مسافرتی انتخاب کنند. ما در کاراول سعی کرده ایم اطلاعات مناسبی را از کارمند در اختیار شما بگذاریم تا استخدام در آژانس مسافرتی و هواپیمایی شما به بهترین نحو انجام شود.
              برای این کار کافی است در سامانه ی کاراول ثبت نام کرده و آگهی کارمندیابی در آژانس مسافرتی و هواپیمایی  خود را بصورت کامل پر نمایند. پیشنهاد می کنیم در زمان ساخت آگهی کارمندیابی در آژانس مسافرتی ، فرم مربوط را بصورت دقیق پر نمائید تا سیستم بتواند آن را بصورت هدفمند به کارجویان در آژانس هواپیمایی ارسال نماید.
            </p>
            <h5 class="mt-4 mb-2 btn btn-primary btn-lg karavel-btn">
              <nuxt-link v-if="memberRole == 'Company'" to="/posts" class="text-light">
                ساخت آگهی
              </nuxt-link>
              <nuxt-link v-else to="/users/login-register/Company" class="text-light">
                ساخت آگهی
              </nuxt-link>
            </h5>
            <p>پس از ثبت نام می توانید از قسمت ثبت آگهی در آژانس مسافرتی و هواپیمایی ، یک آگهی بر اساس نیازهای خود بسازید. به هر میزانی که این اطلاعات شغل در آژانس مسافرتی و هواپیمایی ، دقیق تر باشد بازخورد بهتری خواهید گرفت.
            </p>
            <h5 class="mt-4 mb-2 btn btn-primary btn-lg karavel-btn">
              <nuxt-link v-if="memberRole == 'Company'" to="/posts" class="text-light">
                گزارش
              </nuxt-link>
              <nuxt-link v-else to="/users/login-register/Company" class="text-light">
                گزارش
              </nuxt-link>
            </h5>
            <p>سامانه کاراول، به تفکیک آگهی در آژانس مسافرتی و هواپیمایی که ثبت نموده اید به شما گزارش های کاربردی را نمایش می دهد. این گزارش ها به شما کمک می کند تا کارمند مناسب تری در آژانس هواپیمایی  پیدا کنید.
            </p>
          </div>
        </div>
        <div class="col-md-5">
          <div><img  class="w-100 mb-3 karjo-karfarma-img" src="~/assets/images/karfarma.jpg" alt="resume"></div>
          <div class="text-center">
            <nuxt-link v-if="memberRole == 'Company'" to="/posts"
                         class="btn btn-primary btn-lg col-lg-8 karavel-btn">
              <h2 class="font-14 mb-0">
                آگهی کارمندیابی
                <br>
                در آژانس هواپیمایی و مسافرتی
                <br>
                بساز
                <Icon type="md-arrow-round-back" class="font-20"/>
              </h2>
            </nuxt-link>
            <nuxt-link v-else to="/users/login-register/Company"
                         class="btn btn-primary btn-lg col-lg-8 karavel-btn">
              <h2 class="font-14 mb-0">
                آگهی کارمندیابی
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
  name: "companyPage",
  head() {
    return {
      title: 'آسان و سریع آگهی کارمندیابی در آژانس مسافرتی و هواپیمایی  بسازید - کاراول ' ,
      meta: [
        // hid is used as unique identifier. Do not use `vmid` for it as it will not work
        {
          hid: 'description',
          name: 'description',
          content: 'آسان و سریع آگهی کارمندیابی در آژانس مسافرتی و هواپیمایی  بسازید، همکار گرامی، سامانه ی کاراول به کارفرمایان در آژانس مسافرتی و هواپیمایی  کمک می کند تا به صورت هوشمند و هدفمند کارمند متخصص در آژانس مسافرتی انتخاب کنند. ما در کاراول سعی کرده ایم اطلاعات مناسبی را از کارمند در اختیار شما بگذاریم تا استخدام در آژانس مسافرتی و هواپیمایی شما به بهترین نحو انجام شود. ' +
            'برای این کار کافی است در سامانه ی کاراول ثبت نام کرده و آگهی کارمندیابی در آژانس مسافرتی و هواپیمایی  خود را بصورت کامل پر نمایند. پیشنهاد می کنیم در زمان ساخت آگهی کارمندیابی در آژانس مسافرتی ، فرم مربوط را بصورت دقیق پر نمائید تا سیستم بتواند آن را بصورت هدفمند به کارجویان در آژانس هواپیمایی ارسال نماید. ساخت آگهی، پس از ثبت نام می توانید از قسمت ثبت آگهی در آژانس مسافرتی و هواپیمایی ، یک آگهی بر اساس نیازهای خود بسازید. به هر میزانی که این اطلاعات شغل در آژانس مسافرتی و هواپیمایی ، دقیق تر باشد بازخورد بهتری خواهید گرفت. گزارش،سامانه کاراول، به تفکیک آگهی در آژانس مسافرتی و هواپیمایی که ثبت نموده اید به شما گزارش های کاربردی را نمایش می دهد. این گزارش ها به شما کمک می کند تا کارمند مناسب تری در آژانس هواپیمایی  پیدا کنید. '
        }
      ]
    }
  },
  computed : {
    memberRole() { return this.$store.getters['User/userRole'] },
  }
}
</script>

<style scoped>
.karjo-karfarma-img {
  position: relative; z-index: 99
}
</style>
