<template>

    <div>
        <div v-for="( row , index) in list" :key="index">
            <vcl-code rtl></vcl-code>
        </div>
    </div>

</template>

<script>
    import { VclFacebook, VclInstagram , VclCode , VclList , VueContentLoading } from 'vue-content-loading';
    export  default {
        components : { VclCode } ,
        data ( )  {
             return{
                 list: [
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
