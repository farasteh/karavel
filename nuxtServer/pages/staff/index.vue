<template>
    <HomeStaffLatest :loading="loading"/>
</template>

<script>
  export  default  {
    name : 'staff' ,
    data() {
      return{
        loading : false,
      }
    },
    head() {
      return {
        title: ' کارمند آژانس هواپیمایی و مسافرتی-کاراول' ,
        meta: [
          {
            hid: 'description',
            name: 'description',
            content: 'دوست عزیز، کاراول یک سامانه کاریابی در آژانس مسافرتی و هواپیمایی است. کاراول با شعار -بینهایت کار مسافرتی- راه اندازی شده است. هدف ما ارتباط دادن کارفرما به کارجو برای کاریابی آژانس هواپیمایی می باشد. پیشنهاد می دهیم برای پیدا کردن یک کار در آژانس مسافرتی و هواپیمایی، یک رزومه ی کامل تهیه کنید. به هر میزانی که رزومه ی شما برای کار در آژانس مسافرتی و هواپیمایی کامل تر باشد، خیلی بهتر و ساده تر میتوانید یک فرصت شغلی در آژانس هواپیمایی پیدا کنید. پس از ثبت نام در سایت می توانید وارد بخش ساخت رزومه شده و یک رزومه حرفه ای در آژانس مسافرتی و هواپیمایی شامل اطلاعات پایه، سوابق تحصیلی، سوابق شغلی در آژانس مسافرتی، مهارت ها و پروژه ها ایجاد کرده و فایل آن را به صورت پی دی اف دریافت نمائید. - استخدام آژانس مسافرتی و هواپیمایی'
          }
        ]
      }
    },
    async fetch({store , route}) {
      this.loading = true
      // let Job = null
      // let Job1 = null
      // let province = null
      // if(Object.keys(route.query).length != 0 )
      // {
      //   if(route.query.job1 != '')
      //   {
      //     Job = parseInt(route.query.job1)
      //   }
      //   if(route.query.job2 != '')
      //   {
      //     Job1 = parseInt(route.query.job2)
      //   }
      //
      //   if (route.query.province != '')
      //   {
      //      province = parseInt(route.query.province)
      //   }
      // }
      await store.dispatch('Site/Staff/LoadStaffList').then(res => this.loading = false)
    },
  }
</script>
