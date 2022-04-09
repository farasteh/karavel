<template>
  <div>
    <vcl-code rtl></vcl-code>
    <vcl-code rtl></vcl-code>
    <vcl-code rtl></vcl-code>
    <vcl-code rtl></vcl-code>
    <vcl-code rtl></vcl-code>
  </div>

</template>

<script>

import { VclFacebook, VclInstagram , VclCode } from 'vue-content-loading';
export default {
    components : {VclCode , VclInstagram , VclFacebook} ,
    data () {
        return {
            list:[
                {
                    id: 1
                },
                {
                    id: 2
                },
                {
                    id: 3
                },
                {
                    id: 4
                },
                {
                    id: 5
                }
            ],
        }
    }
}
</script>

<style scoped>
</style>
