<template>
  <client-only>
    <AuthCreateMember></AuthCreateMember>
  </client-only>

</template>

<script>
    export  default  {
      middleware: 'memberNotComplete' ,
      layout : 'no-default' ,
      head() {
        return {
          title: 'استخدام آژانس مسافرتی و هواپیمایی - کاراول ',
          meta: [{
            hid: 'description',
            name: 'description',
            content: '',
          }]
        }
      },
    }
</script>
